<?php
namespace Kna\MQTransactionBundle\Tests\App\EventListener;


use Kna\MQTransactionBundle\Event\MessageEvent;
use Kna\MQTransactionBundle\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MessageSubscriber implements EventSubscriberInterface
{

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            Events::getEventName('default') => 'onMessageReceived'
        ];
    }

    public function onMessageReceived(MessageEvent $event)
    {
        print sprintf("%s\n%s\n\n", $event->getMessage()->get('message_id'), $event->getMessage()->getBody());
        $event->setResult(true);
    }
}