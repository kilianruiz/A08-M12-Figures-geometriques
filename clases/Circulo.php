<?php

require_once('FiguraGeometrica.php');

class Circulo extends FiguraGeometrica{
    function __construct($lado1){
        parent::__construct('Circulo', $lado1);
    }
    function __destruct(){
        echo "Se ha eliminado el circulo";
    }
    function getLado1(){
        return $this->lado1;
    }
    function calcularArea(){
        return pi() * pow($this->lado1, 2);
    }
    function calcularPerimetro(){
        return 2 * pi() * $this->lado1;
    }
    public function __toString() {
        $radio = $this->getLado1();
        return "Figura de tipo $this->tipoFigura, radio: $radio. "
            . "Àrea: " . $this->calcularArea() . ", Perímetre: " . $this->calcularPerimetro();
    }
}