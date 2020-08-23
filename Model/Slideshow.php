<?php
App::uses('AppModel', 'Model');
/**
 * Slideshow Model
 *
 */
class Slideshow extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'slideshow';

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
						//'vga' => '640x480',
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
	);
	

		public $hasMany = array(
		
			'Slide' => array(
				'className' => 'Slide',
				'foreignKey' => 'slideshow_id',
				'conditions' => '',
				'fields' => '',
				'order' => 'index ASC'
			),
		);
	
		public $belongsTo = array(
		
			'Lesson' => array(
				'className' => 'Lesson',
				'foreignKey' => 'lesson_id',
				'conditions' => '',
				'fields' => 'id,titre,jour',
				'order' => ''
			),
			'Cours' => array(
				'className' => 'Cour',
				'foreignKey' => 'cours_id',
				'conditions' => '',
				'fields' => 'id,titre,horaire,professeur_id',
				'order' => ''
			)
		);


}
