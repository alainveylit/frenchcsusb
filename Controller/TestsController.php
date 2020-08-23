<?php
App::uses('AppController', 'Controller');
/**
 * Tests Controller
 *
 * @property Test $Test
 * @property PaginatorComponent $Paginator
 */
class TestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {   
		
	if($this->is_admin_interface()) {
		$this->Test->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		//$this->Test->Behaviors->attach('LightAuthFiltered', array('auth_field'=>'professeur_id', 'match_field'=>'professeur_id'));

	}

     parent::beforeFilter();
        // Controller specific beforeFilter
    }

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		//$cours = $this->Session->read('Cours');
		$this->Test->recursive = 0;
		//if(!empty($cours)) $this->Paginator->settings['conditions']=['Test.cours_id'=>$cours['id']];
		$this->set('tests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		
		if (!$this->Test->exists($id)) {
			throw new NotFoundException(__('Invalid test'));
		}
		$this->Test->recursive=2;
		$options = array('conditions' => array('Test.' . $this->Test->primaryKey => $id));
		$this->set('test', $this->Test->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->request->data['Test']['creator'] = $this->Auth->user('id');
			$this->Test->create();
			if ($this->Test->save($this->request->data)) {
				$this->Session->setFlash(__('The test has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test could not be saved. Please, try again.'), 'flash_error');
			}
		}
		$documents = $this->Test->Document->find('list', array('conditions'=>array('category'=>'test')));
		$lessons = $this->Test->Lesson->find('list');
		foreach($lessons  as $id=>$title) {
			$lessons[$id]=html_entity_decode($title);
		}
		
		$categories =  $this->Test->Category->find('list');
		//$categories = array("Grammaire"=>"Grammaire", "Composition"=>"Composition", "Presentation"=>"Presentation");
		$this->set(compact('documents', 'lessons', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Test->exists($id)) {
			throw new NotFoundException(__('Invalid test'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Test->save($this->request->data)) {
				$this->Session->setFlash(__('The test has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The test could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Test.' . $this->Test->primaryKey => $id));
			$this->request->data = $this->Test->find('first', $options);
		}
		$categories =  $this->Test->Category->find('list');
		$documents = $this->Test->Document->find('list');
		$lessons = $this->Test->Lesson->find('list');
		foreach($lessons as $id=>$title) {
			$lessons[$id] = html_entity_decode($title);
		}
		$this->set(compact('documents', 'lessons','categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Test->id = $id;
		if (!$this->Test->exists()) {
			throw new NotFoundException(__('Invalid test'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Test->delete()) {
			$this->Session->setFlash(__('The test has been deleted.'), 'flash_normal');
		} else {
			$this->Flash->error(__('The test could not be deleted. Please, try again.'),  'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
