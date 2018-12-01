<?php

namespace Kna\MQTransactionBundle\Command;

use Doctrine\Common\Persistence\ManagerRegistry;
use Kna\MQTransactionBundle\Model\MessageInterface;
use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SendMessagesCommand extends Command
{
    use ContainerAwareTrait;

    public function __construct(
        ContainerInterface $container,
        ?string $name = null
    )
    {
        $this->container = $container;
        parent::__construct($name);
    }


    protected function configure()
    {
        $this
            ->setDescription('Sends messages')
            ->setHelp('Sends messages')
        ;
    }

    /**
     * @return ManagerRegistry
     */
    protected function getDoctrine(): ManagerRegistry
    {
        return $this->container->get('doctrine');
    }

    /**
     * @return LoggerInterface
     */
    protected function getLogger(): LoggerInterface
    {
        return $this->container->get('logger');
    }

    protected function getProducer(?string $name): ProducerInterface
    {
        if (!$name) {
            $name = $this->container->getParameter('kna_mq_transaction.default_producer');
        }

        return $this->getProducer('old_sound_rabbit_mq.' . $name . '_producer');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getDoctrine()->getManager();
        $messageClass = $this->container->getParameter('kna_mq_transaction.message.class');

        $i = 0;
        $messages = $em->getRepository($messageClass)->findAll();


        foreach ($messages as /** @var MessageInterface $message */ $message) {
            try {
                $this
                    ->getProducer($message->getProducer())
                    ->publish($message->getBody(), $message->getRoutingKey(), $message->getAdditionalProperties())
                ;

                $em->remove($message);
                $em->flush();
            } catch (\Exception $exception) {
                $this->getLogger()->debug('Failed to send message', [
                    'message' => $exception->getMessage()
                ]);
            }

            ++$i;
        }
    }
}