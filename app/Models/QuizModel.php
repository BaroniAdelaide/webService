<?php namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quiz';
    protected $primaryKey = 'id_quiz';
    protected $allowedFields = ["punteggio", "nome", "descrizione"];
    protected $useSoftDelete = false;
    

    function get($id = false){
        $db = db_connect();
        $builder = $db->table("quiz");

        if($id){
            $builder = $builder->where("id_quiz", $id);
        }
        $query = $builder->get();
        $result = array();
        foreach($query->getResultArray() as $row){
            array_push($result, $row);
        }

        return $result;
    }


    public function create(&$row){
        $db = db_connect();
        $db->table("quiz")->insert($row);
        $id = $db->insertId();
        $row["id_quiz"] = $id;
        $row["domande"] = array();
    }

    public function put($quiz){
        $db = db_connect();
        $db->table("quiz")->where("id_quiz", $quiz["id_quiz"])->update($quiz);
        $data = $db->table("quiz")->where("id_quiz", $quiz["id_quiz"])->get()->getResultArray();
        return $data[0];
    }

    public function delete($id = null, bool $purge = false){
        $db = db_connect();
        $db->table("quiz")->delete(["id_quiz" => $id]);
    }
}