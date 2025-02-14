<?php

namespace utils;

class Config
{
    private string $configFile;
    private string $config;
    public function __construct($configPath = "config/config.json"){
        if(!file_exists($configPath)){
            exit;
        }

        $this->registerConfig($configPath);
    }

    public function getConfigFile() : string{
        return $this->configFile;
    }

    public function getConfig(): string{
        return $this->config;
    }

    public function registerConfig($configPath = "config/config.json"): array {
        $this->configFile = file_get_contents($configPath);
        $this->config = json_decode($this->configFile);

        return [$this->configFile, $this->config];
    }
}