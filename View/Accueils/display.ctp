<div class="row view">
	<div>
		<?php echo $accueil['Accueil']['description']; ?>
	</div>
		
		<p class="centered"><span class="glyphicon glyphicon-hand-right"> </span> Entrez ici! </p>
		
		<div  class="cartouche bordered" style="width: 700px; margin: auto; overflow: auto;">
			
		<?php if(!empty($accueil['Accueil']['image'])) {
				echo $this->Crud->show_upload_image('accueil', $accueil['Accueil']);
		}?>
	
			<div class="login centered">
				<?php echo $this->Form->create('User', array('url'=>'users/login'));?>

				<fieldset style="padding-top: 22px;">				
					<?php echo $this->Form->create('User', array('url'=>'/users/login'));?>
					
                 <div class="input-group __input-sm" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input class="form-control" type="text" id="username" name="username"  placeholder="Identifiant" />
                    </div>
                    <p></p>
                   <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" type="password" id="plain_password" name="plain_password" placeholder="mot de passe" />
                    </div>

					<?php echo $this->Form->end("Valider");?>
					
				</fieldset>
			</div>	
			</div>
			
				<div class="centered">
				<p>
						<span class="glyphicon glyphicon-question-sign"> </span>	
						<?php echo $this->Html->link(__d('users', 'Zut! J\'ai oublié mon mot de passe...'), 
								array('controller'=>'users', 'url' => 'renew_password'));
						?>
						<?php /*
							<span class="glyphicon">  </span> 
							<span class="glyphicon glyphicon-user"> </span>		
							<?php echo $this->Html->link(__d('users', 'Créer un compte! '), 
								array('controller' => 'users', 'action' => 'register')); ?>
							</span>	
						* */?>
				</p>

	</div>
</div>

