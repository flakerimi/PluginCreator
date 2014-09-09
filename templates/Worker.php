<?php
namespace Plugin\#NAME#\Setup;

class Worker extends \Ip\SetupWorker
{

    public function activate()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS
           " . ipTable('#NAME#') . "
        (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `#NAME#Order` varchar(255),
        `name` varchar(255),
        PRIMARY KEY (`id`)
        );
        INSERT INTO  " . ipTable('#NAME#') . " VALUE (1,'#NAME#');
        ";

        ipDb()->execute($sql);


    }

    public function deactivate()
    {

    }

    public function remove()
    {
    $sql = '
        DELETE TABLE 
            ' . ipTable('#NAME#');
        ipDb()->execute($sql);
    }

}
