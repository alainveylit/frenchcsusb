<?php
App::uses('AppController', 'Controller');
/**
 * Blogs Controller
 *
 * @property Blog $Blog
 * @property PaginatorComponent $Paginator
 */
class BlogsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	var $referer;

	function beforeFilter() 
{
	$this->referer = $this->referer();

		parent::beforeFilter();

		if($this->params['prefix']=='etudiant') {
			//die("You are an etudiant!");
			$this->Blog->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));	
		} else { 
			if(!$this->is_administrator()) exit;
		}
		
		if($this->action=="preview" || $this->action=="showcase" || $this->action=="add") {
			$this->Auth->Authorize = 'Controller';
			return true;
		}
	
	
		$this->Auth->userScope = array('User.active' => true);
		
		if( !$this->Session->check('Auth.User') || !$this->Auth->user('active') )
	{
		 $this->redirect('/');
	}
	
	$this->Auth->Authorize = 'Controller';
		
     if (isset($this->Security)) {
		$this->Security->validatePost = false;
		$this->Security->csrfCheck = false;
	}

}

public function isAuthorized() {	
	//debug($this->action);
	//exit;
	return true;
}

	public function admin_index()
{
	$this->Blog->recursive=1;
		//$this->Paginator->settings['limit']=200;
		//$this->Paginator->settings['conditions']=$conditions;
		$this->set('blogs', $this->Paginator->paginate());
	
}
	public function admin_review()
{
	$cours = $this->Session->read('Cours');
	
	$this->Blog->Creator->recursive=0;
	$cours_id = $this->Auth->user('cours_id');
	$users = $this->Blog->Creator->find("list", array('conditions'=>['cours_id' => $cours['id'], 'active'=>1]));
	//debug($users);
	$this->set('students', $users);
	$this->set('cours', $cours);
	//exit;
	
}

	public function admin_journal($id)
{
	$this->Blog->recursive=1;
	$blogs = $this->Blog->find("all", array('conditions'=>['creator'=>$id]));	
	//debug($blogs);
	//exit;
	$this->set('blogs', $blogs);
	$this->set('owner', $id);
	$this->Blog->Creator->recursive=-1;
	$this->set('creator', $this->Blog->Creator->find('first', array('conditions'=>['Creator.id'=>$id], 'fields'=>['Creator.id','Creator.name','Creator.email'])));
}

	public function review()
{
	$this->Blog->Creator->recursive=0;
	$cours_id = $this->Auth->user('cours_id');
	$users = $this->Blog->Creator->find("list", array('conditions'=>['cours_id' => $cours_id]));
	//debug($users);
	$this->set('students', $users);
	//exit;
	
}

public function journal($id)
{
	$this->Blog->recursive=1;
	$blogs = $this->Blog->find("all", array('conditions'=>['creator'=>$id]));
	//debug($blogs);
	//exit;
	$this->set('blogs', $blogs);
}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Blog->recursive = 0;
		$this->set('blogs', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'));
		}
		$options = array('conditions' => array('Blog.' . $this->Blog->primaryKey => $id));
		$this->set('blog', $this->Blog->find('first', $options));
		//$creator = $this->Blog->User->find("all", array('conditions'=>['id'=>$id]));
		//$this->set('creator', $creator);

	}

/**
 * add method
 *
 * @return void
 */

	public function add() {
		if ($this->request->is('post')) {
			$date = new DateTime();
			//$this->request->data['Blog']['created']=new DateTime();
			$this->request->data['Blog']['modified']=$date->format('Y-m-d H:i:s');
			//debug($date);
			//debug($this->request->data);
			//exit;
			$this->Blog->create();
			if ($this->Blog->save($this->request->data)) {
				$this->Flash->success(__('The blog has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The blog could not be saved. Please, try again.'));
			}
		}
		$this->set('creator', $this->Auth->user('id'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 public function admin_edit($id = null)
 {
	 return $this->edit($id);
 }
	public function edit($id = null) {
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Blog->save($this->request->data)) {
				$this->Flash->success(__('The blog has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The blog could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Blog.' . $this->Blog->primaryKey => $id));
			$this->request->data = $this->Blog->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Blog->id = $id;
		if (!$this->Blog->exists()) {
			throw new NotFoundException(__('Invalid blog'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Blog->delete()) {
			$this->Flash->success(__('The blog has been deleted.'));
		} else {
			$this->Flash->error(__('The blog could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * etudiant_index method
 *
 * @return void
 */
	public function etudiant_index() {
		$this->Blog->recursive = 1;
		$creator = $this->Blog->Creator->find('first', array('conditions'=>['Creator.id'=>$this->Auth->user('id')]));
		//debug($this->Auth->user());
		//exit;
		$cours_id = $this->Auth->user('cours_id');
		$this->set('cours', $this->get_cours($cours_id));
		$this->Paginator->settings['conditions']=['Blog.cours_id'=>$cours_id];
		$this->set('blogs', $this->Paginator->paginate());
		$this->set(compact('creator'));
	}
	
	public function etudiant_display() {
		$this->Blog->recursive = 0;
		$creator = $this->Blog->Creator->find('first', array('conditions'=>['Creator.id'=>$this->Auth->user('id')]));
		$this->set(compact('creator'));

		$this->Paginator->settings['conditions']=['Blog.cours_id'=>$this->Auth->user('cours_id')];
		$this->set('blogs', $this->Paginator->paginate());
	}

	public function admin_display() {
		$this->Blog->recursive = 0;
		$this->set('blogs', $this->Paginator->paginate());
	}

	public function get_cours($cours_id=null)	
{
		$Cour = ClassRegistry::init('Cour');
		$Cour->recursive=-1;
		$cours = $Cour->find('first',  array('conditions' => array('Cour.id'=>$cours_id), 'fields'=>['Cour.id','titre','weekly_comments']));
		return $cours;
}
/**
 * etudiant_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 public function admin_view($id = null) {
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'));
		}
		$options = array('conditions' => array('Blog.' . $this->Blog->primaryKey => $id));
		$blog=$this->Blog->find('first', $options);
		$this->set('cours', $this->get_cours($blog['Creator']['cours_id']));
		$this->set('blog', $this->Blog->find('first', $options));
	}

	public function etudiant_view($id = null) {
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'));
		}
		$options = array('conditions' => array('Blog.' . $this->Blog->primaryKey => $id));
		$this->set('blog', $this->Blog->find('first', $options));
	}

/**
 * etudiant_add method
 *
 * @return void
 */
	public function etudiant_add() {
		if ($this->request->is('post')) {
//			debug($this->request->data);
//			exit;
			$this->Blog->create();
			if ($this->Blog->save($this->request->data)) {
				$this->Flash->success(__('Le journal est sauvegardé!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Erreur: Impossible de sauvegarder ce journal. Etes-vous toujours loggé?'));
			}
		}
			$this->set('creator', $this->Auth->user('id'));
			$this->set('cours_id', $this->Auth->user('cours_id'));
	}

/**
 * etudiant_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function etudiant_edit($id = null) {
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Blog->save($this->request->data)) {
				$this->Flash->success(__('Le journal est sauvegardé.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Erreur: Impossible de sauvegarder ce journal. Etes-vous toujours loggé?.'));
			}
		} else {
			$options = array('conditions' => array('Blog.' . $this->Blog->primaryKey => $id));
			$this->request->data = $this->Blog->find('first', $options);
		}
	}

/**
 * etudiant_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function etudiant_delete($id = null) {
		$this->Blog->id = $id;
		if (!$this->Blog->exists()) {
			throw new NotFoundException(__('Invalid blog'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Blog->delete()) {
			$this->Flash->success(__('Cette entrée a été effacée.'));
		} else {
			$this->Flash->error(__('Erreur: Cette entrée n\'a pas pu être effacée.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
