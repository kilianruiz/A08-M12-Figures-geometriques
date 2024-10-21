<?php
require_once('FiguraGeometrica.php');

class Triangulo extends FiguraGeometrica{
    public $lado2;
    public $lado3;

    function __construct($lado1, $lado2, $lado3){
            parent::__construct('Triangulo', $lado1);
            $this->lado2=$lado2;
            $this->lado3=$lado3;
        }
    function __destruct(){
        echo "Se ha destruido $this->tipoFigura";
    }

    function getlado2(){
        return $this->lado2;
    }
    function getlado3(){
        return $this->lado3;
    }
    function setlado2($lado2){
        $this->lado2=$lado2;
    }
    function setlado3($lado3){
        $this->lado3=$lado3;
    }

    public function calcularArea() {
        $lado1 = $this->getLado1();
        $s = ($lado1 + $this->lado2 + $this->lado3) / 2; 
        $area = sqrt($s * ($s - $lado1) * ($s - $this->lado2) * ($s - $this->lado3));
        return $area;
    }

    public function calcularPerimetre() {
        $lado1 = $this->getLado1();
        return $lado1 + $this->lado2 + $this->lado3;
    }

    public function __toString() {
        $lado1 = $this->getLado1();
        return "El triangulo es de tipo $this->tipoFigura con $lado1, $this->lado2 i $this->lado3. "
            . "Àrea: " . $this->calcularArea() . ", Perímetre: " . $this->calcularPerimetre();
    }
}