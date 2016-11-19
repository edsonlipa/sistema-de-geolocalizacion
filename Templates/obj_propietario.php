<?php
class obj_propietario
{
    private $idP;
    private $licenciaP;
    private $placaP;
    function __construct()
    {
        $this->idP=null;
        $this->licenciaP=null;
        $this->placaP=null;
    }

    public function getIdP()
    {
        return $this->idP;
    }

    public function setIdP($idP)
    {
        $this->idP = $idP;
    }

    public function getLicenciaP()
    {
        return $this->licenciaP;
    }

    public function setLicenciaP($licenciaP)
    {
        $this->licenciaP = $licenciaP;
    }

    public function getPlacaP()
    {
        return $this->placaP;
    }

    public function setPlacaP($placaP)
    {
        $this->placaP = $placaP;
    }
    public function unsetPropietario()
    {
        $this->idP=null;
        $this->licenciaP=null;
        $this->placaP=null;
    }
    public function getPerson()
    {
        if ($this->licenciaC){
            $M_person=new modelo_persona();
            return $M_person->getPersonaByLicencia($this->licenciaP);
        }
        else{
            return 0;
        }
    }
    public function getAuto()
    {
        if ($this->placaP){
            $M_auto=new modelo_auto();
            return $M_auto->getAutoByPlaca($this->placaP);
        }
        else{
            return 0;
        }
    }
}