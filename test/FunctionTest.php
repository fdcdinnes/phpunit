<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{

	public function  AddReturnsTheCorrectSum()
	{
		require 'Function.php';
		$this->assertEquals(4,add(2, 2));
		$this->assertEquals(4,add(2, 2));
		$this->assertEquals(4,add(2, 2));
		$this->assertEquals(4,add(2, 2));
	}

	public function testAddDoesNotReturnsTheCorrectSum()
	{	
		require 'Function.php';
		
		$this->assertNotEquals(5,add(2, 2));
	}	
} 