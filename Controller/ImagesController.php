<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 * @property PaginatorComponent $Paginator
 */
class ImagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	private $referer;
	public $positions = array('head'=>'head', 'tail'=>'tail');
	public $alignments = array('leftist'=>'left', 'rightist'=>'right', 'centered'=>'center');
	//public $paginate = array('conditions'=>array('model'=>'image'));
	
	
/**
 * index method
 *
 * @return void
 */
 public function copy_image($image_id=null, $foreign_key=null) {
	 // test function
	 $this->Image->image_clone($image_id, $foreign_key);
	 exit;
 }
 
	public function index() {
		
		$this->Image->recursive = 0;
		$this->Image->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		//$this->Paginator->settings=$this->paginate;
		$this->set('images', $this->Paginator->paginate());
	}
	
	public function write_index() {
		
		$this->Image->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		$this->Image->recursive = 0;
		$this->Paginator->settings['conditions'] = array('model !='=>'avatar');
		$this->set('images', $this->Paginator->paginate());
		$this->render('index');
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
		$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
		$this->set('image', $this->Image->find('first', $options));
	}
	
	public function write_view($id = null) {
		
		$this->Image->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));

		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}


		$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
		$this->set('image', $this->Image->find('first', $options));
		
		$this->render('view');
	}

/**
 * add method
 *
 * @return void
 */
	public function write_add() {
		
		if ($this->request->is('post')) {
			$this->Image->create();
			$this->request->data['Image']['creator'] = $this->Auth->user('id');

			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'), 'flash_error');
			}
		}
		
		$this->set('positions', $this->positions);
		$this->set('alignments', $this->alignments);
		$this->render('add');
	}

	function get_image($id=null, $thumbnail=true) {
		if($this->request->is('ajax')) {
			$id = $this->request->data['id'];
			
			//echo $id;
			//exit;
		}
		
		$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
		$this->set('image', $this->Image->find('first', $options));
		$this->set('thumbnail', $thumbnail);
		
	}
	
	function get_image_list($model, $foreign_key)
{
		$this->Image->recursive = -1;
		$images = $this->Image->find('all', array('conditions'=>array('model'=>$model, 'foreign_key'=>$foreign_key)));
}

	function add_image($model=null, $id=null)
	{
		$this->layout='ajax';
		
		if ($this->request->is('post')) {

			$this->autoRender=false;			
			$this->request->data['Image']['creator'] = $this->Auth->user('id');

			// Delete existing images in case there should be only one image
			if(in_array($this->request->data['Image']['model'], array('Story'/*, 'Character'*/))) {
				
				$story_id = $this->request->data['Image']['foreign_key'];
				$this->Image->Story->contain('Illustration');
				$story = $this->Image->Story->findById($story_id);
				
				foreach($story['Illustration'] as $image) {
					$this->Image->id = $image['id'];
					$this->Image->delete();
				}
					
			}

			$this->Image->create();

			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved.'), 'flash_normal');
				$controller= Inflector::underscore(Inflector::pluralize($this->request->data['Image']['model']));
				
				$this->redirect(array(	'controller'=>$controller, 
										'action'=>'view', 
										$this->request->data['Image']['foreign_key'])
								);
				echo $this->Image->id;
				exit;
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'), 'flash_error');
				echo 'This image could not be saved, sorry';
				return;
			}
			
			exit;
		}

		$this->set('positions', $this->positions);
		$this->set('alignments', $this->alignments);		
		$this->set('model', $this->request->pass[0]);
		$this->set('foreign_key', $this->request->pass[1]);
		
		$this->referer = $this->referer();

	}
	


	function add_author_portrait() 
{
		$this->layout='ajax';
		//debug($this->Auth->user());
		//exit;
		if ($this->request->is('post')) {

			$this->autoRender=false;
			
			//debug($this->request->data);
			//exit;
			//$this->request->data['Image']['creator'] = $this->Auth->user('id');
			$this->Image->create();

			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved.'), 'flash_normal');
				$this->redirect(array('controller'=>'profiles', 'action'=>'view', $this->request->data['Image']['foreign_key']));
			} else 	{
				$this->Session->setFlash(__('The image could not be saved.'), 'flash_error');
				return;
			}
		} else {
		
			$this->request->data['Image']['creator'] = $this->Auth->user('id');
			$this->request->data['Image']['title'] = $this->Auth->user('name');
			$this->request->data['Image']['foreign_key'] = $this->Auth->user('Profile.id');
			$this->request->data['Image']['model'] = 'Profile';
			
		}
}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 public function get_image_size($image)
 {
	$image_path = 	WWW_ROOT .  'files' . DS . 'image' . DS  . $image['model'] . DS . $image['image_dir'] . DS . $image[$image['model']];
	$size = getimagesize($image_path);	
	return array($size[0], $size[1]);

 }
 
		public function write_change_image()
	{
		
		$this->Image->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		
		$id = $this->request->data['Image']['id'];
		
		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
//debug($this->request->data);
//exit;
			if ($this->Image->save($this->request->data)) {
				$this->redirect( array('action'=>'edit', 'prefix'=>'write', $id));
			} else { 
				$this->Session->setFlash(h('Error uploading new image!'), 'flash_error');
				return; 
			} 
		
	}
	
	public function edit($id = null) {

		$this->Image->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		
		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved.'), 'flash_normal');
				$controller = Inflector::pluralize(Inflector::underscore($this->request->data['Image']['model']));
				return $this->redirect(array('controller'=>$controller, 'action' => 'view', $this->request->data['Image']['foreign_key']));
			} else {
				$this->Session->setFlash(__('Sorry: This image could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			
			$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
			$this->request->data = $this->Image->find('first', $options);
			
			$size = $this->get_image_size($this->request->data['Image']);
			$this->set('size', $size);
			
		}

		
		$this->set('positions', $this->positions);
		$this->set('alignments', $this->alignments);
		$this->render('edit');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */


	public function delete($id = null) {

		$this->Image->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));

		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}

		$this->Image->id = $id;
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->Image->delete()) {
			$this->Session->setFlash(__('The image has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The image could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 *
	public function delete($id = null) {
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Image->delete()) {
			$this->Session->setFlash(__('The image has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The image could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	* */
}
