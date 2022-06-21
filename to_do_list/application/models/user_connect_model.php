<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
	class user_connect_model extends CI_Model {
		public function __construct()
		{
			parent::__construct();
		}
		public $sess;
		public function connect(){
			if (valid_email($_POST['email']) AND !empty($_POST['password'])){
				$sql = 'SELECT * FROM users WHERE email = ?';
				$query = $this->db->query($sql,array(htmlspecialchars($this->input->post('email'))));
				$row = $query->num_rows();
				if ($row === 1){
					$check = $query->row();
					if (password_verify(htmlspecialchars($this->input->post('password')),$check->password)){
						$this->session->set_userdata('id',$check->idUsers);
						$this->session->set_userdata('firstName',$check->firstName);
						$this->session->set_userdata('lastName',$check->lastName);
						$this->session->set_userdata('phone',$check->phone);
						$this->session->set_userdata('email',$check->email);
						$this->session->set_userdata('password',$check->password);
						$this->session->set_userdata('beginingHours',$check->beginingHours);
						$this->session->set_userdata('finishingHours',$check->finishingHours);
						return '1' ;
					}else{
						return '2' ;
					}
				}else{
					return '3';
				}
			}else{
				redirect('welcome');
			}
		}
		public function insert(){
			if (!empty($_POST['nameTask']) AND !empty($_POST['descriptionTask']) AND !empty($_POST['hourTask'])){
				$sql = 'SELECT * FROM taches WHERE nameTask = ? AND owner = ?';
				$query = $this->db->query($sql,array(htmlspecialchars($this->input->post('nameTask')),$this->session->id));
				$row = $query->num_rows();

				if ($row === 0){
					$data = array(
						'nameTask'=>htmlspecialchars($this->input->post('nameTask')),
						'descriptionTask'=>htmlspecialchars($this->input->post('descriptionTask')),
						'hourTask'=>htmlspecialchars($this->input->post('hourTask')),
						'statutTask'=> 0,
						'owner'=>$this->session->id
					);
					$this->db->insert('taches',$data);
					return '1';
				}else{
					return '2';
				}
			}else{
				return '3';
			}
		}
		public function disconnect(){
			$this->session->sess_destroy();
		}
		public function edit($pwd,$id){

			if (!empty($_POST['firstName']) AND !empty($_POST['lastName']) AND
				is_numeric($_POST['phone']) AND valid_email($_POST['email']) AND
				!empty($_POST['password']) AND !empty($_POST['hourB']) AND
				!empty($_POST['hourF']) AND !empty($_POST['lastPassword'])){
				if (password_verify(htmlspecialchars($_POST['lastPassword']),$pwd)){
					$data = array(
						'firstName'=>htmlspecialchars($this->input->post('firstName')),
						'lastName'=>htmlspecialchars($this->input->post('lastName')),
						'phone'=>htmlspecialchars($this->input->post('phone')),
						'email'=>htmlspecialchars($this->input->post('email')),
						'password'=>password_hash(htmlspecialchars($this->input->post('password')),PASSWORD_DEFAULT),
						'beginingHours'=>htmlspecialchars($this->input->post('hourB')),
						'finishingHours'=>htmlspecialchars($this->input->post('hourF')),
						'idUsers'=>$id
					);
					$sql = 'UPDATE users SET firstName=?,lastName=?,phone=?,email=?,password=?,beginingHours=?,finishingHours=? WHERE idUsers=?';
					$this->db->query($sql,$data);

					$this->session->set_userdata('id',$data['idUsers']);
					$this->session->set_userdata('firstName',$data['firstName']);
					$this->session->set_userdata('lastName',$data['lastName']);
					$this->session->set_userdata('phone',$data['phone']);
					$this->session->set_userdata('email',$data['email']);
					$this->session->set_userdata('password',$data['password']);
					$this->session->set_userdata('beginingHours',$data['beginingHours']);
					$this->session->set_userdata('finishingHours',$data['finishingHours']);
					return 1;
				}else{
					return 2;
				}

			}elseif (!empty($_POST['firstName']) AND !empty($_POST['lastName']) AND
				is_numeric($_POST['phone']) AND valid_email($_POST['email']) AND
				 !empty($_POST['hourB']) AND !empty($_POST['hourF'])){
				$data = array(
					'firstName'=>htmlspecialchars($this->input->post('firstName')),
					'lastName'=>htmlspecialchars($this->input->post('lastName')),
					'phone'=>htmlspecialchars($this->input->post('phone')),
					'email'=>htmlspecialchars($this->input->post('email')),
					'beginingHours'=>htmlspecialchars($this->input->post('hourB')),
					'finishingHours'=>htmlspecialchars($this->input->post('hourF')),
					'idUsers'=>$id
				);
				$sql = 'UPDATE users SET firstName=?,lastName=?,phone=?,email=?,beginingHours=?,finishingHours=? WHERE idUsers=?';
				$this->db->query($sql,$data);
				$this->session->set_userdata('id',$data['idUsers']);
				$this->session->set_userdata('firstName',$data['firstName']);
				$this->session->set_userdata('lastName',$data['lastName']);
				$this->session->set_userdata('phone',$data['phone']);
				$this->session->set_userdata('email',$data['email']);
				//$this->session->set_userdata('password',$data['password']);
				$this->session->set_userdata('beginingHours',$data['beginingHours']);
				$this->session->set_userdata('finishingHours',$data['finishingHours']);
				return 3;
			}else{
				return 4;
			}

		}
		public function checkItem($id,$own){
			$data = array(
				'statutTask'=>1,
				'idTask'=>$id,
				'owner'=>$own
			);
			$sql = 'UPDATE taches SET statutTask=? WHERE idTask= ? AND owner = ?';
			$this->db->query($sql,$data);
		}
		public function getAll($id,$limit,$offset){
			$this->db->limit($limit);
			$this->db->offset($offset);
			$this->db->order_by('idTask ASC');
			return $this->db->get_where('taches',array('owner'=>$id))->row();
		}
		public function countAll($id){
			$this->db->order_by('idTask ASC');
			return $this->db->get_where('taches',array('owner'=>$id))->num_rows();
		}

	}
