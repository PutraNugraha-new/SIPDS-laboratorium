<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;
require_once FCPATH . 'vendor/autoload.php';

class Sampel extends CI_Controller {
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

        $options = new Options();
        $options->set('defaultFont', 'Times New Roman');
        $dompdf = new Dompdf($options);
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

    public function laporan(){
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
                'isi'   =>  'admin/sampel/v_laporan',
                'user' => $this->session->userdata['first_name'],
                'sampel' => $this->M_sampel->allData(),
                'perusahaan' => $this->M_sampel->ambilPerusahaan(),
                'dataLevel' => $dataLevel,
            );
            // var_dump($data);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
    }

    public function cetakLaporan(){
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
            $tgl_awal = $this->input->get('tgl_awal'); // Menggunakan input get untuk mendapatkan parameter dari URL
            $tgl_akhir = $this->input->get('tgl_akhir'); // Menggunakan input get untuk mendapatkan parameter dari URL
            $perusahaan = $this->input->get('nama_perusahaan');

            if (!empty($tgl_awal) && !empty($tgl_akhir) && !empty($perusahaan)) {
                // Menampilkan semua data
                $data = array(
                    'sampel' => $this->M_sampel->get_filtered_data($tgl_awal, $tgl_akhir, $perusahaan),
                );
            } elseif (!empty($perusahaan) && empty($tgl_awal) && empty($tgl_akhir)) {
                // Menampilkan data berdasarkan perusahaan
                $data = array(
                    'sampel' => $this->M_sampel->get_filtered_dataPerusahaan($perusahaan),
                );
            } elseif (!empty($tgl_awal) && !empty($tgl_akhir) && empty($perusahaan)) {
                // Menampilkan data berdasarkan rentang tanggal
                $data = array(
                    'sampel' => $this->M_sampel->get_filtered_dataTgl($tgl_awal, $tgl_akhir),
                );
            } elseif (!empty($perusahaan) && (empty($tgl_awal) || empty($tgl_akhir))) {
                // Mengirimkan flashdata jika form perusahaan diisi tetapi salah satu form tanggal tidak terisi
                $this->session->set_flashdata('error', 'Harap isi kedua form tanggal');
                redirect('sampel/laporan');
            } elseif ((empty($tgl_awal) || empty($tgl_akhir)) && !empty($perusahaan)) {
                // Mengirimkan flashdata jika hanya salah satu form tanggal yang terisi
                $this->session->set_flashdata('error', 'Harap isi kedua form tanggal');
                redirect('sampel/laporan');
            } else {
                // Kondisi default jika tidak ada form yang terisi
                $data = array(
                    'sampel' => $this->M_sampel->allData(),
                );
            }
    
    
            // Load library Dompdf
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
    
            $dompdf = new Dompdf($options);
    
            $html = $this->load->view('admin/sampel/cetakLaporan', $data, true);
            $dompdf->loadHtml($html);
    
            $dompdf->setPaper('A4', 'landscape');
    
            // Render PDF (stream to browser atau save ke file)
            $dompdf->render();
            $dompdf->stream('laporan.pdf', array('Attachment' => 0));
        }
    }
    

    public function getData() {
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
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');
            $perusahaan = $this->input->get('nama_perusahaan');


            // --------------------
            if (!empty($tgl_awal) && !empty($tgl_akhir) && !empty($perusahaan)) {
                // Menampilkan semua data
                $data = array(
                    'title' => 'Data Sampel',
                    'isi'   =>  'admin/sampel/v_laporan',
                    'user' => $this->session->userdata['first_name'],
                    'perusahaan' => $this->M_sampel->ambilPerusahaan(),
                    'sampel' => $this->M_sampel->get_filtered_data($tgl_awal, $tgl_akhir, $perusahaan),
                    'dataLevel' => $dataLevel,
                );
            } elseif (!empty($perusahaan) && empty($tgl_awal) && empty($tgl_akhir)) {
                // Menampilkan data berdasarkan perusahaan
                $data = array(
                    'title' => 'Data Sampel',
                    'isi'   =>  'admin/sampel/v_laporan',
                    'user' => $this->session->userdata['first_name'],
                    'perusahaan' => $this->M_sampel->ambilPerusahaan(),
                    'sampel' => $this->M_sampel->get_filtered_dataPerusahaan($perusahaan),
                    'dataLevel' => $dataLevel,
                );
            } elseif (!empty($tgl_awal) && !empty($tgl_akhir) && empty($perusahaan)) {
                // Menampilkan data berdasarkan rentang tanggal
                $data = array(
                    'title' => 'Data Sampel',
                    'isi'   =>  'admin/sampel/v_laporan',
                    'user' => $this->session->userdata['first_name'],
                    'perusahaan' => $this->M_sampel->ambilPerusahaan(),
                    'sampel' => $this->M_sampel->get_filtered_dataTgl($tgl_awal, $tgl_akhir),
                    'dataLevel' => $dataLevel,
                );
            } elseif (!empty($perusahaan) && (empty($tgl_awal) || empty($tgl_akhir))) {
                // Mengirimkan flashdata jika form perusahaan diisi tetapi salah satu form tanggal tidak terisi
                $this->session->set_flashdata('error', 'Harap isi kedua form tanggal');
                redirect('sampel/laporan');
            } elseif ((empty($tgl_awal) || empty($tgl_akhir)) && !empty($perusahaan)) {
                // Mengirimkan flashdata jika hanya salah satu form tanggal yang terisi
                $this->session->set_flashdata('error', 'Harap isi kedua form tanggal');
                redirect('sampel/laporan');
            } else {
                // Kondisi default jika tidak ada form yang terisi
                $data = array(
                    'title' => 'Data Sampel',
                    'isi'   =>  'admin/sampel/v_laporan',
                    'user' => $this->session->userdata['first_name'],
                    'perusahaan' => $this->M_sampel->ambilPerusahaan(),
                    'sampel' => $this->M_sampel->allData(),
                    'dataLevel' => $dataLevel,
                );
            }
            // --------------------
            // $data['sampel'] = $this->M_sampel->get_filtered_data($tgl_awal, $tgl_akhir);
            // var_dump($data['sampel']);
            // die();
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
                'lhu' => $this->M_lhu->allData(),
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
                'lhu' => $this->M_lhu->allData(),
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
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
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
                        $this->session->set_flashdata('flash_message', 'Gagal Menambahkan Data Sampel');
                    }else{
                        $this->session->set_flashdata('success_message', 'Berhasil Menambahkan Data Sampel');
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
