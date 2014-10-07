<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admins
 *
 * @author Maulnick
 */
class Minitiative extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    
    function insert_program($program){
        return $this->db->insert('program', $program);
    }
    
    function insert_initiative($program){
        return $this->db->insert('initiative', $program);
    }
    
    //GET FUNCTION
    
    function get_all_programs(){
    	//$this->db->where('role', 3);
    	$this->db->order_by('code', 'asc');
    	$query = $this->db->get('program');
    	$arr = array(); $i=0;
        $progs = $query->result();
        foreach($progs as $prog){
        	$arr[$i]['prog'] = $prog;
        	$code = explode('.',$prog->code);
        	$arr[$i]['code'] = ($code[0]*100)+$code[1];
        	$arr[$i]['date'] = $this->get_initiative_minmax_date($prog->id);
        	
        	$initiatives = $this->get_all_program_initiatives($prog->id);
        	$status = "";
        	foreach($initiatives as $int){
        		$res_status = $this->get_initiative_status($int->id)['status'];
        		if($status){
					if($res_status == "Delay"){$status = "Delay";}
					else{
						if($status != "Delay"){
							if($res_status == "In Progress"){$status = "In Progress";}
							elseif($status=="Completed" && $res_status == "Not Started Yet"){$status = "In Progress";}
							elseif($res_status=="Completed" && $status == "Not Started Yet"){$status = "In Progress";}
						}
					}
				}
				else{$status = $res_status;}
        	}
        	$arr[$i]['status'] = $status;
        	$i++;
        }
        return $arr;
    }
    
    function get_all_initiatives($user_initiative){
    	//$this->db->where('role', 3);
    	$this->db->select('initiative.*, program.title as program, program.code as progcode');
    	$this->db->join('program', 'program.id = initiative.program_id');
    	$this->db->order_by('initiative.code', 'asc');
    	if($user_initiative){
    		$this->db->where_in('initiative.code', $user_initiative);
    	}
    	$query = $this->db->get('initiative');
        $res = $query->result();
        $arr = array(); $i=0;
        foreach($res as $int){
        	$arr[$i]['int']=$int;
        	$arr[$i]['stat']=$this->get_initiative_status($int->id)['status'];
        	$arr[$i]['wb']=$this->get_initiative_status($int->id)['sumwb'];
        	$arr[$i]['wbs']=$this->get_initiative_status($int->id)['wb'];
        	$arr[$i]['pic']=$this->get_initiative_pic($int->code);
        	$i++;
        }
        return $arr;
    }
    
    function get_all_just_initiatives(){
    	//$this->db->where('role', 3);
    	$this->db->select('initiative.*, program.title as program');
    	$this->db->join('program', 'program.id = initiative.program_id');
    	$this->db->order_by('initiative.code', 'asc');
    	$query = $this->db->get('initiative');
        $res = $query->result();
        return $res;
    }
    
    function get_all_program_initiatives($id){
    	$this->db->where('program_id', $id);
    	$this->db->select('initiative.*');
    	$query = $this->db->get('initiative');
        $res = $query->result();
        return $res;
    }
    
    function get_initiative_by_id($id){
        $this->db->where('id',$id);
        $result = $this->db->get('initiative');
        if($result->num_rows==1){
            return $result->row(0);
        }else{
            return false;
        }
    }
    
    function get_initiative_status($id){
    	$this->db->where('initiative_id', $id);
    	//$this->db->order_by('status', 'asc');
    	$query = $this->db->get('workblock');
        $result = $query->result();
        $status = ""; $arr = array();
        foreach($result as $res){
        	$res_status = $this->get_workblock_status($res->id);
        	if($status){
        		if($res_status == "Delay"){$status = "Delay";}
        		else{
        			if($status != "Delay"){
        				if($res_status == "In Progress"){$status = "In Progress";}
        				elseif($status=="Completed" && $res_status == "Not Started Yet"){$status = "In Progress";}
        				elseif($res_status=="Completed" && $status == "Not Started Yet"){$status = "In Progress";}
        			}
        		}
        	}
        	else{$status = $res_status;}
        }
        $arr['status']=$status;
        $arr['sumwb']=count($result);
        $arr['wb']=$result;
        return $arr;
    }
    
    function get_initiative_pic($code){
    	$this->db->like('initiative',$code);
    	$this->db->order_by('jabatan', 'desc');
    	$query = $this->db->get('user');
        return $query->result();
    }
    
    function get_workblock_status($id){
    	$this->db->where('workblock_id', $id);
    	$this->db->order_by('status', 'asc');
    	$query = $this->db->get('milestone');
        $result = $query->result();
        $status = "";
        foreach($result as $res){
        	if($status){
        		if($res->status == "Delay"){$status = "Delay";}
        		else{
        			if($status != "Delay"){
        				if($res->status == "In Progress"){$status = "In Progress";}
        				elseif($status=="Completed" && $res->status == "Not Started Yet"){$status = "In Progress";}
        			}
        		}
        	}
        	else{$status = $res->status;}
        }
        return $status;
    }
    
    function get_initiative_minmax_date($id){
    	$this->db->select('MAX(end) max_end, MIN(start) min_start');
    	$this->db->where('program_id', $id);
    	$query = $this->db->get('initiative');
        return $query->row(0);
    }
    
    //UPDATE FUNCTION
    function update_initiative($program,$id){
        $this->db->where('id',$id);
        return $this->db->update('initiative', $program);
    }
    
    function check_initiative_status(){
    	$datenow = date("Y-m-d");
    	$initiatives = $this->get_all_initiatives("");
    	foreach($initiatives as $int){
    		foreach($int['wbs'] as $wb){
    			$ms['status'] = "Delay";
    			$this->db->where('workblock_id', $wb->id);
    			$this->db->where('end <', $datenow);
    			$this->db->where('status !=', 'Completed');
    			$this->db->update('milestone', $ms);
    		}
    	}
    }
    
    
    //DELETE FUNCTION
    function delete_program(){
    	$id = $this->input->post('id');
    	$this->db->where('id',$id);
    	$this->db->delete('program');
    	if($this->db->affected_rows()>0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    // OTHER FUNCTION
    function config_email(){
    	$config['protocol'] = 'smtp';
        $config['smtp_port'] = '25';
        $config['smtp_host'] = 'mail.dync-store.com';
        $config['smtp_user'] = 'dyn10000';
        $config['smtp_pass'] = 'dyn24157';
        $config['mailtype'] = 'html';
        $config['newline'] = "<br>";
        $config['wordwrap'] = TRUE;
        
        return $config;
    }
}
