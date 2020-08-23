<?php
App::uses('AppModel', 'Model');
/**
 * Document Model
 *
 * @property User $User
 */
class Document extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	   public $actsAs = array(
	   
        'Upload.Upload' => array(
        
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
					'message' => 'File was unsuccessfully written to the server',
					'rule' => array('isValidMimeType', array('application/pdf', 'application/docx', 'image/png', 'image/jpg', 'image/gif')),
					'message' => 'File is not a pdf, docx or a supported image format',
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
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Title cannot be blank',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),/*
		'filename' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Filename cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'mime' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'extension' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'MIME type msut be defined',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'No user id available',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'document_dir' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Document directory cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'size' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'No file size given',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
			'fields' => 'id,name,email,profile_id',
			'order' => ''
		),
		'Cours'=> array(
			'className' => 'Cour',
			'foreignKey' => 'cours_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'foreign_key',
			'conditions' => array('model'=>'Project'),
			'fields' => 'id,title,creator',
			'order' => ''
		),

		/*
		'Message' => array(
			'className' => 'User',
			'foreignKey' => 'foreign_key',
			'conditions' => array('model'=>'Post'),
			'fields' => '',
			'order' => ''
		),*/
	);
	
		public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('Comment.model'=>'Document'),
			'fields' => '',
			'order' => '',
			'limit' => '',
		),
	);
	
	
		public function get_extension($filename)
	{
		if(preg_match("/.(\w+)$/", $filename, $extension)) {
			return strtolower($extension[1]);
		}
		
		return false;
	}
}
