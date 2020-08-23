<?php echo $this->element('tinymce');?>
<?php $categories=array("Syllabus"=>"Syllabus", "Test"=>"Test", "Quiz"=>"Quiz", "Information"=>"Information", "Other"=>"Other");?>
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2><?php echo __('Documents'); ?>

			</h2>							
		</div>

	<div class="panel-body">

<div class="documents form">
<?php echo $this->Form->create('Document', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add a New Document'); ?></legend>
	<?php
		echo $this->Form->input('title', array('style'=>'width: 500px'));
		echo $this->Form->input('description', array('style'=>'width: 500px'));
		echo $this->Form->input('category', array('type'=>'select', 'options'=>$categories));

		echo $this->Form->input('document', array('type' => 'file')); 
		echo '<i>Allowed types: ', join(', ' , $allowed_types), '</i>';
		echo $this->Form->input('notes');
		//echo $this->Form->input('story_id', array('value'=>$story_id, 'type'=>'hidden'));	
		//echo $this->Form->input('filename');
		//echo $this->Form->input('mime');
		//echo $this->Form->input('extension');
		//echo $this->Form->input('user_id');
		//echo $this->Form->hidden('document_dir');
		//echo $this->Form->input('size');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
