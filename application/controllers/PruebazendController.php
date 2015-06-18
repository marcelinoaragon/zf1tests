<?php
class PruebazendController extends Zend_Controller_Action
{
	
	public function init()
	{

	}
	public function indexAction()
	{
		$this->view->MensajePrueba="ESte es un mensaje de prueba para el envio de Variables a la vista";
	}
}