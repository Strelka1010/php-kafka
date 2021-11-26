<?php

namespace App\DataTransfer\Converters;

use App\DataTransfer\ItemInterface;

class StandartConverter implements \App\DataTransfer\ConverterInterface
{
    /** @var array */
    private $converterOptions;

    public function __construct(array $converterOptions=[])
    {
        $this->converterOptions = $converterOptions;
    }
    /**
     * @inheritDoc
     */
    public function process(ItemInterface $message): ItemInterface
    {
        $message->setValue('Сконвертированное сообщение:' . $message->getValue());
        return $message;
    }
}