<?php
App::uses('AppController', 'Controller');
/**
 * Tiles Controller
 *
 * @property Tile $Tile
 * @property PaginatorComponent $Paginator
 */
class TilesController extends AppController {
	
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
	
		if($this->is_administrator()) {
			return true;
		}
		
		return false;
}
//----------------------------------------------------------------------
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function get_tiles() {
		$this->Tile->recursive = 0;
		$tiles = $this->Tile->find('all', array('conditions'=>['Tile.active'=>true]));
		$groups = Hash::combine($tiles, '{n}.Tile.id','{n}', '{n}.Tile.group');
		return $groups;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tile->recursive = 0;
		$this->set('tiles', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->Tile->recursive = 0;
		$this->set('tiles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 	public function admin_view($id = null) {
		if (!$this->Tile->exists($id)) {
			throw new NotFoundException(__('Invalid tile'));
		}
		$options = array('conditions' => array('Tile.' . $this->Tile->primaryKey => $id));
		$this->set('tile', $this->Tile->find('first', $options));
	}

	public function view($id = null) {
		if (!$this->Tile->exists($id)) {
			throw new NotFoundException(__('Invalid tile'));
		}
		$options = array('conditions' => array('Tile.' . $this->Tile->primaryKey => $id));
		$this->set('tile', $this->Tile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add($tilegroup_id=null) {
		
		$tilegroup = $this->Tile->TileGroup->find('first', array('conditions'=>['TileGroup.id'=>$tilegroup_id]));
		if(empty($tilegroup)) {
				$this->Session->setFlash(__('Ce groupe n\'existe pas.'), 'flash_error');
				return $this->redirect($this->referer);			
		}
		
		if ($this->request->is('post')) {
			
			//debug($this->request->data);
			//exit;
			$this->Tile->create();
			if ($this->Tile->save($this->request->data)) {
				$this->Session->setFlash(__('The tile has been saved.'), 'flash_normal');
				return $this->redirect($this->referer);
			} else {
				$this->Session->setFlash(__('The tile could not be saved. Please, try again.'), 'flash_error');
			}
		}

		$this->Session->write('referer', $this->referer());
		$couleurs = $this->Tile->Couleur->find('list');
		$this->set(compact('couleurs','tilegroup','tile_group_id'));
		$this->set('creator', $this->Auth->user('id'));
		$this->set('index', $this->Tile->find('count')+1, array('conditions'=>['TileGroup.id'=>$tilegroup_id]));
		$this->set('tile_group_id',  $tilegroup_id);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Tile->exists($id)) {
			throw new NotFoundException(__('Invalid tile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tile->save($this->request->data)) {
				$this->Session->setFlash(__('The tile has been saved.'), 'flash_normal');
				return $this->redirect($this->referer);
			} else {
				$this->Session->setFlash(__('The tile could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Tile.' . $this->Tile->primaryKey => $id));
			$this->request->data = $this->Tile->find('first', $options);
		}
		
		$this->Session->write('referer', $this->referer());
		$tile_groups = $this->Tile->TileGroup->find('list');
		$couleurs = $this->Tile->Couleur->find('list');
		$this->set(compact('couleurs', 'tile_groups'));
		$this->set('creator', $this->Auth->user('id'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Tile->id = $id;
		if (!$this->Tile->exists()) {
			throw new NotFoundException(__('Invalid tile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Tile->delete()) {
			$this->Session->setFlash(__('The tile has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The tile could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}


// Called by tile group when the tiles order are modified via drag'n drop
	function save_order()
{
	$this->request->onlyAllow('ajax');
	$this->layout='ajax';

	//Ajax call from Form View
	$fields = $this->request->data;
	//debug($fields);
	
	foreach($fields as $index=>$field) {
		echo $index, '=[', $field, ']';
		$this->Tile->id = $field;
		$this->Tile->saveField('index', $index);
	}
	echo "The tiles ranking order has been saved";
	exit;	
}

}
