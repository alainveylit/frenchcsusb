<?php
App::uses('AppController', 'Controller');
/**
 * Landings Controller
 *
 * @property Landing $Landing
 * @property PaginatorComponent $Paginator
 */
class LandingsController extends AppController {

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
 
	public function beforeFilter()
{
	 parent::beforeFilter();
  //$this->Auth->Authorize = 'controller';
}
//----------------------------------------------------------------------------------
	public function isAuthorized() {
	return true;
}

	public function admin_index() {
		$this->Landing->recursive = 0;
		$this->set('landings', $this->Paginator->paginate());
	}

	public function admin_land($cours_id)
	{
		$this->Landing->recursive=2;
		$this->land($cours_id);
	}

	public function land($cours_id = null)
{
	$landing = $this->Landing->find('first', ['conditions'=>['cours_id'=>$cours_id], 'fields'=>['id','title']]);
	if(empty($landing)) {
		die("Aucun cours ne correspond a ce critere");
	}
	$this->view($landing['Landing']['id']);
	$this->render('view');
	
}
	
	public function display($cours_id = null)
{
	//if($cours_id == null) $cours_id =$this->Auth->user('cours_id');
	
			if($this->Auth->user('professor')==true) {
				$cours = $this->Session->read('Cours');
				$cours_id=$cours['id'];
			} else {
				$cours_id = $this->Auth->user('cours_id');	
			}
	
	if($cours_id == null) {
		die("Ce cours n'existe pas: " . $cours_id);
			$this->Session->setFlash(__('Aucun cours selectionne.'), 'flash_error');
			$this->redirect('/');
		}

	$this->view($cours_id);
	$this->render('view');
	
}


	public function admin_display($cours_id = null)
{
	if($cours_id == null) $cours_id =$this->Auth->user('cours_id');
	if($cours_id == null) {
			$this->Session->setFlash(__('Veuillez selectionner un cours.'), 'flash_error');
			$this->redirect('/dashboard');
		}

	$this->view($landing['Landing']['cours_id']);
	$this->render('view');
	
}

	public function view($cours_id = null) {
		
		if($cours_id == null) $cours_id = $this->Auth->user('cours_id');
		
		$record = $this->Landing->find('first', ['conditions'=>['Landing.cours_id'=>$cours_id], 'fields'=>['id','title']]);
		$id = $record['Landing']['id'];

		if (!$this->Landing->exists($id)) {
			throw new NotFoundException(__('Invalid landing'));
		}
	
		$this->Landing->Behaviors->attach('Containable');
		$this->Landing->contain(array('Cours', 'Professeur', 'TileGroup'=>array('Tile'=>['Couleur']), 'Syllabus', 'CurrentLesson'));
		
		$options = array('conditions' => array('Landing.' . $this->Landing->primaryKey => $id));
		$this->set('landing', $this->Landing->find('first', $options));
		
		$this->render('view');
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($cours_id = null) {
		
		if($cours_id==null) {
			if($this->Auth->user('professor')==true)  {
				$this->redirect(array('controller'=>'users', 'actio'=>'dashboard'));
			} else {
				$this->redirect('/');
			}
		}
		$this->Landing->recursive=-1;
		$record = $this->Landing->find('first', ['conditions'=>['cours_id'=>$cours_id], 'fields'=>['id','title']]);
		$id = $record['Landing']['id'];
		
	if (!$this->Landing->exists($id)) {
			throw new NotFoundException(__('Invalid landing: no such record'));
		}

		$this->Landing->recursive=0;
		$this->Landing->Behaviors->attach('Containable');
		$this->Landing->contain(array('Cours', 'Professeur'=>['Creator'], 'TileGroup'=>['Tile'=>['Couleur']], 'Syllabus'));
		if (!$this->Landing->exists($id)) {
			throw new NotFoundException(__('Invalid landing'));
		}
		$options = array('conditions' => array('Landing.' . $this->Landing->primaryKey => $id));
		$this->set('landing', $this->Landing->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($cours_id=null) {
		
		if($cours_id==null) {
				$this->Session->setFlash(__('Atterissage non reussi. Vous devez attacher cette page a un cours.'), 'flash_error');
				return $this->redirect(array('controller'=>'cours', 'action' => 'index'));
			}
			
		// check if a landing already exists for this cours
		$landing = $this->Landing->find('first', array('fields'=>['title','id'], 'conditions'=>['Landing.cours_id'=>$cours_id]));
		if(!empty($landing)) {
			$this->Session->setFlash(__('Un atterissage existe pour ce cours. Veuillez editer.'), 'flash_error');
			$this->redirect(array('action'=>'edit', $landing['Landing']['id']));
		}

		if ($this->request->is('post')) {			
			$this->Landing->create();
			if ($this->Landing->save($this->request->data)) {
				$this->Session->setFlash(__('The landing has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The landing could not be saved. Please, try again.'), 'flash_error');
			}
		}
		
		$syllabi=array(0=>'Not available yet');
		$syllabi += $this->Landing->Document->find('list', array('conditions'=>['creator'=>$this->Auth->user('id'), 'category'=>'syllabus']));
		
		$professeur_id = $this->Auth->user('professeur_id');
		$cours = $this->Landing->Cours->find('first', array('fields'=>['id','titre'], 'conditions'=>['Cours.id'=>$cours_id]));
		$professeur =  $this->Auth->user('Professeur');
		$this->request->data['Landing']['professeur_id']=$professeur_id;
		$this->request->data['Landing']['cours_id']=$cours_id;
		$this->set(compact('cours', 'professeur','syllabi'));
		
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		if (!$this->Landing->exists($id)) {
			throw new NotFoundException(__('Invalid landing: no such landing'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Landing->save($this->request->data)) {
				$this->Session->setFlash(__('The landing has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The landing could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Landing.' . $this->Landing->primaryKey => $id));
			$this->request->data = $this->Landing->find('first', $options);
		}

		$syllabi=array(0=>'Not available yet');
		$syllabi += $this->Landing->Document->find('list', array('conditions'=>['creator'=>$this->Auth->user('id'), 'category'=>'syllabus']));
		
		$professeur_id = $this->Auth->user('professeur_id');
		$cours = $this->Landing->Cours->find('list', array('fields'=>['id','titre'], 'conditions'=>['professeur_id'=>$professeur_id]));
		$professeur =  $this->Auth->user('Professeur');
		$this->set(compact('cours', 'professeur', 'syllabi'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Landing->id = $id;
		if (!$this->Landing->exists()) {
			throw new NotFoundException(__('Invalid landing'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Landing->delete()) {
			$this->Session->setFlash(__('The landing has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The landing could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
