<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Quiz $Quiz
 */
class Category extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $useDbConfig = 'quizzes';
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'creator' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Quiz' => array(
			'className' => 'Quiz',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => 'id,title,lesson_id,type,difficulty,cours_id',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public $belongsTo = array(
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'creator',
			'conditions' => '',
			'fields' => 'id,name,profile_id',
			'order' => ''
		)
	);

}
