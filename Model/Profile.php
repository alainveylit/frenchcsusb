<?php
class Profile extends AppModel {
	var $name = 'Profile';
	var $displayField = 'name';
	
		   public $actsAs = array(
		   'Containable',
				'Upload.Upload' => array(
					'avatar' => array(
						'fields' => array(
							'dir'=>'avatar_dir',
							'type'=>'avatar_type'
							),
							'thumbnailSizes' => array(
								'small' => '80w'
							)
						)
					)
				);

		public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Your profile must have a name',
			),
		),
		'city' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		),
		'country' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'public' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		),
	);


	var $hasOne = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'foreign_key',
			'conditions' => array('Image.model'=>'Profile'),
			'fields' => '',
			'order' => ''
		)
	);

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => 'id,username,email,cours_id,role',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'SocialMediaLink' => array(
			'className' => 'SocialMediaLink',
			'foreignKey' => 'profile_id',
			'conditions' => '',
			'dependent'=>true,
			'fields' => '',
			'order' => ''
		),

	);
	
}
?>
