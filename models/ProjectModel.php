<?php
class ProjectModel extends MY_Model {
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

	function select_selected_project($project_id){
		$this->db->select("ip.title");
		$this->db->select('ip.date_expired');
		$this->db->select('ic.category_name');
		$this->db->from('ipro_project ip');
		$this->db->from('ipro_job_category ic');
		$this->db->where('ip.project_id = '.$project_id.' AND ip.category_id = ic.category_id');
		return $this->db->get();

		/*

		select ip.title, ip.date_expired, ic.category_name from default_ipro_project ip, default_ipro_job_category ic where ip.project_id = 1 AND ip.category_id = ic.category_id

		*/
	}

	function select_bidder_project($project_id){
		$this->db->select('ipb.user2_id');
		$this->db->select('ipb.price_offer_bid');
		$this->db->select('ipb.deadline_bid');
		$this->db->select('u.username');
		$this->db->select('u.rating');
		$this->db->select('u.skill');
		$this->db->from('ipro_project_bidder ipb');
		$this->db->from('ipro_user2 u');
		$this->db->where('ipb.project_id = '.$project_id.' AND ipb.user2_id = u.user2_id');
		return $this->db->get();

		/*
		select ipb.user2_id,ipb.price_offer_bid,ipb.deadline_bid,u.username,u.rating,u.skill from default_ipro_project_bidder ipb, default_ipro_user2 u where ipb.project_id = 1 AND ipb.user2_id = u.user2_id
		*/
	}
	function select_all_project_search($keyword) 
    {
		$this->db->select('*');
		$this->db->from('ipro_project');
		$this->db->where('title LIKE "%'.$keyword.'%"');
		return $this->db->get();
    }

    function select_search_project($perPage,$uri,$keyword){
	$this->db->select('*');
	$this->db->from('ipro_project');
	$this->db->where('title LIKE "%'.$keyword.'%"');
	$getData = $this->db->get('',$perPage, $uri);
		if ($getData->num_rows() > 0) {
			return $getData->result();
		} else {
     return null;
		}
	}

	function select_all_project_ascTitle($perPage,$uri){
	$this->db->select('*');
	$this->db->from('ipro_project');
	$this->db->order_by('title asc');
	$getData = $this->db->get('',$perPage, $uri);
		if ($getData->num_rows() > 0) {
			return $getData->result();
		} else {
     return null;
		}
	}

	function select_all_project_ascBudget($perPage,$uri){
	$this->db->select('*');
	$this->db->from('ipro_project');
	$this->db->order_by('Budget asc');
	$getData = $this->db->get('',$perPage, $uri);
		if ($getData->num_rows() > 0) {
			return $getData->result();
		} else {
     return null;
		}
	}

	public function TambahProjectDatabase($data){
		$this->db->insert('ipro_project', $data); 
	}

	function PilihSemuaProject() 
    {
		$this->db->select('*');
		$this->db->from('ipro_project');
		return $this->db->get();
    }

    function PilihProjectPerPage($perPage,$uri){
	$this->db->select('*');
	$this->db->from('ipro_project');
	$getData = $this->db->get('',$perPage, $uri);
		if ($getData->num_rows() > 0) {
			return $getData->result();
		} else {
     return null;
		}
	}

	function HasilPencarianProject($keyword) 
    {
		$this->db->select('*');
		$this->db->from('ipro_project');
		$this->db->where('title LIKE "%'.$keyword.'%"');
		return $this->db->get();
    }

    function HasilPengurutanProjectTitle($perPage,$uri){
	$this->db->select('*');
	$this->db->from('ipro_project');
	$this->db->order_by('title asc');
	$getData = $this->db->get('',$perPage, $uri);
		if ($getData->num_rows() > 0) {
			return $getData->result();
		} else {
     return null;
		}
	}

	function HasilPengurutanProjectBudget($perPage,$uri){
	$this->db->select('*');
	$this->db->from('ipro_project');
	$this->db->order_by('Budget asc');
	$getData = $this->db->get('',$perPage, $uri);
		if ($getData->num_rows() > 0) {
			return $getData->result();
		} else {
     return null;
		}
	}

	function HasilPencarianProjectPerPage($perPage,$uri,$keyword){
	$this->db->select('*');
	$this->db->from('ipro_project');
	$this->db->where('title LIKE "%'.$keyword.'%"');
	$getData = $this->db->get('',$perPage, $uri);
		if ($getData->num_rows() > 0) {
			return $getData->result();
		} else {
     return null;
		}
	}

	function PilihProjectTerpilih($project_id){
		$this->db->select("ip.title");
		$this->db->select('ip.date_expired');
		$this->db->select('ic.category_name');
		$this->db->from('ipro_project ip');
		$this->db->from('ipro_job_category ic');
		$this->db->where('ip.project_id = '.$project_id.' AND ip.category_id = ic.category_id');
		return $this->db->get();

		/*

		select ip.title, ip.date_expired, ic.category_name from default_ipro_project ip, default_ipro_job_category ic where ip.project_id = 1 AND ip.category_id = ic.category_id

		*/
	}

	function TampilBidderProject($project_id){
		$this->db->select('ipb.user2_id');
		$this->db->select('ipb.price_offer_bid');
		$this->db->select('ipb.deadline_bid');
		$this->db->select('u.username');
		$this->db->select('u.rating');
		$this->db->select('u.skill');
		$this->db->from('ipro_project_bidder ipb');
		$this->db->from('ipro_user2 u');
		$this->db->where('ipb.project_id = '.$project_id.' AND ipb.user2_id = u.user2_id');
		return $this->db->get();

		/*
		select ipb.user2_id,ipb.price_offer_bid,ipb.deadline_bid,u.username,u.rating,u.skill from default_ipro_project_bidder ipb, default_ipro_user2 u where ipb.project_id = 1 AND ipb.user2_id = u.user2_id
		*/
	}
}