<?php

namespace App\DataTransfer;

interface PublisherInterface
{

    /**
     * Метод для передачи объекта в целевую систему.
     *
     * @param ItemInterface $message
     *
     */
    public function publish(ItemInterface $message);
}