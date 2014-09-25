<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('muser');
    }
    
    public function index()
    {
    	$user = $this->session->userdata('user');
		
		if($user){
			$users = $this->muser->get_all_user();
			$data['title'] = "User List";
		
			$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
			$data['footer'] = $this->load->view('shared/footer','',TRUE);
			$data['content'] = $this->load->view('user/list_user',array('user'=>$users),TRUE);
	
			$this->load->view('front',$data);
        }else{
        	redirect('user/login');
        }
        
    }
    
    public function login($params=null)
    {
    	/*$session = $this->session->userdata('user');
        if($session){
            redirect('customer');
        }*/
    	$data['title'] = "User Login";
    	
        $data['header'] = '';
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
        $data['content'] = $this->load->view('user/login',array('params' => $params),TRUE);
    
        $this->load->view('front',$data);
    }
    
    public function input_user()
    {
    	$user_id = $this->uri->segment(3); $data_user="";
    	
    	if($user_id){$data_user = $this->muser->get_user_by_id($user_id);}
    	
    	$user = $this->session->userdata('user');
    	$data['title'] = "Input User";
    	
        $data['header'] = $this->load->view('shared/header',array('user' => $user,'info'=>$data_user),TRUE);
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
        $data['content'] = $this->load->view('user/input',array(),TRUE);
    
        $this->load->view('front',$data);
    }
    
	public function userEnter()
	{
		$params['username'] = $this->input->post('username');
        $params['password'] = md5($this->input->post('password'));
        
        if($this->check_login($params['username'],$params['password'])){
            $user = $this->muser->get_user_id_by_username($params['username']);
            $data = array(
                'username' => $params['username'],
                'id' => $user->id,
                'name' => $user->name,
                'is_logged_in' => true,
                'role' => $user->role
            );
            $this->session->set_userdata('user',$data);
            /*if($user->role == 1){
                redirect('initiative/list_initiative');
            }elseif($user->role == 3){
                redirect('initiative/list_initiative');
            }*/
            redirect('initiative/list_initiative');
        }else{
            $params['type_login']="failed";
            $this->login($params);
        }
	}
	
	private function check_login($username, $password){
         if(empty($username) || empty($password)){
             return false;
         }else{
             if($this->muser->verify($username, $password)){return true;}
             else{return false;}
         }
    }
    
    public function register(){
      	$id = $this->uri->segment(3);
      	$user['username'] = $this->input->post('username');
      	if(!$id){
        	$user['password'] = md5($this->input->post('password'));
        }
        $user['name'] = $this->input->post('name');
        $user['role'] = $this->input->post('role');
        $user['jabatan'] = $this->input->post('jabatan');
        $user['initiative'] = $this->input->post('initiative');
        
        if($id){
			if($this->muser->update_user($user,$id)){
				redirect('user');
			}
    	}else{
			if($this->muser->register($user)){
        		redirect('user');
			}
    	}
    }
    
    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/user/login');
    }
    
    public function delete_user(){
        if($this->muser->delete_user()){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
    
    public function check_existing_email($email=null,$format=null){
         if($email==null){
             $email = $this->input->post('email');
         }
         $value;
         if($this->muser->get_existing_email($email)==true){
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
     
    public function check_existing_email_edit($email=null,$format=null){
         if($email==null){
             $email = $this->input->post('email');
             $old_email = $this->input->post('old_email');
         }
         $value;
         if($this->muser->get_existing_email_edit($email,$old_email)==true){
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
     
     public function check_email_is_user($email=null,$format=null){
     	if($email==null){
             $email = $this->input->post('email');
         }
         $value;
         if($this->muser->get_customer_id_by_username($email)==true){
             $value = true;
         }else{
             $value = false;
         }
         if($format==null){
            $this->output->set_content_type('application/json')
                        ->set_output(json_encode(array("value" => $value)));
         }
         return $value;
     }
     
     public function check_user_password($password=null,$format=null){
         if($password==null){
             $password = $this->input->post('password');
         }
         $value;
         if($this->muser->get_user_password($password)){
             $value = $this->muser->get_user_password($password);
         }else{
             $value = $this->muser->get_user_password($password);
         }
         if($format==null){
            $this->output->set_content_type('application/json')
                        ->set_output(json_encode(array("value" => $value)));
         }
         return $value;
     }
    
    public function update_account(){
    	$user['username'] = $this->input->post('email');
        $user['name'] = $this->input->post('name');
        $user['telp'] = $this->input->post('telp');
        $user['email_lang'] = $this->input->post('email_lang');
        
        if($this->muser->update_user($user)){
        	if($this->input->post('signature')){
        		$misc['signature']=$this->input->post('signature');
        		if($this->muser->update_misc($misc)){
        			$json['status']=1;	
        		}else{$json['status']=0;}
        	}else{$json['status']=1;}
        }
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function change_password(){
    	$user['password'] = md5($this->input->post('password_new'));
        
        if($this->muser->update_user($user)){
        	$json['status']=1;
        }
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function not_login_yet(){
    	$params['type_login']="not_login";
        $this->login($params);
    }
}
