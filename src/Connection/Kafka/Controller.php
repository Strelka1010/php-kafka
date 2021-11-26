<?php

namespace App\Connection\Kafka;

use Exception;
use RdKafka\Conf;
use RdKafka\Producer;

class Controller
{
    /**@var array */
    private $producers;


    public function __construct()
    {
    }


    /**
     * @throws Exception
     */
    public function push($topicName, string $message, array $options = [])
    {
        $producer = $this->getProducer();
        $topic    = $producer->newTopic($topicName);

        if (!$producer->getMetadata(false, $topic, 2000)) {
            throw new Exception("Failed to get metadata, is broker down?");
        }

        $topic->produce(RD_KAFKA_PARTITION_UA, 0,$message, 1);
        $producer->poll(1000);
//        for ($flushRetries = 0; $flushRetries < 10; $flushRetries++) {
//            $result = $producer->flush(100);
//            if (RD_KAFKA_RESP_ERR_NO_ERROR === $result) {
//                break;
//            }
//        }
//
//        if (RD_KAFKA_RESP_ERR_NO_ERROR !== $result) {
//            throw new \RuntimeException('Was unable to flush, messages might be lost!');
//        }

        return true;
    }

    /**
     * @throws Exception
     */
    public function getProducer($broker = 'kafka:9092'): Producer
    {
        if (!isset($this->producers[$broker])) {
            $conf = new Conf();
            $conf->set('metadata.broker.list', $broker);
            $conf->set('log_level', (string) LOG_DEBUG);
            $producer = new Producer($conf);

            $this->producers[$broker] =  $producer;
        }
        return $this->producers[$broker];
    }



}