<?php namespace Malek\UniqueNumberGenerator\Tests;


/**
 * Class TestCase
 *
 * @package Tests
 */
abstract class TestCase
{

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {

    }

    /**
     * @inheritDoc
     */
    protected function getEnvironmentSetUp($app)
    {

    }

    /**
     * @inheritDoc
     */
    protected function getPackageProviders($app)
    {

    }

    /**
     * Mock the event dispatcher so all events are silenced and collected.
     *
     * @return $this
     */
    protected function withoutEvents(): self
    {

    }
}
