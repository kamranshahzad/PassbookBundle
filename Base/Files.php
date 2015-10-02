<?php

namespace Kamran\PassbookBundle\Base;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;


class Files{

    public static function createPassDir(){
    }

    public static function createPassImageDir($passId , $webDir){
        $fs = new Filesystem();
        try {
            $fs->mkdir( $webDir.'/upload/'. $passId );
        } catch (IOExceptionInterface $e) {
            echo "An error occurred while creating your directory at ".$e->getPath();
        }
    }

    public function find(){}

    public static function getZipFilsize($filename) {
        $size = 0;
        $resource = zip_open($filename);
        while ($dir_resource = zip_read($resource)) {
            $size += zip_entry_filesize($dir_resource);
        }
        zip_close($resource);

        return $size;
    }

}

