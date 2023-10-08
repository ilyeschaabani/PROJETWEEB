<?php
class Reclamation {
    private $idR;
    private $typeR;
    private $descriptionR;

    public function __construct($typeR, $descriptionR) {
        $this->typeR = $typeR;
        $this->descriptionR = $descriptionR;
    }

    public function getidR() {
        return $this->idR;
    }

    public function setidR($idR) {
        $this->idR = $idR;
    }

    public function gettypeR() {
        return $this->typeR;
    }

    public function settypeR($typeR) {
        $this->typeR = $typeR;
    }

    public function getdescriptionR() {
        return $this->descriptionR;
    }

    public function setdescriptionR($descriptionR) {
        $this->descriptionR = $descriptionR;
    }
}
?>