<?php

require_once "/clases/Inyector.php";

class TestCaseInyector extends TestCase {
	function test_inyector() {
		$inyector = new Inyector();
		$this -> assert_true($inyector instanceof Inyector);
		$this -> assert_equals(100,$inyector->getFlujo());
	}
	
	function test_flujo(){
		$inyector = new Inyector();
		$inyector->setDaño(70);
		$this -> assert_equals(30,$inyector->getFlujo());
		$inyector->setDaño(110);
		$this -> assert_equals(0,$inyector->getFlujo());
	}
	
	function test_capacidad(){
		$inyector = new Inyector();
		$inyector->setDaño(20);
		$this -> assert_equals(179,$inyector->getCapacidad());
	}
	
}


?>