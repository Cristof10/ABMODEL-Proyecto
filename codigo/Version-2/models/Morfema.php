<?php 

class Morfema {

    private $morfemaID;
    private $morfemaSanskrit;
    private $morfemaSpanish;
    private $morfemaEnglish;

    public function __construct($datos) {
        $this->morfemaID = $datos['morfemaID'];
        $this->morfemaSanskrit = $datos['morfemaSanskrit'];
        $this->morfemaSpanish = $datos['morfemaSpanish'];
        $this->morfemaEnglish = $datos['morfemaEnglish'];
    }

    public function getMorfemaID() {
        return $this->morfemaID;
    }

    public function setMorfemaID($morfemaID) {
        $this->morfemaID = $morfemaID;
    }

    public function getMorfemaSanskrit() {
        return $this->morfemaSanskrit;
    }

    public function setMorfemaSanskrit($morfemaSanskrit) {
        $this->morfemaSanskrit = $morfemaSanskrit;
    }

    public function getMorfemaSpanish() {
        return $this->morfemaSpanish;
    }

    public function setMorfemaSpanish($morfemaSpanish) {
        $this->morfemaSpanish = $morfemaSpanish;
    }

    public function getMorfemaEnglish() {
        return $this->morfemaEnglish;
    }

    public function setMorfemaEnglish($morfemaEnglish) {
        $this->morfemaEnglish = $morfemaEnglish;
    }
}

?>