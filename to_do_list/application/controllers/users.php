<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	public $Session;

	public function register()
	{
		$this->load->model('users_model');
		if ($this->users_model->registration() === true) {
			$message = 'Vous pouvez vous connecter maintenant !!!!';
			$typeMessage = 1;
			$this->load->view('welcome', array('message' => $message, 'type' => $typeMessage));
		} else {
			$typeMessage = 0;
			$message = 'une erreur est survenue votre email existe déja dans la base de données !!!!';
			$this->load->view('welcome', array('message' => $message, 'type' => $typeMessage));
		}


	}

	public function connect()
	{

		$this->load->model('user_connect_model');
		$this->load->model('taskList_model');
		//$result = $this->taskList_model->display($this->session->id);
		if ($this->user_connect_model->connect() === '1') {

			//$config [ 'base_url' ]  =  'http://localhost/stage/to_do_list/users/connect' ;
			//$config [ 'total_rows' ]  =  $this->user_connect_model->countAll($this->session->id) ;
			//$config [ 'per_page' ]  =  2;
			//$this -> pagination -> initialize ( $config );
			$this->sess = array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email
				//'tache'=> $result
			);
			//$data = $this->user_connect_model->getall($this->session->id,$config [ 'per_page' ],$offset);
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'page'=>1
				//'tasks'=>$data
				//'tache'=> $result
			));

		} elseif ($this->user_connect_model->connect() === '2') {
			$message = 'Vous avez entré un mot de passe incorrect !!!!';
			$this->load->view('welcome', array('message' => $message, 'type' => 0));
		} elseif ($this->user_connect_model->connect() === '3') {
			$message = 'une erreur est survenue vous ne pouvez pas utiliser cet adresse email !!!!';
			$this->load->view('welcome', array('message' => $message, 'type' => 0));
		} elseif ($this->user_connect_model->connect() === '4') {
			$message = 'S\'il vous plait remplissez tous les champs avec vos informations de connexion !!!!';
			$this->load->view('welcome', array('message' => $message, 'type' => 0));
		} else {

		}
	}

	public function insert()
	{
		$this->load->model('taskList_model');
		if ($this->taskList_model->insert($this->session->id) == '1') {
			$message = 'nouvelle tâche enregistrée';

			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 0,
				'page'=>1
			));
		} elseif ($this->taskList_model->insert($this->session->id) == '3') {
			$message = 'Renseigner tous les champs SVP !! ';

			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 1,
				'page'=>1
			));
		} else {
			$message = 'Désolé mais une tâche est déjà prévue à ' . $this->taskList_model->insert($this->session->id);
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 1,
				'page'=>1
			));
		}


	}

	public function disconnect()
	{
		$this->load->model('user_connect_model');
		$this->user_connect_model->disconnect();
		$this->load->view('welcome');
	}
	public function edit(){
		$this->load->model('user_connect_model');
		if ($this->user_connect_model->edit($this->session->password,$this->session->id)=== 1){

			$message = 'Votre profile a bien été mis à jour !! ';
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 0,
				'page'=>1
			));
		}elseif ($this->user_connect_model->edit($this->session->password,$this->session->id)=== 2){
			$message = 'Désolé il n\'est pas possible de mettre votre mot de passe à jour et donc votre profile aussi veuillez contacter l\'administrateur si vous avez oublié le mot de passe ';
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 1,
				'page'=>1
			));
		}elseif ($this->user_connect_model->edit($this->session->password,$this->session->id)=== 3){
			$message = 'Votre profile a bien été mis à jour !! ';
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 0,
				'page'=>1
			));
		}else{
			$message = 'Vous voulez renseigner quoi ??';
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 1,
				'page'=>1
			));
		}
	}
	public function checkItem($id,$own){

		$this->load->model('taskList_model');
		$this->taskList_model->checkItem($id,$own);
		$message = 'Une tâche de faite bravo !!';
		$this->load->view('taskList', array(
			'id' => $this->session->id,
			'firstName' => $this->session->firstName,
			'lastName' => $this->session->lastName,
			'phone' => $this->session->phone,
			'email' => $this->session->email,
			'password' => $this->session->password,
			'beginingHours' => $this->session->beginingHours,
			'finishingHours' => $this->session->finishingHours,
			'message' => $message,
			'type' => 0,
			'page'=>1
		));
	}
	public function editItem($id,$own){

		$this->load->model('taskList_model');
		if($this->taskList_model->editItem($id,$own) == 1){
			$message = 'Modification effectuée !!';
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 0,
				'page'=>1
			));
		}else{
			$message = 'Modification non effectuée la tâche est déjà effectuée ou les données sont mal renseignées	 !!';
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 1,
				'page'=>1
			));
		}

	}
	public function deleteItem($id,$own){

		$this->load->model('taskList_model');
		if($this->taskList_model->deleteItem($id,$own) == 1){
			$message = 'suppression effectuée !!';
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 0,
				'page'=>1
			));
		}else{
			$message = 'suppression non effectuée la tâche a déjà été effectuée !!';
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'message' => $message,
				'type' => 1,
				'page'=>1
			));
		}

	}
	public function display($off,$id){
		$this->load->model('taskList_model');
		if($this->taskList_model->display($id) == 1){
			
			$this->load->view('taskList', array(
				'id' => $this->session->id,
				'firstName' => $this->session->firstName,
				'lastName' => $this->session->lastName,
				'phone' => $this->session->phone,
				'email' => $this->session->email,
				'password' => $this->session->password,
				'beginingHours' => $this->session->beginingHours,
				'finishingHours' => $this->session->finishingHours,
				'debut'=>(2 * ($off - 1)) + 1 ,
				'fin'=>($off * 2),
				'page'=>$off
			));
		}
	}
}
