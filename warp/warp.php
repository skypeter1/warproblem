<?php
require_once "/clases/Reactor.php";
require_once "/clases/Inyector.php";

function main(){
	$inyA = $_POST['inyectorA'];
	$inyB = $_POST['inyectorB'];
	$inyC = $_POST['inyectorC'];
	$velocidad = $_POST['velocidad'];
	$reactor = new Reactor();
	$reactor->calcular($inyA,$inyB,$inyC,$velocidad);
}

main();

?>