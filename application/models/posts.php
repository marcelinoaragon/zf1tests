<?php
class Application_Model_Posts extends Zend_Db_Table_Abstract
{
	protected $_name='posts';
	protected $_primary='id';

public function getAll()
{
	return $this->fetchAll();
}

public function save( $bind , $id = null)
{
	if( is_null( $id)) {
		$row = $this -> createRow();
	}
	else {
		$row = $this -> getRow( $id );
	}	
	/*$row -> title = $bind['title'];
	$row -> full_text = $bind['full_text'];*/
	$row->setFromArray( $bind );

	return $row->save();

}

public function getRow( $id )
{
	$id = (int) $id;
	$row = $this -> find( $id )->current();
	return $row;
}
}