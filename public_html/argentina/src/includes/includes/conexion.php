<?php
{
	function OpenCon()
	{
		//$cnx = new PDO('mysql:host=mysql5025.site4now.net;dbname=db_a2a4e5_cursosp;charset=utf8mb4', 'a2a4e5_cursosp', 'elite007curPROD');
		//$cnx = new PDO('mysql:host=66.97.44.13;dbname=db_a2a4e5_cursosp;charset=utf8mb4', 'excelCurso', 'Excel1347');
		$cnx = new PDO('mysql:host=localhost;dbname=excel;charset=utf8mb4', 'user_db', '123456');
		
		return $cnx;
	}
 }
?>