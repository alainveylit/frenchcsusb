<?php
App::uses('AppModel', 'Model');
/**
 * Professeur Model
 *
 * @property User $User
 */
class Professeur extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nom';


	   public $actsAs = array(
	   
        'Upload.Upload' => array(
        
 			 'image' => array(
                'fields' => array(
					'dir'=>'image_dir',
					//'size'=>'image_size',
					//'type'=>'image_type'
					),
					'thumbnailSizes' => array(
						'xvga' => '1024x768',
						'vga' => '640x480',
						'thumb' => '120w'
					),
				'deleteFolderOnDelete' => true,
			),
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nom' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prenom' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
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
		'diplome' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
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
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => 'id,name,username,email,active,profile_id',
			'order' => ''
		)
	);
	
		public $hasMany = array(
		'Cours' => array(
			'className' => 'Cours',
			'foreignKey' => 'professeur_id',
			'conditions' => ['active'=>true],
			'fields' => 'id,titre,slug,ccode,horaire,salle,active,modified',
			'order' => ''
		),
		/*
		'Etudiant' => array(
			'className' => 'Etudiant',
			'foreignKey' => 'professeur_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/

	);

}
