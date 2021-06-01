<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

	public function indexAction() {

		if ( !empty($_POST) ) {
			if ( empty($_POST['phone']) or empty($_POST['email']) ) 
				$this->view->message_ajax('Ошибка!', 'Форма пусть', 'error');
			$id = $this->model->addBuy($_POST);
			if ( $id == 'ok' ) $this->view->message_ajax('Упсс!', 'Вы уже оставили заявку', 'info');
			if ( !$id ) $this->view->message_ajax('Ошибка!', 'Форма не отправлена', 'error');
			
			// Send Mail
			$NameProduct 		= 	ResultTov($_POST['id_product'])['title'];
			$SummaProduct 		= 	ResultTov($_POST['id_product'])['summa'];
			$Email 				= 	$_POST['email'];
			$subject = 'Интернет магазиз AlifTask';
			$text = "Вы купили $NameProduct за $SummaProduct TJS ";
			send_mail($Email, $subject, $text);
			$this->view->message_ajax('Выполнено', 'Письмо отправлено на почту', 'success', 'OK', '.form-control');
		}
		$products = $this->model->SelectProducts();		
		$this->view->render('Главная страница', $products);
	}

	public function listAction() {
		$vars = $this->model->SelectList();
		
		$this->view->render('Список покупатели', $vars);
	}

}