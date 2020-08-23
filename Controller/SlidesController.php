<?php
App::uses('AppController', 'Controller');
/**
 * Slides Controller
 *
 * @property Slide $Slide
 * @property PaginatorComponent $Paginator
 */
class SlidesController extends AppController {

/**
 * Components
 *
 * @var array
 */
 var $referer;
 
	public $components = array('Paginator');

	function beforeFilter() 
{
    if (isset($this->Security) && in_array($this->action, array('add_option','add'))) {
       $this->Security->validatePost = false;
       $this->Security->csrfCheck = false;
       $this->Security->unlockActions = ('add_option');
	   $this->request->allowMethod('post');

   }
   
    $this->referer = $this->Session->read('referer');
    $this->Session->delete('referer');

}
 	public function details($id = null) {
		$this->Slide->recursive=-1;

		if (!$this->Slide->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
		$options = array('conditions' => array('Slide.' . $this->Slide->primaryKey => $id));
		$this->set('slide', $this->Slide->find('first', $options));
	}
	


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Slide->recursive = 0;
		$this->set('slides', $this->Paginator->paginate());
	}

	public function add_option($slideshow_id=null) 
 {
	 $this->layout='ajax';
	 
	    if($this->request->is('ajax') && isset($this->request->data['slideshow_id'])) {
			$this->layout="ajax";
			$this->Session->write('referer', $this->referer());
			 $slideshow_id = $this->request->data['slideshow_id'];
             $this->request->data['index'] = $this->Slide->find('count', array('conditions'=>array('slideshow_id'=>$slideshow_id)))+1;
            return;
	       } 
		
		if ($this->request->is('post')) {
			$this->Slide->create();
				if ($this->Slide->save($this->request->data)) {
					$this->Session->setFlash(__('The option has been saved.', 'flash_normal'));
					$question_id = $this->request->data['Option']['question_id'];
					return $this->redirect(array('controller'=>'slideshows', 'admin'=>true, 'action' => 'view', $this->request->data['Slide']['slideshow_id']));
				} else {
					$this->Session->setFlash(__('The option could not be saved. Please, try again.'), 'flash_error');
					return;
				}
			}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Slide->exists($id)) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$options = array('conditions' => array('Slide.' . $this->Slide->primaryKey => $id));
		$this->set('slide', $this->Slide->find('first', $options));
		$this->set('referer', $this->referer());
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		
		if ($this->request->is('post')) {
			$this->Slide->create();
			if ($this->Slide->save($this->request->data)) {
				$this->Session->setFlash(__('The slide has been saved.'));
				return $this->redirect($this->referer);
			} else {
				$this->Session->setFlash(__('The slide could not be saved. Please, try again.'));
				return;
			}
		}

		die("You cannot add a slide from here");
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		if (!$this->Slide->exists($id)) {
			throw new NotFoundException(__('Invalid slide'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Slide->save($this->request->data)) {
				$this->Session->setFlash(__('The slide has been saved.'));
				return $this->redirect($this->referer);
			} else {
				$this->Session->setFlash(__('The slide could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Slide.' . $this->Slide->primaryKey => $id));
			$this->request->data = $this->Slide->find('first', $options);
		}
			$this->Session->write('referer', $this->referer());
			//die("You are in edit mode");
			$this->render('edit');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Slide->delete()) {
			$this->Session->setFlash(__('The slide has been deleted.'));
		} else {
			$this->Session->setFlash(__('The slide could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}
	
	function save_order()
{
	$this->request->onlyAllow('ajax');
	$this->layout='ajax';

	//Ajax call from Form View
	$fields = $this->request->data;
	//debug($fields);
	
	foreach($fields as $index=>$field) {
		//echo $index, '=[', $field, ']';
		$this->Slide->id = $field;
		$this->Slide->saveField('index', $index);
	}
	echo "L'ordre des diapos a été sauvegardé!";
	exit;	
}
}
