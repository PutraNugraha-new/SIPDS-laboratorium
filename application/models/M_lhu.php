<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lhu extends CI_Model {
    
    //check is duplicate
    public function isDuplicate($no_lhu)
    {     
        $this->db->get_where('tb_lhu', array('no_lhu' => $no_lhu), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }

    public function add($data){
        $this->db->insert('tb_lhu',$data);
    }
    public function edit($data)
    {
        $this->db->where('no_lhu',$data['no_lhu']);
        $this->db->update('tb_lhu',$data);
    }

    public function allData(){
        $this->db->select('*');
        $this->db->from('tb_lhu');
        $this->db->order_by('tb_lhu.tgl_selesai', 'ASC');
        return $this->db->get()->result();
    }

    public function getData($no_lhu){
        $this->db->select('*');
        $this->db->from('tb_lhu');
        $this->db->where('no_lhu', $no_lhu);
        return $this->db->get()->row();
    }

    public function delete($data)
	{
		$this->db->where('no_lhu', $data['no_lhu']);
		$this->db->delete('tb_lhu',$data);
	}
    
    public function getCountData(){
        return $this->db->count_all("tb_lhu");
    }

    public function get_filtered_dataTgl($tgl_awal, $tgl_akhir) {
        // Fetch filtered data based on start and end date
        $this->db->where('tgl_selesai >=', $tgl_awal);
        $this->db->where('tgl_selesai <=', $tgl_akhir);
        $query = $this->db->get('tb_lhu');
        return $query->result();
    }
    public function get_filtered_data($tgl_awal, $tgl_akhir, $perusahaan) {
        // Fetch filtered data based on start and end date
        $this->db->where('tgl_selesai >=', $tgl_awal);
        $this->db->where('tgl_selesai <=', $tgl_akhir);
        $this->db->like('nama_perusahaan', $perusahaan);
        $query = $this->db->get('tb_lhu');
        return $query->result();
    }
    public function get_filtered_dataPerusahaan($perusahaan) {
        // Fetch filtered data based on start and end date
        $this->db->like('nama_perusahaan', $perusahaan);
        $query = $this->db->get('tb_lhu');
        return $query->result();
    }

    public function ambilPerusahaan(){
        $this->db->select('nama_perusahaan');
        $this->db->from('tb_lhu');
        return $this->db->get()->result();
    }

    public function getSampelData($no_sampel)
    {
        $this->db->select('nama_perusahaan, tgl_selesai');
        $this->db->from('tb_sampel');
        $this->db->where('no_sampel', $no_sampel);
        $query = $this->db->get();

        // Mengembalikan data sebagai array
        return $query->row_array();
    }
}
