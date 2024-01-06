<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sampel extends CI_Controller {
	public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
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
				'title' => 'Data Sampel',
                'isi'   =>  'admin/sampel/v_home',
                'user' => $this->session->userdata['first_name'],
                'sampel' => $this->M_sampel->allData(),
                'dataLevel' => $dataLevel,
            );
            // var_dump($data);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
	}

	public function tambah()
	{
        $this->breadcrumbs->AddMultipleItems(array(
        'sampel' => base_url() . 'sampel',
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
				'title' => 'Data Sampel',
                'isi'   =>  'admin/sampel/v_tambah',
                'user' => $this->session->userdata['first_name'],
                'breadcrumbs' => $this->breadcrumbs->render(),
                'dataLevel' => $dataLevel,
            );
            // var_dump($data);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
	}

    public function edit($no_sampel)
	{
        $this->breadcrumbs->AddMultipleItems(array(
        'sampel' => base_url() . 'sampel',
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
				'title' => 'Data Sampel',
                'isi'   =>  'admin/sampel/v_edit',
                'user' => $this->session->userdata['first_name'],
                // 'breadcrumbs' => $this->breadcrumbs->render(),
                'dataLevel' => $dataLevel,
                'sampel' => $this->M_sampel->getData($no_sampel)
            );
            // var_dump($data);
            // die();
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
            $this->form_validation->set_rules('no_sampel', 'Nomor Sampel', 'required');
            $this->form_validation->set_rules('jenis_sampel', 'Jenis Sampel', 'required');
            $this->form_validation->set_rules('parameter_diuji', 'Parameter Diuji', 'required');
            $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
            $this->form_validation->set_rules('nama_pengantar', 'Nama Pengantar', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('no_handphone', 'Nomor Handphone', 'required');
            $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
            $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');
            // $this->form_validation->set_rules('no_lhu', 'Password Confirmation');
            // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Data Sampel',
                    'isi'   =>  'admin/sampel/v_tambah',
                    'user' => $this->session->userdata['first_name'],
                    'breadcrumbs' => $this->breadcrumbs->render(),
                    'dataLevel' => $dataLevel,
                );
                // var_dump($data);
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                // die();
            }else{
                if($this->M_sampel->isDuplicate($this->input->post('no_sampel'))){
                    $this->session->set_flashdata('flash_message', 'Nomor Sampel already exists');
                    redirect(site_url().'sampel/tambah');
                }else{
                    $tambah = [
                        'no_sampel' => $this->input->post('no_sampel'),
                        'jenis_sampel' => $this->input->post('jenis_sampel'),
                        'parameter_diuji' => $this->input->post('parameter_diuji'),
                        'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                        'nama_pengantar' => $this->input->post('nama_pengantar'),
                        'alamat' => $this->input->post('alamat'),
                        'no_handphone' => $this->input->post('no_handphone'),
                        'tgl_masuk' => $this->input->post('tgl_masuk'),
                        'tgl_selesai' => $this->input->post('tgl_selesai'),
                        'no_lhu' => $this->input->post('no_lhu'),
                        'keterangan' => $this->input->post('keterangan')
                    ];

                    //insert to database
                    if(!$this->M_sampel->add($tambah)){
                        $this->session->set_flashdata('flash_message', 'There was a problem add new user');
                    }else{
                        $this->session->set_flashdata('success_message', 'New user has been added.');
                    }
                    redirect(site_url().'sampel');
                };
            }
	    }else{
	        redirect(site_url().'main/');
	    }
    }

    public function update($no_sampel){
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
            $this->form_validation->set_rules('no_sampel', 'Nomor Sampel', 'required');
            $this->form_validation->set_rules('jenis_sampel', 'Jenis Sampel', 'required');
            $this->form_validation->set_rules('parameter_diuji', 'Parameter Diuji', 'required');
            $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
            $this->form_validation->set_rules('nama_pengantar', 'Nama Pengantar', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('no_handphone', 'Nomor Handphone', 'required');
            $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
            $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');
            // $this->form_validation->set_rules('no_lhu', 'Password Confirmation');
            // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Data Sampel',
                    'isi'   =>  'admin/sampel/v_edit',
                    'user' => $this->session->userdata['first_name'],
                    'breadcrumbs' => $this->breadcrumbs->render(),
                    'sampel' => $this->M_sampel->getData($no_sampel),
                    'dataLevel' => $dataLevel,
                );
                // var_dump($data);
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                // die();
            }else{
                    $edit = [
                        'no_sampel' => $no_sampel,
                        'jenis_sampel' => $this->input->post('jenis_sampel'),
                        'parameter_diuji' => $this->input->post('parameter_diuji'),
                        'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                        'nama_pengantar' => $this->input->post('nama_pengantar'),
                        'alamat' => $this->input->post('alamat'),
                        'no_handphone' => $this->input->post('no_handphone'),
                        'tgl_masuk' => $this->input->post('tgl_masuk'),
                        'tgl_selesai' => $this->input->post('tgl_selesai'),
                        'no_lhu' => $this->input->post('no_lhu'),
                        'keterangan' => $this->input->post('keterangan')
                    ];

                    // var_dump($edit);
                    // die();

                    //update to database
                    if($this->M_sampel->edit($edit)){
                        $this->session->set_flashdata('flash_message', 'gagal Edit data');
                    }else{
                        $this->session->set_flashdata('success_message', 'Berhasil Edit Data.');
                    }
                    redirect(site_url().'sampel');
            }
	    }else{
	        redirect(site_url().'main/');
	    }
    }

    public function hapus($no_sampel)
	{
		$data = array('no_sampel' => $no_sampel);
		$this->M_sampel->delete($data);
		$this->session->set_flashdata('success_message', 'Data Berhasil Dihapus');
		redirect('sampel', 'refresh');
	}
}
