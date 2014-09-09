<?php
$form = new \Ip\Form();

$form->addField(new \Ip\Form\Field\Hidden(
    array(
        'name' => 'aa', // HTML "name" attribute
        'label' => 'Company initials eg. UW for UrbanWay', // Field label that will be displayed next to input field
        'value' => 'PluginCreator.create'
    	)
    )
);
$form->addField(
	new \Ip\Form\Field\Text(
    array(
        'name' => 'namespace', // HTML "name" attribute
        'label' => 'Company initials eg. UW for UrbanWay', // Field label that will be displayed next to input field
    	)
    )
);


$form->addField(
	new \Ip\Form\Field\Text(
	    array(
	        'name' => 'name', // HTML "name" attribute
	        'label' => 'Plugin Name', // Field label that will be displayed next to input field
	    )
	)
);

$form->addField(
	new \Ip\Form\Field\Checkbox(
    array(
        'name' => 'addWidget',
        'label' => 'I agree',
        'checked' => 1
    	)
	)
);

$form->addField(
	$widget = new \Ip\Form\Field\Text(
    array(
        'name' => 'widgetname', // HTML "name" attribute
        'label' => 'Widget Name', // Field label that will be displayed next to input field
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
