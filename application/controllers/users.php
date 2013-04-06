<?php

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function validateLogin() {
        if (isset($_POST)) {

            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('passwd', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->login();
            } else {
                $user = $this->user->validateUser();

	        if (isset($user) ) { // Todo: Check for user activation by adding && $user['STATUS'] == "ACTIVE") {
                    //if user exists, lets put his detail in the sesssion
                    $extraSessionData = array(
                        'email' => $user['email'],
                        'username' => $user['username'],
                        'userid' => $user['userid'],
                       // 'user_type' => $user['USER_TYPE'],
                        'is_logged_in' => TRUE
                    );

                    $this->session->set_userdata($extraSessionData);
                    redirect('main/');
                } else {
                    $this->session->set_flashdata('loginError', 'Username or Password 
                        incorrect');
                    redirect('/login');
                }
            }
        } else {
            redirect('main/');
        }
    }

	//Function for displaying signup page
    public function signup() {
        //display register form

        $data['locations'] = $this->location->getLocations(); //for links

        $is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == true) {
            //load the already logged in message
            $data['main_content'] = "loggedIn"; //body of home page
            $this->load->view('includes/templates.php', $data);
        } else {
            $data['main_content'] = "register_form"; //body of home page
            $this->load->view('includes/templates.php', $data);
        }
    }

	//Function for validating, processing and registering SocNav user (function is called when button is clicked on signup page)
    public function registerUser() {

        if (isset($_POST)) {

            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('passwd', 'Password', 'required');
            $this->form_validation->set_rules('passwd2', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->signup();
            } else {
                /*
                 * TODO: Check if email exists before we post.
                 */
                $user_id = $this->user->createUser($this->input->post());
                if ($user_id) {
                    echo "Registration Successful";
                    //load success view page
                    //tell them to follow the link or check their email to activate their account
                } else {
                    $this->session->set_flashdata('RegError', 'There was a problem 
                        creating your account, please try again later');
                    redirect('/signup', 'refresh');
                    return false;
                }
            }
        } else {
            redirect('main/');
        }
    }

	//Function for Logging into the system
    public function login() {

        $data['locations'] = $this->location->getLocations(); //for links
        $this->load->library('form_validation');
        $data['main_content'] = "login_form"; //body of home page
        $this->load->view('includes/templates.php', $data);
    }

	//Function for logging out
    public function logout() {
        $this->session->sess_destroy();
        redirect('/login');
    }

}

?>
