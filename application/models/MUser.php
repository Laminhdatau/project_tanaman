<?php

class MUser extends CI_Model
{
	public function getRole()
	{
		return $this->db->get('tbl_mst_role')->result();
	}

	public function getAll()
	{
		return $this->db->select('a.*, b.role ')
				->from('tbl_user a')
				->join('tbl_mst_role b', 'a.id_role = b.id_role','left')
				->get()
				->result();
	}

	public function getUserById($id)
	{
		return $this->db->select('a.*,b.role')->from('tbl_user a')->join('tbl_mst_role b', 'a.id_role = b.id_role', 'left')->where('a.id_user',$id)->get()->row();
	}

	public function newUser($data)
	{
		$this->db->insert('tbl_user',$data);
		
		return true;
	}

	public function deleteUser($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tbl_user');

		return true;
	}

	public function resetPassword($id)
	{
		$data = array(
			'password'	=>	MD5('tanaman12345')
		);
		$this->db->where('id_user', $id);
		$this->db->update('tbl_user', $data);

		return true;	
	}

	public function activeUser($id,$activate)
	{
		$data = array(
			'is_active'	=> $activate
		);
		$this->db->where('id_user', $id);
		$this->db->update('tbl_user',$data);

		return true;
	}
}
