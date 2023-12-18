<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getPenghasilan(){
		$query = "
			select * from inventory
			inner join loundry on (inv_tran_locn = ld_id)
			inner join items on (inv_tran_item_name = item_id) 
		";

		return $this->db->query($query)->row();
	}

}