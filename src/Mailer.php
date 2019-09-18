<?php

class Mailer
{
	/**
	*@param string $email
	*@param string $message
	*
	*@return boolean True or false 
	*/
	public function sendMessage($email, $message)
	{	
		if (empty($email)) {

			throw new Exception;
			
		}

		sleep(3);

		echo "send '$message' to '$email'";

		return true;

	}
}