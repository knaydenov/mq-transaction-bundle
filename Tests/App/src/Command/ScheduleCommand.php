<?php

namespace Kna\MQTransactionBundle\Tests\App\Command;

use Doctrine\Common\Persistence\ManagerRegistry;
use Kna\MQTransactionBundle\Model\MessageInterface;
use Kna\MQTransactionBundle\Model\MessageManager;
use Kna\MQTransactionBundle\Tests\App\Entity\Message;
use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ScheduleCommand extends Command
{

    use ContainerAwareTrait;

    /**
     * @var MessageManager
     */
    protected $messageManager;

    public function __construct(
        ContainerInterface $container,
        MessageManager $messageManager,
        ?string $name = null
    )
    {
        $this->container = $container;
        $this->messageManager = $messageManager;
        parent::__construct($name);
    }

    /**
     * @return ManagerRegistry
     */
    protected function getDoctrine(): ManagerRegistry
    {
        return $this->container->get('doctrine');
    }


    protected function configure()
    {
        $this
            ->setName('app:schedule-messages')
            ->setDescription('Sends messages')
            ->setHelp('Sends messages')
        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getDoctrine()->getManager();
        $message = new Message();
        $message->setRoutingKey('default');
        $message->setBody('Hello!');

        $this->messageManager->schedule($message);

        $em->flush();
    }
}