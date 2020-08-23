<?php
App::uses('AppController', 'Controller');
/**
 * Professeurs Controller
 *
 * @property Professeur $Professeur
 * @property PaginatorComponent $Paginator
 */
class ProfesseursController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
var $referer;

	function beforeFilter() 
{
	
		if($this->Auth->user('professeur')==true) {
				$this->Professeur->Behaviors->attach('LightAuthFiltered', array('match_field'=>'user_id'));	
		}
 
     if (isset($this->Security) && in_array($this->action, array('admin_add','admin_edit'))) {
		   $this->Security->validatePost = false;
		   $this->Security->csrfCheck = false;
	}
		$this->referer = $this->Session->read('referer');
 		
		parent::beforeFilter();


}
/**
 * admin_index method
 *
 * @return void
 */
 	public function index() {
		$this->Professeur->recursive = 0;
		$this->set('professeurs', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->Professeur->recursive = 0;
		$this->set('professeurs', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Professeur->exists($id)) {
			throw new NotFoundException(__('Invalid professeur'));
		}
		$options = array('conditions' => array('Professeur.' . $this->Professeur->primaryKey => $id));
		$this->set('professeur', $this->Professeur->find('first', $options));
	}
	
	public function view($id = null) {
		if (!$this->Professeur->exists($id)) {
			throw new NotFoundException(__('Invalid professeur'));
		}
		$options = array('conditions' => array('Professeur.' . $this->Professeur->primaryKey => $id));
		$prof = $this->Professeur->find('first', $options);
		//debug($prof);
		//exit;
		$this->set('professeur', $this->Professeur->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		
		if ($this->request->is('post')) {
			$this->Professeur->create();
			if ($this->Professeur->save($this->request->data)) {
				$this->Session->setFlash(__('The professeur has been saved.', 'flash_normal'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The professeur could not be saved. Please, try again.'), 'flash_error');
			}
		}
		$users = $this->Professeur->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		if (!$this->Professeur->exists($id)) {
			throw new NotFoundException(__('Invalid professeur'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Professeur->save($this->request->data)) {
				$this->Session->setFlash(__('The professeur has been saved.'), 'flash_normal');
				return $this->redirect($this->referer);
			} else {
				$this->Session->setFlash(__('The professeur could not be saved. Please, try again.'), 'flash_error');
				return;
			}
		} else {
			$options = array('conditions' => array('Professeur.' . $this->Professeur->primaryKey => $id));
			$this->request->data = $this->Professeur->find('first', $options);
			$this->Session->write('referer', $this->referer());

		}

		//debug($this->request->data);
		//exit;
		if(empty($this->request->data) || $this->request->data['Creator']['id'] != $this->Auth->user('id')) {			
			$this->redirect('/');
			exit;
		}
		//$user = $this->Professeur->User->find('first');
		//$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Professeur->id = $id;
		if (!$this->Professeur->exists()) {
			throw new NotFoundException(__('Invalid professeur'));
		}
		
		$this->request->allowMethod('post', 'delete');
		if ($this->Professeur->delete()) {
			$this->Session->setFlash(__('The professeur has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The professeur could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
