<?php

class Brand_model extends CMS_Model {

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "brands";

    }
    
}