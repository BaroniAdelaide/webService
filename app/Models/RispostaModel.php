<?php namespace App\Models;

use CodeIgniter\Model;

class RispostaModel extends Model
{

    protected $table = 'risposte';
    protected $primaryKey = 'id_risposta';
    protected $allowedFields = ["id_risposta", "risposta", "corretta"];

    function get($id = null){
        $db = db_connect();
        $builder = $db->table("risposte");

        if($id){
            $builder = $builder->where("id_risposta", $id);
        }
        $query = $builder->get();
        $result = array();
        foreach($query->getResultArray() as $row){
            array_push($result, $row);
        }

        return $result;
    }

    function create(& $row){
        $db = db_connect();
        $db->table("risposte")->insert($row);
        $id = $db->insertId();
        $row["id_risposta"] = $id;
        return $row;
    }

    public function put($risposta){
        $db = db_connect();
        $db->table("risposte")->where("id_risposta", $risposta["id_risposta"])->update($risposta);
        $data = $db->table("risposte")->where("id_risposta", $risposta["id_risposta"])->get()->getResultArray();
        return $data[0];
    }

    public function delete($id = null, $idDomanda = null, bool $purge = false){
        $db = db_connect();
        if($idDomanda){
            //$db->table("risposte")->join("domanda_risposte", "domanda_risposte.id_risposta = risposte.id_risposta")->where("domanda_risposte.id_domanda", $idDomanda)->delete();
        }
        else{
            $db->delete(["id_risposta" => $id]);
        }
    }
}