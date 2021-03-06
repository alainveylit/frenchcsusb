<?php
App::uses('AppModel', 'Model');
/**
 * Blog Model
 *
 */
class Blog extends AppModel {

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
					//'size'=>'image_size',
					//'type'=>'image_type'
					),
					'thumbnailSizes' => array(
						//'xvga' => '1024x768',
						'vga' => '640x480',
						'thumb' => '250w'
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
		/*'text' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
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
			'fields' => 'id,name,profile_id,cours_id',
			'order' => ''
		)
	);
	
		public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'foreign_key',
			'dependent' => false,
			'conditions' => array('model'=>'Blog'),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


}
