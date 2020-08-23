<?php
App::uses('AppController', 'Controller');
/**
 * Chansons Controller
 *
 * @property Chanson $Chanson
 * @property PaginatorComponent $Paginator
 */
class ChansonsController extends AppController {

public function beforeFilter() {  
	
		if($this->Auth->user('professor')==true) {
			$this->Chanson->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		} else {
			$this->Chanson->Behaviors->attach('LightAuthFiltered', array('match_field'=>'cours_id', 'auth_field'=>'cours_id'));
		}

  
     parent::beforeFilter();
        // Controller spesific beforeFilter
    }
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function latest()
{
	$this->layout='ajax';
	$chanson = $this->Chanson->find('first', array('order'=>'Chanson.id DESC'));
	$image = $chanson['Chanson']['image'];
	$image_path = DS . 'files' . DS . 'chanson' . DS . 'image' . DS . $chanson['Chanson']['image_dir'] . DS . $image;
	$html=sprintf("<a href='/chansons/view/%d'><img src='%s'></a>", $chanson['Chanson']['id'], $image_path); 
	echo $html;
	//debug($chanson);
	exit;
}
/**
 * index method
 *
 * @return void
 */
 
	public function tiled ()
 {
	 $this->layout="quizzes";
	 
	 	$this->Chanson->recursive = 0;
		$this->Paginator->settings['order']=['index'=>'ASC'];
		$this->Paginator->settings['limit']=50;
		$this->Paginator->settings['conditions']=['Chanson.active'=>true];
		$this->set('chansons', $this->Paginator->paginate()); 
 }
 
	public function index() {
		$this->Chanson->recursive = 0;
		$this->Paginator->settings['order']=['index'=>'DESC'];
		$this->Paginator->settings['limit']=50;
				$this->Paginator->settings['conditions']=['Chanson.active'=>true];

		$this->set('chansons', $this->Paginator->paginate());
	}
	
	public function admin_index() {
		$this->Chanson->recursive = 0;
		$this->Paginator->settings['order']=['index'=>'DESC'];
	$this->Paginator->settings['limit']=50;
		$this->set('chansons', $this->Paginator->paginate());
	}

	function save_order()
{
	//$this->request->onlyAllow('ajax');
	//Ajax call from Form View
	$this->layout='ajax';
	$fields = $this->request->data;
	
	foreach($fields as $index=>$field) {
		//echo $index, '=[', $field, ']';
		$this->Chanson->id = $field;
		$this->Chanson->saveField('index', $index);
	}
	
	echo "L'ordre des chansons a ete sauvegarde";	
	exit;	
}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Chanson->exists($id)) {
			throw new NotFoundException(__('Invalid chanson'));
		}
		$options = array('conditions' => array('Chanson.' . $this->Chanson->primaryKey => $id));
		$this->set('chanson', $this->Chanson->find('first', $options));
	}
	public function admin_view($id = null) {
		if (!$this->Chanson->exists($id)) {
			throw new NotFoundException(__('Invalid chanson'));
		}
		$options = array('conditions' => array('Chanson.' . $this->Chanson->primaryKey => $id));
		$this->set('chanson', $this->Chanson->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->request->data['Chanson']['creator'] = $this->Auth->user('id');
			$this->request->data['Chanson']['index'] = $this->Chanson->find('count') +1;
			$this->Chanson->create();
			if ($this->Chanson->save($this->request->data)) {
				$this->Session->setFlash(__('The chanson has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chanson could not be saved. Please, try again.'), 'flash_error');
			}
		}
		$cours = $this->Chanson->Cours->find('list', 
			array('conditions'=>['professeur_id'=>$this->Auth->user('professeur_id')], 'fields'=>'id,titre'));
		$this->set(compact('cours'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Chanson->exists($id)) {
			throw new NotFoundException(__('Invalid chanson'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Chanson->save($this->request->data)) {
				$this->Session->setFlash(__('The chanson has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chanson could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Chanson.' . $this->Chanson->primaryKey => $id));
			$this->request->data = $this->Chanson->find('first', $options);
		}
		$cours = $this->Chanson->Cours->find('list', 
			array('conditions'=>['professeur_id'=>$this->Auth->user('professeur_id')], 'fields'=>'id,titre'));
		$this->set(compact('cours'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Chanson->id = $id;
		if (!$this->Chanson->exists()) {
			throw new NotFoundException(__('Invalid chanson'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Chanson->delete()) {
			$this->Session->setFlash(__('The chanson has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The chanson could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
