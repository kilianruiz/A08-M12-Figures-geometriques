<?php

class FiguraGeometrica{
    public $tipoFigura;
    public $lado1;

function __construct($tipoFigura, $lado1){
  $this->tipoFigura=$tipoFigura;
  $this->lado1=$lado1; 
}
public function __destruct() {
    echo "Se ha destruido $this->tipoFigura.";
}
function getTipoFigura(){
    return $this->tipoFigura;  
}
function getlado1(){
    return $this->lado1;
}
public function setTipoFigura($tipoFigura) {
    $this->tipoFigura = $tipoFigura;
}

public function setLado1($lado1) {
    $this->lado1 = $lado1;
}
public function calcularArea() {
    echo "Aquest mètode ha de ser sobreescrit si és necessari per calcular l'àrea.";
}
}



?>

