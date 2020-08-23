<?php
App::uses('AppModel', 'Model');
/**
 * Crossword Model
 *
 * @property Cours $Cours
 * @property CrosswordOption $CrosswordOption
 */
class Crossword extends AppModel {

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
		'cours_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cour' => array(
			'className' => 'Cour',
			'foreignKey' => 'cours_id',
			'conditions' => '',
			'fields' => 'id,titre,ccode',
			'order' => ''
		),
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'creator',
			'conditions' => '',
			'fields' => 'id,username,name,email,profile_id',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CrosswordOption' => array(
			'className' => 'CrosswordOption',
			'foreignKey' => 'crossword_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => ['orientation'=>'ASC', 'position'=>'ASC'],
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
