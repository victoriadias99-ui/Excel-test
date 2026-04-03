<?php
{
	function OpenCon()
	{
		$cnx = new PDO('mysql:host=localhost;dbname=aprendee_facebook;charset=utf8mb4', 'aprendee_admin_argentina', 'Xks.2vDnursT');
		return $cnx;
	}
 }
?>