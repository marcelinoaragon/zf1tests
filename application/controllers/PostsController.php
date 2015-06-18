<?php
class PostsController extends Zend_Controller_Action
{
	public function deleteAction()
	{
		if( !$this->_hasParam('id')) {
			return $this->_redirect('/posts/listar');
		}
		$posts = new Application_Model_Posts();
		$row = $posts -> getRow($this->_getParam('id'));

		if( $row ) {
			$row ->delete();
		}
		//$posts ->delete($posts->getAdapter()->quoteInto('id=?',$this->_getParam()));
		return $this->_redirect('/posts/listar');
	}
	public function updateAction()
	{
		if( !$this -> _hasParam('id')){
			return $this->redirect('/posts/listar');
		}

		$form = new Application_Form_Post();
		$posts = new Application_Model_Posts();

		if($this->getRequest()->isPost()) {
			if($form->isValid($this->_getAllParams())) {
				$model = new Application_Model_Posts();
				$model->save($form->getValues(), $this->_getParam('id'));
				return $this->_redirect('/posts/listar/');
			}
		}
		else {
			$row = $posts -> getRow( $this->_getParam('id'));
			if( $row ) {
				$form->populate( $row->toArray() );
			}
		}
		$this->view->form = $form;
	}

	public function listarAction()
	{
		$model= new Application_Model_Posts();
		$this->view->posts=$model->getAll();
	}
	public function agregarAction()
	{
		$form = new Application_Form_Post();
		if($this->getRequest()->isPost()) {
			if($form->isValid($this->_getAllParams())) {
				$model = new Application_Model_Posts();
				$model->save($form->getValues());
				return $this->_redirect('/posts/listar/');
			}
			else {
				
			}
		}
		$this->view->form = $form;
	}
}