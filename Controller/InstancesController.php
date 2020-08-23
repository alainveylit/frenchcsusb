<?php
App::uses('AppController', 'Controller');
/**
 * Instances Controller
 *
 * @property Instance $Instance
 * @property PaginatorComponent $Paginator
 */
class InstancesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Instance->recursive = 0;
		$this->set('instances', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Instance->exists($id)) {
			throw new NotFoundException(__('Invalid instance'));
		}
		$options = array('conditions' => array('Instance.' . $this->Instance->primaryKey => $id));
		$this->set('instance', $this->Instance->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Instance->create();
			if ($this->Instance->save($this->request->data)) {
				$this->Session->setFlash(__('The instance has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instance could not be saved. Please, try again.'));
			}
		}
		$quizzes = $this->Instance->Quiz->find('list');
		$creators = $this->Instance->Creator->find('list');
		$this->set(compact('quizzes', 'creators'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Instance->exists($id)) {
			throw new NotFoundException(__('Invalid instance'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Instance->save($this->request->data)) {
				$this->Session->setFlash(__('The instance has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instance could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Instance.' . $this->Instance->primaryKey => $id));
			$this->request->data = $this->Instance->find('first', $options);
		}
		$quizzes = $this->Instance->Quiz->find('list');
		$creators = $this->Instance->Creator->find('list');
		$this->set(compact('quizzes', 'creators'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Instance->id = $id;
		if (!$this->Instance->exists()) {
			throw new NotFoundException(__('Invalid instance'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Instance->delete()) {
			$this->Session->setFlash(__('The instance has been deleted.'));
		} else {
			$this->Session->setFlash(__('The instance could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Instance->recursive = 0;
		$this->set('instances', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Instance->exists($id)) {
			throw new NotFoundException(__('Invalid instance'));
		}
		$options = array('conditions' => array('Instance.' . $this->Instance->primaryKey => $id));
		$this->set('instance', $this->Instance->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Instance->create();
			if ($this->Instance->save($this->request->data)) {
				$this->Session->setFlash(__('The instance has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instance could not be saved. Please, try again.'));
			}
		}
		$quizzes = $this->Instance->Quiz->find('list');
		$creators = $this->Instance->Creator->find('list');
		$this->set(compact('quizzes', 'creators'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Instance->exists($id)) {
			throw new NotFoundException(__('Invalid instance'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Instance->save($this->request->data)) {
				$this->Session->setFlash(__('The instance has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instance could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Instance.' . $this->Instance->primaryKey => $id));
			$this->request->data = $this->Instance->find('first', $options);
		}
		$quizzes = $this->Instance->Quiz->find('list');
		$creators = $this->Instance->Creator->find('list');
		$this->set(compact('quizzes', 'creators'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Instance->id = $id;
		if (!$this->Instance->exists()) {
			throw new NotFoundException(__('Invalid instance'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Instance->delete()) {
			$this->Session->setFlash(__('The instance has been deleted.'));
		} else {
			$this->Session->setFlash(__('The instance could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
