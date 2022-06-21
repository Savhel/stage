<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class taskList_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public $hour;
	public function insert($id){
		if (!empty($_POST['nameTask']) AND !empty($_POST['descriptionTask']) AND !empty($_POST['hourTask'])){
			$sql = 'SELECT * FROM taches WHERE hourTask = ? AND owner = ?';
			$query = $this->db->query($sql,array(htmlspecialchars($this->input->post('hourTask')),$id));
			$row = $query->num_rows();
			$this->hour = htmlspecialchars($this->input->post('hourTask'));
			if ($row === 0){
				$data = array(
					'nameTask'=>htmlspecialchars($this->input->post('nameTask')),
					'descriptionTask'=>htmlspecialchars($this->input->post('descriptionTask')),
					'hourTask'=>htmlspecialchars($this->input->post('hourTask')),
					'statutTask'=> 0,
					'owner'=>$id
				);
				$this->db->insert('taches',$data);
				return '1';
			}else{
				return $this->hour;
			}
		}else{
			return '3';
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
	public function editItem($id,$own){
		$query = 'SELECT * FROM taches WHERE idTask = ? AND statutTAsk=?';
		$row = $this->db->query($query,array($id,0));
		$count = $row->num_rows();
		if (!empty($_POST['nameTask']) AND !empty($_POST['descriptionTask']) AND  !empty($_POST['hour']) AND $count == 1){
			$data = array(
				'nameTask'=>htmlspecialchars($this->input->post('nameTask')),
				'descriptionTask'=>htmlspecialchars($this->input->post('descriptionTask')),
				'hourTask'=>htmlspecialchars($this->input->post('hour')),
				'idTask'=>$id,
				'owner'=>$own
			);
			$sql = 'UPDATE taches SET nameTask=?,descriptionTAsk=?,hourTask=? WHERE idTask= ? AND owner = ?';
			$this->db->query($sql,$data);
			return 1;
		}else{
			return 2;
		}
	}
	public function deleteItem($id,$own){
		$query = 'SELECT * FROM taches WHERE idTask = ? AND statutTAsk=?';
		$row = $this->db->query($query,array($id,0));
		$count = $row->num_rows();
		if ($count == 1){
			$data = array(
				'idTask'=>$id,
				'owner'=>$own
			);
			$sql = 'DELETE FROM taches WHERE idTask= ? AND owner = ?';
			$this->db->query($sql,$data);
			return 1;
		}else{
			return 2;
		}
	}
	public function display($id){
		$sql = 'SELECT * FROM users WHERE idUsers = ?';
		$query = $this->db->query($sql,array($id));
		$row = $query->num_rows();
		if ($row == 1){
			return 1;
		}else{
			return 2;
		}
	}
	
}
