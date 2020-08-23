<?php
App::uses('AppModel', 'Model');
/**
 * Accueil Model
 *
 */
class Accueil extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'accueil';

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
	
	public $belongsTo = array(
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'creator',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Professeur' => array(
			'className' => 'Professeur',
			'foreignKey' => 'creator',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	
	);
	
		public $hasMany = array(
		'TileGroup' => array(
				'className' => 'TileGroup',
				'foreignKey' => 'foreign_key',
				'dependent' => false,
				'conditions' => ['actif'=>true, 'model'=>'Accueil'],
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
