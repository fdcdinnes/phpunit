<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase
{

	public function testAddingTwoPlusTwoResultsInFour()
	{
		
		$this->assertEquals(4, 2+2);
		/* use the bellow code if you never extend MockeryTestCase */
		// public function tearDown(): void
		// {
		// 	Mockery::close();
		// }
	}
	
} 