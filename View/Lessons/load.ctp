<style>
/* tooltips */
a.tip {
    border-bottom: 1px dashed;
    text-decoration: none
}
a.tip:hover {
    cursor: help;
    position: relative
}
a.tip span {
    display: none
}
a.tip:hover span {
    border: #c0c0c0 1px dotted;
    padding: 5px 20px 5px 5px;
    display: block;
    z-index: 100;
    background: url(../images/status-info.png) #f0f0f0 no-repeat 100% 5%;
    left: 0px;
    margin: 10px;
    width: 250px;
    position: absolute;
    top: 10px;
    text-decoration: none
}
/* end tooltips */
</style>
<div id="<?php echo $category;?>">
<?php echo $lesson['Lesson'][$category];?>
<?php //debug($lesson);?>
</div>

<?php if($category=="lecture"):?>
	<div>
		<hr>
		<h4></h4>
		<a href="javascript:" id="extract-links">Voir vocabulaire</a>
		<ul id="vocabulaire-extraction"></ul>
	</div>
	
<script>

var category="#<?php echo $category;?> a";

	$( document ).ready(function() {
		//alert("hi - lecture:" + category);
		
		$("#extract-links").click( function() {
			//console.log(category);
			$.each($("#lecture a"),function(){
					$(this).addClass("tip");
					var li = '<li><strong>'+$(this).text()+'</strong>: ' + $(this).attr("title")+'</li>';
					$("#vocabulaire-extraction").append(li);
				//}
			});
		});
		

});
</script>
<?php endif;?>
