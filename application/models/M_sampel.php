<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sampel extends CI_Model {
    
    //check is duplicate
    public function isDuplicate($no_sampel)
    {     
        $this->db->get_where('tb_sampel', array('no_sampel' => $no_sampel), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }

    public function add($data){
        $this->db->insert('tb_sampel',$data);
    }
    public function edit($data)
    {
        $this->db->where('no_sampel',$data['no_sampel']);
        $this->db->update('tb_sampel',$data);
    }

    public function allData(){
        $this->db->select('tb_sampel.*, tb_lhu.no_lhu');
        $this->db->from('tb_sampel');
        $this->db->join('tb_lhu', 'tb_lhu.no_lhu = tb_sampel.no_lhu', 'left');
        $this->db->order_by('tb_sampel.tgl_masuk', 'ASC'); 
        return $this->db->get()->result();
    }

    public function getData($no_sampel){
        $this->db->select('*');
        $this->db->from('tb_sampel');
        $this->db->where('no_sampel', $no_sampel);
        return $this->db->get()->row();
    }

    public function delete($data)
	{
		$this->db->where('no_sampel', $data['no_sampel']);
		$this->db->delete('tb_sampel',$data);
	}

    public function getCountData(){
        return $this->db->count_all("tb_sampel");
    }

    public function get_filtered_data($tgl_awal, $tgl_akhir, $perusahaan) {
        // Fetch filtered data based on start and end date
        $this->db->where('tgl_masuk >=', $tgl_awal);
        $this->db->where('tgl_masuk <=', $tgl_akhir);
        $this->db->like('nama_perusahaan', $perusahaan);
        $query = $this->db->get('tb_sampel');
        return $query->result();
    }
    public function get_filtered_dataTgl($tgl_awal, $tgl_akhir) {
        // Fetch filtered data based on start and end date
        $this->db->where('tgl_masuk >=', $tgl_awal);
        $this->db->where('tgl_masuk <=', $tgl_akhir);
        // $this->db->like('nama_perusahaan', $perusahaan);
        $query = $this->db->get('tb_sampel');
        return $query->result();
    }
    public function get_filtered_dataPerusahaan($perusahaan) {
        // Fetch filtered data based on start and end date
        $this->db->like('nama_perusahaan', $perusahaan);
        $query = $this->db->get('tb_sampel');
        return $query->result();
    }
    
    public function getChartData() {
        $query = $this->db->select('jenis_sampel, COUNT(*) as jumlah_sampel')
            ->from('tb_sampel') // Ganti 'nama_tabel' dengan nama tabel Anda
            ->group_by('jenis_sampel')
            ->get();
        return $query->result();
    }

    public function ambilPerusahaan(){
        $this->db->select('nama_perusahaan');
        $this->db->from('tb_sampel');
        return $this->db->get()->result();
    }
}
