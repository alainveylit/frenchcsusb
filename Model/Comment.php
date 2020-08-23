<?php
class Comment extends AppModel {

	var $name = 'Comment';
	
	var $validate = array(
		'comment' => array('notBlank'),
		'user_id' => array('numeric'),
		'piece_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Creator' => array('className' => 'User',
								'foreignKey' => 'user_id',
								'conditions' => '',
								'fields' => 'id,name,email',
								'order' => ''
			),
			'Document' => array('className' => 'Document',
								'foreignKey' => 'foreign_key',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Blog' => array('className' => 'Blog',
								'foreignKey' => 'foreign_key',
								'conditions' => '',//array('Comment.model'=>'piece'),
								'fields' => '',
								'order' => ''
			),/*
			'Todo' => array('className' => 'Todo',
								'foreignKey' => 'foreign_key',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Collection' => array('className' => 'Collection',
								'foreignKey' => 'foreign_key',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),*/




	);

}
?>
