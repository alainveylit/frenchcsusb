<?php
App::uses('AppController', 'Controller');
/**
 * CrosswordOptions Controller
 *
 * @property CrosswordOption $CrosswordOption
 * @property PaginatorComponent $Paginator
 */
class CrosswordOptionsController extends AppController {

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
		$this->CrosswordOption->recursive = 0;
		$this->Paginator->settings['order']=['id'=>'DESC'];
		$this->set('crosswordOptions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CrosswordOption->exists($id)) {
			throw new NotFoundException(__('Invalid crossword option'));
		}
		$options = array('conditions' => array('CrosswordOption.' . $this->CrosswordOption->primaryKey => $id));
		$this->set('crosswordOption', $this->CrosswordOption->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		if ($this->request->is('post')) {
			//debug($this->request->data);
			//exit;
			$this->CrosswordOption->create();
			if ($this->CrosswordOption->save($this->request->data)) {
				$crossword_id = $this->request->data['CrosswordOption']['crossword_id'];
				$this->Session->setFlash(__('The crossword option has been saved.'), 'flash_normal');
				return $this->redirect(array('controller'=>'crosswords', 'action' => 'view',  'admin'=>true, $crossword_id));
			} else {
				return $this->Session->setFlash(__('The crossword option could not be saved. Please, try again.'), 'flash_error');
			}
		}
		//$crossword_options = $this->CrosswordOption->Crossword->find('list');
		//$this->set(compact('crossword_options'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CrosswordOption->exists($id)) {
			throw new NotFoundException(__('Invalid crossword option'));
		}
		if ($this->request->is(array('post', 'put'))) {
				$crossword_id = $this->request->data['CrosswordOption']['crossword_id'];
			if ($this->CrosswordOption->save($this->request->data)) {
				$this->Session->setFlash(__('The crossword option has been saved.'), 'flash_normal');
				return $this->redirect(array('controller'=>'crosswords', 'action' => 'view', 'admin'=>true, $crossword_id));
			} else {
				$this->Session->setFlash(__('The crossword option could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('CrosswordOption.' . $this->CrosswordOption->primaryKey => $id));
			$this->request->data = $this->CrosswordOption->find('first', $options);
		}
		$crosswords = $this->CrosswordOption->Crossword->find('list');
		$this->set(compact('crosswords'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CrosswordOption->id = $id;
		if (!$this->CrosswordOption->exists()) {
			throw new NotFoundException(__('Invalid crossword option'));
		}
		$this->request->allowMethod('post', 'delete');
		
			$options = array('conditions' => array('CrosswordOption.' . $this->CrosswordOption->primaryKey => $id), 'fields'=>['id','crossword_id']);
			$crossword_option = $this->CrosswordOption->find('first', $options);
			$crossword_id = $crossword_option['CrosswordOption']['crossword_id'];


		if ($this->CrosswordOption->delete()) {
			$this->Session->setFlash(__('The crossword option has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The crossword option could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('controller'=>'crosswords', 'action' => 'view', $crossword_id));

	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CrosswordOption->recursive = 0;
		$this->Paginator->settings['order']=['id'=>'DESC', 'crossword_id'=>'ASC', 'orientation'>'ASC', 'position'=>'ASC'];
		$this->set('crosswordOptions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CrosswordOption->exists($id)) {
			throw new NotFoundException(__('Invalid crossword option'));
		}
		$options = array('conditions' => array('CrosswordOption.' . $this->CrosswordOption->primaryKey => $id));
		$this->set('crosswordOption', $this->CrosswordOption->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CrosswordOption->create();
			if ($this->CrosswordOption->save($this->request->data)) {
				$this->Session->setFlash(__('The crossword option has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The crossword option could not be saved. Please, try again.'), 'flash_error');
			}
		}
		$crosswords = $this->CrosswordOption->Crossword->find('list');
		$this->set(compact('crosswords'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CrosswordOption->exists($id)) {
			throw new NotFoundException(__('Invalid crossword option'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//debug($this->request->data);
			//exit;
			if ($this->CrosswordOption->save($this->request->data)) {
				$this->Session->setFlash(__('The crossword option has been saved.'), 'flash_normal');
				return $this->redirect(array('controller'=>'crosswords', 'action' => 'view', $this->request->data['CrosswordOption']['crossword_id']));
			} else {
				$this->Session->setFlash(__('The crossword option could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('CrosswordOption.' . $this->CrosswordOption->primaryKey => $id));
			$this->request->data = $this->CrosswordOption->find('first', $options);
		}
		$crosswords = $this->CrosswordOption->Crossword->find('list');
		$this->set(compact('crosswords'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->CrosswordOption->id = $id;
		if (!$this->CrosswordOption->exists()) {
			throw new NotFoundException(__('Invalid crossword option'));
		}
		$option = 
		$this->request->allowMethod('post', 'delete');
		if ($this->CrosswordOption->delete()) {
			$this->Session->setFlash(__('The crossword option has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The crossword option could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	function save_order()
{
	$this->request->onlyAllow('ajax');
	$this->layout='ajax';

	//Ajax call from Form View
	$fields = $this->request->data;
	//debug($fields);
	
	foreach($fields as $index=>$field) {
		echo $index, '=[', $field, ']';
		$this->CrosswordOption->id = $field;
		$this->CrosswordOption->saveField('position', $index);
	}
	//echo "L'ordre des lecons est sauvegarde!";
	exit;	
}



}
