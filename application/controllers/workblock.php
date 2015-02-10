<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Workblock extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mworkblock');
        $this->load->model('mmilestone');
        $this->load->model('minitiative');
        $this->load->model('mlogact');
        
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
    
    public function detail_workblock(){
    	$id = $this->uri->segment(3);
    	$workblock['wb'] = $this->mworkblock->get_workblock_by_id($id);
    	$workblock['stat'] = $this->mworkblock->get_workblock_status($id);
		$milestones = $this->mmilestone->get_all_workblock_milestone($id);
    	
    	$this->minitiative->check_initiative_status();
    	
    	$user = $this->session->userdata('user');
    	$roles = explode(',',$user['role']);
    	$inits = explode(';',$user['initiative']); 
    	if((in_array('PIC',$roles)&&(count($roles)==1))&& !(in_array($workblock['wb']->code,$inits))){
    		redirect('initiative/list_initiative');
    	}
    	else{    	
			$data['title'] = $workblock['wb']->title;
		
			$user = $this->session->userdata('user');
			$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		
			$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
			$data['footer'] = $this->load->view('shared/footer','',TRUE);
			$data['content'] = $this->load->view('workblock/detail_wb',array('wb' => $workblock, 'ms' => $milestones),TRUE);

			$this->load->view('front',$data);
		}
    }
    
    public function edit_workblock(){
		$id = $this->input->get('id');
		$init = $this->input->get('init');
		$wb = $this->mworkblock->get_workblock_by_id($id); 
    	
    	if($id){
			if($wb){
				$json['status'] = 1;
				$json['html'] = $this->load->view('initiative/detail/_form_workblocks',array('wb'=>$wb,'init_id'=>$init),TRUE);
			}else{
				$json['status'] = 0;
			}
		}
		else{
			$json['status'] = 1;
				$json['html'] = $this->load->view('initiative/detail/_form_workblocks',array('wb'=>'','init_id'=>$init),TRUE);
		}
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
    
    public function submit_workblock(){
      	$id = $this->input->post('id');
      	$program['title'] = $this->input->post('title');
        $program['initiative_id'] = $this->input->post('init_id');
        $program['status'] = $this->input->post('status');
        $user = $this->session->userdata('user');
        
        if($this->input->post('start')){$start = DateTime::createFromFormat('m/d/Y', $this->input->post('start'));
    		$program['start'] = $start->format('Y-m-d');
    	}
    	
    	if($this->input->post('end')){$end = DateTime::createFromFormat('m/d/Y', $this->input->post('end'));
    		$program['end'] = $end->format('Y-m-d');
    	}
        
        $int = $this->minitiative->get_initiative_by_id($program['initiative_id']);
        
        if($id){
        	if($this->mworkblock->update_workblock($program,$id)){$json['status'] = 1;}
        	else{$json['status'] = 0;}
        }
        else{
        	if($this->mworkblock->insert_workblock($program)){
        		$log['user_id'] = $user['id'];
        		$log['initiative_id'] = $program['initiative_id'];
        		$log['date'] = date('Y-m-d h:i:s');
        		$log['content'] = "<p> ".$user['name']." membuat Workblock baru : <br><br><b> ".$program['title']."</b><br><br>Pada Initiative : ".$int->code." ".$int->title ."</p>";
        		
        		if($this->mlogact->insert_logact($log)){
        			$json['status'] = 1;}
        	}
        	else{$json['status'] = 0;}
		}
		$views['wb_status'] = $this->minitiative->get_init_workblocks_status($program['initiative_id']);
		$workblocks = $this->mworkblock->get_all_initiative_workblock($program['initiative_id']);
		$json['html'] = $this->load->view('initiative/detail/_list_workblocks',array('workblocks'=>$workblocks,'init_id'=>$program['initiative_id']),TRUE);
		
		$views['init'] = $this->minitiative->get_initiative_by_id($program['initiative_id']);
		$views['init_status'] = $this->minitiative->get_initiative_status_only($views['init']);
		$json['info'] = $this->load->view('initiative/detail/_general_info',array('initiative'=>$views['init'],'stat'=>$views['init_status'],'wb' => $views['wb_status']),TRUE);
		
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function check_range_date_init($code=null,$format=null){
    	if($code==null){
            $init = $this->input->post('init_id');
            
            $end = DateTime::createFromFormat('m/d/Y', $this->input->post('value'));
    		$value = $end->format('Y-m-d');
         }
         $date = date();
         if($value < $date){
             $value = false;
         }else{
             $value = true;
         }
         if($format==null){
            $this->output->set_content_type('application/json')
                        ->set_output(json_encode(array("value" => $value)));
         }
         return $value;
    }
    
    public function delete_workblock(){
        if($this->mworkblock->delete_workblock()){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
}
