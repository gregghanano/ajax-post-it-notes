<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Model{
	function get_all_notes()
	{
		return $this->db->query('SELECT * FROM notes') -> result_array();
	}

	function add_note($notes)
	{
		$query = "INSERT INTO notes (title, created_at) VALUES (?,?)";
		$values = array($notes['title'], date('Y-m-d, H:i:s'));
		return $this->db->query($query, $values);
	}
	function update_note($notes, $id)
	{
	$query = "UPDATE notes SET description = ?, updated_at = ? WHERE id = $id";
	$values = array($notes['description'], date('Y-m-d, H:i:s'));
	return $this->db->query($query, $values);
	}
	function delete_note($id)
	{
		return $this->db->query("DELETE FROM notes WHERE id = $id");
	}
}