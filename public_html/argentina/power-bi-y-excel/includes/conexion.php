<?php
{
	function OpenCon()
	{
		$cnx = new PDO('mysql:host=localhost;dbname=c2230046_Efacil;charset=utf8mb4', 'c2230046_Efacil', 'VIzoli47nu');
		return $cnx;
	}
 }
?>