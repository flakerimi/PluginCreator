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
		$request = ipRequest()->getPost();
		$namespace = $request['name'].'_';
		//print_r($namespace);//['namespace']

		$name = ucwords($namespace).ucwords($request['name']);
		if(ipRequest()->getPost() == true) {
			$dir = 'Plugin/'.$name;
			if(!is_dir($dir)) {
				mkdir('Plugin/'.$name, 0777,true);
			}
			$setup = 'Plugin/'.$name.'/Setup';
			if(!is_dir($setup)) {
				mkdir('Plugin/'.$name.'/Setup', 0777,true);
			}

			$assets = 'Plugin/'.$name.'/assets';
			if(!is_dir($assets)) {
				mkdir('Plugin/'.$name.'/assets', 0777,true);
			}

			$view = 'Plugin/'.$name.'/view';
			if(!is_dir($view)) {
				mkdir('Plugin/'.$name.'/view', 0777,true);
			}
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

		//return new \Ip\Response\Redirect('?aa=Plugins.index');
		return new \Ip\Response\Json( array('exampleMessage' => 'Hello world'));
	}
}
