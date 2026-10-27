<?php
$nombre='Juan';
$edad=18;
echo 'Hola Mundo';
echo 'Buenas tardes';
echo $nombre;
echo '<h2>Título enorme h2</h2>';
$máquina='calculadora básica';
$a='60';
$b='15';
echo $a+$b;
//Verificar si Juan es mayor de edad
if($edad>=18){
    echo 'Se le permite';
}
else{
    echo'no se le permite';
}
//Verificar si Juan es un intruso
if($nombre=="Juan"){
    echo 'Es el indicado';
} 
else{
    echo'es un intruso';
}
//Array de 5 lenguajes
$lenguajes = ['PHP', 'JS', 'C#', 'Python', 'Java'];
echo $lenguajes [3];
// Muestra los números del 1 al 5
echo "Ejercicios con tipos de buques\n";
for ($i = 1; $i <= 5; $i++) {
    echo "Turno número: $i\n";
}
//ejemplo de bucle for
echo "\n";
$compras = [
    "Bomba de aceite" => 20,
    "Piston" => 15,
    "Culata" => 15,
    "Fusible" => 5,
];

var_dump($compras);
echo "\n";
$total = 0;
foreach($compras as $producto => $precio){
    echo "$producto con un precio de $precio + $total\n";
}
echo "\n\n";
echo "Total a pagar: $total\n";
echo "\n\n";
    
//prueba con bucle while

$intentosRestantes = 3;
while($intentosRestantes>0){
    echo "Intento fallido. Te quedan $intentosRestantes intentos.\n";
    $intentosRestantes--;
}
echo "Cuenta bloqueada por seguridad. Contacta con el administrador.\n";
//bucles usando break y continue
$almacen = ["Rueda", "Pastillas de freno", "Amortiguador", "Batería"];
$busqueda = "Pastillas de freno";
//bucle foreach primero para solo recorrer el array
foreach($almacen as $pieza){
    echo "$pieza";
}
echo "\n";
//bucle foreach de acuerdo con el ejercicio
foreach($almacen as $pieza){
    if($pieza===$busqueda){
        echo "¡Producto $busqueda encontrado en el almacén!\n";
        break;
    }
    echo "El producto $busqueda no está disponible";
}
//prueba de función isset
$string = "texto";
$isset = isset($string);
echo $isset;
//prueba bucle e ir sumando datos.
$expedienteNotas = [
    "Programación Web" => 9.5,
    "Sistemas Operativos" => 4.0,
    "Inglés Técnico" => 6.5,
    "Base de Datos" => 3.5
];
$sumaNotas = 0;
$totalAsignaturas = 0;
foreach($expedienteNotas as $asignatura=>$nota){
	echo "Asignatura: $asignatura\n" . "Nota: $nota\n";
	if($nota<5){
		echo "REVISIÓN REQUERIDA\n";
	}
	$sumaNotas = $sumaNotas + $nota; //tambien se puede usar el operador de suma $sumaNotas += $nota;
	$totalAsignaturas++;
}
$mediafinalEstudiante = ($sumaNotas/$totalAsignaturas);
echo $mediafinalEstudiante;

//clases abstractas
abstract class ActividadMoodle {
    protected string $nombre;
    protected float $nota = 0.0; //aquí no hay construct, valor por defecto.

    public function __construct(string $nombre){
        $this->nombre = $nombre;
    }

    public function getNota(): float {
        return $this->nota; //no asigna, solo devuelve
    }

    abstract public function evaluar(mixed $respuesta): string; //obliga a las clases que dependen de la abstracta
}

class ExamenNumerico extends ActividadMoodle {
    private float $respuestaCorrecta;

    public function __construct(string $nombre, float $respuestaCorrecta){
        parent::__construct($nombre);
        $this->respuestaCorrecta = $respuestaCorrecta;
    }

    public function evaluar(mixed $respuesta): string {
        $respuestaUsuario = (float) $respuesta;
        if($respuestaUsuario===$this->respuestaCorrecta){
            $this->nota = 10.0;
            return "Resultado correcto en " . $this->nombre . " Nota obtenida: 10.0";
        }
        else{
            $this->nota = 0.0;
            return "Resultado incorrecto en  " . $this->nombre . " la respuesta era " . $this->respuestaCorrecta . " Nota obtenida: 0.0";
        }
    }
}
$preguntaMath = new ExamenNumerico("¿Cuanto es 5 * 8", 40.0);
echo $preguntaMath->evaluar(40.0);
echo "\n";
echo $preguntaMath->evaluar(35.0);

//traits en php. Un trait es como un copiar y pegar de un método, no es una clase y no se activa con new, sino con use. Al no ser una clase no se usa $this->propiedad.
trait Auditable {
    protected string $fechaModificacion = "";
    public function actualizarAuditoria(string $usuario): void {
        $this->fechaModificacion = "modificado por " . $usuario . "el " . date("Y-m-d H:i:s");
    }
    public function getAuditoria(): string {
        return $this->fechaModificacion;
    }
}
class CursoMoodle {
    private string $titulo;
    use Auditable;
    public function __construct(string $titulo){
        $this->titulo = $titulo;
    }
    public function getTitulo(): string {
        return $this->titulo;
    }
}
$curso = new CursoMoodle("PHP Backend Avanzado");
$curso->actualizarAuditoria("Jose");
echo "Curso: " .  $curso->getTitulo() . "\n";
echo "Auditoria: " . $curso->getAuditoria() . "\n";

//ejercicio que combina interfaces, traits y clases abstractas
interface EvaluableInterface {
    public function evaluar(mixed $respuesta): string;
}
trait Auditable {
    protected string $historial = "";
    public function guardarHistorial(string $accion): void {
        $this->historial = "Acción: " . $accion . " | Fecha " . date("Y-m-d H:i:s");
    }
    public function getHistorial(): string {
        return $this->historial;
    }
}
abstract class ActividadMoodle implements EvaluableInterface {
    protected string $nombre;
    protected float $nota = 0.0;
    public function __construct(string $nombre){
        $this->nombre = $nombre;
    }
    public function getNota(): float {
        return $this->nota;
    }
    abstract public function evaluar(mixed $respuesta): string;
}
class CuestionarioExpress extends ActividadMoodle {
    use Auditable;
    private string $claveCorrecta;
    public function __construct(string $nombre, string $claveCorrecta){
        parent::__construct($nombre);
        $this->claveCorrecta = $claveCorrecta;
    }
    public function evaluar(mixed $respuesta): string {
        if((string) $respuesta === $this->claveCorrecta){
            $this->nota = 10.0;
            $this->guardarHistorial("aprobado por el alumno");
            return "Cuestionario " . $this->nombre . " superado con 10.0";
        }else{
            $this->nota = 0.0;
            $this->guardarHistorial("suspendido por el alumno");
            return "Cuestionario " . $this->nombre . " suspendo con 0.0";
        }
    }
}
$quiz = new CuestionarioExpress("Examen Final de PHP", "PHP2026");
echo $quiz->evaluar("PHP2026");
echo "\n";
echo $quiz->getHistorial();
//nameespaces
namespace MoodleInscripciones; //src\Incripciones\Gestor.php
class Gestor {
    public function matricular(string $alumno, string $curso): string {
        return "El alumno " . $alumno . " ha sido matriculado en " . $curso . "\n";
    }
}
namespace MoodleNotificaciones; //src\Notificaciones\Gestor.php
class Gestor {
    public function enviarEmail(string $alumno, string $mensaje): string {
        return "Email enviado a " . $alumno . ": " . $mensaje . "\n";
    }
}
require_once "src\Incripciones\Gestor.php";
require_once "src\Notificaciones\Gestor.php";

use Moodle\Inscripciones\Gestor as InscripcionesGestor;
use Moodle\Notificaciones\Gestor as NotificacionesGestor;

$GestorInscripciones = new InscripcionesGestor;
$GestorNotificaciones = new NotificacionesGestor;

echo $GestorInscripciones->Gestor("Jose", "PHP Avanzado");
echo $GestorNotificaciones->Gestor("Jose", "PHP Avanzado");

//function srt_replace para poner las rutas correctas con las barras.
function normalizarRuta(string $rutaWindows): string {
	$cadenaBarras = str_replace('\\', '/', $rutaWindows);
	$rutaLimpia = "ruta obtenida a: " . $cadenaBarras;
	return $rutaLimpia;
}

$rutaObtenida = "C:\\xampp\\htdocs\\moodle\\config.php";
$ruta1 = normalizarRuta($rutaObtenida);
echo $ruta1 . "\n";
var_dump($ruta1);

//SIMULAMOS UN COMPOSER.JSON PARA MOODLE.
{
    "name": "moodle/modulo-evaluaciones", //nombre del proyecto, primero es entidad y luego proyecto.
    "description": "Módulo de evaluaciones automáticas para Moodle",
    "require": {
        "phpmailer/phpmailer": "^6.8" //esto no es inventado, es la libreria oficial de php. Y con versión mínima y superior.
    },
    "autoload": {
        "psr-4": {
            "Moodle\\App\\": "src/"
        }
    }
}
?>