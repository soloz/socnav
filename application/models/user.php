<?php

class User extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function validateUser() {
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('passwd'))); 
      $query = $this->db->get('user');

        if ($query->num_rows == 1) {
            return $query->row_array();
            
        } else {
            return false;
        }
    }

    public function createUser($userdetails = array()) {

        $new_user = array(
            'userid' => $this->generateUserID(),
            'locationid' => 1,
            'firstname' => $userdetails['firstname'],
            'lastname' => $userdetails['lastname'],
	    	'username' => $userdetails['username'],
            'email' => $userdetails['email'],
            'password' => md5($userdetails['passwd']),

        );
        if ($this->db->insert('user', $new_user)) {
            return true;
        }
    }

    public function updateUser($userid, $edit_data = array()) {
       /* if ($this->input->post('pref') != false) {

            if (is_array($edit_data['pref'])) {
                $pref = implode(',', $edit_data['pref']);
            } else {
                $pref = $edit_data['pref'];
            }
        } else {
            $pref = "NULL";
        }
        */
        $data = array(
            'firstname' => $edit_data['firstname'],
            'lastname' => $edit_data['lastname'],
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

    public function getUser($userID) {

        $this->db->where('userid', $userID);
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function emailExist($email) {

        $this->db->where('email', $email);
        $query = $this->db->get('user');

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

public function getPhotoUrl($userid){
	 $this->db->where('userid', $userid);
	 $photo = $this->db->get('userphotogallery');
	
	if ($photo->num_rows == 1) {
            return $photo->row_array();
            
    } else {
            return false;
    }
        
}

public function postPhotoUrl($userid, $photourl){
	
	 $this->db->where('userid', $userid);
	 $photo = $this->db->get('userphotogallery');
	
	if ($photo->num_rows == 1) {
			 $data = array(
            	'photourl' => $photourl,
            	
        	 );
        	$this->db->where('userid', $userid);
            $status = $this->db->update('userphotogallery', $data);
            
    } else {
       		 $data = array(
            	'photourl' => $photourl,
            	'userid' => $userid,
        	 );
            $this->db->insert('userphotogallery', $data);
           
    }
        
}


private function generateUserID() {
    return rand(99999, 1000000);
}

 private function generateLocationID() {
        return rand(99999, 1000000);
    }
    
}

?>
