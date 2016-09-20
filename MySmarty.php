<?php

class MySmarty
{
	public $template_dir;
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
		$changed = preg_replace('/\{\$(.*)\}/','',$html);

		if (isset($this->key))
		{
			$changed_0 = preg_replace('/\{\$' . $this->key . '\}/',$this->value,$html);
			$changed = preg_replace('/\{\$(?!.*' . $this->key . ').*\}/','',$changed_0);
		}

		echo $changed;
	}
}

// $smarty = new MySmarty; 
// $smarty->template_dir = './templates/';
// $name = 'テスト';
// $smarty->assign('name',$name);
// // var_dump($smarty);
// $smarty->display('index.tpl');
?>
