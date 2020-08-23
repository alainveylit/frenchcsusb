<?php
	$DownloadPath =  WWW_ROOT . 'files' . DS . 'document' . DS  . 'document' . DS .
		 $document['Document']['document_dir'] . DS . $document['Document']['document'];

	echo readfile($DownloadPath);
?>
