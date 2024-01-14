<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    	public $status;
        public $roles;
    
        function __construct(){
            parent::__construct();
            $this->load->model('User_model', 'user_model', TRUE);
            $this->load->model('M_sampel', 'M_sampel', TRUE);
            $this->load->model('M_lhu', 'M_lhu', TRUE);
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->status = $this->config->item('status');
            $this->roles = $this->config->item('roles');
            $this->load->library('userlevel');
            $this->load->library('breadcrumbs');
        }
	
	public function index()
	{
		//user data from session
	    $data = $this->session->userdata;
	    if(empty($data)){
	        redirect(site_url().'main/login/');
	    }

	    //check user level
	    if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['role']);
        // var_dump($dataLevel);
        // die();
	    //check user level
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'main/login/');
        }else{
            if($dataLevel == "is_admin"){
                $data = array(
                    'title' => 'Data Sampel',
                    'isi'   =>  'admin/sampel/v_laporan',
                    'user' => $this->session->userdata['first_name'],
                    'sampel' => $this->M_sampel->allData(),
                    'perusahaan' => $this->M_sampel->ambilPerusahaan(),
                    'dataLevel' => $dataLevel,
                );
                // var_dump($data);
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                
                redirect('dashboard','refresh');
                
            }
        }
	}
}
