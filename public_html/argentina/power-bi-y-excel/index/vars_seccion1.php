<?php 
/*** paleta azul petroleo */

//azul petroleo1  #084d6e


$url_img = "img/";

$foto[0][0] = "curso-power-bi.jpg";
$foto[0][1] = "2.jpg";
$foto[0][2]= "1.jpg";

$foto[1][0] = "microsoft-project-intermedios-top.jpg";
$foto[1][1] = "medio.jpg";
$foto[1][2]= "microsoft-project-intermedios-bottom.jpg";

$foto[2][0] = "4.jpg";
$foto[2][1] = "medio.jpg";
$foto[2][2] = "5.jpg";

$num_estudiantes = 15500;



$rr=0;


$dom_icono_class = "fas fa-check text-success "; 

/**cambiar indice  */
$domi = 3;
$dominar[0] = array(
   "titulo" => "Aprendé a dominar Windows Server para Empresas",  
   "items" =>
   array(  
   1=> "3 horas de vídeo bajo demanda",
   2=>"27 videos",
   3=>"Acceso de por vida",
   4=>"Acceso en dispositivos móviles y TV",
   5=>"Certificado de Participación"
   ));
$dominar[1] = array(
    "titulo" => "Aprendé a dominar ".$curso, //.' '.$nivel[1],  
    "items" =>
    array(  
    1=> "3 horas de vídeo bajo demanda",
    2=>"Acceso de por vida",
    3=>"Acceso en dispositivos móviles y TV",
    4=>"Certificado de Participación"
    ));
    
$dominar[2] = array(
"titulo" => "Aprendé a dominar ".$curso, //.' '.$nivel[2],  
"items" =>
array(  
1=> "3 horas de vídeo bajo demanda",
2=>"Acceso de por vida",
3=>"Acceso en dispositivos móviles y TV",
4=>"Certificado de Participación"
));

$dominar[3] = array(
   "titulo" => "Aprendé a dominar Microsoft POWER BI y Excel en sus 3 niveles Inicial Intermedio y Avanzado",  
   "items" =>
   array(  
   0=> "12.5 horas de vídeo bajo demanda",
   1=> "35 clases",
   2=> "Incluye Curso POWER BI  + EXCEL Nivel Inicial + Nivel Intermedio + Nivel Avanzado",
   3=> "Acceso de por vida a todos los niveles",
   4=> "Paso a paso y desde 0. Sin requisitos previos",
   5=> "Acceso en dispositivos móviles y TV",
   6=> "Certificado de Participación"
   ));



   $sum = 1299 + $precios[0]['oferta']+$precios[1]['oferta']+$precios[2]['oferta'];
   $des = $sum - $descuento_glob;
   $baner_prom_precios = "El precio por separado de cada curso es de  1.299 + "
      .number_format($precios[0]['oferta'],0,',','.')
      ." + ".number_format($precios[1]['oferta'],0,',','.')
      ." + ".number_format($precios[2]['oferta'],0,',','.')
      ." sumando un total de <b>$"
      .number_format($sum,0,',','.')."<b>";


   $baner_prom_precios2 = "¡Con ésta promo obtenés los 3 cursos a <b>$".number_format($des,0,',','.')."</b> finales! <span <span style='color:#0d9f18;'> <b>(Ahorrás $".number_format($descuento_glob,0,'.',',')."</b>)<span>";

    /*temarios*/
    $tems = 1;
    $temario[0] = array(
        1  =>	array("Módulo"=>" Introducción a Microsoft Project",	
                   "Clase"=>array(
                               1 => "Nociones Básicas de Manejo de Microsoft Project"
                               )
                    ),		
       2=>	array("Módulo" => " Creación de un nuevo plan de Proyecto",	
                "Clase" =>	array(
                   1=>	"Información del proyecto",
                   2=>	" Calendario laboral")
                ),				
       3=>	array( "Módulo" => "Creación de lista de Tareas",	
                   "Clase"=>	
                            array(
                               1	=>	"Modo de tarea - Nombre de Tarea - Duración de Tarea",
                               2	=>	"Fecha de Comienzo - Fecha Fin - Relación entre tareas (predecesoras)"
                            )),				
       4=>	array("Módulo"=>"Tipos de Tareas",
                   "Clase"=> array( 
                           1 =>"Estructura de Trabajo - Tarea resumen del proyecto - Tarea - Fases",
                           2=>"Subfases - Hitos"
                        )),	
        5=>array("Módulo" => "Recursos",                
                 "Clase"=>array(

       1=>"Recursos de Trabajo Personas -Equipamientos",				
       2=>"Recursos de Trabajo Materiales - Asignación Básica"
    )),				
       array("Módulo" => "Seguimiento de Progreso de Tareas",
            "Clase"=>	array(
                               1 =>"Escalas de Tiempo Clase",
                               2 =>"Ruta Crítica - Linea Base",
                               3 =>"Avance Previsto de Tareas",
                               4 =>"Avance Real de Tareas"
                            )),				
       array("Módulo"=>" Configuración e Impresión de Vistas en Project",
            "Clase"=>array(
                   1=>"Vistas de Diagrama de Gantt y Gantt de Seguimiento"
                )));				

                $temario[1] = array(
                    1  =>	array("Módulo"=>" Configuración Avanzada de Tareas",	
                               "Clase"=>array(
                                           1 => "Relación entre tareas – FC -CC- FF – CF – Retraso y Adelanto",
                                           2 => "Relaciones – Restricciones – Prioridad – Tipo y Condicionamiento (Parte 1)",                        
                                           3 => "Relaciones – Restricciones – Prioridad – Tipo y Condicionamiento (Parte 2)",
                                           4 => "Tareas Cíclicas – Hitos",
                                           5 => " Aplicación en Proyecto Completo"
                                           )
                                ),		
                   2=>	array("Módulo" => "Configuración Avanzada de Recursos",	
                            "Clase" =>	array(
                               1=>	"Trabajo – Materiales – Costos – Costos Fijos – Utilización – Tasas – Tarifas – Disponibilidad (Parte 1)",
                               2=>	"Trabajo – Materiales – Costos – Costos Fijos – Utilización – Tasas – Tarifas – Disponibilidad (Parte 2)")
                            ),				
                   3=>	array( "Módulo" => "Resolución de Sobreasignación de Recursos",	
                               "Clase"=>	
                                        array(
                                           1 => "Organizador de Equipo – Análisis Directo",
                                           2 =>	"Redistribución y Nivelación de Recursos",
                                           3 =>	"Aplicación en Proyecto Completo"
                                        )),				
                   4=>	array("Módulo"=>"Vistas de Microsoft Project",
                               "Clase"=> array( 
                                       1 =>"Tipos y Configuración"
                                    )));                
    
    $temario[2] = array(
         1  =>	array("Módulo"=>"Subproyectos",	
                    "Clase"=>array(
                                1 => "Vinculación de Lectura y Escritura",				
                                2 => "Subproyectos: Vinculación de Solo Lectura y Sin Vinculación"
                                )
                     ),		
        2=>	array("Módulo" => "Plantillas en Project",	
                 "Clase" =>	array(
                    1=>	"Creación y Utilización")),				
        3=>	array( "Módulo" => "Costos",	
                    "Clase"=>	
                             array(
                                1	=>	"Recursos, Tareas y Proyectos")),				
        4=>	array("Módulo"=>"Análisis de Costos",
                    "Clase"=> array( 
                            1 =>"Costo, Costo Real y Costo Restante"),	
                            "Clase"=>array(
        2=>"Valor Planeado, Valor acumulado, Costo Real y VP",				
        3=>"VC, IRC, IRP, CPF, CEF, VAF e IRPC",				
        4=>"Valor acumulado en Fecha de Estado",				
        5=>"exportación e Importación de Datos")),				
        array("Módulo" => "Informes y Reportes",
             "Clase"=>	array(
                                1 =>"Uso y Configuración")),				
        array("Módulo"=>"Macros en Project",
             "Clase"=>array(
                    1=>"Creación y Aplicación")));		

$tems2= [0,1,2];                    
$temarios = array(0=>array('title' => $producto1,
                           'temario' => $temario[0]),
                  1=>array('title' => $producto2,
                           'temario' => $temario[1]),
                  2=>array('title' => $producto3,
                           'temario' => $temario[2]),         


)


    ?>