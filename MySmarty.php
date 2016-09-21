<?php

class MySmarty
{
	public $template_dir;
	public $data;

	public function assign($key, $value) 
	{
		$this->data[$key] = $value;
	}
        
	public function display($template_name) 
	{
		$html = file_get_contents($this->template_dir . $template_name); 	
		preg_match_all('/\{\$(.*?)\}/',$html,$matches);
			
		$keys = array_keys($this->data);

		foreach ($matches[1] as $match)
		{
			if (in_array($matches[1],$keys))
			{
				$html = preg_replace('/\{\$' . $matches[1] . '\}/',$value,$html);
			} else {
				$html = preg_replace('/\{\$' . $matches[1] . '\}/','',$html);
			}
		}
		
		// echo $html;

	}
}

?>
