<?php

namespace App\Controllers;
use App\Models\QuizModel;

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

        $data = json_encode($data);
        return $this->response
            ->setStatusCode(200)
            ->setContentType("application/json")
            ->setBody($data);
    }
}