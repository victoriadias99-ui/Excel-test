<?php include ('vars_seccion1.php') ?>

<section class="top-product pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5" style="">
                <div class="product-img  ">
                    <?php /**************************************** cambio ******************************************/?>
                    <img src="<?php echo $url_img.$foto[$rf][0]?>" class="img-fluid" alt="product">
                </div>
            </div>
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-6">
                <div class="  mt-md-4 mt-0">
                    <h1 style="color:black; font-family: montserrat_bold" class="mb-0 pb-0 text-center">Hazte un experto
                        en Microsoft Power BI y Excel 3 niveles con estos 4 Cursos. </h1>
                    <div class="rating-user d-inline mt-0 pt-0" style="color:#ffd322;"><br>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <?php /*********
*   cambios dominar numero estudiantes
 */
?>


                    <p class="user_name d-inline pl-2 pr-4">+<?php echo number_format($num_estudiantes,0,",",".")?>
                        estudiantes</p>

                    <h1 class="text-left mt-5" style="font-family: montserrat_bold"><?php echo $dominar['titulo'] ?>
                    </h1>
                </div>
                <div class="feature-list mt- mt-md-2">
                    <ul style="">
                        <?php /*********
*   cambios dominar
 */
?>

                        <?php $i=0; foreach($dominar[$domi]['items'] as $dom): $i++; ?>

                        <li class="wow fadeIn" data-wow-delay="0.<?php echo $i?>"
                            style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                            <i class="<?php echo $dom_icono_class?>"></i> <?php echo $dom?>
                        </li>
                        <?php endforeach ?>

                        <div class="">

                            <a class="<?php echo $dom_icono_class?> nvo_color" href="#" data-toggle="collapse"
                                data-target="#collapse2" aria-expanded="true"
                                aria-controls="collapse2">&nbsp;&nbsp;Ver temario completo</a>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                data-parent="#accordionExample" style="">
                                <!-- div class="card-body" -->

                                <ul>
                                    <p class="lead font-weight-bold"> CURSO NIVEL INICIAL</p>
                                    <li>Clase 1: Estructuras básicas de Excel</li>
                                    <li>Clase 2: Hacer una factura</li>
                                    <li>Clase 3: Hojas, libros</li>
                                    <li>Clase 4: Vista Backstage: libro, hojas, en la vista vemos botones inicio, nuevo
                                        y abrir</li>
                                    <li>Clase 5: Insertar Celdas Filas y Columnas</li>
                                    <li>Clase 6: Eliminar Celdas Filas y Columnas</li>
                                    <li>Clase 7: Ocultar y visualizar de nuevo filas y columnas sin eliminarlas</li>
                                    <li>Clase 8: Copiar, cortar y pegar celdas</li>
                                    <li>Clase 9: Formato a la tabla de datos Ajustar texto Alinear texto</li>
                                    <li>Clase 10: Formato simple monedas</li>
                                    <li>Clase 11: Creación de lista desplegable</li>
                                    <li>Clase 12: Ordenar la base de datos orden de A Z de Z A y personalizado</li>
                                    <li>Clase 13: Buscar y reemplazar</li>
                                    <li>Clase 14: Alternativas para copiar una hoja.</li>
                                    <li>Clase 15: Operaciones aritméticas (Sumar, Restar, Multiplicar, Dividir)</li>
                                    <li>Clase 16: Sumar por celda, sumar con formula y la funcion autosuma</li>
                                    <li>Clase 17: Multiplicación con selección de celdas y fórmula de PRODUCTO</li>
                                    <li>Clase 18: División por celdas y formula COCIENTE</li>
                                    <li>Clase 19: Calcular promedio de forma manual y fórmula PROMEDIO</li>
                                    <li>Clase 20: Validación de datos VERDADERO/FALSO</li>
                                    <li>Clase 21: Fórmula Condicional SI</li>
                                    <li>Clase 22: Fórmula Sumar.SI (Suma Condicional)</li>
                                    <li>Clase 23: Anclaje de celdas</li>
                                    <li>Clase 24: Formato de tablas, asignación de nombres a tablas</li>
                                    <li>Clase 25: Fórmula BUSCARV</li>
                                    <li>Clase 26: Formato Condicional</li>
                                    <li>Clase 27: Cifrar archivo, proteger y desproteger hoja y libro</li>
                                    <li>Clase 28: Gráfica en barra con una variable y formato de gráfica</li>
                                    <li>Clase 29: Gráfica de pastel o circular</li>
                                    <li>Clase 30: Gráfico de tiempo con varias variables</li>
                                    <li>Clase 31: Cómo imprimir en Excel</li>


                                </ul>

                                <ul>
                                    <p class="lead font-weight-bold mt-5"> CURSO NIVEL INTERMEDIO</p>
                                    <li>Clase 1: Estructuras básicas de excel</li>
                                    <li>Clase 1 Tablas Dinámicas</li>
                                    <li>Clase 2 Funciones Lógicas - Función SI & SI ANIDADA</li>
                                    <li>Clase 3 Funciones Lógicas - Función SI.ERROR</li>
                                    <li>Clase 4 Funciones Lógicas - Función (O) & Y</li>
                                    <li>Clase 5 Función CONCATENAR</li>
                                    <li>Clase 6 Función INDIRECTO</li>
                                    <li>Clase 7 Funciones de Texto</li>
                                    <li>Clase 8 Función INDICE y COINCIDIR</li>
                                    <li>Clase 9 Remover datos duplicados</li>
                                    <li>Clase 10 Función SUBTOTALES</li>
                                    <li>Clase 11 Funcion Pronostico</li>
                                    <li>Clase 12 Listas Desplegables Dependientes</li>
                                    <li>Clase 13 Listas Desplegables Dinámicas</li>
                                    <li>Clase 14 Creación y Grabación de Macros</li>
                                    <li>Clase 15 Ejecución y Automatización con Macros</li>
                                    <li>Clase 16 Crear plantilla para Gráficos</li>
                                    <li>Clase 17 Filtros Avanzados para Excel</li>
                                    <li>Clase 18 Análisis de Hipótesis</li>
                                    <li>Clase 19 Graficos Dinámicos</li>
                                    <li>Clase 20 Clase 20: Parte 1 - Modelo de datos para creacion de dashboard</li>
                                    <li>Clase 20 Clase 20: Parte 2 - Utilizacion de modelo de datos y creacion de
                                        dashboard</li>
                                    <li>Clase 21 Casos Practicos para los usuarios</li>


                                </ul>
                                <ul>
                                    <p class="lead font-weight-bold mt-5"> CURSO NIVEL AVANZADO</p>
                                    <li>Clase 1 - Construcción Bases de datos</li>
                                    <li>Clase 2 - Filtros y limpieza de datos</li>
                                    <li>Clase 3 - Columnas primarias y formuladas</li>
                                    <li>Clase 4 - Principales fórmulas utilizadas en las Bases de Datos</li>
                                    <li>Clase 5 - Buscarv</li>
                                    <li>Clase 6 - Buscarh</li>
                                    <li>Clase 7 - Coindicir</li>
                                    <li>Clase 8 - KPI´s</li>
                                    <li>Clase 9 - Estadística Descriptiva</li>
                                    <li>Clase 10 - Media Móvil</li>
                                    <li>Clase 11 - Regresión lineas</li>
                                    <li>Clase 12 – Diseños</li>
                                    <li>Clase 12 - Minigráficos</li>
                                    <li>Clase 13 - Líneas de tendencia</li>
                                    <li>Clase 14 - Histogramas</li>
                                    <li>Clase 15 - Instalación</li>
                                    <li>Clase 16 - Conexión de Bases de datos</li>
                                    <li>Clase 17 - Columnas formuladas</li>
                                    <li>Clase 18 - Creación de modelos y conexión entre tablas</li>
                                    <li>Clase 19 - Análisis de datos y construcción de gráficos</li>
                                    <li>Clase 20 - Formularios - Definición de objeto</li>
                                    <li>Clase 21 - Uso de controles - Detallar controles y características</li>
                                    <li>Clase 22 - Diseño de formularios - Pasos para un buen diseño</li>
                                    <li>Clase 23 - Automatización - Formularios y macros</li>
                                    <li>Clase 24 - Introducción VBA - Programación VBA</li>


                                </ul>


                                <!-- /div -->
                            </div>
                        </div>


                        <?php /***** precossssssss **** */ ?>
                        <?php /*     <h3 class="bg-success text-white font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">
                <strike>$<?php echo $precios[$prs]['full'] ?></strike><span>
                            &nbsp;&nbsp;&nbsp;$<?php echo $precios[$prs]['oferta']?></span></h3>
                        */?>
                        <h4 class="mt-3 ">

                            <?php echo $baner_prom_precios ?></span></h4>
                        <h4 class="mt-3 ">

                            <?php echo $baner_prom_precios2 ?></span></h4>
                </div>

                <div class="call-button mt-5">
                    <div class="row">
                        <div class="col-md-6 ">
                            <a href="checkout.html" class="hvr-sweep-to-top  wow flipInX animated shadow"
                                data-wow-delay="0.2s"
                                style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero
                                los
                                4 cursos</a>
                        </div>
                        <div class="col-md-6 payments">
                            <img src="img/payments.jpg" class="img-fluid wow flipInX  animated" data-wow-delay="0.3s"
                                alt="payments"
                                style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        </div>
                    </div>
                </div>
                <div class="review-one mt-5">
                    <div class="review-text">
                        <p class="lead">"El Curso esta pensado para gerentes de proyecto"</p>
                    </div>
                    <div class="review-image">

                        <p class="user_name d-inline  font-weight-bold">Alberto Rodríguez - PM <i
                                class="fa fa-star pl-1 " style="color:#ffd322;"></i>
                            <i class="fa fa-star " style="color:#ffd322;"></i>
                            <i class="fa fa-star" style="color:#ffd322;"></i>
                            <i class="fa fa-star" style="color:#ffd322;"></i>
                            <i class="fa fa-star" style="color:#ffd322;"></i>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>