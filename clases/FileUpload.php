<?php

// Resumen general de métodos de la clase:
// Tamaño, destino, nombre, controlar tipo, controlar archivo

class FileUpload {

    private $destino = "./", $nombre = "", $tamaño = 100000000000000000000000, $parametro;
    const CONSERVAR = 1, REEMPLAZAR = 2, RENOMBRAR = 3;
    private $error = false, $politica = self::RENOMBRAR;
    private $subido = false;
    
// Tipo archivos
    private $arrayDeTipos = array(
        "jpg" => 1,
        "gif" => 1,
        "png" => 1,
        "jpeg" => 1,
        "mp3" => 1
    );
    private $extension;

    public function __construct($parametro) {
        if (isset($_FILES[$parametro]) && $_FILES[$parametro]["name"] !== "") {
            $this->parametro = $parametro;
            $nombre = $_FILES[$this->parametro]["name"];
            $trozos = pathinfo($nombre);
            $extension = $trozos["extension"];
            $this->nombre = $trozos["filename"];
            $this->extension = $extension;
        } else {
            
        }
    }

    function getDestino() {
        return $this->destino;
    }

    function getNombre() {
        return $this->nombre . '.' . $this->extension;
    }
    
    static function getNombreA(){
        return $this->nombre . '.' . $this->extension;
    }

    function getTamaño() {
        return $this->tamaño;
    }

    function setDestino($destino) {
        $this->destino = $destino;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTamaño($tamaño) {
        $this->tamaño = $tamaño;
    }
    
    function getPolitica() {
        return $this->politica;
    }

    function setPolitica($politica) {
        $this->politica = $politica;
    }

    
    function upload() {
        if($this->subido){
            echo "1";
            return false;
        }
        if ($this->error) {
            echo "2";
            return false;
        }
        if ($_FILES[$this->parametro]["error"] != UPLOAD_ERR_OK) {
            echo $_FILES[$this->parametro]["error"];
            return false;
        }
        if ($_FILES[$this->parametro]["size"] > $this->tamaño) {
            echo "4";
            return false;
        }
        if (!$this->isTipo($this->extension)) {
            echo "5";
            return false;
        }
        if (!(is_dir($this->destino) && substr($this->destino, -1) === "/")){
            echo "6";
            return false;
        }
        $nombre = $this->nombre;
        if($this->politica === self::CONSERVAR && file_exists($this->destino . $nombre . "." . $this->extension)){
            echo "7";
            return false;
        }
        if($this->politica === self::RENOMBRAR && file_exists($this->destino . $nombre . "." . $this->extension)){
            $nombre = $this->renombrar($nombre);
            
        }

        $this->subido = true;
        return move_uploaded_file($_FILES[$this->parametro]["tmp_name"], $this->destino . $nombre . "." . $this->extension);
    }

    private function renombrar($nombre){
        $i=1;
        while(file_exists($this->destino . $nombre . "_" . $i . "." . $this->extension)){
            $i++;
        }
        return $nombre . "_" . $i;
    }
    
    public function addTipo($tipo) {
        if (!$this->isTipo($tipo)) {
            $this->arrayDeTipos[$tipo] = 1;
            return true;
        }
        return false;
    }

    public function removeTipo($tipo) {
        if ($this->isTipo($tipo)) {
            unset($this->arrayDeTipos[$tipo]);
            return true;
        }
        return false;
    }

    public function isTipo($tipo) {
        return isset($this->arrayDeTipos[$tipo]);
    }

    public function converArray($array){
        
    }
}
