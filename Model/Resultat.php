<?php
App::uses('AppModel', 'Model');
/**
 * Resultat Model
 *
 * @property Test $Test
 * @property Etudiant $Etudiant
 */
class Resultat extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'test_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'etudiant_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'taken' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'grade' => array(
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
		'Test' => array(
			'className' => 'Test',
			'foreignKey' => 'test_id',
			'conditions' => '',
			'fields' => 'id,title,category,lesson_id',
			'order' => ''
		),
		'Etudiant' => array(
			'className' => 'Etudiant',
			'foreignKey' => 'etudiant_id',
			'conditions' => '',
			'fields' => 'id,nom,prenom,courriel',
			'order' => ''
		)
	);
}
