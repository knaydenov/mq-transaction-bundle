<?php
namespace Kna\MQTransactionBundle\Tests\App\Entity;


use Kna\MQTransactionBundle\Model\Message as BaseMessage;

class Message extends BaseMessage
{
    /**
     * @var string
     */
    protected $id;
}