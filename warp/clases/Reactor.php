<?php
class Reactor {
	
	private $inyectores;
	private $velocidad;
	private $tiempo;

	function __construct() {
		$this -> velocidad = 100;
		$inyectorA = new Inyector();
		$inyectorB = new Inyector();
		$inyectorC = new Inyector();
		$this -> inyectores = array($inyectorA, $inyectorB, $inyectorC);
	}

	public function getInyectores() {
		return $this -> inyectores;
	}

	public function setVelocidad($velocidad) {
		$this -> velocidad = $velocidad;
	}

	public function getVelocidad() {
		return $this -> velocidad;
	}

	public function getFlujo() {
		$flujoreactor = 0;
		foreach ($this->inyectores as $inyector) {
			$flujoreactor = $inyector -> getFlujo() + $flujoreactor;
		}
		return $flujoreactor;
	}
	
	public function getTiempo(){
		return $this->tiempo;
	}

	public function calcular($a, $b, $c, $vel) {
		$reactor = new Reactor();
		$inyectores = $reactor -> getInyectores();
		$inyectores[0] -> setDaño($a);
		$inyectores[1] -> setDaño($b);
		$inyectores[2] -> setDaño($c);
		$reactor -> setVelocidad($vel);
		$totalinyectores = count($reactor -> getInyectores());
		$capacidadnecesaria = $reactor -> getVelocidad() * $totalinyectores;
		$diferencia = ($capacidadnecesaria - $reactor -> getFlujo());
		$inactivos = 0;
		foreach (($reactor -> getInyectores()) as $in) {
			if ($in -> getFlujo() == 0) {
				$inactivos = $inactivos + 1;
			}
		}

		$activos = $totalinyectores - $inactivos;
		$overflow = $diferencia / $activos;
		$this -> capextra = $overflow;

		for ($i = 0; $i < $activos; $i++) {
			if (($inyectores[$i] -> getFlujo() + $overflow) > $inyectores[$i] -> getCapacidad()) {
				$inyec[$i] = "Unable to comply";

			} else {
				$inyec[$i] = $inyectores[$i] -> getFlujo() + $overflow;
			}
		}

		$tiempo = 100 - $overflow;
		if ($tiempo < 0) {
			$tiempo = 0;
		} elseif ($tiempo >= 100) {
			$tiempo = "Infinito";
		}
		
		$this->tiempo = $tiempo;

		echo "<h3>Resultados: </h3>";
		foreach ($inyec as $in) {
			echo "<h4>Inyector :</h5>" . $in ." mg/s"."</br>";
		}

		echo "<h4>Tiempo de funcionamiento: </h5>" . $tiempo ." min"."</br>";
	}

}
?>