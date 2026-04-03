<?php
{
	function OpenCon()
	{
		
        $cnx = new PDO('mysql:host=localhost;dbname=aprendee_argentina_3_6_21;charset=utf8mb4', 'aprendee_admin_argentina', 'Xks.2vDnursT');
		return $cnx;
	}
 }
?>