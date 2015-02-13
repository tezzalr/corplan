<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Program extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('minitiative');
        $this->load->model('mprogram');
        $this->load->model('mworkblock');
        $this->load->model('mremark');
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
		redirect('program/list_programs');
    }
    
    /*Program*/
    public function list_programs(){
    	$segment = $this->uri->segment(3);
    	if(!$segment){$segment = "Wholesale";}
    	$data['title'] = "List ".$segment." Program";
		
		$user = $this->session->userdata('user');
		$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		
		$prog['programs'] = $this->mprogram->get_segment_programs($segment);
		$prog['segment'] = $segment;
		$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['sidebar'] = $this->load->view('shared/sidebar','',TRUE);
		$data['content'] = $this->load->view('program/list_program',$prog,TRUE);

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
	
	/*Initiative New */
	
	public function detail(){
		$data['title'] = 'Detail Initiative';
    	
    	$user = $this->session->userdata('user');
    	
		$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		$init_id = $this->uri->segment(3);
		
		$views['init'] = $this->minitiative->get_initiative_by_id($init_id);
		$views['init_status'] = $this->minitiative->get_initiative_status_only($views['init']);
		$views['wb_status'] = $this->minitiative->get_init_workblocks_status($init_id);
		$views['info'] = $this->load->view('initiative/detail/_general_info',array(
		'initiative'=>$views['init'],'stat'=>$views['init_status'],'wb' => $views['wb_status']),TRUE);
		
		$remarks = $this->mremark->get_remarks_by_init_id($init_id);
		$views['remarks'] = $this->load->view('initiative/detail/_list_remarks',array('remarks'=>$remarks),TRUE);
		$views['form_rmrk'] = $this->load->view('initiative/detail/_form_remarks',array('remark'=>'','init_id'=>$init_id),TRUE);
		
		$workblocks = $this->mworkblock->get_all_initiative_workblock($init_id);
		$views['wb'] = $this->load->view('initiative/detail/_list_workblocks',array('workblocks'=>$workblocks,'init_id'=>$init_id),TRUE);
		
		$views['form_wb'] = $this->load->view('initiative/detail/_form_workblocks',array('wb'=>'','init_id'=>$init_id),TRUE);
		$form_prog = $this->load->view('initiative/detail/_form_progress',array(),TRUE);
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
		$data['sidebar'] = $this->load->view('shared/sidebar','',TRUE);
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/detail',$views,TRUE);
		$this->load->view('front',$data);
	}
	
	public function submit_remark(){
    	$init_id = $this->uri->segment(3);
    	$user = $this->session->userdata('user');
    	$program['initiative_id'] = $init_id;
    	$program['content'] = $this->input->post('remark');
    	$program['user_id'] = $user['id'];
    	$program['created'] = date('Y-m-d h:i:s');
        
        $id = $this->input->post('id');
        
        if($id){
        	if($this->mremark->update_remark($program,$id)){$json['status'] = 1;}
        	else{$json['status'] = 0;}
        }
        else{
        	if($this->mremark->insert_remark($program)){$json['status'] = 1;}
        	else{$json['status'] = 0;}
		}
                
		$remarks = $this->mremark->get_remarks_by_init_id($init_id);
		$content = $this->load->view('initiative/detail/_list_remarks',array('remarks'=>$remarks),TRUE);
		$json['html'] = $content;
		
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function edit_remark(){
		$id = $this->input->get('id');
		$init = $this->input->get('init');

    	if($id){
			$remark = $this->mremark->get_remark_by_id($id); 
			if($remark){
				$json['status'] = 1;
				$json['html'] = $this->load->view('initiative/detail/_form_remarks',array('remark'=>$remark,'init_id'=>$init),TRUE);
			}else{
				$json['status'] = 0;
			}
		}
		else{
			$json['status'] = 1;
			$json['html'] = $this->load->view('initiative/detail/_form_remarks',array('remark'=>'','init_id'=>$init),TRUE);
		}
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
	
	public function delete_remark(){
        if($this->mremark->delete_remark()){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
    
    public function segment(){
    	$data['title'] = 'Recapt Segment';
    	
    	$user = $this->session->userdata('user');
    	
		$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		
		$data_content['segment_status'] = $this->minitiative->get_all_segments_status();
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
		$data['sidebar'] = $this->load->view('shared/sidebar','',TRUE);
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('initiative/segment',$data_content,TRUE);
		$this->load->view('front',$data);
    }
    
}
