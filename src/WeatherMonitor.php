<?php

class WeatherMonitor
{

	/**
	* Temperature
	* @var TemperatureService
	*/
	protected $services;

	/**
	* @param Temperature $service
	* @return void
	*/

	public function __construct(TemperatureService $service)
	{

		$this->service = $service;
		
	}

	/**
	* Get the average temperature between two times
	*
	* @return int
	*/
	public function getAverageTemperature(string $start, string $end)
	{

		$start_temp = $this->service->getTemperature($start);

		$end_temp = $this->service->getTemperature($end);

		return ($start_temp + $end_temp) / 2;

	}
	
}