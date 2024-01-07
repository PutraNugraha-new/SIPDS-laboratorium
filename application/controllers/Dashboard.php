<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
            $data = array(
                'title'=>'Dashboard',
                'isi'   =>  'admin/dashboard/v_home',
                'user' => $this->session->userdata['first_name'],
                'dataLevel' => $dataLevel,
                'jumlah_pengguna' => $this->user_model->getCountData(),
                'jumlah_sampel' => $this->M_sampel->getCountData(),
                'sampel' => $this->M_sampel->allData(),
                'jumlah_lhu' => $this->M_lhu->getCountData(),
            );
            // var_dump($data);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
    }
}
