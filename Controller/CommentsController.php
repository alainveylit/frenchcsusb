<?php
App::import('Sanitize');
class CommentsController extends AppController {

	var $name = 'Comments';
	var $helpers = array('Html', 'Form');
	var $paginate=array('order'=>'Comment.created DESC');
	var $referer;
	
	function beforeFilter() 
{
		$referer=$this->referer();

		//$this->Auth->userScope = array('User.active' => true);
		if( !$this->Session->check('Auth.User') || !$this->Auth->user('active') )
	{
		 $this->redirect('/');
	}

		$this->Auth->Authorize = 'Controller';
		parent::beforeFilter();
		
     if (isset($this->Security) && in_array($this->action, array('add_comment', 'add', 'admin_add'))) {
       $this->Security->validatePost = false;
       $this->Security->csrfCheck = false;
   }

}
//----------------------------------------------------------------------
	function index() {
		
		$this->Comment->recursive = 0;
		//$this->paginate['conditions'] =array('Comment.user_id'=>$this->Auth->user('id'));
		$this->set('comments', $this->paginate());
		
	}
	
	function my_comments() {
		
		$this->Comment->recursive = 0;
		$this->paginate['conditions'] =array('Comment.user_id'=>$this->Auth->user('id'));
		$this->set('comments', $this->paginate());
		$this->render('index');
	}

//------------------------------------------------------
	function view($id = null) {
		$this->Comment->recursive=1;
		if (!$id) {
			$this->Session->setFlash(__('Invalid Comment.'));
			return $this->redirect(array('action'=>'index'));
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}
//--------------------------------------------------------------------------
	public function admin_add_comment()
{
	// Ajax version of add
	//debug( $this->request->data);
	//exit;
			$model = $this->request->data['Comment']['model'];
			$foreign_key = $this->request->data['Comment']['foreign_key'];
			$controller= $this->get_controller_name($model);
			
	$this->Comment->create();
	
	if(!$this->Comment->save( $this->request->data)) {
		die("Unable to save comment"); 
	} else {
		$comment_id = $this->Comment->id;
		$this->email_comment($comment_id);
		$this->Session->setFlash(__('Commentaire sauvegarde'), 'flash_normal');
		//debug($this->request->data['Comment']['comment']);
		//exit;
		$this->redirect(array('controller'=>$controller, 'action'=>'view', $foreign_key));
	}

		
}
//--------------------------------------------------------------------------
	public function add_comment()
{
			$creator = $this->Auth->user('id');
			$model = $this->request->data['model'];
			$foreign_key = $this->request->data['foreign_key'];

			$this->Comment->{$model}->recursive=-1;
			$defaultField =$this->Comment->$model->displayField;				
			$record =  $this->Comment->$model->findById($foreign_key, array('fields'=>$defaultField));
			$title = $record[$model][$defaultField];
			
			//$this->set(compact('model','foreign_key','title','creator'));
							$this->set('model', array(
											'alias'=>$model, 
											'foreign_key'=>$foreign_key, 
											'title'=>$title, 
											'user_id'=>$this->Auth->user('id'),
											'user_name'=>$this->Auth->user('name'),
											'owner'=>$this->request->data['owner'])
									);

			
			//$this->render('add');
	
			

}
	function email_comment($id)
{
	$comment = $this->Comment->read(null, $id);
	$model = $comment['Comment']['model'];
	$author_id = $comment[$model]['creator'];
	//debug($comment);
	$this->Comment->Creator->recursive=-1;
	$author = $this->Comment->Creator->read(null, $author_id);
	//debug($author);
	//exit;
	
	if(!empty($author)) {
		
				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('html');
				$Email->template('comment_notify');
				$Email->to($author['Creator']['email']);
				$Email->from($this->Auth->user('email'));
				$Email->subject($comment['Creator']['name'] . ' a ajouté  un commentaire à votre ' . strtolower($model));
				$Email->viewVars(array('recipient'=>$author, 'comment'=>$comment));

			if ($Email->send()) {
				CakeLog::write('debug', 'Mail sent successfully... recipient: ' . $author['Creator']['name']);
				//return true;
			} else {
				CakeLog::write('debug', 'Failed to send mail... Sender: ' . $this->Auth->user('email'));
				$errors+=1;
				//return false;
				//break;
			}

		
	}
	return;
	//debug($comment);
	//exit;
		
}
 	public function admin_add() 
 {
	// die("admin add");
	// From the Blog interface	
	if ($this->request->is('post' || 'put')) {
		$this->Comment->Create();
		if($this->Comment->save($this->request->data)) {
			$controller = $this->get_controller_name($this->request->data['Comment']['model']);
			$foreign_key =  $this->request->data['Comment']['foreign_key'];
			$comment_id = $this->Comment->id;
			$this->email_comment($comment_id);
			$this->Session->setFlash(__("Votre commentaire est enregistre."), 'flash_normal');
			$this->redirect(array('controller'=>$controller, 'action'=>'view', $foreign_key));
		} else {
				$this->Session->setFlash(__("Impossible d'enregistrer votre commentaire. Veuillez reessayer plus tard."));
				
		}
	} else {
		die("Not a post");
	}
}


        function add() {
			// ajax calls only
		//die("You are in comments add");
                if (!$this->request->is('ajax') /*&& !empty($this->request->data)*/) {
					//debug($this->request->data); exit;
                        $this->Comment->create();

                        if($this->request->data['Comment']['user_id']!= $this->Auth->user('id')) {
							$this->Session->setFlash(__("An error has occured. Please try login in again."));
							return $this->redirect(array('controller'=>'collections', 'action'=>'index'));
							exit;
						}
							
                        $this->request->data['Comment']['name']= $this->Auth->user('name');
						$controller = strtolower($this->request->data['Comment']['model']) . 's';
 						
						if ($this->Comment->save($this->request->data)) {
                                $this->Session->setFlash(__('Your comment has been saved', 'flash_normal'));
                                
							} else {
									$this->Session->setFlash(__('The Comment could not be saved. Please log in and try again.'), 'flash_error');
							}
                            
                            $this->redirect(array('controller'=>$controller, 'action'=>'view', 'admin'=>true, $this->request->data['Comment']['foreign_key']));
                            //$this->redirect(array('controller'=>$controller, 'action'=>'view', 'admin'=>true, $this->request->data['Comment']['owner']));
                            exit;
					}
	
	//debug($this->request->data);
	//exit;
				$model = $this->request->data['model'];
				$foreign_key = $this->request->data['foreign_key'];
				$this->Comment->$model->recursive=-1;
				$defaultField =$this->Comment->$model->displayField;
				
				$collection =  $this->Comment->$model->findById($foreign_key, array('fields'=>$defaultField));
      
				$this->set('model', array(  'alias'=>$model, 
											'foreign_key'=>$foreign_key, 
											'title'=>$collection[$model][$defaultField], 
											'user_id'=>$this->Auth->user('id'),
											'user_name'=>$this->Auth->user('name'))
									);
				//debug($model);
				//exit;
        }

//----------------------------------------------------------------------
	function admin_edit($id=null)
{

		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Comment'));
			return $this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('Commentaire sauvegarde'), 'flash_normal');
			} else {
				$this->Session->setFlash(__('Impossible de sauvegarder vos modifications!'), 'flash_error');
			}
				$controller = $this->get_controller_name($this->request->data['Comment']['model']);
				return $this->redirect(array('controller'=>$controller, 'action'=>'view', $this->request->data['Comment']['foreign_key']));
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Comment->read(null, $id);
		}


}
//----------------------------------------------------------------------
	function edit($id = null) {

		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Comment'));
			return $this->redirect(array('action'=>'index'));
		}

		$this->check_owner($id);

		if (!empty($this->request->data)) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The Comment has been saved'));
			} else {
				$this->Session->setFlash(__('The Comment could not be saved. Please, try again.'));
			}
			
			return $this->redirect(array('action'=>'index'));
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Comment->read(null, $id);
		}

	}
//----------------------------------------------------------------------
	function admin_delete($id) 
{
	$comment = $this->Comment->read(null, $id);
	
		if ($this->Comment->delete($id)) {
			$this->Session->setFlash(__('Comment deleted'), 'flash_normal');
		} else {
			$this->Session->setFlash(__('Unable to  delete comment!'), 'flash_error');
		}
			$controller = $this->get_controller_name($comment['Comment']['model']);
			$foreign_key = $comment['Comment']['foreign_key'];
			return $this->redirect(array('controller'=>$controller, 'action'=>'view', $foreign_key));

}
//----------------------------------------------------------------------
	function delete($id = null) {

		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Comment'));
			return $this->redirect(array('action'=>'index'));
		}
		 $this->check_owner($id);

		if ($this->Comment->delete($id)) {
			$this->Session->setFlash(__('Comment deleted'));
			return $this->redirect(array('action'=>'index'));
		}
	}
//----------------------------------------------------------------------
	function check_owner($id) {
		if($this->Auth->user('id')==1) return true;
		$record = $this->Comment->read(null, $id);
		if($record['Comment']['user_id']!=$this->Auth->user('id')) {
			$this->Session->setFlash("You cannnot modifiy some else\'s record");
			return $this->redirect(array('action'=>'index'));
			exit;
		}
	}
//----------------------------------------------------------------------
}
?>
