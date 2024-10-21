<?php

require_once('FiguraGeometrica.php');

class Rectangulo extends FiguraGeometrica{
    public $lado2;

    function __construct($tipoFigura, $lado1, $lado2){
        parent::__construct($tipoFigura, $lado1);
        $this->lado2=$lado2;
    }
    function __destruct(){
        echo "Se ha destruido $this->tipoFigura";
    }
    function getlado2(){
        return $this->lado2;
    }
    function setlado2($lado2){
        $this->lado2=$lado2;
    }

    function calcularArea(){
        return $this->lado1 * $this->lado2;
    }

    function calcularPerimetro(){
        return 2*($this->lado1+$this->lado2);
    }
    public function __toString() {
        $lado1 = $this->getLado1();
        return "Rectangulo de tipo $this->tipoFigura con $lado1 i $this->lado2. "
            . "Àrea: " . $this->calcularArea() . ", Perímetre: " . $this->calcularPerimetro();
    }
}