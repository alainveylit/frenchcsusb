<?php
//App::import('Sanitize');

class ProfilesController extends AppController {

	var $name = 'Profiles';
	var $anonymous_avatar = '/css/images/icons/anon-avatar.png';
	var $paginate=array(
		'limit'=>100,
		'order'=>'Profile.name asc',
		'conditions'=>array('public'=>true, 'user_id !='=>0)
	);
	

	public function contact($id=null)
{
		if(!$id) { $id = 1; } // Contact admin
	
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}

		if ($this->request->is(array('post', 'put'))) {
			// mail it...
			//debug($this->request->data);

			$this->Profile->Behaviors->attach('Containable');
			$this->Profile->contain(array('User'));
			$to = $this->Profile->findById($this->request->data['Profile']['id']);
				
				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('html');
				$Email->template('contact');
				$Email->to($to['User']['email']);
				
				$Email->from($this->Auth->user('email'), $this->Auth->user('name'));
				$Email->subject('Message de Francais III');
				$Email->viewVars(array('message' => $this->request->data['From']['message']));


			if ($Email->send()) {
				$this->Session->setFlash(__('Your email has been sent.'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your email could not be sent. Please, check with the administrator.'), 'flash_error');
			}
		} else {

			$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
			$this->request->data = $this->Profile->find('first', $options);

			$this->set('Sender', $this->Auth->user());
		}


}	
	function set_contributors()
	{
		$donations = $this->Profile->Donation->find('all');
		
		foreach($donations as $donation) {
			if(!isset($donation['Profile']['id'])) continue;
			$profile_id = $donation['Profile']['id'];
			echo '<li>', $donation['Donation']['id'], ' -- ', $profile_id, ' : ', $donation['Donation']['first_name'], ' ', $donation['Donation']['last_name'], '</li>';
			$this->Profile->User->set_contributor_status($donation['Profile']['user_id']);
		}
		//debug($donations);
		exit;
		
	}
		
	 function webs()
	{
		$this->Profile->recursive=1;
		$profiles = $this->Profile->find('all'/*, array('fields'=>'id,name,WEB,user_id')*/);
		//debug($profiles);
		foreach($profiles aS $profile) {
			if(!empty($profile['User']['WEB'])) {
			echo '<li>', $profile['Profile']['name'], ' : Profile WEB: ', $profile['Profile']['WEB'],' User WEB : ', $profile['User']['WEB'], '</li>';
		}
	}
		exit;		
	}
//----------------------------------------------------------------------
	function beforeFilter() {
	
	if($this->request->action=='process_ipn') {
			$this->Auth->allow('process_ipn');
			$this->Auth->authorize = 'Controller';
	}
	
	if($this->request->action!='process_ipn') {
		
		if(!$this->Auth->user('id') ) {
			return $this->redirect(array('controller'=>'users', 'action'=>'login'));
		}
	}		
	$this->Auth->authorize = 'Controller';
	parent::beforeFilter();

}
//----------------------------------------------------------------------
 public function isAuthorized()
{
	
	if($this->is_administrator()) return true;	
	
	if(!$this->Session->check('Auth.User')) {
		//if(!$this->Auth->user('id') ){
		return false;
	} 
	
	if(!$this->Auth->user('active') && $this->request->action != 'edit') return false;
	
	return  true;
}
//----------------------------------------------------------------------
	function donate($creator, $item_id) 
	{
		$donor_id = $this->Auth->user('id');
		$profile = $this->Profile->findByUserId($donor_id, array('name', 'donations'));
		
		$this->set('creator', $this->Profile->User->findById($creator, array('id', 'Name', 'email')) );
        $this->set('crumbs', $this->Cookie->read('Viewed'));
        $this->set('item_id', strtoupper($item_id));
        $this->set(compact('profile'));

	}
//----------------------------------------------------------------------	
	function check_profile_owner($user_id, $profile_id)
	{
		if($this->is_administrator()) return true;
		$profile = $this->Profile->find('list', array('conditions'=>array('user_id'=>$user_id), 'fields'=>array('user_id', 'id')));
		return ($profile[$user_id] == $profile_id) ? true : false;
	}
//----------------------------------------------------------------------
	function edit_profile($user_id)
	{
		$profile = $this->Profile->find('list', array('conditions'=>array('user_id'=>$user_id), 'fields'=>array('user_id', 'id')));
		return $this->redirect(array('action'=>'edit', $profile[$user_id]));
	}
//----------------------------------------------------------------------	
	function get_avatar($user_id=null) 
{		
		if($user_id==null) {
				return $this->anonymous_avatar;
			}
		
		$profile = $this->get_user_profile();
		return $profile['Image'];
}
//----------------------------------------------------------------------
	function upload_avatar($id=null)
{
	if(!$id) { 
		$id = $this->Auth->user('id');
		//die("Unexpected upload"); 
	}

	if (!empty($this->request->data)) {
		
		$filedata=$this->request->data['Profile']['Filedata'];
		$filedata['user_id']=$id;
		
		$this->Profile->Image->upload_avatar($filedata) ;
		return $this->redirect(array('action'=>'edit', $id));
	} else {
		$this->request->data = $this->Profile->read(null, $id);
	} 
}
//----------------------------------------------------------------------
	function index() {

		if(!$this->Auth->user('active')) {
				return $this->redirect(array('controller'=>'pages', 'action'=>'home'));
		}

		if(!$this->is_administrator()) {
			$cours_id = $this->Auth->user('cours_id');
			$this->Profile->Behaviors->attach('LightAuthFiltered',  
				array('owner_model'=>'User', 'auth_field'=>'cours_id', 'match_field'=>'cours_id', 'cours_id'=>$cours_id));

		}
		$this->Profile->recursive = 1;
		$this->set('profiles', $this->paginate());
	}
//----------------------------------------------------------------------
	
	function admin_index() {

		if(!$this->Auth->user('active')) {
				return $this->redirect(array('controller'=>'pages', 'action'=>'home'));
		}

		$this->Profile->recursive = 1;
		$this->set('profiles', $this->paginate());
	}

//----------------------------------------------------------------------
	function view($id = null) {

		if (!$id) {
			$id = $this->Auth->user('profile_id');
			//$this->Session->setFlash(__('Invalid profile'), 'flash_error');
			//return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'home'));
		}
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
				return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'home'));
		}


		if(!$this->Auth->user('active')) {
			if($id !=$this->Auth->user('profile_id')) {
				return $this->redirect(array('controller'=>'pages', 'action'=>'home'));
			}
		}
		$this->Profile->contain('User', array('SocialMediaLink'=>array('SocialMedia')));
		$this->set('profile', $this->Profile->read(null, $id));
		$this->set('owner', ($id==$this->Auth->user('profile_id')) ? true : false );
	}
//----------------------------------------------------------------------
	function add() {
		if(!$this->is_administrator()) {
			return $this->redirect(array('action'=>'index'));
			exit;
		}
		 
		if (!empty($this->request->data)) {
			$this->Profile->create();
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved'), 'flash_normal');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your profile could not be saved. Please, try again.'), 'flash_error');
			}
		}
		$users = $this->Profile->User->find('list');
		$this->set(compact('users'));
	}
//----------------------------------------------------------------------
	function edit($id = null) 
{
	
	$id = $this->Auth->user('profile_id');
	
		
		if (!empty($this->request->data)) {

			//Sanitize::clean($this->request->data);

			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('Your profile has been saved'), 'flash_normal');
				return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'home'));
			} else {
				$this->Session->setFlash(__('Your profile could not be saved. Please, try again.'), 'flash_error');
			}
		}
		
		if (empty($this->request->data)) {			
			$this->request->data = $this->Profile->read(null, $id);
		}
		//$this->set(compact('users'));
		
}
//----------------------------------------------------------------------
		function contribute()
	{
			
	}
//----------------------------------------------------------------------
	function delete($id = null) {
/*		if (!$id) {
			$this->Session->setFlash(__('Invalid id for profile'));
			return $this->redirect(array('action'=>'index'));
		}
		if ($this->Profile->delete($id)) {
			$this->Session->setFlash(__('Profile deleted'));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Profile was not deleted'));
		return $this->redirect(array('action' => 'index'));
*/
	}
//----------------------------------------------------------------------
 function get_user_profile()
{
		$user_id=$this->Auth->user('id');
		$profile = $this->Profile->find('list', array('conditions'=>array('user_id'=>$user_id), 'fields'=>array('user_id', 'id')));
		$profile = $this->Profile->read(null, $profile[$user_id]);
		return $profile;
	
}
//----------------------------------------------------------------------
		function thankyou()
{
		
		$this->set('profile', $this->get_user_profile());
        $this->set('crumbs', $this->Cookie->read('Viewed')); 
 
}
//----------------------------------------------------------------------
	function footsteps()
	{		
		$this->set('profile', $this->get_user_profile());
        $this->set('crumbs', $this->Cookie->read('Viewed')); 
	}
//----------------------------------------------------------------------
    function process_ipn() {
//die("Processing ipn");
       $this->autoRender = false;
       $Donation=array();
       // post back to PayPal system to validate
        $logfile = 'paypal';
       CakeLog::write($logfile, 'Process_ipn called by PP::');
	  
	   
       $req = 'cmd=_notify-validate';

       foreach ($_POST as $key => $value) {
			CakeLog::write($logfile, "\t" . $key . "=> " . $value);
			$Donation[$key]=$value;
			$value = urlencode(stripslashes($value));
			$req .= "&$key=$value";
	   }
       
       $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
       $header .= "Host: www.paypal.com\r\n";
       $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
       $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
       
       $fp = fsockopen('ssl://www.paypal.com', "443", $err_num, $err_str, 30);

       if (!$fp) {// HTTP ERROR, we should record the data still..?
              CakeLog::write($logfile, 'Fatal error getting socket -- ' . $err_str);

       } else {
          fputs($fp, $header . $req);
          while (!feof($fp)) {
			 //CakeLog::write('paypal', 'Checking for verification');
			  
             $res = fgets($fp, 1024);
             
             if (strcmp($res, "VERIFIED") == 0) {// verified from paypal, processing...     
				
				CakeLog::write($logfile, 'Paypal answers: Transaction was verified');
				CakeLog::write($logfile, 'Payment status: ' . $Donation['payment_status']);
				
				if($Donation['payment_status'] ='Completed') {
					
					CakeLog::write($logfile, 'Creating database record for this transaction');
					
						$Donation['profile_id'] = $this->find_by_email($Donation['payer_email']);
						$this->Profile->Donation->create();
						if(!$this->Profile->Donation->save($Donation)) {
							CakeLog::write($logfile, 'Unable to save donation record');
						} else {
							CakeLog::write($logfile, 'Donation record created');
							$this->update_contributor($Donation, $logfile);
						}
				}
				
			} else if (strcmp($res, "INVALID") == 0) {
                // oh no, someone is hijacking us...
				CakeLog::write($logfile, 'PayPal answered with an INVALID response...');
             }
          }
          fclose($fp);
       }
    }
//----------------------------------------------------------------------
 function update_contributor($donation, $logfile='paypal')
 {
	 CakeLog::write($logfile, 'Item: '. $donation['item_number']);

	 if(!$donation['profile_id'] || $donation['mc_gross'] < 20) {
		 CakeLog::write($logfile, 'Update cancelled: profile = > ' . $donation['profile_id'] . ' -- donation amount=' . $donation['mc_gross']);
		 return;
	 }
	 
	 if($donation['item_number']=='DjangoTab_registration') {	
		 CakeLog::write($logfile, 'DjangoTab donation: Processing user profile	... ');
		 $profile=$this->Profile->read(null, $donation['profile_id']);
		 if(empty($profile)) return;
		 CakeLog::write($logfile, 'Updating user profile, setting contributor status');
		 $this->Profile->User->set_contributor_status($profile['Profile']['user_id'], true);
		 $donation['username'] = $profile['User']['username'];
		 $this->DjangoTabEmailNotification($user_name, $donation['custom'], $donation['payer_email']);
	 }
	 
	return;	 
 }
//----------------------------------------------------------------------
	function find_by_email($email)
{
	$this->Profile->User->recursive=-1;
	$profile = $this->Profile->User->findByEmail($email);
	return (empty($profile)) ? 0 :  $profile['User']['profile_id'];
	
}
//----------------------------------------------------------------------
//----------------------------------------------------------------------
        function DjangoTabEmailNotification($user_name, $djangotab_id=null, $payer_email= null)
{
	$this->autoRender = false;
	
				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('html');
				$Email->template('donation');
				$Email->to($payer_email);
				$Email->from('lute@musickshandmade.com');
				//$Email->cc('xxxxx@musickshandmade.com');
				$Email->subject('DjangoTab registration');
				$user = $this->Profile->User->findById($djangotab_id);
				$Email->viewVars(array('User'=>$user['User']));
			if ($Email->send()) {
				CakeLog::write("paypal", "Email sent succesfully");
				return true;
			} else {
				CakeLog::write("paypal", "Unable to send response email");
				return false;
			}

  }
//----------------------------------------------------------------------
	function _sendNewUserMail($donation) {
	
		$this->Email->to = $donation['payer_email'];
		$this->Email->cc = array('lute@musickshandmade.com');  // note
														  // this could be just a string too
		$this->Email->subject = 'French3 registration';
		$this->Email->replyTo = 'lute@musickshandmade.com';
		$this->Email->from = 'lute@musickshandmade.com';
		$this->Email->template = 'autoregister'; // note no '.ctp'
		//Send as 'html', 'text' or 'both' (default is 'text')
		$this->Email->sendAs = 'both'; // because we like to send pretty mail
		//Set view variables as normal

		$this->set('name', $Donation['first_name'] . ' ' . $donation['last_name']);
		$this->set('username', $donation['username']);
		
		//Do not pass any args to send()
		$this->Email->send();
 }
 
//----------------------------------------------------------------------
}
?>
