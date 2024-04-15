<?php namespace App\Models;

use CodeIgniter\Model;

class QuizDomandaModel extends Model
{
    protected $table = "quiz_domande";
    protected $allowedFields = ["id_quiz", "id_domanda"];

    public function get($idQuiz){
        return $db->table("quiz_domande")->where("id_quiz", $idQuiz)->get();
    }

    public function create($keyPair){
        $this->insert($keyPair);
    }

    public function delete($idQuiz = null, bool $spurge = false){
        if($idQuiz){
            //$db->table("quiz_domande")->join("domande", "quiz_domande.id_domanda = domande.id_domanda")->delete(["quiz_domande.id_quiz" => $idQuiz]);
        
        }
    }

}