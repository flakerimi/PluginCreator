<?php

namespace Plugin\#NAME#;


class AdminController
{
     public function index()
    {
        $config = array(
            'title' => '#NAME#',
            'table' => '#NAME#',
            'sortField' => '#NAME#Order',
            'createPosition' => 'top',
            'pageSize' => 5,
            'fields' => array(
                array(
                    'label' => 'Name',
                    'field' => 'name',
                ),
            )
        );
        return ipGridController($config);
    }

}
