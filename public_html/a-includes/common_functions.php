<?php
	function format_date_to_database($datein)
	{
		$format_dt = '';
		if (!empty($datein))
		{
			$invert = explode("/",$datein);
			$fecha_invert = $invert[2]."/".$invert[1]."/".$invert[0];
			$format_dt = str_replace('/', '-', $fecha_invert);
		}
		return $format_dt;
	}


	function format_date_from_database($datein)
	{
		$format_dt = '';
		if (!empty($datein))
		{
			$invert = explode("-",$datein);
			$fecha_invert = $invert[2]."-".$invert[1]."-".$invert[0];
			$format_dt = str_replace('-', '/', $fecha_invert);
		}
		return $format_dt;

	}

	function get_current_page()
	{
		$path = $_SERVER['PHP_SELF'];
		$page = basename($path, ".php");

		return $page;
	}
	


	function get_index_from_array($array,$search_value)
	{
		$index=0;
		
		foreach ($array as $i => $b)
		{
			if ($array[$i] == $search_value)
				$index = $i;	
		}
		return $index;
	}
	
	function complete_array($array,$numbertocomplete)
	{
		
		for ($i = 1; $i <= $numbertocomplete; $i++) {
		    array_push($array,'');
		}
		return $array;
	}	
?>