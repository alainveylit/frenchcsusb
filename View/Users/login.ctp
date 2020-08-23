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
<style>
img:hover {
	transform: scale(1.15);
	transition: 2s ease-in-out;
	
}

</style>
<div class="container">
<div class="panel fatty">
	<div class="row centered">Cours de fran&ccedil;ais &agrave; CSUSB - Automne 2018</div>
	<div class="col-lg-4">
		<img src="/img/DAVID-WALKER-NANCY-FRANCE.jpg" style="margin: auto; padding-top: 100px;">
	</div>
		<div class="col-lg-6">
			<div class="cartouche centered">
			<h2><?php echo __d('users', 'Identifiants'); ?></h2>
			<hr>
			<?php echo $this->Session->flash('auth');?>
		
			
				<?php //echo $this->Form->create('User', array('url'=>'/users/login'));?>


				<fieldset>				
					<?php echo $this->Form->create('User', array('url'=>'/users/login'));?>
					
                 <div class="input-group __input-sm" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input class="form-control" type="text" id="username" name="username"  placeholder="Adresse de courriel" />
                    </div>
                    <p></p>
                   <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" type="password" id="plain_password" name="plain_password" placeholder="Mot de passe" />
                    </div>

					<?php echo $this->Form->end("Valider");?>
				</fieldset>

				
			</fieldset>
			</div>
			<div>
				<p class="centered">
						<span class="glyphicon glyphicon-question-sign"> </span>	
						<?php echo $this->Html->link(__d('users', 'J\'ai oublié mon mot de passe...'), 
								array('action' => 'renew_password'));
						?>
						<?php /*
						<span class="glyphicon">  </span> 
						<span class="glyphicon glyphicon-user"> </span>		
						<?php echo $this->Html->link(__d('users', 'Créer un compte! '), 
							array('controller' => 'accueils', 'action' => 'display')); ?>
						</span>	*/?>
				</p>
			</div>
					
<h4 class="centered fatty">	
		</h4>
			
		</div>

		<?php //echo $this->element('Users.Users/sidebar'); ?>
	</div>
</div>

<script>
	$('document').ready( function() {
		$('.navbar-form').hide();
	});
</script>
