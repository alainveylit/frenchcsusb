<?php
App::uses('AppModel', 'Model');
/**
 * Vocabulaire Model
 *
 * @property Professeur $Professeur
 * @property Cours $Cours
 */
class Story extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	   public $actsAs = array(
	   
        'Upload.Upload' => array(
        
            'image' => array(
                'fields' => array(
					'dir'=>'image_dir',
					'size'=>'image_size',
					'type'=>'image_type'
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
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'professeur_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your professor id',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cours_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your course id',
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
			'foreignKey' => 'creator',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cours' => array(
			'className' => 'Cours',
			'foreignKey' => 'cours_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
	);
}
