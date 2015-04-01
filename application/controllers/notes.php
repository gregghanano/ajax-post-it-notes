<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function index()
	{
		$this->load->model('note');
		$everything = $this->note->get_all_notes();
		$this->load->view('notes_display', array('notes' => $everything));
	}
	public function load()
	{
		$this->load->model('note');
		$everything = $this->note->get_all_notes();
		$this->load->view('partial', array('notes' => $everything));
	}
	public function title_add()
	{
		$this->load->model('note');

		$notes = $this->input->post('title');

		$note_details = array(
		 				"title" => $notes);

		//add new title to database
		$insert_note = $this->note->add_note($note_details);

		//retrieve all posts from database
		$this->load->model('note');
		$all_notes = $this->note->get_all_notes();

		//send all posts to partial
		$this->load->view('partial', array('notes' => $all_notes));

		// if($insert_note == TRUE)
		// {
		// 	redirect('/');
		// }
	}
	public function description_add()
	{
		$this->load->model('note');

		$notes = $this->input->post('description');

		$id = $this->input->post('id_holder');

		$note_details = array(
						"description" => $notes);

		//update note in database
		$update_note = $this->note->update_note($note_details, $id);

		//retrieve all posts from database
		$this->load->model('note');
		$all_notes = $this->note->get_all_notes();

		//send all posts into partial
		$this->load-view('partial', array('notes' => $all_notes));

		// if($update_note == TRUE)
		// {
		// 	redirect('/');
		// }
	}
	public function delete($id)
	{
		$this->load->model('note');
		$this->note->delete_note($id);
		redirect('/');
	}
}
/* End of file notes.php */
/* Location: ./application/controllers/notes.php */