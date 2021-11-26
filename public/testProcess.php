<?php

use App\DataTransfer\Converters\StandartConverter;
use App\DataTransfer\DataTransfer;
use App\DataTransfer\Publishers\KafkaPublisher;
use App\DataTransfer\TransferItem;

require_once __DIR__ . "/../vendor/autoload.php";

$conf = new \RdKafka\Conf();
$conf->set('group.id', 'myConsumerGroup');
$conf->set('log_level', (string) LOG_DEBUG);
$conf->set('metadata.broker.list', 'kafka:9092');
$consumer = new \RdKafka\Consumer($conf);


$topic = $consumer->newTopic("TEST");

$topic->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);

echo "consumer started";
while (true) {
    $message = $topic->consume(0, 120*1000);
    switch ($message->err) {
        case RD_KAFKA_RESP_ERR_NO_ERROR:
            if($message->payload){
                $messagePayload = new TransferItem($message->payload);
                $publisher = new KafkaPublisher();
                $converter = new StandartConverter();
                $dataTransfer = new DataTransfer($messagePayload, $publisher, $converter);
                $dataTransfer->transfer();
            }
            break;
        case RD_KAFKA_RESP_ERR__PARTITION_EOF:
            echo "No more messages; will wait for more\n";
            break;
        case RD_KAFKA_RESP_ERR__TIMED_OUT:
            echo "Timed out\n";
            break;
        default:
            echo $message->errstr();
    }
}

