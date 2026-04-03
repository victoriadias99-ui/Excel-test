<?php
if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
require_once dirname(__DIR__) . '/a-libraries/vendor/autoload.php';

include("ApiFacebookEvents.php");

include("../a-includes/conexion.php");
include("../a-includes/class.autonum.php");

$nombre = 'Angel';
$apellido = 'Torres';
$mail = 'torrespereangel91@gmail.com';
$monto_acreditado = '12333';

//datos para enviar a sendinblue
echo "<input type='text' id='nombre' name='nombre' value='$nombre' hidden>"; 
echo "<input type='text' id='apellido' name='apellido' value='$apellido' hidden>"; 
echo "<input type='text' id='mail' name='mail' value='$mail' hidden> "; 
echo "<input type='text' id='monto' name='monto' value='$monto_acreditado' hidden> "; 

?>

 <script type="text/javascript">
(function() {
    window.sib = {
        equeue: [],
        client_key: "odq97yyhds94d616wrj5mx6i"
    };
    /* OPTIONAL: email for identify request*/
    // window.sib.email_id = 'example@domain.com';
    window.sendinblue = {};
    for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
    (function(k) {
        window.sendinblue[k] = function() {
            var arg = Array.prototype.slice.call(arguments);
            (window.sib[k] || function() {
                    var t = {};
                    t[k] = arg;
                    window.sib.equeue.push(t);
                })(arg[0], arg[1], arg[2], arg[3]);
            };
        })(j[i]);
    }
    var n = document.createElement("script"),
        i = document.getElementsByTagName("script")[0];
    n.type = "text/javascript", n.id = "sendinblue-js", n.async = !0, n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key, i.parentNode.insertBefore(n, i), window.sendinblue.page();
})();

var nombre = document.getElementById('nombre');
var apellido = document.getElementById('apellido');
var email = document.getElementById('mail');
var monto = document.getElementById('monto');

if(nombre.value !='' && email.value !='')
{
sendinblue.track(
  'purchased_completed',
  {
    "nombre": nombre.value,
    "email" : email.value,
    "apellido" : apellido.value,
	"monto": monto.value
  });
}
?>