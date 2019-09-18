<?php
use PHPUnit\Framework\TestCase;
// configuring how call method 
class OrderTest extends TestCase
{
	public function tearDown(): void
	{

		Mockery::close();

	}
	
	/**
	* Using phpunit mock builder
	*/
	public function testOrderIsProcessed()
	{

		$gateway = $this->getMockBuilder('PaymentGateway')
						->setMethods(['charge'])
						->getMock();

		$gateway->expects($this->once())
				->method('charge')
				->with(5.97);

		$order = new Order(3, 1.99);

		$order->process($gateway);

		$this->assertEquals(5.97, $order->amount);

	}

	// Using Mockery 
	public function testOrderIsProcessedUsingMockery()
	{

		$order = new Order(3, 1.99);

		$this->assertEquals(5.97, $order->amount);

		$gateway_mock = Mockery::mock('PaymentGateway');

		$gateway_mock->shouldReceive('charge')
					->once()
					->with(5.97);

		$order->process($gateway_mock);

	}

	// Using spies 
	public function testOrderIsProcessedUsingSpy()
	{

		$order = new Order(3, 1.99);

		$this->assertEquals(5.97, $order->amount);

		$gateway_spy = Mockery::spy('PaymentGateway');
		
		$order->process($gateway_spy);

		$gateway_spy->shouldHaveReceived('charge')
					->once()
					->with(5.97);


	}


}