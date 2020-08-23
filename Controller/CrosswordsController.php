<?php
App::uses('AppController', 'Controller');
/**
 * Crosswords Controller
 *
 * @property Crossword $Crossword
 * @property PaginatorComponent $Paginator
 */
class CrosswordsController extends AppController {

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
		$this->Crossword->recursive = 0;
		$this->set('crosswords', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Crossword->exists($id)) {
			throw new NotFoundException(__('Invalid crossword'));
		}
		$this->layout="crossword";
		$this->Crossword->CrosswordOption->recursive=-1;
		$options = array('conditions' => array('Crossword.' . $this->Crossword->primaryKey => $id));
		$crossword = $this->Crossword->find('first', $options);
		
		$data = array();
		foreach($crossword['CrosswordOption'] as $entry) {
			$option = array(
			'clue' => $entry['clue'],
			'answer' => $entry['answer'],
			'position' => $entry['position'],
			'orientation' => $entry['orientation'] ? 'down' : 'across', 
			'startx' => $entry['startx'],
			'starty' => $entry['starty']
			);
			$data[]=$option;
		}
		
		$this->set(compact('crossword','data'));
		$this->set('options', $options);
		//exit;
		//$this->render('view');
}

	public function play($id = null) {
		if (!$this->Crossword->exists($id)) {
			throw new NotFoundException(__('Invalid crossword'));
		}
		
		$this->Crossword->CrosswordOption->recursive=-1;
		$options = array('conditions' => array('Crossword.' . $this->Crossword->primaryKey => $id));
		$crossword = $this->Crossword->find('first', $options);
		
		$data = array();
		foreach($crossword['CrosswordOption'] as $entry) {
			$option = array(
			'clue' => $entry['clue'],
			'answer' => $entry['answer'],
			'position' => $entry['position'],
			'orientation' => $entry['orientation'] ? 'down' : 'across', 
			'startx' => $entry['startx'],
			'starty' => $entry['starty']
			);
			$data[]=$option;
		}
		
		$this->set(compact('crossword','data'));
		$this->set('options', $options);
}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Crossword->create();
			$this->request->data['Crossword']['creator']=$this->Auth->user('id');
			if ($this->Crossword->save($this->request->data)) {
				$this->Flash->success(__('The crossword has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The crossword could not be saved. Please, try again.'));
			}
		}
		
		$cours = $this->Crossword->Cour->find('list');
		$this->set(compact('cours'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Crossword->exists($id)) {
			throw new NotFoundException(__('Invalid crossword'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Crossword->save($this->request->data)) {
				$this->Flash->success(__('The crossword has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The crossword could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Crossword.' . $this->Crossword->primaryKey => $id));
			$this->request->data = $this->Crossword->find('first', $options);
		}
		$cours = $this->Crossword->Cour->find('list');
		$this->set(compact('cours'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Crossword->id = $id;
		if (!$this->Crossword->exists()) {
			throw new NotFoundException(__('Invalid crossword'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Crossword->delete()) {
			$this->Flash->success(__('The crossword has been deleted.'));
		} else {
			$this->Flash->error(__('The crossword could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Crossword->recursive = 0;
		$this->set('crosswords', $this->Paginator->paginate());
		$this->render('index');
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Crossword->exists($id)) {
			throw new NotFoundException(__('Invalid crossword'));
		}
		$this->layout='crossword';
		$options = array('conditions' => array('Crossword.' . $this->Crossword->primaryKey => $id));
		$crossword = $this->Crossword->find('first', $options);
		$definitions = $this->Crossword->CrosswordOption->get_definitions($id);
		$this->set('definitions', json_encode($definitions));
		$this->set('crossword', $crossword);
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->request->data['Crossword']['creator']=$this->Auth->user('id');
	
			$this->Crossword->create();
			if ($this->Crossword->save($this->request->data)) {
				$this->Flash->success(__('The crossword has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The crossword could not be saved. Please, try again.'));
			}
		}
		$cours = $this->Crossword->Cour->find('list');
		$this->set(compact('cours'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Crossword->exists($id)) {
			throw new NotFoundException(__('Invalid crossword'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Crossword->save($this->request->data)) {
				$this->Flash->success(__('The crossword has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The crossword could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Crossword.' . $this->Crossword->primaryKey => $id));
			$this->request->data = $this->Crossword->find('first', $options);
		}
		$cours = $this->Crossword->Cour->find('list');
		$this->set(compact('cours'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Crossword->id = $id;
		if (!$this->Crossword->exists()) {
			throw new NotFoundException(__('Invalid crossword'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Crossword->delete()) {
			$this->Flash->success(__('The crossword has been deleted.'));
		} else {
			$this->Flash->error(__('The crossword could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
