<?php namespace App\Models;

use CodeIgniter\Model;

class QuizDomandeModel extends Model
{
    protected $table = "quid_domande";
    protected $allowedFields = ["id_quiz", "id_domanda"];
    protected $db = db_connect();





}