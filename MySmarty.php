<?php

class MySmarty
{
	public $template_dir;
	public $data;

	public function assign($key, $value) 
	{
		$this->data[$key] = $value;
	}
	
	public function fetch($template_name)
	{
		$html = file_get_contents($this->template_dir . $template_name); 	

		foreach($this->data as $key => $value)
		{
			$html = preg_replace('/\{\$' . $key . '\}/',$value,$html);

			$replace = "";
			if ($value) {
				  $replace = '\1';
			}

			$html = preg_replace('/\{if \$' . $key . '\}(.*?)\{\/if\}/s', $replace,$html);
		}

		$changed_last = preg_replace('/\{\$(.*?)\}/','',$html);

		return $changed_last;
	}

	public function display($template_name) 
	{
		echo $this->fetch($template_name);
	}

}

?>
