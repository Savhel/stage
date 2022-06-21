<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class taskList extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('taskList_model');
	}
	public function insert_Controllers(){
		//$id = $this->input->get
		if($this->taskList_model->insert($id) === '1'){
			$message = 'votre tâche a été ajoutée avec success !!';
			$this->load->view('taskList',array('message'=>$message));
		}elseif ($this->taskList_model->insert($id) === '2') {
			$message = 'cette tâche existe déjà  !!';
			$this->load->view('taskList',array('message'=>$message));
		}elseif ($this->taskList_model->insert($id) === '3') {
			$message = 'Renseigner correctement ce dont vous voulez renseigner !!';
			$this->load->view('taskList',array('message'=>$message));
		}
	}
}
