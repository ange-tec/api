<?php

namespace utils;

use Exception;
use PDO;

class Bdd
{
    private PDO $bdd;
    private static $instance;

    /**
     * @throws Exception
     */
    public function __construct($bddConfig = null)
    {
        if (is_null($bddConfig)) {
            $configManager = new Config();
            $config = $configManager->getConfig();
        } else {
            $config = $bddConfig;
        }

        try {
            $this->bdd = new PDO(
                "mysql:dbname={$config->database->name};host={$config->database->host};charset=utf8;",
                $config->database->username,
                $config->database->password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public static function getInstance($bddConfig)
    {
        if (empty(self::$instance)) {
            self::$instance = new Bdd($bddConfig);
        }

        return self::$instance->bdd;
    }

    public function getBdd(): PDO
    {
        return $this->bdd;
    }
}