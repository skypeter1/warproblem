<?php

require_once "/clases/Reactor.php";
require_once "/clases/Inyector.php";

class TestCaseReactor extends TestCase {
	function test_construct() {
		$reactor = new Reactor();
		foreach ($reactor->getInyectores() as $inyector) {
			$this -> assert_true($inyector instanceof Inyector);
		}
		$this -> assert_equals(3, count($reactor -> getInyectores()));
	}

	function test_velocidad() {
		$reactor = new Reactor();
		$reactor -> setVelocidad("100");
		$this -> assert_equals(100, $reactor -> getVelocidad());
	}

	function test_flujo() {
		$reactor = new Reactor();
		$this -> assert_equals(300, $reactor -> getFlujo());
	}

	function test_calcular() {
		$reactor = new Reactor();
		$reactor -> calcular(0, 0, 30, 140);
		$this -> assert_equals(50, $reactor -> getTiempo());
		$reactor -> calcular(0, 0, 0, 100);
		$this -> assert_equals("Infinito", $reactor -> getTiempo());
		$reactor -> calcular(20, 50, 40, 170);
		$this -> assert_equals(0, $reactor -> getTiempo());
	}

}
?>