<?php
namespace Nickolaspz\MarketingCloud\Mailer;

use FuelSdk\ET_Client;
use FuelSdk\ET_List;
use FuelSdk\ET_TriggeredSend;

class MCMailer
{
    private $client;

    public function __construct($config = [])
    {
        $this->client = new ET_Client(
            true,
            true, 
            array_merge($this->loadConfig(), $config)
        );
    }

    /**
     * trigger
     *
     * @param  string $name
     * @param  mixed $subscribers
     * @param  array $data
     *
     * @return void
     */
    public function trigger(string $name, $subscribers, array $data = [])
    {
        try {
            $trigger = new ET_TriggeredSend();
            $trigger->authStub = $this->getClient();
            $trigger->props = ['CustomerKey' => $name];
            
            $this->createEmailList($trigger, $subscribers, $data);

            $response = $trigger->send();
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * createEmailList
     *
     * @param  mixed $trigger
     * @param  mixed $subscribers
     * @param  mixed $data
     *
     * @return void
     */
    private function createEmailList(&$trigger, $subscribers, array $data)
    {
        $emailList = [];
        if (is_array($subscribers)) {
            foreach ($subscribers as $subscriber) {
                $emailList[] = [
                    'EmailAddress' => $subscriber, 
                    'SubscriberKey' => $subscriber
                ];
            }
        } else {
            $emailList[] = [
                'EmailAddress' => $subscribers, 
                'SubscriberKey' => $subscribers,
                'Attributes' => $data
            ];
        }

        $trigger->subscribers = $emailList;
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
        return include __DIR__ . '\\..\\config\\config.php';
    }
}
