<?php

class MTanaman extends CI_Model
{
	public function getAll()
	{
		return $this->db->select('a.*,b.varietas,v.id_tanaman as cekid,v.id_user,v.id_status,d.*')
			->from('tbl_tanaman a')
			->join('tbl_varietas b', 'b.id_varietas=a.id_varietas')
			->join('tbl_tanamanverif v', 'v.id_tanaman=a.id_tanaman', 'left')
			->join('tbl_deskripsi d', 'd.id_deskripsi = b.id_deskripsi')
			->get()
			->result();
	}

	public function getById($id)
	{
		$this->db->select('t.*, v.*,j.varietas,d.*'); 
		$this->db->from('tbl_tanaman t');
		$this->db->join('tbl_tanamanverif v', 'v.id_tanaman = t.id_tanaman','left');
		$this->db->join('tbl_varietas j', 'j.id_varietas = t.id_varietas');
		$this->db->join('tbl_deskripsi d', 'd.id_deskripsi = j.id_deskripsi');
		$this->db->where('t.id_tanaman', $id);
		return $this->db->get()->row();
	}


	public function getVarietas()
	{
		return $this->db->select('*')
		->from('tbl_varietas v')
		->join('tbl_deskripsi d', 'd.id_deskripsi = v.id_deskripsi')
		 ->get()
		 ->result();
	}

	public function getDeskripsi()
	{
		return $this->db->get('tbl_deskripsi')
			->result();
	}



	public function newTanaman($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_tanaman', $data);

			return true;
		} else {
			return false;
		}
	}

	public function deleteTanaman($id)
	{
		if (!empty($id)) {
			$this->db->where('id_tanaman', $id);
			$this->db->delete('tbl_tanaman');

			return true;
		} else {
			return false;
		}
	}

	public function newVarietas($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_varietas', $data);

			return true;
		} else {
			return false;
		}
	}

	public function editVarietas($id,$data)
	{
		if (!empty($id) || !empty($data)) {
			$this->db->where('id_varietas', $id);
			$this->db->update('tbl_varietas', $data);

			return true;
		} else {
			return false;
		}
	}

	public function deleteVarietas($id)
	{
		if (!empty($id)) {
			$this->db->where('id_varietas', $id);
			$this->db->delete('tbl_varietas');

			return true;
		} else {
			return false;
		}
	}

	public function verifikasiTanaman($id, $user)
	{
		if (!empty($id)) {

			$active = [
				'is_active' => '1'
			];
			$this->db->where('id_tanaman', $id);
			$this->db->update('tbl_tanaman', $active);

			$data = array(
				'id_tanaman'	=>	$id,
				'id_status'	=>	"1",
				'id_user'	=>	$user,
			);

			$this->db->insert('tbl_tanamanverif', $data);

			return true;
		} else {
			return false;
		}
	}

	public function updateQr($id)
	{
		if (!empty($id)) {
			$data = array(
				'qrcode'	=>	$id . '.png'
			);

			$this->db->where('id_tanaman', $id);
			$this->db->update('tbl_tanaman', $data);

			return true;
		} else {
			return false;
		}
	}









	public function newDeskripsi($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_deskripsi', $data);
			return true;
		} else {
			return false;
		}
	}

	public function editDeskripsi($id_deskripsi,$data)
	{
		if (!empty($id_deskripsi) || !empty($data)) {
			$this->db->where('id_deskripsi', $id_deskripsi);
			$this->db->update('tbl_deskripsi', $data);

			return true;
		} else {
			return false;
		}
	}

	public function deleteDeskripsi($id_deskripsi)
	{
		if (!empty($id_deskripsi)) {
			$this->db->where('id_deskripsi', $id_deskripsi);
			$this->db->delete('tbl_deskripsi');

			return true;
		} else {
			return false;
		}
	}
}
