<?php

class User extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function validateUser() {
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('passwd')));
//	$this->db->where('password', $this->input->post('passwd'));   
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
//            'password' => $userdetails['passwd'],
	  //  'status' => 'ACTIVE',
        //    'user_type' => 'USER'
        );
        if ($this->db->insert('user', $new_user)) {
            return true;
        }
    }

    public function updateUser($userid, $edit_data = array()) {
        if ($this->input->post('pref') != false) {

            if (is_array($edit_data['pref'])) {
                $pref = implode(',', $edit_data['pref']);
            } else {
                $pref = $edit_data['pref'];
            }
        } else {
            $pref = "NULL";
        }
        $data = array(
            'firstname' => $edit_data['firstname'],
            'lastname' => $edit_data['lastname'],
            'username' => $edit_data['username'],
            'gender' => $edit_data['gender'],
            'city' => $edit_data['city'],
            'phone' => $edit_data['phone'],
            'preference' => $pref
        );
        $this->db->where('USER_ID', $userid);
        $status = $this->db->update('USERS', $data);

        //var_dump($data);
        if ($status) {
            return true;
        }
    }

    public function getUser($userID) {

        $this->db->where('user_id', $userID);
        $query = $this->db->get('USERS');
        return $query->row_array();
    }

    public function emailExist($email) {

        $this->db->where('email', $email);
        $query = $this->db->get('USERS');

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
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
