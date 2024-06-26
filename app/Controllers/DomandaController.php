<?php

namespace App\Controllers;

use App\Models\DomandaModel;
use App\Models\RispostaModel;

class DomandaController extends BaseController
{
    public function get($id = null)
    {
        $domandaModel = new DomandaModel();
        if($id){
            $data = $domandaModel->get($id);
        }
        else{
            $data = $domandaModel->get();
        }

        if(count($data) > 0){
            $data = json_encode($data);
            return $this->response
                ->setStatusCode(200)
                ->setJSON($data);
        }
        else{
            return $this->response->setStatusCode(404, "Nessun record corrisponde all'id");
        }
    }

    public function create(){
        $domandaModel = new DomandaModel();
        $rispostaModel = new RispostaModel();

        $body = get_object_vars(json_decode($this->request->getBody()));
        $domanda = array_slice($body, 0, 3);

        $domandaModel->create($domanda);
        
        foreach($body["risposte"] as $obj){
            $risposta = get_object_vars($obj);
            $risposta["id_domanda"] = $domanda["id_domanda"];
            $rispostaModel->create($risposta);
            array_push($domanda["risposte"], $risposta);
        }

        

        return $this->response
            ->setStatusCode(200)
            ->setJSON($domanda);
    }


    public function put(){
        $domandaModel = new DomandaModel();
        $body = get_object_vars(json_decode($this->request->getBody()));
        $updatedData = $domandaModel->put($body);
        
        return $this->response
            ->setStatusCode(200)
            ->setJSON($updatedData);
    }

    public function delete($id){
        $domandaModel = new DomandaModel();
        $domandaModel->deleteWhere($id);
        return $this->response
            ->setStatusCode(200);

    }
}