<div class="panel">
	
	<h2 class="banner"><?php echo $cours['Cour']['titre'];?>
		<small class="pull-right">Professeur: <?php echo $this->Crud->professor_name($cours['Professeur']);?></small>
	</h2>
	<h4><?php echo $cours['Cour']['horaire'];?></h4>
	<div>
		<?php echo $cours['Cour']['description'];?>
		<hr>
		<p class="centered"><span class="glyphicon glyphicon-user">&nbsp;</span>&nbsp;Créez votre compte sur ce site ici:
			<?php echo $this->Html->link('Inscription', array('controller'=>'users', 'action'=>'enregistrement', $cours['Cour']['ccode']));?>
		</p>
	</div>
	
			<div class="cartouche bordered" style="width: 700px; margin: auto; overflow: auto;">   
                 <p class="centered"><span class="glyphicon glyphicon-hand-right"> </span> Entrez ici! </p>    
					<div class="login centered">
						<img class="inset" src="/img/BadAtLanguages_6.jpg" style="max-width: 300px">
						<fieldset style="padding-top: 22px;">                           
							<?php echo $this->Form->create('User', array('url'=>'/users/login'));?>
											
							<div class="input-group __input-sm" >
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input class="form-control" type="text" id="username" name="username"  placeholder="Identifiant/Adresse courriel" />
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
								   array('controller'=>'users', 'action' => 'renew_password'));
							  ?>
								<?php /* <span class="glyphicon">  </span> 
								 <span class="glyphicon glyphicon-user"> </span>         
								 <?php echo $this->Html->link(__d('users', 'Créer un compte! '), 
															array('controller' => 'users', 'action' => 'register')); ?>
							  </span> */?>
                           </p>
					</div>
</div>

	<hr>
	<div>
		<?php echo $cours['Landing']['description'];?>
	</div>
	


	<?php //debug($cours);?>
</div>
