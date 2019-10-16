# marketingcloud
SF Marketing Cloud Trigger wrapper for FuelSDK-PHP

## Example
```php
use Nickolaspz\MarketingCloud\Mailer\MCMailer;

public function send_trigger(Request $request)
{

	$email = 'myemail@gmail.com';
	$data = [
		[
			'Name' => 'Attribute',
			'Value' => 'Value'
		]
	];
        
	$mailer = new MCMailer($this->getConfig());
	$response = $mailer->trigger('Trigger_Name', $email, $data);
}

private function getConfig()
{
	// Input your values
	return [
      'appsignature' => 'none',
      'clientid' => '',
      'clientsecret' => '',
      'defaultwsdl' => '',
      'baseAuthUrl' => '',
      'baseSoapUrl' => '',
      'baseUrl' => '',
      'useOAuth2Authentication' => true, 
      'accountId' => '', 
      'scope' => ''
  ];
}
```
