<?php
namespace Kna\MQTransactionBundle\Model;


use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MessageManager
{
    use ContainerAwareTrait;

    public function __construct(
        ContainerInterface $container
    )
    {
        $this->container = $container;
    }

    /**
     * @return ManagerRegistry
     */
    protected function getDoctrine(): ManagerRegistry
    {
        return $this->container->get('doctrine');
    }

    public function schedule(MessageInterface $message)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($message);
    }
}