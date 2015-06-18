<?php class CategoriasController extends Zend_Controller_Action 
{
	public function indexAction()
	{
		$categoryModel = new Application_Model_Categories();
		$this->view->categories = $categoryModel->getAllNews();
	}
}