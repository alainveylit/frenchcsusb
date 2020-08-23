<?php
App::uses('AppModel', 'Model');
/**
 * Quiz Model
 *
 * @property Category $Category
 * @property Instance $Instance
 * @property Option $Option
 * @property Question $Question
 */
 


class Quiz extends AppModel {
	
	public $useDbConfig = 'quizzes';

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
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),/*
		'description' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'type' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),	
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




/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'QuizInstance' => array(
			'className' => 'QuizInstance',
			'foreignKey' => 'quiz_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Option' => array(
			'className' => 'Option',
			'foreignKey' => 'quiz_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => 'id,title',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'quiz_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => 'id,text,index',
			'order' => 'index',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	


}
