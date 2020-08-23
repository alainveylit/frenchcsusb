<?php
App::uses('AppController', 'Controller');
/**
 * Vocabulaires Controller
 *
 * @property Vocabulaire $Vocabulaire
 * @property PaginatorComponent $Paginator
 */
class VocabulairesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Vocabulaire->recursive = 0;
		$this->Paginator->settings['limit']=200;
		$this->Paginator->settings['order']=['id'=>'DESC'];
		$this->set('vocabulaires', $this->Paginator->paginate());
	}

	public function index() {
		$this->Vocabulaire->recursive = 0;
		$this->Paginator->settings['limit']=100;
		$this->Paginator->settings['order']=['id'=>'DESC'];
		$this->set('vocabulaires', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Vocabulaire->exists($id)) {
			throw new NotFoundException(__('Invalid vocabulaire'));
		}
		$options = array('conditions' => array('Vocabulaire.' . $this->Vocabulaire->primaryKey => $id));
		$this->set('vocabulaire', $this->Vocabulaire->find('first', $options));
	}

	public function view($id = null) {
		if (!$this->Vocabulaire->exists($id)) {
			throw new NotFoundException(__('Invalid vocabulaire'));
		}
		$options = array('conditions' => array('Vocabulaire.' . $this->Vocabulaire->primaryKey => $id));
		$this->set('vocabulaire', $this->Vocabulaire->find('first', $options));
	}

	public function latest()
{
	$this->layout='ajax';
	$vocabulaire = $this->Vocabulaire->find('first', array('order'=>'Vocabulaire.id DESC'));
	$image = $vocabulaire['Vocabulaire']['image'];
	$image_path = DS . 'files' . DS . 'vocabulaire' . DS . 'image' . DS . $vocabulaire['Vocabulaire']['image_dir'] . DS . $image;
	$html=sprintf("<p>%s</p><div class='centered'><a href='/vocabulaires/view/%d'><img src='%s'></a></div>", 
	$vocabulaire['Vocabulaire']['title'], $vocabulaire['Vocabulaire']['id'], $image_path); 
	echo $html;
	//debug($chanson);
	exit;
}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Vocabulaire->create();
			if ($this->Vocabulaire->save($this->request->data)) {
				$this->Session->setFlash(__('The vocabulaire has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocabulaire could not be saved. Please, try again.'), 'flash_error');
			}
		}
		//$professeurs = $this->Vocabulaire->Professeur->find('list');
		$cours = $this->Vocabulaire->Cours->find('list', 
			array('conditions'=>['professeur_id'=>$this->Auth->user('professeur_id')], 'fields'=>'id,titre'));
			$professeur_id=$this->Auth->user('professeur_id');
			
		$this->set(compact ('cours', 'professeur_id'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Vocabulaire->exists($id)) {
			throw new NotFoundException(__('Invalid vocabulaire'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vocabulaire->save($this->request->data)) {
				$this->Session->setFlash(__('The vocabulaire has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocabulaire could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Vocabulaire.' . $this->Vocabulaire->primaryKey => $id));
			$this->request->data = $this->Vocabulaire->find('first', $options);
		}
		$professeurs = $this->Vocabulaire->Professeur->find('list');
		$cours = $this->Vocabulaire->Cours->find('list', 
			array('conditions'=>['professeur_id'=>$this->Auth->user('professeur_id')], 'fields'=>'id,titre'));
		$this->set(compact('professeurs', 'cours'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Vocabulaire->id = $id;
		if (!$this->Vocabulaire->exists()) {
			throw new NotFoundException(__('Invalid vocabulaire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Vocabulaire->delete()) {
			$this->Session->setFlash(__('The vocabulaire has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The vocabulaire could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
