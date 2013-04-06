<?php

class Location extends CI_Model {

    function __construct() {
        parent::__construct();
        //I have autoloaded the database
    }

    public function getLocations() {
        $query = $this->db->get('location');
        return $query->result_array();
    }

	 public function getCurrentLocation() {
	    $whereArray = array('locationid' => 1);
        $query = $this->db->get_where('location', $whereArray);
        $id = $query->row_array();
        return $id['street_name'];
    }
    
    public function getCityName($cityID) {
        $whereArray = array('city_name' => $cityID);
        $query = $this->db->get_where('city', $whereArray);
        $id = $query->row_array();
        return $id['CITY_NAME'];
    }

	public function getPostCode($locationID) {
        $whereArray = array('locationid' => $locationID);
         $query = $this->db->get_where('location', $whereArray);
         $id = $query->row_array();
       return $id['postcode'];
    }
    

}

?>
