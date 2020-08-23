<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	
	 var $actsAs = array('Containable');
	 
	function getCurrentUser() {
		  // for CakePHP 1.x:
		  //App::import('Component','Session');
		  //$Session = new SessionComponent();

		  // for CakePHP 2.x:
		  App::uses('CakeSession', 'Model/Datasource');
		  $Session = new CakeSession();

		  $user = $Session->read('Auth');
		//debug($user);
		//exit;
		  return $user;
	}

}
