	$('#save-order').click( function() {
		
		if(!confirm("Are you sure you want to save the new ranking positions!")) { return false; }
		$("#linearize").trigger('click');

		var url = '<?php echo $this->Html->url(
		array('controller'=>$controller, 'action'=>'save_order', 'admin'=>false), 
		array('fullBase' => true));?>';
		var fields={};
		
			$.each( $("#sort tbody tr"), function(index, item) {
				fields[index] = $(item).attr('id');
			});
			
		$.post(url,  fields, 
			function(data) { 
					//alert(data ) 
				}, 'text'
		);
		$('#save-order').removeClass('dirty');
	//	console.log(fields);
	});
	
	$("#linearize").click( function() {
			$.each( $(".sort-order"), function(index, item) {
				$(this).text(index+1);
			});			
			$("#sort tbody").sortable("refreshPositions");
	});

/*
	$(".up").click( function(e, ui) {
		var tr_index = $(this).parent().parent().parent().index();
		//alert(tr_index);
		$("#sort tbody tr:eq("+tr_index+")").insertBefore($("#sort tbody tr:eq(0)"));
		$('#linearize').trigger('click');
	});

	$(".star").click( function() {
		var tr_index = $(this).parent().parent().parent().index();
		alert(tr_index);
	});
	
	$(".down").click( function() {
		var last_row = $("#sort tbody tr").length-1;
		var tr_index = $(this).parent().parent().parent().index();
		//alert(tr_index);
		$("#sort tbody tr:eq("+tr_index+")").insertAfter($("#sort tbody tr:eq("+last_row+")"));
		$('#linearize').trigger('click');
	});
*/	
	var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index) {
			$(this).width($originals.eq(index).width())
		});
		return $helper;
	},
		updateIndex = function(e, ui) {
			$('td.index', ui.item.parent()).each(function (i) {
				$(this).html(i + 1);
			});
			$('#save-order').addClass('dirty');
			$('#tip').css('display', 'none');
		};

	$("#sort tbody").sortable({
		helper: fixHelperModified,
		stop: updateIndex,
		placeholder: "ui-state-highlight"
	}).disableSelection();




