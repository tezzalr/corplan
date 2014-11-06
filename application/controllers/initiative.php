<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Initiative extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('minitiative');
        $this->load->model('mworkblock');
        $this->load->model('mmilestone');
        $this->load->model('muser');
        
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
		redirect('initiative/list_initiative');
    }
    
    /*Initiative*/
    public function list_initiative(){
    	$data['title'] = "List All Initiatives";
		$segment = $this->uri->segment(3);
		
		if($segment == "Performance%20Management"){$segment = "Performance Management";}
		
		//Header
		$user = $this->session->userdata('user');
		$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		
		$this->minitiative->check_initiative_status();
		
		$programs = $this->minitiative->get_all_programs_with_segment($segment);
		$user_info = $this->muser->get_user_by_id($user['id']);
		$roles = explode(',',$user['role']); $user_initiative="";
		if((in_array('PIC',$roles))&&!(in_array('PMO',$roles))){
			$user_initiative = explode(';',$user_info->initiative);	
		}
		
		$form_new = $this->load->view('initiative/input_initiative',array('programs' => $programs,'segment' => $segment),TRUE);
		
		$initiatives = $this->minitiative->get_all_initiatives($user_initiative, $segment);
		$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/list_initiative',array('ints' => $initiatives,'programs' => $programs, 'form_new' => $form_new),TRUE);

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
    
    public function edit_initiative(){
    	$id = $this->input->get('id');
    	$segment = $this->input->get('segment');
    	$programs = $this->minitiative->get_all_programs_with_segment($segment);
    	$init = $this->minitiative->get_initiative_by_id($id);
    	$pic = $this->get_existing_pic_token($init->GH_PIC);
		if($init){
			$json['status'] = 1;
            $json['html'] = $this->load->view('initiative/_edit_initiative',array('programs' => $programs, 'init'=>$init, 'pic'=>$pic, 'segment' => $segment),TRUE);
		}else{
			$json['status'] = 0;
		}
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function submit_initiative(){
      	$id = $this->uri->segment(3);
      	$segment = $this->input->post('segment');
      	$program['title'] = $this->input->post('title');
        $program['code'] = $this->input->post('code');
        $program['parent_code'] = $this->input->post('parent');
        $program['program_id'] = $this->input->post('program');
        $program['kickoff'] = $this->input->post('kickoff');
        $program['completion'] = $this->input->post('completion');
        $program['description'] = $this->input->post('description');
        $program['GH_PIC'] = $this->input->post('GH_PIC');
        
        if($this->input->post('start')){$start = DateTime::createFromFormat('m/d/Y', $this->input->post('start'));
    		$program['start'] = $start->format('Y-m-d');
    	}
    	
    	if($this->input->post('end')){$end = DateTime::createFromFormat('m/d/Y', $this->input->post('end'));
    		$program['end'] = $end->format('Y-m-d');
    	}
        
        if($id){
        	if($this->minitiative->update_initiative($program,$id)){redirect('initiative/list_initiative/'.$segment);}
        	else{redirect('initiative/input_initiative/'.$segment);}
        }
        else{
        	if($this->minitiative->insert_initiative($program)){redirect('initiative/list_initiative/'.$segment);}
        	else{redirect('initiative/input_initiative/'.$segment);}
        }
    }
    
    public function detail_initiative(){
    	$id = $this->uri->segment(3);
    	$initiative['int'] = $this->minitiative->get_initiative_by_id($id);
    	$user = $this->session->userdata('user');
    	$roles = explode(',',$user['role']);
    	$inits = explode(';',$user['initiative']); 
    	if((in_array('PIC',$roles)&&(count($roles)==1))&& !(in_array($initiative['int']->code,$inits))){
    		redirect('initiative/list_initiative');
    	}
    	else{
			$initiative['stat'] = $this->minitiative->get_initiative_status($id)['status'];
			$workblocks = $this->mworkblock->get_all_initiative_workblock($id);
		
			$user = $this->session->userdata('user');
			$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		
			$data['title'] = "Initiative";
			$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
			$data['footer'] = $this->load->view('shared/footer','',TRUE);
			$data['content'] = $this->load->view('initiative/detail',array('initiative' => $initiative,'workblocks' => $workblocks),TRUE);

			$this->load->view('front',$data);
		}
    }
    
    public function get_pic_token(){
        $arr = array();
        $arr = $this->muser->get_pic_token();
    
        # JSON-encode the response
        $json_response = json_encode($arr);
        
        # Return the response
        echo $json_response;
    }
    
    public function get_existing_pic_token($user_id){
        $arr = array();
        $arr = $this->muser->get_existing_pic_token($user_id);
        # Collect the results
        
        # JSON-encode the response
        $json_response = json_encode($arr);
        
        # Optionally: Wrap the response in a callback function for JSONP cross-domain support
        /*if($_GET["callback"]) {
         $json_response = $_GET["callback"] . "(" . $json_response . ")";
         }*/
        
        # Return the response
        return $json_response;
    }
    
    /*Program*/
    public function list_programs(){
    	$data['title'] = "List All Initiatives";
		
		$user = $this->session->userdata('user');
		$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		
		$programs = $this->minitiative->get_all_programs();
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/list_program',array('programs' => $programs),TRUE);

		$this->load->view('front',$data);
    }
    
    public function input_program(){
    	$data['title'] = "List All Initiatives";
		
		$user = $this->session->userdata('user');
		$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/input_program',array(),TRUE);

		$this->load->view('front',$data);
    }
    
    public function submit_program(){
      	$program['title'] = $this->input->post('title');
        $program['code'] = $this->input->post('code');
        $program['segment'] = $this->input->post('segment');
        
        if($this->minitiative->insert_program($program)){
        	redirect('initiative/list_programs');
        }else{redirect('initiative/input_program');}
    }
    
    public function delete_program(){
        if($this->minitiative->delete_program()){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
	
	public function delete_initiative(){
        if($this->minitiative->delete_initiative()){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
	
	public function get_description(){
       	$id = $this->input->get('id');
    	$int = $this->minitiative->get_info_initiative_by_id($id); 
		if($int){
			$view = $this->load->view('initiative/_descrp_initiative',array('int' => $int),TRUE);
			
			$json['status'] = 1;
            $json['message'] = $view;
            $json['title'] = $int['init']->title;
		}else{
			$json['status'] = 0;
		}
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
	
	public function mind_map(){
		$allthing = $this->minitiative->get_all('Wholesale');
		$data['title'] = "List All Initiatives";
		
		$user = $this->session->userdata('user');
		$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/mind_map',array('all'=>$allthing),TRUE);

		$this->load->view('front',$data);
	} 
    
}
