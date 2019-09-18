<?php

use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase
{
	
	public function teardown(): void
	{

		Mockery::close();

	}

	public function tesCorrectAverageIsReturned()
	{

		$service = $this->createMock(TemperatureService::class);

		$map = [
			['12:00', 20],
			['14:00', 26]
		];

		$service->expects($this->exaclty(2))
				->method('getAverageTemperature')
				->will($thi->returnValueMap($map));

		$weather = new WeatherMonitor($service);

		$this->assertEquals(22, $weather->getAverageTemperature('12:00', '14:00'));

	}

	public function tesCorrectAverageIsReturnedWithMockery()
	{

		$service = Mockery::mock(TemperatureService::Class);

		$service->shouldReceive('getAverageTemperature')
				->once()
				->with('12:00')
				->andReturn(20);

		$service->shouldReceive('getAverageTemperature')
				->once()
				->with('14:00')
				->andReturn(26);

		$weather = new WeatherMonitor($service);

		$this->assertEquals(22, $weather->getAverageTemperature('12:00', '14:00'));

	}


}