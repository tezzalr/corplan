<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Milestone extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mworkblock');
        $this->load->model('mmilestone');
        
        $session = $this->session->userdata('user');
        
        if(!$session){
            redirect('user/login');
        }
    }
    /**
     * Method for page (public)
     */
    public function index()
    {
		
    }
    
    public function submit_milestone(){
      	$program['title'] = $this->input->post('title');
        $program['workblock_id'] = $this->input->post('workblock');
        $program['status'] = $this->input->post('status');
        $program['reason'] = $this->input->post('reason');
        
        $start = DateTime::createFromFormat('m/d/Y', $this->input->post('start'));
    	$program['start'] = $start->format('Y-m-d');
    	$end = DateTime::createFromFormat('m/d/Y', $this->input->post('end'));
    	$program['end'] = $end->format('Y-m-d');
    	
    	if($this->input->post('revised')){
    		$revised = DateTime::createFromFormat('m/d/Y', $this->input->post('revised'));
    		$program['revised'] = $revised->format('Y-m-d');
        }
        
        if($this->mmilestone->insert_milestone($program)){
        	redirect("workblock/detail_workblock/".$program['workblock_id']);
        }else{redirect("workblock/detail_workblock/".$program['workblock_id']);}
    }
    
    public function delete_milestone(){
        if($this->mmilestone->delete_milestone()){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
}
