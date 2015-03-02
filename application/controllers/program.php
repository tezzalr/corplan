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
        $this->load->library('excel');
        
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
	
	public function input_data_segment(){
		$segment = $this->uri->segment(3);
    	$exel = $this->read_excel("Data Segment ".$segment.".xlsx",1);
    	$arrres = array(); $s=0;
    	//if($this->mnasabah->empty_table('nasabah')){
		for ($row = 0; $row <= $exel['row']; ++$row) {
			$data = "";
			for ($col = 0; $col < $exel['col']; ++$col) {
				$arrres[$row][$col] = $exel['wrksheet']->getCellByColumnAndRow($col, $row)->getValue();
			}
			
			$data['title'] = $arrres[$row][1];
			$data['code'] = $arrres[$row][0];
			$data['description'] = $arrres[$row][6];
			//$data['tier'] = $arrres[$row][1];
			if($arrres[$row][2]=="P"){
				$prog_id_yes = $data['code'];
				$data['segment'] = $segment;
				$prog = $this->mprogram->get_program_by_code($data['code']);
				if($prog){
					$this->mprogram->update_program($data,$prog->id);
				}
				else{
					$this->mprogram->insert_program($data);
				}
			}
			elseif($arrres[$row][2]=="I"){
				$init_id_yes = $data['code'];
				$data['start'] = date("Y-m-d",excelDateToDate($arrres[$row][4]));
				$data['end'] = date("Y-m-d",excelDateToDate($arrres[$row][5]));
				$data['kickoff'] = $arrres[$row][7];
				$data['completion'] = $arrres[$row][8];
				$data['pic'] = $arrres[$row][3];
				$int = $this->minitiative->get_initiative_by_code($data['code']);
				if($int){
					$this->minitiative->update_initiative($data,$int->id);
				}
				else{
					$prog_int = $this->mprogram->get_program_by_code($prog_id_yes);
					$data['program_id'] = $prog_int->id;
					$this->minitiative->insert_initiative($data);
				}
				
			}
			elseif($arrres[$row][2]=="W"){
				$data['start'] = date("Y-m-d",excelDateToDate($arrres[$row][4]));
				$data['end'] = date("Y-m-d",excelDateToDate($arrres[$row][5]));
				$data['pic'] = $arrres[$row][3];
				$wb = $this->mworkblock->get_workblock_by_code($data['code']);
				if($wb){
					$this->mworkblock->update_workblock($data,$wb->id);
				}
				else{
					$int_wb = $this->minitiative->get_initiative_by_code($init_id_yes);
					$data['initiative_id'] = $int_wb->id;
					$this->mworkblock->insert_workblocks($data);
				}
				
			}
			
			/*$nasabah['company'] = $arrres[$row][1];
			$nasabah['group'] = $arrres[$row][2];
			$nasabah['sector'] = $arrres[$row][3];
			$nasabah['gas'] = $arrres[$row][4];
			$nasabah['oldbuc'] = $arrres[$row][5];
			$nasabah['newbuc'] = $arrres[$row][6];
			$nasabah['rm'] = $arrres[$row][7];
			$nasabah['loan'] = $arrres[$row][8];
			$nasabah['dana'] = $arrres[$row][9];
			$nasabah['ncl'] = $arrres[$row][10];*/
			
			//$this->mnasabah->insert_nasabah($nasabah);
		}
		//}
    }
    
    private function read_excel($file,$sheet){
    	$arrres = array();
    	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objReader->setReadDataOnly(TRUE);
		$objPHPExcel = $objReader->load("assets/upload/".$file);
		
		$arrres['wrksheet'] = $objPHPExcel->getActiveSheet();
		// Get the highest row and column numbers referenced in the worksheet
		$arrres['row'] = $arrres['wrksheet']->getHighestRow(); // e.g. 10
		$highestColumn = $arrres['wrksheet']->getHighestColumn(); // e.g 'F'
		$arrres['col'] = PHPExcel_Cell::columnIndexFromString($highestColumn);
		
		return $arrres;
    }
    
}
