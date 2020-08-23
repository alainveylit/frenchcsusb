
<style>
	#categories { overflow: auto; }
	#categories h3 { background: transparent; }
</style>
<div class="row cartouche">
	<hr>
	<div class="col-lg-2" id="categories">
	</div>
	<div class="col-lg-10" id="quizzes">

	</div>
</div>

<script>
	
$('document').ready( function() {
	
	$('#categories').load('/categories/listing');
	$('#quizzes').load('/quizzes/category/1');
	
	$('#categories').on('click', 'li.list-group-item a', function() {
		//console.log( $(this) );
		var id = (this).id;
		$('#quizzes').load('/quizzes/category/'+id);
	});
	
});

</script>
