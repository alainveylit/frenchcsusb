<?php
App::uses('AppController', 'Controller');
/**
 * Slideshows Controller
 *
 * @property Slideshow $Slideshow
 * @property PaginatorComponent $Paginator
 */
class SlideshowsController extends AppController {
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

public function beforeFilter()
{
	 parent::beforeFilter();
	 
	if($this->is_administrator()) {
		//throw new NotFoundException(__('you must be an administrator to access these pages!'));
		//$this->Slideshow->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
	} else {
		//$this->Slideshow->Behaviors->attach('LightAuthFiltered', array('match_field'=>'cours_id', 'auth_field'=>'cours_id'));
	}
	
       $this->Security->validatePost = false;
       $this->Security->csrfCheck = false;
       $this->Security->unlockActions = ('edit');
	

}

//----------------------------------------------------------------------
	public function upload_images($id=null)
{
		//if (!$this->Album->exists($id)) {
			//throw new NotFoundException(__('Invalid album'));
		//}

		if ($this->request->is(array('post', 'ajax'))) {
			$this->layout='ajax';
			$filename = utf8_encode(urldecode($_POST['filename']));
			//debug($filename);
			//$filename = str_replace("?", "_", $filename);  // a circonflexe etc.
			$slideshow_id = $_POST['slideshow_id'];
			//$album_place = $_POST['place'];
			//$album_date = $_POST['date'];
			
			$creator = $this->Auth->user('id');
			//exit;
			//remove "data:image/jpeg;base64,"
			$data_index = strpos($_POST['data'], 'base64') + 7;
			$image = base64_decode(substr($_POST['data'], $data_index));
			$filepath = WWW_ROOT . 'img' . DS . $filename;
			
			$image_record=array( 'title'=>$filename, 'image'=>$filename, 'category'=>'', 
						'model'=>'Slideshow', 'slideshow_id'=>$slideshow_id, 'creator'=>$creator);
				//'place'=>$album_place , 'date'=>$album_date, 'creator'=>$creator);

debug($image_record);
exit;
			// Create an image record
			$this->Slideshow->Slide->Create();
			if( !$this->Slideshow->Slide->save(['Slide'=>$image_record]) ) {
				echo "Cannot create image record";
				exit;
			}
			
			$image_id = $this->Slideshow->Slide->id;

			// Create directory with image record id number
			$image_dir = WWW_ROOT . 'files' . DS . 'slide' . DS . 'image' . DS . $image_id;
			if(!mkdir($image_dir)) {
				echo "Unable to create image directory";
				exit;
			}
			
			if(!file_exists($image_dir)) {
				echo "Slideshow directory does not exist!"; 
				exit;
			}
			
			$filepath = $image_dir . DS . $filename;
			
			// Save image data to image directory
			if(file_put_contents($filepath, $image)===false) {
				echo "Failed to save image to " . $filepath;
			} else { 
				echo "Image saved successfully";
			}
			
			// Create thumbnail and update fields
			$thumbpath = $image_dir . DS . 'thumb_' . $filename;
						$cmd = "convert \"" . $filepath . "\" -thumbnail 120x120 \"" .  $thumbpath . '"';
						$ret = system($cmd);
						$this->Slideshow->Slide->saveField('image_dir', $image_id);
						//$this->Image->saveField('image', $file_name);
			
			
			exit;
		} else {
			$options = array('conditions' => array('Slideshow.' . $this->Slideshow->primaryKey => $id));
			$this->request->data = $this->Slideshow->find('first', $options);

		}
	
}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Slideshow->recursive = 0;
		$this->Slideshow->contain('Cours');
		$this->set('slideshows', $this->Paginator->paginate());
	}
	
	public function index() {
		$this->Slideshow->recursive = 0;
		$this->set('slideshows', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		
		if (!$this->Slideshow->exists($id)) {
			throw new NotFoundException(__('Invalid slideshow'));
		}
		$options = array('conditions' => array('Slideshow.' . $this->Slideshow->primaryKey => $id));
		$this->set('slideshow', $this->Slideshow->find('first', $options));
	}

	public function admin_start($id = null) {
		$this->start($id);
		$this->render('start');
		//$this->redirect(['admin'=>false]);
}

	public function start($id = null) {
		//$this->layout = "diaporama";
		$this->Slideshow->recursive=0;
		$this->set('referer', $this->referer());
		if (!$this->Slideshow->exists($id)) {
			throw new NotFoundException(__('Invalid slideshow'));
		}
		$options = array('conditions' => array('Slideshow.' . $this->Slideshow->primaryKey => $id));
		$this->set('slideshow', $this->Slideshow->find('first', $options));
	}
	
	public function view($id = null) {
		
		$this->layout = "diaporama";
		$this->set('referer', $this->referer());
		
		if (!$this->Slideshow->exists($id)) {
			throw new NotFoundException(__('Invalid slideshow'));
		}
		
		$options = array('conditions' => array('Slideshow.' . $this->Slideshow->primaryKey => $id));
		$slideshow = $this->Slideshow->find('first', $options);
		//debug($slideshow);
		//exit;
		$this->set('slideshow', $this->Slideshow->find('first', $options));
		
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->request->data['Slideshow']['creator'] = $this->Auth->user('id');
			$this->Slideshow->create();
			if ($this->Slideshow->save($this->request->data)) {
				$this->Session->setFlash(__('Ce diaporama a ete cree. Ajoutez des images!.'), 'flash_normal');
				return $this->redirect(array('action' => 'view', $this->Slideshow->id));
			} else {
				$this->Flash->error(__('The slideshow could not be saved. Please, try again.'), 'flash_normal');
			}
		}
			
			$this->set('cours', $this->Slideshow->Cours->find('list', array('fields'=>'id,titre')));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		if (!$this->Slideshow->exists($id)) {
			throw new NotFoundException(__('Invalid slideshow'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Slideshow->save($this->request->data)) {
				$this->Session->setFlash(__('The slideshow has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The slideshow could not be saved. Please, try again.'), 'flash_normal');
			}
		} else {
			$options = array('conditions' => array('Slideshow.' . $this->Slideshow->primaryKey => $id));
			$this->request->data = $this->Slideshow->find('first', $options);
			$this->set('cours', $this->Slideshow->Cours->find('list', array('fields'=>'id,titre')));
		}
	}
	
/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Slideshow->id = $id;
		if (!$this->Slideshow->exists()) {
			throw new NotFoundException(__('Invalid slideshow'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Slideshow->delete()) {
			$this->Session->setFlash(__('The slideshow has been deleted.'), 'flash_normal', 'flash_normal');
		} else {
			$this->Flash->error(__('The slideshow could not be deleted. Please, try again.'), 'flash_normal');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
