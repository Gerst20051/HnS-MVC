<?php

class HTML {

	private $js = array();

	function shortenUrls($data) {
		$data = preg_replace_callback('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', array(get_class($this), '_fetchTinyUrl'), $data);
		return $data;
	}

	private function _fetchTinyUrl($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url[0]);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return '<a href="'.$data.'" target="_blank" >'.$data.'</a>';
	}

	function sanitize($data) {
		return mysql_real_escape_string($data);
	}

	function link($text,$path,$prompt = null,$confirmMessage = "Are you sure?") {
		$path = str_replace(' ','-',$path);
		if ($prompt) {
			$data = '<a href="javascript:void(0);" onclick="javascript:jumpTo(\''.BASE_PATH.'/'.$path.'\',\''.$confirmMessage.'\')">'.$text.'</a>';
		} else {
			$data = '<a href="'.BASE_PATH.'/'.$path.'">'.$text.'</a>';
		}
		return $data;
	}
	
	function jslink($text,$id) {
		$data = '<a href="javascript:void(0);" id="'.$id.'">'.$text.'</a>';
		return $data;
	}

	function includeJs($fileName,$external=false) {
		if ($external) $data = '<script src="'.$fileName.'"></script>' . PHP_EOL;
		else $data = '<script src="'.BASE_PATH.'/js/'.$fileName.'.js"></script>' . PHP_EOL;
		return $data;
	}

	function includeCss($fileName,$external=false) {
		if ($external) $data = '<link rel="stylesheet" href="'.$fileName.'">' . PHP_EOL;
		else $data = '<link rel="stylesheet" href="'.BASE_PATH.'/css/'.$fileName.'.css">' . PHP_EOL;
		return $data;
	}

}