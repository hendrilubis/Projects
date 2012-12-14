<?php
class Model_project_m extends MY_Model {
    function __construct() {
        parent::__construct();
    }


//fungsi untuk menampilkan project disertai paginasi
function select_all_project($perPage,$uri){
	$this->db->select('*');
	$this->db->from('ipro_project');
	$getData = $this->db->get('',$perPage, $uri);
		if ($getData->num_rows() > 0) {
			return $getData->result();
		} else {
     return null;
		}
}
//fungsi untuk memasukkan data ke dalam database
function add_project($data)
	{
		$this->db->insert('ipro_project', $data); 
	}
//memilih semua project yang ada, digunakan untuk menghitung banyaknya row yang ada
function select_all_project_semua() 
    {
		$this->db->select('*');
		$this->db->from('ipro_project');
		return $this->db->get();
    }
//memilih project tertentu berdasarkan id
function select_project($id) 
    {
		$this->db->select('*');
		$this->db->from('ipro_project');
		$this->db->where('id',$id);
		return $this->db->get();
    }
//fungsi untuk memperoleh id terakhir yang telah dimasukkan
function get_last_id()
	{
		$this->db->select('*');
		$this->db->from('ipro_project');
		$query = $this->db->get();
		$last = $query->last_row();
		$last_id = $last->project_id;
		return $last_id;
	}
}