<div>
				
	<?php echo $this->Form->create('Image', array('type'=>'file', 'action'=>'add_portrait')); ?>
	
		<fieldset class="bg-white fatty">
			<?php
				echo $this->Form->input('title', array('style'=>'width: 200px'));
				echo $this->Form->input('model', array('type'=>'hidden'));
				echo $this->Form->input('foreign_key', array('type'=>'hidden'));	// profile id		
				echo $this->Form->input('profile', array('type' => 'file', 'class'=>'required')); 
				echo $this->Form->input('type',  array('type'=>'hidden'));
				//echo $this->Form->input('profile_id',  array('type'=>'text'));
			?>
			
			
		<div class="right-aligned">
			<?php echo $this->Form->end(__('Upload image')); ?>
		</div>
		</fieldset>
		
	<!--div id="output"></div-->
	
</div>

<script>
	

		
			$("#image-form").show();
			$'.expose').trigger('click');
			$("#image-form").on('click', "#image-close", function() {
				$("#image-form").empty().hide();
				$(".add-portrait").css('display', 'inline');
			});
	
	});
			
</script>
