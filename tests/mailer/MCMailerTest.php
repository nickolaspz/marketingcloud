<?php
require_once(__DIR__ . '\\..\\..\\mailer\\src\\MCMailer.php');

use PHPUnit\Framework\TestCase;

class MCMailerTest extends TestCase
{
    public function testTrigger()
    {
        $mc = new \Nickolaspz\MarketingCloud\Mailer\MCMailer();
        die('test');
    }
}