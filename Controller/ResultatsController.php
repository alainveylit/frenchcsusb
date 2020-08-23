<?php
App::uses('AppController', 'Controller');
/**
 * Resultats Controller
 *
 * @property Resultat $Resultat
 * @property PaginatorComponent $Paginator
 */
class ResultatsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
var $cours_id;

	function beforeFilter()
	{
		$cours = $this->Session->read('Cours');
		$this->cours_id = $cours['id'];
	
		parent::beforeFilter();
	
	}
	public function admin_deploy($test_id) {
		
		if (!$this->Resultat->Test->exists($test_id)) {
			throw new NotFoundException(__('Invalid resultat'));
		}

		$etudiants = $this->Resultat->Etudiant->find('list', array('conditions'=>['cours_id'=>$this->cours_id]));
		//debug($etudiants);
		
		foreach($etudiants as $id=>$name) {
			$resultat=array('test_id'=>$test_id, 'etudiant_id'=>$id, 'taken'=>false);
			$this->Resultat->create();
			if(!$this->Resultat->save($resultat)) die("Erreur fatale: le resultat n'a pas ete sauvegarde");
			
		}
		
		$this->Session->setFlash("Resultats individuels prets a editer ", 'flash_normal');
		$this->redirect(array('controller'=>'tests', 'action'=>'view', $test_id));
		
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Resultat->recursive = 0;
		$this->set('resultats', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		
		if (!$this->Resultat->exists($id)) {
			throw new NotFoundException(__('Invalid resultat'));
		}
		$options = array('conditions' => array('Resultat.' . $this->Resultat->primaryKey => $id));
		$this->set('resultat', $this->Resultat->find('first', $options));
	}

	public function view($id = null) {
		if (!$this->Resultat->exists($id)) {
			throw new NotFoundException(__('Invalid resultat'));
		}
		$options = array('conditions' => array('Resultat.' . $this->Resultat->primaryKey => $id));
		$this->set('resultat', $this->Resultat->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add($student_id=null) {
		
		if ($this->request->is('post')) {
			$this->Resultat->create();
			if ($this->Resultat->save($this->request->data)) {
				$this->Session->setFlash(__('The resultat has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resultat could not be saved. Please, try again.'), 'flash_error');
			}
		}
		
		$tests = $this->Resultat->Test->find('list');
		$etudiant = $this->Resultat->Etudiant->find('first', array('conditions'=>array('Etudiant.id'=>$student_id)));
		$this->set(compact('tests', 'etudiant'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Resultat->exists($id)) {
			throw new NotFoundException(__('Invalid resultat'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$test_id = $this->request->data['Resultat']['test_id'];
			if ($this->Resultat->save($this->request->data)) {
				$this->Session->setFlash(__('The resultat has been saved.'), 'flash_normal');
				return $this->redirect(array('controller'=>'tests', 'action' => 'view', $test_id));
			} else {
				$this->Session->setFlash(__('The resultat could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Resultat.' . $this->Resultat->primaryKey => $id));
			$this->request->data = $this->Resultat->find('first', $options);
		}
		$tests = $this->Resultat->Test->find('list');
		$etudiants = $this->Resultat->Etudiant->find('list');
		$this->set(compact('tests', 'etudiants'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Resultat->id = $id;
		if (!$this->Resultat->exists()) {
			throw new NotFoundException(__('Invalid resultat'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Resultat->delete()) {
			$this->Session->setFlash(__('The resultat has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The resultat could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
