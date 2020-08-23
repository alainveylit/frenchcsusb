<?php
App::uses('AppModel', 'Model');
/**
 * Question Model
 *
 * @property Quiz $Quiz
 * @property Option $Option
 */
class Question extends AppModel {

public $useDbConfig = 'quizzes';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'text';

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
		/*'text' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'index' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'quiz_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		/*
		'download_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Quiz' => array(
			'className' => 'Quiz',
			'foreignKey' => 'quiz_id',
			'conditions' => '',
			'fields' => 'id,title,creator,mode,type',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Option' => array(
			'className' => 'Option',
			'foreignKey' => 'question_id',
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
		'Response' => array(
			'className' => 'Option',
			'foreignKey' => 'question_id',
			'dependent' => false,
			'conditions' => ['correct_answer'=>true],
			'fields' => 'id,title',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)

	);

}
