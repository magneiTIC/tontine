<?php
namespace App\Models;
use CodeIgniter\Model;

class EcheanceModel extends Model {
    protected $table="echeance";
    protected $allowedFields=["idTontine","date","numero"];

    function generer($tabEcheance){
        return $this->insertBatch($tabEcheance);
    }

    function echeancesTontine($idTontine){
        return $this->where('idTontine',$idTontine)->findAll();
    }
}

