<?php namespace App\Models;

use CodeIgniter\Model;

class RispostaModel extends Model
{

    protected function initialize()
    {
        $table = 'risposte';
        $primaryKey = 'id_risposta';
        $this->allowedFields[] = "id_risposta, risposta, corretta";
    }

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
}