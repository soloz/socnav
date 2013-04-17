<?php

class Userphotogallery extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    
 public function updatePhoto($userid, $photo_data = array()) {
    
        $data = array(
            'photourl' => $photo_data['firstname'],
            'dateposted' => $photo_data['lastname'],
            'username' => $edit_data['username'],
            //'gender' => $edit_data['gender'],
            'phonenumber' => $edit_data['phonenumber']
        );
        $this->db->where('userid', $userid);
        $status = $this->db->update('user', $data);

        //var_dump($data);
        if ($status) {
            return true;
        }
}

public function createPhoto($userid, $photodetails = array()) {

        $new_user = array(
            'usergalleryid' => $this->generateUserPhotoID(),
            'photourl' => $photodetails['firstname'],
            'dateposted' => $photodetails['lastname'],
	    	'userid' => $this->db->where('userid', $userid),
        );
        if ($this->db->insert('user', $new_user)) {
            return true;
        }
}

public function getPhotoUrl($userid){
	 $this->db->where('userid', $userid);
	 $status = $this->db->get('photourl');
	
	 echo $status;
	
}

 private function generateUserPhotoID() {
        return rand(99999, 1000000);
 }
    
}

?>