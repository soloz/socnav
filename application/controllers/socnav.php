<?php

class Socnav extends CI_Controller {

    //Application Controller

    function __construct() {
        parent::__construct();
    }

    public function search() {

        $data['main_content'] = "search"; //body of page
        $data['history'] = $this->history->getHistory();
        $data['locations'] = $this->location->getLocations();
        $data['cityName'] = $this->location->getCurrentLocation();
        $this->load->view('includes/templates.php', $data); //header, footer, data
    }
    
    public function testmap() {
        $this->load->view('maps');
    }

}

?>

