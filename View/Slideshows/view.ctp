<style>
	h2 { border-bottom: 1px solid lightgray;  }
	div.col-lg-9 { border-left: 1px solid lightgray; }
	#image-menu { min-height: 300px; max-height:800px; overflow: hidden; overflow-y:scroll; padding: 4px 0; list-style-position: inside; }
	#image-menu li { padding: 4px; }
	#description { display: none; position: absolute; top: 30px; right: 20px; width: 40%; z-index: 8999; }
	#description div {  background-color: #C2C5E8; opacity: 1;}
</style>

<div class="wide">
		<h2 class="centered"><?php echo $slideshow['Slideshow']['title']; ?></h2>
			<div style="position: relative;"><small class="pull-right" >
				<a href="javascript:" id="view-description">View album description</a> | 
				<a href="<?php echo $referer;?>" >Retour</a>
			</small>
			<div id="description">
				<div class="cartouche bordered">
					<?php echo $slideshow['Slideshow']['description'];?>
				</div>
			</div>
				

			</div>

<div class="row"  id="showcase">
	<?php 
		$document_root = 'image' . DS . 'image';
	?>
	<div class="col-lg-2">
		<h4 class="centered">Slides:</h4>
			<ol id="image-menu"> 
						<?php foreach( $slideshow['Slide'] as $slide) :?>
						<li   title="<?php echo $slide['title'];?>">
						<a id="<?php echo $slide['id'];?>" href="javascript:" >
							<?php echo  $this->Crud-> get_slide_thumbnail('slide', $slide);?>
							</a>
						</li>
					<?php endforeach;?>
			</ol>
			
	</div>
		<div class="col-lg-10">
			<div id="text"></div>
		</div>	
</div>

</div>

<script>

var album_id = "<?php echo $slideshow['Slideshow']['id'];?>";
var image_id = 0;

	
	$('document').ready( function() {
			
		$('#image-menu li a').click( function() {
			image_id = $(this).attr('id');
			$('#text').fadeOut('show');
			$('#text').load('/slides/details/' + image_id );
			$('#text').fadeIn('slow');
		});
		
		$('#image-menu li:first a ').trigger('click');
		
		$("#view-description").click( function() {
			$("#description").toggle('slow');
		});
		
		$("#description").click( function() {
			$("#description").hide('slow');
		});
		
	});
	
</script>
