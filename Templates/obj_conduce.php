<?php
require ("../Models/modelo_persona.php");
require ("../Models/modelo_auto.php");
class obj_conduce
{
    private $idC;
    private $licenciaC;
    private $placaC;
    function __construct()
    {
        $this->idC=null;
        $this->licenciaC=null;
        $this->placaC=null;
    }

    public function getIdC()
    {
        return $this->idC;
    }

    public function setIdC($idC)
    {
        $this->idC = $idC;
    }

    public function getLicenciaC()
    {
        return $this->licenciaC;
    }

    public function setLicenciaC($licenciaC)
    {
        $this->licenciaC = $licenciaC;
    }

    public function getPlacaC()
    {
        return $this->placaC;
    }

    public function setPlacaC($placaC)
    {
        $this->placaC = $placaC;
    }
    public function unsetConduce()
    {
        $this->idC=null;
        $this->licenciaC=null;
        $this->placaC=null;
    }
    public function getPerson()
    {
        if ($this->licenciaC){
            $M_person=new modelo_persona();
            return $M_person->getPersonaByLicencia($this->licenciaC);
        }
        else{
            return 0;
        }
    }
    public function getAuto()
    {
        if ($this->placaC){
            $M_auto=new modelo_auto();
            return $M_auto->getAutoByPlaca($this->placaC);
        }
        else{
            return 0;
        }
    }
}