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
    
}
