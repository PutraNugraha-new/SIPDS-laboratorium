<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;
require_once FCPATH . 'vendor/autoload.php';

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
            if($dataLevel == "is_admin"){
                $data = array(
                    'title' => 'Data lhu',
                    'isi'   =>  'admin/lhu/v_home',
                    'user' => $this->session->userdata['first_name'],
                    'lhu' => $this->M_lhu->allData(),
                    'dataLevel' => $dataLevel,
                );
                // var_dump($data);
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                redirect('dashboard','refresh');
            }
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
            if($dataLevel == "is_admin"){
                $data = array(
                    'title' => 'Data LHU',
                    'isi'   =>  'admin/lhu/v_Laporan',
                    'user' => $this->session->userdata['first_name'],
                    'lhu' => $this->M_lhu->allData(),
                    'dataLevel' => $dataLevel,
                );
                // var_dump($data);
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                
                redirect('dashboard','refresh');
                
            }
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
            if($dataLevel == "is_admin"){
                $tgl_awal = $this->input->get('tgl_awal');
                $tgl_akhir = $this->input->get('tgl_akhir');
                $perusahaan = $this->input->get('nama_perusahaan');
    
                // ---------------
                if (!empty($tgl_awal) && !empty($tgl_akhir) && !empty($perusahaan)) {
                    // Menampilkan semua data
                    $data = array(
                        'title' => 'Data lhu',
                        'isi'   =>  'admin/lhu/v_Laporan',
                        'user' => $this->session->userdata['first_name'],
                        'perusahaan' => $this->M_lhu->ambilPerusahaan(),
                        'lhu' => $this->M_lhu->get_filtered_data($tgl_awal, $tgl_akhir, $perusahaan),
                        'dataLevel' => $dataLevel,
                    );
                } elseif (!empty($perusahaan) && empty($tgl_awal) && empty($tgl_akhir)) {
                    // Menampilkan data berdasarkan perusahaan
                    $data = array(
                        'title' => 'Data lhu',
                        'isi'   =>  'admin/lhu/v_Laporan',
                        'user' => $this->session->userdata['first_name'],
                        'perusahaan' => $this->M_lhu->ambilPerusahaan(),
                        'lhu' => $this->M_lhu->get_filtered_dataPerusahaan($perusahaan),
                        'dataLevel' => $dataLevel,
                    );
                } elseif (!empty($tgl_awal) && !empty($tgl_akhir) && empty($perusahaan)) {
                    // Menampilkan data berdasarkan rentang tanggal
                    $data = array(
                        'title' => 'Data lhu',
                        'isi'   =>  'admin/lhu/v_Laporan',
                        'user' => $this->session->userdata['first_name'],
                        'perusahaan' => $this->M_lhu->ambilPerusahaan(),
                        'lhu' => $this->M_lhu->get_filtered_dataTgl($tgl_awal, $tgl_akhir),
                        'dataLevel' => $dataLevel,
                    );
                } elseif (!empty($perusahaan) && (empty($tgl_awal) || empty($tgl_akhir))) {
                    // Mengirimkan flashdata jika form perusahaan diisi tetapi salah satu form tanggal tidak terisi
                    $this->session->set_flashdata('error', 'Harap isi kedua form tanggal');
                    redirect('lhu/laporan');
                } elseif ((empty($tgl_awal) || empty($tgl_akhir)) && !empty($perusahaan)) {
                    // Mengirimkan flashdata jika hanya salah satu form tanggal yang terisi
                    $this->session->set_flashdata('error', 'Harap isi kedua form tanggal');
                    redirect('lhu/laporan');
                } else {
                    // Kondisi default jika tidak ada form yang terisi
                    $data = array(
                        'title' => 'Data lhu',
                        'isi'   =>  'admin/lhu/v_Laporan',
                        'user' => $this->session->userdata['first_name'],
                        'perusahaan' => $this->M_lhu->ambilPerusahaan(),
                        'lhu' => $this->M_lhu->allData(),
                        'dataLevel' => $dataLevel,
                    );
                }
                // ---------------
                // $data['sampel'] = $this->M_sampel->get_filtered_data($tgl_awal, $tgl_akhir);
                // var_dump($data['sampel']);
                // die();
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                
                redirect('dashboard','refresh');
                
            }
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
            if($dataLevel == "is_admin"){

                $tgl_awal = $this->input->get('tgl_awal'); // Menggunakan input get untuk mendapatkan parameter dari URL
                $tgl_akhir = $this->input->get('tgl_akhir'); // Menggunakan input get untuk mendapatkan parameter dari URL
                $perusahaan = $this->input->get('nama_perusahaan');
    
                // ---------------
                if (!empty($tgl_awal) && !empty($tgl_akhir) && !empty($perusahaan)) {
                    // Menampilkan semua data
                    $data = array(
                        'lhu' => $this->M_lhu->get_filtered_data($tgl_awal, $tgl_akhir, $perusahaan),
                    );
                } elseif (!empty($perusahaan) && empty($tgl_awal) && empty($tgl_akhir)) {
                    // Menampilkan data berdasarkan perusahaan
                    $data = array(
                        'lhu' => $this->M_lhu->get_filtered_dataPerusahaan($perusahaan),
                    );
                } elseif (!empty($tgl_awal) && !empty($tgl_akhir) && empty($perusahaan)) {
                    // Menampilkan data berdasarkan rentang tanggal
                    $data = array(
                        'lhu' => $this->M_lhu->get_filtered_dataTgl($tgl_awal, $tgl_akhir),
                    );
                } elseif (!empty($perusahaan) && (empty($tgl_awal) || empty($tgl_akhir))) {
                    // Mengirimkan flashdata jika form perusahaan diisi tetapi salah satu form tanggal tidak terisi
                    $this->session->set_flashdata('error', 'Harap isi kedua form tanggal');
                    redirect('lhu/laporan');
                } elseif ((empty($tgl_awal) || empty($tgl_akhir)) && !empty($perusahaan)) {
                    // Mengirimkan flashdata jika hanya salah satu form tanggal yang terisi
                    $this->session->set_flashdata('error', 'Harap isi kedua form tanggal');
                    redirect('lhu/laporan');
                } else {
                    // Kondisi default jika tidak ada form yang terisi
                    $data = array(
                        'lhu' => $this->M_lhu->allData(),
                    );
                }
        
        
                // Load library Dompdf
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isPhpEnabled', true);
        
                $dompdf = new Dompdf($options);
        
                $html = $this->load->view('admin/lhu/cetakLaporan', $data, true);
                $dompdf->loadHtml($html);
        
                $dompdf->setPaper('A4', 'landscape');
        
                // Render PDF (stream to browser atau save ke file)
                $dompdf->render();
                $dompdf->stream('laporan.pdf', array('Attachment' => 0));
            }else{
                
                redirect('dashboard','refresh');
                
            }
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
            if($dataLevel == "is_admin"){
                $data = array(
                    'title' => 'Data lhu',
                    'isi'   =>  'admin/lhu/v_tambah',
                    'user' => $this->session->userdata['first_name'],
                    'breadcrumbs' => $this->breadcrumbs->render(),
                    'list_sampel' => $this->M_sampel->allData(),
                    'dataLevel' => $dataLevel,
                    'error' => ''
                );
                // var_dump($data);
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                
                redirect('dashboard','refresh');
                
            }
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
            if($dataLevel == "is_admin"){
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
            }else{
                
                redirect('dashboard','refresh');
                
            }
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

	    //check is admin or not
	    if($dataLevel == "is_admin"){
            $this->form_validation->set_rules('no_lhu', 'Nomor LHU', 'required');
            $this->form_validation->set_rules('no_sampel', 'Nomor Sampel', 'required');
            $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
            $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai');
            // $this->form_validation->set_rules('file_lhu', 'File LHU', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Data LHU',
                    'isi'   =>  'admin/lhu/v_tambah',
                    'user' => $this->session->userdata['first_name'],
                    'breadcrumbs' => $this->breadcrumbs->render(),
                    'dataLevel' => $dataLevel,
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                // Periksa duplikasi no_lhu sebelum unggah file
                if ($this->M_lhu->isDuplicate($this->input->post('no_lhu'))) {
                    $this->session->set_flashdata('flash_message', 'Nomor LHU sudah ada');
                    redirect('lhu/tambah', 'refresh');
                }

                $upload_data = array();

                // Periksa apakah file diunggah
                if (!empty($_FILES['file_lhu']['name'])) {
                    $config['upload_path'] = './file_lhu/';
                    $config['allowed_types'] = 'jpg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
                    $config['max_size']  = 10000; 

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('file_lhu')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_message', $error['error']);
                        redirect('lhu/tambah', 'refresh');
                    } else {
                        $upload_data = $this->upload->data();
                    }
                }
                $no_lhu_raw = $this->input->post('no_lhu');
                $no_lhu_sanitized = str_replace('/', '-', $no_lhu_raw);

                $tambah = [
                    'no_lhu' => $no_lhu_sanitized,
                    'no_sampel' => $this->input->post('no_sampel'),
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'tgl_selesai' => $this->input->post('tgl_selesai'),
                    'file_lhu' => (!empty($upload_data)) ? $upload_data['file_name'] : null,
                ];
            
                // Masukkan ke database
                $this->M_lhu->add($tambah);
                $this->session->set_flashdata('success_message', 'Berhasil Menambahkan Data.');
                redirect('lhu', 'refresh');
            }
	    }else{
	        redirect(site_url().'main/');
	    }
    }

    public function update()
    {
        $no_lhu = $this->input->post('no_lhu');
        // var_dump($no_lhu);
        // die();
        $data = $this->session->userdata;
        if (empty($data['role'])) {
            redirect(site_url() . 'main/login/');
        }

        // Periksa level pengguna
        if (empty($data['role'])) {
            redirect(site_url() . 'main/login/');
        }
        $dataLevel = $this->userlevel->checkLevel($data['role']);

        // Periksa apakah admin atau tidak
        if ($dataLevel == "is_admin") {
            $this->form_validation->set_rules('no_lhu', 'Nomor LHU', 'required');
            $this->form_validation->set_rules('no_sampel', 'Nomor Sampel', 'required');
            $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
            $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai');
            // $this->form_validation->set_rules('file_lhu', 'FILE LHU', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Data LHU',
                    'isi'   =>  'admin/lhu/v_edit',
                    'user' => $this->session->userdata['first_name'],
                    'breadcrumbs' => $this->breadcrumbs->render(),
                    'cek' => $this->M_lhu->getData($no_lhu),
                    'dataLevel' => $dataLevel,
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $no_lhu = $this->input->post('no_lhu');
                $ambil = $this->M_lhu->getData($no_lhu);

                $name = './file_lhu/' . $ambil->file_lhu;
                $nama = '';
                $cek_file = $_FILES['file_lhu']['name'];
                // Jika ada file baru diunggah
                if (!empty($_FILES['file_lhu']['name'])) {
                    if (is_readable($name) && is_file($name) && unlink($name)) {
                        $config['upload_path'] = './file_lhu/';
                        $config['allowed_types'] = 'jpg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
                        $config['max_size']  = 10000;

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        // var_dump($config);
                        // die();

                        if (!$this->upload->do_upload('file_lhu')) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata('error_message', $error['error']);
                            var_dump($error['error']);
                            die();
                            redirect('lhu/edit/' . $no_lhu, 'refresh');
                        } else {
                            $upload_data = $this->upload->data();
                            $nama = $upload_data['file_name'];
                        }
                    }else{
                        $config['upload_path'] = './file_lhu/';
                        $config['allowed_types'] = 'jpg|png|pdf|doc|docx'; // Sesuaikan jenis file yang diizinkan
                        $config['max_size']  = 10000;

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        // var_dump($config);
                        // die();

                        if (!$this->upload->do_upload('file_lhu')) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata('error_message', $error['error']);
                            var_dump($error['error']);
                            die();
                            redirect('lhu/edit/' . $no_lhu, 'refresh');
                        } else {
                            $upload_data = $this->upload->data();
                            $nama = $upload_data['file_name'];
                        }
                    }
                } else {
                    // Jika tidak ada file baru diunggah, gunakan nama file yang ada
                    $nama = $ambil->file_lhu;
                }

                $tambah = [
                    'no_lhu' => $this->input->post('no_lhu'),
                    'no_sampel' => $this->input->post('no_sampel'),
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'tgl_selesai' => $this->input->post('tgl_selesai'),
                    'file_lhu' => $nama
                ];

                // var_dump($tambah);
                // die();

                $this->M_lhu->edit($tambah);
                $this->session->set_flashdata('success_message', 'Berhasil Edit Data.');
                redirect('lhu', 'refresh');
            }
        } else {
            redirect(site_url() . 'lhu/');
        }
    }

    public function hapus($no_lhu)
	{
	    $data = $this->session->userdata;
        if (empty($data['role'])) {
            redirect(site_url() . 'main/login/');
        }

        // Periksa level pengguna
        if (empty($data['role'])) {
            redirect(site_url() . 'main/login/');
        }
        $dataLevel = $this->userlevel->checkLevel($data['role']);
        if($dataLevel == "is_admin"){
            $ambil = $this->M_lhu->getData($no_lhu);
            $name = './file_lhu/'.$ambil->file_lhu;
    
            $data = array('no_lhu' => $no_lhu);
            if(is_readable($name) && unlink($name)){
                $this->M_lhu->delete($data);
                $this->session->set_flashdata('success_message', 'Data Berhasil Dihapus');
                redirect('lhu ', 'refresh');
            }
        }else{
            
            redirect('dashboard','refresh');
            
        }
	}

    public function unduh($nama_file){
        $data = $this->session->userdata;
        if (empty($data['role'])) {
            redirect(site_url() . 'main/login/');
        }

        // Periksa level pengguna
        if (empty($data['role'])) {
            redirect(site_url() . 'main/login/');
        }
        $dataLevel = $this->userlevel->checkLevel($data['role']);
        if($dataLevel == "is_admin"){
            $this->load->helper('download');
            $file = FCPATH . 'file_lhu/' . $nama_file ;
            // var_dump($file);
            // die();
    
            if(file_exists($file)){
                $tipe_konten = mime_content_type($file);
    
                force_download($nama_file, file_get_contents($file), $tipe_konten);
            }else{
                echo "File Tidak Ditemukan";
            }
        }else{
            
            redirect('dashboard','refresh');
            
        }
    }

    public function getDataSampel(){
        $data = $this->session->userdata;
        if (empty($data['role'])) {
            redirect(site_url() . 'main/login/');
        }

        // Periksa level pengguna
        if (empty($data['role'])) {
            redirect(site_url() . 'main/login/');
        }
        $dataLevel = $this->userlevel->checkLevel($data['role']);
        if($dataLevel == "is_admin"){
            $no_sampel = $this->input->get('no_sampel');
            $sampel_data = $this->M_lhu->getSampelData($no_sampel);
    
            // Mengembalikan data sebagai JSON
            echo json_encode($sampel_data);
            exit;
        }else{
            
            redirect('dashboard','refresh');
            
        }
    }
}
