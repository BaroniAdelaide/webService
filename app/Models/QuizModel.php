<?php namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{

    protected function initialize()
    {
        $table = 'quiz';
        $primaryKey = 'id_quiz';
        $this->allowedFields[] = "punteggio, nome, descrizione";
    }

    

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
}