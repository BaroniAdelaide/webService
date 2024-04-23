<?php

namespace App\Controllers;
use App\Models\QuizModel;
use App\Models\DomandaModel;
use App\Models\RispostaModel;

class QuizController extends BaseController
{
    
    public function get($id = null)
    {
        $quizModel = new QuizModel();
        if($id){
            $data = $quizModel->get($id);
            $domandaModel = new DomandaModel();
            $rispostaModel = new RispostaModel();
            $data["domande"] = $domandaModel->getWhereQuiz($id);
            foreach ($data["domande"] as $domanda) {
                $domanda["risposte"] = $rispostaModel->getWhereDomanda($domanda["id_domanda"]);
            }
        }
        else{
            $data = $quizModel->get();
        }

        return $this->response
            ->setStatusCode(200)
            ->setBody(json_encode($data));
    }

    public function create(){
        $quizModel = new QuizModel();
        $domandaModel = new DomandaModel();
        $rispostaModel = new RispostaModel();
        $body = get_object_vars(json_decode($this->request->getBody()));

        //inserisci quiz
        $quiz = array_slice($body, 0, 3);
        $quizModel->create($quiz);

        foreach($body["domande"] as $obj){
            //inserisci domanda
            $domandaRaw = get_object_vars($obj);
            $domanda = array_slice($domandaRaw, 0, 2);
            $domanda["id_quiz"] = $quiz["id_quiz"];
            $domandaModel->create($domanda);

            foreach($domandaRaw["risposte"] as $obj){
                //inserisci risposta
                $risposta = get_object_vars($obj);
                $risposta["id_domanda"] = $domanda["id_domanda"];
                $rispostaModel->create($risposta);
                array_push($domanda["risposte"], $risposta);
            }
            array_push($quiz["domande"], $domanda);
        }

        
        return $this->response
            ->setStatusCode(200)
            ->setJSON($quiz);
    }

    public function put(){
        $quizModel = new QuizModel();
        $body = get_object_vars(json_decode($this->request->getBody()));
        $updatedData = $quizModel->put($body);
        
        return $this->response
            ->setStatusCode(200)
            ->setJSON($updatedData);
    }

    public function delete($id){
        $quizModel = new QuizModel();
        $quizModel->deleteWhere($id);
        return $this->response
            ->setStatusCode(200);

    }
}