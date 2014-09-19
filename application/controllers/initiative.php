<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Initiative extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('minitiative');
        $this->load->model('mworkblock');
        
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
    
    /*Initiative*/
    public function list_initiative(){
    	$data['title'] = "List All Initiatives";
		
		$user = $this->session->userdata('user');
		
		$programs = $this->minitiative->get_all_programs();
		$initiatives = $this->minitiative->get_all_initiatives();
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/list_initiative',array('ints' => $initiatives,'programs' => $programs),TRUE);

		$this->load->view('front',$data);
    }
    
    public function input_initiative(){
    	$data['title'] = "Input Initiative";
		
		$user = $this->session->userdata('user');
		
		$programs = $this->minitiative->get_all_programs();
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/input_initiative',array('programs' => $programs),TRUE);

		$this->load->view('front',$data);
    }
    
    public function submit_initiative(){
      	$id = $this->uri->segment(3);
      	$program['title'] = $this->input->post('title');
        $program['code'] = $this->input->post('code');
        $program['tier'] = $this->input->post('tier');
        $program['program_id'] = $this->input->post('program');
        $program['dependencies'] = $this->input->post('depen');
        
        if($this->input->post('start')){$start = DateTime::createFromFormat('m/d/Y', $this->input->post('start'));
    		$program['start'] = $start->format('Y-m-d');
    	}
    	
    	if($this->input->post('end')){$end = DateTime::createFromFormat('m/d/Y', $this->input->post('end'));
    		$program['end'] = $end->format('Y-m-d');
    	}
        
        if($id){
        	if($this->minitiative->update_initiative($program,$id)){redirect('initiative/list_initiative');}
        	else{redirect('initiative/input_initiative');}
        }
        else{
        	if($this->minitiative->insert_initiative($program)){redirect('initiative/list_initiative');}
        	else{redirect('initiative/input_initiative');}
        }
    }
    
    public function detail_initiative(){
    	$id = $this->uri->segment(3);
    	$initiative = $this->minitiative->get_initiative_by_id($id);
		$workblocks = $this->mworkblock->get_all_initiative_workblock($id);
		
		$user = $this->session->userdata('user');
		
		$data['title'] = "Initiative";
		$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/detail',array('initiative' => $initiative,'workblocks' => $workblocks),TRUE);

		$this->load->view('front',$data);
    }
    
    /*Program*/
    public function list_programs(){
    	$data['title'] = "List All Initiatives";
		
		$user = $this->session->userdata('user');
		
		$programs = $this->minitiative->get_all_programs();
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user,'programs' => $programs),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/list_program',array(),TRUE);

		$this->load->view('front',$data);
    }
    
    public function input_program(){
    	$data['title'] = "List All Initiatives";
		
		$user = $this->session->userdata('user');
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/input_program',array(),TRUE);

		$this->load->view('front',$data);
    }
    
    public function submit_program(){
      	$program['title'] = $this->input->post('title');
        $program['code'] = $this->input->post('code');
        $program['segment'] = "Wholesale";
        
        if($this->minitiative->insert_program($program)){
        	redirect('initiative/list_programs');
        }else{redirect('initiative/input_program');}
    }
    
}
