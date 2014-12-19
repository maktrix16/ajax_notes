<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Model { 

	function get_all_notes(){
		return $this->db->query("SELECT * FROM notes")->result_array();
	}

	function get_notes_by_id($note_id){
		$note_id=intval($note_id);
		return $this->db->query("SELECT * FROM notes WHERE id=?",array($note_id))->row_array();
	}

	function add_note($note){
		$query="INSERT INTO notes (title, created_at) VALUES (?,?)";
		$values=array($note['title'],date("Y-m-d, H:i:s"));
		$this->db->query($query,$values);
	}

	function edit_note_by_id($note){
		$query="UPDATE notes SET description = ?, updated_at = ? WHERE id=? ;";
		$values=array($note['description'],date("Y-m-d, H:i:s"),$note['id']);
		$this->db->query($query,$values);		
	}

	function delete_note_by_id($note){
		$this->db->query("DELETE FROM notes WHERE id=?",array($note['id']));
	}

	function get_last_id(){
		$this->db->insert_id();
	}
}

?>