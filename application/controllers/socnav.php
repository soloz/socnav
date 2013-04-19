<?php

class Socnav extends CI_Controller {

    //Application Controller

    function __construct() {
        parent::__construct();
    }

    public function search() {

        $data['main_content'] = "search"; //body of page
        $this->load->view('includes/templates.php', $data); //header, footer, data
    }
	
	// Added by Lekan
	public function loadrating()
	{
		//Get unique google id and use it to get the place
		$googleid = $_GET['googleid'];
		
		$query = $this->db->get_where('places', array('google_id' => $googleid));
		
		//Values to be returned
		$avgrating = 0;
		
		//load comments and calculate rating
		foreach ($query->result() as $row)
		{
			//Get all the comments and ratings with place id
			$ratings = $this->db->get_where('ratings', array('placeid' => $row->placeid));
			$count = 0;//count rows
			$sum = 0;
			
			foreach ($ratings->result() as $row2)
			{				
				//Calculate sum
				$sum = $sum + $row2->rating;
				$count++;
			}
			
			//Calculate average rating
			$avgrating = round($sum/$count);
		}
		
		echo $avgrating;
	}
	
	// Added by Lekan
	public function loadcomments()
	{
		//Get unique google id and use it to get the place
		$googleid = $_GET['googleid'];
		$query = $this->db->get_where('places', array('google_id' => $googleid));
		
		//Values to be returned
		$comments = array();
		
		//load comments and calculate rating
		foreach ($query->result() as $row)
		{
			//Get all the comments and ratings with place id
			$this->db->join('user', 'comments.userid = user.userid');
			$commentsquery = $this->db->get_where('comments', array('placeid' => $row->placeid));
			
			foreach ($commentsquery->result() as $row2)
			{
				//store comments in array
				$comments[] = array(
					'comment' => $row2->user_comment,
					'username' => $row2->username,
					'date' => $row2->_date
				);
			}
		}
		
		echo json_encode($comments);
	}
	
	// Added by Lekan
	public function rateplace()
	{
		$str = "Oops, something went wrong";
		$userID = $this->session->userdata('userid');
		
		$rating = $_GET['rating'];
		$googleid = $_GET['googleid'];
		
		$query = $this->db->get_where('places', array('google_id' => $googleid));
		
		foreach ($query->result() as $row)
		{
			$query2 = $this->db->get_where('ratings', array('userid' => $userID, 'placeid' => $row->placeid));
			$hasrating = false;
			foreach ($query2->result() as $row2){
				if(!empty($row2->rating)){
					$hasrating = true;
				}
			}
		
			if(!$hasrating)
			{
				$data = array(
				   'placeid' => $row->placeid,
				   'rating' => $rating,
				   'userid' => $userID
				);

				$this->db->insert('ratings', $data);
				
				$str = "Place rated!";
			}
			/*else{
				$data = array(
				   'rating' => $rating
				);

				$this->db->where('userid', $userID);
				$this->db->update('ratings', $data); 
				
				$str = "Place rated!";
			}*/
		}
		
		echo $str;
	}
	
	// Added by Lekan
	public function postcomment()
	{
		$str = "Oops, something went wrong";
		$userID = $this->session->userdata('userid');
		
		$comment = $_GET['comment'];
		$googleid = $_GET['googleid'];
		
		$query = $this->db->get_where('places', array('google_id' => $googleid));
		$str = "Whatever";
		
		foreach ($query->result() as $row)
		{	
			$data = array(
				   'placeid' => $row->placeid,
				   'user_comment' => $comment,
				   'userid' => $userID
			);

			$this->db->insert('comments', $data);
			
			$str = "Successful!";
		}
		
		echo $str;
	}
	
	// Added by Lekan
	public function storeplaces()
	{
		$str;
		//get the refs and ids
		$placesrefs = json_decode($_GET['placesrefs']);
		$placesids = json_decode($_GET['placesids']);
		$category = $_GET['category'];
		
		// Iterate through the rows
		//$obj = json_decode($places);
		$query = $this->db->get('places');

		//if db contains places, enter here
		if($this->db->count_all('places') > 0){
			$itexists;
			for($i = 0; $i < count($placesids); $i++){
				$itexists = false;
				//$str = "" . count($places);
				//check if current id exists
				foreach ($query->result() as $row){
					if($row->google_id == $placesids[$i]){
						$itexists = true;
						break;
					}
				}
				
				//if id does not exist, add it to the db
				if(!$itexists){
					$data = array(
					   'rating' => 0 ,
					   'category' => $category ,
					   'google_ref' => $placesrefs[$i],
					   'google_id' => $placesids[$i]
					);

					$this->db->insert('places', $data);
				}
			}
			$str = "checks -> " . $itexists;
		}
		else{//add all places, if its first time
			for($i = 0; $i < count($placesids); $i++){
				$data = array(
				   'rating' => 0 ,
				   'category' => $category ,
				   'google_ref' => $placesrefs[$i],
				   'google_id' => $placesids[$i]
				);

				$this->db->insert('places', $data);
			}
			$str = "inserted";
		}
		echo $str;
	}

	// THe user sent his location, so we update it on the db.
	public function updateuserlocation() {
		$latit = $_GET['latitude'];
		$longit = $_GET['longitude'];

		$is_logged_in = $this->session->userdata('is_logged_in');
		if($is_logged_in) 
		{
			$userID = $this->session->userdata('userid');
			$this->user->updateUserLocation($userID, $latit, $longit);
			
			echo 0; // everything ok.
		}
		else 
		{
			echo -1; // error: the user shouldn't be here...
		}
	}

	private $userIdList;
	private $userLongList;
	private $userLatList;


	// Gets logged in users from the DB, calculates distances from the current user
	// and sends back the data of nearby users in a json object to the client
	public function nearbyusers()
	{
		$latit = $_GET['latitude'];
		$longit = $_GET['longitude'];
		$radius = $_GET['radius'];

		$is_logged_in = $this->session->userdata('is_logged_in');
		if($is_logged_in) 
		{
			$currentUserID = $this->session->userdata('userid');
			$results = $this->user->getOnlineUsersAndLocations();
			
			// populate the array of arrays of user details.
			$allUsersData = array();
			foreach($results->result() as $row) {
				// We don't want to add ourselves (the current user) to the list of nearby people
				if($row->userid != $currentUserID) {
					$allUsersData[] = array(
						'userid' => $row->userid,
						'username' => $row->username,
						'email' => $row->email,
						'lastname' => $row->lastname,
						'firstname' => $row->firstname,
						'longitude' => $row->longitude,
						'latitude' => $row->latitude,
						'photourl' => $row->photourl,
						'gender' => $row->gender
					);
				}
			}
			
			// find those who are nearby and populate the array of arrays to send to the user
			$nearbyUsersData = array();
			foreach($allUsersData as $userRow) {
				// Calculate the distance between the client that did the request and each of them.
				$distance = $this->haversineGreatCircleDistance($latit, $longit, $userRow['latitude'], $userRow['longitude']);

				// If the particular user is within the radius of our client, add his coords in the temp arrays.
				if($distance <= $radius) 
				{
					    $nearbyUsersData[] = array(
						'userid' => $userRow['userid'],
						'username' => $userRow['username'],
						'email' => $userRow['email'],
						'lastname' => $userRow['lastname'],
						'firstname' => $userRow['firstname'],
						'longitude' => $userRow['longitude'],
						'latitude' => $userRow['latitude'],
						'photourl' => $userRow['photourl'],
						'gender' => $userRow['gender']
					    );
				}
			}

			// Send the data of all nearby users to the client...
			if(!empty($nearbyUsersData)) {
				echo json_encode($nearbyUsersData);
			}
		}
		else 
		{
			echo -1; // error: the user shouldn't be here...
		}

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

