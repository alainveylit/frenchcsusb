<?php
App::uses('AppController', 'Controller');
/**
 * Presentations Controller
 *
 * @property Presentation $Presentation
 * @property PaginatorComponent $Paginator
 */
class PresentationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $media = array('PDF'=>'PDF', 'PowerPoint'=>'PowerPoint', 'Document'=>'MS office doc', 'Image'=>'Image', 'Video'=>'Video', 'HTML'=>'HTML');
	public $focuses = array(/*'All'=>'',*/ 'Composition'=>'Composition', 'Geographie'=>'Geographie', 'Civilisation'=>'Civilisation', 'Histoire'=>'Histoire', 'Debat'=>'Debats');
	public $statuses = array('Draft'=>'Draft', 'Reviewed'=>'Reviewed', 'Corrected'=>'Corrected', 'Published'=>'Published');

	public function beforeFilter() {   
		
		//debug($this->Auth->user());
		//die("before filter");

		$cours_id = $this->Auth->user('cours_id');
		
		$cours = $this->Session->read('Cours');
		//debug($cours['titre']);
					 
		
		if($this->Auth->user('professor')==true) {
			$cours = $this->Session->read('Cours');
			$this->course_id = $cours['id'];
			$this->Session->write('Auth.User.cours_id', $this->course_id);
			$this->Presentation->Behaviors->attach('LightAuthFiltered', array('match_field'=>'cours_id', 'auth_field'=>'cours_id'));
		} else {
			$this->Presentation->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
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
  public function import()
 {
	$this->Presentation->Ressource->recursive=-1;
	$presentations = $this->Presentation->Ressource->find('all', array('conditions'=>['medium'=>'powerpoint'])); 
	//debug($presentations);
	foreach($presentations as $presentation) {
		//debug($presentation);
		$this->Presentation->create();
		if(!$this->Presentation->save($presentation['Ressource'])) {
			die("Unable to save record");
		}
		//$this->Presentation->Ressource->delete($presentation['Ressource']['id']);
			
	}
	exit;
	 
 }
 
	public function etudiant_index($focus=null) {
		
		$this->layout="quizzes";
	
		$this->Presentation->recursive = 0;
		$this->Paginator->settings['limit']=100;
		$this->Paginator->settings['order']=['Presentation.id'=>'DESC'];
		
		$foci = $this->Presentation->find('all', array('fields'=>'DISTINCT focus'));
		$results = Hash::extract($foci, '{n}.Presentation.focus');
		//$media = $this->Presentation->find('all', array('fields'=>'DISTINCT medium'));
		
		//if(!empty($focus)) {
			//$this->Paginator->settings['conditions']= array('focus'=>$focus);
		//}
	
		$this->set('foci', $results);
		$this->set('focuses', $this->focuses);
		$this->set('media', $this->media);
		
		$cours = $this->Session->read('Cours');
		$this->set('cours', $cours);
		//$this->set('presentations', $this->Paginator->paginate());
		//$this->set('documents', $this->Presentation->find('list'));
		//$this->render('tiled');
	}

	public function etudiant_display() {
		
		$this->layout="ajax";
		$focus = $this->request->params['pass'][0]; //('focus');
		//debug($this->request->params);
		//debug($focus);
		//exit;
		$this->Presentation->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));

		$this->Presentation->recursive = 0;
		$this->Paginator->settings['conditions']= array('focus'=>$focus);
		$this->Paginator->settings['fields']=array('id','titre','medium','public','creator');
		$this->Paginator->settings['limit'] = 100;
		$this->set('presentations', $this->Paginator->paginate());
		$this->set(compact('focus'));
		
		$cours = $this->Session->read('Cours');
		$this->set('cours', $cours);

		//$this->render('tiled');
	}
	

	public function display() {
		
		$this->layout="ajax";
		$focus = $this->request->params['pass'][0]; //('focus');
		//debug($this->request->params);
		//debug($focus);
		//exit;
		$this->Presentation->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));

		$this->Presentation->recursive = 0;
		$this->Paginator->settings['conditions']= array('focus'=>$focus);
		$this->Paginator->settings['fields']=array('id','titre','medium','public','creator');
		$this->Paginator->settings['limit'] = 100;
		$this->set('presentations', $this->Paginator->paginate());
		$this->set(compact('focus'));
		//$this->render('tiled');
	}
	
	public function tiled($focus=null) {
		
		if($this->request->is('ajax')) {
			$this->layout="ajax";
			$focus = $this->request->query('focus');
		} else {
			$this->layout="quizzes";
		}
		
		$this->Presentation->recursive = 0;
		$this->Paginator->settings['limit']=100;
		$this->Paginator->settings['order']=['Presentation.id'=>'ASC'];
		if($focus!=null) {
			$this->Paginator->settings['conditions']= array('focus'=>$focus);
		}
		$this->set('presentations', $this->Paginator->paginate());
	}
	

	public function admin_index() {
		
		$cours = $this->Session->read('Cours');
		if(empty($cours)) {
			$this->Session->setFlash('Il faut specifier un cours', 'flash_error');
			$this->redirect('/dashboard');
		}

		$this->Presentation->recursive = 1;
		$this->Paginator->settings['conditions']=['Presentation.cours_id'=>$cours['id']];
		$this->Paginator->settings['limit']=100;
		$this->Paginator->settings['order']=['Presentation.id'=>'DESC'];

		$this->set('presentations', $this->Paginator->paginate());
		$this->set('cours', $cours);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		$options = array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id));
		$this->set('presentation', $this->Presentation->find('first', $options));
	}
	
	public function etudiant_view($id = null) {
		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		$options = array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id));
		$this->set('presentation', $this->Presentation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 	public function admin_add() {
		
		$cours = $this->Session->read('Cours');
		//debug($cours);

		if ($this->request->is('post')) {
			//debug($this->request->data);
			//exit;
			$this->Presentation->create();
			if ($this->Presentation->save($this->request->data)) {
				$this->Session->setFlash(__('The presentation has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The presentation could not be saved. Please, try again.'), 'flash_error');
			}
		}

			$this->set('media', $this->media);
			$this->set('focuses', $this->focuses);

			$students = $this->Presentation->Cours->Etudiant->find('list', 
					array('fields'=>['user_id','nom'], 'conditions'=>['cours_id'=>$cours['id']]));

			$this->set('cours_id', $this->Auth->user('cours_id'));

			$this->set(compact('cours', 'students'));
			
			$this->request->data['Presentation']['cours_id']=$cours['id'];

	}
 
	public function etudiant_add() {
		
		$cours = $this->Session->read('Cours');

		if ($this->request->is('post')) {
			
			//$this->request->data['Presentation']['creator']=$this->Auth->user('id');

			$this->Presentation->create();
			if ($this->Presentation->save($this->request->data)) {
				$this->Session->setFlash(__('The presentation has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The presentation could not be saved. Please, try again.'), 'flash_error');
			}
		}
			
			$this->set('media', $this->media);
			$this->set('focuses', $this->focuses);

			$this->set('creator', $this->Auth->user('id'));
			$this->set('cours_id', $cours['id']);

			$this->set(compact('cours'));
			
			$this->request->data['Presentation']['cours_id']=$cours['id'];
			//$this->set('cours', $cours);

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 public function admin_loadtext($id = null) {
		
		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Presentation->save($this->request->data)) {
				$this->Session->setFlash(__('The presentation has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'edit', $this->request->data['Presentation']['id'], 'admin'=>true));
			} else {
				$this->Session->setFlash(__('The presentation could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id));
			$this->request->data = $this->Presentation->find('first', $options);
		}
		
	}
	
 	public function admin_edit($id = null) {
		
		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Presentation->save($this->request->data)) {
				$this->Session->setFlash(__('The presentation has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index', 'admin'=>true));
			} else {
				$this->Session->setFlash(__('The presentation could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$this->set('statuses', $this->statuses);
			$options = array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id));
			$this->request->data = $this->Presentation->find('first', $options);
		}
		
	}
		
	public function etudiant_edit($id = null) {
		
		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		
		$cours = $this->Session->read('Cours');

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Presentation->save($this->request->data)) {
				//$this->request->data['Presentation']['cours_id'] = $this->Auth->user('cours_id');
				//debug($this->request->data);
				//exit;
				$this->Session->setFlash(__('The presentation has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The presentation could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id));
			$this->request->data = $this->Presentation->find('first', $options);
		}
		
		//debug($this->Auth->user());
		//exit;
			
		$this->set(compact('cours'));
		$this->set('cours_id', $this->Auth->user('cours_id'));
		
		$this->set('media', $this->media);
		$this->set('focuses', $this->focuses);
		$this->set('statuses', $this->statuses);


	}

	public function latest()
{
	$this->layout='ajax';
	$presentation = $this->Presentation->find('first', array('order'=>'Presentation.id DESC'));
	$image = $presentation['Presentation']['image'];
	$image_path = DS . 'files' . DS . 'presentation' . DS . 'image' . DS . $presentation['Presentation']['image_dir'] . DS . $image;
	$html=sprintf("<p>%s</p><div class='centered'><a href='/presentations/view/%d'><img src='%s'></a></div>", $presentation['Presentation']['titre'], $presentation['Presentation']['id'], $image_path); 
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
		$this->Presentation->id = $id;
		if (!$this->Presentation->exists()) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Presentation->delete()) {
			$this->Session->setFlash(__('The presentation has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The presentation could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function etudiant_delete($id = null) {
		
		$this->Presentation->id = $id;
		if (!$this->Presentation->exists()) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Presentation->delete()) {
			$this->Session->setFlash(__('The presentation has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The presentation could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

}
