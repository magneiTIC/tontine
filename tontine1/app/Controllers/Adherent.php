<?php

namespace App\Controllers;
use App\Models\TontineModel; 
use App\Models\AdherentModel; 
use App\Models\ParticipeModel; 
use App\Models\EcheanceModel; 
use App\Models\CotiseModel; 




use CodeIgniter\I18n\Time;
use CodeIgniter\I18n;

helper(['html','form']);

class Adherent extends BaseController
{
    public function index()
    {
        $data=[
            'titre'=>'Sama Tontine::Acceuil',
            'menuActif'=> 'adherentAcceuil',
        ];
    
        $tontine= new TontineModel();
        $idAdherent=session()->get('id');
        $listeTontineResp=$tontine->ListeTontineresp($idAdherent);
        $data['listeTontineResp']=$listeTontineResp;
        

        echo view('layout/entete',$data);
        echo view('adherent/index');
        echo view('layout/pied');
    }

    public function payerEcheance($idAdherent,$idTontine,$idEcheance){
        $modelCotise=new CotiseModel();
        $modelCotise->insert(['idAdherent'=>$idAdherent,'idEcheance'=>$idEcheance]);
        $session=session();
        $session->setFlashdata('successAjoutCotise','cotisation enregistree');
        return redirect()->to("adherent/tontine/$idTontine");
    }

    public function genererEcheance($idTontine){
        $model = new TontineModel();
        $maTontine=$model->tontine($idTontine);
        $dateDeb=Time::createFromFormat('Y-m-d',$maTontine["dateDebut"]);
        $tabEcheance=[];
        for($i=1;$i<=$maTontine["nbEcheance"];$i++){
            $tabEcheance[]=['date'=>$dateDeb->toDateString(),
                            'numero'=>$i,
                            'idTontine'=>$idTontine
                            ];
            if($maTontine["periodicite"]=="mensuelle"){
                $dateDeb=$dateDeb->addMonths(1);
            }
            else{
                $dateDeb=$datDeb->addDays(7);

            }
        }
        $modelEcheance=new EcheanceModel();
        $nbInserer=$modelEcheance->generer($tabEcheance);
        $session=session();
        $session->setFlashData('successAjoutEcheance',$nbInserer.'echeances ajoutees');
        return redirect()->to("adherent/tontine/$idTontine");
        
    }

    public function adhererTontine($idTontine){
        $data=[
            'titre'=>'Sama Tontine::Adhesion',
            'menuActif'=> 'adhesion',
        ];
        if($this->request->getMethod()=='post'){
            $reglesValid=[
                // "montant"=>["rules"=>"required | integer",
                //             "errors"=>["required"=>"le montant est obligatoire",
                //                         "integer"=>"le montant doit etre un nombre"
                //                     ]
                // ]
            ];
            if ($this->validate($reglesValid)) {
                # code...
                $data["validation"]=$this->validator;
            }else {
                $participeData=[
                    "idTontine"=>$this->request->getPost('idTontine'),
                    "montant"=>$this->request->getPost('montant'),
                    "idAdherent"=>session()->get('id')
                ];
                $participe= new ParticipeModel();
                $participe->insert($participeData);
                $session=session();
                $session->setFlashdata('successAjoutAdhesion','Adhesion effectuee');
                return redirect()->to('adherent/adhesion');
            }
        }
        else{
            $data["idTontine"]=$idTontine;
        }
        echo view('layout/entete',$data);
        echo view('adherent/ajoutAdhesion');
        echo view('layout/pied');
    }

    public function adhesion(){
        $data=[
            'titre'=>'Sama Tontine::Adhesion',
            'menuActif'=> 'adhesion',
        ];

        $tontine= new TontineModel();
        $idAdherent=session()->get('id');
        $listeTontines=$tontine->listeTontines($idAdherent);
        $data['listeTontines']=$listeTontines;
        

        echo view('layout/entete',$data);
        echo view('adherent/adhesion');
        echo view('layout/pied');
    }
    

    public function tontine($idTontine){
        $data=[
            'titre'=>'Sama Tontine::Acceuil',
            'menuActif'=> 'adherentAcceuil',
        ];
        $tontine= new TontineModel();
        $maTontine=$tontine->tontine($idTontine);
        $data['maTontine']=$maTontine;

        $modelAd=new AdherentModel();
        $participants=$modelAd->participer($idTontine);
        $data['participants']=$participants;

        $modelEcheance= new EcheanceModel();
        $echeances=$modelEcheance->echeancesTontine($idTontine);
        $data['echeances']=$echeances;
        

        $cotisations=$modelAd->cotiser($idTontine);
        $data['cotisations']=$cotisations; 

        echo view('layout/entete',$data);
        echo view('adherent/tontine');
        echo view('layout/pied');
    
    }

    public function ajoutTontine (){
        $data=[
            'titre'=>'Sama Tontine::Acceuil',
            'menuActif'=> 'adherentAcceuil',
        ];
        $data['periodicite']=["mensuelle"=>"mensuelle",
                                "hebdomadaire"=>"hebdomadaire"
                             ];
        $data['nbEcheance']=[1=>1,2,3,4,5,6,7,8,9,10,11,12]; 
        if($this->request->getMethod()=='post'){
            $reglesValid=[
                "label"=>["rules"=>"required",
                          "errors"=>["required","le label de la tontine est obligatoire"]
                ],
                "periodicite"=>["rules"=>"required",
                          "errors"=>["required","le periodicite de la tontine est obligatoire"]
                ],
                "dateDeb"=>["rules"=>"required|valid_date[d/m/Y]",
                          "errors"=>["required"=>"Date de debut obligatoire",
                                     "valid_date"=>"Date non valide"
                                    ]
                ],
                "nbEcheance"=>["rules"=>"required",
                          "errors"=>["required"," nbEcheance  obligatoire"]
                ]
            ];
            if ($this->validate($reglesValid)) {
                # code...
                $data["validation"]=$this->validator;
            }else {
                # code...
                // $dateDeb=Time::createFromFormat('d/m/Y',$this->request->getPost('dateDeb'));
                $dateDeb=$this->request->getPost('dateDeb');
                $tontineData=[
                    "nom"=>$this->request->getPost('label'),
                    "periodicite"=>$this->request->getPost('periodicite'),
                    "dateDebut"=>$dateDeb,
                    // ->date_format("Y/m/d"),
                    "nbEcheance"=>$this->request->getPost("nbEcheance"),
                    "idAdherent"=>session()->get('id')
                ];
                $tontine = new TontineModel();
                $tontine->insert($tontineData);
                $session=session();
                $session->setFlashdata('successAjoutTontine','Tontine bien ajoutee');
                return redirect()->to('adherent');
            }
        }
        
        echo view('layout/entete',$data);
        echo view('adherent/ajoutTontine');
        echo view('layout/pied');
    }
   public function modifTontine($idTontine){
    $data=[
        'titre'=>'Sama Tontine::Acceuil',
        'menuActif'=> 'adherentAcceuil', 
    ];
    $tontine = new TontineModel();
    if($this->request->getMethod()=='post'){
        $reglesValid=[
            "label"=>["rules"=>"required",
                      "errors"=>["required","le label de la tontine est obligatoire"]
            ],
            "periodicite"=>["rules"=>"required",
                      "errors"=>["required","le periodicite de la tontine est obligatoire"]
            ],
            "dateDeb"=>["rules"=>"required|valid_date[d/m/Y]",
                      "errors"=>["required"=>"Date de debut obligatoire",
                                 "valid_date"=>"Date non valide"
                                ]
            ],
            "nbEcheance"=>["rules"=>"required",
                      "errors"=>["required"," nbEcheance  obligatoire"]
            ]
        ];
        if ($this->validate($reglesValid)) {
            # code...
            $data["validation"]=$this->validator;
        }else {
            # code...
            // $dateDeb=Time::createFromFormat('d/m/Y',$this->request->getPost('dateDeb'));
            $dateDeb=$this->request->getPost('dateDeb');
            $tontineData=[
                "idTontine"=>$this->request->getPost('idTontine'),
                "nom"=>$this->request->getPost('label'),
                "periodicite"=>$this->request->getPost('periodicite'),
                "dateDebut"=>$dateDeb,
                // ->date_format("Y/m/d"),
                "nbEcheance"=>$this->request->getPost("nbEcheance"),
                "idAdherent"=>session()->get('id')
            ];
            $tontine->save($tontineData);
            $session=session();
            $session->setFlashdata('successAjoutTontine','Tontine modifiee');
            return redirect()->to('adherent');
        }
    }
    else{
        $maTontine=$tontine->tontine($idTontine);
        $dateDeb=$this->request->getPost('dateDeb');
        $maTontine["dateDebut"]=$dateDeb;
        $data["tontine"]=$maTontine;

    }
    
    echo view('layout/entete',$data);
    echo view('adherent/modificationTontine');
    echo view('layout/pied');

   }
   public function suppTontine($idTontine){
       $tontine=new TontineModel();
       $tontine->where('idTontine',$idTontine)->delete();
       $session=session();
       $session->setFlashdata('successAjoutTontine','suppression reussie');
       return redirect()->to( base_url().'/adherent');
   }
}
