<?php
namespace Nickolaspz\MarketingCloud;

use PHPUnit\Framework\TestCase;

class TriggerTest extends TestCase
{
    /**
     * @var Trigger
     */
    private $trigger;

    protected function setUp()
    {
        $this->trigger = new Trigger;
    }

    public function testTrigger()
    {
        $this->assertTrue(
            $this->trigger->send(
                'TriggerName', 
                'email@domain.com', 
                [
                    [
                        'Name' => 'Attribute',
                        'Value' => 'Value'
                    ]
                ]
            )
        );
    }
}