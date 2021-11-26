<?php

namespace App\DataTransfer;

class TransferItem implements ItemInterface
{
    /** @var string */
    private $key;

    /** @var string */
    private $value;

    public function __construct(string $value, string $key = null)
    {
        $this->key   = $key;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }


}