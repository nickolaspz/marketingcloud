<?php
namespace Nickolaspz\MarketingCloud;

use FuelSdk\ET_DataExtension;
use FuelSdk\ET_DataExtension_Row;
use Nickolaspz\MarketingCloud\Client;

class DataExtension extends Client
{
    public function send(string $name, array $data = [])
    {
        try {
            $dataext = new ET_DataExtension_Row;
            $dataext->authStub = $this->getClient();
            $dataext->CustomerKey = $name;

            foreach ($data as $key => $value) {
                $dataext->props[$key] = $value;
            }

            $response = $dataext->post();

            if (isset($response->status) && $response->status === false) {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
