<div class="fatty form">
<?php echo $this->Form->create('Etudiant'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un étudiant à mon cours'); ?></legend>
	<?php
		echo $this->Form->input('cours_id', array('value'=>$cours_id));
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('courriel');

		echo $this->Form->input('origine');
		echo $this->Form->input('class');
		echo $this->Form->input('major');
		
		echo $this->Form->input('enrolled');
		//echo $this->Form->input('user_id');
		//echo $this->Form->input('attendance');
		//echo $this->Form->input('grade');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Liste de mes Etudiants'), array('action' => 'index')); ?></li>
	</ul>
</div>
