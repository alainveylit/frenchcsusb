<?php

//App::import('Sanitize');

class UsersController extends AppController {

	var $name = 'Users';
	//var $helpers = array('Html', 'Form');

	public $components = array('Paginator');

	var $paginate = array(
			'limit' => '50',
			'order' => array('User.id' => 'desc'),
        );
        
    public function admin_dashboard() {

        $title_for_layout = 'Tableau de bord';
        $this->set(compact('title_for_layout'));
        $this->User->contain(array('Profile', 'Professeur'=>array('Cours')));

		$this->Session->delete('Cours');
		
        if($this->Auth->user('professor')==false) $this->redirect('/');
        $this->set('user', $this->User->read(null, $this->Auth->user('id')));
        $this->User->Document->Behaviors->attach('LightAuthFiltered', array('match_field'=>'creator'));	

        $totals=array();
        $totals['nb_documents'] = $this->User->Document->find('count');
		$totals['nb_ressources'] = $this->User->Ressource->find('count');
		$totals['nb_quizzes'] = $this->User->Quiz->find('count');
		$totals['nb_personnages'] = $this->User->Personnage->find('count');
		$totals['nb_chansons'] = $this->User->Chanson->find('count');
 		$totals['nb_vocabulaires'] = $this->User->Vocabulaire->find('count');
 		$totals['nb_projects'] = $this->User->Project->find('count');
        $this->set(compact('totals'));
    }

        
	function thankyou($user_id)
{
	$user = $this->User->find('first', array('conditions'=>array('User.id'=>$user_id)));
	$admin_email="alain@signtracks.com";
	
				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('html');
				$Email->template('donation');
				
				$Email->to($user['User']['email']);
				$Email->cc($admin_email);
				$Email->from('alain@signtracks.com');
				$Email->subject('Site donation');
				$Email->viewVars(array('User' => $user['User']));

				$email_sent =  $Email->send();
				
			
			
		$this->User->id = $user['User']['id'];
		$this->User->saveField('role', 'Contributor');
		
		$this->set(compact('user', 'email_sent'));

	
}
// ---------------------------------------------------------------------
	function my_settings()
{
	$this->set('profile', $this->User->read($this->Auth->user('id')));
}
// ---------------------------------------------------------------------
	function admin_index($cours_id=null)
{
		if(!$this->is_administrator()) {
			//$this->Session->setFlash(__("You are not an administrator"));
			return $this->redirect(array('controller'=>'profiles', 'action'=>'index'));
			exit;
		}
		
		$this->User->recursive = -1;
		$this->User->contain('Profile', 'Professeur');
		if($cours_id)$this->Paginator['settings']['conditions']=['cours_id'=>$cours_id];
		//$this->Paginator['settings']['limit']=100;
		$this->Paginator->settings = $this->paginate;

		$this->set('users', $this->paginate());
}
// ---------------------------------------------------------------------
	function index($cours_id=null) 
{		
		if(!$this->is_administrator()) {
			//$this->Session->setFlash(__("You are not an administrator"));
			return $this->redirect(array('controller'=>'profiles', 'action'=>'index'));
		} else {
			$this->redirect(array('controller'=>'profiles', 'action'=>'index', 'admin'=>true));
		}
		
}
// ---------------------------------------------------------------------
	function autoComplete ()
{
	$this->User->recursive=-1;
	$this->layout = 'ajax';
	$this->render(false);


	$users = $this->User->find('list', array(
        'conditions' => array(
        'or' =>array(
				'User.username LIKE ' => '%'.$this->request->query['term'].'%',
				'User.name LIKE ' => '%'.$this->request->query['term'].'%',
				'User.email LIKE ' => '%'.$this->request->query['term'].'%',
				)),
        'limit' => 25,
        'fields' => array('id', 'username')
	));

	echo json_encode($users);
}
// ---------------------------------------------------------------------
	function no_logins()
{
	if(!$this->is_administrator()) { $this->redirect("/");}
	
	$conditions = array('last_login'=>null, 'role'=>'user');
	$users = $this->User->find("all", array( 'conditions'=>$conditions));
	$this->set(compact('users'));
	
	$this->set('delete_all', true);
	$this->render('view_results');

}
// ---------------------------------------------------------------------
	function delete_nologins()
{
	if(!$this->is_administrator()) { $this->redirect("/");}
	$conditions = array('last_login'=>null, 'role'=>'user');
	$users = $this->User->find("all", array( 'conditions'=>$conditions));
	echo '<h4>Deleting users: total=', count($users), "</h4><ul>\n";
	
	foreach($users as $user) {
		echo '<li>', $user['User']['username'], ' ', $user['User']['email'], '</li>';
		$this->User->delete($user['User']['id']);
		
	}
	echo '</ul>';
	exit;
	
}
// -----------------------------------------------------------------------------------------
	function view_results()
{
	$search = $this->request->data['User']['username'];
				
	$results = $this->User->find('all', array(
			'conditions'=>array('OR'=>array('User.username like'=>'%'.$search.'%', 'User.name'=>'%'.$search.'%')), 'limit'=>50));
	$this->set('search', $search);
	$this->set('users', $results);
}
// -----------------------------------------------------------------------------------------
	function orphans()
{
	
	$this->User->recursive=0;
	$users = $this->User->find('all');
	
	
	foreach($users as $user) {
		if(empty($user['Profile']['id'])) {
			//debug($user);
			$this->create_profile($user['User']['id'], $user['User']['name']);
			echo '<li>', $user['User']['name'], ' => Profile id ', $this->User->Profile->id,  ' created for user id=' , $user['User']['id'], '</li>';	
		} else {
				$this->User->id=$user['User']['id'];
				$this->User->saveField('profile_id', $user['Profile']['id']);
			}
	}
	exit;
}
//----------------------------------------------------------------------------------
	public function admin_remove()
{
	$this->layout='ajax';
	$id=$this->request->query['id'];
	$this->User->recursive=-1;
		$etudiant = $this->User->find('first', array('conditions'=>['id'=>$id], 'fields'=>['id','cours_id']));
		//$active = !($user['User']['cours_id']);
		$this->User->id=$id;
		$this->User->saveField('cours_id', 0);
		//echo $active ? "checked" : "unchecked";
		exit;
		
}

	function create_profile($user_id, $name)
{
			$data=array();
			$data['user_id']=$user_id;
			$data['name'] = $name;

			$this->User->Profile->Create();
			if(!$this->User->Profile->save($data)) {
				$this->Session->setFlash("Sorry: Unable to create profile. Contact the site administrator or retry later.", 'flash_error');
				$this->redirect('/');
			} else {
				$this->User->id=$user_id;
				$this->User->saveField('profile_id', $this->User->Profile->id);
				return $this->User->Profile->id;
			}
			
			return 0;
}
//----------------------------------------------------------------------------------
	function beforeFilter() 
{
    parent::beforeFilter();
       if (isset($this->Security) && in_array($this->action, array('register', 'login', 'index', 'view_results'))) {
       $this->Security->validatePost = false;
       $this->Security->csrfCheck = false;
   }
 
    $this->Auth->Authorize = 'controller';
}
//----------------------------------------------------------------------------------
	public function isAuthorized() {
	//return true;
	
		if($this->is_administrator()) {
			//debug($this->request->params);
			return true;
		}

		if(in_array($this->request->action, array('login','logout','edit','register','captcha_image','donate','remove'))) {
              return true;
       }
       
       if(in_array($this->request->action, array('edit','new_password')) ){
		   if($this->request->params['pass'][0] == $this->Auth->user('id')) return true;
		}

        return false;
}

//----------------------------------------------------------------------
	function admin_edit_role($user_id=null)
	{
		if(!$user_id || !$this->is_administrator()) { $this->redirect('/'); }
				
		if(!empty($this->request->data)) {			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user role record has been updated'), 'flash_normal');
				return $this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The user role record could not be saved. Please, try again.'),  'flash_error');
				//return;
			}
		} //else {
			$this->User->recursive=-1;			
			$this->set('roles', array('Admin'=>'Administrator','professeur'=>'Professeur','etudiant'=>'Etudiant','guest'=>'Guest'));
			$this->request->data = $this->User->read(null, $user_id); 
			
		//}
		
	}
//----------------------------------------------------------------------
	public function verify( $type='email', $token = null ) {

		try {
			$user = $this->User->verifyEmail($token);
			$this->Session->setFlash(__d('users', 'Your e-mail has been validated!'), 'flash_normal');
			$this->Auth->loginRedirect = array('controller' => 'profiles', 'action' => 'edit', $user['User']['profile_id']);
 			return $this->redirect(array('action' => 'login'));
		} catch (RuntimeException $e) {
			$this->Session->setFlash($e->getMessage(), 'flash_error');
			return $this->redirect('/');
		}
	}
//----------------------------------------------------------------------
	function _sendNewStudentRegistrationMail($user, $cours) {
		
				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('both');
				$Email->template('account_verification');
				$Email->to($user['email']);
				$Email->cc('alain@musickshandmade.com');
				//$Email->from('noreply@musickshandmade.com');
				$Email->subject('French class registration');
				$Email->viewVars(array('user' => $user, 'cours'=>$cours));

			if ($Email->send()) {
				return true;
			} else {
				// invalid edmail address - zap account
				CakeLog::write('debug', 'Fatal error sending mail');
				return false;
			}

 }

//----------------------------------------------------------------------
	function enregistrement($ccode=null)
{
			$this->layout='login';
			
			//$classes = array('fr_103'=>'Français 103', 'fr_102'=>'Français 102', 'fr_20x'=>'Français 200/201/202');
			//$professors = array('fr_102'=>'1', 'fr_200Fall'=>'1', 'fr_203'=>'1', 'fr_103'=>'1');

               if (!empty($this->request->data)) {
				   
					$ccode = $this->request->data['User']['ccode'];
											
					$cours = $this->User->check_valid_ccode($this->request->data['User']['ccode']);
					
					if($cours===false) {
						$this->Session->setFlash(__('Erreur: ce code de cours n\'existe pas. Veuillez verifer'), 'flash_error');
						$this->redirect('/');
						return;
					}
					
					$this->set('cours', $cours);
					
						$plain_pw = $this->Auth->password($this->request->data['User']['plain_password']);
						$pw = $this->Auth->password($this->request->data['User']['password']);
						
						if(empty($pw) || $pw != $plain_pw) {
							$this->request->data['User']['plain_password']="";
							$this->request->data['User']['password']="";
							$this->Session->setFlash(__('Password mismatch!'), 'flash_error');
							return;
						}	
						
						$this->request->data['User']['password'] = $pw;
						
						if($this->request->data['User']['captcha']!=$this->Session->read('captcha'))
					{
						$this->Session->setFlash(__('Please enter correct captcha code and try again.'),  'flash_error');
							$this->request->data['User']['plain_password']=$plain_pw;
							$this->request->data['User']['password']="";
							//$this->set('class_title', $classes[$ccode]);
						return;
					}
					
					
					$this->request->data['User']['role']='etudiant';
					$this->request->data['User']['cours_id']=$cours['Cour']['id'];
					$this->request->data['User']['cours'] = $cours['Cour']['ccode'];
					$this->request->data['User']['username'] = strtolower($this->request->data['User']['email']);
					$this->request->data['User']['email_token'] = $this->generate_code(12);
					$this->request->data['User']['email_token'] = $this->generate_code(12);
					$this->request->data['User']['professor_id'] = $cours['Cour']['professeur_id'];
					//debug($this->request->data);
					//exit;
					$this->User->create();
					
					if(!$this->User->save($this->request->data)) {
						$this->Session->setFlash(__('Erreur fatale: veuillez reessayer plus tard!'), 'flash_error');
						$this->redirect('/');
					}
					
					if(	!$this->_sendNewStudentRegistrationMail($this->request->data['User'], $cours) ) {
						$this->Session->setFlash(__('Erreur: Unable to send user registration mail'), 'flash_error');
					} else {
						$this->Session->setFlash(__('Check your email to confirm your registration'), 'flash_normal');
					}
					
					$this->redirect('/pages/merci');

				}

			
			$cours = $this->User->check_valid_ccode($ccode);

			if($ccode==null || $cours===false) {
					$this->Session->setFlash(__('Vous devez spécifier votre cours!'), 'flash_error');
						$this->redirect('/');
				
			}

			$this->request->data['User']['cours']=$ccode;
			$this->request->data['User']['ccode']=$ccode;
			$this->request->data['User']['class_title'] = $cours['Cour']['titre'];
			$this->set('cours', $cours);
	
}
//----------------------------------------------------------------------
	function register($class_slug="")	{
	// Self registration form
		$this->layout='login';
		

                if (!empty($this->request->data)) {
						
					if($this->request->data['User']['captcha']!=$this->Session->read('captcha'))
					{
						$this->Session->setFlash(__('Please enter correct captcha code and try again.'),  'flash_error');
						return;
					}
						//debug($this->request->data);
						//exit;

                       $this->User->create();

                        $password =  $this->request->data['User']['plain_password'];
                        $email = $this->request->data['User']['email'];
                        $this->request->data['User']['password']= $this->Auth->password($password);
						$this->request->data['User']['role'] = 'User';
						$this->request->data['User']['active']=1;

                        if ($this->User->save($this->request->data)) {
							//CakeLog::write('debug', 'Registration saved');
								$profile_id = $this->create_profile($this->User->id, $this->request->data['User']['name']);
                                if(!$this->_sendNewUserMail( $this->User->id, $password)) {
									$this->Session->setFlash(__('Invalid email address. This account cannot be created.'),  'flash_error');
									$this->redirect("/");
								}
								
                            CakeLog::write('debug', 'Registration emailed to: ' . $email);
                                $this->Session->setFlash(__('Your account has been created successfully.'),  'flash_normal');
                                $this->Auth->loginRedirect = array('controller' => 'profiles', 'action' => 'edit', $profile_id);
                               //	$this->Auth->login($this->request->data); 
                            CakeLog::write('debug', 'Registration passed auth login');
								$this->User->recursive = 1;
                            	$currentUser = $this->User->find('first', array('conditions'=>array('User.id'=>$this->User->id)));
								$this->Session->write('Auth.User.Profile', $currentUser['Profile']);
								$this->set('User', $this->Auth->user());
							 //CakeLog::write('debug', 'Registration passed profile session setting');
							 $this->Auth->autoRedirect = false;
							 $this->Session->delete('Auth.redirect');
							    $this->Session->setFlash(__('Your user account has been created succesfully. Please fill out your profile'), 'flash_normal');
							    $user = $this->User->findById($this->User->id);
								//$user = $user['User'];
								//debug($user);
								//exit;
								if($this->Auth->login($user['User'])) {
									//$user=$this->Auth->user();
									$user['User']['Profile']=array();
									$user['User']['Profile']=$user['Profile'];		
									$user['User']['access_level']=3;
									$user['User']['contributor'] = false;	
									//unset($user['Profile']);
									$this->Session->write ( 'Auth.User.Profile', $user['Profile'] );
									//debug($user['User']);
									//exit;			
									return $this->redirect(array('controller'=>'profiles', 'action'=>'edit', $profile_id));
									exit;
								} else {
									return $this->redirect($this->Auth->redirect());
								}

                        } else {
                                $this->Session->setFlash(__('The account could not be saved. Please fix the errors highlighted in red and try again.'), 'flash_error');
                                //$this->redirect(array('controller'=>'users', 'action'=>'register'));
                                return;
                        }
                }
                
                $this->set('class_id', $class_slug);

}
//----------------------------------------------------------------------
/* function test_login()
{
	
	$this->request->data = array(	
		'User' => array(
			'password' => '*****',
			'username' => 'calambour',
			'name' => 'Nicolas Calambour',
			'plain_password' => 'gibberish',
			'email' => 'xxx@musickshandmade.com',
			'captcha' => '71b17',
			'role' => 'User',
			'active' => (int) 1
		));
		
		$profile_id=12;

		$this->Auth->login($this->request->data); 
		//$this->User->recursive = 1;

		$user = $this->User->findByUsername($this->request->data['User']['username']);
		//debug($user);
		$this->request->data['User']['id'] = $user['User']['id'];

		debug($this->Auth->user());
		$currentUser = $this->User->find('first', array('conditions'=>array('User.id'=>$this->request->data['User']['id'])));
		$this->Session->write('Auth.User.Profile', $currentUser['Profile']);
		//debug($currentUser);
		debug($this->Auth->user());
		//exit;
		$this->set('User', $this->Auth->user());
        $this->redirect(array('controller'=>'profiles', 'action'=>'edit', $profile_id));
	
}
*/
	function donate($user_id=null) 
{
	$user_id=$this->Auth->user('id');
	
		if(!$user_id) {
			
			return $this->redirect(array('action'=>'login'));
		}
		
	if($this->Auth->user('contributor')) {
		$this->Session->setFlash(__('You are already a contributor and do not need to make a donation'), 'flash_normal');
	}
	
	$user = $this->User->read(null, $user_id);
	$amount = 20;
	$email = $user['User']['email'];
	$profile_id = $user['User']['profile_id'];
	//if($user['User']['django_registered']) $amount=20;
	
	$this->set(compact('amount','profile_id','email', 'user_id'));
}
//----------------------------------------------------------------------	
	function _sendNewUserMail($id, $password) {
	
	$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id)));
	$user['User']['password'] = $password;
	
				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('html');
				$Email->template('registration');
				$Email->to($user['User']['email']);
				$Email->cc('alain@signtracks.com');
				$Email->from('alain@signtracks.com');
				$Email->subject('French class site registration');
				$Email->viewVars(array('User' => $user['User']));

			if ($Email->send()) {
				return true;
			} else {
				// invalid edmail address - zap account
				$this->unactivate($this->User->id);
				return false;
			}

 }
//----------------------------------------------------------------------
	function admin_view($id = null) {
		return $this->view($id);
	}
// ---------------------------------------------------------------------
	function view($id = null) {

		if($id && !$this->is_administrator() && $this->Auth->user('id') !== $id) {
			$user = $this->User->read(null, $id);
 			//$this->Session->setFlash(__('Invalid action.'));
			return $this->redirect(array('controller'=>'profiles','action'=>'view', $user['Profile']['id']));
			exit;
		}

			if(!$this->is_administrator()) {
				return $this->redirect(array('controller'=>'profiles', 'action'=>'view', $user['User']['profile_id']));
			} else {
				$this->set('user', $this->User->read(null, $id));
				//$Visit = ClassRegistry::init('Visit');
				//$this->set('visits', $Visit->find('count', array('conditions'=>array('Visit.user_id'=>$id))));
			} 
		
	}

// -----------------------------------------------------------------------------
	function add() {
		if (!empty($this->request->data)) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The User has been saved'));
				return $this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
			}
		}
	}
// -----------------------------------------------------------------------------
	function admin_edit($id = null) {
		$this->edit($id);
	}
// -----------------------------------------------------------------------------
	function edit($id = null) {

	if($id==null) $id=$this->Auth->user('id');
	
		if($id && !$this->is_administrator() && $this->Auth->user('id') !== $id) {
                        $this->Session->setFlash(__('Sorry you are not allowed to edit someone else\'s record!'));
                        $this->redirect(array('action'=>'index'));
                        exit;
                 }
 
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid user identification'));
			return $this->redirect(array('action'=>'index'));
			exit;
		}
		
		if (!empty($this->request->data)) {
			//debug($this->Auth->user());
			//debug($this->request->data);
			//exit;
			if ($this->User->save($this->request->data)) {
				
			if($this->Auth->user('cours_id')!=$this->request->data['User']['cours_id']) {
				$user = $this->Auth->user();
				$this->Session->write('Auth.User.cours_id', $this->request->data['User']['cours_id']);
			}

				$this->Session->setFlash(__('The User has been saved'));
				return $this->redirect(array('controller'=>'landings', 'action'=>'display'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
			}
		}
		
		if (empty($this->request->data)) {
			$this->request->data = $this->User->read(null, $id);
		}
		
		$Cours = ClassRegistry::init('Cour');
		if(!$Cours) {
			throw new RuntimeException(__d('users', 'Unable to create model: Cours.'));
			//die("Unable to create Cour");
		}
		
		$this->set('Cours', $Cours->find('list'));
		
		//debug($this->request->data );
		//exit;
	}
// -----------------------------------------------------------------------------
	function admin_delete($id = null) {
		
		$user_id = $this->Auth->user('id');

		if(!$this->is_administrator() && ($user_id!=$id) ) {
			$this->Session->setFlash(__('This is not your account to delete'));
			return $this->redirect(array('action'=>'index'));
		}
			
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User'));
			return $this->redirect(array('action'=>'index'));
		}
		
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('This user account has been deleted'), 'flash_normal');
			return $this->redirect(array('action'=>'index'));
		}
	}
	
	// -----------------------------------------------------------------------------
	public function ajax_login()
{
	//$this->autoRender=false;
	 debug($this->request->data);
	 exit;

  if($this->RequestHandler->isPost()) {	  
	 $response=array();
     if($this->Auth->login()) {
 				$this->User->id = $this->Auth->user('id');
				//$this->User->saveField('last_login', date("Y-m-d H:i:s"));	
				//$new_messages = $this->User->Message->find('count', 
					//		array('conditions'=>array('recipient_id'=>$this->Auth->user('id'), 'status'=>false)));
				$this->Session->write('Auth.User.messages', $new_messages);

				$response['success']=true;

     } else {
        $response['success']=false;
     }
     
    return $this->redirect($this->Auth->redirectUrl());
     /*
     $this->layout='ajax';
     $this->render(false);

	 echo $response['success'];
	 * */
  }
}
//----------------------------------------------------------------------
 public function soft_login()
{
	
		if ($this->request->is('post')) {
			
			$username = $this->request->data['User']['username'];
			$this->User->recursive=1;
			$user = $this->User->findByUsername($username);
			$this->request->data['User']['password'] = $user['User']['password'];
			$this->request->data['User']['id'] = $user['User']['id'];
		
					if ($this->Auth->login( $this->request->data )) {
						$this->Session->write('Auth.User', $user['User']);
						$this->redirect(array('controller'=>'profiles', 'action'=>'view', $user['User']['profile_id']));
					} else {
						die("Fatal error: did not pass quth");
					}

			exit;
		}
}
// ---------------------------------------------------------------------
	function login()
{
	$this->layout='login';				

		if ($this->request->is('post')) {
			//debug($_POST);
			//exit;
			
			$this->request->data = array('User' => array(
				'username'=>$_POST['username'],
				'password' => $_POST['plain_password'] 
				));

			unset($_POST['password']);
			$user = array();
			
			if ($this->Auth->login( $user )) {
				$this->User->id = $this->Auth->user('id');
				$this->User->saveField('last_login', date("Y-m-d H:i:s"));	
				$user_id = $this->Auth->user('id');
				//$user = $this->User->findByUsername($_POST['username']);
				$user = $this->User->find('first', array('conditions'=>['User.id'=>$user_id ]));
				$this->request->data['User']['id'] = $user['User']['id'];

				//debug($this->Auth->user());
				//exit;

				if(!empty($user['Professeur']['id'])) {
					return $this->redirect(array('action'=>'dashboard', 'admin'=>true));
				}
 				
				if(empty($user['Profile']['city'] )) {
					$this->Session->setFlash(__('Veuillez editer votre profil'), 'flash_normal');
					$this->redirect(array('controller'=>'profiles', 'action'=>'edit', $user['Profile']['id']));
				}
				if(!empty($user['Professeur']['id'])) {
					return $this->redirect(array('action'=>'dashboard', 'admin'=>true));
				}
 				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Identifiant ou mot de passe incorrect'), 'flash_error');
				//die("Auth failed!");
				$this->request->data=array();
				$this->Auth->redirect($this->Auth->redirectUrl());
			}
    } 
}
// ---------------------------------------------------------------------
// ---------------------------------------------------------------------
	function logout()
	{
        $this->Session->setFlash('You have successfully logged out.', 'flash_normal'); 
		return $this->redirect($this->Auth->logout());
	}
// ---------------------------------------------------------------------
	private function auto_password($length=8)
 {
	 return $this->generate_code($length);
 }
// ---------------------------------------------------------------------
	function renew_password()
{
		$this->layout='login';				


                if (!empty($this->request->data)) {
                        $email =  $this->request->data['User']['email'];
						$user = $this->User->find('first', array('conditions'=>array('User.email'=>$email)));
						if(empty($user)) {
							$this->Session->setFlash(__("Sorry no email address matches this. Please retry."), 'flash_error');
							return;
						}
						
						$password = $this->auto_password();
						$user['User']['plain_password'] = $password;
						$encrypted_password = $this->Auth->password($password);
						$this->User->id = $user['User']['id'];
						if($this->User->saveField('password', $encrypted_password)) {
							$this->sendUserPassword($user['User']);
							//debug($encrypted_password);
							//debug($user);
							//exit;
							$this->Session->setFlash(__("A new password has been sent by email to you."), 'flash_normal');
							$this->redirect('/');
						} else {
							
								$this->Session->setFlash(__("Unable to email your new password. Contact the administrator."), 'flash_normal');
								return;
							
						}
						die("Dropped into a black hole.");
					} 
		
}
// ---------------------------------------------------------------------
	function new_password($id=null)
{
	if($id==null) $id=$this->Auth->user('id');
	
                if ($id==null || !($this->is_administrator() || $id==$this->Auth->user('id')) ) {
                        $this->Session->setFlash('Invalid User:' . $this->Auth->user('id') . ' = ' . $id );
                        $this->redirect(array('controller'=>'profiles', 'action'=>'index'), null, true);
                }
 
                if (!empty($this->request->data)) {
                        $plain_password =  $this->request->data['User']['plain_password'];
                        $encrypted_password = $this->Auth->password($plain_password);
						$this->User->id=$id;
						
                        if ($this->User->saveField('password', $encrypted_password) )
				{
						$this->sendUserPassword($this->request->data['User']);
                        $this->Session->setFlash('Your password has been changed', 'flash_normal');
                        $action = ($this->is_administrator()) ? 'index' : 'login';
                        $this->redirect(array('action'=>$action), null, true);
				}
					else
                        {
                          $this->Session->setFlash('Sorry, the new user password could not be saved. ', 'flash_error');
                        }
                } else {
					$this->request->data = $this->User->read(null, $id);
				}		                
  

}
//--------------------------------------------------------------	
 function sendUserPassword($User)
{

				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('html');
				$Email->template('new_password');
				$Email->to($User['email']);
				$Email->from('alain@signtracks.com');
				$Email->subject('French site registration');
				//$this->set('UserData', $user);
				$Email->viewVars(array('User' => $User));

			if ($Email->send()) {
				return true;
			} else {
				return false;
			}
}
//--------------------------------------------------------------
function captcha_image(){
	require_once(APP . 'Vendor/captcha/captcha.php');
    $captcha = new captcha();
    $captcha->show_captcha();
}
// ---------------------------------------------------------------------
}
?>
