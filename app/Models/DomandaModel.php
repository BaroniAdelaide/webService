<?php namespace App\Models;

use CodeIgniter\Model;

class DomandaModel extends Model
{

    protected $table = "domande";
    protected $allowedFields = ["domanda", "punti"];

    function get($id = null){
        $db = db_connect();
        $builder = $db->table("domande");

        if($id){
            $builder = $builder->where("id_domanda", $id);
        }
        $query = $builder->get();
        $result = array();
        foreach($query->getResultArray() as $row){
            array_push($result, $row);
        }

        return $result;
    }

    function create(&$row){
        $db = db_connect();
        $db->table("domande")->insert($row);
        $id = $db->insertId();
        $row["id_domanda"] = $id;
        $row["risposte"] = array();
    }

    public function put($domanda){
        $db = db_connect();
        $db->table("domande")->where("id_domanda", $domanda["id_domanda"])->update($domanda);
        $data = $db->table("domande")->where("id_domanda", $domanda["id_domanda"])->get()->getResultArray();
        return $data[0];
    }

    public function delete($id = null, $idQuiz = null, bool $purge = false){
        $db = db_connect();
        if($idQuiz){
            //$db->table("domande")->select("quiz_domande.*, domande.*")->join("quiz_domande", "quiz_domande.id_domanda = domande.id_domanda")->delete(["quiz_domande.id_quiz" => $idQuiz]);
            //aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        
        
        
        
        }
        else{
            $db->delete(["id_domanda" => $id]);
        }
    }
}