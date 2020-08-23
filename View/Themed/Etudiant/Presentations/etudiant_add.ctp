<?php echo $this->element('tinymce');?>
<style>
.half { width:24%; float: left; margin: 0 1%; }
</style>
<div class="fatty">
	<?php //debug($User);?>
	<?php echo $this->Form->create('Presentation', ['type' => 'file']); ?>
		<fieldset>
			<legend><?php echo __('Ajouter une Présentation'); ?>		
				<small class="pull-right">Cours: <?php echo $cours['titre'];?></small>
			</legend>
		<?php
		//debug($cours_id);
		//debug($cours);
			echo $this->Form->hidden('cours_id',  array('value'=>$cours_id));
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
			<span></span>
		</div>
		<div class="row">
			<div class="col-lg-9"><?php echo $this->Form->input('description');?></div>
			<div class="col-lg-3" id="vocab"><?php echo $this->Form->input('vocabulaire', array('class'=>'vocabulary'));?></div>
		</div>

	<?php
		//echo $this->Form->input('description', array('label'=>'Brouillon', 'after'=>'<i>Composez votre texte, puis faites un copier/coller pour produire un PDF</i>'));
		//echo $this->Form->input('vocabulaire', array('after'=>'<i>Ajoutez des mots et expressions en rapport avec le thème de votre composition.</i>', class=>'vocabulary'));
		
		echo $this->Form->input('document', ['type' => 'file', 'after'=>'Formats autorisés: PDF, docx, image, xcl']); 
		echo $this->Form->input('document_dir', ['type' => 'hidden']); 
		echo $this->Form->hidden('creator', array('value'=>$creator));
	?>
	</fieldset>
	
	<div><?php echo $this->Form->end(__('Enregistrer')); ?>
	<span class="pull-right"><?php echo $this->element('keyboard_shortcuts');?></span>
	</div>

	
	
	<p style="text-align: right;"><?php echo $this->Html->link(__('Mes Présentations'), array('action' => 'index')); ?></p>

</div>


<?php echo $this->element('keyboard');?>
