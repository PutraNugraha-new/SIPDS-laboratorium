<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lhu extends CI_Controller {
	public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
        $this->load->model('M_lhu', 'M_lhu', TRUE);
        $this->load->model('M_sampel', 'M_sampel', TRUE);
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
                'lhu' => $this->M_lhu->allData(),
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
                'list_sampel' => $this->M_sampel->allData(),
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
                'list_sampel' => $this->M_sampel->allData(),
                'cek' => $this->M_lhu->getData($no_lhu)
            );
            // var_dump($data);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
	}

    public function add()
    {
        $data = $this->session->userdata;
        if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }

        //check user level
	    if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['role']);
	    //check user level

	    //check is admin or not
	    if($dataLevel == "is_admin"){
            $this->form_validation->set_rules('no_lhu', 'Nomor LHU', 'required');
            $this->form_validation->set_rules('no_sampel', 'Nomor Sampel', 'required');
            $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
            $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Data LHU',
                    'isi'   =>  'admin/lhu/v_tambah',
                    'user' => $this->session->userdata['first_name'],
                    'breadcrumbs' => $this->breadcrumbs->render(),
                    'dataLevel' => $dataLevel,
                );
                // var_dump($data);
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                // die();
            }else{
                if($this->M_lhu->isDuplicate($this->input->post('no_lhu'))){
                    $this->session->set_flashdata('flash_message', 'Nomor LHU already exists');
                    redirect(site_url().'lhu/tambah');
                }else{
                    $tambah = [
                        'no_lhu' => $this->input->post('no_lhu'),
                        'no_sampel' => $this->input->post('no_sampel'),
                        'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                        'tgl_selesai' => $this->input->post('tgl_selesai'),
                    ];

                    //insert to database
                    if(!$this->M_lhu->add($tambah)){
                        $this->session->set_flashdata('flash_message', 'Gagal Menambahkan Data');
                    }else{
                        $this->session->set_flashdata('success_message', 'Berhasil Menambahkan Data.');
                    }
                    redirect(site_url().'lhu');
                };
            }
	    }else{
	        redirect(site_url().'main/');
	    }
    }

    public function update()
    {
        $data = $this->session->userdata;
        if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }

        //check user level
	    if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['role']);
	    //check user level

	    //check is admin or not
	    if($dataLevel == "is_admin"){
            $this->form_validation->set_rules('no_lhu', 'Nomor LHU', 'required');
            $this->form_validation->set_rules('no_sampel', 'Nomor Sampel', 'required');
            $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
            $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Data LHU',
                    'isi'   =>  'admin/lhu/v_edit',
                    'user' => $this->session->userdata['first_name'],
                    'breadcrumbs' => $this->breadcrumbs->render(),
                    'cek' => $this->M_lhu->getData($no_lhu),
                    'dataLevel' => $dataLevel,
                );
                // var_dump($data);
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                // die();
            }else{
                    $tambah = [
                        'no_lhu' => $this->input->post('no_lhu'),
                        'no_sampel' => $this->input->post('no_sampel'),
                        'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                        'tgl_selesai' => $this->input->post('tgl_selesai'),
                    ];

                    //insert to database
                    if(!$this->M_lhu->edit($tambah)){
                        $this->session->set_flashdata('flash_message', 'Gagal Menambahkan Data');
                    }else{
                        $this->session->set_flashdata('success_message', 'Berhasil Menambahkan Data.');
                    }
                    redirect(site_url().'lhu');
            }
	    }else{
	        redirect(site_url().'main/');
	    }
    }

    public function hapus($no_lhu)
	{
		$data = array('no_lhu' => $no_lhu);
		$this->M_lhu->delete($data);
		$this->session->set_flashdata('success_message', 'Data Berhasil Dihapus');
		redirect('lhu', 'refresh');
	}
}
