<style>
	#UserEditForm{
	width: 650px;
	margin: auto;
}
</style>

<div class="fatty white cartouche">
	<?php //debug($Cours);?>
	<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php echo __('Editer mes identifiants');?></legend>
		<?php /*$roles=array('Admin'=>'Admin','Contributor'=>'Contributor','Registered'=>'Registered','User'=>'User');*/ ?>
		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('label'=>'Identifiant'));
		//echo $this->Form->input('name');
		echo $this->Form->input('email', array('label'=>'Courriel'));
		echo $this->Form->input('cours_id', array('options'=>$Cours));
	?>
        <div class="action right-aligned">
				<?php echo $this->Html->link('Editer mon profil', array('controller'=>'profiles', 'action'=>'edit'));?>
              | <?php echo $this->Html->link('Changer mon mot de passe', array('controller'=>'users', 'action'=>'new_password'));?>
        </div>

	</fieldset>
	<?php echo $this->Form->end('Submit');?>

	
</div>
