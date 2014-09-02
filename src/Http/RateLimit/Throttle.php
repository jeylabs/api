<?php

namespace Dingo\Api\Http\RateLimit;

use Illuminate\Container\Container;

abstract class Throttle
{
	/**
	 * Array of throttle options.
	 * 
	 * @var array
	 */
	protected $options = ['requests' => 0, 'expires' => 60];

	/**
	 * Create a new throttle instance.
	 * 
	 * @param  array  $options
	 * @return void
	 */
	public function __construct(array $options)
	{
		$this->options = array_merge($this->options, $options);
	}

	/**
	 * Attempt to match the throttle against a given condition.
	 * 
	 * @param  \Illuminate\Container\Container  $app
	 * @return bool
	 */
	abstract public function match(Container $app);

	/**
	 * Get the throttles options.
	 * 
	 * @return array
	 */
	public function getOptions()
	{
		return $this->options;
	}

	/**
	 * Get the throttles allowed number of requests.
	 * 
	 * @return int
	 */
	public function getRequests()
	{
		return $this->options['requests'];
	}

	/**
	 * Get the time in minutes that the throttles request limit will expire.
	 * 
	 * @return int
	 */
	public function getExpires()
	{
		return $this->options['expires'];
	}
}