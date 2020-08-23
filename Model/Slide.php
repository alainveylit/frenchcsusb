<?php
App::uses('AppModel', 'Model');
/**
 * Slide Model
 *
 * @property Slideshow $Slideshow
 */
class Slide extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'url';

	   public $actsAs = array(
	   
        'Upload.Upload' => array(
        
            'image' => array(
                'fields' => array(
					'dir'=>'image_dir',
					//'size'=>'image_size',
					'type'=>'image_type'
					),
					'thumbnailSizes' => array(
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
			'title' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slideshow_id' => array(
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
		'Slideshow' => array(
			'className' => 'Slideshow',
			'foreignKey' => 'slideshow_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
