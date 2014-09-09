<?php

namespace Plugin\#NAME#;


class Event
{
    public static function ipBeforeController()
    {
        //Add CSS, JS, set block content
        ipAddCss('assets/#NAME#.css');
        ipAddJs('assets/#NAME#.js');
    }

}
