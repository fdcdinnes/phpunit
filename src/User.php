<?php

Class User
{
	
	/**
	* First name
	* @var string
	*/
	public $first_name;

	/**
	* Last name
	* @var string
	*/
	public $surname;

	/**
	* user's email address
	* @var string
	*/
	public $email;

	/**
	* Mailer object
	* @var Mailer
	*/
	protected $mailer;

	/**
	* Set the mailer dependency
	* @param Mailer $mailer 
	*/
	public function setMailer(Mailer $mailer){

		$this->mailer = $mailer;

	}

	public function getFullName(){

		return trim("$this->first_name $this->surname");

	}	
	
	public function notify($message)
	{

		return $this->mailer->sendMessage($this->email, $message);

	}
}