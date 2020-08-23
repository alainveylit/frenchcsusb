<style>

.flipped {
    -ms-transform: rotate(90deg); /* IE 9 */
    -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
    transform: rotate(90deg);
    max-width: 600px;
    
}

#main-image {
	max-width: 90%;
	max-height: 90%;
	margin: auto;

}

.cartouche { 	position: relative; }

div.controls a {
	display: block;
	position: absolute;
	height: 100%;
	width: 5%;
	top: 0%;
	background-color: inherit;
	background-repeat: no-repeat;
    background-position: center;
    background-size: 32px;
    outline: 0;
    margin-top: 12px;
}

div.controls  a.nav-left  {
	background-image: url(/css/images/previous.png);
	left: 0;
    z-index: 9998;
}

div.controls  a.nav-right  {
	background-image: url(/css/images/next.png);
    right: 0;
    z-index: 9999;
}

</style>

<div class="container-fluid">
	<?php //debug($slide);?>
	
	<?php 
	/*
		$model_name = $image['model'];
		$model = ucfirst($model_name);
		$controller = Inflector::underscore(Inflector::pluralize($model_name));
		* */
		$image_name = $slide['Slide']['image'];
		$image_relative_path = 'files' . DS . 'slide' . DS  . 'image' . DS .  $slide['Slide']['image_dir'] . DS . $image_name;
		$image_path = WWW_ROOT . $image_relative_path;

		$image_size = getimagesize($image_path);
		//return array($size[0], $size[1]);

		if(!file_exists($image_path)) {
			echo '<H1>That image does not exist</H1>';
			return;
		} else {
			$image_url = DS . $image_relative_path;
		}
		
	?>
			<h3><?php echo $slide['Slide']['title']; ?>
				<small class="pull-right"><a href="javascript:" class="flip">Rotate</a></small>
			</h3>
	

			<div class="cartouche bordered centered">
				
				<div id="main-image">
					<?php echo $this->Html->image($image_url);?>
				</div>
					<div class="controls">				
						<a class="nav-left" href="javascript:" title="Previous image"> &nbsp; </a>
						<a class="nav-right" href="javascript:" title="Next image"> &nbsp; </a>
					</div>						
				
				<p><small>
					<?php 
						echo 'Width: ' . $image_size[0] . 'px - Height: ' . $image_size[1] . 'px';
					?>
				</small></p>
			</div>

		<hr>

				<div>
					<?php //echo $slide['Slide']['description']; ?>
				</div>

</div>

<script>
	
	$("document").ready( function() {
	
		$('.flip').click( function() {
			$('#main-image img').toggleClass('flipped');
		});
				
		$('a.nav-left').click( function() {
			var previous = $('a#'+image_id).parent();
			var li = previous.prev();
			var new_id=li.find('a').attr('id');
			$('#' + new_id).trigger('click');
			
		});
		
		$('a.nav-right').click( function() {
			var next = $('a#'+image_id).parent();
			var li = next.next();
			console.log(li);
			var new_id=li.find('a').attr('id');
			$('#' + new_id).trigger('click');
		});
	
	});

</script>
