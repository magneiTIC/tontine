<?php

namespace App\Controllers;
use App\Models\TontineModel; 
use App\Models\AdherentModel; 




use CodeIgniter\I18n\Time;
use CodeIgniter\I18n;

helper(['html','form']);

class Administrateur extends BaseController
{
    public function index()
    {
        $data=[
            'titre'=>'Sama Tontine::Acceuil',
            'menuActif'=> 'administrateurAcceuil',
        ];
    
        $tontine= new TontineModel();
        $idAdministrateur=session()->get('id');
        

        echo view('layout/entete',$data);
        echo view('Administrateur/index');
        echo view('layout/pied');
    }

    public function gestion(){
        $data=[
            'titre'=>'Sama Tontine::Acceuil',
            'menuActif'=> 'gestionUtilisateur',
        ];
    
        $list= new AdherentModel();
        $list->listerUser;
        $data['listeUser']=$list;


        echo view('layout/entete',$data);
        echo view('Administrateur/gestion');
        echo view('layout/pied');
    }
    
}