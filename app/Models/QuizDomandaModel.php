<?php namespace App\Models;

use CodeIgniter\Model;

class QuizDomandaModel extends Model
{
    protected $table = "quiz_domande";
    protected $allowedFields = ["id_quiz", "id_domanda"];

    public function create($keyPair){
        $this->insert($keyPair);
    }

}