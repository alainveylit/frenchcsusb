<?php
App::uses('AppController', 'Controller');
/**
 * Cours Controller
 *
 * @property Cour $Cour
 * @property PaginatorComponent $Paginator
 */
	class CoursController extends AppController {
/**
 * Components
 *
 * @var array
 */
 
 function beforeFilter() 
{
	
		if($this->Auth->user('professor')==true) {
				$this->Cour->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));	
		} else {
			if($this->action!="display")
				$this->Cour->Behaviors->attach('LightAuthFiltered', array('match_field'=>'id', 'auth_field'=>'cours_id'));
		}
		
		parent::beforeFilter();

}
	public $components = array('Paginator');

		public function admin_display($id=null)
	{
		return $this->display($id);
	}

	public function admin_weekly($id=null)
{
		$this->Cour->recursive=0;
		if (!$this->Cour->exists($id)) {
			throw new NotFoundException(__('Invalid cour'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cour->save($this->request->data)) {
				$this->Session->setFlash(__('The cour has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cour could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Cour.' . $this->Cour->primaryKey => $id, 'creator'=>$this->Auth->user('id')));
			$this->request->data = $this->Cour->find('first', $options);
		}
			$creator = $this->Auth->user('id');
			$this->set(compact('creator'));

	
}

	public function view($id=null)
{
	$this->layout="quizzes";
	//$this->Cour->recursive=0;
	
		if($this->Auth->user('professor')==true) {
				if($id!=null) {
					 $cours = $this->Cour->find('list', array('conditions'=>['id'=>$id])); 
					 $title = reset($cours);
					 $this->Session->write('Cours', array('id'=>$id, 'titre'=>$title));
					 $this->Session->write('Auth.User.cours_id', $id);
					 $this->Session->write('Auth.User.cours', $title);
					 //debug($this->Auth->user('cours_id'));
					 //exit;
				}
				$cours = $this->Session->read('Cours');
				//debug($cours);
				if(empty($cours)) {
					$this->Session->setFlash(__('Aucun cours n\'a été sélectionné.'), 'flash_error');
					return $this->redirect(array('/'));
					
				}
				$id=$cours['id'];
			} else {
				$id = $this->Auth->user('cours_id');	
			}
			
		$this->Cour->Behaviors->attach('Containable');
		$this->Cour->contain(array('Professeur', 'Landing'=>array('TileGroup'), 'TileGroup'=>array('Tile'=>['Couleur']), 'CurrentLesson'));
		
		if (!$this->Cour->exists($id)) {
			throw new NotFoundException(__('Invalid cours'));
		}
		
		$options = array('conditions' => array('Cour.' . $this->Cour->primaryKey => $id));
		$cours = $this->Cour->find('first', $options);
		$this->set(compact('cours'));
		$this->render('view');
}

	public function etudiant_index() {
		$this->Cour->Behaviors->attach('LightAuthFiltered', 
			array('match_field'=>'id', 'auth_field'=>'cours_id'));	
		$this->Cour->recursive = 0;
		$cours = $this->Cour->find('first');
		exit;
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Cour->Behaviors->attach('LightAuthFiltered', 
			array('match_field'=>'professeur_id', 'auth_field'=>'professeur_id'/*, 'auth_element'=>'User'*/));	
		$this->Cour->recursive = 0;
		$this->Paginator->settings['order']=array('id'=>'DESC');
		$this->set('cours', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		
		//$this->Cour->recursive=2;
		if (!$this->Cour->exists($id)) {
			throw new NotFoundException(__('Invalid cour'));
		}
		
		$this->Cour->Behaviors->attach('Containable');
		$this->Cour->contain(array('Professeur', 'Landing', 'TileGroup'=>array('Tile'=>['Couleur']), 'CurrentLesson'));
	
		$options = array('conditions' => array('Cour.' . $this->Cour->primaryKey => $id));
		$cour = $this->Cour->find('first', $options);
		//debug($cour);
		//exit;
		
		$this->Session->write('Cours', array('id'=>$id, 'titre'=>$cour['Cour']['titre']));
		$this->Session->write('Auth.User.cours_id', $id);
		
		$this->set(compact('cour'));
	}
	
	public function display($id = null) {
		
		//$this->redirect(array('action'=>'display', $id));
		$this->layout="accueil";
		if (!$this->Cour->exists($id)) {
			throw new NotFoundException(__('Invalid cour'));
		}
		$this->Cour->Behaviors->attach('Containable');
		$this->Cour->contain(['Landing', 'TileGroup','Professeur']);
		$options = array('conditions' => array('Cour.' . $this->Cour->primaryKey => $id));
		$this->set('cours', $this->Cour->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Cour->create();
			if ($this->Cour->save($this->request->data)) {
				$this->Session->setFlash(__('The cours has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cours could not be saved. Please, try again.'), 'flash_error');
			}
		}

		$professeur = $this->Auth->user('Professeur');
		$creator = $this->Auth->user('id');
		$this->set(compact('professeur','creator'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Cour->exists($id)) {
			throw new NotFoundException(__('Invalid cour'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cour->save($this->request->data)) {
				$this->Session->setFlash(__('The cour has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cour could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Cour.' . $this->Cour->primaryKey => $id));
			$this->request->data = $this->Cour->find('first', $options);
		}
		
		$landings = $this->Cour->Landing->find('list', array('fields'=>['id','title']));
		
		$creator = $this->Auth->user('id');
		$professeur = $this->Auth->user('Professeur');
		$this->set(compact('professeur','creator', 'landings'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Cour->id = $id;
		if (!$this->Cour->exists()) {
			throw new NotFoundException(__('Invalid cour'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cour->delete()) {
			$this->Session->setFlash(__('The cour has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The cour could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
