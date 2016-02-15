<?php 
namespace Plugin\PluginCreator;
/**
*  Helper
*/
class Helper
{
 
	 public static function createForm()
	 {
	 	# code...

		$form = new \Ip\Form();

		$form->addField(new \Ip\Form\Field\Hidden(
		    array(
		        'name' => 'aa', // HTML "name" attribute
		        'value' => 'PluginCreator.create'
		    	)
		    )
		);
		 

		$form->addField(
			new \Ip\Form\Field\Text(
			    array(
			        'name' => 'name', // HTML "name" attribute
			        'label' => 'Plugin Name', // Field label that will be displayed next to input field
		            'note' => 'Name of your plugin, eg. SuperSlider'
			    )
			)
		);

		 

		$form->addField(
			new \Ip\Form\Field\Submit(
			    array(
			        'value' => 'Create'
			    )
			)
		);
		return $form;
	}
}
 ?>