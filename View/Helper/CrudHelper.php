<?php
	class CrudHelper extends HtmlHelper
{
	
//--------------------------------------------------------------
	function show_thumbnail($collection_id)
{
	$image_path = DS . 'files' . DS . 'collection' . DS . 'zip_file' . DS . $collection_id . DS . 'thumbnail.png';
	$thumbpath= $this->image($this->url($image_path) ,
						array('alt'=>'Thumbnail', 
							  'url'=>array('controller' => 'collections', 'action' => 'view', $collection_id),	
							  'style'=>'max-width: 60px;'						  
							 )
					); 
	echo $thumbpath;
}
//--------------------------------------------------------------
	function link_to_model($model, $foreign_key, $title=null)
{
	if($title==null) $title=$model;
	$controller = Inflector::pluralize(Inflector::underscore($model));
	return $this->link($title, array('controller'=>$controller, 'action'=>'view', 'admin'=>false, $foreign_key));
}
//--------------------------------------------------------------
 function is_editor($creator)
{
	//debug($_SESSION['Auth']['User']);
	if(!isset($_SESSION['Auth']['User'])) return false;
	$_SESSION['Auth']['User']['isCreator']=false;

	if($_SESSION['Auth']['User']['role']=='Admin') return true;
	$user_id = $_SESSION['Auth']['User']['id'];
	
         if($user_id == $creator) {
                //$_SESSION['Auth']['User']['isCreator']=true;
                return true;
        }

	return false;
}
//--------------------------------------------------------------
	function view_crud($model, $data=null, $other_actions=null)
{
	//debug($this->request);
	if(!isset($_SESSION['Auth']['User'])) return false;
	$role = $_SESSION['Auth']['User']['role'];

	if($data!=null) {

		
		echo '<ul class="nav navbar-default nav-pills pull-right" role="navigation">';    
		if($this->request->params['action']=='admin_view') {
			$url = Router::url(array('action'=>'view', 'admin'=>false, $data['id']));
			$caption = "Vue étudiant";
			$icon =  '<li> <span class="glyphicon glyphicon-education"> <span> ';
			echo '<a href="'.$url . '">'.$icon.' '.$caption.'</a>'; 
			//$this->link("Vue étudiant", array('action'=>'view', 'admin'=>false, $data['id'])), '</li>';
		}
			echo '<li>', $this->navbar_link('index', "Liste", null, 'list'), '</li>', "\n";
			
			if($role=='Admin') {
				echo '<li>', $this->navbar_link('add', "Ajouter", null, 'plus-sign'), '</li>', "\n";
			}
			if(isset($data['Creator'])) $data['creator'] =  $data['Creator']['id'];
			
			if($this->is_editor($data['creator'])) {
				echo '<li>', $this->navbar_link('edit', "Editer", $data['id'], 'edit'), '</li>', "\n";
			}
					if($other_actions!=null) {
						foreach($other_actions as $action=>$options) {
									echo '<li class="navbar-right">', $this->navbar_link($action, null, $data['id'], $options['class']), '</li>';	
						}
					}
			echo '
			</ul>
			';  
  }
}
//--------------------------------------------------------------
  function navbar_link($action, $caption=null, $id=null, $class=null, $controller=null, $extern=false) 
{
	if(!$caption) $caption= ucwords($action);
	$icon = '<span class="glyphicon glyphicon-'.$class.'"> </span>';
	$url = Router::url(array('action'=>$action, 'admin'=>true, $id));
	if($extern) $url .= '" target="_new';
	return '<a href="'.$url . '">'.$icon.' '.$caption.'</a>';
}
//--------------------------------------------------------------	
	function related_crud($controller, $id, $creator = null, $write_prefix=true)
{
		echo '<ul class="item_crud">
				<li class="zoom">', $this->link('Details', 
								array('controller'=>$controller, 'action'=>'view', 'write'=>$write_prefix, $id)), '</li>';

				if($this->is_editor($creator)) {
					echo '<li class="edit">', $this->link('Edit', 
								array('controller'=>$controller, 'write'=>$write_prefix, 'action'=>'edit', $id)), '</li>';
								
					}
		echo '</ul>';
		
}
//--------------------------------------------------------------
	public function index_crud($controller=null)
{
	echo '<ul class="list-inline index-crud">';
		echo '<li><span class="glyphicon glyphicon-sunglasses"> </span>', $this->link("Vue étudiant", array('controller'=>$controller, 'action'=>'index', 'admin'=>false)), '</li>';
		echo '<li><span class="glyphicon glyphicon-plus"> </span>', $this->link('Ajouter', array('controller'=>$controller, 'action'=>'add', 'admin'=>true)), '</li>';
	echo '</ul>';
	
}
//--------------------------------------------------------------

	public function show_avatar($profile)
 {
	 if(empty($profile['avatar'])) return;
	 $image = DS . 'files' . DS . 'profile' . DS . 'avatar' . DS . $profile['id'] . DS . 'small_' . $profile['avatar'];
	 echo $this->image($image,  array('title'=>'Avatar', 'alt'=>$image, 'class'=>'user-avatar'));
 }
 
 
 //----------------------------------------------------------------------
	function get_image_relative_path($image_dir, $model='image')
{
	return  DS . 'files' . DS  . $model . DS . 'image' . DS . $image_dir . DS;	
}
//----------------------------------------------------------------------
	function get_image_size($image)
{
	$image_path = $this->get_image_relative_path($image['image_dir'], $image['model']) . $image['image'];
	$size = getimagesize(WWW_ROOT . $image_path);
	return array($size[0], $size[1]);
}
//----------------------------------------------------------------------
  function show_portrait($images, $thumb=false)
  {
	$image=$images[0];
	
	$image_name = $thumb ? 'thumb_' . $image['Profile'] : 'vga_' . $image['Profile'];
	$width = $thumb ? '120px' : '640px';
	
	$image_path =  $this->get_image_relative_path($image['image_dir'], 'Profile')  .  $image_name;
	$options = array('title'=>$image['title'], 'alt'=>'Portrait',  'fullBase'=>true, 'id'=>$image['id']);

	$size = getimagesize(WWW_ROOT . $image_path);
	//debug($size);

	//if($image['width'] ==0) {
		$image['width'] = $size[0];
		$image['height'] = $size[1];
	//}
	
		if(!$thumb) $options['class'] = 'portrait-image';
		
		$options['width'] = $image['width'].'px'; 
		$options['height']=$image['height'].'px';
	  
		echo $this->image($image_path,  $options); 
	  
  }
  //--------------------------------------------------------------
	function show_newsclip_image($image, $thumb=false, $url=null)
{
	//debug($image);
	$model='newsclip';
	$image_name = $thumb ? 'thumb_' . $image['illustration'] : $image['illustration'];
	$image_path = DS . 'files' . DS  . $model . DS . 'illustration' . DS . $image['illustration_dir'] . DS . $image_name;
	return $this->image($image_path, array('alt'=>$image_path, 'style'=>'max-width: 100%; float: left; padding: 12px; '));

}  
  //--------------------------------------------------------------
	function show_banner($banner_dir, $banner_image, $thumb=false, $url=null)
{
	$model='seed';
	$image_name = $thumb ? 'thumb_' . $banner_image : $banner_image;
	$image_path = DS . 'files' . DS  . $model . DS . 'banner_image' . DS . $banner_dir . DS . $image_name;
	return $this->image($image_path, array('alt'=>$image_path, 'style'=>'max-width: 100%', 'url'=>$url));

}  
  //--------------------------------------------------------------
	function show_image($image, $thumb=false, $url=null)
{
	//debug($image);
	if($image==null) return;
	$model=$image['model'];
	$image_name = $thumb ? 'thumb_' . $image[$model] : $image[$model];
	$width = $thumb ? '80px' : '640px';
	$image_path =  $this->get_image_relative_path($image['image_dir'], $image['model'])  .  $image_name;
	
	if($image['width'] ==0) {
		$size = getimagesize(WWW_ROOT . $image_path);
		$image['width'] = $size[0];
		$image['height'] = $size[1];
	}
	
	$options = array('title'=>$image['title'], 'alt'=>'Illustration',  'fullBase'=>true, 'id'=>$image['id']);
	if($url!=null) $options['url'] = $url;
	
	if(!$thumb) {
		$options['width'] = $image['width']; 
		$options['height']=$image['height'];
		$options['class']='centered'; //$image['alignment'];

	
		switch($image['alignment']) {
				case "right": echo '<div class="illustration rightist">', $this->image($image_path,  $options), '</div>'; break;
				case "centered" : echo '<div class="illustration  centered">', $this->image($image_path,  $options), '</div>'; break;
				default: 	echo '<div class="illustration leftist">', $this->image($image_path,  $options), '</div>';

		}
	} else { 
		echo $this->image($image_path,  $options); 
	}

	/*	
	 * array('title'=>$image['title'], 'alt'=>'Illustration', 
		'class'=>$image['alignment'], 'width'=>$image['width'], 'height'=>$image['height'], 'fullBase'=>true)
		);
	* */
	
}
//----------------------------------------------------------------------
	function get_image_url($image, $thumb=false)
{
	$model=$image['model'];
	$image_name = ($thumb) ? 'thumb_' . $image[$model] : $image[$model];
	return  $this->get_image_relative_path($image['image_dir'], $image['model']) .  $image_name;
	
}
//---------------------------------------------------------------------
 function thumbnail_to_image($image)
 {
	//debug($image);
	$model=$image['model'];
	$thumbnail = 'thumb_' . $image[$model];
	$path =  $this->get_image_relative_path($image['image_dir'], $image['model']) .  $thumbnail;
//debug($path);
	$thumbpath = $this->get_image_url($image, true);
	$path = $this->get_image_url($image);

	echo $this->image($thumbpath,  array('title'=>'View full image: ' . $image['title'], 
									'alt'=>'Illustration', 
									'url'=>$path)
					);
	 
 }
 //---------------------------------------------------------------------
 function view_image($image)
{
	//debug($image);
	$model=$image['model'];
	$thumbnail = 'thumb_' . $image[$model];
	$path =  $this->get_image_relative_path($image['image_dir'], $image['model']) .  $thumbnail;
	echo $this->image($path,  array('title'=>'View image record: ' . $image['title'], 
									'alt'=>'Illustration', 
									'url'=>array('controller'=>'images', 'action'=>'view', 'write'=>false, $image['id']))
					);
}
 //---------------------------------------------------------------------
	function show_quiz_image($model, $image, $image_dir)
{
	if(empty($image)) return;
	$options=array('alt'=>'Illustration', 'class'=>'inset'); 
	if(!empty($image['image_url'])) {
		echo $this->image($image['image_url'], $options);
		return;
	}
	$path = DS . 'files' . DS . $model . DS . 'image' . DS . $image_dir . DS . $image;
	echo $this->image($path, $options);

}
//----------------------------------------------------------------------
//----------------------------------------------------------------------
	function get_upload_image($model, $data, $url=null, $thumb=false)
{
	//debug($data);
	//exit;
	$options=array('alt'=>'Illustration', 'class'=>'inset', 'style'=>'max-width: 300px'); 
	if($url!=null) $options['url']=$url;
	
	if(!empty($data['image_url'])) {
		return $this->image($data['image_url'], $options); 
	}

	if(empty($data['image'])) return null;
	$image_name = ($thumb) ? "thumb_" . $data['image'] : $data['image'];
	$path = DS . 'files' . DS . $model . DS . 'image' . DS . $data['image_dir'] . DS . $image_name;
	
	$results = array();
	if(preg_match("/.pptx$|.ppt$/", $path, $result)) {
		$url = $this->link($data['titre'], $path, ['fullBase' => true, 'class'=>'powerpoint']);
		//debug($url);
		//exit;
		return $url;
	}

	return $this->image($path, $options);
		
}
//----------------------------------------------------------------------
	function show_upload_image($model, $data, $url=null, $thumb=false)
{	
		$image_url = $this->get_upload_image($model, $data, $url, $thumb);
		if($image_url) echo $image_url;
		
}
//----------------------------------------------------------------------
function get_slide_thumbnail($model, $data)
{
		$root_url = $this->get_image_relative_path($data['image_dir'], $model); 
		$image_url = $root_url . $data['image'];
		$thumb_url = $root_url . 'thumb_' . $data['image'];
		return  $this->image($thumb_url,  array('title'=>'View full image: ' . $data['title'], 
									'alt'=>'Thumbnail', 
									//'id'=>$data['id'],
									//'url'=>'javascript:')
					));


}
//----------------------------------------------------------------------
	function show_upload_thumbnail($model, $data)
{	
		$root_url = $this->get_image_relative_path($data['image_dir'], $model); 
		$image_url = $root_url . $data['image'];
		$thumb_url = $root_url . 'thumb_' . $data['image'];
		//debug($image_url);
		echo $this->image($thumb_url,  array('title'=>'View full image: ' . $data['title'], 
									'alt'=>'Illustration', 
									'url'=>$image_url)
					);

		//if($image_url) echo $image_url;
		
}
//----------------------------------------------------------------------
	function collection_link($collection, $field=null)
{
	if($field==null) $field="zip_file";
	$path =  DS . 'files' . DS . 'collection' . DS . 'zip_file' . DS . $collection['directory'] . DS . $collection[$field];
	return $this->link($collection[$field], $path, array('class'=>$field));
	
}

//----------------------------------------------------------------------
function collection_html_page($collection)
{
	$path =  DS . 'files' . DS . 'collection' . DS . 'zip_file' . DS . $collection['directory'] . DS . $collection['html_file'];
	return $path;
	
}
//----------------------------------------------------------------------
	function collection_image($collection)
{
	if(empty($collection['image'])) return;
	
	$path =  DS . 'files' . DS . 'collection' . DS . 'zip_file' . DS . $collection['directory'] . DS . $collection['image'];
	return $this->image( $path);
	
}
//----------------------------------------------------------------------
 function output_image($image)
{
//debug($image);
	if(isset($image['type']) && $image['type']=='pdf') {
		echo 	"<iframe src=\"" , $image['path'], "\" type=\"pdf\" width=\"100%\" height=\"400\" id=\"pdf-frame\">
		</iframe> ";
		return;
	}
	
    $size = @ getimagesize($image['path']); //echo debug($size);
        if(!$size) { $size=array(800,800); }

    $max_width = min(800, 24 + $size[0]);
    $height = 24 + ($max_width/$size[0])*$size[1];

    $name_id = "jpg_" . $image['index'];
    echo $this->image($image['path'], array('width'=>$max_width, 'class'=>'centered', 'title'=>$image['title'], 'alt'=>$image['title']));
}
//----------------------------------------------------------------------
 function definition_item($label, $string)
{	
	if(!empty($string) && $string!=" ") {
		echo '<dt>', $label, '</dt><dd>', $string, '</dd>', "\n";
	}
}
//----------------------------------------------------------------------
  function categorize($model, $url=null)
{
	$classes= array("Facimage"=>"picture", "Collection"=>"pencil", "Facbook"=>"book");
	$icon = '<span class="glyphicon glyphicon-'.$classes[$model].'"> <a href="' . $url . '"> </a></span> ';
	return $icon;
}
//----------------------------------------------------------------------
	function display_french_date($englishdate)
{
		$months=array("January"=>"Janvier", "February"=>"Fevrier","March"=>"Mars","April"=>"Avril", "May"=>"Mai",
		"June"=>"Juin", "July"=>"Juillet","August"=>"Aout","September"=>"Septembre", "October"=>"Octobre",
		"November"=>"Novembre", "December"=>"Decembre");
		$days=array("Monday"=>"Lundi", "Tuesday"=>"Mardi", "Wednesday"=>"Mercredi", "Thursday"=>"Jeudi", "Friday"=>"Vendredi", "Saturday"=>"Samedi", "Sunday"=>"Dimanche");
		
		foreach($months as $month=>$frenchmonth) {
			$englishdate = str_replace($month, $frenchmonth, $englishdate);
		}
		
		foreach($days as $day=>$frenchday) {
			$englishdate = str_replace($day, $frenchday, $englishdate);
		}
		$englishdate = str_replace(" à 00:00h", "", $englishdate);
		
		return $englishdate;
}
//----------------------------------------------------------------------
	function professor_name($professeur)
{
		return sprintf("%s %s, %s", $professeur['titre'], $professeur['nom'], $professeur['prenom']);
}
//----------------------------------------------------------------------
	function professor_view($professeur)
{
		return $this->link( $this->professor_name($professeur), array('controller'=>'professeurs', 'action'=>'view', $professeur['id']));
}
//----------------------------------------------------------------------
	public function vue_etudiant()
{
	$action = str_replace("admin_", "", $this->action);
	echo '<small class="pull-right">', $this->link('Vue etudiant', array('action'=>$action, 'admin'=>false)), '</small>';
}
//----------------------------------------------------------------------
	public function get_document_url($document)
{
	//Documents controller uploded pdf or image
	$document_directory =  DS . 'files' . DS . 'document' . DS  . 'document' . DS .  $document['document_dir']; 
	$document_path = $document_directory . DS . $document['document'];
	return $document_path;
}

//----------------------------------------------------------------------
}
