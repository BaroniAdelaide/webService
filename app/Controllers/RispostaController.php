<?php

namespace App\Controllers;

use App\Models\RispostaModel;
use CodeIgniter\API\ResponseTrait;

class RispostaController extends BaseController
{
    public function get($id = null)
    {
        $rispostaModel = new RispostaModel();
        if($id){
            $data = $rispostaModel->get($id);
        }
        else{
            $data = $rispostaModel->get();
        }
        
        $data = json_encode($data);
        return $this->response
            ->setStatusCode(200)
            ->setJSON($data);
    }

    public function create(){
        $row = [
            "risposta" => $this->request->getVar("risposta"),
            "corretta" => $this->request->getVar("corretta")
        ];

        $rispostaModel = new RispostaModel();
        $row = $rispostaModel->create($row);

        return $this->response
            ->setStatusCode(200, "Risposta aggiunta")
            ->setJSON($row);
    }
    
    public function put(){
        $rispostaModel = new RispostaModel();
        $body = get_object_vars(json_decode($this->request->getBody()));
        $updatedData = $rispostaModel->put($body);
        
        return $this->response
            ->setStatusCode(200)
            ->setJSON($updatedData);
    }
}
