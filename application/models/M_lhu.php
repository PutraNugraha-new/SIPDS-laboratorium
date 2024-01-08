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

    public function get_filtered_data($tgl_awal, $tgl_akhir) {
        // Fetch filtered data based on start and end date
        $this->db->where('tgl_selesai >=', $tgl_awal);
        $this->db->where('tgl_selesai <=', $tgl_akhir);
        $query = $this->db->get('tb_lhu');
        return $query->result();
    }
}
