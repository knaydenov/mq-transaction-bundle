<?php
namespace Kna\MQTransactionBundle\Consumer;


use Kna\MQTransactionBundle\Event\MessageEvent;
use Kna\MQTransactionBundle\Events;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class BaseConsumer implements ConsumerInterface
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param AMQPMessage $msg The message
     * @return mixed false to reject and requeue, any other value to acknowledge
     */
    public function execute(AMQPMessage $msg)
    {
        $event = new MessageEvent();
        $event->setMessage($msg);

        $this->dispatcher->dispatch(Events::getEventName($this->getName()), $event);

        return $event->getResult();
    }

    abstract function getName(): string;
}