<?php echo $this->element('tinymce', array('_simple'=>true));?>

<div class="fatty form">
<div>
	<?php echo $this->Form->create('Presentation', ['type' => 'file']); ?>
	<fieldset style="min-width: 100%;">
		<legend><?php echo __('Présentation'); ?> de : <?php echo $this->request->data['Creator']['name'];?>
			<small class="pull-right">Cours: <?php echo $this->request->data['Cours']['titre'];?></small>
		</legend>
		
	<?php echo $this->Form->input('id'); ?>
	
	<h4>Titre: 	<?php echo $this->Form->value('titre');?></h4>
		<div class="row">
			<?php echo $this->Form->input('description');?>
		</div>

	</fieldset>
	

	<?php echo $this->Form->end(__('Enregistrer')); ?>

</div>


	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Form->postLink(__('Effacer cette présentation'), array('action' => 'delete', $this->Form->value('Presentation.id')), array('class'=>'erase'), __('Are you sure you want to delete # %s?', $this->Form->value('Presentation.id'))); ?></li>
			<li><?php echo $this->Html->link(__('Mes Présentations'), array('action' => 'index')); ?></li>
		</ul>
	</div>
</div>

<?php //echo $this->element('keyboard');?>
