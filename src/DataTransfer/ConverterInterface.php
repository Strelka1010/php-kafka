<?php

namespace App\DataTransfer;

interface ConverterInterface
{
    /**
     * Метод для обработки списка объектов, готовых к передаче.
     *
     * @param ItemInterface $message
     *
     * @return ItemInterface
     */
    public function process(ItemInterface $message): ItemInterface;
}