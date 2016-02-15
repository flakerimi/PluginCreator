<?php
namespace Plugin\PluginCreator;


class AdminController extends \Ip\Controller
{
	protected function createFile($value, $template, $savepath){
 
		$template = file_get_contents($template);
		$template = str_replace("#NAME#", $value, $template);
		$template = str_replace("#NAMELOWER#",strtolower($value), $template);
		$newFile = fopen($savepath, 'w');
		fwrite($newFile, $template);
		fclose($newFile);

	}
	public function index()
	{
		$form = Helper::createForm();

		$data['form'] = $form;
        $renderedHtml = ipView('view/index.php', $data)->render();
        return $renderedHtml;

	}

	public function create()
	{
		$request = ipRequest()->getPost();
 		//print_r($namespace);//['namespace']
        $form = Helper::createForm();

		$name = ucwords($request['name']);
        $errors = $form->validate($request);
	 if ($errors) {
            // Validation error

            $status = array('status' => 'error', 'errors' => $errors);

            return new \Ip\Response\Json($status);
        } else {
	try {
		if(ipRequest()->getPost() == true) {
			$dir = 'Plugin/'.$name;
			if(!is_dir($dir)) {
				mkdir('Plugin/'.$name, 0777,true);
				chmod('Plugin/'.$name, 0777);
			}
			$setup = 'Plugin/'.$name.'/Setup';
			if(!is_dir($setup)) {
				mkdir('Plugin/'.$name.'/Setup', 0777,true);
				chmod('Plugin/'.$name.'/Setup', 0777);
			}

			$assets = 'Plugin/'.$name.'/assets';
			if(!is_dir($assets)) {
				mkdir('Plugin/'.$name.'/assets', 0777,true);
				chmod('Plugin/'.$name.'/assets', 0777);
			}

			$view = 'Plugin/'.$name.'/view';
			if(!is_dir($view)) {
				mkdir('Plugin/'.$name.'/view', 0777,true);
				chmod('Plugin/'.$name.'/view', 0777);
			}
 		}
		$this->createFile($name, 'Plugin/PluginCreator/templates/AdminController.php',$dir.'/AdminController.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/Event.php',$dir.'/Event.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/Filter.php',$dir.'/Filter.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/PublicController.php',$dir.'/PublicController.php');
		$this->createFile(strtolower($name), 'Plugin/PluginCreator/templates/routes.php',$dir.'/routes.php');

		$this->createFile($name, 'Plugin/PluginCreator/templates/plugin.json',$setup.'/plugin.json');
		$this->createFile($name, 'Plugin/PluginCreator/templates/Worker.php',$setup.'/Worker.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/application.js',$assets.'/'.strtolower($name).'.js');
		$this->createFile($name, 'Plugin/PluginCreator/templates/application.css',$assets.'/'.strtolower($name).'.css');

		$this->createFile($name, 'Plugin/PluginCreator/templates/single.php',$view.'/single.php');
		$this->createFile($name, 'Plugin/PluginCreator/templates/index.php',$view.'/index.php');

         } catch (\Ip\Exception $e) {
            return JsonRpc::error($e->getMessage());
        }
        // TODO jsonrpc
    		$actionUrl = ipActionUrl(array('aa' => 'PluginCreator.showSuccessMessage'));
            $status = array('redirectUrl' => $actionUrl);
            return new \Ip\Response\Json($status);
        }
	}
	 public function showSuccessMessage()
    {
        $renderedHtml = ipView('view/success.php')->render();

        return $renderedHtml;
    }

}
