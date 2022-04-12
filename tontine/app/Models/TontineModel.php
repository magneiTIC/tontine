<?php
namespace App\Models;
use CodeIgniter\Model;

class TontineModel extends Model{
    protected $table="tontine";
    protected $allowedFields =["nom","periodicite","nbEcheance","idAdherent","dateDebut","dateFin"];

    function listeTontineResp($idAdh){
        return $this->where('idAdherent',$idAdh)
                    ->findAll();
    }
    function tontine($idtontine){
        return $this->where('idTontine',$idtontine)
                    ->first();
        ;

    }
    function listeTontines($idAdherent){
        
        // 1. liste des tontines dont participe l'adherent
        $listPart=$this->builder("participer")
                        ->distinct()
                        ->select('idTontine')
                        ->where('idAdherent',$idAdherent)->get()->getResultArray();
      
      //2. les idTontine de 1. dans un tableau
        $idTon=[];
        foreach ($listPart as $tp ) {
            # code...
            $idTon[]=$tp["idTontine"];
        
        }
       //3. liste des tontines dont l'adherent ne participe pas      
            if ($idTon) {
                # code...
                $this->whereNotIn("idTontine",$idTon);            
            }
            return $this->findAll();


    }
}

?>