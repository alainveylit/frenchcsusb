<style>
label { width: 160px; }
</style>
<div class="fatty view">
		<?php echo $this->Form->create('User', array('url'=>'renew_password'));?>
				<fieldset class="wide">
						<legend><?php echo __('Votre adresse de courriel:');?> <i>
							<?php echo $this->Form->input('email', array('label'=>'Courriel: '));?></i></legend>
				</fieldset>
		<?php echo $this->Form->end('Envoyer!');?>
		<p>Vous recevrez un message avec un mot de passe temporaire qui vous permettra de vous identifier.</p>
</div>

