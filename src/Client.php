<?php
namespace Nickolaspz\MarketingCloud;

use FuelSdk\ET_Client;

class Client
{
    private $client;

    const APP_ROOT_FOLDER = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;

    public function __construct()
    {
        $this->client = new ET_Client(
            true,
            true, 
            array_merge($this->loadConfig(), $this->loadUserConfig())
        );
    }

    /**
     * getClient
     *
     * @return void
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * loadConfig
     *
     * @return void
     */
    private function loadConfig()
    {
        return include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
    }

    /**
     * loadUserConfig
     *
     * @return void
     */
    private function loadUserConfig()
    {
        try {
            return include self::APP_ROOT_FOLDER . 'nmc-config.php';
        } catch (\Exception $e) {
            echo (PHP_EOL . '(Warning) Nickolaspz\MarketingCloud :: nmc-config.php in app root was not found.' . PHP_EOL);

            try { return $this->loadTestConfig(); } catch (\Exception $e) {}
        }

        return [];
    }

    /**
     * loadTestConfig
     *
     * @return void
     */
    private function loadTestConfig()
    {
        return include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php';
    }
}
