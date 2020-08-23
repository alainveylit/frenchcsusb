<?php echo $this->element('tinymce');?>
<?php //$categories=array("Syllabus"=>"Syllabus", "Test"=>"Test", "Quiz"=>"Quiz", "Review"=>"Review", "Information"=>"Information", "Presentation"=>"Presentation", "Other"=>"Other");?>

<div class="fatty group">

	<h3><?php echo __('Editer ce Document'); ?></h3>
	<hr>
	<div class="fatty">
		

		<?php echo $this->Form->create('Document'); ?>
		<?php $document_id = $this->Form->value('id');?>
			<fieldset class="">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title', array('style'=>'width: 500px'));
				echo $this->Form->input('category', array('type'=>'select', 'options'=>$categories));
				echo $this->Form->input('cours_id');
				
				echo $this->Form->input('showcase', ['label'=>'Public']);


				echo $this->Form->input('description', array('style'=>'width: 500px'));
				echo $this->Form->input('notes');
				echo $this->Form->input('document', array('disabled'=>true, 'style'=>'width: 400px', 'label'=>'File name'));
				echo $this->Form->input('type');
				
			?>
			Document type: <?php echo $this->Form->value('type');?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
	
	</div>

	
		<ul class="list-inline pull-right">
			<li><span class="glyphicon glyphicon-search"> </span> <?php echo $this->Html->link(__('View this document'),
			 array('action' => 'view', $document_id)); ?></li>
			<li><span class="glyphicon glyphicon-remove"> </span> <?php echo $this->Form->postLink(__('Delete this document'), array('action' => 'delete', $this->Form->value('Document.id')), array('class'=>'cut'), __('Are you sure you want to delete # %s?', $this->Form->value('Document.id'))); ?></li>
			<li><span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link(__('List my documents'), array('action' => 'index')); ?></li>
		</ul>

</div>
