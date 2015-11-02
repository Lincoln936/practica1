<?php

class Cancion {
    
//    public $array = array();
    private $nombre="";
    
    function __construct($nombre) {
        $this->nombre = $nombre;
        //$this->array.add($nombre);
    }

//    static function getArray() {
//        return $this->array;
//    }

    function getNombre() {
        return $this->nombre;
    }
//
//    function setArray($array) {
//        $this->array = $array;
//    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
