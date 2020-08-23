<?php
App::uses('AppModel', 'Model');
/**
 * Ressource Model
 *
 */
class Presentation extends AppModel {

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
					'type'=>'type',
					'size'=>'size',
					//'type'=>'image_type'
					),
					'thumbnailSizes' => array(
						'xvga' => '1024x768',
						'vga' => '640x480',
						'thumb' => '250w'
					),
				'deleteFolderOnDelete' => true,

			),

		 'document' => array(
                'fields' => array(
					'dir'=>'document_dir',
					'size'=>'size',
					'type'=>'type'
					),
					'thumbnailSizes' => array(
						'thumb' => '120w'
					),	
								
					'rule' => 'isSuccessfulWrite',
					'message' => 'Fichier sauvegarde',
					'rule' => array('isValidMimeType', array('application/pdf', 'application/docx', 'image/png', 'image/jpg', 'image/gif','application/xls')),
					'message' => 'File is not a pdf, docx, XCL or a supported image format',
					'assocName'=>array('Post'=>'Attachment')
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
		'Cours' => array(
			'className' => 'Cour',
			'foreignKey' => 'cours_id',
			'conditions' => '',
			'fields' => 'id,titre,ccode,professeur_id,active',
			'order' => ''
		),
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'creator',
			'conditions' => '',
			'fields' => 'id,name',
			'order' => ''
		),
		
	);
		
		public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('Comment.model'=>'Presentation'),
			'fields' => '',
			'order' => '',
			'limit' => '',
		),
	);
	

	
	

}
