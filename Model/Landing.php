<?php
App::uses('AppModel', 'Model');
/**
 * Landing Model
 *
 * @property Cours $Cours
 * @property Professeur $Professeur
 */
class Landing extends AppModel {

/**
 * Display field
 *
 * @var string
 */
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
		'professeur_id' => array(
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
		'Cours' => array(
			'className' => 'Cours',
			'foreignKey' => 'cours_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Professeur' => array(
			'className' => 'Professeur',
			'foreignKey' => 'professeur_id',
			'conditions' => '',
			'fields' => 'id,user_id,nom,prenom,titre,courriel',
			'order' => ''
		),
		'Syllabus' => array(
				'className' => 'Document',
				'foreignKey' => 'syllabus',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			)
	);

	public $hasMany = array(
			'TileGroup' => array(
				'className' => 'TileGroup',
				'foreignKey' => 'foreign_key',
				'dependent' => true,
				'conditions' => ['actif'=>true, 'model'=>'Landing'],
				'fields' => '',
				'order' => ['index'=>'ASC'],
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			),
			'CurrentLesson' => array(
				'className' => 'Lesson',
				'foreignKey' => 'cours_id',
				'dependent' => true,
				'conditions' => '',
				'fields' => 'id,titre,index,jour',
				'order' => ['index'=>'ASC'],
				),
				
			'Document' => array(
				'className' => 'Document',
				'foreignKey' => 'cours_id',
				'dependent' => true,
				'conditions' => ['model'=>'Landing'],
				'fields' => '',
				'order' => '',
				),
				
		);
			
			
	public $hasOne = array(	
			
		);

}
