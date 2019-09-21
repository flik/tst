<?php

/**
 * TLG (Tools Libraries Gadgets) using as g. Just Gadget
 * PaperG - added ability ...
 * 
 */
 
 class g
{
	/*
    private $dom = null;  
    public $nodes = array();
    public $parent = null;
    public $children = array();
    public $tag_start = 0;

*/
    function __construct( )
    {
        
    }

    function __destruct()
    {
       // $this->clear();
    }
    
  public static function arrayToStr($input){
	 /*
	  $input = array(
		'item1'  => 'object1',
		'item2'  => 'object2',
		'item-n' => 'object-n'
	);
	*/
	$output = implode(', ', array_map(
		function ($v, $k) { return sprintf("%s='%s'", $k, $v); },
		$input,
		array_keys($input)
	));
	return $output;
 }
 
  public static function searchAarray($key,$val,$input){
	 $output =   array_map(
		function ($v, $k) {
			//if(is_array($v)){
			if($k==$key && $v==$val){
				return array($k=>$v) ;
			} 
		}, 
		$input, 
		array_keys($input)
	);
	return $output;
 }
 
 // extract number from string
  public static function getNumber($str){
 filter_var($str, FILTER_SANITIZE_NUMBER_INT);
}

	 public static function escapeTags($str){
		 
		$sKeys 		= array('&', '"', '\'', '<', '>' ); 
        $sValues 	= array('&amp;',  '&quot;',  '&#39;', '&lt;', '&gt;');
              
		return str_replace($sKeys, $sValues , $str); 
		 
		   
	 }
	 
	 public static function encodeTags($str){
		 
		$sKeys 	= array('&', '"', '\'', '<', '>' ); 
        $sValues 	= array('~',  '~~',  '~~~', '~!', '!~');
              
		 return str_replace($sKeys, $sValues , $str); 
		//return $str;
		   
	 }
	 
	 public static function  decodeTags($str){ 
		 $sValues 	= array('&', '"', '\'', '<', '>' ); 
         $sKeys 	= array('~',  '~~',  '~~~', '~!', '!~');
              
		 return str_replace($sKeys, $sValues , $str); 
		 //return $str;
		   
	 }
	 
 
  public static function ArrayValDecode($key,$input){
	 
	 $output = array_map(function($va, $ka) { 
		   
				return array_map(function($v, $k) { 
			   
					if($k==$key ){
						return array($k=>json_decode($v,true)) ;
					}else
						return ; 
						
			  }, $va);
		   
		   
				
		  }, $input); 
		  
	return $output;
 }
 
 public static function encrypt( $string ) {
	$string = trim($string);
  $algorithm = 'rijndael-128'; // You can use any of the available
  $key = md5( "mypassword", true); // bynary raw 16 byte dimension.
  $iv_length = mcrypt_get_iv_size( $algorithm, MCRYPT_MODE_CBC );
  $iv = mcrypt_create_iv( $iv_length, MCRYPT_RAND );
  $encrypted = mcrypt_encrypt( $algorithm, $key, $string, MCRYPT_MODE_CBC, $iv );
  $result = urlencode(base64_encode( $iv . $encrypted ));
  return $result;
}
 public static function decrypt( $string ) {
	$string = trim($string);
  $algorithm =  'rijndael-128';
  $key = md5( "mypassword", true );
  $iv_length = mcrypt_get_iv_size( $algorithm, MCRYPT_MODE_CBC );
  $string = base64_decode( $string );
  $iv = substr( $string, 0, $iv_length );
  $encrypted = substr( $string, $iv_length );
  $result = urlencode(mcrypt_decrypt( $algorithm, $key, $encrypted, MCRYPT_MODE_CBC, $iv ));
  return $result;
}

    public static function _encode_string ($stringArray) {
		$s = rtrim(strtr(base64_encode(gzdeflate($stringArray, 9)), '+/', '-_'), '=');
    return $s;
}

	   public static function _decode_string ($stringArray) {
		$s =  gzinflate(base64_decode(strtr($stringArray, '-_', '+/')));
    return $s;
}
 ///////////////////////////////////////////////////////////////////////////////
 public static function uses($arr) {
	 
	if(is_array($arr)){
		foreach( $arr as $k=>$v)	 
			require __DIR__.'/../xapp/Models/'.$v.'.php';
	}
 }
 
 public static function stripslashes_recursively(&$array) {
	trigger_error('stripslashes_recursively is deprecated in 3.2', E_USER_DEPRECATED);
	foreach($array as $k => $v) {
		if(is_array($v)) stripslashes_recursively($array[$k]);
		else $array[$k] = stripslashes($v);
	}
}

    // clean up memory due to php5 circular references memory leak...
    public static function clear()
    {
        /*$this->dom = null;
        $this->nodes = null;
        $this->parent = null;
        $this->children = null;
        $this->tag_start = null;*/
    }
    
	 public static function strip($str)
		{
			$str = str_replace(chr(194) . chr(160), " ", $str);
			$str = preg_replace("/\s+|\n/", " ", $str);
			return trim($str);
		}

    public static function generateId($text)
    {
        $str = crc32($text);
        $id = sprintf("%u",$str);
        return $id;
    }

    public static function normalize($string)
    {
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
        );

        return strtr($string, $table);
    }
    
    public static function toUTF8($text)
    {
        return iconv("ISO-8859-1", "UTF-8//IGNORE", $text);
    }


    public static function encode_funct($x)
    {
        if ($x=='&amp;') {return $x;}
        if ($x=='&euro;') {return '&#x20AC;';}
        return '&#'.ord(html_entity_decode($x,ENT_NOQUOTES,'UTF-8')).';';
    }
 

    public static function toUnixTimestamp($text)
    {
        return strtotime($text);
    }


 /**
     * parse ground surface from string
     * supports input format: "1 ha" or "1ha" or "1 are 45 ca"
     *
     * @param string $text 1 ha or 1ha or 1 are 45 ca..
     * @param integer
     */
    public static function toMeter($text)
    {
        $result = 0;

        if(preg_match("/(\d+[,.\d+]*)\s*ha\s*(\d+[,.\d+]*)\s*(a|are|ares)\s*(\d+[,.\d+]*)\s*ca/i", $text, $match))
        {
            $ha = str_replace(",", ".", $match[1]);
            $a =  str_replace(",", ".", $match[2]);
            $ca =  str_replace(",", ".", $match[4]);
            $result = ($ha * 10000) + ($a * 100) + $ca;
        }
        else if(preg_match("/(\d+[,.\d+]*)\s*ha\s*(\d+[,.\d+]*)\s*a/i", $text, $match))
        {
            $ha = str_replace(",", ".", $match[1]);
            $a =  str_replace(",", ".", $match[2]);
            $result = ($ha * 10000) + ($a * 100);
        }
        else if(preg_match("/(\d+[,.\d+]*)\s*ha\s*(\d+[,.\d+]*)\s*ca/i", $text, $match))
        {
            $ha = str_replace(",", ".", $match[1]);
            $ca =  str_replace(",", ".", $match[2]);
            $result = ($ha * 10000) + $ca;
        }
        else if(preg_match("/(\d+[,.\d+]*)\s*(a|are|ares)\s*(\d+[,.\d+]*)\s*[ca]*/i", $text, $match))
        {
            $a =  str_replace(",", ".", $match[1]);
            $ca =  str_replace(",", ".", $match[3]);
            $result = ($a * 100) + $ca;
        }
        else if(preg_match("/(\d+[,.\d+]*)\s*(ha|hectare)/i", $text, $match))
        {
            $ha = str_replace(",", ".", $match[1]);
            $result = ($ha * 10000) ;
        }
        else if(preg_match("/(\d+[,.\d+]*)\s*(\ba\b|\bare\b|\bares\b)/i", $text, $match))
        {
            $a =  str_replace(",", ".", $match[1]);
            $result = ($a * 100);
        }
        else if(preg_match("/(\d+[,.\d+]*)\s*ca/i", $text, $match))
        {
            $ca =  str_replace(",", ".", $match[1]);
            $result = $ca;
        }

        return $this->toNumber($result);
    }

	public static function toNumber($str)
    {
        $value = 0;
        $str = preg_replace("/(,\d{2})$|(\.\d{2})$|\s|\+\/-/", "", $str);
        $str = preg_replace("/,(\d{3})|\.(\d{3})/",  "$1$2", $str);
        if(preg_match("/(-?\d+)/", $str, $match)) $value = intval($match[1]);

        return $value;
    }

    public static function toXHTML($html)
    {
        $tidy_config = array(
            "clean" => true,
            "output-xhtml" => true,
            "wrap" => 0,
        );

        $tidy = tidy_parse_string($html, $tidy_config);
        $tidy->cleanRepair();
        return $tidy;
    }


	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//function for print array
	public static function debug($obj, $e = 1)
	{
		echo "<pre>";
		print_r($obj);
		echo "</pre>";
		if($e)
		  exit;
		
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//function for echo array
	public static function debugx($obj, $e = false)
	{
		echo "<br />************************<br/>";
		echo $obj;
		echo "<br/>************************<br/>";
		if($e)
		  exit;
		
	}

	public static function handleMultiSlashes(){
		$url =  strchr($_SERVER['REQUEST_URI'],"//"); 
		if(!empty($url)){
			$url = str_replace('///','/',$_SERVER['REQUEST_URI']);
			$url = str_replace('//','/',$_SERVER['REQUEST_URI']);
			echo '<script> window.location = "'.$url.'"; </script>' ;
		}
	}
	
       public static function GenLog($file=''){
			$log = '';
			$log = date("Y-m-d h:i:s A");
			$log .= "	";
			$log .= $_SERVER['REMOTE_ADDR'];
			$log .= "	";
			$log .= $_SERVER['REQUEST_URI'];
			$log .= "	";
			$log .= $_SERVER['HTTP_USER_AGENT'];
			 
			$action = "	---------> start \n";  
			
			if(empty($file ))
			$file = dirname(__FILE__) . '/Log/logfile.log';  
				
			file_put_contents($file, $log . $action, FILE_APPEND | LOCK_EX); 
			
	   }     
	 
		
		/*
		 * $arr 
		 * $v = index for search
		 * $bool return value
		 */
		function checkSet($arr='',$v='',$bool=''){

			if($bool=='@')
				return isset($arr[$v]) ? true : false ;
			else 
			   return isset($arr[$v]) ? $arr[$v] : $bool ;
		} 

		public static function sendEmailHTML($data ){
			if(empty($data))
				return false;
			
			if(isset($data['email_to']))
				$to = strip_tags($data['email_to']);
			else
				$to = 'abc@example.com';

			if(isset($data['email_to']))
				$subject = strip_tags($data['subject']);
			else
				$subject = 'test subject';

			if(isset($data['email_to']))
				$headers = "From: ".strip_tags($data['from'])." \r\n";
            else
				$headers = "From: info@examplet.com \r\n";
            
            //$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
            //$headers .= "CC: susan@example.com\r\n";
            
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = '<html><body>';
            $message .= ' <p>Hi ,</p>';
            $message .= '<p>Here is your <a href="#"> test reset link</a>for  </p><div class="yj6qo"> </div>';
            $message .= ' <p>Bye ,</p>';
            $message .= '</body></html>';
            mail($to, $subject, $message, $headers);
       }  
       
            
}// Ending Class
