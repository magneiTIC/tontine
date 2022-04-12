<?php

namespace App\Controllers;
use App\Models\AdherentModel;
helper(['html','form']);

class Utilisateur extends BaseController
{
    public function index()
    {
        $data=[
            'titre'=>'Sama Tontine::Connexion',
            'menuActif'=> 'connexion',
        ];

        if($this->request->getMethod()=='post'){
            $reglesValid=[
                "login"=>["rules" =>"required",
                          "errors"=>["required"=>"le login est obligatoire"]],
                "motPasse"=>["rules"=>"required|validateUser[login,motPasse]",
                             "errors"=>["required"=>"Le mot de passe est obligatoire",
                                         "validateUser" => "Email et/ou mot de passe incorrect(s)" ]]
                 
            ];
            if( ! $this->validate($reglesValid)){
                $data["validation"]=$this->validator;
            }else {
                $model=new AdherentModel();
                $user=$model->where('login',$this->request->getPost('login'))
                            ->where('motPasse',$this->request->getPost('motPasse'))
                            ->first();
                $dataSession=[
                    "id"=>$user["idAdherent"],
                    "nom"=>$user["nom"],
                    "prenom"=>$user["prenom"],
                    "login"=>$user["login"],
                    "profil"=>$user["profil"],
                ];
                session()->set($dataSession);
                // return redirect()->to(base_url($user['profil']));
                return redirect()->to(base_url($user['profil']));

            }       
        }

        echo view('layout/entete',$data);
        echo view('utilisateur/index');
        echo view('layout/pied');

    }

    public function deconnexion(){
        session()->destroy();
        return  redirect()->to('utilisateur/deconnexionMessage');
    }

    public function deconnexionMessage(){
        $session=session();
        $session->setFlashdata('success','Deconnexion reussie');
        return redirect()->to('utilisateur');
    }

    public function inscription()
    {  
        $data=[
            'titre'=>'Sama Tontine::Inscription',
            'menuActif'=> 'inscription',
        ];       

        if($this->request->getMethod()=='post'){

            $reglesValid=[
                "nom"=>["rules" =>"required","errors"=>["required"=>"le nom est obligatoire"]],
                "prenom"=>["rules" =>"required","errors"=>["required"=>"le prenom est obligatoire"]],
                "login"=>["rules" =>"required","errors"=>["required"=>"le login est obligatoire",
                                                          "min_length"=> "le login doit comporter au moins 6 caracteres"   ]],
                "motPasse"=>["rules"=>"required|min_length[6]","errors"=>["required"=>"Le mot de passe est obligatoire",
                                                                 "min_length"=> "le mot de passe doit comporter au moins 6 caracteres" ]],
                // "motPasseConf"=>["rules"=> "required|matches [motPasse]","errors"=>["required"=>"La confirmation est obligatoire",
                //                                                  "matches"=>"la confirmation doit etre identique au mot de passe " ]],                                 

            ];
            if(!$this->validate($reglesValid)){
                $data['validation']=$this->validator;
            }
            else{
                $adherentData=[
                    "nom"=>$this->request->getPost('nom'),
                    "prenom"=>$this->request->getPost('prenom'),
                    "login"=>$this->request->getPost('login'),
                    "motPasse"=>$this->request->getPost('motPasse'),
                    "profil"=>"adherent"
                ];
                $adherent= new AdherentModel();
                $adherent->insert($adherentData);  
                $session=session();
                $session->setFlashdata('success',"Inscription reussie,Connectez-vous")  ;
            //    return d($adherentData);
                return  redirect()->to('utilisateur');           
            }
           

        }
        echo view('layout/entete',$data);
        echo view('utilisateur/inscription');
        echo view('layout/pied');

    }
}
