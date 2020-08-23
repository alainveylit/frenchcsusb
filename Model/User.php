<?php
class User extends AppModel {

	var $name = 'User';
	var $validate = array(
	
	/*	'username' => array(
			
					'alphaNumeric' => array(
					'on' => 'create',
						'rule' => 'alphaNumeric',
						'allowEmpty' => false,
						'required' => true,
						'message' => 'Alphanumérique: Lettres ou chiffres seulement'
						),
						
					'between' => array(
						'rule' => array('between', 7, 25),
						'message' => 'De 7 à 25 caractères'
					),
					
					 'unique' => array(
								'rule' => 'isUnique',
								'message' => 'Cet identifiant est déjà utilisé.'
							),
					
		),*/
		'name' => array(	
					'alpha' => array(
					'on' => 'create',
						'rule' => 'notBlank',
						'allowEmpty' => false,
						'required' => true,
						'message' => 'Votre nom'
						),
					
			),
		
		'plain_password' => array(	
					'alpha' => array(
					'on' => 'create',
						'rule' => 'alphaNumeric',
						'allowEmpty' => false,
						'required' => true,
						'message' => 'Alphanumérique: Lettres ou chiffres seulement'
						),
					
					'between' => array(
						'rule' => array('between', 6, 15),
						'message' => 'Doit comporter de 6 à 15 caractères'
					),
			),
				'email' => array(
						'valid' => array(
							'rule' => 'notBlank',
							'required' => true,
							'allowEmpty' => false,
							//'on' => 'create',
							'message' => 'Vous devez fournir une adresse électronique.'
				),	/*				 
				'unique' => array(
								'rule' => 'isUnique',
								'message' => 'Cette adresse est dejà utilisée.'
							),*/

			),
			
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $hasMany = array(
	/*
					'Cours' => array(
					'className' => 'Cour',
					'foreignKey' => 'cours_id',
					'conditions' => '',
					'dependent'=>true,
					'fields' => '',
					'order' => ''
				),
	*/
				'Comment' => array('className' => 'Comment',
								'foreignKey' => 'user_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			),/*
		        'Post' => array('className' => 'Post',
                              'foreignKey' => 'user_id',
                              'dependent' => false,
                              'conditions' => '',
                              'fields' => ''
			),*/
                'Document' => array('className' => 'Document',
                              'foreignKey' => 'creator',
                              'dependent' => false,
                              'conditions' => '',
                              'fields' => 'id,title'
                        ),
                'Ressource' => array('className' => 'Ressource',
                              'foreignKey' => 'creator',
                              'dependent' => false,
                              'conditions' => '',
                              'fields' => 'id,titre'
                        ),
               'Personnage' => array('className' => 'Personnage',
                              'foreignKey' => 'creator',
                              'dependent' => false,
                              'conditions' => '',
                              'fields' => 'id,nom'
                        ),
               'Chanson' => array('className' => 'Chanson',
                              'foreignKey' => 'creator',
                              'dependent' => false,
                              'conditions' => '',
                              'fields' => 'id,titre'
                        ),
				'Quiz' => array('className' => 'Quiz',
                              'foreignKey' => 'creator',
                              'dependent' => false,
                              'conditions' => '',
                              'fields' => 'id,title'
                        ),
				'Vocabulaire' => array('className' => 'Vocabulaire',
                              'foreignKey' => 'creator',
                              'dependent' => false,
                              'conditions' => '',
                              'fields' => 'id,title'
                        ),
                'Project' => array('className' => 'Project',
                              'foreignKey' => 'creator',
                              'dependent' => false,
                              'conditions' => '',
                              'fields' => 'id,title'
                        ),


	);
//----------------------------------------------------------------------
	var $hasOne = array (
        'Profile' => array('className' => 'Profile',
                'foreignKey' => 'user_id',
                'dependent' => true,
                'conditions' => '',
                'fields' => 'id,name,city,country,instrument,avatar,notify,donations,public'
 
        ),

          'Professeur' => array('className' => 'Professeur',
                'foreignKey' => 'user_id',
                'dependent' => true,
                'conditions' => '',
                'fields' => 'id,titre,nom,prenom,courriel'
            )

        );
        
	

//----------------------------------------------------------------------
	public function check_valid_ccode($ccode=null)
{
		if($ccode==null) return false;
		
		$Cours = ClassRegistry::init('Cour');
		if(!$Cours) {
			throw new RuntimeException(__d('users', 'Unable to create model: Cours.'));
			//die("Unable to create Cour");
		}
		
		$Cours->contain('Professeur');
		$cours = $Cours->find('first', 
			array('conditions'=>['ccode'=>$ccode])); 
			//'fields'=>array('id','Cour.titre','Professeur.titre', 'ccode','horaire')));
		if(empty($cours)) return false;

		unset($cours['Cour']['description']);

		return $cours;

}
//----------------------------------------------------------------------
		public function createProfile($user_id, $name)
	{
		$this->Profile->create();
		
		if(!$this->Profile->save(array('user_id'=>$user_id, 'name'=>$name), array('validate'=>false))) {
			throw new RuntimeException(__d('users', 'Unable to create profile.'));
		}
		
		return $this->Profile->id;

	}
//----------------------------------------------------------------------	
/*   public function afterSave($created, $options = array()) 
{
		debug($options);
        //make sure to do it on creation and not on update
        if ($created) {
            $this->Profile->save(array('user_id'=>$this->getLastInsertID(), 'name'=>$options['name']));
        }
}*/
//----------------------------------------------------------------------
/**
 * Checks the token for email verification
 *
 * @param string $token
 * @return array
 */
	public function checkEmailVerificationToken($token = null) {
		$result = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				$this->alias . '.email_verified' => 0,
				$this->alias . '.email_token' => $token),
			'fields' => array(
				'id', 'name', 'email', 'email_token_expires', 'cours_id', 'role')
			)
		);

		if (empty($result)) {
			return false;
		}
		return $result;
	}
//----------------------------------------------------------------------
/**
 * Verifies a users email by a token that was sent to him via email and flags the user record as active
 *
 * @param string $token The token that wa sent to the user
 * @throws RuntimeException
 * @return array On success it returns the user data record
 */
	public function verifyEmail($token = null) {
		
		$user = $this->checkEmailVerificationToken($token);

		if ($user === false) {
			throw new RuntimeException(__d('users', 'Invalid token, please check the email you were sent, and retry the verification link.'));
		}

/*
		$expires = strtotime($user[$this->alias]['email_token_expires']);
		if ($expires < time()) {
			throw new RuntimeException(__d('users', 'The token has expired.'));
		}
*/
		$user[$this->alias]['active'] = 1;
		$user[$this->alias]['email_verified'] = 1;
		$user[$this->alias]['email_token'] = null;
		$user[$this->alias]['email_token_expires'] = null;

		$user[$this->alias]['profile_id'] = $this->createProfile( $user['User']['id'], $user['User']['name']);
		
		$this->create_etudiant($user);
		
		
		$user = $this->save($user, array(
			'validate' => false,
			'callbacks' => false
		));
		
		$this->data = $user;
		return $user;
	}
//----------------------------------------------------------------------
	public function create_etudiant($user)
{

		$Etudiant = ClassRegistry::init('Etudiant');
		$Cours = ClassRegistry::init('Cour');
		$Cours->recursive=-1;
		$cours = $Cours->find('first', array('conditions'=>['id'=>$user['User']['cours_id']]));
//debug($cours);
//exit;
		$Etudiant->create();
		$etudiant = array('nom'=>$user['User']['name'], 
			'courriel'=>$user['User']['email'], 
			'cours_id'=>$user['User']['cours_id'],  
			'user_id'=>$user['User']['id'],
			'professor_id'=>$cours['Cour']['professeur_id'],
			'ccode'=>$cours['Cour']['ccode']);
			
		if(!$Etudiant->save($etudiant, false)) {
			throw new RuntimeException(__d('users', 'Unable to create etudiant.'));
		}

}
//----------------------------------------------------------------------
		public function unactivate($user_id)
	{
		$this->id=$user_id;
		$this->saveField('active', false);
	}
//----------------------------------------------------------------------
}
?>
