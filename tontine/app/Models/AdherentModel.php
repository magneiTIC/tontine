<?php
namespace App\Models;
use CodeIgniter\Model;

class AdherentModel extends Model{
    protected $table="adherent";
    protected $allowedFields =["nom","prenom","login","motPasse","profil"];


function participer($idTontine){
    return $this->join("participer as p","p.idAdherent=adherent.idAdherent")
                ->join ("tontine as t","t.idTontine=p.idTontine")
                ->where("t.idTontine",$idTontine)
                ->findAll()
                ;
}

function cotiser($idTontine){
    $cotis=$this->selectCount('adherent.idAdherent','nbCotis')
                ->select('adherent.idAdherent')
                ->join('cotiser c','c.idAdherent=adherent.idAdherent')
                ->join('echeance e','e.idEcheance=c.idEcheance')
                ->where('e.idTontine',$idTontine)
                ->groupBy('adherent.idAdherent')
                ->get()->getResultArray();
    $cotisations=[];
    foreach ($cotis as $coti)
        $cotisations[$coti['idAdherent']]=$coti['nbCotis'];
    return $cotisations;
}

function listerUser(){
    return $this->where('profil','adherent');
}

}

?>