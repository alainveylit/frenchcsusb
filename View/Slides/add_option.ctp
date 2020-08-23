<style>
label { width: auto; }
</style>
<div class="cartouche bordered form">

<?php echo $this->Form->create('Slide', ['type'=>'file', 'enctype'=>"multipart/form-data", 'method'=>"POST"]); ?>
	<fieldset class="fixed-input">
		<?php 
				echo $this->Form->input('title');
				
				echo $this->Form->input('image', ['type' => 'file']);
				echo $this->Form->hidden('image_dir');
				echo $this->Form->hidden('image_type');

				echo $this->Form->hidden('slideshow_id', array('value'=>$this->request->data['slideshow_id']));
				echo $this->Form->end("Ajouter cette image");
		?>
</fieldset>
</div>
    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
			$('#SlideAddForm').submit(function() {
				// submit the form
				$(this).ajaxSubmit();
				// return false to prevent normal browser submit and page navigation
				return false;
			});	
		});
 </script> 

