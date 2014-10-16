<?php

class Bookability_Base
{
	public function __construct(Bookability $master)
	{
		$this->master = $master;
	}

	protected function transform($response)
	{
		// create collection
		$collection = new Bookability_Collection();
			
		if (isset($response['total']))
		{
			$collection->total = $response['total'];
		}
		if (isset($response['per_page']))
		{
			$collection->perPage = $response['per_page'];
		}
		if (isset($response['current_page']))
		{
			$collection->currentPage = $response['current_page'];
		}
		if (isset($response['last_page']))
		{
			$collection->lastPage = $response['last_page'];
		}
		if (isset($response['from']))
		{
			$collection->from = $response['from'];
		}
		if (isset($response['to']))
		{
			$collection->to = $response['to'];
		}
		if (isset($response['data']))
		{
			$data = $response['data'];
			if (is_array($data))
			{
				$collection->data = array_map(function ($item)
				{
					return $this->arrayToObject($item);
				}, $data);
			}
			return $collection;
		}
		else
		{
			return (object) $this->arrayToObject($response); 
		}
	}
	
	protected function objectToArray($d) 
	{
	    if (is_object($d)) $d = get_object_vars($d);

	    return is_array($d) ? array_map([$this, __FUNCTION__], $d) : $d;
	}

	protected function arrayToObject($d) 
	{
	    return is_array($d) ? (object) array_map([$this, __FUNCTION__], $d) : $d;
	}
}