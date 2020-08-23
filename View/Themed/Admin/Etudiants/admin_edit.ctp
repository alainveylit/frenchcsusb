<div class="fatty form">
	<?php //debug($this->request->data);?>
<?php echo $this->Form->create('Etudiant'); ?>
	<fieldset>
		<legend><?php echo __('Edit Etudiant'); ?>
		
		<small class="pull-right"><?php echo $this->Html->link('Profile',
		 array('controller'=>'users', 'action'=>'view', $this->request->data['Etudiant']['user_id']));?></small>
		</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom', ['style'=>'width:500px;']);
		echo $this->Form->input('prenom', ['style'=>'width:500px;']);
		echo $this->Form->input('courriel', ['style'=>'width:500px;']);
		echo $this->Form->hidden('user_id');
		echo $this->Form->input('cours_id', ['options'=>$cours, 'style'=>'width:400px;']);
		echo $this->Form->input('major', ['style'=>'width:400px;']);
		echo $this->Form->input('enrolled');
		echo $this->Form->input('attendance', ['label'=>'Absences']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Etudiant.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Etudiant.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Etudiants'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
