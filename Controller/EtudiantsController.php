<?php
App::uses('AppController', 'Controller');
/**
 * Etudiants Controller
 *
 * @property Etudiant $Etudiant
 * @property PaginatorComponent $Paginator
 */
class EtudiantsController extends AppController {


 	public function admin_toggle_active()
{
	$this->layout='ajax';
	$id=$this->request->query['id'];
	$this->Etudiant->recursive=-1;
		$etudiant = $this->Etudiant->find('first', array('conditions'=>['id'=>$id], 'fields'=>['id','enrolled']));
		$active = !($etudiant['Etudiant']['enrolled']);
		$this->Etudiant->id=$id;
		$this->Etudiant->saveField('enrolled', $active);
		echo $active ? "checked" : "unchecked";
		exit;
		
}

		public function admin_courriel($id=null)
{
		//if(!$id) { $id = 1; } // Contact admin
	
		if (!$this->Etudiant->exists($id)) {
			throw new NotFoundException(__('Invalid student record'));
		}

		if ($this->request->is(array('post', 'put'))) {
			// mail it...
			//debug($this->request->data);

			//$this->Profile->Behaviors->attach('Containable');
			//$this->Profile->contain(array('User'));
			$to = $this->Etudiant->findById($this->request->data['Etudiant']['id']);
				
				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('html');
				$Email->template('contact');
				$Email->to($to['Etudiant']['courriel']);
				$Email->cc('prof@french-csusb.org');
				$Email->from($this->Auth->user('email'), $this->Auth->user('name'));
				$Email->subject('Message personnel de la classe Français III');
				$Email->viewVars(array('message' => $this->request->data['From']['message']));


			if ($Email->send()) {
				$this->Session->setFlash(__('Your email has been sent.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your email could not be sent. Please, check with the administrator.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Etudiant.' . $this->Etudiant->primaryKey => $id));
			$this->request->data = $this->Etudiant->find('first', $options);
			$this->set('Sender', $this->Auth->user());
		}


}	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	function beforeFilter() 
{
			if($this->action=='toggle_active') return true;

		if($this->is_admin_interface()) {
			$this->Etudiant->Cour->Behaviors->attach('LightAuthFiltered',  
				array('auth_field'=>'professeur_id', 'match_field'=>'professeur_id', 'enrolled'=>true));
		}
		
		parent::beforeFilter();

}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$cours = $this->Session->read('Cours');
		if(empty($cours)) {
			$this->Session->setFlash('Il faut specifier un cours', 'flash_error');
			$this->redirect('/dashboard');
		}
		$this->Etudiant->recursive = 0;
		$this->Paginator->settings['conditions']=['cours_id'=>$cours['id'], 'enrolled'=>true];
		$this->set('etudiants', $this->Paginator->paginate());
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
		if (!$this->Etudiant->exists($id)) {
			throw new NotFoundException(__('Etudiant invalide!'));
		}
		$this->Etudiant->recursive=2;
		$options = array('conditions' => array('Etudiant.' . $this->Etudiant->primaryKey => $id));
		$this->set('etudiant', $this->Etudiant->find('first', $options));
		//$quizzes = $this->Etudiant->Quiz->find('all', array('conditions'=>['user_id'=>
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		$Cours = $this->Session->read('Cours');

		if ($this->request->is('post')) {
			$this->Etudiant->create();
			if ($this->Etudiant->save($this->request->data)) {
				$this->Session->setFlash(__('The etudiant has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The etudiant could not be saved. Please, try again.'), 'flash_error');
			}
		}
		
		$cours_id = $Cours['id'];
		$cours = $this->Etudiant->Cour->find('list');
		$this->set(compact('cours', 'cours_id'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Etudiant->exists($id)) {
			throw new NotFoundException(__('Invalid etudiant'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//debug($this->request->data);
			//exit;
			if ($this->Etudiant->save($this->request->data)) {
				$User = ClassRegistry::init("User");
				$User->id = $this->request->data['Etudiant']['user_id'];
				$User->saveField('cours_id', $this->request->data['Etudiant']['cours_id']);

				$this->Session->setFlash(__('The etudiant has been saved.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The etudiant could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Etudiant.' . $this->Etudiant->primaryKey => $id));
			$this->request->data = $this->Etudiant->find('first', $options);
		}
		
		$User = ClassRegistry::init("User");
		$users = $User->find('list');
	
		$cours = $this->Etudiant->Cour->find('list', array('fields'=>['id','ccode']));
		
		$this->set(compact('users','cours'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Etudiant->id = $id;
		if (!$this->Etudiant->exists()) {
			throw new NotFoundException(__('Invalid etudiant'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Etudiant->delete()) {
			$this->Session->setFlash(__('Cet etudiant n\'existe plus.'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('Cet etudiant refuse de cesser d\'exister. Veuillez reessayer.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
// ---------------------------------------------------------------------
		public function admin_contact($id=null)
{
	//contact all students
		$cours = $this->Session->read('Cours');
		$etudiants = $this->Etudiant->find('list', 
					array(
					'fields'=>array('nom','courriel'),
					'conditions'=>array('cours_id'=>$cours['id'], 'enrolled'=>true))
					);
					
		$etudiants['Alain']='prof@french-csusb.org'; // copy me
		//debug($etudiants);
		//exit;
		if ($this->request->is(array('post', 'put'))) {
			// mail it...
			
			foreach($etudiants as $prenom=>$courriel) {
				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('html');
				$Email->template('contact_etudiants');
				$Email->to($courriel);
				
				$Email->from($this->Auth->user('email'), $this->Auth->user('name'));
				$Email->replyTo($this->Auth->user('email'));
				
				$Email->subject('Cours de francais III');
				$Email->viewVars(array('message' => $this->request->data['From']['message'], 'prenom'=>$prenom));

			
			if ($Email->send()) {
				 CakeLog::write('debug', 'email sent to: ' . $courriel);
			} else {
				 CakeLog::write('debug', 'email rejected: ' . $courriel);
				//$this->Session->setFlash(__('Your email could not be sent. Please, check with the administrator.'), 'flash_error');
				//$this->redirect(array('action'=>'index'));
			}
		}
		
			$this->Session->setFlash(__('Courriel envoye'), 'flash_normal');
			$this->redirect(array('action'=>'index'));
	}
	
	$this->set(compact('cours'));
}	
//----------------------------------------------------------------------
}
