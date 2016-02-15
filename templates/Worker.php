<?php
namespace Plugin\#NAME#\Setup;

class Worker extends \Ip\SetupWorker
{

    public function activate()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS
           " . ipTable('#NAMELOWER#') . "
        (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `#NAMELOWER#Order` varchar(255),
        `name` varchar(255),
        PRIMARY KEY (`id`)
        );
        INSERT INTO  " . ipTable('#NAMELOWER#') . " VALUE (1,'#NAME#');
        ";

        ipDb()->execute($sql);


    }

    public function deactivate()
    {
       $sql = 'DROP TABLE IF EXISTS ' . ipTable('#NAMELOWER#');
        ipDb()->execute($sql);

    }

    public function remove()
    {
        $sql = 'DROP TABLE IF EXISTS ' . ipTable('#NAMELOWER#');
        ipDb()->execute($sql);
    }

}
