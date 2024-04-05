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

        $quiz = array_slice($body, 0, 3);
        $quizModel->create($quiz);

        foreach($body["domande"] as $obj){
            $domandaRaw = get_object_vars($obj);
            $domanda = array_slice($domandaRaw, 0, 2);
            $domandaModel->create($quiz["id_quiz"], $domanda);
            foreach($domandaRaw["risposte"] as $obj){
                $risposta = get_object_vars($obj);
                $rispostaModel->create($risposta);
                array_push($domanda["risposte"], $risposta);

            }
            array_push($quiz["domande"], $domanda);

        }

        return $this->response
            ->setStatusCode(200)
            ->setBody(json_encode($quiz));
    }

    public function put(){
        $quizModel = new QuizModel();
        $body = get_object_vars(json_decode($this->request->getBody()));
        $updatedData = $quizModel->put($body);
        
        return $this->response
            ->setStatusCode(200)
            ->setBody(json_encode($updatedData));
    }
}