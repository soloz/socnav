<?php

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function validateLogin() {
        if (isset($_POST)) {

//            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
  		
	     $this->form_validation->set_rules('username', 'Username', 'required');
           
            $this->form_validation->set_rules('passwd', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->login();
            } else {
                 $user = $this->user->validateUser();
                 $photo = $this->user->getPhotoUrl($user['userid']);

	        if (isset($user)  && isset($photo)  ) { // Todo: Check for user activation by adding && $user['STATUS'] == "ACTIVE")
                    //if user exists, lets put his detail in the sesssion
                  
                    $extraSessionData = array(
                        'email' => $user['email'],
                        'username' => $user['username'],
                        'userid' => $user['userid'],
                        'lastname' => $user['lastname'],
                        'firstname' => $user['firstname'],
                        'phonenumber' => $user['phonenumber'],
                        'gender' => $user['gender'],
                        'password' => $user['password'],
                        'explorationrange' => $user['setrangeofexploration'],
                        'photourl'=> $photo['photourl'],
                        'is_logged_in' => TRUE
                    );

                    $this->session->set_userdata($extraSessionData);

					// Update the user's state to online in the db.
					$userID = $this->session->userdata('userid');
					$this->user->setUserOnline($userID);
			redirect('main/');

                } else {

                    $this->session->set_flashdata('loginError', 'Username or Password 
                        incorrect');
                    redirect('/login');
                }
            }
        } else {
            redirect('/login');
        }
    }

	//Function for displaying signup page
    public function signup() {
        //display register form

        $is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == true) {
            //load the already logged in message
            $data['main_content'] = "loggedIn"; //body of home page
            $this->load->view('includes/templates.php', $data);
        } else {
            $data['main_content'] = "login_form"; //body of home page
            $this->load->view('includes/templates.php', $data);
        }
    }

	//Function for validating, processing and registering SocNav user (function is called when button is clicked on signup page)
    public function registerUser() {

        if (isset($_POST)) {

            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[user.username]');
            $this->form_validation->set_rules('phonenumber', 'Phone', 'required');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
	    	$this->form_validation->set_rules('passwd', 'Password', 'required|matches[passwd2]');
            $this->form_validation->set_rules('passwd2', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->signup();
            } else {
                /*
                 * TODO: Check if email exists before we post.
                 */
                $user_id = $this->user->createUser($this->input->post());
                if ($user_id) {
                    
                    //We want to create a socnav user's directory to store files since they've successfully registered
                    $path = "uploads/users/".$this->input->post('username');
                     
                     if(!is_dir($path)) //create the folder if it's not already exists
					   {
				      		mkdir($path,0777,TRUE);
				      		copy('uploads/users/default_pic.png',$path.'/default_pic.png');
				       } 
	
                    
                    //load success view page
                    //tell them to follow the link or check their email to activate their account
                 //   $this->validateLogin();
			
		  $photo = "default_pic.png";
                  $user = $this->user->validateUser();
                  $extraSessionData = array(
                        'email' => $user['email'],
                        'username' => $user['username'],
                        'userid' => $user['userid'],
                        'lastname' => $user['lastname'],
                        'firstname' => $user['firstname'],
                        'phonenumber' => $user['phonenumber'],
                        'gender' => $user['gender'],
                        'password' => $user['password'],
                        'explorationrange' => $user['setrangeofexploration'],
                        'photourl'=> $photo,
                        'is_logged_in' => TRUE
                    );

                    $this->session->set_userdata($extraSessionData);

					// Update the user's state to online in the db.
					$userID = $this->session->userdata('userid');
					$this->user->setUserOnline($userID);
					
                    redirect('main/');
                    
                } else {
                    $this->session->set_flashdata('RegError', 'There was a problem 
                        creating your account, please try again later');
                    redirect('/profile', 'refresh');
                    return false;
                }
            }
        } else {
            redirect('main/');
        }
    }

	public function displayProfile() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if ($is_logged_in == true) {
            //load the profile edit page
            $data['main_content'] = "profile_display"; //body of home page
            $data['user_details'] = $this->user->getUser($this->session->userdata('userid'));
            $this->load->view('includes/templates.php', $data);
        } else {
            redirect('/login');
        }
    }

    public function updateProfile() {

        if (isset($_POST)) {
            $is_logged_in = $this->session->userdata('is_logged_in');

            if ($is_logged_in == true) {
                //get the userid in the session
                $userid = $this->session->userdata('userid');
                $this->form_validation->set_rules('firstname', 'Firstname', 'required');
                $this->form_validation->set_rules('lastname', 'Lastname', 'required');
                $this->form_validation->set_rules('phonenumber', 'Phone', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('updateFailure', 'Failure');
                    //redirect('/profile');
                    //return false;
                }

                $status = $this->user->updateUser($userid, $this->input->post());
                if ($status == TRUE) {
                    $this->session->set_flashdata('updateSuccess', 'Profile Sucessfully Updated');
                   
                   $oldSessionData = array(
                        'email' => '',
                        'username' => '',
                        'userid' => '',
                        'lastname' => '',
                        'firstname' => '',
                        'phonenumber' => '',
                        'gender' => '',                   
                    );
                    $this->session->unset_userdata($oldSessionData);
                    $user = $this->user->validateUser();
                    
                     $newSessionData = array(
                       'email' => $user['email'],
                        'username' => $user['username'],
                        'userid' => $user['userid'],
                        'lastname' => $user['lastname'],
                        'firstname' => $user['firstname'],
                        'phonenumber' => $user['phonenumber'],
                        'gender' => $user['gender'],
                        'password' => $user['password'],
                        'explorationrange' => $user['setrangeofexploration'],
                        
                        'is_logged_in' => TRUE                  
                    );
                    
                      $this->session->set_userdata($newSessionData);
                      
                    redirect('/profile', 'refresh');
                } else {
                     
                    $this->session->set_flashdata('updateFailure', 'Failure');
                    redirect('/profile', 'refresh');
                }
            }else{
                redirect('/login');
            }
        }
    }
    
	//Function for Logging into the system
    public function login() {

         $this->load->library('form_validation');

        $data['main_content'] = "login_form"; //body of home page
        $this->load->view('includes/templates.php', $data);
    }
    
    //Function for Uploading Files
    public function pictureupload() {

       $config['upload_path'] = './uploads/users/'.$this->session->userdata('username');
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_error', $error);
		}
		else
		{
			$upload_data = $this->upload->data();
			$this->user->postPhotoUrl($this->session->userdata('userid'), $upload_data['file_name']);
			
			$this->session->unset_userdata('photourl');
			 $newSessionData = array('photourl' => $upload_data['file_name'],
              );
			$this->session->set_userdata($newSessionData);
		//	$this->createThumb($upload_data);
			
			redirect('/profile');
		}
	}
	
 
	//Function for logging out
    public function logout() {
	// Update the user's state to offline in the db.
	$userID = $this->session->userdata('userid');
	$this->user->setUserOffline($userID);

        $this->session->sess_destroy();
        redirect('/login');
    }
    
    //method to create thumbnail images of places and user pictures
    public function createThumb($upload_data = array()){
	
		$image_data = $upload_data; //get image data

		$config['image_library'] = 'gd2';
		$config['source_image']	= './uploads/users/'.$this->session->userdata('username').'/'.$image_data['file_name'];
		$config['new_image']	= './uploads/users/'.$this->session->userdata('username').'/thumbs';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 75;
		$config['height']	= 50;

		$this->load->library('image_lib', $config); //load library
			
		if ( ! $this->image_lib->resize()){ //do whatever specified in config
			 
			 $error = array('error' => $this->image_lib->display_errors());
			$this->load->view('upload_error', $error);
		} 

	}
	
 }

?>
