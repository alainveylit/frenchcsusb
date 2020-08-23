<?php
/**
 * Copyright 2010 - 2014, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2014, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 ?>
 <div>
	 <h3>Classe: <?php echo $cours['Cour']['titre'];?> 
	  Professeur: <?php echo $cours['Professeur']['nom'];?>, <?php echo $cours['Professeur']['prenom'];?>
	 </h3>
	<h4>Horaires: <?php echo $cours['Cour']['horaire'];?></h4>
	 <p><?php echo __d('users', 'Bonjour %s,', $user['name']);?></p>
	 
	 <p>Pour valider votre enregistrement &agrave; ce cours, vous devez <a href="
	 <?php echo Router::url(array('admin' => false,	'controller' => 'users', 'action' => 'verify', 'email', $user['email_token']), true);?>">
			 cliquer ce lien</a> dans les 24 heures qui suivent la reception de ce message. 
	</p>
	<p>Pour acc&eacute;der au site du cours, vous devrez vous identifier avec votre adresse de courriel et votre mot de passe
		 &agrave; l'adresse suivante:
		 <?php $url =  Router::url(array('admin' => false, 'controller' => 'users', 'action' => 'login'), true);?>
		<a href="<?php echo $url;?>"><?php echo $url;?></a>
	</p>
</div>
<?php /*
echo __d('users', 'Hello %s,', $user['name']);
echo "\n";
echo __d('users', 'to validate your account, you must visit the URL below within 24 hours');
echo "\n";
echo Router::url(array('admin' => false, 
 'controller' => 'users', 'action' => 'verify', 'email', $user['email_token']), true);
*/?>
