<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	function beforeFilter() 
{
		parent::beforeFilter();
/*
		if($this->action=="index" || $this->action=="edit") {
			$this->Auth->Authorize = 'Controller';
			//debug($this->controller);
			return true;
		}
	*/
}

public function isAuthorized() {
	return true;
	//debug($this->action);
	//exit;
	//if($this->is_administrator()) 	return true;
	//return false;
}
/**
 * index method
 *
 * @return void
 */
 
	public function admin_next($id, $action="view", $show_tips=false) {
		return $this->next($id, $action,  $show_tips);
	}
	
	
	public function next($id, $action="view", $show_tips=false) {
	// deprecated	
		$this->Question->recursive = 0;
		$question = $this->Question->read(null, $id);
		$next_index = $question['Question']['index'] + 1;
		$next = $this->Question->find("list", 
				array("conditions"=>array("quiz_id"=>$question['Question']['quiz_id'], "index"=>$next_index)));
		
		if(count($next)) {
			reset($next);
			$first_key = key($next);
			$this->redirect(array("action"=>$action, $first_key, $show_tips));
		} else {
			$this->Session->setFlash(__('Fin du test!'), "flash_normal");
			$this->redirect(array( 'action'=>'fin', $question['Question']['quiz_id'] ));
		}
	}

	public function admin_fin($quiz_id)
	{
		$this->redirect( array('controller'=>'quizzes', 'action'=>'view', $quiz_id));
	}
	

	public function fin($quiz_id)
{
	/*
	$score = $this->Session->read('Quiz');
	
	if(!empty($score) && isset($score['quiz_id'])) { 
		$score['questions'] = $this->Question->find('count',  array('conditions'=>array('Quiz.id'=>$quiz_id)));
		$score['bad_answers'] = abs($score['points']-$score['questions']); 
		$score['score'] = 100 - (($score['bad_answers']/$score['questions'])*100);
		$score['user_id'] = $this->Auth->user('id');
		$this->Question->Quiz->QuizInstance->create();
		$this->Question->Quiz->QuizInstance->save($score);
	}
		$quiz = $this->Question->Quiz->find('list', array('conditions'=>array('id'=>$quiz_id)));
		$this->set(compact('quiz', 'score'));
		* */
		$this->Session->write('Quiz', []);
}

	public function index($quiz_id=null) {
		
		$this->Question->recursive = 1;
		$conditions=array();
			if($quiz_id!=null) {
				$conditions=array('quiz_id'=>$quiz_id);
				$this->set('quiz', $this->Question->Quiz->find('list', array('conditions'=>array('id'=>$quiz_id))));
			}
		$this->Paginator->settings['limit']=200;
		$this->Paginator->settings['conditions']=$conditions;
		$this->set('questions', $this->Paginator->paginate($conditions));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function load($question_index=0)
 {
	 	if (!$this->Question->exists($question_index)) {
			throw new NotFoundException(__('Invalid question'));
		}

	 $question = $this->Question->find( 'first', array('conditions'=>array('Question.id'=>$question_index)));
	 $this->set(compact('question'));
 }
 
	public function view($id = null) {
		
		$this->layout = "quizzes";
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}

		$show_tips =  $this->Session->read('show_tips');
		$this->Session->write('Quiz.question', $id);
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
		$this->set(compact('show_tips'));
	}

	public function admin_fillin($id = null) {
		
		$this->layout = "quizzes";
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		
		$this->Session->write('Quiz.question', $id);
		$this->set('show_tips', false);

		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

	
	public function fillin($id = null) {
		// deprecated
		$this->layout = "quizzes";
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		
		$this->Session->write('Quiz.question', $id);

		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add($quiz_id=null) {
		
		
		if ($this->request->is('post')) {
			//debug($this->request->data);
			//exit;
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				if($this->request->data['Quiz']['type']=='Questions') {
					$option = array('question_id'=>$this->Question->id,
								'quiz_id'=>$this->request->data['Question']['quiz_id'],
								'title'=>$this->request->data['Question']['Option_1'],
								'correct_answer'=>$this->request->data['Question']['Option_1_correct'],
								'index'=>1);
					$this->Question->Option->create();
					$this->Question->Option->save($option);
					
					$option['title'] = $this->request->data['Question']['Option_2'];
					$option['correct_answer'] = $this->request->data['Question']['Option_2_correct'];
					$this->Question->Option->create();
					$this->Question->Option->save($option);

					$option['title'] = $this->request->data['Question']['Option_3'];
					$option['correct_answer'] = $this->request->data['Question']['Option_3_correct'];
					$this->Question->Option->create();
					$this->Question->Option->save($option);
				}

				$this->Session->setFlash(__('The question has been saved.', 'flash_normal'));
				return $this->redirect(array('action' => 'index', $this->request->data['Question']['quiz_id']));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
		
			if(!$quiz_id) {
				throw new NotFoundException(__('Invalid question: no quiz given'));
			}
			
			$index = $this->Question->find('count', array('conditions'=>array('quiz_id'=>$quiz_id)));
			$index++;
			$this->Question->Quiz->recursive=-1;
			$quiz = $this->Question->Quiz->find('first', array('fields'=>['id','type','title'], 'conditions'=>array('Quiz.id'=>$quiz_id)));		
			//$quiz_title = reset($quiz);
			$this->set(compact('quiz_id', 'index', 'quiz'));
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
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index', $this->request->data['Question']['quiz_id']));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->request->data = $this->Question->find('first', $options);
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
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('The question has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The question could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($quiz_id=null) {
		//$this->Question->recursive = 0;
		//$this->set('questions', $this->Paginator->paginate());
		return $this->index($quiz_id);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
		
		$show_tips =  $this->Session->read('show_tips');
		$this->set(compact('show_tips'));

	}


	public function admin_delete($id = null) {
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('The question has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The question could not be deleted. Please, try again.'), 'flash_error');
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
		$this->Question->id = $field;
		$this->Question->saveField('index', $index);
	}
	//echo "L'ordre des lecons est sauvegarde!";
	exit;	
}
}
