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

	public $userLongList;
	public $userLatList;

	// Added by Nick
	public function testjson()
	{
		$latit = $_GET['latitude'];
		$longit = $_GET['longitude'];
		$radius = $_GET['radius'];
		
		// ============= TEST DATA ================
		// user at the center of st andrews
		$userLongList['userid60'] = -2.7965;
		$userLatList['userid60'] = 56.339316;

		// User a bit further (still within 500m radius)
		$userLongList['userid70'] = -2.808166;
		$userLatList['userid70'] = 56.338242;

		// User a bit further (not within 500m radius)
		$userLongList['userid80'] = -2.816319;
		$userLatList['userid80'] = 56.336672;

		// User a bit further (not within 500m radius)
		$userLongList['userid90'] = -2.825332;
		$userLatList['userid90'] = 56.337528;

		// User a bit further (not within 500m radius)
		$userLongList['userid10'] = -2.875457;
		$userLatList['userid10'] = 56.341857;
		//============================================

		$latOfNearbyUsers; // temp associative array used to store of the lat of nearby users in the form of 'userid':'lat'
		$longOfNearbyUsers; // temp associative array used to store of the long of nearby users in the form of 'userid':'long'
		$coordsOfNearbyUsers; // master-array that includes the 2 arrays listed above ^ .
	
		// Parse through all the locations of logged users
		foreach($userLongList as $keyid => $longValue) {
			// Calculate the distance between the client that did the request and each of them.
			$distance = $this->haversineGreatCircleDistance($latit, $longit, $userLatList[$keyid], $longValue);
			
			// If the particular user is within the radius of our client, add his coords in the temp arrays.
			if($distance <= $radius) 
			{
				$latOfNearbyUsers[$keyid] = $userLatList[$keyid];
				$longOfNearbyUsers[$keyid] = $longValue;
			}
		}

		// If we do have some users nearby
		if(!empty($latOfNearbyUsers) && !empty($longOfNearbyUsers))
		{	
			// Add the lists to the master-array to be parsed at the client-side.
			$coordsOfNearbyUsers['longitudes'] = $longOfNearbyUsers;
			$coordsOfNearbyUsers['latitudes'] = $latOfNearbyUsers;
		}
		else
		{	
			// Put the string 'empty' in them for it to be checked at the client-side.
			$coordsOfNearbyUsers['longitudes'] = 'empty';
			$coordsOfNearbyUsers['latitudes'] = 'empty';

		}

		// TODO: Add the user's coords to the lists (if he has just logged in).
		// Must integrate with the session data in order for the placesearch page to be only accessible
		// if the user is logged in.

		// Get the user's userid from the session data.
		// $currentuserid = $this->session->userdata('userid');

		echo json_encode($coordsOfNearbyUsers);
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
	private function haversineGreatCircleDistance(
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

