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
class Mmilestone extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    function insert_milestone($milestone){
        return $this->db->insert('milestone', $milestone);
    }
    
    function insert_revised($milestone){
        return $this->db->insert('revised', $milestone);
    }
    
    //GET FUNCTION
    
    function get_all_workblock_milestone($workblock_id){
    	$this->db->where('workblock_id', $workblock_id);
    	$this->db->order_by('id', 'asc');
    	$query = $this->db->get('milestone');
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
    function update_milestone($ms, $id){
        $this->db->where('id',$id);
        return $this->db->update('milestone', $ms);
    }
    
    //DELETE FUNCTION
    
    function delete_milestone(){
    	$id = $this->input->post('id');
    	$this->db->where('id',$id);
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
