<?php echo $this->element('tinymce');?>
<div class="fatty group bordered">
	<?php //debug($cours);?>
	<?php echo $this->Form->create('Etudiant');?>
	<fieldset>
		<h4>De: <?php echo $User['name'];?> &agrave; tous les &eacute;tudiants du cours de: <strong><?php echo $cours['titre'];?></strong></h4>

		<div>
			<?php //echo $this->Form->hidden('User.email');?> 
			<?php //echo $this->Form->hidden('id');?> 
			<?php //echo $this->Form->hidden('From.id', array('value'=>$Sender['id']));?> 

			<?php //echo $this->Form->hidden('From.name', array('value'=>$Sender['name']));?> 
			
			<?php //echo $this->Form->hidden('From.email', array('value'=>$Sender['email']));?> 
			<?php echo $this->Form->input('From.message', array('type'=>'textarea', 'label'=>false));?> 
		</div>
			<div class="pull-right wide-margins"><?php echo $this->Form->end('Send email');?></div>
	</fieldset>
	<p>Ce texte sera envoy&eacute; &agrave; tous les &eacute;tudiants</p>
	
</div>
