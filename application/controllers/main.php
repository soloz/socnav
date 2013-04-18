<?php

class Main extends CI_Controller {

    //Application Controller

    function __construct() {
        parent::__construct();
    }

    public function index() {
        
     $this->home();    
    
    }

    public function home() {

        $data['main_content'] = "home"; //body of page
        $this->load->view('includes/homepage_templates.php', $data); //header, footer, data
        
    }
    
    public function testmap() {
        $this->load->view('maps');
    }

}

?>

