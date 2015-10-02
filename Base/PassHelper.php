<?php

namespace Kamran\PassbookBundle\Base;

use Symfony\Component\DependencyInjection\ContainerInterface;


class PassHelper{

    private $container;
    public $webDir;
    public $logDir;
    public $rootDir;
    public $pkPassDir;

    public function __construct( ContainerInterface $_container ){
        $this->container = $_container;
        $this->webDir    = realpath($this->container->get('kernel')->getRootDir() . '/../web'); // ipass/web
        $this->pkPassDir = realpath($this->container->get('kernel')->getRootDir() . '/../web/pkpass');
        $this->logDir    = $this->container->get('kernel')->getLogDir();
        $this->rootDir   = $this->container->get('kernel')->getRootDir();
    }

    public function createUploadDir($passId){
        return Files::createPassImageDir($passId,$this->webDir);
    }

    public static function bindWithEntity($object , $groupArray , $entity){
        if(array_key_exists($entity , $groupArray )){
            $generalArray = $groupArray[$entity];
            foreach($generalArray as $method => $value){
                $setMethod = 'set'.ucfirst($method);
                if(method_exists($object,$setMethod)){
                    call_user_func( array( $object , $setMethod ) , $value );
                }
            }
        }
    }

    public static function entityToArray($entityObject, $entityPrefix=''){
        $dataArray = array();
        if(is_object($entityObject)){
            $classMethods = get_class_methods($entityObject);
            foreach ($classMethods as $methodName) {
                if(substr( $methodName , 0,3) == 'get'){
                    $fieldName =  $entityPrefix.lcfirst(substr($methodName,3 , strlen($methodName) ));
                    $getterValue = call_user_func(array($entityObject,$methodName));
                    if(is_object($getterValue) && $getterValue instanceof \DateTime){
                        $dataArray[$fieldName] = $getterValue->format('m/d/Y');
                    }else{
                        $dataArray[$fieldName] = call_user_func(array($entityObject,$methodName));
                    }
                }
            }
        }
        return $dataArray;
    }


    public function sendPassByEmail($email_id , $pass_id){
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('no-reply@your_email.com')
            ->setTo($email_id)
            ->setBody(
                'Test Message Sended' ,'text/html'
            )
        ;
        $this->container->get('mailer')->send($message);
    }


    public function latlngAction($fieldvalue)
    {
        $data="http://maps.googleapis.com/maps/api/geocode/json?address=".$fieldvalue."&sensor=false";
        $str = str_replace(" ","%20",$data);
        $geocode_stats = file_get_contents($str);

        $output_deals = json_decode($geocode_stats);

        $latLng = $output_deals->results[0]->geometry->location;

        // $lat = $latLng->lat;
        // $lng = $latLng->lng;

        return $latLng;
    }
    public function latAction($fieldvalue)
    {
        $data="http://maps.googleapis.com/maps/api/geocode/json?address=".$fieldvalue."&sensor=false";
        $str = str_replace(" ","%20",$data);
        $geocode_stats = file_get_contents($str);

        $output_deals = json_decode($geocode_stats);

        $latLng = $output_deals->results[0]->geometry->location;

        $lat = $latLng->lat;
        return $lat;
    }
    public function lngAction($fieldvalue)
    {
        $data="http://maps.googleapis.com/maps/api/geocode/json?address=".$fieldvalue."&sensor=false";
        $str = str_replace(" ","%20",$data);
        $geocode_stats = file_get_contents($str);

        $output_deals = json_decode($geocode_stats);

        $latLng = $output_deals->results[0]->geometry->location;

        $lng = $latLng->lng;
        return $lng;
    }

    public function dateObject($dateValue){
        return ($dateValue == '') ? null : new \DateTime($dateValue);
    }

    public function getPassFileSize($filename){
        $size = Files::getZipFilsize($filename);
        if($size<1024){
            $size = $size." bytes";
        }else if($size<(1024*1024)){
            $size=round($size/1024,0);
            $size = $size." KB";
        }else if($size<(1024*1024*1024)){
            $size=round($size/(1024*1024),0);
            $size = $size." MB";
        }else{
            $size=round($size/(1024*1024*1024),0);
            $size = $size." GB";
        }
        return $size;
    }


    public function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }



    public function absolutePath($path){

        $isEmptyPath    = (strlen($path) == 0);
        $isRelativePath = ($path{0} != '/');
        $isWindowsPath  = !(strpos($path, ':') === false);

        if (($isEmptyPath || $isRelativePath) && !$isWindowsPath)
            $path= getcwd().DIRECTORY_SEPARATOR.$path;

        // resolve path parts (single dot, double dot and double delimiters)
        $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
        $pathParts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
        $absolutePathParts = array();
        foreach ($pathParts as $part) {
            if ($part == '.')
                continue;

            if ($part == '..') {
                array_pop($absolutePathParts);
            } else {
                $absolutePathParts[] = $part;
            }
        }
        $path = implode(DIRECTORY_SEPARATOR, $absolutePathParts);

        // resolve any symlinks
        if (file_exists($path) && linkinfo($path)>0)
            $path = readlink($path);

        // put initial separator that could have been lost
        $path= (!$isWindowsPath ? '/'.$path : $path);

        return $path;
    }

    //google short urls
    public function passDownloadableLink($coupon_id){
        return sprintf('absoulte_url/pkpass/%s.pkpass',$coupon_id);
    }

    public function getGoogleShortUrl($coupon_id){
        $googleApiUrl  = 'https://www.googleapis.com/urlshortener/v1/url';
        $securitKey = 'your_key';

        $paramArray = array(
            'longUrl'=>$this->passDownloadableLink($coupon_id),
            'key' => $securitKey
        );
        $jsonData = json_encode($paramArray);

        $curlObj = curl_init();
        curl_setopt($curlObj, CURLOPT_URL, $googleApiUrl);
        curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlObj, CURLOPT_HEADER, 0);
        curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt($curlObj, CURLOPT_POST, 1);
        curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
        $response = curl_exec($curlObj);
        $json = json_decode($response);
        curl_close($curlObj);
        if(isset($json->error)){
            return $json->error->message;
        }else{
            return $json->id;
        }
    }




}//@