<div class="wide view">
	
<h2><?php echo 'Mots-croises: ',  $crossword['Crossword']['title']; ?></h2>
 <?php echo $crossword['Crossword']['description']; ?>
		<div id="crossword" style="width:90%">
</div>

</div>

<script>

	$('document').ready( function() {				
		$("#crossword").load('/crosswords/play/' + <?php echo $crossword['Crossword']['id']; ?>);
	});
	

</script>

