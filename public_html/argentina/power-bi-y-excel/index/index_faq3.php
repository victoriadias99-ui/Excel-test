
  <section id="ch">
    <div class="container">
      <div class="text-center ">
        <h2 class="mt-2 mb-1 text-dark" style="font-family: montserrat_bold"><i class="fa fa-question-circle"
            aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
      </div>
      <div class="accordion mt-4" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0" style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse"
                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo
                tengo?</button></h5>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
            <div class="card-body">¡De por vida! Una vez que abones vas a tener acceso para siempre. Lo vas a poder
              descargar en tu PC, notebook, tablet o celular.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header " id="headingTwo">
            <h5 class="mb-0 " style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en
                terminarlo?</button></h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
            <div class="card-body">3hs de videos es la duración total del curso.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse"
                data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan
                soporte?</button></h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample"
            style="">
            <div class="card-body">Sí, damos soporte 24/7. Podes consultar cualquier duda en nuestro e-mail o Whatsapp.
            </div>
          </div>
        </div>
        <div class="card  text-left">
          <div class="card-header text-left" id="headingFour">
            <h5 class="mb-0" style="">
              <button class="btn btn-link  text-left" type="button" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificado o Diploma?</button></h5>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample"
            style="">
            <div class="card-body">Una vez termines el curso podes solicitarnos gratis la Certificado de Cursado.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header  text-left" id="headingFive">
            <h5 class="mb-0  text-left" style="">
              <button class="btn btn-link  text-left" type="button" data-toggle="collapse" data-target="#collapseFive"
                aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample"
            style="">
            <div class="card-body">No requiere conocimientos previos. Sólo necesitás una PC o Notebook con el Project
              instalado. Si no tenes Project, dentro del curso te enseñamos cómo descargarlo gratis.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header  text-left" id="headingSix">
            <h5 class="mb-0  text-left" style="">
              <button class="btn btn-link  text-left" type="button" data-toggle="collapse" data-target="#collapseSix"
                aria-expanded="true" aria-controls="collapseSix">#6 ¿Cuál es el temario completo?</button></h5>
          </div>
          <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
            <div class="card-body">

              <ul class="ist-unstyled">
                <p class="lead"> Temario</p>
                <?php $i=0;$j=0; foreach($temario[$tems] as $tem => $t): $i++;
                     

                     ?> 
                   
                    <li class=”mt-1”> <b><?php echo array_keys($t)[0]." ".$i?> </b> - <?php echo $t[array_keys($t)[0]] ?> </li>
                    <?php  $r= $t[array_keys($t)[1]];  foreach($r as $k => $v): $j++ ; $tt = array_keys($v); ?>
                    <ol>
                        
                      <li class=”mt-1”> <b> <?php echo array_keys($t)[1]."  ".$j?></b> - <?php echo $v ?> </li>
                    </ol>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="call-button mt-5">
        <div class="row justify-content-md-center">
          <div class="col-md-3">
            <a href="checkout.html" class="sc-roll hvr-sweep-to-top  wow flipInX animated" data-wow-delay="0.2s"
              style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">lo
              quiero&nbsp;👉</a>
          </div>
        </div>
      </div>
    </div>
  </section>