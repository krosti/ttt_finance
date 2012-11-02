<?php


App::uses('Component', 'Controller');
App::uses('UploadHandler', 'UploadHandler');
//require('upload.class.php');

class FileuploaderComponent extends Component {
	
	error_reporting(E_ALL | E_STRICT);

	$upload_handler = new UploadHandler();

}