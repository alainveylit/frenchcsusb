<?php
/**
 * LightAuthFilteredBehavior filters searches according to the
authentication data provided by the light_auth component
 * This allows to restrict search results availability to only records
tagged by a certain group
 * of users or by any association between a user and a set of
preferences such as subject, speciality etc. defined in a user's profile
 * The 'allowFilteredSearch' options parameter in LightAuth must be set
to true

 * PHP versions 4 and 5
 * Tested with Cake 1.3.2
 * Copyright 2010, Alain Veylit,
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @link          http://github.com/
 * @lastmodified  $Date: 2010-07-15
 * @license       http://www.opensource.org/licenses/mit-license.php The
MIT License
 */


class LightAuthFilteredBehavior extends ModelBehavior {

        var $settings = array();
        //var $_built = array();

        function setup(Model $Model, $settings = array())    {
			
               if (!isset($this->settings[$Model->alias])) {
                        $this->settings[$Model->alias] = array(        
							// Default behavior values
                                'user_model'=>'User',                  
							// User model
								'owner_model'=>null,
							// In case the user id is set by association
                                'match_field' => 'access_group',    
							// Field in the current controller that must match the lightauth criteria -
                                'auth_field' => 'id',                  
							// Field name of the lightauth criterium
                                'auth_element'=>'User',               
							// Can be 'User', or 'Group' or some other associated model name to the user model: subject, preference, etc.
                                'strict'=>true);                       
							// Could be used in a hierarchy criterium with a "group_id > admin_id" for instance to allow for layered searches
                }
               if (!is_array($settings)) {
                        $settings = array();
                }

                $this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], $settings);
        }

  function beforeFind(Model $model, $query) {
	  //debug($model);
        $config = $this->settings[$model->alias];
        $auth_conditions = $this->setConditions($model, $config);
        $query['conditions'] =	Set::merge($query['conditions'],$auth_conditions);
        //debug($query['conditions']);
        //exit;
        return $query;
  }

  function setConditions(Model &$model, $config) {
	  //CakeLog::write('debug', $model);
	  //exit;
	  
         $match_field =  $config['match_field'];
         $this->_checkColumn($model,$match_field);
         $UserModel = $config['user_model'];
         $User = get_class_vars($UserModel);
         //debug($User);
         $auth=	$model->getCurrentUser(); //defined in app_model

//debug($this->settings);
//debug($config);
//debug($auth);
//debug($auth[$config['auth_element']]);
//exit;

         $check = $auth[$config['auth_element']][$config['auth_field']];
         $model_field = ($this->settings[$model->name]['owner_model'] != null) ?
							$this->settings[$model->name]['owner_model'] : $model->name;

		$conditions=array( $model_field.'.'.$match_field=>$check);
		//debug($conditions);
		//exit;
         //if(!$config['strict']) ... not implemented yet
         return $conditions;
}

        function _checkColumn($model, $column) {
		   
			// if the model to check is in a belongsTo relationship:
			// check that the match field in the fields short list
			// to-do: what if the fields list is null? ah ah!
			if($this->settings[$model->name]['owner_model'] != null) {
				$assoc = $this->settings[$model->name]['owner_model'];
				$owner = $model->getAssociated($assoc);
				//debug($owner);
				if(!preg_match("/$column/", $owner['fields'])) {
						trigger_error('Wrong Association: "' . $model->alias . '['.$assoc.'] " is missing column: ' . $column);
					}
				return;
			}
			// straight check of model
           $col = $model->schema($column);
           if(empty($col)) {
				trigger_error('Model "' . $model->alias . '" is missing column: ' . $column);
           }
        }
}
?>
