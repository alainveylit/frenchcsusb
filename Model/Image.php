<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 */
class Image extends AppModel {

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
					'size'=>'size',
					'type'=>'type'
					),
					'thumbnailSizes' => array(
						'xvga' => '1024x768',
						'vga' => '640x480',
						'thumb' => '120w'
					),
				'deleteFolderOnDelete' => true,

			),

            'Profile' => array(
                'fields' => array(
					'name'=>'Profile',
					'dir'=>'image_dir',
					'size'=>'size',
					'type'=>'type'
					),
					'thumbnailSizes' => array(
						'xvga' => '1024x768',
						'vga' => '320x480',
						'thumb' => '240w'
					),
				'singleImage'=>true,
				'assocName'=>array('Portrait'=>'Image')	//assoc name to assoc className - otherwise dependent deletion fails ... 
			),
					
            /*'Family' => array(
                'fields' => array(
					'dir'=>'image_dir',
					'size'=>'size',
					'type'=>'type'
					),
					'thumbnailSizes' => array(
						'xvga' => '1024x768',
						'vga' => '640x480',
						'thumb' => '120w'
					),
					
				'singleImage'=>true,
				'assocName'=>array('Illustration'=>'Image')	//assoc name to assoc className
			),
			'Newsclip' => array(
                'fields' => array(
					'dir'=>'image_dir',
					'size'=>'size',
					'type'=>'type'
					),
					'thumbnailSizes' => array(
						//'xvga' => '1024x768',
						'vga' => '640x480',
						'thumb' => '120w'
					),
					'assocName'=>array('Illustration'=>'Image') //assoc name to assoc className
					
			)*/
        
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
		'model' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foreign_key' => array(
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
        'Profile' => array(
            'className' => 'Profile',
            'foreignKey' => 'foreign_key',
            'conditions'=>''
        ),
       /* 'Family' => array(
            'className' => 'Family',
            'foreignKey' => 'foreign_key',
            'conditions'=>''
        ),*/
        
    );
/*
	public function beforeSave($options = array()) {
		debug($this->data);
		debug($this->alias);
		exit;
	}
*/

	 public function image_clone($image_id, $foreign_key, $assoc_name='Image')
	{
		// Clone an image for the same assoc model
		
		$this->recursive=-1;
		$image = $this->find('first', array('conditions'=>array($assoc_name.'.id'=>$image_id/*, 'model'=>$assoc_name*/)));

		if(empty($image)) {
			CakeLog::write('debug', 'Image is empty!! -- id=:' . $image_id);
			return false;
		}

		$key = key($image);
		
		if(!isset($image[$key] )) {
			CakeLog::write('debug', 'Image data is not defined -- id=: ' . $image_id  );
			//CakeLog::write('debug', ' But image[model] is ' . $image['model']);
			return false;
		}
		debug($image[$key]);
		//exit;
		
		$model_dir = WWW_ROOT .  'files' . DS . 'image' . DS  . $image[$key]['model'] . DS;
		if(!file_exists($model_dir)) {
				throw new NotFoundException(__('Unknown model!'));
				exit;
		}

		$source_path =	$model_dir . $image[$key]['image_dir'] . DS; 	/* . DS . $image[$image['Image']['model']];*/
		CakeLog::write('debug', 'Source path: ' . $source_path);

		if(!file_exists($source_path)) {
				CakeLog::write('debug', $source_path . ' does not exit');
				return false;
				throw new NotFoundException(__('Image source directory does not exist!'));
				exit;
		}
		
		$image[$key]['foreign_key']=$foreign_key;
		unset($image[$key]['id']);
		unset($image[$key]['image_dir']);
		//debug($image);
		//exit;
		$this->create();
		if(!$this->save($image[$key])) {
				CakeLog::write('debug', 'Unable to save image data');
				return;
				throw new NotFoundException(__('Unable to save image copy!'));
				exit;
		}
		
		$target_path = $model_dir . $this->id;
		$cmd = sprintf("cp -r \"%s\" \"%s\"", $source_path, $target_path);
		CakeLog::write('debug', $cmd);
		if( system($cmd) ) {
			CakeLog::write('debug',  "Failed to copy image files");
			return false;
		} else { 
			CakeLog::write('debug', "Images files successfully copied to : " .$target_path);
			chown($target_path, 'www-data');
			$this->saveField('image_dir', $this->id);
			return true;
		}
		
	}


}
