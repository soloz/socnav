<?php

class Places extends CI_Model {

    function __construct() {
        parent::__construct();
        //I have autoloaded the database
    }

    public function getLocation() {
        $query = $this->db->get('location');
        return $query->result_array();
    }

 

	public function getPostCode($locationID) {
        $whereArray = array('locationid' => $locationID);
        return $query->result_array();
    }
    
    //Retrieve all the places stored in the database
    public function getPlaces() {
       
       $query = $this->db->query("SELECT * FROM places");
        return $query->result_array();
    }
    
    
//Create a new place in the database
public function createPlace($placedetails = array()) {


}

//Delete a place from the system
public function deletePlace($placeid){
	
	
}

//Update information about a place
public function updatePlace($placeid, $edit_data = array()){
	
}


}

?>
