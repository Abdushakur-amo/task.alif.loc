<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public function SelectProducts(){
		return $this->db->row('SELECT * FROM products');
	}

	public function SelectList(){
		return $this->db->row('SELECT * FROM buy ORDER BY `date` DESC');
	}

	public function Selectbuy($phone, $id){
		return $this->db->row('SELECT * FROM buy WHERE phone = "'.$phone.'" AND id_tovar = '.$id);
	}


	public function addBuy($post) {
		$tel = format992(trim($post['phone']));
		if ( $this->Selectbuy($tel, $post['id_product']) ) return 'ok';

		$params = [
			'id' => null,
			'phone' => $tel,
			'email' => $post['email'],
			'id_tovar' => $post['id_product'],
			'date' => date("Y-m-d H:i:s"),
		];
		$this->db->query('INSERT INTO buy VALUES(:id, :phone, :email, :id_tovar, :date)', $params);
		return $this->db->lastInsertId();
	}

}