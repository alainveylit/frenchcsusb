<?php
App::uses('AppController', 'Controller');
/**
 * Options Controller
 *
 * @property Option $Option
 * @property PaginatorComponent $Paginator
 */
class OptionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	function beforeFilter() 
{
	//debug($this->Auth->user());
	//exit;
		//$this->Auth->userScope = array('User.active' => true);
		if( !$this->Session->check('Auth.User') || !$this->Auth->user('active') )
	{
		 debug($this->Auth->user());
		 //$this->redirect('/');
	}

		$this->Auth->Authorize = 'Controller';
		parent::beforeFilter();
		
     if (isset($this->Security) && in_array($this->action, array('check','edit_title','add_option', 'admin_edit_option', 'check_fillin'))) {
       $this->Security->validatePost = false;
       $this->Security->csrfCheck = false;
       $this->Security->unlockActions = ('add_option');
	   $this->request->allowMethod('post');

   }
}
	public function isAuthorized() {
	
	//debug($this->action);
	return true;
}
	public function edit_title($id)
{
		$this->layout="ajax";
	
         if(empty($this->request->data)) {
                if($id==null) die("no id given");
                $this->request->data =  $this->Option->read(array('id','title','index','correct_answer'), $id);
				//$this->request->data['Option']['title'] = html_entity_decode($this->request->data['Facimage']['title'] );
        } else {
					$this->Option->save($this->request->data);
					/*
					$this->Option->id = $this->request->data['Option']['id'];
					$title = $this->request->data['Option']['title'];
					$correct = $this->request->data['Option']['correct_answer'];
					$this->Option->saveField('title', $title);
					$this->Option->saveField('correct_answer', $correct);
					* */

              $this->render(false);
              echo "Record updated successfully";
              exit;
        }

	
	
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Option->recursive = 0;
		$this->set('options', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Option->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		$options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
		$this->set('option', $this->Option->find('first', $options));
	}

	function check()
{
	$this->Option->recursive=-1;
	$id = $this->request->data['id'];
	$option = $this->Option->read(null, $id);
	
	$points = $this->Session->read('Quiz.points');
	$answers = $this->Session->read('Quiz.answers')+1;
	$this->Session->write('Quiz.answers', $answers);
	
	$points += ($option['Option']['correct_answer']) ? 1 : -1;
	$this->Session->write('Quiz.points', $points);
	
	echo ($option['Option']['correct_answer']) ? 1 : 0;
	//debug($option);
	exit;
}

	public function session_answer($correct)
{
	$points = $this->Session->read('Quiz.points');
	$answers = $this->Session->read('Quiz.answers')+1;
	$this->Session->write('Quiz.answers', $answers);
	$points += ($correct) ? 1 : -1; 
	$this->Session->write('Quiz.points', $points);

	
}
	
	public function check_fillin()
{
	$this->layout='ajax';
	$this->Option->recursive=-1;
	//debug($this->request->data);
	$question_id = $this->request->data['QuestionId'];
	$answer = trim($this->request->data['QuestionNote']);
	$option = $this->Option->find('first', array('conditions'=>array('question_id'=>$question_id, 'correct_answer'=>true)));
	//debug($option);
	$good_option = trim($option['Option']['title']);
	$correct = (strtolower($good_option)==strtolower($answer)) ? true : false;
	$this->session_answer($correct);
	
	echo ($correct) ? 'Réponse correcte' : 'Erreur: Réessayez!'; 
	
	
	exit;
}

	public function answer($question_id)
{	
	$option = $this->Option->find('first', array('conditions'=>array('question_id'=>$question_id, 'correct_answer'=>true)));
	$this->set('answer', $option);
}
/**
 * add method
 *
 * @return void
 */
 	public function add_option($question_id=null) 
 {
	    if($this->request->is('ajax') && isset($this->request->data['question_id'])) {
			$this->layout="ajax";
			 $question_id = $this->request->data['question_id'];
             $this->request->data['creator'] =  $this->Auth->user('id');
             $this->request->data['index'] = $this->Option->find('count', array('conditions'=>array('question_id'=>$question_id)))+1;
            return;
	       } 
		
		if ($this->request->is('post')) {
			$this->Option->create();
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.', 'flash_normal'));
				$question_id = $this->request->data['Option']['question_id'];
				return $this->redirect(array('controller'=>'questions', 'action' => 'view', $question_id));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'), 'flash_error');
			}
		}
 }
	
	 public function admin_edit_option($question_id=null) 
 {
	 // Called from questions admin_view
	    if($this->request->is('ajax') ) {
				 $this->Option->recursive=-1;
				 $this->layout="ajax";
				 $option_id = $this->request->data['option_id'];
				 $this->request->data['creator'] =  $this->Auth->user('id');
				 $this->request->data = $this->Option->find('first', array('conditions'=>array('Option.id'=>$option_id)));
              return;
	       } 
		
		if ($this->request->is('post')) {
			//debug($this->request->data);
			die("Not supposed to be there");
		} 
}
	
	public function add() {
		
  
		if ($this->request->is('post')) {
			//debug($this->request->data);
			//exit;
			$this->Option->create();
			if ($this->Option->save($this->request->data)) {
				$question_id = $this->request->data['Option']['question_id'];
				$this->Session->setFlash(__('The option has been saved.'), 'flash_normal');
				return $this->redirect(array('controller'=>'questions', 'action' => 'edit', 'admin'=>true, $question_id));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'), 'flash_error');
			}
		}
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Option->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.'));
				return $this->redirect(array('controller'=>'questions', 'action' => 'view', $this->request->data['Option']['question_id']));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'), 'flash_normal');
			}
		} else {
			$options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
			$this->request->data = $this->Option->find('first', $options);
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
		die("Delete can only be an admin function");
		$this->Option->id = $id;
		if (!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Option->delete()) {
			$this->Session->setFlash(__('The option has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The option could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Option->recursive = 0;
		$this->set('options', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Option->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		$options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
		$this->set('option', $this->Option->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Option->create();
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'), 'flash_error');
			}
		}
		$quizzes = $this->Option->Quiz->find('list');
		$questions = $this->Option->Question->find('list');
		$this->set(compact('quizzes', 'questions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		if (!$this->Option->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Option->save($this->request->data)) {
				$this->Session->setFlash(__('The option has been saved.'), 'flash_normal');
				return $this->redirect(array('controller'=>'questions', 'admin'=>true, 'action' => 'view', $this->request->data['Option']['question_id']));
			} else {
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
			$this->request->data = $this->Option->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$referer = $this->referer();

		$this->Option->id = $id;
		if (!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Option->delete()) {
			$this->Session->setFlash(__('The option has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The option could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect($referer);
	}
}
