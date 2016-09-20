<?php

class MySmarty
{
	public $template_dir = '';
	public $key;
	public $value;

	public function assign($key, $value) 
	{
		$this->key = $key;
		$this->value = $value;
	}
        
	public function display($template_name) 
	{
		$html = file_get_contents($this->template_dir . $template_name); 	
		$changed = preg_replace('/\{\$' . $this->key . '\}/',$this->value, $html);
		// var_dump($changed);

		if ($template_name == true)
		{
			$a = preg_match('/\{if $' . $this->key . '\}.*\{\/if\}/s' , $changed , $match);
			var_dump($match);	
			// $changed = preg_replace('/\{\$' . $this->key . '\}/',$this->value, $changed);
		}

		// echo $changed;

	}
}

$smarty = new MySmarty; 
$smarty->template_dir = './templates/';
$smarty->assign('name','テスト');
// var_dump($smarty);
$smarty->display('index.tpl');
?>
