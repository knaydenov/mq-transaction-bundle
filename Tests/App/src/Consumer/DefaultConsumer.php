<?php
namespace Kna\MQTransactionBundle\Tests\App\Consumer;


use Kna\MQTransactionBundle\Consumer\BaseConsumer;

class DefaultConsumer extends BaseConsumer
{

    function getName(): string
    {
        return 'default';
    }
}