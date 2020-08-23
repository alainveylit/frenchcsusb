<?php
App::uses('AppModel', 'Model');
/**
 * Cour Model
 *
 * @property User $User
 * @property Etudiant $Etudiant
 */
class Cour extends AppModel {

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
				'message' => 'Vous devez remplir ce champ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'horaire' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Vous devez remplir ce champ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'professeur' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Vous devez remplir ce champ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'courriel' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'banniere' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Vous devez remplir ce champ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ccode' => array(
			'valid' => array(
				'rule' => 'notBlank',
				'required' => true,
				'allowEmpty' => false,
				//'on' => 'create',
				'message' => 'Vous devez fournir un code de cours.'
				),					 
				'unique' => array(
								'rule' => 'isUnique',
								'message' => 'Ce code de cours est dejà utilisé.'
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
		'Professeur' => array(
			'className' => 'Professeur',
			'foreignKey' => 'professeur_id',
			'conditions' => '',
			'fields' => 'id,nom,prenom,titre,courriel',
			'order' => ''
		),
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'creator',
			'conditions' => '',
			'fields' => 'id,name,email',
			'order' => ''
		)
	);

	public $hasOne = array(
		'Landing' => array(
			'className' => 'Landing',
			'foreignKey' => 'cours_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'dependent' => true
		),
	);
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Etudiant' => array(
			'className' => 'Etudiant',
			'foreignKey' => 'cours_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		
		'Lesson' => array(
			'className' => 'Lesson',
			'foreignKey' => 'cours_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => 'id,titre,jour',
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
			'dependent' => false,
			'conditions' => ['active'=>true],
			'fields' => 'id,titre,jour',
			'order' => ['index'=>'ASC'],
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		

		'TileGroup' => array(
			'className' => 'TileGroup',
			'foreignKey' => 'foreign_key',
			'dependent' => false,
			'conditions' => ['actif'=>true, 'model'=>'cour'],
			'fields' => '',
			'order' => ['index'=>'ASC'],
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),

		
	);

}
