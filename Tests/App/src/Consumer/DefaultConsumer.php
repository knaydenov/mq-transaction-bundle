<?php
namespace Kna\MQTransactionBundle\Tests\App\Consumer;


use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class DefaultConsumer implements ConsumerInterface
{

    /**
     * @param AMQPMessage $msg The message
     * @return mixed false to reject and requeue, any other value to acknowledge
     */
    public function execute(AMQPMessage $msg)
    {
        print_r([
            'message' => $msg->getBody(),
            'props' => $msg->get_properties()
        ]);
    }
}