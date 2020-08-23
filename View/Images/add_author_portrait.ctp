<style>
	.fixed-input label { width: 100px; }
	div.required { clear: right; }
</style>

<div class="skinny cartouche rounded lightgray-gradient">
	
	<p class="skinny right-aligned"><a href="javascript:" id="image-close"><strong>Close</strong></a></p>
			
	<?php echo $this->Form->create('Image', array('type'=>'file', 'action'=>'add_author_portrait')); ?>
	
		<fieldset class="fixed-input bg-white">
			<?php
				echo $this->Form->input('title', array('style'=>'width: 200px'));
				echo $this->Form->input('model', array('type'=>'hidden'));
				echo $this->Form->input('foreign_key', array('type'=>'hidden'));	// profile id	
				echo $this->Form->hidden('creator');
				?>
				<div class="selfish skinny">
				<?php echo $this->Form->input('Profile', array('type' => 'file', 'class'=>'required')); ?>
				</div>	
				<?php
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
	
	$('document').ready( function() {
		
			$('.expose').trigger('click');

			$("#image-form").show();
			
			$("#image-form").on('click', "#image-close", function() {
				$("#image-form").empty().hide();
				$(".add-image").css('display', 'inline');
				$('#overlay').trigger('click'); 

			});

	});
			
</script>
