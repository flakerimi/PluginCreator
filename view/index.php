<?php
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
        'name' => 'namespace', // HTML "name" attribute
        'label' => 'Namespace', // Field label that will be displayed next to input field
    	'note' => 'Uw for Urbanway or leave it blank for no namespace'
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

echo $form->render();
?>
