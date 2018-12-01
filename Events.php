<?php
namespace Kna\MQTransactionBundle;


class Events
{
    const MESSAGE_RECEIVED = 'kna_mq_transaction.message_received';

    static public function getEventName(string $consumerName): string
    {
        return self::MESSAGE_RECEIVED . '.' . $consumerName;
    }

}