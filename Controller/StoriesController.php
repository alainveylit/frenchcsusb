<?php
App::uses('AppController', 'Controller');
/**
 * Stories Controller
 *
 * @property Story $Story
 * @property PaginatorComponent $Paginator
 */
class StoriesController extends AppController {

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
		$this->Story->recursive = 0;
		$this->set('stories', $this->Paginator->paginate());
	}

	public function index() {
		$this->Story->recursive = 0;
		$this->set('stories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Story->exists($id)) {
			throw new NotFoundException(__('Invalid histoire'));
		}
		$options = array('conditions' => array('Story.' . $this->Story->primaryKey => $id));
		$this->set('story', $this->Story->find('first', $options));
	}

	public function view($id = null) {
		if (!$this->Story->exists($id)) {
			throw new NotFoundException(__('Invalid histoire'));
		}
		$options = array('conditions' => array('Story.' . $this->Story->primaryKey => $id));
		$this->set('story', $this->Story->find('first', $options));
	}

	public function latest()
{
	$this->layout='ajax';
	$histoire = $this->Story->find('first', array('order'=>'Story.id DESC'));
	$image = $histoire['Story']['image'];
	$image_path = DS . 'files' . DS . 'histoire' . DS . 'image' . DS . $histoire['Story']['image_dir'] . DS . $image;
	$html=sprintf("<p>%s</p><div class='centered'><a href='/stories/view/%d'><img src='%s'></a></div>", 
	$histoire['Story']['title'], $histoire['Story']['id'], $image_path); 
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
			$this->Story->create();
			$this->request->data['Story']['creator'] = $this->Auth->user('id');
			if ($this->Story->save($this->request->data)) {
				$this->Session->setFlash(__('The histoire has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The histoire could not be saved. Please, try again.'), 'flash_error');
			}
		}

		$cours = $this->Story->Cours->find('list', 
			array('conditions'=>array('AND'=>['professeur_id'=>$this->Auth->user('professeur_id'), 'active'=>true]), 'fields'=>'id,titre'));
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
		if (!$this->Story->exists($id)) {
			throw new NotFoundException(__('Histoire invalide'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Story->save($this->request->data)) {
				$this->Session->setFlash(__('Cette histoire est sauvegardee.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The histoire could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Story.' . $this->Story->primaryKey => $id));
			$this->request->data = $this->Story->find('first', $options);
		}
		
		//$professeurs = $this->Story->Professeur->find('list');
		$cours = $this->Story->Cours->find('list', 
			array('conditions'=>array('AND'=>['professeur_id'=>$this->Auth->user('professeur_id'), 'active'=>true]), 'fields'=>'id,titre'));
		$this->set(compact( 'cours'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Story->id = $id;
		if (!$this->Story->exists()) {
			throw new NotFoundException(__('Invalid histoire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Story->delete()) {
			$this->Session->setFlash(__('L\'histoire est effacee.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('Impossible d\'effacer cette histoire. Veuillez re-essayer.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
