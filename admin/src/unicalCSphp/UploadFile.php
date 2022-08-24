<?php
namespace unicalCSphp;
 class UploadFile{
 	protected $destination;
 	protected $Fname = array();
 	protected $FTname = array();
 	protected $FType = array();
 	protected $FDetails = array();
 	protected $messages = array();
 	protected $status = array();
   protected $uploaditem ;
 	protected $maxSize = 2048000;
 	protected $permittedTypes =array(
 					'image/jpeg',
         			'image/jpg',
 					'image/pjpeg',
 					'image/gif',
 					'image/png',
 					'image/webp',
					'video/3gp',
					'video/mp4',
					'video/avi',
					'video/mpg',
					'video/mpeg',
					'video/webm',
					'.mkv',
					'audio/ogg',
					'audio/mp3',
					'audio/*',
					'audio/mpeg',
 					'audio/wav',
					'application/pdf',
					'application/xlxs',
					'application/doc',
					'application/docx',
					'application/xls',
					'application/pub',
					'application/csv');
 	protected  $newName;
 	protected $typeCheckingOn = true;
 	protected $notTrusted = array('bin','cgi','exe','js','py','pl','php','sh' );
 	protected $suffix = '.upload';
 	protected $renameDuplicates;
 	public function __construct($uploadFolder,$uploaditem=""){
 		if(!is_dir($uploadFolder) || !is_writable($uploadFolder)){
 			throw new \Exception("$uploadFolder must be a valid, writable folder.");
 		}
 		if($uploadFolder[strlen($uploadFolder)-1] !='/'){
 		$uploadFolder .='/';}
 		 $this->destination =$uploadFolder;
 	}
 	public function setMaxSize($bytes){
 		$serverMax = self::convertToBytes(ini_get('upload_max_filesize'));
 		if($bytes>$serverMax){
 			throw new \Exception('Maximum size cannot exceed server limitfor individual files:'.self::convertFromBytes($serverMax));
 		}
 		if (is_numeric($bytes) && $bytes>0){
 			$this->maxSize =$bytes;
 		}
 	}
 	public function allowAllTypes($suffix = null){
 		$this->typeCheckingOn = false;
 		if(!is_null($suffix)){
 			if(strpos($suffix, '.') === 0 || $suffix == ''){
 				$this->suffix = $suffix;
 			}else{
 				$this->suffix = ".$suffix";
 			}
 		}

 	}
 	public static function convertToBytes($val){
 		$val = trim($val);
 		$last = strtolower($val[strlen($val) -1]);
 		if (in_array($last, array('g','m','k'))){
 			$val = intval(trim($val));
 			switch($last){
 				case 'g':
 				$val *= 1024;
 				case 'm':
 				$val *= 1024;
 				case 'k':
 				$val *= 1024;
 			}
 		}return $val;
 	}
 	public static function convertFromBytes($bytes){
 		$bytes /=1024;
 		if($bytes>1024){
 			return number_format($bytes/1024, 1). 'MB';
 		}else {
 			return number_format($bytes, 1). 'kB';
 		}
 	}
 	public function upload($renameDuplicates = true){
 		$this->renameDuplicates =$renameDuplicates;
 		$uploaded = current($_FILES);
 		if(is_array($uploaded['name'])){
 			foreach ($uploaded['name'] as $key => $value) {
 				$currentFile['name'] = $uploaded['name'][$key];
 				$currentFile['type'] = $uploaded['type'][$key];
 				$currentFile['tmp_name'] = $uploaded['tmp_name'][$key];
 				$currentFile['error'] = $uploaded['error'][$key];
 				$currentFile['size'] = $uploaded['size'][$key];
 				if($this->checkFile($currentFile)){
 			$this->moveFile($currentFile);}
 			}
 		}else{
 		if($this->checkFile($uploaded)){
 			$this->moveFile($uploaded);}
}
 	}
 	public function getName(){

		return $this->Fname;
 	}
 	public function getFTname(){

		return $this->FTname;
 	}
 	public function getFType(){

		return $this->FType;
 	}
 	public function getStatus(){

		return $this->status;
 	}
 	public function getuploadDetails(){
 		$this->uploadDetails = array($this->status,$this->messages,$this->Fname,$this->FType,$this->FTname);
		return $this->uploadDetails;
 	}
 	public function getMessages(){
 		return $this->messages;
 	}
 	protected function checkFile($file){
 		if($file['error']!=0){
 			$this->getErrorMessages($file);
 			return false;
 		}if(!$this->checkSize($file)){
 			return false;
 		}
 	if($this->typeCheckingOn){
 		if(!$this->checkType($file)){
 			return false;
 		}
 	}
 		$this->checkName($file);
 		return true;
 	}
 	protected function getErrorMessages($file){
 		switch ($file['error']) {
 			case 1:
 			case 2:
 			$this->status[] = "Error";
 				$this->messages[]=$file['name'].' is too big:(max:'.self::convertFromBytes($this->maxSize).').';
 				break;
 			case 3:
 			$this->status[] = "Error";
 			$this->messages[]=$file['name'].' was only partially uploaded .';
 			break;
 			case 4:
 			$this->status[] = "Error";
 			$this->messages[]= 'No File submitted.';
 			break;
 			default:
 			$this->status[] = "Error";
 				$this->messages[]=$file['name'].' Sorry,there was a problem uploading';
 				break;
 		}
 	}
 	protected function checkSize($file){
 		if($file['size']==0){
 			$this->status[] = "Error";
 			$this->messages[]=$file['name'].'  is Empty.';
 			return false;
 		}else if($file['size'] > $this->maxSize){
 			$this->status[] = "Error";
 			$this->messages[]=$file['name'].'  exceeds the maximum size for a file';
 			return false;
 		} else{
 			return true;
 		}
 	}
 	protected function checkType($file){
 			if (in_array($file['type'],$this->permittedTypes)){
 				return true;}
 				else{
 					$this->status[] = "Error";
 					$this->messages[] = $file['name'].' is not a permitted typ of file('.self::convertFromBytes($this->maxSize).').';
 					return false;
 				}
 	}
 	protected function checkName($file){
 		$this->newName= null;
 		$nospaces = str_replace(' ', '_', $file['name']);
 			if($nospaces != $file['name']){
 				$this->newName =$nospaces;
 			}
 			$nameparts =pathinfo($nospaces);
 			$extension = isset($nameparts['extension']) ? $nameparts['extension'] : '';
 			if(!$this->typeCheckingOn && !empty($this->suffix)){
 			 if(in_array($extension, $this->notTrusted) || empty($extension)){
 			 	$this->newName = $nospaces . $this->suffix;
 			 }
 		}
 		if($this->renameDuplicates){
 			$name = isset($this->newName) ? $this->newName :$file['name'];
 			$existing = scandir($this->destination);
 			if(in_array($name, $existing)){
 				$i = 1;
 				do{
 					$this->newName = $nameparts['filename'] . '_' .$i++;
 					$this->newName .= ".$extension";
 						if(in_array($extension, $this->notTrusted)){
 					$this->newName .= ".$this->suffix";
 				}
 			}
 			while (in_array($this->newName, $existing));
 			}
 		}
 	}
 	protected function moveFile($file){
 		$filename='';
 		$filename = isset($this->newName) ? $this->newName : $file['name'];
 		$success = move_uploaded_file( $file['tmp_name'], $this->destination.$filename);
 		if($success){
 			$result= $file['name'].' was uploaded successfully';
 			$name = $file['name'];
 			$tname= $file['tmp_name'];
 			$type= $file['type'];
 			$this->status[] = "Success";
		 	if(!is_null($this->newName))
		 	{	$name =$this->newName;
		 		$result .= ', and was renamed '.$this->newName;
		 	}
		 	$result .='.';
		 	$this->messages[]= $result;
		 	$this->Fname[]=$name;
		 	$this->FTname[]=$tname;
		 	$this->FType[]=$type;
		 	}else{
		 		$this->status[] = 'Error';
		 		$this->messages[] = 'could not upload ' .$file['name'];
		 	 }
		 	}
}
?>