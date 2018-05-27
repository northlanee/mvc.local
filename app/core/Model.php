<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27.05.2018
 * Time: 12:38
 */

namespace app\core;

use app\core\Db;

abstract class Model
{

    public $db;

    public function __construct()
    {

        $this->db = new Db;

    }

}