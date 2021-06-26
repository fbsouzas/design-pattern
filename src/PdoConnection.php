<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern;

use PDO;

class PdoConnection extends PDO
{
    private static ?self $instance = null;

    public function __construct($dsn, $user = null, $pass = null, $driverOptions = null)
    {
        parent::__construct($dsn, $user = null, $pass = null, $driverOptions = null);
    }

    public static function getInstance($dsn, $user = null, $pass = null, $driverOptions = null): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new static($dsn, $user = null, $pass = null, $driverOptions = null);
        }

        return self::$instance;
    }
}
