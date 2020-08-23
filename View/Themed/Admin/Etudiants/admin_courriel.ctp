<?php echo $this->element('tinymce');?>
<div class="fatty rounded cartouche">
	<?php //debug($this->request->data);
		$student_name = $this->request->data['Etudiant']['nom'] . ", " . $this->request->data['Etudiant']['prenom'];
	?>

	<h3 class="green-diagonal top-rounded">Contacter par courriel</h3>	
	<?php echo $this->Form->create('Etudiant');?>
		<fieldset>
			<h4>De: <?php echo $User['name'];?> &agrave; <strong><?php echo $student_name;?></strong></h4>
			<div>
				<?php //echo $this->Form->hidden('User.email');?> 
				<?php echo $this->Form->hidden('id');?> 
				<?php echo $this->Form->hidden('From.id', array('value'=>$Sender['id']));?> 
				<?php echo $this->Form->hidden('From.name', array('value'=>$Sender['name']));?> 				
				<?php //echo $this->Form->hidden('From.email', array('value'=>$Sender['email']));?> 
				<?php echo $this->Form->input('From.message', array('type'=>'textarea', 'label'=>false));?> 
			</div>
				<div class="pull-right"><?php echo $this->Form->end('Envoyer!');?></div>
		</fieldset>
		<p>Votre texte sera envoy&eacute; &agrave; votre correspondent.</p>
</div>
