<div class="ajax-form">

<?php echo $this->Form->create('Option', array('action'=>'edit_title')); ?>
        <?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('style'=>'width:200px'));
		echo $this->Form->input('correct_answer', 
				array('style'=>'margin-left: 0px', 'label'=>'Correct answer', 'type'=>'checkbox'));
				
		echo $this->Form->input('index');
		echo $this->Form->end("Update");
		/*
		echo $this->Ajax->submit('Update', 
			 array('url'=> array('controller'=>'facimages', 'action'=>'edit_title'), 
				'update' => 'update-title',
				//'after'=>"t = $('#FacimageTitle').val(); $('#new-title').text(t);"
			));*/
	?>
		<p id="update-title"></p>

 
</div>
<script>

        $(document).ready(function() { 
            $('#OptionEditTitleForm').ajaxForm(function() { 
                //alert("Thank you for your comment!"); 
                $('#update-title').text("Option updated");
                return false;
            }); 
        }); 

</script>
