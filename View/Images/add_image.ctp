<div id="image-form" class="cartouche light-gray">
	
	<p>Add image <span class="right-aligned"><a href="javascript:" id="image-close"></a></span></p>
			
	<?php echo $this->Form->create('Image', array('type'=>'file', 'action'=>'add_image')); ?>
	
		<fieldset class="fatty light-blue">
			<?php
				echo $this->Form->input('title', array('style'=>'width: 300px'));
				echo $this->Form->input('model', array('type'=>'hidden','value'=>$model));
				echo $this->Form->input('foreign_key', array('type'=>'hidden','value'=>$foreign_key));
				
				echo $this->Form->input('type',  array('type'=>'hidden'));
			?>
				<div class="skinny clearfix">
					<div class="col-lg-6">
						<?php echo $this->Form->input('position');?> </div>
					<div class="col-lg-6">
						<?php echo $this->Form->input('alignment');?>
					</div>
				</div>
		
			<div class="tall-margins"><?php echo $this->Form->input($model, array('label'=>'Upload', 'type' => 'file', 'required'=>'required')); ?></div>
			
			<div class="pull-right">
				<?php echo $this->Form->end(__('Upload image')); ?>
			</div>
		</fieldset>		
	</form>

	<div id="output"></div>
	
</div>

<script>
	
	$('document').ready( function() {
			
			
			$('.expose').trigger('click');
			
			$("#image-form").on('click', "#image-close", function() {
				$('#overlay').trigger('click'); 
			});

	});
			
</script>
