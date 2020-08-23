<?php
App::uses('AppController', 'Controller');
/**
 * QuizInstances Controller
 *
 * @property QuizInstance $QuizInstance
 * @property PaginatorComponent $Paginator
 */
class QuizInstancesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {   
		
		if($this->is_admin_interface()) {
			//$this->QuizInstance->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		}
 
     parent::beforeFilter();
        // Controller specific beforeFilter
    }

/**
 * index method
 *
 * @return void
 */
	public function admin_index($quiz_id = null) {
		
		if($quiz_id != null) {
			$conditions = array('quiz_id'=>$quiz_id);
			$this->Paginator->settings['conditions'] = array('quiz_id'=>$quiz_id);
		}
		$this->QuizInstance->recursive = 0;
		$this->set('quizInstances', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->QuizInstance->exists($id)) {
			throw new NotFoundException(__('Invalid quiz instance'));
		}
		$options = array('conditions' => array('QuizInstance.' . $this->QuizInstance->primaryKey => $id));
		$this->set('quizInstance', $this->QuizInstance->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		if ($this->request->is('post')) {
			$this->QuizInstance->create();
			if ($this->QuizInstance->save($this->request->data)) {
				$this->Flash->success(__('The quiz instance has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The quiz instance could not be saved. Please, try again.'));
			}
		}
		
		$quizzes = $this->QuizInstance->Quiz->find('list');
		$users = $this->QuizInstance->User->find('list');
		$sessions = $this->QuizInstance->Session->find('list');
		$this->set(compact('quizzes', 'users', 'sessions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->QuizInstance->exists($id)) {
			throw new NotFoundException(__('Invalid quiz instance'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QuizInstance->save($this->request->data)) {
				$this->Flash->success(__('The quiz instance has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The quiz instance could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuizInstance.' . $this->QuizInstance->primaryKey => $id));
			$this->request->data = $this->QuizInstance->find('first', $options);
		}
		$quizzes = $this->QuizInstance->Quiz->find('list');
		$users = $this->QuizInstance->User->find('list');
		$sessions = $this->QuizInstance->Session->find('list');
		$this->set(compact('quizzes', 'users', 'sessions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->QuizInstance->id = $id;
		if (!$this->QuizInstance->exists()) {
			throw new NotFoundException(__('Invalid quiz instance'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->QuizInstance->delete()) {
			$this->Flash->success(__('The quiz instance has been deleted.'));
		} else {
			$this->Flash->error(__('The quiz instance could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
