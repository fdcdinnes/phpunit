<?php

use PHPUnit\Framework\TestCase;

class MonTest extends TestCase
{
	public function testMock()
	{

		$mock = $this->createMock(Mailer::class);

		$mock->method('sendMessage')->willReturn(true);

		$result = $mock->sendMessage('test.email@sample.comn', 'Sample Message');

		$this->assertTrue($result);
		
	}
}