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

		foreach($this->data as $key => $value)
		{
			$changed = preg_replace('/\{\$' . $key . '\}/',$value,$html);

			if ($value)
			{
				$changed = preg_replace('/\{if \$' . $key . '\}(.*?)\{\/if\}/s','\1',$changed);
			} else {
				$changed = preg_replace('/\{if \$' . $key . '\}(.*?)\{\/if\}/s','',$changed);
			}
			
			$html = $changed;
		}

		$changed_last = preg_replace('/\{\$(.*)\}/','',$changed);
		echo $changed_last;
	}
}

?>
