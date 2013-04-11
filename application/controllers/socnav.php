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
		$this->load->view('placesearch');
	}


	public $userLongList = array("empty");
	public $userLatList = array("empty");

	// Added by Nick
	public function testjson()
	{
		$latit = $_GET['latitude'];
		$longit = $_GET['longitude'];

		$currentuserid = $this->session->userdata('userid');

		array_push($userLongList, $currentuserid => $longit);
		array_push($userLatList, $currentuserid => $latit);

/*		if($latit=="30") {
			$arr = array('a' => 33, 'b' => 22, 'c' => 55, 'd' => 44, 'e' => 66);
		}
		else {
			$arr = array('a' => 11, 'b' => 00, 'c' => 99, 'd' => 88, 'e' => 77);
		}

		$arr = array('lon' => $longit, 'lat' => $latit);
*/		
		echo json_encode($userLongList);
		echo json_encode($userLatList);
	}



	/**
	 * Calculates the great-circle distance between two points, with
	 * the Haversine formula.
	 * @param float $latitudeFrom Latitude of start point in [deg decimal]
	 * @param float $longitudeFrom Longitude of start point in [deg decimal]
	 * @param float $latitudeTo Latitude of target point in [deg decimal]
	 * @param float $longitudeTo Longitude of target point in [deg decimal]
	 * @param float $earthRadius Mean earth radius in [m]
	 * @return float Distance between points in [m] (same as earthRadius)
	 */
	function haversineGreatCircleDistance(
	  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
	{
		$earthRadius = 6371000;
	  	// convert from degrees to radians
	  	$latFrom = deg2rad($latitudeFrom);
	  	$lonFrom = deg2rad($longitudeFrom);
	  	$latTo = deg2rad($latitudeTo);
	  	$lonTo = deg2rad($longitudeTo);

	  	$latDelta = $latTo - $latFrom;
	  	$lonDelta = $lonTo - $lonFrom;

	  	$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
	    	cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
	  	return $angle * $earthRadius;
	}

}

?>

