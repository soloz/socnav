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

	// Added by Nick
	public function placesearch()
	{
		
		$arr = array('a' => 33, 'b' => 22, 'c' => 55, 'd' => 44, 'e' => 66);
		$data['ajax_request'] = TRUE;
		$data['json'] = $arr;
		$this->load->view('placesearch', $data);
		
	}

	// Added by Nick
	public function testjson()
	{
		$arr = array('a' => 3, 'b' => 2, 'c' => 5, 'd' => 4, 'e' => 66);
		$data['ajax_request'] = TRUE;
		$data['json'] = $arr;
		$this->load->view('placesearch', $data);
		//print json_encode($arr);
	}
}

?>

