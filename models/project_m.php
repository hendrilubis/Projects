<?php
class Model_project_m extends MY_Model {
    function __construct() {
        parent::__construct();
    }


function add_project($data)
	{
		$this->db->insert('ipro_project', $data); 
	}

}