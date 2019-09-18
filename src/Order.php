<?php

class order
{	

	/**
	* Quantity
	* @var int
	*/
	public $quantity;

	/**
	* Unit price
	* @var float
	*/	
	public $unit_price;
	
	/**
	* Amount
	* @var int
	*/
	public $amount = 0;

	/**
	* Payment gateway dependency
	* @var PaymentGateway
	*/
	protected $gateway;

	public function __construct(int $quantity, float $unit_price)
	{
		
		$this->quantity = $quantity;

		$this->unit_price = $unit_price;

		$this->amount = $quantity * $unit_price;

	}

	/**
	* Process the order
	* @param PaymentGateway $gateway
	* @return void
	*/
	public function process(PaymentGateway $gateway)
	{
		
		$gateway->charge($this->amount);

	}

}