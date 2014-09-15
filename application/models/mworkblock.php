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
class Mworkblock extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    function insert_workblock($program){
        return $this->db->insert('workblock', $program);
    }
    
    //GET FUNCTION
    
    function get_all_initiative_workblock($initiative_id){
    	$this->db->where('initiative_id', $initiative_id);
    	$this->db->order_by('id', 'asc');
    	$query = $this->db->get('workblock');
        return $query->result();
    }
    
    function get_workblock_by_id($id){
        $this->db->where('id',$id);
        $result = $this->db->get('workblock');
        if($result->num_rows==1){
            return $result->row(0);
        }else{
            return false;
        }
    }
    
    //UPDATE FUNCTION
    
    //DELETE FUNCTION
    
    function delete_workblock(){
    	$id = $this->input->post('id');
    	$this->db->where('id',$id);
    	$this->db->delete('workblock');
    	if($this->db->affected_rows()>0){
    		return $this->delete_milestone_workblock($id);
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_milestone_workblock($id){
    	$this->db->where('workblock_id',$id);
    	$this->db->delete('milestone');
    	if($this->db->affected_rows()>0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    // OTHER FUNCTION
}
