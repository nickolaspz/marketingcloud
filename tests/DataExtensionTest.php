<?php
namespace Nickolaspz\MarketingCloud;

use PHPUnit\Framework\TestCase;

class DataExtensionTest extends TestCase
{
    /**
     * @var DataExtension
     */
    private $DE;

    protected function setUp()
    {
        $this->DE = new DataExtension;
    }

    public function testDataExtension()
    {
        $this->assertTrue(
            $this->DE->send(
                'DEName',
                [
                    'id' => 123,
                    'name' => 'John Doe',
                    'age' => 76
                ]
            )
        );
    }
}