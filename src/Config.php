<?php

namespace App;

class Config
{
    /** @var Config единственный экземпляр класса */
    private static $instance;

    /**
     *
     */
    protected function __construct() { }

    /**
     *
     */
    protected function __clone() { }

    /**
     * @throws \Exception
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * @return Config
     */
    public static function getInstance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}