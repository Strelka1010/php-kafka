<?php

namespace App\DataTransfer;

interface ItemInterface
{

    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @return string
     */
    public function getKey(): ?string;

    /**
     * @param string $value
     */
    public function setValue(string $value): void;
}