<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php $titles=array('M.'=>'M.', 'Mme'=>'Mme', 'Mlle'=>'Mlle', 'Dr'=>'Dr');?>
<?php echo $this->Form->create('Professeur'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un Professeur'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('titre', array('options'=>$titles));
		echo $this->Form->input('courriel');
		echo $this->Form->input('diplome');
		echo $this->Form->input('institution');
		echo $this->Form->input('adresse');
		echo $this->Form->input('bureau', ['label'=>'Heures de bureau', 'style'=>'width: 500px;']);
		echo $this->Form->input('phone');

		echo $this->Form->input('password');
		echo $this->Form->input('presentation');
		//echo $this->Form->input('last_login');
		echo $this->Form->input('image', ['type'=>'file']);
		echo $this->Form->hidden('image_dir');

		echo $this->Form->hidden('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Liste des Professeurs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouveau Cours'), array('controller' => 'cours', 'action' => 'add')); ?> </li>
	</ul>
</div>
