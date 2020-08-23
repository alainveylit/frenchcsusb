<?php
App::uses('AppController', 'Controller');
/**
 * TileGroups Controller
 *
 * @property TileGroup $TileGroup
 * @property PaginatorComponent $Paginator
 */
class TileGroupsController extends AppController {

var $categories=array('Landing'=>'Atterissage', 'Cour'=>'Cours', 'Accueil'=>'Accueil');
var $displayFields = array('Landing'=>'title', 'Cour'=>'titre', 'Accueil'=>'title');
var $referer;
//----------------------------------------------------------------------
	function beforeFilter() 
{
    parent::beforeFilter();
    $this->Auth->authorize = 'Controller';
    $this->referer = $this->Session->read('referer');
    $this->Session->delete('referer');
}
//----------------------------------------------------------------------
	public function isAuthorized() {
	
		if(!$this->is_administrator()) {
			return false;
		}
		return true;
}
//----------------------------------------------------------------------
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function get_tiles($group_title=null) {
		
		$conditions = array();
		if(!empty($group_title)) {
			$conditions = array('title'=>$group_title);
		}
		
		$this->TileGroup->recursive = 0;
		$this->TileGroup->Behaviors->attach('Containable');
		$this->TileGroup->contain(array('Tile'=>array('Couleur', 'conditions'=>['Tile.active'=>true])));
		$tiles = $this->TileGroup->find('all', array('order'=>'index', 'conditions'=>$conditions));
		return $tiles;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TileGroup->recursive = 0;
		$this->set('tileGroups', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->TileGroup->recursive = 0;
		$cours_id = $this->Session->read('cour_id');
		//if($cours_id!=null) $this->Paginator->Settings['conditions'] = array('cours_id'=>$cours_id);
		$this->set('tileGroups', $this->Paginator->paginate());
		$this->set('categories', $this->categories);

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TileGroup->exists($id)) {
			throw new NotFoundException(__('Invalid tile group'));
		}
		$options = array('conditions' => array('TileGroup.' . $this->TileGroup->primaryKey => $id));
		$this->set('tileGroup', $this->TileGroup->find('first', $options));
		$this->set('displayFields', $this->displayFields);

	}

	public function admin_view($id = null) {
		$this->TileGroup->recursive=2;
		if (!$this->TileGroup->exists($id)) {
			throw new NotFoundException(__('Invalid tile group'));
		}
		$options = array('conditions' => array('TileGroup.' . $this->TileGroup->primaryKey => $id));
		$this->set('tileGroup', $this->TileGroup->find('first', $options));
		$this->set('categories', $this->categories);
		$this->set('displayFields', $this->displayFields);

	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add($model=null, $foreign_key=null) {
		
		if ($this->request->is('post')) {
			$this->TileGroup->create();
			if ($this->TileGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The tile group has been saved.'));
				return $this->redirect($this->referer);
			} else {
				debug($this->request->data);
				exit;
				$this->Session->setFlash(__('The tile group could not be saved. Please, try again.'));
			}
		}
		
		$this->Session->write('referer', $this->referer());
		$this->set('owner_model',  $this->TileGroup->$model->find('list', array('conditions'=>['id'=>$foreign_key])));
		
		$this->request->data['TileGroup']['model'] = $model;
		$this->request->data['TileGroup']['foreign_key'] = $foreign_key;
		
		$this->set('categories', $this->categories);
		$this->set('index', $this->TileGroup->find('count', array('conditions'=>['model'=>$model, $model.'.id'=>$foreign_key]))+1);
	}

	function admin_reassign($id)
{
		if (!$this->TileGroup->exists($id)) {
			throw new NotFoundException(__('Invalid tile group'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TileGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The tile group has been saved.'));
				return $this->redirect($this->referer);
			} else {
				$this->Session->setFlash(__('The tile group could not be saved. Please, try again.'));
			}
		} else {
	
			$options = array('conditions' => array('TileGroup.' . $this->TileGroup->primaryKey => $id));
			$this->TileGroup->recursive=0;
			$this->request->data = $this->TileGroup->find('first', $options);
		}
	
}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		if (!$this->TileGroup->exists($id)) {
			throw new NotFoundException(__('Invalid tile group'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TileGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The tile group has been saved.'));
				return $this->redirect($this->referer);
			} else {
				$this->Session->setFlash(__('The tile group could not be saved. Please, try again.'));
			}
		} else {
			$this->Session->write('referer', $this->referer());
			$options = array('conditions' => array('TileGroup.' . $this->TileGroup->primaryKey => $id));
			$this->TileGroup->recursive=0;
			$this->request->data = $this->TileGroup->find('first', $options);
			$this->set('categories', $this->categories);
			$this->set('displayFields', $this->displayFields);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->TileGroup->id = $id;
		if (!$this->TileGroup->exists()) {
			throw new NotFoundException(__('Invalid tile group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TileGroup->delete()) {
			$this->Session->setFlash(__('The tile group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tile group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
