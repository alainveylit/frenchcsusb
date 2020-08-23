<?php
App::uses('AppController', 'Controller');
/**
 * Devoirs Controller
 *
 * @property Devoir $Devoir
 * @property PaginatorComponent $Paginator
 */
class DevoirsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

public function beforeFilter() {   
	
	if($this->is_admin_interface()) {
		$this->Devoir->Lesson->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
	}
 
     parent::beforeFilter();
        // Controller spesific beforeFilter
    }
/**
 * index method
 *
 * @return void
 */
 
	public function latest()
 {
	 $devoir = $this->Devoir->find('first', array('order'=>'Devoir.id DESC'));
	 $this->set(compact('devoir'));
 }
 
 
	public function admin_index() {
		$this->Devoir->recursive = 0;
		$this->Paginator->settings['order']=['id'=>'DESC'];
		$this->Paginator->settings['limit']=50;
		$this->set('devoirs', $this->Paginator->paginate());
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if($this->request->is('ajax')) {
			$id=$this->request->query['id'];
		}
		
		if (!$this->Devoir->exists($id)) {
			throw new NotFoundException(__('Invalid devoir'));
		}
		$options = array('conditions' => array('Devoir.' . $this->Devoir->primaryKey => $id));
		$this->set('devoir', $this->Devoir->find('first', $options));
	}
	
	public function admin_view($id = null) {
		if (!$this->Devoir->exists($id)) {
			throw new NotFoundException(__('Invalid devoir'));
		}
		$options = array('conditions' => array('Devoir.' . $this->Devoir->primaryKey => $id));
		$this->set('devoir', $this->Devoir->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add($lesson_id=null) {
		
		$cours = $this->Session->read('Cours');
		//debug($cours);
		if ($this->request->is('post')) {
			$this->Devoir->create();
			if ($this->Devoir->save($this->request->data)) {
				$lesson_id = $this->request->data['Devoir']['lesson_id'];
				$this->Session->setFlash(__('Ce devoir est sauvegarde.'), 'flash_normal');
				return $this->redirect(array('controller'=>'lessons', 'action' => 'view', $lesson_id));
			} else {
				$this->Session->setFlash(__('The devoir could not be saved. Please, try again.'), 'flash_error');
			}
		}
		
		$lessons = $this->Devoir->Lesson->find('list', array('conditions'=>['cours_id'=>$cours['id']]));
		foreach($lessons as $id=>$title) {
			$lessons[$id]=html_entity_decode($title);
		}
		
		//$this->request['data']['Devoir']['lesson_id'] = $lesson_id;
		$this->set('lesson_id', $lesson_id);
		$this->set(compact('lessons', 'cours'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Devoir->exists($id)) {
			throw new NotFoundException(__('Invalid devoir'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Devoir->save($this->request->data)) {
				$lesson_id = $this->request->data['Devoir']['lesson_id'];
				$this->Session->setFlash(__('Ce devoir est sauvegarde.'), 'flash_normal');
				return $this->redirect(array('controller'=>'lessons', 'action' => 'view', $lesson_id));
			} else {
				$this->Session->setFlash(__('Erreur: The devoir could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Devoir.' . $this->Devoir->primaryKey => $id));
			$this->request->data = $this->Devoir->find('first', $options);
		}
		$lessons = $this->Devoir->Lesson->find('list');
		foreach($lessons as $id=>$title) {
			$lessons[$id]=html_entity_decode($title);
		}

		$this->set(compact('lessons'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Devoir->id = $id;
		if (!$this->Devoir->exists()) {
			throw new NotFoundException(__('Invalid devoir'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Devoir->delete()) {
			$this->Session->setFlash(__('The devoir has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The devoir could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
