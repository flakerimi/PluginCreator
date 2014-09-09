<?php
namespace Plugin\PluginCreator;


class AdminController extends \Ip\Controller
{
	protected function createFile($var, $template, $savepath){
		$value = $var;
		$template = file_get_contents($template);
		$template = str_replace("#NAME#", $value, $template);
		$newFile = fopen($savepath, 'w');
		fwrite($newFile, $template);
		fclose($newFile);

	}
	public function index()
	{
		return ipView('view/index.php');
	}

	public function create()
	{
		//print_r(ipRequest()->getPost()['name']);

		$name = ucwords(ipRequest()->getPost()['namespace']).ucwords(ipRequest()->getPost()['name']);

		$dir = 'Plugin/'.$name;
		if(!is_dir($dir)) {
			$dir = mkdir('Plugin/'.$name, 0777);
		}
		$setup = 'Plugin/'.$name.'/Setup';
		if(!is_dir($setup)) {
			$setup = mkdir('Plugin/'.$name.'/Setup', 0777);
		}

		$assets = 'Plugin/'.$name.'/assets';
		if(!is_dir($assets)) {
			$assets = mkdir('Plugin/'.$name.'/assets', 0777);
		}

		$view = 'Plugin/'.$name.'/view';
		if(!is_dir($view)) {
			$view = mkdir('Plugin/'.$name.'/view', 0777);
		}
 
		$this->createFile($name, 'Plugin/PluginCreator/templates/AdminController.php',$dir.'/AdminController.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/Event.php',$dir.'/Event.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/Filter.php',$dir.'/Filter.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/PublicController.php',$dir.'/PublicController.php');
		$this->createFile(strtolower($name), 'Plugin/PluginCreator/templates/routes.php',$dir.'/routes.php');

		$this->createFile($name, 'Plugin/PluginCreator/templates/plugin.json',$setup.'/plugin.json');
		$this->createFile(strtolower($name), 'Plugin/PluginCreator/templates/Worker.php',$setup.'/Worker.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/application.js',$assets.'/'.$name.'.js');
		$this->createFile($name, 'Plugin/PluginCreator/templates/application.css',$assets.'/'.$name.'.css');

		$this->createFile($name, 'Plugin/PluginCreator/templates/single.php',$view.'/single.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/index.php',$view.'/index.php');

		return new \Ip\Response\Redirect('?aa=PluginCreator.created');

	}
	public function created()
	{
		return ipView('view/created.php');

	}
}