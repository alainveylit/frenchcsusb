<style>

	.fixed-input input[type="text"] {
		width: 300px;
		clear: right;
		margin-bottom: 12px;
	}
	.fixed-input label {
		text-align: right;
		width: 70px;
		clear: left;
	}
	h4 { font-weight: normal; padding: 4px; }
	fieldset { background: white; width: 500px; padding: 8px 12px;  }
</style>

<div class="cartouche light-blue">

	<span class="button b-close"><span>X</span></span>


	<h4 class="top-rounded"><strong class="wide-margins">Upload a document: </strong>
		<span  class="right-aligned" title="Close window">
			<a href="javascript:" id="image-close"></a>
		</span>
	</h4>

	<?php echo $this->Form->create('Document', array('type'=>'file', 'class'=>'form-horizontal')); ?>
	
		<fieldset>
		<?php
			//$type = ($model=='Post') ? 'attachment' : 'document';
			//echo $this->Form->hidden('subtype', array('value'=>$type));
			echo $this->Form->input('title');
			echo $this->Form->input('document', array('type' => 'file')); 
			echo '<i>Allowed types: ', join(', ' , $allowed_types), '</i>';
			
			//echo $this->Form->input('story_id', array('value'=>$story_id, 'type'=>'hidden'));
			echo $this->Form->input('model', array('type'=>'hidden', 'value'=>$model));
			echo $this->Form->input('foreign_key', array('type'=>'hidden', 'value'=>$foreign_key));
		?>
			<div class="right-aligned"><?php echo $this->Form->end(__('Upload')); ?></div>

		</fieldset>

</div>



<script>
	
	$('document').ready( function() {
		

		$("#document-form").css('top', '-150px');
		$('.expose').trigger('click');

			$("#document-form").show();
			
			$("#document-form").on('click', "#image-close", function() {
				$("#document-form").empty().hide();
				$(".add-document").css('display', 'none');
				$('#overlay').trigger('click');
			});



	});
			
</script>

