<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
		public $components = array(
		'Security'=>array('allowedActions'=>array('login', 'display', 'save_order','enregistrement'),   
				'unlockedActions' => array('save_order'),
				'csrfExpires' => '+2 hour'),

		'Auth' => array(
		'authenticate'      => array(
			'Form' => array(
				'contain'   => array('Profile' => array('fields'=>array('id', 'name','avatar')), 
									 'Professeur'=>array('fields'=>array('id','nom','prenom','titre','courriel'))
				))
			),
			'params' => array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				)

	),
	'Email',
	'Session',
	'Cookie',
	'Flash',
	'RequestHandler'/*, 'DebugKit.Toolbar'*/);
	

 
 var $helpers = array(	"Session",
						"Time",
						"Flash",
						//"Js"=>array('Jquery'),	
						'Html',	
						//'Session',					
						'Crud',
						//'Like.Like'

				);

//----------------------------------------------------------------------
  function beforeFilter()
{

		$this->Security->blackHoleCallback = 'blackhole';
	
		$this->Auth->authError = "Please log in to access other pages in this site";
		
				$this->Auth->allow(array(	
								'login','logout','register','captcha_image', 'soft_login', 
								'donate','renew_password', 'enregistrement','verify',
								'display', 'get_latest', 'process_ipn','preview',
								'showcase','edit_title', 'save_order','get_tiles','accueil')
					); 
		
									
        $this->Auth->loginRedirect = array('controller' => 'landings', 'action' => 'display');
        //$this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
		$this->Auth->logoutRedirect = array('controller' => 'accueils', 'action' => 'display');
 
		$User= $this->Auth->user();
		
		if( !empty($User)) {
			if(isset($User['role']) && !isset($User['access_level'])) {
				//die('User role found');
				$is_contributor = ($User['role']=='Admin') || ($User['role']=='Contributor');
				$is_professor = isset($User['Professeur']['id']) ? true : false;
				$access_level = $this->access_level[$User['role']];				
				$this->Session->write('Auth.User.access_level', $access_level);			
				$this->Session->write('Auth.User.professor', $is_professor);
				if($is_professor) {
					$this->Session->write('Auth.User.professeur_id', $User['Professeur']['id']);
					$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard', 'admin'=>true);
				}


			} else { 
				$User['access_level']=0; 
			}
				
		}
				$User= $this->Auth->user();
				$this->set('User', $User);

//debug($User);
//die("user set");
//--- cookie setup

	  $this->Cookie->name = 'fcsub';
	  $this->Cookie->time =  3600;  // or '1 hour'
	  $this->Cookie->path = '/fcsusb'; 
	  $this->Cookie->domain = 'fcsusb';   
	  
	//$this->set_default_flash();
		
		if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
				if(!$this->is_administrator()) {
					$this->redirect('/');
				}
				$this->layout = 'admin';
				$this->theme = 'Admin';
		} 
		
		if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'etudiant'))) {
						$this->theme = 'etudiant';
						$this->layout = 'etudiant';
		}
	
}
//----------------------------------------------------------------------
	function is_administrator()
{
		return ($this->Auth->user('role')=='Admin') ? true : false;
}
//----------------------------------------------------------------------
	function is_professor()
{
		//return ($this->Auth->user('role')=='Admin') ? true : false;
		return $this->Auth->user('is_professor');
}
//----------------------------------------------------------------------	
	function get_controller_name($model)
{
	return Inflector::underscore(Inflector::pluralize($model));	
}
//----------------------------------------------------------------------
	function is_admin_interface()
{
	if($this->request->param('admin')==true) {	
		if(!$this->is_administrator()) {
			$this->redirect('/');
		}
		return true;
	}
	
	return false;
}
//----------------------------------------------------------------------
	public function generate_code($length=8)
{
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
	
}
//----------------------------------------------------------------------
}
