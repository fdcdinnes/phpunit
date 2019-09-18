<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

	public function testReturnsFallName()
	{

		$user = new User;

		$user->first_name = 'Teresa';

		$user->surname = 'Green';

		$this->assertEquals('Teresa Green', $user->getFullName());	

	}

	public function testFullNameIsEmptyByDefault()
	{

		$user = new User;

		$this->assertEquals('', $user->getFullname());

	}


	public function testNotificationIsSent()
	{

		$user = new User;

		$mock_mailer = $this->createMock(Mailer::class);

		$mock_mailer->expects($this->once())
					->method('sendMessage')
					->with($this->equalTo('test.email@sample.comn'), $this->equalTo('Sample Message From userTest'))
					->willReturn(true);

		$user->setMailer($mock_mailer);

		$user->email = 'test.email@sample.comn';

		$this->assertTrue($user->notify('Sample Message From userTest'));

	}

	public function testCannotNotifyUserWithNoEmail()
	{

		$user = new User;

		$mock_mailer = $this->getMockBuilder(Mailer::class)
							->setMethods(null)
							->getMock();

		$user->setMailer($mock_mailer);

		$this->expectException(Exception::class);

		$user->notify("Sample Message From userTest");
		
	}

} 