<?php
App::uses('AppController', 'Controller');
/**
 * Lessons Controller
 *
 * @property Lesson $Lesson
 * @property PaginatorComponent $Paginator
 */
class LessonsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	var $course_id;

	public function beforeFilter() {   
		
		if($this->action=='toggle_active') return true;
		
		if($this->Auth->user('professor')) {
			$cours = $this->Session->read('Cours');
			$this->course_id = $cours['id'];
			$this->Session->write('Auth.User.cours_id', $this->course_id);
			//$this->Lesson->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		} //else {
			$this->Lesson->Behaviors->attach('LightAuthFiltered', array('match_field'=>'cours_id', 'auth_field'=>'cours_id'));
		//}
		
			parent::beforeFilter();
		 
		}
    
  
/**
 * index method
 *
 * @return void
 */
 
 	public function toggle_active()
{
	$id=$this->request->query['id'];
	$this->Lesson->recursive=-1;
		$lesson = $this->Lesson->find('first', array('conditions'=>['id'=>$id], 'fields'=>['id','active']));
		$active = !($lesson['Lesson']['active']);
		$this->Lesson->id=$id;
		$this->Lesson->saveField('active', $active);
		echo $active ? "checked" : "unchecked";
		//debug($lesson);
		//debug($active);
		exit;
		
}
	
	public function display($id=null, $category=null)
 {
	 	if (!$this->Lesson->exists($id)) {
			throw new NotFoundException(__('Invalid lesson'));
			$this->Session->setFlash('Il faut specifier un cours', 'flash_error');
			$this->redirect('/dashboard');
		}
	
	 $conditions = array(/*'cours_id'=>$this->Auth->user('cours_id'),*/ 'id'=>$id, 'active'=>true);
	 $lessons = $this->Lesson->find('all', array('conditions'=>$conditions, 'fields'=>['id,titre']));
	 return $lessons;
	 
 }
	public function index() {
		$this->layout="quizzes";
		$this->Lesson->recursive = 0;
		$this->Paginator->settings['limit']=200;
		$this->Paginator->settings['order']=array('index'=>'ASC');
		$this->Paginator->settings['conditions']=array('Lesson.active'=>true);
		
		$this->set('lessons', $this->Paginator->paginate());
	}

	public function admin_index() {
		
		$cours = $this->Session->read('Cours');
		if(empty($cours)) {
			$this->Session->setFlash('Il faut specifier un cours', 'flash_error');
			$this->redirect('/dashboard');
		}
		
		$this->Lesson->recursive = 0;
		$this->Paginator->settings['limit']=200;
		$this->Paginator->settings['conditions']=['cours_id'=>$cours['id']];

		$this->Paginator->settings['order']=array('index'=>'ASC');
		$this->set('lessons', $this->Paginator->paginate());
		$this->set('cours', $cours);
	}

	public function admin_summary() {
		
		$cours = $this->Session->read('Cours');
		if(empty($cours)) {
			$this->Session->setFlash('Il faut specifier un cours', 'flash_error');
			$this->redirect('/dashboard');
		}
		
		$this->Lesson->recursive = 0;
		$this->Paginator->settings['limit']=200;
		$this->Paginator->settings['conditions']=['cours_id'=>$cours['id']];

		$this->Paginator->settings['order']=array('index'=>'ASC');
		$this->set('lessons', $this->Paginator->paginate());
		$this->set('cours', $cours);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 	public function load($lesson_id=null) {
		
		
	$this->Lesson->recursive=-1;
	//debug($this->request->query);
	if($lesson_id!=null) {
		$id=$lesson_id;
		$category='synopsis';
	} else {
		$id=$this->request->query('id');
		$category = 'civilisation';
		$category =  $this->request->query['category'];
	}
		if ($this->Lesson->exists($id)) {		
			$lesson = $this->Lesson->find('first', array('conditions'=>['id'=>$id], 'fields'=>['Lesson.id','Lesson.titre', 'jour', $category]));
			$this->set(compact('lesson','category'));
		}
}

	public function view($id = null) {
		
		if (!$this->Lesson->exists($id)) {
			throw new NotFoundException(__('Invalid lesson'));
			$this->Session->setFlash('Il faut specifier un cours', 'flash_error');
			$this->redirect('/');
		}
		
		$this->layout="quizzes";
		$options = array('conditions' => array('Lesson.' . $this->Lesson->primaryKey => $id));
		$this->set('lesson', $this->Lesson->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->Lesson->exists($id)) {
			throw new NotFoundException(__('Invalid lesson'));
		}
		
		$options = array('conditions' => array('Lesson.' . $this->Lesson->primaryKey => $id));
		$this->set('lesson', $this->Lesson->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		$cours = $this->Session->read('Cours');
		if(empty($cours)) {
			die("Une lecon doit appartenir a un cours");
		}
		if ($this->request->is('post')) {
			$this->Lesson->create();
			if ($this->Lesson->save($this->request->data)) {
				$this->Session->setFlash(__('The lesson has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lesson could not be saved. Please, try again.'), 'flash_error');
			}
		}
		$creator = $this->Auth->user('id');
		$this->set(compact('cours', 'creator'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null, $field=null) {
		
		if (!$this->Lesson->exists($id)) {
			throw new NotFoundException(__('Invalid lesson'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Lesson']['titre'] = htmlentities($this->request->data['Lesson']['titre']);
			if ($this->Lesson->save($this->request->data)) {
				$this->Session->setFlash(__('The lesson has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The lesson could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Lesson.' . $this->Lesson->primaryKey => $id));
			$this->request->data = $this->Lesson->find('first', $options);
			$this->request->data['Lesson']['titre'] = html_entity_decode($this->request->data['Lesson']['titre']);
			
			//$this->Session->write('Cours', array('id'=>$id, 'titre'=>$cour['Cour']['titre']));

			$this->Session->write('Cours', 
					array('id'=>$this->request->data['Cours']['id'], 
					'titre'=>$this->request->data['Cours']['titre']));

		}
			$this->set('cours', $this->Lesson->Cours->find('list'));
			$this->set('field', $field);
			
			//$quizzes = array(0=>"Aucun");
			$quizzes = $this->Lesson->Quiz->find('list', array('conditions'=>['cours_id'=>$this->request->data['Cours']['id']]));
			//$slideshows =  array(0=>"Aucun");
			$slideshows = $this->Lesson->Slideshow->find('list', array('conditions'=>['cours_id'=>$this->request->data['Cours']['id']]));
			
			$this->set(compact('quizzes', 'slideshows'));


	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Lesson->id = $id;
		if (!$this->Lesson->exists()) {
			throw new NotFoundException(__('Invalid lesson'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Lesson->delete()) {
			$this->Session->setFlash(__('The lesson has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The lesson could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	function save_order()
{
	$this->request->onlyAllow('ajax');
	$this->layout='ajax';

	//Ajax call from Form View
	$fields = $this->request->data;
	//debug($fields);
	
	foreach($fields as $index=>$field) {
		//echo $index, '=[', $field, ']';
		$this->Lesson->id = $field;
		$this->Lesson->saveField('index', $index);
	}
	//echo "L'ordre des lecons est sauvegarde!";
	exit;	
}

}
