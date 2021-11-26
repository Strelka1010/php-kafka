<?php

namespace App\DataTransfer\Publishers;

use App\Connection\Kafka\Controller;
use App\DataTransfer\ItemInterface;
use App\DataTransfer\PublisherInterface;

class KafkaPublisher implements PublisherInterface
{
    /** @var array */
    private $publisherOptions;

    public function __construct(array $publisherOptions=[])
    {
        $this->publisherOptions = $publisherOptions;
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function publish(ItemInterface $message)
    {
        $topicName = $this->publisherOptions['topicName'] ?? 'standart';
        $kafkaController = new Controller();
        $messageData = $message->getValue();
        //заглушка для проверки
        echo PHP_EOL . "Сообщение '$messageData' в топик $topicName отправлено";
        return $kafkaController->push($topicName, $messageData);
    }
}