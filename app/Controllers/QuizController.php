<?php

namespace App\Controllers;
use App\Models\QuizModel;
use App\Models\DomandaModel;
use App\Models\RispostaModel;
use App\Models\QuizDomandaModel;
use App\Models\DomandaRispostaModel;

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
            ->setHeader("Access-Control-Allow-Origin: *")
            ->setBody(json_encode($data));
    }

    public function create(){
        $quizModel = new QuizModel();
        $domandaModel = new DomandaModel();
        $rispostaModel = new RispostaModel();
        $quizDomandaModel = new QuizDomandaModel();
        $domandaRispostaModel = new DomandaRispostaModel();
        $body = get_object_vars(json_decode($this->request->getBody()));

        //inserisci quiz
        $quiz = array_slice($body, 0, 3);
        $quizModel->create($quiz);

        foreach($body["domande"] as $obj){
            //inserisci domanda
            $domandaRaw = get_object_vars($obj);
            $domanda = array_slice($domandaRaw, 0, 2);
            $domandaModel->create($domanda);

            //inserisci quiz_domande
            $quizDomanda = array("id_quiz" => $quiz["id_quiz"], "id_domanda" => $domanda["id_domanda"]);
            $quizDomandaModel->create($quizDomanda);

            foreach($domandaRaw["risposte"] as $obj){
                //inserisci risposta
                $risposta = get_object_vars($obj);
                $rispostaModel->create($risposta);
                array_push($domanda["risposte"], $risposta);

                //inserisci domanda_risposte
                $domandaRisposta = array("id_domanda" => $domanda["id_domanda"], "id_risposta" => $risposta["id_risposta"]);
                $domandaRispostaModel->create($domandaRisposta);

            }
            array_push($quiz["domande"], $domanda);
        }

        
        return $this->response
            ->setStatusCode(200)
            ->setHeader("Access-Control-Allow-Origin: *")
            ->setJSON($quiz);
    }

    public function put(){
        $quizModel = new QuizModel();
        $body = get_object_vars(json_decode($this->request->getBody()));
        $updatedData = $quizModel->put($body);
        
        return $this->response
            ->setStatusCode(200)
            ->appendHeader("Access-Control-Allow-Origin: *")
            ->setJSON($updatedData);
    }

    public function delete($id){
        $quizModel = new QuizModel();
        $domandaModel = new QuizDomandaModel();
        $domandaModel->delete(null, $id);
        $quizModel->delete($id);

    }
}