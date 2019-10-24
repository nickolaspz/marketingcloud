<?php
namespace Nickolaspz\MarketingCloud;

use FuelSdk\ET_TriggeredSend;
use Nickolaspz\MarketingCloud\Client;

class Trigger extends Client
{
    /**
     * trigger
     *
     * @param  string $name
     * @param  mixed $subscribers
     * @param  array $data
     *
     * @return void
     */
    public function send(string $name, $subscribers, array $data = [])
    {
        try {
            $trigger = new ET_TriggeredSend();
            $trigger->authStub = $this->getClient();
            $trigger->props = ['CustomerKey' => $name];
            
            $this->createEmailList($trigger, $subscribers, $data);

            $response = $trigger->send();
            
            if (isset($response->status) && $response->status === false) {
                return false;
            }
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
}
