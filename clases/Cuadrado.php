<?php

require_once('FiguraGeometrica.php');

class Cuadrado extends FiguraGeometrica{

    function __construct($lado1){
        parent::__construct('Cuadrado', $lado1);
    }
    function __destruct(){
        echo "Se ha destruido $this->tipoFigura";
    }

    function getLado1(){
        return $this->lado1;
    }
    function calcularArea()
    {
        return ($this->lado1) * ($this->lado1);
    }

    function calcularPerimetro(){
        return 4*($this->lado1);
    }
    public function __toString() {
        return "Cuadrado: Lado1=$this->lado1, area=" . $this->calcularArea() . ", Perímetro=" . $this->calcularPerimetro();
    }
    
}