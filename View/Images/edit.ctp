<style>

select { font-size: 100%; height: 32px; }
	
div.input {
	float: left;
	margin: 0;
	font-weight: normal;
}
input[type=range] {
	width: 80%;
	float: left;
}
input[type=range].vertical
{
    writing-mode: bt-lr; /* IE */
    -webkit-appearance: slider-vertical; /* WebKit */
    width: 8px;
    height: 200px;
    padding: 0 5px;
}
button { padding: 4px 8px; }

#ImageHeight { float: none; width: 100%; margin: 0; }

fieldset { margin: 0; padding: 0; }

#image-upload { 
	position: absolute; 
	bottom: 0px; 
	right: 0px;
	width: 275px; 
	height: 100px; 
	border: 1px solid gray; 
	padding: 8px 12px; 
	z-index: 99;
	background: whitesmoke;
	border-radius: 11px;
	box-shadow: 2px 3px 4px gray;
	}
	
	.illustration { clear: both;}
	
	p.bottom-text, p.top-text { clear: both; float: none; font-size: 36px; }
	
	img { border: 1px solid lightgray; }
	
</style>
<div class="group">	

	<div class="fatty" style="overflow: auto;">
		
	<h3 class="skinny selfish"><?php echo __('Edit Image'); ?>
	
		<span class="right-aligned small-text">
				<?php
					$model = $this->request->data['Image']['model'];
					$controller = Inflector::underscore(Inflector::pluralize($model));
					echo $this->Html->link(h('Back to '.$model), array('controller'=>$controller, 'action'=>'view', $this->request->data['Image']['foreign_key']));
				?>
		</span>
	</h3>

	<div class="fatty green-gradient cartouche">
	
	<?php echo $this->Form->create('Image', array('type'=>'file')); ?>
	
			<fieldset class="fixed-input ">
				
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('model', array('type'=>'hidden'));
					echo $this->Form->input('foreign_key', array('type'=>'hidden'));
					echo $this->Form->input('title');
					//echo $this->Form->input('Image.file.remove', array('type' => 'checkbox', 'label' => 'Remove existing file'));
				?>

				
			</fieldset>

			<fieldset>
			
				<div>
				
					<div class="columns-wrapper" style="border-bottom: 1px solid green">
						
						<p class="skinny centered" style="border-bottom: 1px solid green;">Preview: </p>

						<div class="left" style="width: 10%; border: none; text-align: center; ">
							
							<?php echo $this->Form->input('height',  array('type'=>'number', 'class'=>'centered', 'style'=>'width:44px; margin: 0; '));?>
						</div>
					
						<div id="image" class="right centered selfish bg-white" style="width:90%; border-left: 1px dotted green;">
								<p class="top-text"> * * * </p>
									<?php $this->Crud->show_image($this->request->data['Image']);?>
								<p class="bottom-text"> * * * </p>
						</div>
				</div>
				
				<div>
					
					<?php echo $this->Form->input('width', array('type'=>'number', 'style'=>'width:44px; margin-left: 24px; '));?>
					<div class="tall-margins">
						
						<ul class="horz-list skinny right-aligned no-border" style="padding: 0;">
							<li><?php echo $this->Form->input('position');?></li>
							<li><?php echo $this->Form->input('alignment');?></li>
							<li>
								<button type="button" onclick="reset_size()" >Original size</button>
							</li>
							<li  style="position: relative">
								<button type="button" class="change_image">Change image</button>
								<div id="image-upload" style="display: none;">
									<a href="javascript:" class="right-aligned u_toggler">Cancel</a>
									<?php echo $this->Form->input($model, array('type'=>'file', 'label'=>'Change image'));?>
								</div>

							</li>
						</ul>
					</div>
											
					<div class="selfish right-aligned tall-margins"><?php echo $this->Form->end(__('Save')); ?></div>

				</div>

			</div>
			
			</fieldset>

	</div>
	
	<div class="right-aligned selfish">
	Image URL: <span id="img-url"></span>
	
	</div>

	</div>	
	
	

	<div class="actions">
		
		<ul class="horz-list lightgray-gradient bottom-flushed black-crud">
			
			<li><?php echo $this->Form->postLink(__('Delete this image'),
			 array('action' => 'delete', $this->Form->value('Image.id')), 
			 array('class'=>'cut', 'title'=>'Delete this image'), __('Are you sure you want to delete this image [# %s]?', $this->Form->value('Image.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List my Images'), array('action' => 'index'), array('class'=>'list')); ?></li>
		</ul>
	</div>

</div>
<?php //debug($this->request->data);?>
<script>

var width = "<?php echo $size[0];?>";
var height = "<?php echo $size[1];?>";

	$('#img-url').text( $('#<?php echo $this->request->data['Image']['id'];?>').attr('src'));
	
	function reset_size() {
		$("#ImageWidth").val(width);
		$("#ImageHeight").val(height);
		$("#image > div > img").attr('height', height).attr('width', width);
	}

	$('document').ready( function() {
			
			if($("#ImageWidth").val()==0) $("#ImageWidth").val(width);
			if($("#ImageHeight").val()==0) $("#ImageHeight").val(height);

			$("#ImageWidth").change( function() {
				var w = $(this).val();
				var h = Math.ceil( ($(this).val()/width) * height);
				$("#ImageHeight").val(h);
				$("#image > div > img").attr('height', h).attr('width', w);
				//$("#image > img").attr('width', w);
				
				return false;
			});

			$("#ImageHeight").change( function() {
				var h = $(this).val();
				var w = Math.ceil( (h/height) * width);
				$("#ImageWidth").val(w);
				$("#image > div > img").attr('width', w).attr('height', h);
				//$("#image > img").attr('height', h);
				return false;
			});
			
			$("#ImageAlignment").change( function() {
					$('.illustration').attr('class', 'illustration');
					var alignment = $("#ImageAlignment").val();
					$('.illustration').addClass(alignment);
				
			});
			
			$("#Image<?php echo $model;?>").change( function() {
				//alert("File being selected");
				$('#ImageWriteEditForm').attr('action', '/write/images/change_image/');
				$('#ImageWriteEditForm').serialize();
				$('#ImageWriteEditForm').submit();
			});
			
			$('.u_toggler').click( function() {
				$('#image-upload').fadeOut('slow');
			});
			
			$('.change_image').click( function() {
				$('#image-upload').fadeIn('slow');
			});
			
		
			$('#ImagePosition').change( function() {
				if($(this).val()=='head') {
					$('.top-text').hide();
					$('.bottom-text').show();
				} else {
					$('.top-text').show();
					$('.bottom-text').hide();
				}
			});


			$("#ImageAlignment").trigger('change');
			$('#ImagePosition').trigger('change');
			$("#ImageWidth").trigger('change');
	});


</script>
