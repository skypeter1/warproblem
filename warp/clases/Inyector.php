<?php

class Inyector {

	private $daño;
	private $flujo;
	private $capacidad;

	public function __construct() {
		$this -> flujo = 100;
	}

	public function setDaño($daño) {
		$this -> daño = $daño;
		if ($daño >= 100) {
			$this -> flujo = 0;
		} else {
			$this -> flujo = $this -> flujo - $this -> daño;
		}
	}

	public function getFlujo() {
		return $this -> flujo;
	}

	public function getCapacidad() {
		$this -> capacidad = $this -> getFlujo() + 99;
		return $this -> capacidad;
	}

}
?>