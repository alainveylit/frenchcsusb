<div class="fatty form">
<?php echo $this->Form->create('Etudiant'); ?>
	<fieldset>
		<legend><?php echo __('Add Etudiant'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('courriel');

		echo $this->Form->input('origine');
		echo $this->Form->input('class');
		echo $this->Form->input('major');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Etudiants'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
