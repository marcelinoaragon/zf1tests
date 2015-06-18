<?php
class MigracionController extends Zend_Controller_Action
{
	public function indexAction()
	{
$db = Zend_Db::factory('Pdo_Mysql', array(
    'host'     => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'dbname'   => 'empresa'
));
		$this->view->base = $db->hots;
		$this->view->datos = "Datos de coneccion";
		



	}
}