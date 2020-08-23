<?php echo $this->element('tinymce');?>
<?php $categories=array("Syllabus"=>"Syllabus", "Test"=>"Test", "Quiz"=>"Quiz", "Review"=>"Review", "Information"=>"Information", "Other"=>"Other");?>

<div class="fatty group">

	<h3><?php echo __('Edit Document'); ?></h3>
	<hr>
	<div class="fatty">
		

		<?php echo $this->Form->create('Document'); ?>
		<?php $document_id = $this->Form->value('id');?>
			<fieldset class="">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title', array('style'=>'width: 500px'));
				echo $this->Form->input('category', array('type'=>'select', 'options'=>$categories));


				echo $this->Form->input('description', array('style'=>'width: 500px'));
				echo $this->Form->input('notes');
				echo $this->Form->input('document', array('disabled'=>true, 'style'=>'width: 400px', 'label'=>'File name'));
				echo $this->Form->input('type');
				
				if($User['role']=='Admin') {
					echo $this->Form->input('showcase');
				}
				
				//echo $this->Form->input('type');
				//echo $this->Form->input('extension');
				//echo $this->Form->input('user_id');
				//echo $this->Form->input('document_dir');
				//echo $this->Form->input('size');
			?>
			Document type: <?php echo $this->Form->value('type');?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
	
	</div>

	
		<ul class="list-inline pull-right">
			<li><span class="glyphicon glyphicon-view"> </span> <?php echo $this->Html->link(__('View this document'),
			 array('action' => 'view', $document_id), array('class'=>'list')); ?></li>
			<li><span class="glyphicon glyphicon-remove"> </span> <?php echo $this->Form->postLink(__('Delete this document'), array('action' => 'delete', $this->Form->value('Document.id')), array('class'=>'cut'), __('Are you sure you want to delete # %s?', $this->Form->value('Document.id'))); ?></li>
			<li><span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link(__('List my documents'), array('action' => 'index'), array('class'=>'list')); ?></li>
		</ul>

</div>
