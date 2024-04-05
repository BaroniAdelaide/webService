<?php namespace App\Models;

use CodeIgniter\Model;

class DomandaRispostaModel extends Model
{
    protected $table = "domanda_risposte";
    protected $allowedFields = ["id_domanda", "id_risposta"];

    public function create($keyPair){
        $this->insert($keyPair);
    }

}