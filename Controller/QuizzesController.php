<?php
App::uses('AppController', 'Controller');
/**
 * Quizzes Controller
 *
 * @property Quiz $Quiz
 * @property PaginatorComponent $Paginator
 */
class QuizzesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	var $types = array('Questions'=>'Questions', 'Pendu'=>'Pendu', 'Words'=>'Mots brouillés');
	
	public function beforeFilter() {    
		
		parent::beforeFilter();

		if($this->action=="add" || $this->action=="edit") $this->params['prefix'] == 'admin';
		if($this->is_admin_interface()) {
			$this->Quiz->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));
		} else {
			$this->Quiz->Behaviors->attach('LightAuthFiltered', array('match_field'=>'cours_id', 'auth_field'=>'cours_id'));
		}

        // Controller specific beforeFilter
    }
    
    public function admin_quizstats($id=null)
{
	if($id==null)$id=143;
	$this->Quiz->recursive=2;
	$this->Quiz->Behaviors->load('Containable');
	$this->Quiz->contain(array( 'Question'=>array('fields'=>['id'], 'Option'=>array('fields'=>['id']))));
		$quizzes = $this->Quiz->find( 'all', array('fields'=>['id','title']));
		//debug($quizzes);
		//$results=array();
		foreach($quizzes as $quiz) {
			echo '<li>', $quiz['Quiz']['title'], '<ul>';
			foreach($quiz['Question'] as $q) {
				echo '<li>Question ', $q['id'], " = ", count($q['Option']), ' options</li>';
				$this->Quiz->Question->id = $q['id'];
				$this->Quiz->Question->saveField('nb_options', count($q['Option']));
			}
			echo "</ul></li>\n";
			
		}
		//debug($quiz);
		exit;
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Quiz->recursive = 0;
		$this->Paginator->settings['order'] = array('Quiz.id'=>'DESC');	
		$this->Paginator->settings['limit'] = 200;
		$this->set('quizzes', $this->Paginator->paginate());
	}

	public function latest()
{
	$this->layout='ajax';
	$quiz = $this->Quiz->find('first', array('order'=>'Quiz.id DESC'));
	$image = $quiz['Quiz']['image'];
	$image_path = DS . 'files' . DS . 'quiz' . DS . 'image' . DS . $quiz['Quiz']['image_dir'] . DS . $image;
	$html=sprintf("<p>%s</p><div class='centered'><a href='/quizzes/view/%d'><img src='%s'></a></div>", $quiz['Quiz']['title'], $quiz['Quiz']['id'], $image_path); 
	echo $html;
	//debug($chanson);ressource
	exit;
}
// --------------- transfer functions using XML
	function admin_exportXML($id=113)
{
	return;
	$this->layout="ajax";
	$this->Quiz->Behaviors->load('Containable');
	$this->Quiz->contain(array('Question'=>array('fields'=>['text'], 'Option'=>array('fields'=>['title','correct_answer']))));

	$quiz = $logs = array('Quizzes' =>$this->Quiz->find("all", array('fields'=>['title','description'], 'conditions'=>['Quiz.id'=>$id])));
	//debug($quiz);
	
	$xmlObject = Xml::fromArray($quiz);//, ['key'=>'value', 'format' => 'tags']);
	$xmlString = $xmlObject->asXML();

	$file = "XMLQuizExport_" . $id . ".xml";
	file_put_contents($file, $xmlString);
	debug($xmlString);
	exit;

}

	public function admin_importXML()
{
	return;
		if ($this->request->is('post')) {
			//debug($this->request->data);
			$tmpfile = $this->request->data['Quiz']['XML']['tmp_name'];
			//debug($tmpfile);
			$xml = Xml::build($tmpfile);
			$xmlArray = Xml::toArray($xml);
			$quiz = $xmlArray['Quizzes']['Quiz'];
			$quiz['type']='Exercice';
			$quiz['creator']=$this->Auth->user('id');
			$quiz['category_id']=1;
			$quiz['difficulty']=2;
			unset( $quiz['id']);
			debug($quiz);
			$this->Quiz->create();
			if (!$this->Quiz->save($quiz)) die("Failed to create quiz!");
			$quiz_id = $this->Quiz->id;
			$questions = $xmlArray['Quizzes']['Question'];
			$index=1;

			foreach($questions as $question) {
				$record = array('text'=>$question['text'], 'quiz_id'=>$quiz_id, 'index'=>$index++);
				debug($record);
				$this->Quiz->Question->create();
				if(!$this->Quiz->Question->save($record)) die("Failed to create question!");
				$question_id=$this->Quiz->Question->id;
				$option_index=1;
				//create question
				foreach($question['Option'] as $option) {
					$option['question_id'] = $question_id;
					$option['index']=$option_index++;
					unset($option['id']);
					debug($option);
					$this->Quiz->Question->Option->create();
					if(!$this->Quiz->Question->Option->save($option)) die("Failed to create option!");
				}
			}
			//debug($questions);
			//exit;
			$this->redirect(array('action'=>'index'));

		}
		
		$this->render("admin_importxml");
		

}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function display()
 {
		$this->layout="quizzes"; 
 }
 
	public function category($category_id=null)
 {
	 $this->Quiz->recursive=0;
	 $this->Quiz->Category->recursive=0;
	 $this->set('category', $this->Quiz->Category->findById($category_id));
	 $this->set('quizzes', $this->Quiz->find('all', array('fields'=>'id,title,difficulty,cours_id', 'conditions'=>['category_id'=>$category_id])));
 }
 
	public function view($id = null, $hide_images=false) {
		
		$this->layout="quizzes";
		if (!$this->Quiz->exists($id)) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		
		$quiz_session = array('quiz_id'=>$id, 'question'=>0, 'points'=>0, 'answers'=>0);
		$this->Session->write('Quiz', $quiz_session );

		$options = array('conditions' => array('Quiz.' . $this->Quiz->primaryKey => $id));
		$quiz = $this->Quiz->find('first', $options);
		//$quiz['Quiz']['show_tips'] = $hide_images;
		$this->set(compact('quiz'));
		$this->set('cours', $this->Session->read('cours'));
		
		
	}
	
	public function admin_startquiz($quiz_id=0, $mode=0)
{
		return $this->startquiz($quiz_id, $mode);
}
//----------------------------------------------------------------------
	public function run($quiz_id, $mode=0)
{
	
		if (!$this->Quiz->exists($quiz_id)) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		$this->layout='quizzes';

		$this->Quiz->recursive=0;
		$options = array('fields'=>'id,title,difficulty,mode,category_id,type', 'conditions' => array('Quiz.' . $this->Quiz->primaryKey => $quiz_id));
		$quiz = $this->Quiz->find('first', $options);

		if(strtolower($quiz['Quiz']['type'])!='questions' ) { // phrases brouilles - ou pendu
			$render = array('Words'=>'scrambled', 'Pendu'=>'pendu');
			$rendering = $render[$quiz['Quiz']['type']];
			//debug($rendering);
			//exit;
			$this->Quiz->Question->recursive=-1;
			$questions = $this->Quiz->Question->find('all', array('conditions'=>['quiz_id'=>$quiz_id], 'order'=>'index'));
			$definitions=array();
			
			foreach($questions as $question) {
				$definition = array( 
				'word'=>$question['Question']['note'], 
				'definition'=>$question['Question']['text'], 
				'image_url'=>$question['Question']['image_url']);
				
				if(!empty($question['Question']['image_dir'])) {
						$path = DS . 'files' . DS . 'question' . DS . 'image' . DS . $question['Question']['image_dir'] . DS . $question['Question']['image'];
						$definition['image_url']=$path;
					}
 
				$definitions[]=$definition;
				
			}		
			$this->set(compact('quiz','definitions'));
			//$this->render('scrambled');
			$this->render($rendering);
			
		} else {
			$questions = $this->Quiz->Question->find('list', array('conditions'=>['quiz_id'=>$quiz_id], 'order'=>'index'));
			$question_ids = json_encode(array_keys($questions));
			$this->set(compact('quiz','question_ids','mode'));
			$this->render('run');
		}
	
}
//----------------------------------------------------------------------
		public function startquiz($quiz_id=0, $mode=0)
{

		if (!$this->Quiz->exists($quiz_id)) {
			throw new NotFoundException(__('Invalid quiz'));
		}

		$action = "view";
		if($mode==0) { $this->Session->write('show_tips', false); }
		if($mode==1) { $this->Session->write('show_tips', true); }
		if($mode==2) { $this->Session->write('show_tips', false); $action ="fillin"; }
			
		$options = array('conditions' => array('Quiz.' . $this->Quiz->primaryKey => $quiz_id));
		$quiz = $this->Quiz->find('first', $options);
		$first_question = $quiz['Question'][0]['id'];
		$this->redirect(array('controller'=>'questions', 'action'=>$action, $first_question));
}
//----------------------------------------------------------------------
/**
 * add method
 *
 * @return void
 */
	public function add() {
		//$this->Session->setFlash(__('Must be run as admin.'), 'flash_error');
		$this->redirect(array('action'=>'add', 'admin'=>true));
		
		if ($this->request->is('post')) {
			$this->Quiz->create();
			$this->request->data['Quiz']['creator'] = $this->Auth->user('id');
			if ($this->Quiz->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz has been saved.', 'flash_normal'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz could not be saved. Please, try again.'), 'flash_error');
			}
		}
		$categories = $this->Quiz->Category->find('list');
		$lessons = $this->Quiz->Lesson->find('list');
		foreach($lessons as $id=>$title) {
			$lessons[$id]=html_entity_decode($title);
		}

		$cours = $this->Quiz->Cours->find('list');

		$this->set(compact('categories','lessons','cours'));
		$this->set('creator', $this->Auth->user('id'));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		$this->redirect(array('action'=>'add', 'admin'=>true));

		$this->Session->setFlash(__('Must be run as admin.'), 'flash_error');
		$this->redirect($this->referer());
	
		if (!$this->Quiz->exists($id)) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Quiz->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz has been saved.'),'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Quiz.' . $this->Quiz->primaryKey => $id));
			$this->request->data = $this->Quiz->find('first', $options);
		}
		$categories = $this->Quiz->Category->find('list');
		$lessons = $this->Quiz->Lesson->find('list');
		foreach($lessons as $id=>$title) {
			$lessons[$id]=html_entity_decode($title);
		}
		$this->set(compact('categories','lessons'));
		$this->set('creator', $this->Auth->user('id'));

	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Quiz->id = $id;
		if (!$this->Quiz->exists()) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Quiz->delete()) {
			$this->Session->setFlash(__('The quiz has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The quiz could not be deleted. Please, try again.'),'flash_error'); 
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
 
public function admin_reset_type()
{
		$this->Quiz->recursive = 0;
		$quizzes = $this->Quiz->find('list', array('fields'=>'id,type'));
		foreach($quizzes as $id=>$type) {
			echo '<li>', $type, '</li>';
			//$this->Quiz->id = $id;
			//$this->Quiz->saveField('type', 'questions');
		}
		//debug($quizzes);
		exit;

}
	public function admin_index($cours_id=null) {
		$this->Quiz->recursive = 0;
		$this->Paginator->settings['order'] = array('Quiz.id'=>'DESC');	
		$this->Paginator->settings['limit'] = 200;
		if($cours_id) $this->Paginator->settings['conditions']=['cours_id'=>$cours_id];
		$this->set('quizzes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		//$this->layout="quizzes";
		if (!$this->Quiz->exists($id)) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		$this->Quiz->contain(array( 'Category', 'Question'=>array('Response'), 'Cours'));
		$options = array('conditions' => array('Quiz.' . $this->Quiz->primaryKey => $id));
		$this->set('quiz', $this->Quiz->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		
		if ($this->request->is('post')) {
			$this->Quiz->create();
			if ($this->Quiz->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz could not be saved. Please, try again.'), 'flash_error');
			}
		}

		$categories = $this->Quiz->Category->find('list');
		$this->set(compact('categories'));
		$this->set('creator', $this->Auth->user('id'));
		
		$cours = $this->Quiz->Cours->find('list');
		$this->set(compact('cours'));
		$this->set('types', $this->types);

	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Quiz->exists($id)) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Quiz->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz has been saved.'),'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Quiz.' . $this->Quiz->primaryKey => $id));
			$this->request->data = $this->Quiz->find('first', $options);
		}
		
		$categories = $this->Quiz->Category->find('list');
		$this->set('creator', $this->Auth->user('id'));
		
		//$lessons = $this->Quiz->Lesson->find('list');
		$cours = $this->Quiz->Cours->find('list');
		
		/*
		foreach($lessons as $id=>$title) {
			$lessons[$id]=html_entity_decode($title);
		}*/

		$this->set(compact('categories',  'cours'));
		$this->set('types', $this->types);
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Quiz->id = $id;
		if (!$this->Quiz->exists()) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Quiz->delete()) {
			$this->Session->setFlash(__('The quiz has been deleted.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('The quiz could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
