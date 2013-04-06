<?php

class History extends CI_Model {

    function __construct() {
        parent::__construct();
        //I have autoloaded the database
    }

    public function getHistory() {
        $query = $this->db->get('locationhistory');
        return $query->result_array();
    }

}

?>
