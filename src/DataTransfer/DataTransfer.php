<?php

namespace App\DataTransfer;

use App\DataTransfer\Converters\StandartConverter;

class DataTransfer
{
    /** @var ItemInterface */
    private $message;
    /** @var PublisherInterface */
    private $publisher;
    /** @var ConverterInterface */
    private $converter;

    public function __construct(ItemInterface $message, PublisherInterface $publisher, ConverterInterface $converter)
    {
        $this->message  = $message;
        $this->publisher = $publisher;
        $this->converter = $converter;

    }

    /**
     */
    public function transfer()
    {
        $result = false;
        $data = $this->converter->process($this->message);
        return $this->publisher->publish($data);
    }

}