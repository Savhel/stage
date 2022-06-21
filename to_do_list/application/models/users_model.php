<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function registration()
	{
				if (!empty($_POST['firstName']) AND !empty($_POST['lastName']) AND
					is_numeric($_POST['phone']) AND valid_email($_POST['email']) AND
					!empty($_POST['password']) AND is_numeric($_POST['gender']) AND
					!empty($_POST['hour_B']) AND !empty($_POST['hour_E']))
				{
					$sql = 'SELECT * FROM users WHERE email = ?';
					$query = $this->db->query($sql,array(htmlspecialchars($this->input->post('email'))));
					$row = $query->num_rows();
					if ($row === 0){
						$data = array(
							'ipAdress'=> $_SERVER['REMOTE_ADDR'],
							'firstName'=>htmlspecialchars($this->input->post('firstName')),
							'lastName'=>htmlspecialchars($this->input->post('lastName')),
							'phone'=>htmlspecialchars($this->input->post('phone')),
							'email'=>htmlspecialchars($this->input->post('email')),
							'password'=>password_hash(htmlspecialchars($this->input->post('password')),PASSWORD_DEFAULT),
							'gender'=>htmlspecialchars($this->input->post('gender')),
							'beginingHours'=>htmlspecialchars($this->input->post('hour_B')),
							'finishingHours'=>htmlspecialchars($this->input->post('hour_E'))
						);
						$this->db->insert('users',$data);
						return true;
					}

				}else{
					return false;
				}
	}

}
