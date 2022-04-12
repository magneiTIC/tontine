<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Session\Session;

class MembreFilter implements FilterInterface{


    public function before(RequestInterface $request,$arguments=null){

            if(! session()->get('id')){

                session()->setFlashdata('nonAutorise',"Acces non autorise");
                return redirect()->to('/utilisateur');
            }
    }

    public function after(RequestInterface $request, ResponseInterface $response ,$arguments=null){
        
    }
}