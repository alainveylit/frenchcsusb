<?php
App::uses('AppController', 'Controller');
/**
 * Documents Controller
 *
 * @property Document $Document
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DocumentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $allowed_types = array('pdf','doc','docx', 'odt', 'png', 'jpg', 'gif', 'txt', 'pptx');
	//public $font_allowed_types = array('ttf','doc','docx', 'odt', 'png', 'jpg', 'gif', 'txt');
	public $categories=array("Syllabus"=>"Syllabus", "Test"=>"Test", "Quiz"=>"Quiz", "Information"=>"Information", "Presentation"=>"Presentation", "Activité"=>"Activité", "Other"=>"Other");


	function beforeFilter() 
{
	
		parent::beforeFilter();

		if($this->prefix=='admin') {
			$this->Document->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));	
		}
		
		if($this->action=="preview" || $this->action=="showcase") {
			$this->Auth->Authorize = 'Controller';
			return true;
		}
	
		
	
		$this->Auth->userScope = array('User.active' => true);
		if( !$this->Session->check('Auth.User') || !$this->Auth->user('active') )
	{
		 $this->redirect('/');
	}

		$this->Auth->Authorize = 'Controller';
		
     if (isset($this->Security) && in_array($this->action, array('add_document'))) {
		$this->Security->validatePost = false;
		$this->Security->csrfCheck = false;
	}
	
}
/**
 * index method
 *
 * @return void
 */
 	public function details($id=null)
 {
	$this->layout='ajax';

		$this->Document->Behaviors->attach('Containable');
		$this->Document->contain(array('Creator', 'Comment'=>array('Creator')));	

		 if (!$this->Document->exists($id)) {
			echo 0;
			exit;
		}
		$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id/*, 'extension'=>'pdf'*/));
		$document = $this->Document->find('first', $options);
		//debug($document);
		//exit;
		$this->set(compact('document'));
 }

	public function showcase()
 {
	 $this->Paginator->settings['conditions']=array('showcase'=>true);
	 $this->Paginator->settings['order'] = 'Document.id DESC';
	 $this->set('documents', $this->Paginator->paginate());
	 
 }
  	public function admin_preview($id=null)
 {
	// debug($id);
	// exit;
	 	if (!$this->Document->exists($id)) {
			throw new NotFoundException(__('Invalid document'));
		}

		$this->Document->Behaviors->attach('Containable');
		$this->Document->contain(array('Creator', 'Comment'=>array('Creator')));
		
		$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
		$this->set('document', $this->Document->find('first', $options));
		$this->render('view');

	 
 }

	public function preview($id=null)
 {
	// debug($id);
	// exit;
	 	if (!$this->Document->exists($id)) {
			throw new NotFoundException(__('Invalid document'));
		}

		$this->Document->Behaviors->attach('Containable');
		$this->Document->contain(array('Creator', 'Comment'=>array('Creator')));
		
		$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
		$this->set('document', $this->Document->find('first', $options));
		$this->render('view');

	 
 }
 
	public function admin_index($cours_id=null) {
		if(!$this->is_administrator()) exit;
		//$this->Document->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));	

		$this->Paginator->settings['order']=array('created'=>'DESC');
		if($cours_id) $this->Paginator->settings['conditions']=['Document.cours_id'=>$cours_id];
		$this->set('documents', $this->Paginator->paginate());
		//$this->render('index');
	}
	
	/*	
		public function admin_index() {		
		$this->Document->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));	
		$this->Document->recursive = 0;
		$this->Paginator->settings['order']=array('created'=>'DESC');
		$this->Paginator->settings['limit']=100;

		$this->set('documents', $this->Paginator->paginate());
		$this->render('index');
	}*/

 
	public function index() {
		
		$this->Document->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));	
		$this->Document->recursive = 0;
		$this->Paginator->settings['order']=array('created'=>'DESC');
		$this->Paginator->settings['limit']=100;

		$this->set('documents', $this->Paginator->paginate());
		$this->render('index');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		
		if (!$this->Document->exists($id)) {
			throw new NotFoundException(__('Invalid document'));
		}

		$this->Document->Behaviors->attach('Containable');
		$this->Document->contain(array('Creator', 'Comment'=>array('Creator')));
		
		$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
		$this->set('document', $this->Document->find('first', $options));
		$this->render('view');
	}
	public function admin_view($id = null) {
		
		if (!$this->Document->exists($id)) {
			throw new NotFoundException(__('Invalid document'));
		}

		$this->Document->Behaviors->attach('Containable');
		$this->Document->contain(array('Creator', 'Comment'=>array('Creator')));
		
		$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
		$this->set('document', $this->Document->find('first', $options));
		//$this->render('view');
	}


	public function download($id = null) {
		
		if (!$this->Document->exists($id)) {
			throw new NotFoundException(__('Invalid document'));
		}

		$this->layout = 'download';
		$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
		$this->set('document', $this->Document->find('first', $options));
}

public function isAuthorized() {
	
	//debug($this->action);
	//exit;

	return true;
}
/**
 * add method
 *
 * @return void
 */
 //---------------------------------------------------------------------
 /* Add document to project */
	public function admin_add($project_id=null) {


		if ($this->request->is('post')) {
			
			preg_match("/.(\w+)$/", $this->request->data['Document']['document']['name'], $extension);
			
			// Erreur
			if(!in_array($extension[1], $this->allowed_types)) {
					$this->Session->setFlash(__('Not an allowed document type.'), 'flash_error');	
					$this->set('allowed_types', $this->allowed_types);
					$this->set('categories', $this->categories);
				return;
			}
			
			$this->request->data['Document']['extension']=$extension[1];			
			$this->request->data['Document']['creator']=$this->Auth->user('id');
			
			if( ($this->request->data['Document']['document']['type'] == 'application/x-download') && 
					($this->request->data['Document']['extension'])=='pdf' ) {
						$this->request->data['Document']['document']['type'] = 'application/pdf';
				}
			
			//debug($this->request->data);
			//exit;
			
			$this->Document->create();
				if ($this->Document->save($this->request->data)) {
					$this->Session->setFlash(__('The document has been saved.'), 'flash_normal');
					if(!empty($this->request->data['Document']['foreign_key'])) {
							return $this->redirect(array('controller'=>'projects', 'action' => 'view', $this->request->data['Document']['foreign_key']));
						} else {
							return $this->redirect(array('action'=>'index'));
						}
				} else {
					$this->Session->setFlash(__('The document could not be saved. Please, try again.'), 'flash_error');
					return;
				}
			}
			
			if($project_id!=null) {
					$this->Document->Project->recursive=-1;
					$project = $this->Document->Project->find('first', 
						array('conditions'=>['Project.id'=>$project_id], 'fields'=>['id','title']));
					if(empty($project)) {
						throw new NotFoundException(__('Project does not exist'));
					}
				
				$this->request->data['Document']['model']='Project';
				$this->request->data['Document']['foreign_key']=$project_id;
				$this->set('project', $project);
			}
			
			$this->set('cours', $this->Document->Cours->find('list', 
				array('fields'=>['id','titre'], 'conditions'=>array('professeur_id'=>$this->Auth->user('professeur_id')))));
		
			$this->set('allowed_types', $this->allowed_types);
			$this->set('categories', $this->categories);
	}
//----------------------------------------------------------------------	
	public function add_document() {

		$this->layout='ajax';
		//$this->autoRender=false; 

		if ($this->request->is('post') ) {
			//debug($this->request->data);		
			//exit;

			//$subtype = $this->request->data['Document']['subtype']; // attachment
			//preg_match("/.(\w+)$/", $this->request->data['Document'][$subtype]['name'], $extension);
			preg_match("/.(\w+)$/", $this->request->data['Document']['document']['name'], $extension);
			//$allowed_types = $this->allowed_types; 
			
			if(!in_array(strtolower($extension[1]), $this->allowed_types)) {
				$this->Session->setFlash(__('Not an allowed document type.'), 'flash_error');	
				$this->set('allowed_types', $this->allowed_types);
				return;
			}
			
			$this->request->data['Document']['extension']=strtolower($extension[1]);			
			$this->request->data['Document']['creator']=$this->Auth->user('id');
			//debug($this->request->data);		
			//exit;

			$this->Document->create();
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash(__('The document has been saved.'), 'flash_normal');				
				$controller = $this->get_controller_name($this->request->data['Document']['model']);
				return $this->redirect(array('controller'=>$controller, 'action' => 'view', $this->request->data['Document']['foreign_key']));
			} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.'), 'flash_error');
			}
		}
		
		$this->set('allowed_types', $this->allowed_types);
		if(!empty($this->request->data)) {
			$this->set('model', $this->request->data['model']);
			$this->set('foreign_key', $this->request->data['id']);

			
		} else {
			$this->set('model', $this->request->pass[0]);
			$this->set('foreign_key', $this->request->pass[1]);
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
		
		//$this->Document->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));

		if (!$this->Document->exists($id)) {
			throw new NotFoundException(__('Invalid document'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash(__('The document has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
			$this->request->data = $this->Document->find('first', $options);
		}
		
		$this->set('cours', $this->Document->Cours->find('list', 
				array('fields'=>['id','titre'], 'conditions'=>array('professeur_id'=>$this->Auth->user('professeur_id')))));
		//$this->render('edit');
		$this->set('categories', $this->categories);

	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		
		$this->Document->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));

		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid document'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Document->delete()) {
			$this->Session->setFlash(__('The document has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The document could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}
