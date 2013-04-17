<!DOCTYPE html>

<?php 
	
		$is_logged_in = $this->session->userdata('is_logged_in');
		if ($is_logged_in == true) {
			$this->load->view('search_criteria'); 
			$this->load->view('mapping'); 
		} else {
               		 $this->session->set_flashdata('RegError', 'You have to sign in before accessing this functionality');
                    redirect('/login', 'refresh');
                    return false;
		}
			
?>

</html>
