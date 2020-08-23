<div class="fatty view">
		<?php echo $this->Form->create('User', array('action'=>'new_password'));?>
				<fieldset>
						<legend><?php echo __('Editer le mot de passe de:');?> <i><?php echo $this->Form->value('name');?></i></legend>
				<?php

						echo $this->Form->input('id');
						echo $this->Form->input('username', array('type'=>'hidden'));
		 
						$label =  "Nouveau mot de passe pour " . $this->Form->value('username');
						//echo $this->Form->input('password', array('label'=>$label, 'value'=>''));
						echo $this->Form->input('plain_password', array('type'=>'password', 'label'=>'Mot de passe'));
						
						echo $this->Form->input('name', array('type'=>'hidden'));
						echo $this->Form->input('email', array('type'=>'hidden'));
				?>
				</fieldset>
		<?php echo $this->Form->end('Valider');?>
</div>

