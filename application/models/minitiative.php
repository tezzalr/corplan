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
        return $query->result();
    }
    
    function get_all_initiatives(){
    	//$this->db->where('role', 3);
    	$this->db->select('initiative.*, program.title as program');
    	$this->db->join('program', 'program.id = initiative.program_id');
    	$this->db->order_by('initiative.code', 'asc');
    	$query = $this->db->get('initiative');
        $res = $query->result();
        $arr = array(); $i=0;
        foreach($res as $int){
        	$arr[$i]['int']=$int;
        	$arr[$i]['stat']=$this->get_initiative_status($int->id)['status'];
        	$arr[$i]['wb']=$this->get_initiative_status($int->id)['sumwb'];
        	$i++;
        }
        return $arr;
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
        return $arr;
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
    
    //UPDATE FUNCTION
    function update_initiative($program,$id){
        $this->db->where('id',$id);
        return $this->db->update('initiative', $program);
    }
    
    function update_profil($profil,$id){
        $this->db->where('id',$id);
        return $this->db->update('profil', $profil);
    }
    
    function update_get_address($profil,$id){
    	if($this->update_profil($profil,$id)){
    		return $this->get_address_by_id($id);
    	}
    }
    
    function update_user($user){
    	$usr = $this->session->userdata('user');
        $this->db->where('id', $usr['user_id']);
        return $this->db->update('user', $user);
    }
    
    function update_user_with_username($user,$username){
        $this->db->where('username', $username);
        return $this->db->update('user', $user);
    }
    
    function update_payment($payment,$id){
        $this->db->where('id',$id);
        return $this->db->update('payment', $payment);
    }
    
    function update_shipping($shipping,$id){
        $this->db->where('id',$id);
        return $this->db->update('shipping', $shipping);
    }
    
    function update_misc($misc){
        $this->db->where('id',1);
        return $this->db->update('misc', $misc);
    }
    function update_sosmed($sosmed,$id){
        $this->db->where('id',$id);
        return $this->db->update('sosmed', $sosmed);
    }
    
    
    //DELETE FUNCTION
    function delete_address(){
    	$address_id = $this->input->post('address_id');
    	if($this->is_address_used($address_id)){
    		$this->db->where('id',$address_id);
    		$profil['user_id'] = '';
			return $this->db->update('profil', $profil);	
    	}else{
    		$this->db->where('id',$address_id);
    		return $this->db->delete('profil');
    	}
    }
    function delete_customer($id){
    	$this->db->where('user_id',$id);
    	if($this->db->delete('profil')){
    		$this->db->where('id',$id);
    		return $this->db->delete('user');
    	}
    }
    
     function delete_photo_slider($id){
    	$this->db->where('id',$id);
    	$this->db->delete('photo_slider');
    	if($this->db->affected_rows()>0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_payment(){
    	$id = $this->input->post('id');
    	if($this->is_payment_used($id)){
    		$this->db->where('id',$id);
    		$payment['use'] = 0;
			return $this->db->update('payment', $payment);	
    	}else{
    		$this->db->where('id',$id);
    		return $this->db->delete('payment');
    	}
    }
    
    function delete_shipping(){
    	$id = $this->input->post('id');
    	if($this->is_shipping_used($id)){
    		$this->db->where('id',$id);
    		$shipping['use'] = 0;
			return $this->db->update('shipping', $shipping);	
    	}else{
    		$this->db->where('id',$id);
    		return $this->db->delete('shipping');
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
