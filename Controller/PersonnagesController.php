<?php
App::uses('AppController', 'Controller');
/**
 * Personnages Controller
 *
 * @property Personnage $Personnage
 * @property PaginatorComponent $Paginator
 */
class PersonnagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {   
		
		if($this->Auth->user('professor')==true) {
			$this->Personnage->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		} else {
			$this->Personnage->Behaviors->attach('LightAuthFiltered', array('match_field'=>'cours_id', 'auth_field'=>'cours_id'));
		}


     parent::beforeFilter();
        // Controller specific beforeFilter
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Personnage->recursive = 0;
		$this->set('personnages', $this->Paginator->paginate());
	}
	public function admin_index() {
		$this->Personnage->recursive = 0;
		$this->set('personnages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		return $this->view($id);
	}

	public function view($id = null) {
		if (!$this->Personnage->exists($id)) {
			throw new NotFoundException(__('Invalid personnage'));
		}
		$options = array('conditions' => array('Personnage.' . $this->Personnage->primaryKey => $id));
		$this->set('personnage', $this->Personnage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Personnage->create();
			if ($this->Personnage->save($this->request->data)) {
				$this->Session->setFlash(__('The personnage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personnage could not be saved. Please, try again.'));
			}
		}
				$cours = $this->Personnage->Cours->find('list', 
					array('conditions'=>['professeur_id'=>$this->Auth->user('professeur_id')], 'fields'=>'id,titre'));
				$this->set(compact('cours'));
				$this->set('creator', $this->Auth->user('id'));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		if (!$this->Personnage->exists($id)) {
			throw new NotFoundException(__('Invalid personnage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Personnage->save($this->request->data)) {
				$this->Session->setFlash(__('The personnage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personnage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Personnage.' . $this->Personnage->primaryKey => $id));
			$this->request->data = $this->Personnage->find('first', $options);
							$cours = $this->Personnage->Cours->find('list', 
					array('conditions'=>['professeur_id'=>$this->Auth->user('professeur_id')], 'fields'=>'id,titre'));
				$this->set(compact('cours'));

		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Personnage->id = $id;
		if (!$this->Personnage->exists()) {
			throw new NotFoundException(__('Invalid personnage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Personnage->delete()) {
			$this->Session->setFlash(__('The personnage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The personnage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
