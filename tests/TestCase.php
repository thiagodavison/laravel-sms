<?php

namespace LeadThread\Sms\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getPackageProviders($app)
    {
        return ['LeadThread\Sms\Providers\SmsServiceProvider'];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getPackageAliases($app)
    {
        return [
            'Sms' => 'LeadThread\Sms\Facades\Sms'
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('sms', [
            'driver' => 'plivo',
            'plivo' => [
                'token' => 'Token',
                'user'  => 'User',
                'from'  => '+1 (555) 555-5555', //Default from phone number
            ],
            'twilio' => [
                'token' => 'Token',
                'user'  => 'User',
                'from'  => '+1 (555) 555-5555', //Default from phone number
            ],
            'bandwidth' => [
                'secret' => 'Secret',
                'token' => 'Token',
                'user_id' => 'User_id',
                'from'  => '+1 (555) 555-5555', //Default from phone number
                'fallback_url' => null,
                'application_id' => null,
            ],
        ]);
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
