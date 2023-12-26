<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lhu extends CI_Controller {
	public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
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
            $data = array(
				'title' => 'Data lhu',
                'isi'   =>  'admin/lhu/v_home',
                'user' => $this->session->userdata['first_name'],
                'dataLevel' => $dataLevel,
            );
            // var_dump($data);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
	}

	public function tambah()
	{
        $this->breadcrumbs->AddMultipleItems(array(
        'lhu' => base_url() . 'lhu',
        'tambah' => base_url() . index_page() . '/tambah'
        ));
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
				'title' => 'Data lhu',
                'isi'   =>  'admin/lhu/v_tambah',
                'user' => $this->session->userdata['first_name'],
                'breadcrumbs' => $this->breadcrumbs->render(),
                'dataLevel' => $dataLevel,
            );
            // var_dump($data);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
	}

    public function edit($no_lhu)
	{
        $this->breadcrumbs->AddMultipleItems(array(
        'lhu' => base_url() . 'lhu',
        'tambah' => base_url() . index_page() . '/edit'
        ));
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
				'title' => 'Data lhu',
                'isi'   =>  'admin/lhu/v_edit',
                'user' => $this->session->userdata['first_name'],
                'breadcrumbs' => $this->breadcrumbs->render(),
                'dataLevel' => $dataLevel,
                'cek' => $no_lhu
            );
            // var_dump($data);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
	}
}
