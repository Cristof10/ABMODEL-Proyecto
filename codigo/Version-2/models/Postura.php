<?php 
class Postura {

    private $terminoID;
    private $terminoEnglish;
    private $terminoSanskrit;
    private $terminoSpanish;
    private $imagenURL;
    private $videoURL;
    private $morfemas;

    public function __construct($datos) {
        $this->terminoID = $datos['terminoID'];
        $this->terminoEnglish = $datos['terminoEnglish'];
        $this->terminoSanskrit = $datos['terminoSanskrit'];
        $this->terminoSpanish = $datos['terminoSpanish'];
        $this->imagenURL = $datos['imagenURL'];
        $this->videoURL = $datos['videoURL'];
        $this->morfemas = isset($datos['morfemas']) ? $datos['morfemas'] : [];
    }
    
    public function getTerminoID() {
        return $this->terminoID;
    }

    public function setTerminoID($terminoID) {
        $this->terminoID = $terminoID;
    }

    public function getTerminoEnglish() {
        return $this->terminoEnglish;
    }

    public function setTerminoEnglish($terminoEnglish) {
        $this->terminoEnglish = $terminoEnglish;
    }

    public function getTerminoSanskrit() {
        return $this->terminoSanskrit;
    }

    public function setTerminoSanskrit($terminoSanskrit) {
        $this->terminoSanskrit = $terminoSanskrit;
    }

    public function getTerminoSpanish() {
        return $this->terminoSpanish;
    }

    public function setTerminoSpanish($terminoSpanish) {
        $this->terminoSpanish = $terminoSpanish;
    }

    public function getImagenURL() {
        return $this->imagenURL;
    }

    public function setImagenURL($imagenURL) {
        $this->imagenURL = $imagenURL;
    }

    public function getVideoURL() {
        return $this->videoURL;
    }

    public function setVideoURL($videoURL) {
        $this->videoURL = $videoURL;
    }

    public function getMorfemas() {
        return $this->morfemas;
    }

    public function setMorfemas($morfemas) {
        $this->morfemas = $morfemas;
    }

    public function agregarMorfema(Morfema $morfema) {
        $this->morfemas[] = $morfema;
    }

    public function eliminarMorfema(Morfema $morfema) {
        foreach ($this->morfemas as $key => $m) {
            if ($m->getMorfemaID() == $morfema->getMorfemaID()) {
                unset($this->morfemas[$key]);
                break;
            }
        }

        $this->morfemas = array_values($this->morfemas);
    }
}


?>