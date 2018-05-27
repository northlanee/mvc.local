<?php

namespace app\models;

use app\core\Model;

class Index extends Model
{

    public function getAllNews() {

        return $this->db->all('SELECT * FROM news');

    }

}