<?php //echo $this->element('tinymce');?>
<style>
.thumb .uploaded { border: 3px solid red; opacity: 075; }
span { position: relative;}
span.uploaded::before {
   // content: "Uploaded ";
  content:'\2713';
  display:inline-block;
  position: absolute;
  left: 12px;
  color:red;
  padding:0 6px 0 0;
  font-size: 32px;
}

#status { color: red; font-size: 120%; }
</style>

<div class="fatty form">
	<?php //debug($this->request->data);?>
	
	<h2>
<?php echo $this->Form->create('Slideshow', array('type'=>'file', 'url'=>['action'=>'upload_images', $this->request->data['Slideshow']['id']])); ?>
<small class="pull-right"><?php echo $this->Crud->view_crud('Slideshow', $this->request->data['Slideshow']);?></small>
</h2>
	<fieldset class="fixed-input">
		<legend><?php echo __('Upload images to  Slideshow:  '); echo $this->Form->value('title');?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('place');
		//echo $this->Form->input('date', ['type'=>'text']);		
		echo $this->Form->hidden('creator');
	?>
	</fieldset>
	<hr>
	<fieldset>
		<input type="file" id="files" name="files[]" multiple />
		<output id="list"></output>
		<output id="status"></output>

	</fieldset>
	
	<?php echo $this->Form->end(__('Submit')); ?>
</div>

<style>
  .thumb {
    height: 75px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
    clear:both;
  }
</style>


<script>
	
	// Check for the various File API support.
if (window.File && window.FileReader && window.FileList && window.Blob) {
  // Great success! All the File APIs are supported.
} else {
	alert('The File APIs are not fully supported in this browser.');
}


  function handleFileSelect(evt) {
	  
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.

      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
  
   
$("form").submit(function(form) {
	
	var slideshow_id = $('#SlideshowId').val();
	//var album_place= $('#SlideshowPlace').val();
	//var album_date= $('#SlideshowDate').val();
	
	$('#list img').each( function() {
		var file = {};
		file.filename=$(this).attr('title');
		file.data = $(this).attr('src');
		file.slideshow = slideshow_id;
		//console.log(file);
		var thumbnail = $(this);
		
		$.ajax({url: "/slideshows/upload_images",
          type: 'POST',
          data: {filename: file.filename, data: file.data, slideshow_id: file.slideshow},
          success: function(data, status, xhr) {
			  console.log(data);
			  console.log(status);
			  console.log(xhr);
			  thumbnail.css('border', '2px solid red').css('opacity', '0.75');
			  thumbnail.parent().addClass('uploaded');
			  
			  }
		}); 

		$('#status').html('<p>Your images have been uploaded: <a href="/slideshows/view/' + slideshow_id + '">View slide show</a></p>');
	});
	
	/*
  $.each(files, function(index, file) {
    $.ajax({url: "/ajax-upload",
          type: 'POST',
          data: {filename: file.filename, data: file.data},
          success: function(data, status, xhr) {}
    });      
  });
  files = [];*/
  //console.log(files);
  form.preventDefault();
  return false;
});

</script>
