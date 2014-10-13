<?php

class Bookability_Bundles
{
	public function __construct(Bookability $master)
	{
		$this->master = $master;
	}

	/**
	 * Retrieve a list of bundles
	 *
	 * @return array
	 */
	public function find($_params = array())
	{
		return $this->master->get('bundles', $_params);
	}

	/**
	 * Retrieve a single bundle
	 *
	 * @return array
	 */
	public function get($token)
	{
		return $this->master->get('bundles/' . $token);
	}

	/**
	 * Create a single bundle
	 *
	 * @return array
	 */
	public function create($_params = array())
	{
		return $this->master->post('bundles', $_params);
	}

	/**
	 * Update a single bundle
	 *
	 * @return array
	 */
	public function update($token, $_params = array())
	{
		return $this->master->put('bundles/' . $token, $_params);
	}

	/**
	 * Delete a single bundle
	 *
	 * @return array
	 */
	public function delete($token)
	{
		return $this->master->delete('bundles/' . $token);
	}
}