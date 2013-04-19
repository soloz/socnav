<?php

class User extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function validateUser() {
        
	//$input_username = $this->input->post('username') ;
	//$query = $this->db->query("SELECT * FROM user WHERE username =".$input_username .";");

	$sql = "SELECT * FROM user WHERE username = ? AND password = ? ";
	$username = $this->input->post('username');

	$encrypted_password = md5($this->input->post('passwd'));

	$query = $this->db->query($sql, array($username, $encrypted_password));

	//$this->db->where('username', $this->input->post('username'));
       // $this->db->where('password', md5($this->input->post('passwd'))); 
      //	$query = $this->db->get('user');

        if ($query->num_rows() > 0) {
           return $query->row_array();
 
        } else {
            return false;
        }
    }

//Login a user
	public function login($username, $password)
	{

		// Select user details
		$user = $this->ci->db->select($this->identifier_field.' as identifier, '.$this->username_field.' as username, '.$this->password_field.' as password')->where($this->username_field, $username)->get($this->user_table);

		// Ensure there is a user with that username
		if ($user->num_rows() == 0)
		{
			// There is no user with that username, but we won't tell the user that
			return FALSE;
		}

		// Set the user details
		$user_details = $user->row();

		// Do passwords match
		if ($this->generate_hash($password, $user_details->password) == $user_details->password)
		{

			// Yes, the passwords match

			// Set the userdata for the current user
		/*	$this->ci->session->set_userdata(array(
				'identifier' => $user_details->identifier,
				'username' => $user_details->username,
				'logged_in' => $_SERVER['REQUEST_TIME']
			));*/

			return TRUE;

		// The passwords don't match
		} else {
			// The passwords don't match, but we won't tell the user that
			return FALSE;
		}

	}


    public function createUser($userdetails = array()) {

	// First create an entry in the location table.
	$userLocationID = $this->generateLocationID();
	$this->db->set('locationid', $userLocationID);
	$this->db->insert('location');

	$newUserID = $this->generateUserID();
        $new_user = array(
            'userid' => $newUserID,
            'locationid' => $userLocationID, // Add foreign key to that location table entry for the user.
            'firstname' => $userdetails['firstname'],
            'lastname' => $userdetails['lastname'],
            'phonenumber' => $userdetails['phonenumber'],
             'gender' => $userdetails['gender'],
	    	'username' => $userdetails['username'],
            'email' => $userdetails['email'],
            'password' => md5($userdetails['passwd'])

        );
        if ($this->db->insert('user', $new_user)) {
		$defaultpicurl = 'default_pic.png';
	 	$data = array(
			'usergalleryid' => $this->generateUserPhotoID(),
		    	'photourl' => $defaultpicurl,
		    	'userid' => $newUserID
			 );
		$this->db->insert('userphotogallery', $data);
            return true;
        }
    }

    public function updateUser($userid, $edit_data = array()) {
      
        $data = array(
            'firstname' => $edit_data['firstname'],
            'lastname' => $edit_data['lastname'],
            'gender' => $edit_data['gender'],
            'phonenumber' => $edit_data['phonenumber'],
            'email' => $edit_data['email']
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
    
    public function getUsers() {
      
		$query = $this->db->query("SELECT * FROM user");
        return $query->result_array();
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
	
	public function getOnlineUsersAndLocations() {
		$this->db->where('user.online', TRUE);
		return $this->db->get('location join user on location.locationid = user.locationid
		join userphotogallery on userphotogallery.userid = user.userid');
	}

	public function updateUserLocation($userID, $lat, $long) {
		$data = array(
		       'location.latitude' => $lat,
		       'location.longitude' => $long
		);
		$this->db->where('user.userid', $userID);
		$this->db->update('location join user on location.locationid = user.locationid',$data);
	}

	public function setUserOffline($userID) {
		$this->db->set('online', FALSE);
		$this->db->where('userid', $userID);
		$this->db->update('user');
	}

	public function setUserOnline($userID) {
		$this->db->set('online', TRUE);
		$this->db->where('userid', $userID);
		$this->db->update('user');
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
    
 private function generateUserPhotoID() {
        return rand(99999, 1000000);
 }

public function deleteUser(){
	
	
}

public function deactivateUser(){
	
	
}


public function activateUser(){
	
	
}

}
?>
