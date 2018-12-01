<?php
namespace Kna\MQTransactionBundle\Event;


use PhpAmqpLib\Message\AMQPMessage;
use Symfony\Component\EventDispatcher\Event;

class MessageEvent extends Event
{
    /**
     * @var AMQPMessage
     */
    protected $message;
    /**
     * @var mixed
     */
    protected $result = false;

    /**
     * @return AMQPMessage
     */
    public function getMessage(): AMQPMessage
    {
        return $this->message;
    }

    /**
     * @param AMQPMessage $message
     */
    public function setMessage(AMQPMessage $message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }
}