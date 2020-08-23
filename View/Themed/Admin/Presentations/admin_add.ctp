<?php echo $this->element('tinymce');?>
<style>
.half { width:24%; float: left; margin: 0 1%; }
</style>
<div class="fatty">
	<?php //debug($User);?>
	<?php echo $this->Form->create('Presentation'); ?>
		<fieldset>
			<legend><?php echo __('Ajouter une Présentation'); ?>		
				<small class="pull-right">Cours: <?php echo $cours['titre'];?></small>
			</legend>
		<?php
		//debug($cours);
			echo $this->Form->hidden('cours_id');
			echo $this->Form->input('titre', array('style'=>'width:700px'));
		?>
		<div class="row">
			<span class="half">
				<?php echo $this->Form->input('medium', array('options'=>$media));?>
			</span>
			<span class="half">
				<?php echo $this->Form->input('focus', array('options'=>$focuses));?>
			</span>
			<span class="half">
				Public: <?php echo $this->Form->checkbox('public');?>
			</span>
			<?php echo $this->Form->input('creator', array('options'=>$students)); ?>
			
			<span>
			
			</span>
		</div>
		<div class="row">
			<?php echo $this->Form->input('description');?>
		</div>

	</fieldset>
	
	<div><?php echo $this->Form->end(__('Enregistrer')); ?>
	<span class="pull-right"><?php echo $this->element('keyboard_shortcuts');?></span>
	</div>

	
	<p style="text-align: right;"><?php echo $this->Html->link(__('Mes Présentations'), array('action' => 'index')); ?></p>

</div>


<?php echo $this->element('keyboard');?>
