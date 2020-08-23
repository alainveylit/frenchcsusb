<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php $levels=array('0'=>'Débutant', 1=>'Intermédiaire', 2=>'Avancé', 3=>'Expert');?>

<?php echo $this->Form->create('Quiz',  ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Editer cet exercice'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', ['style'=>'width: 600px']);
		echo $this->Form->input('description');
	?>
		<table class="table">
			<tr>
				<td><?php echo $this->Form->input('cours_id');?></td>
				<td><?php echo $this->Form->input('published', array('type'=>'checkbox'));?></td>
				<td><?php echo $this->Form->input('difficulty', array( 'options'=>$levels));?></td>
			</tr>
			<tr>
				<td><?php echo $this->Form->input('type');?></td>
				<td><?php echo $this->Form->input('category_id');?> </td>
				<td><?php echo $this->Form->input('mode', array('label'=>'Mode', 'options'=>[0=>'image', 1=>'aveugle', 2=>'clavier']));?></td>
			</tr>
		</table>
		
		<?php echo $this->Form->hidden('creator');?>
		
		
		<?php echo $this->Form->input('image_url', ['type'=>'url', 'style'=>'width: 700px']);?>
		<?php echo $this->Form->input('image', ['type' => 'file', 'label'=>'Ou fichier...']); ?>
		<?php echo $this->Form->input('image_dir', ['type' => 'hidden']); ?>

		<?php echo $this->Html->link('/files/quiz/image/' . $this->Form->value('image_dir') . DS . $this->Form->value('image'));?>
		<div id="image-preview" style="width: 400px;">
		
		<?php if(!empty($this->request->data['Quiz']['image_url'])) :?>
		<img src="<?php echo $this->request->data['Quiz']['image_url'];?>" >
		<?php endif;?>
		</div>

	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>

</div>

<?php if($User['role']=='Admin') :?>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">

			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Quiz.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Quiz.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Quizzes'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		</ul>
	</div>
<?php endif;?>

<script>

$('document').ready( function() {
	
	var imglink = $('#QuizImageDir').next();
	if(imglink!==undefined) {
		var img = $('<img>');
		img.attr('src', imglink.attr('href'));
		$('#image-preview').append(img);
	}
});
</script>

