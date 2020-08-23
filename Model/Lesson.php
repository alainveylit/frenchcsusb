<?php
App::uses('AppModel', 'Model');
/**
 * Lesson Model
 *
 * @property Quiz $Quiz
 */
class Lesson extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'lesson';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'titre';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'titre' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'jour' => array(
			'date' => array(
				'rule' => array('date'),
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

/*
 * 	public $hasMany = array(
		'Quiz' => array(
			'className' => 'Quiz',
			'foreignKey' => 'lesson_id',
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
	* */
	
	public $hasOne = array(
		'Devoir' => array(
			'className' => 'Devoir',
			'foreignKey' => 'lesson_id',
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
	
	
	public $belongsTo = array(
		'Cours' => array(
			'className' => 'Cour',
			'foreignKey' => 'cours_id',
			'conditions' => '',
			'fields' => 'Cours.id,Cours.titre,horaire,professeur_id',
			'order' => ''
		)
	);
	
	public $hasAndBelongsToMany = array(
		'Quiz' => array(
				'className' => 'Quiz',
				'joinTable' => 'lessons_quizzes',
				'foreignKey' => 'lesson_id',
				'associationForeignKey' => 'quiz_id',
				'unique' => 'keepExisting',
				'conditions' => '',
				'fields' => '',
				'order' => 'Quiz.id ASC',
				'limit' => '',
				'offset' => '',
				'finderQuery' => '',
		),

			'Slideshow' => array(
				'className' => 'Slideshow',
				'joinTable' => 'lessons_slideshows',
				'foreignKey' => 'lesson_id',
				'associationForeignKey' => 'slideshow_id',
				'unique' => 'keepExisting',
				'conditions' => '',
				'fields' => '',
				'order' => 'Slideshow.id ASC',
				'limit' => '',
				'offset' => '',
				'finderQuery' => '',
		)

	);



}
