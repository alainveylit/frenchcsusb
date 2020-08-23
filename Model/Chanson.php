<?php
App::uses('AppModel', 'Model');
/**
 * Chanson Model
 *
 */
class Chanson extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'titre';

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
		'auteur' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
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
		'Cours' => array(
			'className' => 'Cour',
			'foreignKey' => 'cours_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

	);

}
