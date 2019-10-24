# marketingcloud
SF Marketing Cloud wrapper for FuelSDK-PHP

## Config
Create file nmc-config.php in app root folder with the following contents filled in

```php
return [
    'appsignature' => 'none',
    'clientid' => '',
    'clientsecret' => '',
    'defaultwsdl' => '',
    'xmlloc' => __DIR__ . '\\..\\cache\\ExactTargetWSDL.xml',
    'baseAuthUrl' => '',
    'baseSoapUrl' => '',
    'baseUrl' => '',
    'useOAuth2Authentication' => true, 
    'accountId' => '', 
    'scope' => ''
];
```

## Example
```php
use Nickolaspz\MarketingCloud\Trigger;
use Nickolaspz\MarketingCloud\DataExtension;

public function send_trigger(Request $request)
{

	$email = 'myemail@gmail.com';
	$data = [
		[
			'Name' => 'Attribute',
			'Value' => 'Value'
		]
	];
        
	$trigger = new Trigger($this->getConfig());
	$response = $trigger->send('Trigger_Name', $email, $data);
}
```
