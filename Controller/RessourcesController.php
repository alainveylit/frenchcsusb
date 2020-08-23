<?php
App::uses('AppController', 'Controller');
/**
 * Ressources Controller
 *
 * @property Ressource $Ressource
 * @property PaginatorComponent $Paginator
 */
class RessourcesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {   
		
		//if($this->action == 'display') return true;
		
		if($this->Auth->user('professor')==true) {
			$this->Ressource->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		} else {
			$this->Ressource->Behaviors->attach('LightAuthFiltered', array('match_field'=>'cours_id', 'auth_field'=>'cours_id'));
		}
		
		parent::beforeFilter();
		$this->Auth->authorize = 'Controller';

    if (isset($this->Security) && in_array($this->action, array('display'))) {
		$this->Security->validatePost = false;
		$this->Security->csrfCheck = false;
	}

        // Controller specific beforeFilter       
    }
    
 public function isAuthorized()
{
	
	return true;

}
/**
 * index method
 *
 * @return void
 */
	public function index($focus=null) {
		$this->layout="quizzes";
	
		$this->Ressource->recursive = 0;
		$this->Paginator->settings['limit']=100;
		$this->Paginator->settings['order']=['Ressource.id'=>'DESC'];
		$foci = $this->Ressource->find('all', array('fields'=>'DISTINCT focus'));
		$results = Hash::extract($foci, '{n}.Ressource.focus');
		//debug($results);
		//debug($foci);
		//exit;
		
		if($focus!=null) {
			$this->Paginator->settings['conditions']= array('focus'=>$focus);
		}
	
		$this->set('foci', $results);
		$this->set('ressources', $this->Paginator->paginate());
		//$this->render('tiled');
	}
	
	public function display() {
		$cours = $this->Session->read('Cours');
		

		//$this->Quiz->Behaviors->attach('LightAuthFiltered', array('match_field'=>'cours_id', 'auth_field'=>'cours_id'));

		$this->layout="ajax";
		$medium = $this->request->params['pass'][0]; //('focus');
		
		$this->Ressource->recursive = 0;
		$this->Paginator->settings['limit']=100;
		$this->Paginator->settings['conditions']= array('medium'=>$medium);
		$this->set('ressources', $this->Paginator->paginate());
		$this->set(compact('medium','cours'));
		$this->render('tiled');
	}
	
	public function tiled($focus=null) {
		if($this->request->is('ajax')) {
			$this->layout="ajax";
			$focus = $this->request->query('focus');
		} else {
			$this->layout="quizzes";
		}
		
		$this->Ressource->recursive = 0;
		$this->Paginator->settings['limit']=100;
		$this->Paginator->settings['order']=['Ressource.id'=>'ASC'];
		if($focus!=null) {
			$this->Paginator->settings['conditions']= array('focus'=>$focus);
		}
		$this->set('ressources', $this->Paginator->paginate());
	}
	

	public function admin_index() {
		$this->Ressource->recursive = 0;
		$this->Paginator->settings['order']=['Ressource.id'=>'DESC'];
		//$this->Ressource->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		$this->set('ressources', $this->Paginator->paginate());
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
		if (!$this->Ressource->exists($id)) {
			throw new NotFoundException(__('Invalid ressource'));
		}
		$options = array('conditions' => array('Ressource.' . $this->Ressource->primaryKey => $id));
		$this->set('ressource', $this->Ressource->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		$this->add();
	}
	public function add() {
			if ($this->request->is('post')) {
			$this->Ressource->create();
			if ($this->Ressource->save($this->request->data)) {
				$this->Session->setFlash(__('The ressource has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ressource could not be saved. Please, try again.'));
			}
		}
		$cours = $this->Ressource->Cours->find('list', 
		array('conditions'=>['professeur_id'=>$this->Auth->user('professeur_id')],
		'fields'=>'id,titre'));
		$this->set('creator', $this->Auth->user('id'));
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
		
		if (!$this->Ressource->exists($id)) {
			throw new NotFoundException(__('Invalid ressource'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ressource->save($this->request->data)) {
				$this->Session->setFlash(__('The ressource has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ressource could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ressource.' . $this->Ressource->primaryKey => $id));
			$this->request->data = $this->Ressource->find('first', $options);
		}
		$cours = $this->Ressource->Cours->find('list', 
		array('conditions'=>['professeur_id'=>$this->Auth->user('professeur_id')], 'fields'=>'id,titre'));
		$this->set(compact('cours'));
	}

	public function latest()
{
	$this->layout='ajax';
	$ressource = $this->Ressource->find('first', array('order'=>'Ressource.id DESC'));
	$image = $ressource['Ressource']['image'];
	$image_path = DS . 'files' . DS . 'ressource' . DS . 'image' . DS . $ressource['Ressource']['image_dir'] . DS . $image;
	$html=sprintf("<p>%s</p><div class='centered'><a href='/ressources/view/%d'><img src='%s'></a></div>", $ressource['Ressource']['titre'], $ressource['Ressource']['id'], $image_path); 
	echo $html;
	//debug($chanson);
	exit;
}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Ressource->id = $id;
		if (!$this->Ressource->exists()) {
			throw new NotFoundException(__('Invalid ressource'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ressource->delete()) {
			$this->Session->setFlash(__('The ressource has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ressource could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
