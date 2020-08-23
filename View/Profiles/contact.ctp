<?php echo $this->element('tinymce');?>
<div class="fatty rounded cartouche">
	<h3 class="green-diagonal top-rounded">Contacter par courriel</h3>	
	<?php echo $this->Form->create('Profile');?>
		<fieldset>
			<h4>DE: <?php echo $User['name'];?> &agrave; <strong><?php echo $this->Form->value('name');?></strong></h4>
			<div>
				<?php //echo $this->Form->hidden('User.email');?> 
				<?php echo $this->Form->hidden('id');?> 
				<?php echo $this->Form->hidden('From.id', array('value'=>$Sender['id']));?> 

				<?php echo $this->Form->hidden('From.name', array('value'=>$Sender['name']));?> 
				
				<?php //echo $this->Form->hidden('From.email', array('value'=>$Sender['email']));?> 
				<?php echo $this->Form->input('From.message', array('type'=>'textarea', 'label'=>false));?> 
			</div>
				<div class="bg-white right-aligned wide-margins"><?php echo $this->Form->end('Envoyer!');?></div>
		</fieldset>
	<p>Votre texte sera envoy&eacute; &agrave; votre correspondent.</p>
</div>
