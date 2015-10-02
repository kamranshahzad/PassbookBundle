<?php

namespace Kamran\PassbookBundle\Controller;

use Passbook\Pass\DateField;
use Passbook\Pass\NumberField;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Passbook\Pass\Field;
use Passbook\Pass\Image;
use Passbook\PassFactory;
use Passbook\Pass\Barcode;
use Passbook\Pass\Structure;
use Passbook\Type\EventTicket;
use Passbook\Type\Coupon;
use Passbook\Type\BoardingPass;
use Passbook\Type\Generic;
use Passbook\Type\StoreCard;
use Passbook\Pass\Location;

use Kamran\PassbookBundle\Entity\mgeneral;
use Kamran\PassbookBundle\Entity\mappearance;
use Kamran\PassbookBundle\Entity\mdatasetting;
use Kamran\PassbookBundle\Entity\mheader;
use Kamran\PassbookBundle\Entity\mprimary;
use Kamran\PassbookBundle\Entity\msecondary;
use Kamran\PassbookBundle\Entity\mauxiliary;
use Kamran\PassbookBundle\Entity\mbackfields;
use Kamran\PassbookBundle\Entity\mrelevance;
use Kamran\PassbookBundle\Entity\mdistribution;
use Kamran\PassbookBundle\Base\PassHelper;
use Kamran\PassbookBundle\Base\Files;


/**
 * @Route("/api")
 */
class ApiController extends FOSRestController
{


    //API service ping method
    /**
     * @Route(
     *      "/ping",
     *      name = "crud.api.service.ping",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "GET"
     *      })
     * @Rest\View
     */
    public function pingserviceAction(Request $request){
        return new Response(json_encode(array('status'=>'200')));
    }





    /*
     * Index Pass (show in grid)
     * */
    /**
     * @Route(
     *      "/getallpasses",
     *      name = "crud.api.passes.getall",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "GET"
     *      })
     * @Rest\View
     */
    public function getallpassesAction(Request $request){


        $helper = $this->get('passbook.passhelper');

        $queryArray = $this->getDoctrine()->getManager()
            ->createQuery(
                'SELECT f.userId as UserId,e.couponBarcodeValueOption as Barcode, e.couponId as passSize,h.id as Id ,f.categoryName as Category,
                 f.passGenerationDate as Created ,f.templateName as Template ,f.couponId as couponId
                 ,g.distributionStatus as Distribution
                 FROM KamranPassbookBundle:mdatasetting e
                 JOIN KamranPassbookBundle:mgeneral f where e.couponId = f.couponId
                 JOIN KamranPassbookBundle:mdistribution g where f.couponId = g.couponId
                 JOIN KamranPassbookBundle:mappearance h where g.couponId = h.couponId
                 ORDER BY f.passGenerationDate DESC'
            )->getResult();


        $dataArray = array();
        foreach($queryArray as $key=>$innerArray){
            $fileSize = '';
            $pkpassFile = $helper->logDir.'/pkpass/'.$queryArray[$key]['couponId'].'.pkpass';
            if(file_exists($pkpassFile)){
                $fileSize = $helper->getPassFileSize($pkpassFile);
            }
            $created = '';
            $createdDate = $queryArray[$key]['Created'];
            if(is_object($createdDate)){
                $created = $createdDate->format( 'd-m-Y' );
            }
            $dataArray[$queryArray[$key]['Id']] = array(
                'size' => $fileSize,
                'uid' => $queryArray[$key]['UserId'],
                'template' => $queryArray[$key]['Template'],
                'category' => $queryArray[$key]['Category'],
                'couponid' => $queryArray[$key]['couponId'],
                'distribution' => $queryArray[$key]['Distribution'],
                'barcode' => $queryArray[$key]['Barcode'],
                'created' => $created
            );
        }

        //return new Response(json_encode($dataArray));
        $response = new Response(json_encode($dataArray));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route(
     *      "/getpassnameformat/{userid}",
     *      name = "crud.api.pass.getpassnameformat",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "GET",
     *          "id" = "\d+"
     *      })
     * @Rest\View
     */
    public function getpassnameformatAction($userid){

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT COUNT(g.id) FROM KamranPassbookBundle:mgeneral g WHERE g.userId = '.$userid.' ');
        $count = $query->getSingleScalarResult();
        $dataArray = array('pass_count'=>$count);
        return new Response(json_encode($dataArray));
    }



    /**
     * @Route(
     *      "/getpasslist/{id}",
     *      name = "crud.api.pass.getlist",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "GET",
     *          "id" = "\d+"
     *      })
     * @Rest\View
     */
    public function getpassbyuserAction($id){

        $userId = (int)$id;
        $helper = $this->get('passbook.passhelper');

        $queryArray = $this->getDoctrine()->getManager()
            ->createQuery(
                'SELECT f.userId as UserId,e.couponBarcodeValueOption as Barcode, e.couponId as passSize,h.id as Id ,f.categoryName as Category,
                 f.passGenerationDate as Created ,f.templateName as Template ,f.couponId as couponId
                 ,g.distributionStatus as Distribution,g.shortUrl as ShortUrl
                 FROM KamranPassbookBundle:mdatasetting e
                 JOIN KamranPassbookBundle:mgeneral f where e.couponId = f.couponId AND f.userId = '.$userId.'
                 JOIN KamranPassbookBundle:mdistribution g where f.couponId = g.couponId
                 JOIN KamranPassbookBundle:mappearance h where g.couponId = h.couponId
                 ORDER BY f.passGenerationDate DESC'
              )->getResult();


        $dataArray = array();
        foreach($queryArray as $key=>$innerArray){
            $fileSize = '';
            $pkpassFile = $helper->logDir.'/pkpass/'.$queryArray[$key]['couponId'].'.pkpass';
            if(file_exists($pkpassFile)){
                $fileSize = $helper->getPassFileSize($pkpassFile);
            }
            $created = '';
            $createdDate = $queryArray[$key]['Created'];
            if(is_object($createdDate)){
                $created = $createdDate->format( 'd-m-Y' );
            }
            $dataArray[$queryArray[$key]['Id']] = array(
                'size' => $fileSize,
                'uid' => $queryArray[$key]['UserId'],
                'template' => $queryArray[$key]['Template'],
                'category' => $queryArray[$key]['Category'],
                'couponid' => $queryArray[$key]['couponId'],
                'distribution' => $queryArray[$key]['Distribution'],
                'barcode' => $queryArray[$key]['Barcode'],
                'shorturl' => $queryArray[$key]['ShortUrl'],
                'created' => $created
            );
        }

        //return new Response(json_encode($dataArray));
        $response = new Response(json_encode($dataArray));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    //show filter mode item
    /**
     * @Route(
     *      "/getpasslist/byadmin/{id}",
     *      name = "crud.api.pass.byadmin.getlist",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "GET",
     *          "id" = "\d+"
     *      })
     * @Rest\View
     */
    public function getpassbyuseridsAction($id){

        $userId = (int)$id;
        $helper = $this->get('passbook.passhelper');

        $queryArray = $this->getDoctrine()->getManager()
            ->createQuery(
                'SELECT f.userId as UserId,e.couponBarcodeValueOption as Barcode, e.couponId as passSize,h.id as Id ,f.categoryName as Category,
                 f.passGenerationDate as Created ,f.templateName as Template ,f.couponId as couponId
                 ,g.distributionStatus as Distribution,g.shortUrl as ShortUrl
                 FROM KamranPassbookBundle:mdatasetting e
                 JOIN KamranPassbookBundle:mgeneral f where e.couponId = f.couponId AND f.userId = '.$userId.'
                 JOIN KamranPassbookBundle:mdistribution g where f.couponId = g.couponId
                 JOIN KamranPassbookBundle:mappearance h where g.couponId = h.couponId
                 ORDER BY f.organizationName'
            )->getResult();


        $dataArray = array();
        foreach($queryArray as $key=>$innerArray){
            $fileSize = '';
            $pkpassFile = $helper->logDir.'/pkpass/'.$queryArray[$key]['couponId'].'.pkpass';
            if(file_exists($pkpassFile)){
                $fileSize = $helper->getPassFileSize($pkpassFile);
            }
            $created = '';
            $createdDate = $queryArray[$key]['Created'];
            if(is_object($createdDate)){
                $created = $createdDate->format( 'd-m-Y' );
            }
            $dataArray[$queryArray[$key]['Id']] = array(
                'size' => $fileSize,
                'uid' => $queryArray[$key]['UserId'],
                'template' => $queryArray[$key]['Template'],
                'category' => $queryArray[$key]['Category'],
                'couponid' => $queryArray[$key]['couponId'],
                'distribution' => $queryArray[$key]['Distribution'],
                'barcode' => $queryArray[$key]['Barcode'],
                'shorturl' => $queryArray[$key]['ShortUrl'],
                'created' => $created
            );
        }

        //return new Response(json_encode($dataArray));
        $response = new Response(json_encode($dataArray));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }



    // get in edit mode (by coupon_id)
    /**
     * @Route(
     *      "/getpasslistbyid/{id}",
     *      name = "crud.api.pass.getlistbyid",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "GET"
     *      })
     * @Rest\View
     */
    public function getpassbyidAction($id){

        $em = $this->getDoctrine()->getManager();
        $general = $em->getRepository('KamranPassbookBundle:mgeneral')->findOneBy(array('couponId' => $id));
        $appearance = $em->getRepository('KamranPassbookBundle:mappearance')->findOneBy(array('couponId' => $id));
        $datasetting = $em->getRepository('KamranPassbookBundle:mdatasetting')->findOneBy(array('couponId' => $id));
        $header = $em->getRepository('KamranPassbookBundle:mheader')->findOneBy(array('couponId' => $id));
        $primary = $em->getRepository('KamranPassbookBundle:mprimary')->findOneBy(array('couponId' => $id));
        $secondary = $em->getRepository('KamranPassbookBundle:msecondary')->findOneBy(array('couponId' => $id));
        $auxiliary = $em->getRepository('KamranPassbookBundle:mauxiliary')->findOneBy(array('couponId' => $id));
        $backfields = $em->getRepository('KamranPassbookBundle:mbackfields')->findOneBy(array('couponId' => $id));
        $relevance = $em->getRepository('KamranPassbookBundle:mrelevance')->findOneBy(array('couponId' => $id));
        $distribution = $em->getRepository('KamranPassbookBundle:mdistribution')->findOneBy(array('couponId' => $id));

        $dataArray = array();
        $dataArray['general'] = PassHelper::entityToArray($general);
        $dataArray['appearance'] = PassHelper::entityToArray($appearance);
        $dataArray['datasetting'] = PassHelper::entityToArray($datasetting);
        $dataArray['header'] = PassHelper::entityToArray($header);
        $dataArray['primary'] = PassHelper::entityToArray($primary);
        $dataArray['secondary'] = PassHelper::entityToArray($secondary);
        $dataArray['auxiliary'] = PassHelper::entityToArray($auxiliary);
        $dataArray['backfields'] = PassHelper::entityToArray($backfields);
        $dataArray['relevance'] = PassHelper::entityToArray($relevance);
        $dataArray['distribution'] = PassHelper::entityToArray($distribution);

        $response = new Response(json_encode($dataArray));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

//Create Pass
    /**
     * @ApiDoc(
     *      description = "Create a new Pass",
     *      input = "External API Client",
     *      statusCodes = {
     *          201 = "Returned when created",
     *          400 = {
     *              "Returned when the pass is not found"
     *          }
     *      }
     * )
     *
     * @Route(
     *      "/createpass",
     *      name = "curd.api.pass.create",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "POST"
     *      }
     * )
     *
     * @Rest\View
     */
    public function createpassAction(Request $request){

        $data = $request->request->all();
        $helper = $this->get('passbook.passhelper');
        $webDir = $helper->webDir;
        $generalid = md5(uniqid(mt_rand(),true));


        $passid = sha1(uniqid(mt_rand(),true));
        $em = $this->getDoctrine()->getManager();

        $general        = new mgeneral();           //task1
        $appearance     = new mappearance();        //task2
        $datasetting    = new mdatasetting();       //task3
        $header         = new mheader();            //task4
        $primary        = new mprimary();           //task5
        $secondary      = new msecondary();         //task6
        $auxiliary      = new mauxiliary();         //task7
        $backfields     = new mbackfields();        //task8
        $relevance      = new mrelevance();         //task9
        $distribution   = new mdistribution();      //task10


        PassHelper::bindWithEntity($general , $data , 'general' );
        PassHelper::bindWithEntity($appearance , $data , 'appearance' );
        PassHelper::bindWithEntity($datasetting , $data , 'datasetting' );
        PassHelper::bindWithEntity($header , $data , 'header' );
        PassHelper::bindWithEntity($primary , $data , 'primary' );
        PassHelper::bindWithEntity($secondary , $data , 'secondary' );
        PassHelper::bindWithEntity($auxiliary , $data , 'auxiliary' );
        PassHelper::bindWithEntity($backfields , $data , 'backfields' );
        PassHelper::bindWithEntity($relevance , $data , 'relevance' );
        PassHelper::bindWithEntity($distribution , $data , 'distribution' );


        //from old controller
        $doptions = $datasetting->getCouponBarcodeValueSource();
        $gtype = $datasetting->getCouponAutoGenerateValueType();
        $glength = $datasetting->getCouponAutoGenerateValueLength();
        $barcodeoption = $datasetting->getCouponBarcodeValueOption();
        $barcodealttext = $datasetting->getBarcodeAlternateText();
        $barcodeFixedtext = $datasetting->getCouponBarcodeFixedValue();
        $barcodeDynamictext= $datasetting->getCouponBarcodeDynamicValue();
        $barcodealtfixedtext = $datasetting->getBarcodeAlternateFixedText();
        $barcodealtdynamictext = $datasetting->getBarcodeAlternateDynamicText();
        $barcodestatus = $datasetting->getCouponBarcodeStatus();
        $alttext="";
        switch($barcodestatus){
            case "hide":
                $datasetting->setCouponAutoGenerateValue("hide");
                break;

            case "show":
                switch($barcodeoption){
                    case "Static":
                        $alttext = $barcodeFixedtext;
                        $datasetting->setCouponAutoGenerateValue($alttext);
                        break;
                    case "Dynamic":
                        switch($doptions)
                        {
                            case "Dynamic":
                                $alttext=$barcodeDynamictext;
                                $datasetting->setCouponAutoGenerateValue($alttext);
                                break;
                            case "autogen":
                                switch($gtype){

                                    case "type":
                                        $numvalue = sha1(uniqid(mt_rand(),true));
                                        switch($glength){
                                            case "length":
                                                break;
                                            case 4:
                                                $gvalue = substr($numvalue, 0 , 4);
                                                break;
                                            case 5:
                                                $gvalue = substr($numvalue, 0 , 5);
                                                break;
                                            case 6:
                                                $gvalue = substr($numvalue, 0 , 6);
                                                break;
                                            case 7:
                                                $gvalue = substr($numvalue, 0 , 7);
                                                break;
                                            case 8:
                                                $gvalue = substr($numvalue, 0 , 8);
                                                break;
                                            case 9:
                                                $gvalue = substr($numvalue, 0 , 9);
                                                break;
                                            case 10:
                                                $gvalue = substr($numvalue, 0 , 10);
                                                break;
                                            case 11:
                                                $gvalue = substr($numvalue, 0 , 11);
                                                break;
                                            case 12:
                                                $gvalue = substr($numvalue, 0 , 12);
                                                break;
                                            case 13:
                                                $gvalue = substr($numvalue, 0 , 13);
                                                break;
                                            case 14:
                                                $gvalue = substr($numvalue, 0 , 14);
                                                break;
                                            case 15:
                                                $gvalue = substr($numvalue, 0 , 15);
                                                break;
                                        }
                                        $datasetting->setCouponAutoGenerateValue($gvalue);
                                        $alttext=$gvalue;
                                        break;
                                    case "Numeric":
                                        $num1 = rand(100000,999999);
                                        $num2 = rand(100000,999999);
                                        $num3 = rand(100,999);
                                        $numvalue = $num1.$num2.$num3;;
                                        switch($glength){
                                            case "length":
                                                break;
                                            case 4:
                                                $gvalue = substr($numvalue, 0 , 4);
                                                break;
                                            case 5:
                                                $gvalue = substr($numvalue, 0 , 5);
                                                break;
                                            case 6:
                                                $gvalue = substr($numvalue, 0 , 6);
                                                break;
                                            case 7:
                                                $gvalue = substr($numvalue, 0 , 7);
                                                break;
                                            case 8:
                                                $gvalue = substr($numvalue, 0 , 8);
                                                break;
                                            case 9:
                                                $gvalue = substr($numvalue, 0 , 9);
                                                break;
                                            case 10:
                                                $gvalue = substr($numvalue, 0 , 10);
                                                break;
                                            case 11:
                                                $gvalue = substr($numvalue, 0 , 11);
                                                break;
                                            case 12:
                                                $gvalue = substr($numvalue, 0 , 12);
                                                break;
                                            case 13:
                                                $gvalue = substr($numvalue, 0 , 13);
                                                break;
                                            case 14:
                                                $gvalue = substr($numvalue, 0 , 14);
                                                break;
                                            case 15:
                                                $gvalue = substr($numvalue, 0 , 15);
                                                break;
                                        }
                                        $datasetting->setCouponAutoGenerateValue($gvalue);
                                        $alttext=$gvalue;
                                        break;
                                    case "Alphabet":
                                        $seed = str_split('abcdefghijklmnopqrstuvwxyz'); // and any other characters
                                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                                        $rand = '';
                                        foreach (array_rand($seed, 16) as $k)
                                        {
                                            $rand .= $seed[$k];
                                        }

                                        $numvalue = $rand;
                                        switch($glength){
                                            case "length":
                                                break;
                                            case 4:
                                                $gvalue = substr($numvalue, 0 , 4);
                                                break;
                                            case 5:
                                                $gvalue = substr($numvalue, 0 , 5);
                                                break;
                                            case 6:
                                                $gvalue = substr($numvalue, 0 , 6);
                                                break;
                                            case 7:
                                                $gvalue = substr($numvalue, 0 , 7);
                                                break;
                                            case 8:
                                                $gvalue = substr($numvalue, 0 , 8);
                                                break;
                                            case 9:
                                                $gvalue = substr($numvalue, 0 , 9);
                                                break;
                                            case 10:
                                                $gvalue = substr($numvalue, 0 , 10);
                                                break;
                                            case 11:
                                                $gvalue = substr($numvalue, 0 , 11);
                                                break;
                                            case 12:
                                                $gvalue = substr($numvalue, 0 , 12);
                                                break;
                                            case 13:
                                                $gvalue = substr($numvalue, 0 , 13);
                                                break;
                                            case 14:
                                                $gvalue = substr($numvalue, 0 , 14);
                                                break;
                                            case 15:
                                                $gvalue = substr($numvalue, 0 , 15);
                                                break;
                                        }
                                        $datasetting->setCouponAutoGenerateValue($gvalue);
                                        $alttext=$gvalue;
                                        break;
                                    case "Alphanumeric":
                                        $numvalue = sha1(uniqid(mt_rand(),true));
                                        switch($glength){
                                            case "length":
                                                break;
                                            case 4:
                                                $gvalue = substr($numvalue, 0 , 4);
                                                break;
                                            case 5:
                                                $gvalue = substr($numvalue, 0 , 5);
                                                break;
                                            case 6:
                                                $gvalue = substr($numvalue, 0 , 6);
                                                break;
                                            case 7:
                                                $gvalue = substr($numvalue, 0 , 7);
                                                break;
                                            case 8:
                                                $gvalue = substr($numvalue, 0 , 8);
                                                break;
                                            case 9:
                                                $gvalue = substr($numvalue, 0 , 9);
                                                break;
                                            case 10:
                                                $gvalue = substr($numvalue, 0 , 10);
                                                break;
                                            case 11:
                                                $gvalue = substr($numvalue, 0 , 11);
                                                break;
                                            case 12:
                                                $gvalue = substr($numvalue, 0 , 12);
                                                break;
                                            case 13:
                                                $gvalue = substr($numvalue, 0 , 13);
                                                break;
                                            case 14:
                                                $gvalue = substr($numvalue, 0 , 14);
                                                break;
                                            case 15:
                                                $gvalue = substr($numvalue, 0 , 15);
                                                break;
                                        }
                                        $datasetting->setCouponAutoGenerateValue($gvalue);
                                        $alttext=$gvalue;
                                        break;
                                }
                                break;
                        }
                        break;
                }
                switch($barcodealttext){
                    case "same";
                        break;
                    case "static";
                        $datasetting->setBarcodeAlternateTextValue($barcodealtfixedtext);
                        //$finaltext = $gvalue;
                        break;
                    case "dynamic";
                        $datasetting->setBarcodeAlternateTextValue($barcodealtdynamictext);
                        //$finaltext=$gvalue;
                        break;

                }

                break;
        }

        if($relevance->getCouponRelevanceLocationAddressOne()){
            $latlng1 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressOne());
            $relevance->setCouponRelevanceLocationAddressOneLatitude($latlng1->lat);
            $relevance->setCouponRelevanceLocationAddressOneLongitude($latlng1->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressTwo()){
            $latlng2 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressTwo());
            $relevance->setCouponRelevanceLocationAddressTwoLatitude($latlng2->lat);
            $relevance->setCouponRelevanceLocationAddressTwoLongitude($latlng2->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressThree()){
            $latlng3 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressThree());
            $relevance->setCouponRelevanceLocationAddressThreeLatitude($latlng3->lat);
            $relevance->setCouponRelevanceLocationAddressThreeLongitude($latlng3->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressFour()){
            $latlng4 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressFour());
            $relevance->setCouponRelevanceLocationAddressFourLatitude($latlng4->lat);
            $relevance->setCouponRelevanceLocationAddressFourLongitude($latlng4->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressFive()){
            $latlng5 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressFive());
            $relevance->setCouponRelevanceLocationAddressFiveLatitude($latlng5->lat);
            $relevance->setCouponRelevanceLocationAddressFiveLongitude($latlng5->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressSix()){
            $latlng6 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressSix());
            $relevance->setCouponRelevanceLocationAddressSixLatitude($latlng6->lat);
            $relevance->setCouponRelevanceLocationAddressSixLongitude($latlng6->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressSeven()){
            $latlng7 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressSeven());
            $relevance->setCouponRelevanceLocationAddressSevenLatitude($latlng7->lat);
            $relevance->setCouponRelevanceLocationAddressSevenLongitude($latlng7->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressEight()){
            $latlng8 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressEight());
            $relevance->setCouponRelevanceLocationAddressEightLatitude($latlng8->lat);
            $relevance->setCouponRelevanceLocationAddressEightLongitude($latlng8->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressNine()){
            $latlng9 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressNine());
            $relevance->setCouponRelevanceLocationAddressNineLatitude($latlng9->lat);
            $relevance->setCouponRelevanceLocationAddressNineLongitude($latlng9->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressTen()){
            $latlng10 = $this->latlngAction($relevance->getCouponRelevanceLocationAddressTen());
            $relevance->setCouponRelevanceLocationAddressTenLatitude($latlng10->lat);
            $relevance->setCouponRelevanceLocationAddressTenLongitude($latlng10->lng);
        }

        $general->setCouponId($generalid);
        $general->setPassKey($passid);
        $general->setPassGenerationDate(new \DateTime('now'));
        $em->persist($general);

        $appearance->setCouponId($generalid);
        $em->persist($appearance);

        $datasetting->setCouponId($generalid);
        $em->persist($datasetting);


        $header->setCouponId($generalid);
        $header->setCouponHeaderValueDate($helper->dateObject($header->getCouponHeaderValueDate()));
        //$header->setCouponHeaderValueTime($helper->dateObject($header->getCouponHeaderValueTime()));
        $em->persist($header);


        $primary->setCouponId($generalid);
        $primary->setCouponPrimaryFieldValueDate($helper->dateObject($primary->getCouponPrimaryFieldValueDate()));
        //$primary->setCouponPrimaryFieldValueTime($helper->dateObject($primary->getCouponPrimaryFieldValueTime()));
        $em->persist($primary);

        $secondary->setCouponId($generalid);
        $secondary->setCouponSecondaryFieldValueDateOne($helper->dateObject($secondary->getCouponSecondaryFieldValueDateOne()));
        $secondary->setCouponSecondaryFieldValueDateTwo($helper->dateObject($secondary->getCouponSecondaryFieldValueDateTwo()));
        $secondary->setCouponSecondaryFieldValueDateThree($helper->dateObject($secondary->getCouponSecondaryFieldValueDateThree()));
        $secondary->setCouponSecondaryFieldValueDateFour($helper->dateObject($secondary->getCouponSecondaryFieldValueDateFour()));
        //$secondary->setCouponSecondaryFieldValueTimeOne($helper->dateObject($secondary->getCouponSecondaryFieldValueTimeOne()));
        //$secondary->setCouponSecondaryFieldValueTimeTwo($helper->dateObject($secondary->getCouponSecondaryFieldValueTimeTwo()));
        //$secondary->setCouponSecondaryFieldValueTimeThree($helper->dateObject($secondary->getCouponSecondaryFieldValueTimeThree()));
        //$secondary->setCouponSecondaryFieldValueTimeFour($helper->dateObject($secondary->getCouponSecondaryFieldValueTimeFour()));
        $em->persist($secondary);

        $auxiliary->setCouponId($generalid);
        $auxiliary->setCouponAuxiliaryFieldValueDateOne($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueDateOne()));
        $auxiliary->setCouponAuxiliaryFieldValueDateTwo($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueDateTwo()));
        $auxiliary->setCouponAuxiliaryFieldValueDateThree($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueDateThree()));
        $auxiliary->setCouponAuxiliaryFieldValueDateFour($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueDateFour()));
        //$auxiliary->setCouponAuxiliaryFieldValueTimeOne($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueTimeOne()));
        //$auxiliary->setCouponAuxiliaryFieldValueTimeTwo($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueTimeTwo()));
        //$auxiliary->setCouponAuxiliaryFieldValueTimeThree($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueTimeThree()));
        //$auxiliary->setCouponAuxiliaryFieldValueTimeFour($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueTimeFour()));
        $em->persist($auxiliary);

        $backfields->setCouponId($generalid);
        $em->persist($backfields);

        $relevance->setCouponId($generalid);
        $relevance->setCouponRelevanceLocationDate($helper->dateObject($relevance->getCouponRelevanceLocationDate()));
        //$relevance->setCouponRelevanceLocationTime($helper->dateObject($relevance->getCouponRelevanceLocationTime()));
        $em->persist($relevance);

        $distribution->setCouponId($generalid);
        $distribution->setPassExpirationDate($helper->dateObject($distribution->getPassExpirationDate()));
        $distribution->setRestrictedDate($helper->dateObject($distribution->getRestrictedDate()));
        $distribution->setShortUrl($helper->getGoogleShortUrl($generalid));

        $em->persist($distribution);

        $em->flush();


        $passId = $general->getId();
        $uploadDirAppearance = $appearance->getId();


        //create dir for images
        $helper->createUploadDir($uploadDirAppearance);

        $myEmail = (array_key_exists('myemail',$data)) ? $data['myemail'] : '';

        $returnParams = array(
            'passid' => $general->getId(),
            'generalid' => $generalid,
            'email_id' => $myEmail
        );
        return new Response(json_encode($returnParams));
    }



    /**
     * @ApiDoc(
     *      description = "Upload new Pass Assets",
     *      input = "External API Client",
     *      statusCodes = {
     *          201 = "Returned when created",
     *          400 = {
     *              "Returned when the pass is not found"
     *          }
     *      }
     * )
     *
     * @Route(
     *      "/createpass/uploads",
     *      name = "curd.api.pass.create.uploads",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "POST"
     *      }
     * )
     *
     * @Rest\View
     */
    public function createpassuploadAction(Request $request){

        $data = $request->request->all();
        $helper = $this->get('passbook.passhelper');
        $webDir = $helper->webDir;

        $passId = $data['pass_id'];
        $userEmail = $data['email'];
        $generalid = $data['generalid'];

        $filesResult = array();
        $filesBag = $request->files->all();
        foreach ($filesBag as $file){
            $filename = $file->getClientOriginalName();
            $filesResult []=  array(
                'path' => $file->getPathname(),
                'url'  => 'ddd'
            );
            $src    =  $webDir.'/upload/'.$passId.'/';
            $file->move( $src ,$filename );
        }



        //create pass file
        $createpass = self::generatePassAction($generalid);

        //send mail
        if(!empty($userEmail)){


            $em = $this->getDoctrine()->getManager();
            $task1 = $em->getRepository('KamranPassbookBundle:mgeneral')->findOneBy(array('couponId' => $generalid ));

            $maildescription = '<b>'.$task1->getOrganizationName().' presents passbook generator Here is your latest pass</b>';

            $message = \Swift_Message::newInstance()
                ->setSubject($task1->getOrganizationName())
                ->setFrom('no-reply@your_email.com')
                ->setTo($userEmail)
                ->attach(\Swift_Attachment::fromPath($helper->logDir.'/pkpass/'.$createpass.'.pkpass'))
                ->setBody($maildescription ,'text/html')
            ;
            $this->get('mailer')->send($message);

        }



        $returnParams = array(
            'pass_id' => $createpass,
            'status' => 'ok'
        );
        return new Response(json_encode($returnParams));
    }


    /*
     * Modify Pass
     * */
    /**
     * @Route(
     *      "/modifypass/{couponid}",
     *      name = "curd.api.pass.modify",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "PUT"
     *      })
     * @Rest\View
     */
    public function modifypassAction(Request $request , $couponid){

        $data = $request->request->all();
        $helper = $this->get('passbook.passhelper');

        $em = $this->getDoctrine()->getManager();

        $general = $em->getRepository('KamranPassbookBundle:mgeneral')->findOneBy(array('couponId' => $couponid ));
        $appearance = $em->getRepository('KamranPassbookBundle:mappearance')->findOneBy(array('couponId' => $couponid));
        $datasetting = $em->getRepository('KamranPassbookBundle:mdatasetting')->findOneBy(array('couponId' => $couponid ));
        $header = $em->getRepository('KamranPassbookBundle:mheader')->findOneBy(array('couponId' => $couponid ));
        $primary = $em->getRepository('KamranPassbookBundle:mprimary')->findOneBy(array('couponId' => $couponid ));
        $secondary = $em->getRepository('KamranPassbookBundle:msecondary')->findOneBy(array('couponId' => $couponid ));
        $auxiliary = $em->getRepository('KamranPassbookBundle:mauxiliary')->findOneBy(array('couponId' => $couponid ));
        $backfields = $em->getRepository('KamranPassbookBundle:mbackfields')->findOneBy(array('couponId' => $couponid ));
        $relevance = $em->getRepository('KamranPassbookBundle:mrelevance')->findOneBy(array('couponId' => $couponid ));
        $distribution = $em->getRepository('KamranPassbookBundle:mdistribution')->findOneBy(array('couponId' => $couponid ));

        PassHelper::bindWithEntity( $general , $data , 'general' );
        PassHelper::bindWithEntity($appearance , $data , 'appearance' );
        PassHelper::bindWithEntity($datasetting , $data , 'datasetting' );
        PassHelper::bindWithEntity($header , $data , 'header' );
        PassHelper::bindWithEntity($primary , $data , 'primary' );
        PassHelper::bindWithEntity($secondary , $data , 'secondary' );
        PassHelper::bindWithEntity($auxiliary , $data , 'auxiliary' );
        PassHelper::bindWithEntity($backfields , $data , 'backfields' );
        PassHelper::bindWithEntity($relevance , $data , 'relevance' );
        PassHelper::bindWithEntity($distribution , $data , 'distribution' );

        //from old controller
        $doptions = $datasetting->getCouponBarcodeValueSource();
        $gtype = $datasetting->getCouponAutoGenerateValueType();
        $glength = $datasetting->getCouponAutoGenerateValueLength();
        $barcodeoption = $datasetting->getCouponBarcodeValueOption();
        $barcodealttext = $datasetting->getBarcodeAlternateText();
        $barcodeFixedtext = $datasetting->getCouponBarcodeFixedValue();
        $barcodeDynamictext= $datasetting->getCouponBarcodeDynamicValue();
        $barcodealtfixedtext = $datasetting->getBarcodeAlternateFixedText();
        $barcodealtdynamictext = $datasetting->getBarcodeAlternateDynamicText();
        $barcodestatus = $datasetting->getCouponBarcodeStatus();
        $alttext="";
        switch($barcodestatus){
            case "hide":
                $datasetting->setCouponAutoGenerateValue("hide");
                break;

            case "show":
                switch($barcodeoption){
                    case "Static":
                        $alttext = $barcodeFixedtext;
                        $datasetting->setCouponAutoGenerateValue($alttext);
                        break;
                    case "Dynamic":
                        switch($doptions)
                        {
                            case "Dynamic":
                                $alttext=$barcodeDynamictext;
                                $datasetting->setCouponAutoGenerateValue($alttext);
                                break;
                            case "autogen":
                                switch($gtype){

                                    case "type":
                                        $numvalue = sha1(uniqid(mt_rand(),true));
                                        switch($glength){
                                            case "length":
                                                break;
                                            case 4:
                                                $gvalue = substr($numvalue, 0 , 4);
                                                break;
                                            case 5:
                                                $gvalue = substr($numvalue, 0 , 5);
                                                break;
                                            case 6:
                                                $gvalue = substr($numvalue, 0 , 6);
                                                break;
                                            case 7:
                                                $gvalue = substr($numvalue, 0 , 7);
                                                break;
                                            case 8:
                                                $gvalue = substr($numvalue, 0 , 8);
                                                break;
                                            case 9:
                                                $gvalue = substr($numvalue, 0 , 9);
                                                break;
                                            case 10:
                                                $gvalue = substr($numvalue, 0 , 10);
                                                break;
                                            case 11:
                                                $gvalue = substr($numvalue, 0 , 11);
                                                break;
                                            case 12:
                                                $gvalue = substr($numvalue, 0 , 12);
                                                break;
                                            case 13:
                                                $gvalue = substr($numvalue, 0 , 13);
                                                break;
                                            case 14:
                                                $gvalue = substr($numvalue, 0 , 14);
                                                break;
                                            case 15:
                                                $gvalue = substr($numvalue, 0 , 15);
                                                break;
                                        }
                                        $datasetting->setCouponAutoGenerateValue($gvalue);
                                        $alttext=$gvalue;
                                        break;
                                    case "Numeric":
                                        $num1 = rand(100000,999999);
                                        $num2 = rand(100000,999999);
                                        $num3 = rand(100,999);
                                        $numvalue = $num1.$num2.$num3;;
                                        switch($glength){
                                            case "length":
                                                break;
                                            case 4:
                                                $gvalue = substr($numvalue, 0 , 4);
                                                break;
                                            case 5:
                                                $gvalue = substr($numvalue, 0 , 5);
                                                break;
                                            case 6:
                                                $gvalue = substr($numvalue, 0 , 6);
                                                break;
                                            case 7:
                                                $gvalue = substr($numvalue, 0 , 7);
                                                break;
                                            case 8:
                                                $gvalue = substr($numvalue, 0 , 8);
                                                break;
                                            case 9:
                                                $gvalue = substr($numvalue, 0 , 9);
                                                break;
                                            case 10:
                                                $gvalue = substr($numvalue, 0 , 10);
                                                break;
                                            case 11:
                                                $gvalue = substr($numvalue, 0 , 11);
                                                break;
                                            case 12:
                                                $gvalue = substr($numvalue, 0 , 12);
                                                break;
                                            case 13:
                                                $gvalue = substr($numvalue, 0 , 13);
                                                break;
                                            case 14:
                                                $gvalue = substr($numvalue, 0 , 14);
                                                break;
                                            case 15:
                                                $gvalue = substr($numvalue, 0 , 15);
                                                break;
                                        }
                                        $datasetting->setCouponAutoGenerateValue($gvalue);
                                        $alttext=$gvalue;
                                        break;
                                    case "Alphabet":
                                        $seed = str_split('abcdefghijklmnopqrstuvwxyz'); // and any other characters
                                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                                        $rand = '';
                                        foreach (array_rand($seed, 16) as $k)
                                        {
                                            $rand .= $seed[$k];
                                        }

                                        $numvalue = $rand;
                                        switch($glength){
                                            case "length":
                                                break;
                                            case 4:
                                                $gvalue = substr($numvalue, 0 , 4);
                                                break;
                                            case 5:
                                                $gvalue = substr($numvalue, 0 , 5);
                                                break;
                                            case 6:
                                                $gvalue = substr($numvalue, 0 , 6);
                                                break;
                                            case 7:
                                                $gvalue = substr($numvalue, 0 , 7);
                                                break;
                                            case 8:
                                                $gvalue = substr($numvalue, 0 , 8);
                                                break;
                                            case 9:
                                                $gvalue = substr($numvalue, 0 , 9);
                                                break;
                                            case 10:
                                                $gvalue = substr($numvalue, 0 , 10);
                                                break;
                                            case 11:
                                                $gvalue = substr($numvalue, 0 , 11);
                                                break;
                                            case 12:
                                                $gvalue = substr($numvalue, 0 , 12);
                                                break;
                                            case 13:
                                                $gvalue = substr($numvalue, 0 , 13);
                                                break;
                                            case 14:
                                                $gvalue = substr($numvalue, 0 , 14);
                                                break;
                                            case 15:
                                                $gvalue = substr($numvalue, 0 , 15);
                                                break;
                                        }
                                        $datasetting->setCouponAutoGenerateValue($gvalue);
                                        $alttext=$gvalue;
                                        break;
                                    case "Alphanumeric":
                                        $numvalue = sha1(uniqid(mt_rand(),true));
                                        switch($glength){
                                            case "length":
                                                break;
                                            case 4:
                                                $gvalue = substr($numvalue, 0 , 4);
                                                break;
                                            case 5:
                                                $gvalue = substr($numvalue, 0 , 5);
                                                break;
                                            case 6:
                                                $gvalue = substr($numvalue, 0 , 6);
                                                break;
                                            case 7:
                                                $gvalue = substr($numvalue, 0 , 7);
                                                break;
                                            case 8:
                                                $gvalue = substr($numvalue, 0 , 8);
                                                break;
                                            case 9:
                                                $gvalue = substr($numvalue, 0 , 9);
                                                break;
                                            case 10:
                                                $gvalue = substr($numvalue, 0 , 10);
                                                break;
                                            case 11:
                                                $gvalue = substr($numvalue, 0 , 11);
                                                break;
                                            case 12:
                                                $gvalue = substr($numvalue, 0 , 12);
                                                break;
                                            case 13:
                                                $gvalue = substr($numvalue, 0 , 13);
                                                break;
                                            case 14:
                                                $gvalue = substr($numvalue, 0 , 14);
                                                break;
                                            case 15:
                                                $gvalue = substr($numvalue, 0 , 15);
                                                break;
                                        }
                                        $datasetting->setCouponAutoGenerateValue($gvalue);
                                        $alttext=$gvalue;
                                        break;
                                }
                                break;
                        }
                        break;
                }
                switch($barcodealttext){
                    case "same";
                        break;
                    case "static";
                        $datasetting->setBarcodeAlternateTextValue($barcodealtfixedtext);
                        //$finaltext = $gvalue;
                        break;
                    case "dynamic";
                        $datasetting->setBarcodeAlternateTextValue($barcodealtdynamictext);
                        //$finaltext=$gvalue;
                        break;

                }


                break;
        }

        if($relevance->getCouponRelevanceLocationAddressOne()){
            $latlng1 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressOne());
            $relevance->setCouponRelevanceLocationAddressOneLatitude($latlng1->lat);
            $relevance->setCouponRelevanceLocationAddressOneLongitude($latlng1->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressTwo()){
            $latlng2 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressTwo());
            $relevance->setCouponRelevanceLocationAddressTwoLatitude($latlng2->lat);
            $relevance->setCouponRelevanceLocationAddressTwoLongitude($latlng2->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressThree()){
            $latlng3 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressThree());
            $relevance->setCouponRelevanceLocationAddressThreeLatitude($latlng3->lat);
            $relevance->setCouponRelevanceLocationAddressThreeLongitude($latlng3->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressFour()){
            $latlng4 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressFour());
            $relevance->setCouponRelevanceLocationAddressFourLatitude($latlng4->lat);
            $relevance->setCouponRelevanceLocationAddressFourLongitude($latlng4->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressFive()){
            $latlng5 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressFive());
            $relevance->setCouponRelevanceLocationAddressFiveLatitude($latlng5->lat);
            $relevance->setCouponRelevanceLocationAddressFiveLongitude($latlng5->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressSix()){
            $latlng6 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressSix());
            $relevance->setCouponRelevanceLocationAddressSixLatitude($latlng6->lat);
            $relevance->setCouponRelevanceLocationAddressSixLongitude($latlng6->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressSeven()){
            $latlng7 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressSeven());
            $relevance->setCouponRelevanceLocationAddressSevenLatitude($latlng7->lat);
            $relevance->setCouponRelevanceLocationAddressSevenLongitude($latlng7->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressEight()){
            $latlng8 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressEight());
            $relevance->setCouponRelevanceLocationAddressEightLatitude($latlng8->lat);
            $relevance->setCouponRelevanceLocationAddressEightLongitude($latlng8->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressNine()){
            $latlng9 = $helper->latlngAction($relevance->getCouponRelevanceLocationAddressNine());
            $relevance->setCouponRelevanceLocationAddressNineLatitude($latlng9->lat);
            $relevance->setCouponRelevanceLocationAddressNineLongitude($latlng9->lng);
        }
        if($relevance->getCouponRelevanceLocationAddressTen()){
            $latlng10 = $this->latlngAction($relevance->getCouponRelevanceLocationAddressTen());
            $relevance->setCouponRelevanceLocationAddressTenLatitude($latlng10->lat);
            $relevance->setCouponRelevanceLocationAddressTenLongitude($latlng10->lng);
        }

        $general->setCouponId($couponid);
        //$general->setPassKey($passid);
        $general->setPassUpgradeDate(new \DateTime('now'));
        $em->persist($general);

        $appearance->setCouponId($couponid);
        $em->persist($appearance);

        $datasetting->setCouponId($couponid);
        $em->persist($datasetting);


        $header->setCouponId($couponid);
        $header->setCouponHeaderValueDate($helper->dateObject($header->getCouponHeaderValueDate()));
        //$header->setCouponHeaderValueTime($helper->dateObject($header->getCouponHeaderValueTime()));
        $em->persist($header);


        $primary->setCouponId($couponid);
        $primary->setCouponPrimaryFieldValueDate($helper->dateObject($primary->getCouponPrimaryFieldValueDate()));
        //$primary->setCouponPrimaryFieldValueTime($helper->dateObject($primary->getCouponPrimaryFieldValueTime()));
        $em->persist($primary);

        $secondary->setCouponId($couponid);
        $secondary->setCouponSecondaryFieldValueDateOne($helper->dateObject($secondary->getCouponSecondaryFieldValueDateOne()));
        $secondary->setCouponSecondaryFieldValueDateTwo($helper->dateObject($secondary->getCouponSecondaryFieldValueDateTwo()));
        $secondary->setCouponSecondaryFieldValueDateThree($helper->dateObject($secondary->getCouponSecondaryFieldValueDateThree()));
        $secondary->setCouponSecondaryFieldValueDateFour($helper->dateObject($secondary->getCouponSecondaryFieldValueDateFour()));
        //$secondary->setCouponSecondaryFieldValueTimeOne($helper->dateObject($secondary->getCouponSecondaryFieldValueTimeOne()));
        //$secondary->setCouponSecondaryFieldValueTimeTwo($helper->dateObject($secondary->getCouponSecondaryFieldValueTimeTwo()));
        //$secondary->setCouponSecondaryFieldValueTimeThree($helper->dateObject($secondary->getCouponSecondaryFieldValueTimeThree()));
        //$secondary->setCouponSecondaryFieldValueTimeFour($helper->dateObject($secondary->getCouponSecondaryFieldValueTimeFour()));
        $em->persist($secondary);

        $auxiliary->setCouponId($couponid);
        $auxiliary->setCouponAuxiliaryFieldValueDateOne($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueDateOne()));
        $auxiliary->setCouponAuxiliaryFieldValueDateTwo($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueDateTwo()));
        $auxiliary->setCouponAuxiliaryFieldValueDateThree($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueDateThree()));
        $auxiliary->setCouponAuxiliaryFieldValueDateFour($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueDateFour()));
        //$auxiliary->setCouponAuxiliaryFieldValueTimeOne($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueTimeOne()));
        //$auxiliary->setCouponAuxiliaryFieldValueTimeTwo($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueTimeTwo()));
        //$auxiliary->setCouponAuxiliaryFieldValueTimeThree($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueTimeThree()));
        //$auxiliary->setCouponAuxiliaryFieldValueTimeFour($helper->dateObject($auxiliary->getCouponAuxiliaryFieldValueTimeFour()));
        $em->persist($auxiliary);

        $backfields->setCouponId($couponid);
        $em->persist($backfields);

        $relevance->setCouponId($couponid);
        $relevance->setCouponRelevanceLocationDate($helper->dateObject($relevance->getCouponRelevanceLocationDate()));
        //$relevance->setCouponRelevanceLocationTime($helper->dateObject($relevance->getCouponRelevanceLocationTime()));
        $em->persist($relevance);

        $distribution->setCouponId($couponid);
        $distribution->setPassExpirationDate($helper->dateObject($distribution->getPassExpirationDate()));
        $distribution->setRestrictedDate($helper->dateObject($distribution->getRestrictedDate()));
        $em->persist($distribution);

        $em->flush();


        $myEmail = (array_key_exists('myemail',$data)) ? $data['myemail'] : '';
        $oldImages = (array_key_exists('old',$data)) ? $data['old'] : array();

        $dataAppearanceArray = $data['appearance'];
        unset($dataAppearanceArray['logoText']);
        unset($dataAppearanceArray['eventTicketStatus']);
        unset($dataAppearanceArray['backgroundColorCode']);
        unset($dataAppearanceArray['fieldLabelColorCode']);
        unset($dataAppearanceArray['fieldValueColorCode']);

        $returnParams = array(
            'passid' => $general->getId(),
            'coupon_id' => $couponid,
            'old_images' => $oldImages,
            'images'=> $dataAppearanceArray ,
            'email_id' => $myEmail,
            'status' => 'ok'
        );
        return new Response(json_encode($returnParams));
    }

    /**
     * @Route(
     *      "/modifypass/uploads",
     *      name = "curd.api.pass.modify.uploads",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "POST"
     *      }
     * )
     *
     * @Rest\View
     */
    public function modifypassuploadAction(Request $request){

        $data = $request->request->all();
        $helper = $this->get('passbook.passhelper');
        $webDir = $helper->webDir;

        $passId = $data['pass_id'];
        $userEmail = $data['email'];
        $coupon_id = $data['coupon_id'];
        $oldImages = (array_key_exists('old_images',$data)) ? $data['old_images'] : '';

        $filesResult = array();
        $filesBag = $request->files->all();
        foreach ($filesBag as $file){
            $filename = $file->getClientOriginalName();
            $filesResult []=  array(
                'path' => $file->getPathname(),
                'url'  => 'ddd'
            );
            $src    =  $webDir.'/upload/'.$passId.'/';
            $file->move( $src ,$filename );
        }

        if( $oldImages != '' ){
            $oldImagesArray = explode( ',' ,$oldImages);
            foreach($oldImagesArray as $image){
                $imgSrc = $webDir.'/upload/'.$passId.'/'.$image;
                //echo $imgSrc;
                if(file_exists($imgSrc)){
                    unlink($imgSrc);
                }
            }
        }

        //create pass file
        $createpass = self::generatePassAction($coupon_id);

        //send mail
        if(!empty($userEmail)){

            $em = $this->getDoctrine()->getManager();
            $task1 = $em->getRepository('KamranPassbookBundle:mgeneral')->findOneBy(array('couponId' => $coupon_id ));

            $maildescription = '<b>'.$task1->getOrganizationName().' presents passbook generator Here is your latest pass</b>';

            $message = \Swift_Message::newInstance()
                ->setSubject($task1->getOrganizationName())
                ->setFrom('no-reply@your_email.com')
                ->setTo($userEmail)
                ->attach(\Swift_Attachment::fromPath($helper->logDir.'/pkpass/'.$createpass.'.pkpass'))
                ->setBody($maildescription ,'text/html')
            ;
            $this->get('mailer')->send($message);

        }



        $returnParams = array(
            'pass_id' => $createpass,
            'status' => 'ok'
        );
        return new Response(json_encode($returnParams));

    }








    /*
     * Replicate Pass
     * */
    /**
     * @Route(
     *      "/replicatepass/{couponid}",
     *      name = "crud.api.pass.replicate",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "GET"
     *      })
     * @Rest\View
     */
    public function replicatepassAction(Request $request , $couponid){

        $pass = self::replicateAction($couponid);
        $returnParams = array(
            'pass_id' => $pass,
            'status' => 'ok'
        );
        return new Response(json_encode($returnParams));
    }


    /*
     * Publish Pass
     * */
    /**
     * @Route(
     *      "/publishpass/{status}",
     *      name = "curd.api.pass.publish",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "PUT"
     *      })
     * @Rest\View
     */
    public function publishpassAction(Request $request , $status){

        $data = $request->request->all();
        $em = $this->getDoctrine()->getManager();
        $distribution = $em->getRepository('KamranPassbookBundle:mdistribution')->findOneBy(array('couponId' => $data['coupon_id'] ));
        if ($status == 1){
            $distribution->setDistributionStatus(0);
        }
        else{
            $distribution->setDistributionStatus(1);
        }
        $em->persist($distribution);
        $em->flush();

        $returnParams = array(
            'status' => 'ok'
        );
        return new Response(json_encode($returnParams));
    }


    /*
     * Remove Passes
     * */
    /**
     * @Route(
     *      "/removepasses",
     *      name = "curd.api.passes.remove",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "POST"
     *      }
     * )
     *
     * @Rest\View
     */
    public function removepassAction(Request $request){

        $data = $request->request->all();
        $helper = $this->get('passbook.passhelper');
        $logDir = $helper->logDir;
        $webDir = $helper->webDir;

        $testArray = array();

        $delCouponIds = $data['del_ids'];
        foreach($delCouponIds as $coupon_id){
            $uploadDirId = 0;
            $em = $this->getDoctrine()->getManager();
            $general = $em->getRepository('KamranPassbookBundle:mappearance')->findOneBy(array('couponId' => $coupon_id));
            $uploadDirId = $general->getId();

            $query = $em->createQuery('DELETE from KamranPassbookBundle:mgeneral at where at.couponId Like :title');
            $query->setParameter('title', $coupon_id);
            $query->execute();
            $query1 = $em->createQuery('DELETE from KamranPassbookBundle:mappearance bt where bt.couponId Like :title');
            $query1->setParameter('title', $coupon_id);
            $query1->execute();
            $query2 = $em->createQuery('DELETE from KamranPassbookBundle:mdatasetting ct where ct.couponId Like :title');
            $query2->setParameter('title', $coupon_id);
            $query2->execute();
            $query3 = $em->createQuery('DELETE from KamranPassbookBundle:mheader dt where dt.couponId Like :title');
            $query3->setParameter('title', $coupon_id);
            $query3->execute();
            $query4 = $em->createQuery('DELETE from KamranPassbookBundle:mprimary et where et.couponId Like :title');
            $query4->setParameter('title', $coupon_id);
            $query4->execute();
            $query5 = $em->createQuery('DELETE from KamranPassbookBundle:msecondary ft where ft.couponId Like :title');
            $query5->setParameter('title', $coupon_id);
            $query5->execute();
            $query6 = $em->createQuery('DELETE from KamranPassbookBundle:mauxiliary gt where gt.couponId Like :title');
            $query6->setParameter('title', $coupon_id);
            $query6->execute();
            $query7 = $em->createQuery('DELETE from KamranPassbookBundle:mbackfields ht where ht.couponId Like :title');
            $query7->setParameter('title', $coupon_id);
            $query7->execute();
            $query8 = $em->createQuery('DELETE from KamranPassbookBundle:mrelevance iit where iit.couponId Like :title');
            $query8->setParameter('title', $coupon_id);
            $query8->execute();
            $query9 = $em->createQuery('DELETE from KamranPassbookBundle:mdistribution jt where jt.couponId Like :title');
            $query9->setParameter('title', $coupon_id);
            $query9->execute();
            $fs = new Filesystem();
            $fs->remove($logDir.'/pkpass/'.$coupon_id.'.pkpass');
            $fs->remove($webDir.'/upload/'.$uploadDirId);
        }



        $returnParams = array(
            'status' => 'ok'
        );
        return new Response(json_encode($returnParams));
    }


    /*
     *  Helper functions
     * */
    public function generatePassAction($id) {

        $em     = $this->getDoctrine()->getManager();
        $task1  = $em->getRepository('KamranPassbookBundle:mgeneral')->findOneBy(array('couponId' => $id));
        $task2  = $em->getRepository('KamranPassbookBundle:mappearance')->findOneBy(array('couponId' => $id));
        $task3  = $em->getRepository('KamranPassbookBundle:mdatasetting')->findOneBy(array('couponId' => $id));
        $task4  = $em->getRepository('KamranPassbookBundle:mheader')->findOneBy(array('couponId' => $id));
        $task5  = $em->getRepository('KamranPassbookBundle:mprimary')->findOneBy(array('couponId' => $id));
        $task6  = $em->getRepository('KamranPassbookBundle:msecondary')->findOneBy(array('couponId' => $id));
        $task7  = $em->getRepository('KamranPassbookBundle:mauxiliary')->findOneBy(array('couponId' => $id));
        $task8  = $em->getRepository('KamranPassbookBundle:mbackfields')->findOneBy(array('couponId' => $id));
        $task9  = $em->getRepository('KamranPassbookBundle:mrelevance')->findOneBy(array('couponId' => $id));
        $task10 = $em->getRepository('KamranPassbookBundle:mdistribution')->findOneBy(array('couponId' => $id));

        $passid = $task1->getPassKey();
        $category = $task1->getCategoryName();
        $taskid = $task2->getId();
        $mainlogo = $task2->getLogoName();
        $mainicon = $task2->getIconName();
        $genericthumbnail = $task2->getGenericThumbnail();
        $boardingpassfooter = $task2->getBoardingPassFooter();
        $couponstrip = $task2->getCouponStrip();
        $storecardstrip = $task2->getStoreCardStrip();
        $etstrip = $task2->getEventTicketStrip();
        $etthumbnail = $task2->getEventTicketThumbnail();
        $etbackground = $task2->getEventTicketBackground();
        $barcodestatus = $task3->getCouponBarcodeStatus();

        $root = $this->get('kernel')->getRootDir();            /////path to root
        $pkPassFile = $root.'/logs/pkpass/'.$id.'.pkpass';
        $zip = new \ZipArchive();
        if(file_exists($pkPassFile)){
            if ($zip->open($pkPassFile) === TRUE){
                $zip->deleteName('thumbnail.png');
                $zip->deleteName('thumbnail@2x.png');
                $zip->deleteName('strip.png');
                $zip->deleteName('strip@2x.png');
                $zip->deleteName('logo.png');
                $zip->deleteName('logo@2x.png');
                $zip->deleteName('footer.png');
                $zip->deleteName('footer@2x.png');
                $zip->deleteName('background.png');
                $zip->deleteName('background@2x.png');
                $zip->close();
            }
        }

        $imagedir = __DIR__ . "/../../../../web/upload/";

        if (!$task2 && !$task3 && !$task4 && !$task5 && !$task6 && !$task7 && !$task8 && !$task9 && !$task10)
        {
            throw $this->createNotFoundException(
                'No pass found for id ' . $id
            );
        }
        /////////////////////////pass generation/////////////////////////
        /////////////////////////////////////////////////////////////////


        //echo $task3->getCouponAutoGenerateValue();
        // setting pass type and images
        switch($task1->getCategoryName()){

            case "Generic":
                $pass = new Generic($id, $task1->getTemplateName());
                if($genericthumbnail){
                    $thumbnail = new Image( $imagedir.$taskid."/".$genericthumbnail."", 'thumbnail');
                    $pass->addImage($thumbnail);
                    $thumbnail = new Image( $imagedir.$taskid."/".$genericthumbnail."", 'thumbnail@2x');
                    $pass->addImage($thumbnail);
                }
                break;
            case "Boarding Pass":
                switch($task1->getBoardingPassTransit()){
                    case "PKTransitTypeAir":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_AIR);
                        break;
                    case "PKTransitTypeBus":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_BUS);
                        break;
                    case "PKTransitTypeTrain":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_TRAIN);
                        break;
                    case "PKTransitTypeBoat":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_BOAT);
                        break;
                    case "PKTransitTypeGeneric":
                        $pass = new BoardingPass($id, $task1->getTemplateName(), BoardingPass::TYPE_GENERIC);
                        break;
                }
                if($boardingpassfooter){
                    $footer = new Image( $imagedir.$taskid."/".$boardingpassfooter."", 'footer');
                    $pass->addImage($footer);
                    $footer = new Image( $imagedir.$taskid."/".$boardingpassfooter."", 'footer@2x');
                    $pass->addImage($footer);
                }
                break;
            case "Coupon":
                $pass = new Coupon($id, $task1->getTemplateName());
                if($couponstrip){
                    $strip = new Image( $imagedir.$taskid."/".$couponstrip."", 'strip');
                    $pass->addImage($strip);
                    $strip = new Image( $imagedir.$taskid."/".$couponstrip."", 'strip@2x');
                    $pass->addImage($strip);
                }
                break;
            case "Event Ticket":
                $pass = new EventTicket($id, $task1->getTemplateName());
                switch($task2->getEventTicketStatus()){
                    case "Layout 1: Strip":
                        if($etstrip){
                            $strip = new Image( $imagedir.$taskid."/".$etstrip."", 'strip');
                            $pass->addImage($strip);
                            $strip = new Image( $imagedir.$taskid."/".$etstrip."", 'strip@2x');
                            $pass->addImage($strip);
                        }
                        break;
                    case "Layout 2: Background/Thumbnail":
                        if($etbackground){
                            $background = new Image( $imagedir.$taskid."/".$etbackground."", 'background');
                            $pass->addImage($background);
                            $background = new Image( $imagedir.$taskid."/".$etbackground."", 'background@2x');
                            $pass->addImage($background);
                        }
                        if($etthumbnail){
                            $thumbnail = new Image( $imagedir.$taskid."/".$etthumbnail."", 'thumbnail');
                            $pass->addImage($thumbnail);
                            $thumbnail = new Image( $imagedir.$taskid."/".$etthumbnail."", 'thumbnail@2x');
                            $pass->addImage($thumbnail);
                        }
                        break;
                }
                break;
            case "Store Card":
                $pass = new StoreCard($id, $task1->getTemplateName());
                if($storecardstrip){
                    $strip = new Image( $imagedir.$taskid."/".$storecardstrip."", 'strip');
                    $pass->addImage($strip);
                    $strip = new Image( $imagedir.$taskid."/".$storecardstrip."", 'strip@2x');
                    $pass->addImage($strip);
                }
                break;
        }
        $pass->setBackgroundColor($task2->getBackgroundColorCode());
        $pass->setForegroundColor($task2->getFieldValueColorCode());
        $pass->setLabelColor($task2->getFieldLabelColorCode());
        $pass->setLogoText($task2->getLogoText());

        // Add icon image
        if($mainicon == ""){
            $icon = new Image( $root.'/Resources/Images/LogoIcon58x58.png', 'icon');
            $pass->addImage($icon);
            $icon = new Image( $root.'/Resources/Images/LogoIcon58x58@2x.png', 'icon@2x');
            $pass->addImage($icon);
        }
        else{

            $icon = new Image( $imagedir.$taskid."/".$mainicon."", 'icon');
            $pass->addImage($icon);
            $icon = new Image( $imagedir.$taskid."/".$mainicon."", 'icon@2x');
            $pass->addImage($icon);
        }
        if($mainlogo){
            $logo = new Image( $imagedir.$taskid."/".$mainlogo."", 'logo');
            $pass->addImage($logo);
            $logo = new Image( $imagedir.$taskid."/".$mainlogo."", 'logo@2x');
            $pass->addImage($logo);
        }
        // Create pass structure
        $structure = new Structure();
        // Add header field
        switch($task4->getCouponHeaderValueType()){
            case "text":
                $header = new Field($task4->getCouponHeaderValueType()."h1"," ");
                if($task4->getCouponHeaderTextValue()){
                    $header->setValue($task4->getCouponHeaderTextValue());
                }
                if($task4->getCouponHeaderLabel()){
                    $header->setLabel(strtoupper($task4->getCouponHeaderLabel()));
                }
                $header->setTextAlignment($task4->getCouponHeaderAlignmnet());

                $structure->addHeaderField($header);
                break;
            case "datentime":
                $header = new DateField($task4->getCouponHeaderValueType()."h1"," ");
                if( $task4->getCouponHeaderValueDate()){
                    $header->setValue( $task4->getCouponHeaderValueDate());
                    $header->setDateStyle($task4->getcouponHeaderValueDateFormate());
                    $header->setTimeStyle($task4->getcouponHeaderValueTimeFormate());
                }
                if($task4->getCouponHeaderLabel()){
                    $header->setLabel(strtoupper($task4->getCouponHeaderLabel()));
                }
                $header->setTextAlignment($task4->getCouponHeaderAlignmnet());
                $structure->addHeaderField($header);
                break;
            case "number":
                $header = new NumberField($task4->getCouponHeaderValueType()."h1"," ");
                if($task4->getCouponHeaderNumberValue()){
                    $header->setValue($task4->getCouponHeaderNumberValue());
                    $header->setNumberStyle($task4->getCouponHeaderNumberFormate());
                }
                if($task4->getCouponHeaderLabel()){
                    $header->setLabel(strtoupper($task4->getCouponHeaderLabel()));
                }
                $header->setTextAlignment($task4->getCouponHeaderAlignmnet());
                $structure->addHeaderField($header);
                break;
            case "currency":
                $header = new NumberField($task4->getCouponHeaderValueType()."h1"," ");
                if($task4->getCouponHeaderCurrencyValue()){
                    $header->setValue($task4->getCouponHeaderCurrencyValue());
                    $header->setCurrencyCode($task4->getCouponHeaderCurrencyCode());
                }

                if($task4->getCouponHeaderLabel()){
                    $header->setLabel(strtoupper($task4->getCouponHeaderLabel()));
                }
                $header->setTextAlignment($task4->getCouponHeaderAlignmnet());
                $structure->addHeaderField($header);
                break;
        }

        // Add primary field

        switch($task5->getCouponPrimaryFieldValueType()){
            case "text":
                $primary = new Field($task5->getCouponPrimaryFieldValueType()."p1"," ");
                if($task5->getCouponPrimaryFieldTextValue()){
                    $primary->setValue($task5->getCouponPrimaryFieldTextValue());
                }
                if($task5->getCouponPrimaryFieldLabel()){
                    $primary->setLabel(strtoupper($task5->getCouponPrimaryFieldLabel()));
                }
                $structure->addPrimaryField($primary);
                break;
            case "datentime":
                $primary = new DateField($task5->getCouponPrimaryFieldValueType()."p1"," ");
                if( $task5->getCouponPrimaryFieldValueDate()){
                    $primary->setValue( $task5->getCouponPrimaryFieldValueDate());
                    $primary->setDateStyle($task5->getCouponPrimaryFieldValueDateFormate());
                    $primary->setTimeStyle($task5->getCouponPrimaryFieldValueTimeFormate());
                }
                if($task5->getCouponPrimaryFieldLabel()){
                    $primary->setLabel(strtoupper($task5->getCouponPrimaryFieldLabel()));
                }
                $structure->addPrimaryField($primary);
                break;
            case "number":
                $primary = new NumberField($task5->getCouponPrimaryFieldValueType()."p1"," ");
                if($task5->getCouponPrimaryFieldNumberValue()){
                    $primary->setValue($task5->getCouponPrimaryFieldNumberValue());
                    $primary->setNumberStyle($task5->getCouponPrimaryFieldNumberFormate());
                }
                if($task5->getCouponPrimaryFieldLabel()){
                    $primary->setLabel(strtoupper($task5->getCouponPrimaryFieldLabel()));
                }
                $structure->addPrimaryField($primary);
                break;
            case "currency":
                $primary = new NumberField($task5->getCouponPrimaryFieldValueType()."p1"," ");
                if($task5->getCouponPrimaryFieldCurrencyValue()){
                    $primary->setValue($task5->getCouponPrimaryFieldCurrencyValue());
                    $primary->setCurrencyCode($task5->getCouponPrimaryFieldCurrencyCode());
                }
                if($task5->getCouponPrimaryFieldLabel()){
                    $primary->setLabel(strtoupper($task5->getCouponPrimaryFieldLabel()));
                }
                $structure->addPrimaryField($primary);
                break;
        }
        // Add secondary field
        switch($task6->getCouponSecondaryFieldTotalFields()){
            case 0:

                break;
            case 1:
                switch($task6->getCouponSecondaryFieldValueTypeOne()){
                    case "text":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                        if($task6->getCouponSecondaryFieldTextValueOne()){
                            $secondary1->setValue($task6->getCouponSecondaryFieldTextValueOne());
                        }
                        if($task6->getCouponSecondaryFieldLabelOne()){
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        }
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "datentime":
                        $secondary1 = new DateField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");

                        if( $task6->getCouponSecondaryFieldValueDateOne()){
                            $secondary1->setValue($task6->getCouponSecondaryFieldValueDateOne());
                            $secondary1->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateOne());
                            $secondary1->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateOne());
                        }
                        if($task6->getCouponSecondaryFieldLabelOne()){
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        }
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "number":
                        $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                        if($task6->getCouponSecondaryFieldNumberValueOne()){
                            $secondary1->setValue($task6->getCouponSecondaryFieldNumberValueOne());
                            $secondary1->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateOne());
                        }
                        if($task6->getCouponSecondaryFieldLabelOne()){
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        }
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "currency":
                        $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                        if($task6->getCouponSecondaryFieldCurrencyValueOne()){
                            $secondary1->setValue($task6->getCouponSecondaryFieldCurrencyValueOne());
                            $secondary1->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeOne());
                        }
                        if($task6->getCouponSecondaryFieldLabelOne()){
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        }
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                }
                break;
            case 2:
                switch($task6->getCouponSecondaryFieldValueTypeOne()){
                    case "text":
                        $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                        if($task6->getCouponSecondaryFieldTextValueOne()){
                            $secondary1->setValue($task6->getCouponSecondaryFieldTextValueOne());
                        }
                        if($task6->getCouponSecondaryFieldLabelOne()){
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        }
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "datentime":
                        $secondary1 = new DateField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");

                        if( $task6->getCouponSecondaryFieldValueDateOne()){
                            $secondary1->setValue($task6->getCouponSecondaryFieldValueDateOne());
                            $secondary1->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateOne());
                            $secondary1->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateOne());
                        }
                        if($task6->getCouponSecondaryFieldLabelOne()){
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        }
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "number":
                        $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                        if($task6->getCouponSecondaryFieldNumberValueOne()){
                            $secondary1->setValue($task6->getCouponSecondaryFieldNumberValueOne());
                            $secondary1->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateOne());
                        }
                        if($task6->getCouponSecondaryFieldLabelOne()){
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        }
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                    case "currency":
                        $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                        if($task6->getCouponSecondaryFieldCurrencyValueOne()){
                            $secondary1->setValue($task6->getCouponSecondaryFieldCurrencyValueOne());
                            $secondary1->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeOne());
                        }
                        if($task6->getCouponSecondaryFieldLabelOne()){
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                        }
                        $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                        $structure->addSecondaryField($secondary1);
                        break;
                }
                switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                    case "text":
                        $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                        if($task6->getCouponSecondaryFieldTextValueTwo()){
                            $secondary2->setValue($task6->getCouponSecondaryFieldTextValueTwo());
                        }
                        if($task6->getCouponSecondaryFieldLabelTwo()){
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                        }
                        $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                        $structure->addSecondaryField($secondary2);
                        break;
                    case "datentime":
                        $secondary2 = new DateField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                        if( $task6->getCouponSecondaryFieldValueDateTwo()){
                            $secondary2->setValue($task6->getCouponSecondaryFieldValueDateTwo());
                            $secondary2->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateTwo());
                            $secondary2->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateTwo());
                        }
                        if($task6->getCouponSecondaryFieldLabelTwo()){
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                        }
                        $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                        $structure->addSecondaryField($secondary2);
                        break;
                    case "number":
                        $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                        if($task6->getCouponSecondaryFieldNumberValueTwo()){
                            $secondary2->setValue($task6->getCouponSecondaryFieldNumberValueTwo());
                            $secondary2->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateTwo());
                        }
                        if($task6->getCouponSecondaryFieldLabelTwo()){
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                        }
                        $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                        $structure->addSecondaryField($secondary2);
                        break;
                    case "currency":
                        $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                        if($task6->getCouponSecondaryFieldCurrencyValueTwo()){
                            $secondary2->setValue($task6->getCouponSecondaryFieldCurrencyValueTwo());
                            $secondary2->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeTwo());
                        }
                        if($task6->getCouponSecondaryFieldLabelTwo()){
                            $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                        }
                        $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                        $structure->addSecondaryField($secondary2);
                        break;
                }
                break;
            case 3:
                if($task1->getCategoryName()=='Coupon'){
                    switch($task6->getCouponSecondaryFieldValueTypeOne()){
                        case "text":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldTextValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldTextValueOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "datentime":
                            $secondary1 = new DateField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");

                            if( $task6->getCouponSecondaryFieldValueDateOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldValueDateOne());
                                $secondary1->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateOne());
                                $secondary1->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "number":
                            $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldNumberValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldNumberValueOne());
                                $secondary1->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "currency":
                            $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldCurrencyValueOne());
                                $secondary1->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeOne());
                            }
                            $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                        case "text":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldTextValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldTextValueTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "datentime":
                            $secondary2 = new DateField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if( $task6->getCouponSecondaryFieldValueDateTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldValueDateTwo());
                                $secondary2->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateTwo());
                                $secondary2->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "number":
                            $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldNumberValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldNumberValueTwo());
                                $secondary2->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "currency":
                            $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldCurrencyValueTwo());
                                $secondary2->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                    }
                }
                else{
                    switch($task6->getCouponSecondaryFieldValueTypeOne()){
                        case "text":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldTextValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldTextValueOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "datentime":
                            $secondary1 = new DateField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");

                            if( $task6->getCouponSecondaryFieldValueDateOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldValueDateOne());
                                $secondary1->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateOne());
                                $secondary1->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "number":
                            $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldNumberValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldNumberValueOne());
                                $secondary1->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "currency":
                            $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldCurrencyValueOne());
                                $secondary1->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                        case "text":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldTextValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldTextValueTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "datentime":
                            $secondary2 = new DateField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if( $task6->getCouponSecondaryFieldValueDateTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldValueDateTwo());
                                $secondary2->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateTwo());
                                $secondary2->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "number":
                            $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldNumberValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldNumberValueTwo());
                                $secondary2->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "currency":
                            $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldCurrencyValueTwo());
                                $secondary2->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeThree()){
                        case "text":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31"," ");
                            if( $task6->getCouponSecondaryFieldTextValueThree()){
                                $secondary3->setValue( $task6->getCouponSecondaryFieldTextValueThree());
                            }
                            if($task6->getCouponSecondaryFieldLabelThree()){
                                $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            }
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "datentime":
                            $secondary3 = new DateField($task6->getCouponSecondaryFieldValueTypeThree()."s31"," ");
                            if( $task6->getCouponSecondaryFieldValueDateThree()){
                                $secondary3->setValue($task6->getCouponSecondaryFieldValueDateThree());
                                $secondary3->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateThree());
                                $secondary3->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateThree());
                            }
                            if($task6->getCouponSecondaryFieldLabelThree()){
                                $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            }
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "number":
                            $secondary3 = new NumberField($task6->getCouponSecondaryFieldValueTypeThree()."s31"," ");
                            if($task6->getCouponSecondaryFieldNumberValueThree()){
                                $secondary3->setValue($task6->getCouponSecondaryFieldNumberValueThree());
                                $secondary3->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateThree());
                            }
                            if($task6->getCouponSecondaryFieldLabelThree()){
                                $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            }
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "currency":
                            $secondary3 = new NumberField($task6->getCouponSecondaryFieldValueTypeThree()."s31"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueThree()){
                                $secondary3->setValue($task6->getCouponSecondaryFieldCurrencyValueThree());
                                $secondary3->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeThree());
                            }
                            if($task6->getCouponSecondaryFieldLabelThree()){
                                $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            }
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                    }
                }

                break;
            case 4:
                if($task1->getCategoryName()=='Coupon'){
                    switch($task6->getCouponSecondaryFieldValueTypeOne()){
                        case "text":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldTextValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldTextValueOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "datentime":
                            $secondary1 = new DateField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");

                            if( $task6->getCouponSecondaryFieldValueDateOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldValueDateOne());
                                $secondary1->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateOne());
                                $secondary1->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "number":
                            $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldNumberValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldNumberValueOne());
                                $secondary1->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "currency":
                            $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldCurrencyValueOne());
                                $secondary1->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                        case "text":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldTextValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldTextValueTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "datentime":
                            $secondary2 = new DateField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if( $task6->getCouponSecondaryFieldValueDateTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldValueDateTwo());
                                $secondary2->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateTwo());
                                $secondary2->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "number":
                            $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldNumberValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldNumberValueTwo());
                                $secondary2->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "currency":
                            $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldCurrencyValueTwo());
                                $secondary2->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                    }
                }
                else{
                    switch($task6->getCouponSecondaryFieldValueTypeOne()){
                        case "text":
                            $secondary1 = new Field($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldTextValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldTextValueOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "datentime":
                            $secondary1 = new DateField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");

                            if( $task6->getCouponSecondaryFieldValueDateOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldValueDateOne());
                                $secondary1->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateOne());
                                $secondary1->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "number":
                            $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldNumberValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldNumberValueOne());
                                $secondary1->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                        case "currency":
                            $secondary1 = new NumberField($task6->getCouponSecondaryFieldValueTypeOne()."s11"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueOne()){
                                $secondary1->setValue($task6->getCouponSecondaryFieldCurrencyValueOne());
                                $secondary1->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeOne());
                            }
                            if($task6->getCouponSecondaryFieldLabelOne()){
                                $secondary1->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelOne()));
                            }
                            $secondary1->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetOne());
                            $structure->addSecondaryField($secondary1);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeTwo()){
                        case "text":
                            $secondary2 = new Field($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldTextValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldTextValueTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "datentime":
                            $secondary2 = new DateField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if( $task6->getCouponSecondaryFieldValueDateTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldValueDateTwo());
                                $secondary2->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateTwo());
                                $secondary2->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "number":
                            $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldNumberValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldNumberValueTwo());
                                $secondary2->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                        case "currency":
                            $secondary2 = new NumberField($task6->getCouponSecondaryFieldValueTypeTwo()."s21"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueTwo()){
                                $secondary2->setValue($task6->getCouponSecondaryFieldCurrencyValueTwo());
                                $secondary2->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeTwo());
                            }
                            if($task6->getCouponSecondaryFieldLabelTwo()){
                                $secondary2->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelTwo()));
                            }
                            $secondary2->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetTwo());
                            $structure->addSecondaryField($secondary2);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeThree()){
                        case "text":
                            $secondary3 = new Field($task6->getCouponSecondaryFieldValueTypeThree()."s31"," ");
                            if( $task6->getCouponSecondaryFieldTextValueThree()){
                                $secondary3->setValue( $task6->getCouponSecondaryFieldTextValueThree());
                            }
                            if($task6->getCouponSecondaryFieldLabelThree()){
                                $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            }
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "datentime":
                            $secondary3 = new DateField($task6->getCouponSecondaryFieldValueTypeThree()."s31"," ");
                            if( $task6->getCouponSecondaryFieldValueDateThree()){
                                $secondary3->setValue($task6->getCouponSecondaryFieldValueDateThree());
                                $secondary3->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateThree());
                                $secondary3->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateThree());
                            }
                            if($task6->getCouponSecondaryFieldLabelThree()){
                                $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            }
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "number":
                            $secondary3 = new NumberField($task6->getCouponSecondaryFieldValueTypeThree()."s31"," ");
                            if($task6->getCouponSecondaryFieldNumberValueThree()){
                                $secondary3->setValue($task6->getCouponSecondaryFieldNumberValueThree());
                                $secondary3->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateThree());
                            }
                            if($task6->getCouponSecondaryFieldLabelThree()){
                                $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            }
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                        case "currency":
                            $secondary3 = new NumberField($task6->getCouponSecondaryFieldValueTypeThree()."s31"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueThree()){
                                $secondary3->setValue($task6->getCouponSecondaryFieldCurrencyValueThree());
                                $secondary3->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeThree());
                            }
                            if($task6->getCouponSecondaryFieldLabelThree()){
                                $secondary3->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelThree()));
                            }
                            $secondary3->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetThree());
                            $structure->addSecondaryField($secondary3);
                            break;
                    }
                    switch($task6->getCouponSecondaryFieldValueTypeFour()){
                        case "text":
                            $secondary4 = new Field($task6->getCouponSecondaryFieldValueTypeFour()."s41"," ");
                            if($task6->getCouponSecondaryFieldTextValueFour()){
                                $secondary4->setValue($task6->getCouponSecondaryFieldTextValueFour());
                            }
                            if($task6->getCouponSecondaryFieldLabelFour()){
                                $secondary4->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelFour()));
                            }
                            $secondary4->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetFour());
                            $structure->addSecondaryField($secondary4);
                            break;
                        case "datentime":
                            $secondary4 = new DateField($task6->getCouponSecondaryFieldValueTypeFour()."s41"," ");

                            if( $task6->getCouponSecondaryFieldValueDateFour()){
                                $secondary4->setValue($task6->getCouponSecondaryFieldValueDateFour());
                                $secondary4->setDateStyle($task6->getCouponSecondaryFieldValueDateFormateFour());
                                $secondary4->setTimeStyle($task6->getCouponSecondaryFieldValueTimeFormateFour());
                            }
                            if($task6->getCouponSecondaryFieldLabelFour()){
                                $secondary4->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelFour()));
                            }
                            $secondary4->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetFour());
                            $structure->addSecondaryField($secondary4);
                            break;
                        case "number":
                            $secondary4 = new NumberField($task6->getCouponSecondaryFieldValueTypeFour()."s41"," ");
                            if($task6->getCouponSecondaryFieldNumberValueFour()){
                                $secondary4->setValue($task6->getCouponSecondaryFieldNumberValueFour());
                                $secondary4->setNumberStyle($task6->getCouponSecondaryFieldNumberFormateFour());
                            }
                            if($task6->getCouponSecondaryFieldLabelFour()){
                                $secondary4->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelFour()));
                            }
                            $secondary4->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetFour());
                            $structure->addSecondaryField($secondary4);
                            break;
                        case "currency":
                            $secondary4 = new NumberField($task6->getCouponSecondaryFieldValueTypeFour()."s41"," ");
                            if($task6->getCouponSecondaryFieldCurrencyValueFour()){
                                $secondary4->setValue($task6->getCouponSecondaryFieldCurrencyValueFour());
                                $secondary4->setCurrencyCode($task6->getCouponSecondaryFieldCurrencyCodeFour());
                            }
                            if($task6->getCouponSecondaryFieldLabelFour()){
                                $secondary4->setLabel(strtoupper($task6->getCouponSecondaryFieldLabelFour()));
                            }
                            $secondary4->setTextAlignment($task6->getCouponSecondaryFieldAlignmnetFour());
                            $structure->addSecondaryField($secondary4);
                            break;
                    }
                }
                break;
        }

        // Add auxiliary field
        if($task1->getCategoryName()=="Generic" && $task3->getCouponBarcodeType()=="Aztec" ){

        }
        else if($task1->getCategoryName()=="Generic" && $task3->getCouponBarcodeType()=="QRCode" ){

        }
        else
        {
            switch($task7->getCouponAuxiliaryFieldTotalFields()){
                case 0:

                    break;
                case 1:
                    switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                        case "text":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                            if($task7->getCouponAuxiliaryFieldTextValueOne()){
                                $auxiliary1->setValue($task7->getCouponAuxiliaryFieldTextValueOne());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelOne()){
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            }
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "datentime":
                            $auxiliary1 = new DateField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                            if( $task7->getCouponAuxiliaryFieldValueDateOne()){
                                $auxiliary1->setValue($task7->getCouponAuxiliaryFieldValueDateOne());
                                $auxiliary1->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateOne());
                                $auxiliary1->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateOne());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelOne()){
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            }
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "number":
                            $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                            if($task7->getCouponAuxiliaryFieldNumberValueOne()){
                                $auxiliary1->setValue($task7->getCouponAuxiliaryFieldNumberValueOne());
                                $auxiliary1->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateOne());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelOne()){
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            }
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "currency":
                            $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                            if($task7->getCouponAuxiliaryFieldCurrencyValueOne()){
                                $auxiliary1->setValue($task7->getCouponAuxiliaryFieldCurrencyValueOne());
                                $auxiliary1->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeOne());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelOne()){
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            }
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                    }
                    break;
                case 2:
                    switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                        case "text":
                            $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                            if($task7->getCouponAuxiliaryFieldTextValueOne()){
                                $auxiliary1->setValue($task7->getCouponAuxiliaryFieldTextValueOne());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelOne()){
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            }
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "datentime":
                            $auxiliary1 = new DateField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                            if( $task7->getCouponAuxiliaryFieldValueDateOne()){
                                $auxiliary1->setValue($task7->getCouponAuxiliaryFieldValueDateOne());
                                $auxiliary1->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateOne());
                                $auxiliary1->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateOne());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelOne()){
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            }
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "number":
                            $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                            if($task7->getCouponAuxiliaryFieldNumberValueOne()){
                                $auxiliary1->setValue($task7->getCouponAuxiliaryFieldNumberValueOne());
                                $auxiliary1->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateOne());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelOne()){
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            }
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                        case "currency":
                            $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                            if($task7->getCouponAuxiliaryFieldCurrencyValueOne()){
                                $auxiliary1->setValue($task7->getCouponAuxiliaryFieldCurrencyValueOne());
                                $auxiliary1->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeOne());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelOne()){
                                $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                            }
                            $structure->addAuxiliaryField($auxiliary1);
                            break;
                    }
                    switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                        case "text":
                            $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                            if($task7->getCouponAuxiliaryFieldTextValueTwo()){
                                $auxiliary2->setValue($task7->getCouponAuxiliaryFieldTextValueTwo());
                            }

                            if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                            }
                            $structure->addAuxiliaryField($auxiliary2);
                            break;
                        case "datentime":
                            $auxiliary2 = new DateField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                            if( $task7->getCouponAuxiliaryFieldValueDateTwo()){
                                $auxiliary2->setValue($task7->getCouponAuxiliaryFieldValueDateTwo());
                                $auxiliary2->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateTwo());
                                $auxiliary2->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateTwo());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                            }
                            $structure->addAuxiliaryField($auxiliary2);
                            break;
                        case "number":
                            $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                            if($task7->getCouponAuxiliaryFieldNumberValueTwo()){
                                $auxiliary2->setValue($task7->getCouponAuxiliaryFieldNumberValueTwo());
                                $auxiliary2->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateTwo());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                            }
                            $structure->addAuxiliaryField($auxiliary2);
                            break;
                        case "currency":
                            $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                            if($task7->getCouponAuxiliaryFieldCurrencyValueTwo()){
                                $auxiliary2->setValue($task7->getCouponAuxiliaryFieldCurrencyValueTwo());
                                $auxiliary2->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeTwo());
                            }
                            if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                            }
                            $structure->addAuxiliaryField($auxiliary2);
                            break;
                    }
                    break;
                case 3:
                    if($task1->getCategoryName()=='Coupon'){
                        switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                            case "text":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldTextValueOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "datentime":
                                $auxiliary1 = new DateField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldValueDateOne());
                                    $auxiliary1->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateOne());
                                    $auxiliary1->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "number":
                                $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldNumberValueOne());
                                    $auxiliary1->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "currency":
                                $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldCurrencyValueOne());
                                    $auxiliary1->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                            case "text":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldTextValueTwo());
                                }

                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "datentime":
                                $auxiliary2 = new DateField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldValueDateTwo());
                                    $auxiliary2->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateTwo());
                                    $auxiliary2->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "number":
                                $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldNumberValueTwo());
                                    $auxiliary2->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "currency":
                                $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldCurrencyValueTwo());
                                    $auxiliary2->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                        }
                        break;
                    }
                    else{
                        switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                            case "text":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldTextValueOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "datentime":
                                $auxiliary1 = new DateField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldValueDateOne());
                                    $auxiliary1->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateOne());
                                    $auxiliary1->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "number":
                                $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldNumberValueOne());
                                    $auxiliary1->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "currency":
                                $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldCurrencyValueOne());
                                    $auxiliary1->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                            case "text":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldTextValueTwo());
                                }
                                ;
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "datentime":
                                $auxiliary2 = new DateField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldValueDateTwo());
                                    $auxiliary2->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateTwo());
                                    $auxiliary2->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "number":
                                $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldNumberValueTwo());
                                    $auxiliary2->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "currency":
                                $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldCurrencyValueTwo());
                                    $auxiliary2->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeThree()){
                            case "text":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueThree()){
                                    $auxiliary3->setValue($task7->getCouponAuxiliaryFieldTextValueThree());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelThree()){
                                    $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                }
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "datentime":
                                $auxiliary3 = new DateField($task7->getCouponAuxiliaryFieldValueTypeThree()."a31"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateThree()){
                                    $auxiliary3->setValue($task7->getCouponAuxiliaryFieldValueDateThree());
                                    $auxiliary3->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateThree());
                                    $auxiliary3->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateThree());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelThree()){
                                    $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                }
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "number":
                                $auxiliary3 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeThree()."a31"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueThree()){
                                    $auxiliary3->setValue($task7->getCouponAuxiliaryFieldNumberValueThree());
                                    $auxiliary3->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateThree());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelThree()){
                                    $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                }
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "currency":
                                $auxiliary3 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeThree()."a31"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueThree()){
                                    $auxiliary3->setValue($task7->getCouponAuxiliaryFieldCurrencyValueThree());
                                    $auxiliary3->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeThree());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelThree()){
                                    $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                }
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                        }
                        break;

                    }
                case 4:
                    if($task1->getCategoryName()=='Coupon'){
                        switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                            case "text":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldTextValueOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "datentime":
                                $auxiliary1 = new DateField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldValueDateOne());
                                    $auxiliary1->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateOne());
                                    $auxiliary1->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "number":
                                $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldNumberValueOne());
                                    $auxiliary1->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "currency":
                                $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldCurrencyValueOne());
                                    $auxiliary1->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                            case "text":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldTextValueTwo());
                                }

                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "datentime":
                                $auxiliary2 = new DateField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldValueDateTwo());
                                    $auxiliary2->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateTwo());
                                    $auxiliary2->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "number":
                                $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldNumberValueTwo());
                                    $auxiliary2->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "currency":
                                $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldCurrencyValueTwo());
                                    $auxiliary2->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                        }
                        break;
                    }
                    else{
                        switch($task7->getCouponAuxiliaryFieldValueTypeOne()){
                            case "text":
                                $auxiliary1 = new Field($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldTextValueOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "datentime":
                                $auxiliary1 = new DateField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldValueDateOne());
                                    $auxiliary1->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateOne());
                                    $auxiliary1->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "number":
                                $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldNumberValueOne());
                                    $auxiliary1->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                            case "currency":
                                $auxiliary1 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeOne()."a11"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueOne()){
                                    $auxiliary1->setValue($task7->getCouponAuxiliaryFieldCurrencyValueOne());
                                    $auxiliary1->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeOne());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelOne()){
                                    $auxiliary1->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelOne()));
                                }
                                $structure->addAuxiliaryField($auxiliary1);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeTwo()){
                            case "text":
                                $auxiliary2 = new Field($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldTextValueTwo());
                                }

                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "datentime":
                                $auxiliary2 = new DateField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldValueDateTwo());
                                    $auxiliary2->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateTwo());
                                    $auxiliary2->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "number":
                                $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldNumberValueTwo());
                                    $auxiliary2->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                            case "currency":
                                $auxiliary2 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeTwo()."a21"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueTwo()){
                                    $auxiliary2->setValue($task7->getCouponAuxiliaryFieldCurrencyValueTwo());
                                    $auxiliary2->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeTwo());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelTwo()){
                                    $auxiliary2->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelTwo()));
                                }
                                $structure->addAuxiliaryField($auxiliary2);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeThree()){
                            case "text":
                                $auxiliary3 = new Field($task7->getCouponAuxiliaryFieldValueTypeThree()."a31"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueThree()){
                                    $auxiliary3->setValue($task7->getCouponAuxiliaryFieldTextValueThree());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelThree()){
                                    $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                }
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "datentime":
                                $auxiliary3 = new DateField($task7->getCouponAuxiliaryFieldValueTypeThree()."a31"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateThree()){
                                    $auxiliary3->setValue($task7->getCouponAuxiliaryFieldValueDateThree());
                                    $auxiliary3->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateThree());
                                    $auxiliary3->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateThree());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelThree()){
                                    $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                }
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "number":
                                $auxiliary3 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeThree()."a31"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueThree()){
                                    $auxiliary3->setValue($task7->getCouponAuxiliaryFieldNumberValueThree());
                                    $auxiliary3->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateThree());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelThree()){
                                    $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                }
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                            case "currency":
                                $auxiliary3 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeThree()."a31"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueThree()){
                                    $auxiliary3->setValue($task7->getCouponAuxiliaryFieldCurrencyValueThree());
                                    $auxiliary3->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeThree());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelThree()){
                                    $auxiliary3->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelThree()));
                                }
                                $structure->addAuxiliaryField($auxiliary3);
                                break;
                        }
                        switch($task7->getCouponAuxiliaryFieldValueTypeFour()){
                            case "text":
                                $auxiliary4 = new Field($task7->getCouponAuxiliaryFieldValueTypeFour()."a41"," ");
                                if($task7->getCouponAuxiliaryFieldTextValueFour()){
                                    $auxiliary4->setValue($task7->getCouponAuxiliaryFieldTextValueFour());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelFour()){
                                    $auxiliary4->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelFour()));
                                }
                                $structure->addAuxiliaryField($auxiliary4);
                                break;
                            case "datentime":
                                $auxiliary4 = new DateField($task7->getCouponAuxiliaryFieldValueTypeFour()."a41"," ");
                                if( $task7->getCouponAuxiliaryFieldValueDateFour()){
                                    $auxiliary4->setValue($task7->getCouponAuxiliaryFieldValueDateFour());
                                    $auxiliary4->setDateStyle($task7->getCouponAuxiliaryFieldValueDateFormateFour());
                                    $auxiliary4->setTimeStyle($task7->getCouponAuxiliaryFieldValueTimeFormateFour());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelFour()){
                                    $auxiliary4->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelFour()));
                                }
                                $structure->addAuxiliaryField($auxiliary4);
                                break;
                            case "number":
                                $auxiliary4 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeFour()."a41"," ");
                                if($task7->getCouponAuxiliaryFieldNumberValueFour()){
                                    $auxiliary4->setValue($task7->getCouponAuxiliaryFieldNumberValueFour());
                                    $auxiliary4->setNumberStyle($task7->getCouponAuxiliaryFieldNumberFormateFour());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelFour()){
                                    $auxiliary4->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelFour()));
                                }
                                $structure->addAuxiliaryField($auxiliary4);
                                break;
                            case "currency":
                                $auxiliary4 = new NumberField($task7->getCouponAuxiliaryFieldValueTypeFour()."a41"," ");
                                if($task7->getCouponAuxiliaryFieldCurrencyValueFour()){
                                    $auxiliary4->setValue($task7->getCouponAuxiliaryFieldCurrencyValueFour());
                                    $auxiliary4->setCurrencyCode($task7->getCouponAuxiliaryFieldCurrencyCodeFour());
                                }
                                if($task7->getCouponAuxiliaryFieldLabelFour()){
                                    $auxiliary4->setLabel(strtoupper($task7->getCouponAuxiliaryFieldLabelFour()));
                                }
                                $structure->addAuxiliaryField($auxiliary4);
                                break;
                        }
                    }
                    break;
            }
        }
        // Add Back Fields

        switch ($task8->getCouponBackFieldTotalFields()) {
            case 0:

                break;
            case 1:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);
                break;
            case 2:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", " ");
                if( $task8->getCouponBackFieldTextValueTwo()){
                    $backfield2->setValue( $task8->getCouponBackFieldTextValueTwo());
                }
                if($task8->getCouponBackFieldLabelTwo()){
                    $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                }
                $structure->addBackField($backfield2);
                break;
            case 3:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", " ");
                if( $task8->getCouponBackFieldTextValueTwo()){
                    $backfield2->setValue( $task8->getCouponBackFieldTextValueTwo());
                }
                if($task8->getCouponBackFieldLabelTwo()){
                    $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                }
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", " ");
                if( $task8->getCouponBackFieldTextValueThree()){
                    $backfield3->setValue( $task8->getCouponBackFieldTextValueThree());
                }
                if($task8->getCouponBackFieldLabelThree()){
                    $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                }
                $structure->addBackField($backfield3);
                break;
            case 4:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", " ");
                if( $task8->getCouponBackFieldTextValueTwo()){
                    $backfield2->setValue( $task8->getCouponBackFieldTextValueTwo());
                }
                if($task8->getCouponBackFieldLabelTwo()){
                    $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                }
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", " ");
                if( $task8->getCouponBackFieldTextValueThree()){
                    $backfield3->setValue( $task8->getCouponBackFieldTextValueThree());
                }
                if($task8->getCouponBackFieldLabelThree()){
                    $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                }
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41"," ");
                if(  $task8->getCouponBackFieldTextValueFour()){
                    $backfield4->setValue(  $task8->getCouponBackFieldTextValueFour());
                }
                if($task8->getCouponBackFieldLabelFour()){
                    $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                }
                $structure->addBackField($backfield4);
                break;
            case 5:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", " ");
                if( $task8->getCouponBackFieldTextValueTwo()){
                    $backfield2->setValue( $task8->getCouponBackFieldTextValueTwo());
                }
                if($task8->getCouponBackFieldLabelTwo()){
                    $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                }
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", " ");
                if( $task8->getCouponBackFieldTextValueThree()){
                    $backfield3->setValue( $task8->getCouponBackFieldTextValueThree());
                }
                if($task8->getCouponBackFieldLabelThree()){
                    $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                }
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41"," ");
                if(  $task8->getCouponBackFieldTextValueFour()){
                    $backfield4->setValue(  $task8->getCouponBackFieldTextValueFour());
                }
                if($task8->getCouponBackFieldLabelFour()){
                    $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                }
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51"," ");
                if( $task8->getCouponBackFieldTextValueFive()){
                    $backfield5->setValue( $task8->getCouponBackFieldTextValueFive());
                }
                if($task8->getCouponBackFieldLabelFive()){
                    $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                }
                $structure->addBackField($backfield5);
                break;
            case 6:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", " ");
                if( $task8->getCouponBackFieldTextValueTwo()){
                    $backfield2->setValue( $task8->getCouponBackFieldTextValueTwo());
                }
                if($task8->getCouponBackFieldLabelTwo()){
                    $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                }
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", " ");
                if( $task8->getCouponBackFieldTextValueThree()){
                    $backfield3->setValue( $task8->getCouponBackFieldTextValueThree());
                }
                if($task8->getCouponBackFieldLabelThree()){
                    $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                }
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41"," ");
                if(  $task8->getCouponBackFieldTextValueFour()){
                    $backfield4->setValue(  $task8->getCouponBackFieldTextValueFour());
                }
                if($task8->getCouponBackFieldLabelFour()){
                    $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                }
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51"," ");
                if( $task8->getCouponBackFieldTextValueFive()){
                    $backfield5->setValue( $task8->getCouponBackFieldTextValueFive());
                }
                if($task8->getCouponBackFieldLabelFive()){
                    $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                }
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61"," ");
                if( $task8->getCouponBackFieldTextValueSix()){
                    $backfield6->setValue( $task8->getCouponBackFieldTextValueSix());
                }
                if($task8->getCouponBackFieldLabelSix()){
                    $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                }
                $structure->addBackField($backfield6);
                break;
            case 7:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", " ");
                if( $task8->getCouponBackFieldTextValueTwo()){
                    $backfield2->setValue( $task8->getCouponBackFieldTextValueTwo());
                }
                if($task8->getCouponBackFieldLabelTwo()){
                    $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                }
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", " ");
                if( $task8->getCouponBackFieldTextValueThree()){
                    $backfield3->setValue( $task8->getCouponBackFieldTextValueThree());
                }
                if($task8->getCouponBackFieldLabelThree()){
                    $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                }
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41"," ");
                if(  $task8->getCouponBackFieldTextValueFour()){
                    $backfield4->setValue(  $task8->getCouponBackFieldTextValueFour());
                }
                if($task8->getCouponBackFieldLabelFour()){
                    $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                }
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51"," ");
                if( $task8->getCouponBackFieldTextValueFive()){
                    $backfield5->setValue( $task8->getCouponBackFieldTextValueFive());
                }
                if($task8->getCouponBackFieldLabelFive()){
                    $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                }
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61"," ");
                if( $task8->getCouponBackFieldTextValueSix()){
                    $backfield6->setValue( $task8->getCouponBackFieldTextValueSix());
                }
                if($task8->getCouponBackFieldLabelSix()){
                    $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                }
                $structure->addBackField($backfield6);

                $backfield7 = new Field("Textb71"," ");
                if( $task8->getCouponBackFieldTextValueSeven()){
                    $backfield7->setValue( $task8->getCouponBackFieldTextValueSeven());
                }
                if($task8->getCouponBackFieldLabelSeven()){
                    $backfield7->setLabel($task8->getCouponBackFieldLabelSeven());
                }
                $structure->addBackField($backfield7);

                break;
            case 8:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", " ");
                if( $task8->getCouponBackFieldTextValueTwo()){
                    $backfield2->setValue( $task8->getCouponBackFieldTextValueTwo());
                }
                if($task8->getCouponBackFieldLabelTwo()){
                    $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                }
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", " ");
                if( $task8->getCouponBackFieldTextValueThree()){
                    $backfield3->setValue( $task8->getCouponBackFieldTextValueThree());
                }
                if($task8->getCouponBackFieldLabelThree()){
                    $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                }
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41"," ");
                if(  $task8->getCouponBackFieldTextValueFour()){
                    $backfield4->setValue(  $task8->getCouponBackFieldTextValueFour());
                }
                if($task8->getCouponBackFieldLabelFour()){
                    $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                }
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51"," ");
                if( $task8->getCouponBackFieldTextValueFive()){
                    $backfield5->setValue( $task8->getCouponBackFieldTextValueFive());
                }
                if($task8->getCouponBackFieldLabelFive()){
                    $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                }
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61"," ");
                if( $task8->getCouponBackFieldTextValueSix()){
                    $backfield6->setValue( $task8->getCouponBackFieldTextValueSix());
                }
                if($task8->getCouponBackFieldLabelSix()){
                    $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                }
                $structure->addBackField($backfield6);

                $backfield7 = new Field("Textb71"," ");
                if( $task8->getCouponBackFieldTextValueSeven()){
                    $backfield7->setValue( $task8->getCouponBackFieldTextValueSeven());
                }
                if($task8->getCouponBackFieldLabelSeven()){
                    $backfield7->setLabel($task8->getCouponBackFieldLabelSeven());
                }
                $structure->addBackField($backfield7);

                $backfield8 = new Field("Textb81"," ");
                if( $task8->getCouponBackFieldTextValueEight()){
                    $backfield8->setValue( $task8->getCouponBackFieldTextValueEight());
                }
                if($task8->getCouponBackFieldLabelEight()){
                    $backfield8->setLabel($task8->getCouponBackFieldLabelEight());
                }
                $structure->addBackField($backfield8);

                break;
            case 9:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", " ");
                if( $task8->getCouponBackFieldTextValueTwo()){
                    $backfield2->setValue( $task8->getCouponBackFieldTextValueTwo());
                }
                if($task8->getCouponBackFieldLabelTwo()){
                    $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                }
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", " ");
                if( $task8->getCouponBackFieldTextValueThree()){
                    $backfield3->setValue( $task8->getCouponBackFieldTextValueThree());
                }
                if($task8->getCouponBackFieldLabelThree()){
                    $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                }
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41"," ");
                if(  $task8->getCouponBackFieldTextValueFour()){
                    $backfield4->setValue(  $task8->getCouponBackFieldTextValueFour());
                }
                if($task8->getCouponBackFieldLabelFour()){
                    $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                }
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51"," ");
                if( $task8->getCouponBackFieldTextValueFive()){
                    $backfield5->setValue( $task8->getCouponBackFieldTextValueFive());
                }
                if($task8->getCouponBackFieldLabelFive()){
                    $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                }
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61"," ");
                if( $task8->getCouponBackFieldTextValueSix()){
                    $backfield6->setValue( $task8->getCouponBackFieldTextValueSix());
                }
                if($task8->getCouponBackFieldLabelSix()){
                    $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                }
                $structure->addBackField($backfield6);

                $backfield7 = new Field("Textb71"," ");
                if( $task8->getCouponBackFieldTextValueSeven()){
                    $backfield7->setValue( $task8->getCouponBackFieldTextValueSeven());
                }
                if($task8->getCouponBackFieldLabelSeven()){
                    $backfield7->setLabel($task8->getCouponBackFieldLabelSeven());
                }
                $structure->addBackField($backfield7);

                $backfield8 = new Field("Textb81"," ");
                if( $task8->getCouponBackFieldTextValueEight()){
                    $backfield8->setValue( $task8->getCouponBackFieldTextValueEight());
                }
                if($task8->getCouponBackFieldLabelEight()){
                    $backfield8->setLabel($task8->getCouponBackFieldLabelEight());
                }
                $structure->addBackField($backfield8);

                $backfield9 = new Field("Textb91", " ");
                if($task8->getCouponBackFieldTextValueNine()){
                    $backfield9->setValue($task8->getCouponBackFieldTextValueNine());
                }
                if($task8->getCouponBackFieldLabelNine()){
                    $backfield9->setLabel($task8->getCouponBackFieldLabelNine());
                }
                $structure->addBackField($backfield9);

                break;
            case 10:
                $backfield1 = new Field("Textb11", " ");
                if( $task8->getCouponBackFieldTextValueOne()){
                    $backfield1->setValue( $task8->getCouponBackFieldTextValueOne());
                }
                if($task8->getCouponBackFieldLabelOne()){
                    $backfield1->setLabel($task8->getCouponBackFieldLabelOne());
                }
                $structure->addBackField($backfield1);

                $backfield2 = new Field("Textb21", " ");
                if( $task8->getCouponBackFieldTextValueTwo()){
                    $backfield2->setValue( $task8->getCouponBackFieldTextValueTwo());
                }
                if($task8->getCouponBackFieldLabelTwo()){
                    $backfield2->setLabel($task8->getCouponBackFieldLabelTwo());
                }
                $structure->addBackField($backfield2);

                $backfield3 = new Field("Textb31", " ");
                if( $task8->getCouponBackFieldTextValueThree()){
                    $backfield3->setValue( $task8->getCouponBackFieldTextValueThree());
                }
                if($task8->getCouponBackFieldLabelThree()){
                    $backfield3->setLabel($task8->getCouponBackFieldLabelThree());
                }
                $structure->addBackField($backfield3);

                $backfield4 = new Field("Textb41"," ");
                if(  $task8->getCouponBackFieldTextValueFour()){
                    $backfield4->setValue(  $task8->getCouponBackFieldTextValueFour());
                }
                if($task8->getCouponBackFieldLabelFour()){
                    $backfield4->setLabel($task8->getCouponBackFieldLabelFour());
                }
                $structure->addBackField($backfield4);

                $backfield5 = new Field("Textb51"," ");
                if( $task8->getCouponBackFieldTextValueFive()){
                    $backfield5->setValue( $task8->getCouponBackFieldTextValueFive());
                }
                if($task8->getCouponBackFieldLabelFive()){
                    $backfield5->setLabel($task8->getCouponBackFieldLabelFive());
                }
                $structure->addBackField($backfield5);

                $backfield6 = new Field("Textb61"," ");
                if( $task8->getCouponBackFieldTextValueSix()){
                    $backfield6->setValue( $task8->getCouponBackFieldTextValueSix());
                }
                if($task8->getCouponBackFieldLabelSix()){
                    $backfield6->setLabel($task8->getCouponBackFieldLabelSix());
                }
                $structure->addBackField($backfield6);

                $backfield7 = new Field("Textb71"," ");
                if( $task8->getCouponBackFieldTextValueSeven()){
                    $backfield7->setValue( $task8->getCouponBackFieldTextValueSeven());
                }
                if($task8->getCouponBackFieldLabelSeven()){
                    $backfield7->setLabel($task8->getCouponBackFieldLabelSeven());
                }
                $structure->addBackField($backfield7);

                $backfield8 = new Field("Textb81"," ");
                if( $task8->getCouponBackFieldTextValueEight()){
                    $backfield8->setValue( $task8->getCouponBackFieldTextValueEight());
                }
                if($task8->getCouponBackFieldLabelEight()){
                    $backfield8->setLabel($task8->getCouponBackFieldLabelEight());
                }
                $structure->addBackField($backfield8);

                $backfield9 = new Field("Textb91", " ");
                if($task8->getCouponBackFieldTextValueNine()){
                    $backfield9->setValue($task8->getCouponBackFieldTextValueNine());
                }
                if($task8->getCouponBackFieldLabelNine()){
                    $backfield9->setLabel($task8->getCouponBackFieldLabelNine());
                }
                $structure->addBackField($backfield9);

                $backfield10 = new Field("Textb10"," ");
                if($task8->getCouponBackFieldTextValueTen()){
                    $backfield10->setValue($task8->getCouponBackFieldTextValueTen());
                }
                if($task8->getCouponBackFieldLabelTen()){
                    $backfield10->setLabel($task8->getCouponBackFieldLabelTen());
                }
                $structure->addBackField($backfield10);
                break;
        }
        $backfielddefault = new Field("Textb12", " ");
        $backfielddefault->setValue("This pass has been created and issued by a Company user from ".$task1->getOrganizationName()." with the following e-mail : ".$task1->getUserEmail()." (the 'Pass Issuer') "."
			
			Put your email text here

		");
        $backfielddefault->setLabel("About this Pass:");
        $structure->addBackField($backfielddefault);
        // Add Location

        switch ($task9->getCouponRelevanceLocationTotalFields()) {
            case 0:

                break;
            case 1:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = floatval($task9->getCouponRelevanceLocationAddressOneLatitude());
                    $lng = floatval($task9->getCouponRelevanceLocationAddressOneLongitude());
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                    //echo $lat." ".$lng;
                }
                break;
            case 2:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = floatval($task9->getCouponRelevanceLocationAddressOneLatitude());
                    $lng = floatval($task9->getCouponRelevanceLocationAddressOneLongitude());
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = floatval($task9->getCouponRelevanceLocationAddressTwoLatitude());
                    $lng = floatval($task9->getCouponRelevanceLocationAddressTwoLongitude());
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }

                break;
            case 3:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = floatval($task9->getCouponRelevanceLocationAddressOneLatitude());
                    $lng = floatval($task9->getCouponRelevanceLocationAddressOneLongitude());
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                break;
            case 4:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                break;
            case 5:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                break;
            case 6:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                break;
            case 7:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                if($task9->getCouponRelevanceLocationAddressSeven()){
                    $lat = $task9->getCouponRelevanceLocationAddressSevenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSevenLongitude();
                    $relevance7 = new Location($lat,$lng);
                    $relevance7->setRelevantText($task9->getCouponRelevanceLocationTextSeven());
                    $pass->addLocation($relevance7);
                }
                break;
            case 8:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                if($task9->getCouponRelevanceLocationAddressSeven()){
                    $lat = $task9->getCouponRelevanceLocationAddressSevenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSevenLongitude();
                    $relevance7 = new Location($lat,$lng);
                    $relevance7->setRelevantText($task9->getCouponRelevanceLocationTextSeven());
                    $pass->addLocation($relevance7);
                }
                if($task9->getCouponRelevanceLocationAddressEight()){
                    $lat = $task9->getCouponRelevanceLocationAddressEightLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressEightLongitude();
                    $relevance8 = new Location($lat,$lng);
                    $relevance8->setRelevantText($task9->getCouponRelevanceLocationTextEight());
                    $pass->addLocation($relevance8);
                }
                break;
            case 9:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                if($task9->getCouponRelevanceLocationAddressSeven()){
                    $lat = $task9->getCouponRelevanceLocationAddressSevenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSevenLongitude();
                    $relevance7 = new Location($lat,$lng);
                    $relevance7->setRelevantText($task9->getCouponRelevanceLocationTextSeven());
                    $pass->addLocation($relevance7);
                }
                if($task9->getCouponRelevanceLocationAddressEight()){
                    $lat = $task9->getCouponRelevanceLocationAddressEightLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressEightLongitude();
                    $relevance8 = new Location($lat,$lng);
                    $relevance8->setRelevantText($task9->getCouponRelevanceLocationTextEight());
                    $pass->addLocation($relevance8);
                }
                if($task9->getCouponRelevanceLocationAddressNine()){
                    $lat = $task9->getCouponRelevanceLocationAddressNineLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressNineLongitude();
                    $relevance9 = new Location($lat,$lng);
                    $relevance9->setRelevantText($task9->getCouponRelevanceLocationTextNine());
                    $pass->addLocation($relevance9);
                }
                break;
            case 10:
                if($task9->getCouponRelevanceLocationAddressOne()){
                    $lat = $task9->getCouponRelevanceLocationAddressOneLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressOneLongitude();
                    $relevance1 = new Location($lat,$lng);
                    $relevance1->setRelevantText($task9->getCouponRelevanceLocationTextOne());
                    $pass->addLocation($relevance1);
                }
                if($task9->getCouponRelevanceLocationAddressTwo()){
                    $lat = $task9->getCouponRelevanceLocationAddressTwoLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTwoLongitude();
                    $relevance2 = new Location($lat,$lng);
                    $relevance2->setRelevantText($task9->getCouponRelevanceLocationTextTwo());
                    $pass->addLocation($relevance2);
                }
                if($task9->getCouponRelevanceLocationAddressThree()){
                    $lat = $task9->getCouponRelevanceLocationAddressThreeLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressThreeLongitude();
                    $relevance3 = new Location($lat,$lng);
                    $relevance3->setRelevantText($task9->getCouponRelevanceLocationTextThree());
                    $pass->addLocation($relevance3);
                }
                if($task9->getCouponRelevanceLocationAddressFour()){
                    $lat = $task9->getCouponRelevanceLocationAddressFourLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFourLongitude();
                    $relevance4 = new Location($lat,$lng);
                    $relevance4->setRelevantText($task9->getCouponRelevanceLocationTextFour());
                    $pass->addLocation($relevance4);
                }
                if($task9->getCouponRelevanceLocationAddressFive()){
                    $lat = $task9->getCouponRelevanceLocationAddressFiveLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressFiveLongitude();
                    $relevance5 = new Location($lat,$lng);
                    $relevance5->setRelevantText($task9->getCouponRelevanceLocationTextFive());
                    $pass->addLocation($relevance5);
                }
                if($task9->getCouponRelevanceLocationAddressSix()){
                    $lat = $task9->getCouponRelevanceLocationAddressSixLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSixLongitude();
                    $relevance6 = new Location($lat,$lng);
                    $relevance6->setRelevantText($task9->getCouponRelevanceLocationTextSix());
                    $pass->addLocation($relevance6);
                }
                if($task9->getCouponRelevanceLocationAddressSeven()){
                    $lat = $task9->getCouponRelevanceLocationAddressSevenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressSevenLongitude();
                    $relevance7 = new Location($lat,$lng);
                    $relevance7->setRelevantText($task9->getCouponRelevanceLocationTextSeven());
                    $pass->addLocation($relevance7);
                }
                if($task9->getCouponRelevanceLocationAddressEight()){
                    $lat = $task9->getCouponRelevanceLocationAddressEightLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressEightLongitude();
                    $relevance8 = new Location($lat,$lng);
                    $relevance8->setRelevantText($task9->getCouponRelevanceLocationTextEight());
                    $pass->addLocation($relevance8);
                }
                if($task9->getCouponRelevanceLocationAddressNine()){
                    $lat = $task9->getCouponRelevanceLocationAddressNineLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressNineLongitude();
                    $relevance9 = new Location($lat,$lng);
                    $relevance9->setRelevantText($task9->getCouponRelevanceLocationTextNine());
                    $pass->addLocation($relevance9);
                }
                if($task9->getCouponRelevanceLocationAddressTen()){
                    $lat = $task9->getCouponRelevanceLocationAddressTenLatitude();
                    $lng = $task9->getCouponRelevanceLocationAddressTenLongitude();
                    $relevance10 = new Location($lat,$lng);
                    $relevance10->setRelevantText($task9->getCouponRelevanceLocationTextTen());
                    $pass->addLocation($relevance10);
                }
                break;
        }
        $pass->setRelevantDate($task9->getCouponRelevanceLocationDate());
        // Set pass structure
        $pass->setStructure($structure);

        // Add barcode
        switch($barcodestatus){
            case "hide":
                break;

            case "show":
                $barcode = new Barcode($task3->getCouponBarcodeType(),$task3->getCouponAutoGenerateValue(),'iso-8859-1');
                if($task3->getBarcodeAlternateText()=='same'){
                    $barcode->setAltText($task3->getCouponAutoGenerateValue());
                }
                else{
                    //if($task3->getBarcodeAlternateTextValue()){
                    $barcode->setAltText($task3->getBarcodeAlternateTextValue());
                    //}
                }
                    $pass->setBarcode($barcode);
                break;
        }

        //$helper = $this->get('passbook.passhelper');

        // Create pass factory instance
        $factory = new PassFactory('name', 'key', $task1->getOrganizationName(), $root.'/Resources/certificates/certificate_name.p12', '', $root.'/Resources/certificates/apple_certificate.pem');
        $factory->setOutputPath($root.'/logs/pkpass');
        //$factory->setOutputPath($helper->absolutePath($helper->pkPassDir));
        $factory->package($pass);
        return $id;

    }

    public function replicateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $passid = sha1(uniqid(mt_rand(),true));
        $generalid = md5(uniqid(mt_rand(),true));


        $task11 = $em->getRepository('KamranPassbookBundle:mgeneral')->findOneBy(array('couponId' => $id));
        $task22 = $em->getRepository('KamranPassbookBundle:mappearance')->findOneBy(array('couponId' => $id));
        $task33 = $em->getRepository('KamranPassbookBundle:mdatasetting')->findOneBy(array('couponId' => $id));
        $task44 = $em->getRepository('KamranPassbookBundle:mheader')->findOneBy(array('couponId' => $id));
        $task55 = $em->getRepository('KamranPassbookBundle:mprimary')->findOneBy(array('couponId' => $id));
        $task66 = $em->getRepository('KamranPassbookBundle:msecondary')->findOneBy(array('couponId' => $id));
        $task77 = $em->getRepository('KamranPassbookBundle:mauxiliary')->findOneBy(array('couponId' => $id));
        $task88 = $em->getRepository('KamranPassbookBundle:mbackfields')->findOneBy(array('couponId' => $id));
        $task99 = $em->getRepository('KamranPassbookBundle:mrelevance')->findOneBy(array('couponId' => $id));
        $task110 = $em->getRepository('KamranPassbookBundle:mdistribution')->findOneBy(array('couponId' => $id));

        $iconid = $task22->getId();
        $task1 = new mgeneral();
        $task2 = new mappearance();
        $task3 = new mdatasetting();
        $task4 = new mheader();
        $task5 = new mprimary();
        $task6 = new msecondary();
        $task7 = new mauxiliary();
        $task8 = new mbackfields();
        $task9 = new mrelevance();
        $task10 = new mdistribution();

        $task1->setTemplateName($task11->getTemplateName()."-copy");
        $task1->setCouponId($generalid);
        $task1->setPassKey($passid);
        $task1->setCategoryName($task11->getCategoryName());
        $task1->setPlaces($task11->getPlaces());
        $task1->setBoardingPassTransit($task11->getBoardingPassTransit());
        $task1->setOrganizationName($task11->getOrganizationName());
        $task1->setOrganizationDescription($task11->getOrganizationDescription());
        $task1->setClientId($task11->getClientId());
        $task1->setUserId($task11->getUserId());
        $em->persist($task1);

        $task2->setCouponId($generalid);
        $task2->setIconName($task22->getIconName());
        $task2->setLogoName($task22->getLogoName());
        $task2->setLogoText($task22->getLogoText());
        $task2->setGenericThumbnail($task22->getGenericThumbnail());
        $task2->setBoardingPassFooter($task22->getBoardingPassFooter());
        $task2->setCouponStrip($task22->getCouponStrip());
        $task2->setStoreCardStrip($task22->getStoreCardStrip());
        $task2->setEventTicketStatus($task22->getEventTicketStatus());
        $task2->setEventTicketStrip($task22->getEventTicketStrip());
        $task2->setEventTicketThumbnail($task22->getEventTicketThumbnail());
        $task2->setEventTicketBackground($task22->getEventTicketBackground());
        $task2->setBackgroundColorCode($task22->getBackgroundColorCode());
        $task2->setFieldLabelColorCode($task22->getFieldLabelColorCode());
        $task2->setFieldValueColorCode($task22->getFieldValueColorCode());
        $em->persist($task2);

        $task3->setCouponId($generalid);
        $task3->setCouponBarcodeStatus($task33->getCouponBarcodeStatus());
        $task3->setCouponBarcodeType($task33->getCouponBarcodeType());
        $task3->setCouponBarcodeValueOption($task33->getCouponBarcodeValueOption());
        $task3->setCouponBarcodeFixedValue($task33->getCouponBarcodeFixedValue());
        $task3->setCouponBarcodeValueSource($task33->getCouponBarcodeValueSource());
        $task3->setCouponAutoGenerateValueType($task33->getCouponAutoGenerateValueType());
        $task3->setCouponAutoGenerateValueLength($task33->getCouponAutoGenerateValueLength());
        $task3->setCouponAutoGenerateValue($task33->getCouponAutoGenerateValue());
        $task3->setCouponBarcodeDynamicValue($task33->getCouponBarcodeDynamicValue());
        $task3->setCouponBarcodeEncoding($task33->getCouponBarcodeEncoding());
        $task3->setBarcodeAlternateText($task33->getBarcodeAlternateText());
        $task3->setBarcodeAlternateFixedText($task33->getBarcodeAlternateFixedText());
        $task3->setBarcodeAlternateDynamicText($task33->getBarcodeAlternateDynamicText());
        $em->persist($task3);

        $task4->setCouponId($generalid);
        $task4->setCouponHeaderLabel($task44->getCouponHeaderLabel());
        $task4->setCouponHeaderLabelDynamicStatus($task44->getCouponHeaderLabelDynamicStatus());
        $task4->setCouponHeaderValueType($task44->getCouponHeaderValueType());
        $task4->setCouponHeaderTextValue($task44->getCouponHeaderTextValue());
        $task4->setCouponHeaderTextDynamicStatus($task44->getCouponHeaderTextDynamicStatus());
        $task4->setCouponHeaderValueDate($task44->getCouponHeaderValueDate());
        $task4->setCouponHeaderValueTime($task44->getCouponHeaderValueTime());
        $task4->setCouponHeaderValueTimezone($task44->getCouponHeaderValueTimezone());
        $task4->setCouponHeaderValueDateFormate($task44->getCouponHeaderValueDateFormate());
        $task4->setCouponHeaderValueTimeFormate($task44->getCouponHeaderValueTimeFormate());
        $task4->setCouponHeaderNumberValue($task44->getCouponHeaderNumberValue());
        $task4->setCouponHeaderNumberFormate($task44->getCouponHeaderNumberFormate());
        $task4->setCouponHeaderCurrencyValue($task44->getCouponHeaderCurrencyValue());
        $task4->setCouponHeaderCurrencyCode($task44->getCouponHeaderCurrencyCode());
        $task4->setCouponHeaderAlignmnet($task44->getCouponHeaderAlignmnet());
        $em->persist($task4);

        $task5->setCouponId($generalid);
        $task5->setCouponPrimaryFieldLabel($task55->getCouponPrimaryFieldLabel());
        $task5->setCouponPrimaryFieldLabelDynamicStatus($task55->getCouponPrimaryFieldLabelDynamicStatus());
        $task5->setCouponPrimaryFieldValueType($task55->getCouponPrimaryFieldValueType());
        $task5->setCouponPrimaryFieldTextValue($task55->getCouponPrimaryFieldTextValue());
        $task5->setCouponPrimaryFieldTextDynamicStatus($task55->getCouponPrimaryFieldTextDynamicStatus());
        $task5->setCouponPrimaryFieldValueDate($task55->getCouponPrimaryFieldValueDate());
        $task5->setCouponPrimaryFieldValueTime($task55->getCouponPrimaryFieldValueTime());
        $task5->setCouponPrimaryFieldValueTimezone($task55->getCouponPrimaryFieldValueTimezone());
        $task5->setCouponPrimaryFieldValueDateFormate($task55->getCouponPrimaryFieldValueDateFormate());
        $task5->setCouponPrimaryFieldValueTimeFormate($task55->getCouponPrimaryFieldValueTimeFormate());
        $task5->setCouponPrimaryFieldNumberValue($task55->getCouponPrimaryFieldNumberValue());
        $task5->setCouponPrimaryFieldNumberFormate($task55->getCouponPrimaryFieldNumberFormate());
        $task5->setCouponPrimaryFieldCurrencyValue($task55->getCouponPrimaryFieldCurrencyValue());
        $task5->setCouponPrimaryFieldCurrencyCode($task55->getCouponPrimaryFieldCurrencyCode());
        $em->persist($task5);

        $task6->setCouponId($generalid);
        $task6->setCouponSecondaryFieldTotalFields($task66->getCouponSecondaryFieldTotalFields());

        $task6->setCouponSecondaryFieldLabelOne($task66->getCouponSecondaryFieldLabelOne());
        $task6->setCouponSecondaryFieldLabelDynamicStatusOne($task66->getCouponSecondaryFieldLabelDynamicStatusOne());
        $task6->setCouponSecondaryFieldValueTypeOne($task66->getCouponSecondaryFieldValueTypeOne());
        $task6->setCouponSecondaryFieldTextValueOne($task66->getCouponSecondaryFieldTextValueOne());
        $task6->setCouponSecondaryFieldTextDynamicStatusOne($task66->getCouponSecondaryFieldTextDynamicStatusOne());
        $task6->setCouponSecondaryFieldValueDateOne($task66->getCouponSecondaryFieldValueDateOne());
        $task6->setCouponSecondaryFieldValueTimeOne($task66->getCouponSecondaryFieldValueTimeOne());
        $task6->setCouponSecondaryFieldValueTimezoneOne($task66->getCouponSecondaryFieldValueTimezoneOne());
        $task6->setCouponSecondaryFieldValueDateFormateOne($task66->getCouponSecondaryFieldValueDateFormateOne());
        $task6->setCouponSecondaryFieldValueTimeFormateOne($task66->getCouponSecondaryFieldValueTimeFormateOne());
        $task6->setCouponSecondaryFieldNumberValueOne($task66->getCouponSecondaryFieldNumberValueOne());
        $task6->setCouponSecondaryFieldNumberFormateOne($task66->getCouponSecondaryFieldNumberFormateOne());
        $task6->setCouponSecondaryFieldCurrencyValueOne($task66->getCouponSecondaryFieldCurrencyValueOne());
        $task6->setCouponSecondaryFieldCurrencyCodeOne($task66->getCouponSecondaryFieldCurrencyCodeOne());
        $task6->setCouponSecondaryFieldAlignmnetOne($task66->getCouponSecondaryFieldAlignmnetOne());

        $task6->setCouponSecondaryFieldLabelTwo($task66->getCouponSecondaryFieldLabelTwo());
        $task6->setCouponSecondaryFieldLabelDynamicStatusTwo($task66->getCouponSecondaryFieldLabelDynamicStatusTwo());
        $task6->setCouponSecondaryFieldValueTypeTwo($task66->getCouponSecondaryFieldValueTypeTwo());
        $task6->setCouponSecondaryFieldTextValueTwo($task66->getCouponSecondaryFieldTextValueTwo());
        $task6->setCouponSecondaryFieldTextDynamicStatusTwo($task66->getCouponSecondaryFieldTextDynamicStatusTwo());
        $task6->setCouponSecondaryFieldValueDateTwo($task66->getCouponSecondaryFieldValueDateTwo());
        $task6->setCouponSecondaryFieldValueTimeTwo($task66->getCouponSecondaryFieldValueTimeTwo());
        $task6->setCouponSecondaryFieldValueTimezoneTwo($task66->getCouponSecondaryFieldValueTimezoneTwo());
        $task6->setCouponSecondaryFieldValueDateFormateTwo($task66->getCouponSecondaryFieldValueDateFormateTwo());
        $task6->setCouponSecondaryFieldValueTimeFormateTwo($task66->getCouponSecondaryFieldValueTimeFormateTwo());
        $task6->setCouponSecondaryFieldNumberValueTwo($task66->getCouponSecondaryFieldNumberValueTwo());
        $task6->setCouponSecondaryFieldNumberFormateTwo($task66->getCouponSecondaryFieldNumberFormateTwo());
        $task6->setCouponSecondaryFieldCurrencyValueTwo($task66->getCouponSecondaryFieldCurrencyValueTwo());
        $task6->setCouponSecondaryFieldCurrencyCodeTwo($task66->getCouponSecondaryFieldCurrencyCodeTwo());
        $task6->setCouponSecondaryFieldAlignmnetTwo($task66->getCouponSecondaryFieldAlignmnetTwo());

        $task6->setCouponSecondaryFieldLabelThree($task66->getCouponSecondaryFieldLabelThree());
        $task6->setCouponSecondaryFieldLabelDynamicStatusThree($task66->getCouponSecondaryFieldLabelDynamicStatusThree());
        $task6->setCouponSecondaryFieldValueTypeThree($task66->getCouponSecondaryFieldValueTypeThree());
        $task6->setCouponSecondaryFieldTextValueThree($task66->getCouponSecondaryFieldTextValueThree());
        $task6->setCouponSecondaryFieldTextDynamicStatusThree($task66->getCouponSecondaryFieldTextDynamicStatusThree());
        $task6->setCouponSecondaryFieldValueDateThree($task66->getCouponSecondaryFieldValueDateThree());
        $task6->setCouponSecondaryFieldValueTimeThree($task66->getCouponSecondaryFieldValueTimeThree());
        $task6->setCouponSecondaryFieldValueTimezoneThree($task66->getCouponSecondaryFieldValueTimezoneThree());
        $task6->setCouponSecondaryFieldValueDateFormateThree($task66->getCouponSecondaryFieldValueDateFormateThree());
        $task6->setCouponSecondaryFieldValueTimeFormateThree($task66->getCouponSecondaryFieldValueTimeFormateThree());
        $task6->setCouponSecondaryFieldNumberValueThree($task66->getCouponSecondaryFieldNumberValueThree());
        $task6->setCouponSecondaryFieldNumberFormateThree($task66->getCouponSecondaryFieldNumberFormateThree());
        $task6->setCouponSecondaryFieldCurrencyValueThree($task66->getCouponSecondaryFieldCurrencyValueThree());
        $task6->setCouponSecondaryFieldCurrencyCodeThree($task66->getCouponSecondaryFieldCurrencyCodeThree());
        $task6->setCouponSecondaryFieldAlignmnetThree($task66->getCouponSecondaryFieldAlignmnetThree());

        $task6->setCouponSecondaryFieldLabelFour($task66->getCouponSecondaryFieldLabelFour());
        $task6->setCouponSecondaryFieldLabelDynamicStatusFour($task66->getCouponSecondaryFieldLabelDynamicStatusFour());
        $task6->setCouponSecondaryFieldValueTypeFour($task66->getCouponSecondaryFieldValueTypeFour());
        $task6->setCouponSecondaryFieldTextValueFour($task66->getCouponSecondaryFieldTextValueFour());
        $task6->setCouponSecondaryFieldTextDynamicStatusFour($task66->getCouponSecondaryFieldTextDynamicStatusFour());
        $task6->setCouponSecondaryFieldValueDateFour($task66->getCouponSecondaryFieldValueDateFour());
        $task6->setCouponSecondaryFieldValueTimeFour($task66->getCouponSecondaryFieldValueTimeFour());
        $task6->setCouponSecondaryFieldValueTimezoneFour($task66->getCouponSecondaryFieldValueTimezoneFour());
        $task6->setCouponSecondaryFieldValueDateFormateFour($task66->getCouponSecondaryFieldValueDateFormateFour());
        $task6->setCouponSecondaryFieldValueTimeFormateFour($task66->getCouponSecondaryFieldValueTimeFormateFour());
        $task6->setCouponSecondaryFieldNumberValueFour($task66->getCouponSecondaryFieldNumberValueFour());
        $task6->setCouponSecondaryFieldNumberFormateFour($task66->getCouponSecondaryFieldNumberFormateFour());
        $task6->setCouponSecondaryFieldCurrencyValueFour($task66->getCouponSecondaryFieldCurrencyValueFour());
        $task6->setCouponSecondaryFieldCurrencyCodeFour($task66->getCouponSecondaryFieldCurrencyCodeFour());
        $task6->setCouponSecondaryFieldAlignmnetFour($task66->getCouponSecondaryFieldAlignmnetFour());

        $em->persist($task6);
        $task7->setCouponId($generalid);

        $task7->setCouponAuxiliaryFieldTotalFields($task77->getCouponAuxiliaryFieldTotalFields());

        $task7->setCouponAuxiliaryFieldLabelOne($task77->getCouponAuxiliaryFieldLabelOne());
        $task7->setCouponAuxiliaryFieldLabelDynamicStatusOne($task77->getCouponAuxiliaryFieldLabelDynamicStatusOne());
        $task7->setCouponAuxiliaryFieldValueTypeOne($task77->getCouponAuxiliaryFieldValueTypeOne());
        $task7->setCouponAuxiliaryFieldTextValueOne($task77->getCouponAuxiliaryFieldTextValueOne());
        $task7->setCouponAuxiliaryFieldTextDynamicStatusOne($task77->getCouponAuxiliaryFieldTextDynamicStatusOne());
        $task7->setCouponAuxiliaryFieldValueDateOne($task77->getCouponAuxiliaryFieldValueDateOne());
        $task7->setCouponAuxiliaryFieldValueTimeOne($task77->getCouponAuxiliaryFieldValueTimeOne());
        $task7->setCouponAuxiliaryFieldValueTimezoneOne($task77->getCouponAuxiliaryFieldValueTimezoneOne());
        $task7->setCouponAuxiliaryFieldValueDateFormateOne($task77->getCouponAuxiliaryFieldValueDateFormateOne());
        $task7->setCouponAuxiliaryFieldValueTimeFormateOne($task77->getCouponAuxiliaryFieldValueTimeFormateOne());
        $task7->setCouponAuxiliaryFieldNumberValueOne($task77->getCouponAuxiliaryFieldNumberValueOne());
        $task7->setCouponAuxiliaryFieldNumberFormateOne($task77->getCouponAuxiliaryFieldNumberFormateOne());
        $task7->setCouponAuxiliaryFieldCurrencyValueOne($task77->getCouponAuxiliaryFieldCurrencyValueOne());
        $task7->setCouponAuxiliaryFieldCurrencyCodeOne($task77->getCouponAuxiliaryFieldCurrencyCodeOne());
        $task7->setCouponAuxiliaryFieldAlignmnetOne($task77->getCouponAuxiliaryFieldAlignmnetOne());

        $task7->setCouponAuxiliaryFieldLabelTwo($task77->getCouponAuxiliaryFieldLabelTwo());
        $task7->setCouponAuxiliaryFieldLabelDynamicStatusTwo($task77->getCouponAuxiliaryFieldLabelDynamicStatusTwo());
        $task7->setCouponAuxiliaryFieldValueTypeTwo($task77->getCouponAuxiliaryFieldValueTypeTwo());
        $task7->setCouponAuxiliaryFieldTextValueTwo($task77->getCouponAuxiliaryFieldTextValueTwo());
        $task7->setCouponAuxiliaryFieldTextDynamicStatusTwo($task77->getCouponAuxiliaryFieldTextDynamicStatusTwo());
        $task7->setCouponAuxiliaryFieldValueDateTwo($task77->getCouponAuxiliaryFieldValueDateTwo());
        $task7->setCouponAuxiliaryFieldValueTimeTwo($task77->getCouponAuxiliaryFieldValueTimeTwo());
        $task7->setCouponAuxiliaryFieldValueTimezoneTwo($task77->getCouponAuxiliaryFieldValueTimezoneTwo());
        $task7->setCouponAuxiliaryFieldValueDateFormateTwo($task77->getCouponAuxiliaryFieldValueDateFormateTwo());
        $task7->setCouponAuxiliaryFieldValueTimeFormateTwo($task77->getCouponAuxiliaryFieldValueTimeFormateTwo());
        $task7->setCouponAuxiliaryFieldNumberValueTwo($task77->getCouponAuxiliaryFieldNumberValueTwo());
        $task7->setCouponAuxiliaryFieldNumberFormateTwo($task77->getCouponAuxiliaryFieldNumberFormateTwo());
        $task7->setCouponAuxiliaryFieldCurrencyValueTwo($task77->getCouponAuxiliaryFieldCurrencyValueTwo());
        $task7->setCouponAuxiliaryFieldCurrencyCodeTwo($task77->getCouponAuxiliaryFieldCurrencyCodeTwo());
        $task7->setCouponAuxiliaryFieldAlignmnetTwo($task77->getCouponAuxiliaryFieldAlignmnetTwo());

        $task7->setCouponAuxiliaryFieldLabelThree($task77->getCouponAuxiliaryFieldLabelThree());
        $task7->setCouponAuxiliaryFieldLabelDynamicStatusThree($task77->getCouponAuxiliaryFieldLabelDynamicStatusThree());
        $task7->setCouponAuxiliaryFieldValueTypeThree($task77->getCouponAuxiliaryFieldValueTypeThree());
        $task7->setCouponAuxiliaryFieldTextValueThree($task77->getCouponAuxiliaryFieldTextValueThree());
        $task7->setCouponAuxiliaryFieldTextDynamicStatusThree($task77->getCouponAuxiliaryFieldTextDynamicStatusThree());
        $task7->setCouponAuxiliaryFieldValueDateThree($task77->getCouponAuxiliaryFieldValueDateThree());
        $task7->setCouponAuxiliaryFieldValueTimeThree($task77->getCouponAuxiliaryFieldValueTimeThree());
        $task7->setCouponAuxiliaryFieldValueTimezoneThree($task77->getCouponAuxiliaryFieldValueTimezoneThree());
        $task7->setCouponAuxiliaryFieldValueDateFormateThree($task77->getCouponAuxiliaryFieldValueDateFormateThree());
        $task7->setCouponAuxiliaryFieldValueTimeFormateThree($task77->getCouponAuxiliaryFieldValueTimeFormateThree());
        $task7->setCouponAuxiliaryFieldNumberValueThree($task77->getCouponAuxiliaryFieldNumberValueThree());
        $task7->setCouponAuxiliaryFieldNumberFormateThree($task77->getCouponAuxiliaryFieldNumberFormateThree());
        $task7->setCouponAuxiliaryFieldCurrencyValueThree($task77->getCouponAuxiliaryFieldCurrencyValueThree());
        $task7->setCouponAuxiliaryFieldCurrencyCodeThree($task77->getCouponAuxiliaryFieldCurrencyCodeThree());
        $task7->setCouponAuxiliaryFieldAlignmnetThree($task77->getCouponAuxiliaryFieldAlignmnetThree());

        $task7->setCouponAuxiliaryFieldLabelFour($task77->getCouponAuxiliaryFieldLabelFour());
        $task7->setCouponAuxiliaryFieldLabelDynamicStatusFour($task77->getCouponAuxiliaryFieldLabelDynamicStatusFour());
        $task7->setCouponAuxiliaryFieldValueTypeFour($task77->getCouponAuxiliaryFieldValueTypeFour());
        $task7->setCouponAuxiliaryFieldTextValueFour($task77->getCouponAuxiliaryFieldTextValueFour());
        $task7->setCouponAuxiliaryFieldTextDynamicStatusFour($task77->getCouponAuxiliaryFieldTextDynamicStatusFour());
        $task7->setCouponAuxiliaryFieldValueDateFour($task77->getCouponAuxiliaryFieldValueDateFour());
        $task7->setCouponAuxiliaryFieldValueTimeFour($task77->getCouponAuxiliaryFieldValueTimeFour());
        $task7->setCouponAuxiliaryFieldValueTimezoneFour($task77->getCouponAuxiliaryFieldValueTimezoneFour());
        $task7->setCouponAuxiliaryFieldValueDateFormateFour($task77->getCouponAuxiliaryFieldValueDateFormateFour());
        $task7->setCouponAuxiliaryFieldValueTimeFormateFour($task77->getCouponAuxiliaryFieldValueTimeFormateFour());
        $task7->setCouponAuxiliaryFieldNumberValueFour($task77->getCouponAuxiliaryFieldNumberValueFour());
        $task7->setCouponAuxiliaryFieldNumberFormateFour($task77->getCouponAuxiliaryFieldNumberFormateFour());
        $task7->setCouponAuxiliaryFieldCurrencyValueFour($task77->getCouponAuxiliaryFieldCurrencyValueFour());
        $task7->setCouponAuxiliaryFieldCurrencyCodeFour($task77->getCouponAuxiliaryFieldCurrencyCodeFour());
        $task7->setCouponAuxiliaryFieldAlignmnetFour($task77->getCouponAuxiliaryFieldAlignmnetFour());
        $em->persist($task7);

        $task8->setCouponId($generalid);
        $task8->setCouponBackFieldTotalFields($task88->getCouponBackFieldTotalFields());
        $task8->setCouponBackFieldLabelOne($task88->getCouponBackFieldLabelOne());
        $task8->setCouponBackFieldLabelDynamicStatusOne($task88->getCouponBackFieldLabelDynamicStatusOne());
        $task8->setCouponBackFieldTextValueOne($task88->getCouponBackFieldTextValueOne());
        $task8->setCouponBackFieldTextDynamicStatusOne($task88->getCouponBackFieldTextDynamicStatusOne());
        $task8->setCouponBackFieldLabelTwo($task88->getCouponBackFieldLabelTwo());
        $task8->setCouponBackFieldLabelDynamicStatusTwo($task88->getCouponBackFieldLabelDynamicStatusTwo());
        $task8->setCouponBackFieldTextValueTwo($task88->getCouponBackFieldTextValueTwo());
        $task8->setCouponBackFieldTextDynamicStatusTwo($task88->getCouponBackFieldTextDynamicStatusTwo());
        $task8->setCouponBackFieldLabelThree($task88->getCouponBackFieldLabelThree());
        $task8->setCouponBackFieldLabelDynamicStatusThree($task88->getCouponBackFieldLabelDynamicStatusThree());
        $task8->setCouponBackFieldTextValueThree($task88->getCouponBackFieldTextValueThree());
        $task8->setCouponBackFieldTextDynamicStatusThree($task88->getCouponBackFieldTextDynamicStatusThree());
        $task8->setCouponBackFieldLabelFour($task88->getCouponBackFieldLabelFour());
        $task8->setCouponBackFieldLabelDynamicStatusFour($task88->getCouponBackFieldLabelDynamicStatusFour());
        $task8->setCouponBackFieldTextValueFour($task88->getCouponBackFieldTextValueFour());
        $task8->setCouponBackFieldTextDynamicStatusFour($task88->getCouponBackFieldTextDynamicStatusFour());
        $task8->setCouponBackFieldLabelFive($task88->getCouponBackFieldLabelFive());
        $task8->setCouponBackFieldLabelDynamicStatusFive($task88->getCouponBackFieldLabelDynamicStatusFive());
        $task8->setCouponBackFieldTextValueFive($task88->getCouponBackFieldTextValueFive());
        $task8->setCouponBackFieldTextDynamicStatusFive($task88->getCouponBackFieldTextDynamicStatusFive());
        $task8->setCouponBackFieldLabelSix($task88->getCouponBackFieldLabelSix());
        $task8->setCouponBackFieldLabelDynamicStatusSix($task88->getCouponBackFieldLabelDynamicStatusSix());
        $task8->setCouponBackFieldTextValueSix($task88->getCouponBackFieldTextValueSix());
        $task8->setCouponBackFieldTextDynamicStatusSix($task88->getCouponBackFieldTextDynamicStatusSix());
        $task8->setCouponBackFieldLabelSeven($task88->getCouponBackFieldLabelSeven());
        $task8->setCouponBackFieldLabelDynamicStatusSeven($task88->getCouponBackFieldLabelDynamicStatusSeven());
        $task8->setCouponBackFieldTextValueSeven($task88->getCouponBackFieldTextValueSeven());
        $task8->setCouponBackFieldTextDynamicStatusSeven($task88->getCouponBackFieldTextDynamicStatusSeven());
        $task8->setCouponBackFieldLabelEight($task88->getCouponBackFieldLabelEight());
        $task8->setCouponBackFieldLabelDynamicStatusEight($task88->getCouponBackFieldLabelDynamicStatusEight());
        $task8->setCouponBackFieldTextValueEight($task88->getCouponBackFieldTextValueEight());
        $task8->setCouponBackFieldTextDynamicStatusEight($task88->getCouponBackFieldTextDynamicStatusEight());
        $task8->setCouponBackFieldLabelNine($task88->getCouponBackFieldLabelNine());
        $task8->setCouponBackFieldLabelDynamicStatusNine($task88->getCouponBackFieldLabelDynamicStatusNine());
        $task8->setCouponBackFieldTextValueNine($task88->getCouponBackFieldTextValueNine());
        $task8->setCouponBackFieldTextDynamicStatusNine($task88->getCouponBackFieldTextDynamicStatusNine());
        $task8->setCouponBackFieldLabelTen($task88->getCouponBackFieldLabelTen());
        $task8->setCouponBackFieldLabelDynamicStatusTen($task88->getCouponBackFieldLabelDynamicStatusTen());
        $task8->setCouponBackFieldTextValueTen($task88->getCouponBackFieldTextValueTen());
        $task8->setCouponBackFieldTextDynamicStatusTen($task88->getCouponBackFieldTextDynamicStatusTen());
        $em->persist($task8);

        $task9->setCouponId($generalid);
        $task9->setCouponRelevanceLocationTotalFields($task99->getCouponRelevanceLocationTotalFields());
        $task9->setCouponRelevanceLocationAddressOne($task99->getCouponRelevanceLocationAddressOne());
        $task9->setCouponRelevanceLocationTextOne($task99->getCouponRelevanceLocationTextOne());
        $task9->setCouponRelevanceLocationTextDynamicStatusOne($task99->getCouponRelevanceLocationTextDynamicStatusOne());
        $task9->setCouponRelevanceLocationAddressTwo($task99->getCouponRelevanceLocationAddressTwo());
        $task9->setCouponRelevanceLocationTextTwo($task99->getCouponRelevanceLocationTextTwo());
        $task9->setCouponRelevanceLocationTextDynamicStatusTwo($task99->getCouponRelevanceLocationTextDynamicStatusTwo());
        $task9->setCouponRelevanceLocationAddressThree($task99->getCouponRelevanceLocationAddressThree());
        $task9->setCouponRelevanceLocationTextThree($task99->getCouponRelevanceLocationTextThree());
        $task9->setCouponRelevanceLocationTextDynamicStatusThree($task99->getCouponRelevanceLocationTextDynamicStatusThree());
        $task9->setCouponRelevanceLocationAddressFour($task99->getCouponRelevanceLocationAddressFour());
        $task9->setCouponRelevanceLocationTextFour($task99->getCouponRelevanceLocationTextFour());
        $task9->setCouponRelevanceLocationTextDynamicStatusFour($task99->getCouponRelevanceLocationTextDynamicStatusFour());
        $task9->setCouponRelevanceLocationAddressFive($task99->getCouponRelevanceLocationAddressFive());
        $task9->setCouponRelevanceLocationTextFive($task99->getCouponRelevanceLocationTextFive());
        $task9->setCouponRelevanceLocationTextDynamicStatusFive($task99->getCouponRelevanceLocationTextDynamicStatusFive());
        $task9->setCouponRelevanceLocationAddressSix($task99->getCouponRelevanceLocationAddressSix());
        $task9->setCouponRelevanceLocationTextSix($task99->getCouponRelevanceLocationTextSix());
        $task9->setCouponRelevanceLocationTextDynamicStatusSix($task99->getCouponRelevanceLocationTextDynamicStatusSix());
        $task9->setCouponRelevanceLocationAddressSeven($task99->getCouponRelevanceLocationAddressSeven());
        $task9->setCouponRelevanceLocationTextSeven($task99->getCouponRelevanceLocationTextSeven());
        $task9->setCouponRelevanceLocationTextDynamicStatusSeven($task99->getCouponRelevanceLocationTextDynamicStatusSeven());
        $task9->setCouponRelevanceLocationAddressEight($task99->getCouponRelevanceLocationAddressEight());
        $task9->setCouponRelevanceLocationTextEight($task99->getCouponRelevanceLocationTextEight());
        $task9->setCouponRelevanceLocationTextDynamicStatusEight($task99->getCouponRelevanceLocationTextDynamicStatusEight());
        $task9->setCouponRelevanceLocationAddressNine($task99->getCouponRelevanceLocationAddressNine());
        $task9->setCouponRelevanceLocationTextNine($task99->getCouponRelevanceLocationTextNine());
        $task9->setCouponRelevanceLocationTextDynamicStatusNine($task99->getCouponRelevanceLocationTextDynamicStatusNine());
        $task9->setCouponRelevanceLocationAddressTen($task99->getCouponRelevanceLocationAddressTen());
        $task9->setCouponRelevanceLocationTextTen($task99->getCouponRelevanceLocationTextTen());
        $task9->setCouponRelevanceLocationTextDynamicStatusTen($task99->getCouponRelevanceLocationTextDynamicStatusTen());
        $task9->setCouponRelevanceLocationDate($task99->getCouponRelevanceLocationDate());
        $task9->setCouponRelevanceLocationTime($task99->getCouponRelevanceLocationTime());
        $task9->setCouponRelevanceLocationTimezone($task99->getCouponRelevanceLocationTimezone());
        $task9->setCouponRelevanceLocationAddressOneLatitude($task99->getCouponRelevanceLocationAddressOneLatitude());
        $task9->setCouponRelevanceLocationAddressOneLongitude($task99->getCouponRelevanceLocationAddressOneLongitude());
        $task9->setCouponRelevanceLocationAddressTwoLatitude($task99->getCouponRelevanceLocationAddressTwoLatitude());
        $task9->setCouponRelevanceLocationAddressTwoLongitude($task99->getCouponRelevanceLocationAddressTwoLongitude());
        $task9->setCouponRelevanceLocationAddressThreeLatitude($task99->getCouponRelevanceLocationAddressThreeLatitude());
        $task9->setCouponRelevanceLocationAddressThreeLongitude($task99->getCouponRelevanceLocationAddressThreeLongitude());
        $task9->setCouponRelevanceLocationAddressFourLatitude($task99->getCouponRelevanceLocationAddressFourLatitude());
        $task9->setCouponRelevanceLocationAddressFourLongitude($task99->getCouponRelevanceLocationAddressFourLongitude());
        $task9->setCouponRelevanceLocationAddressFiveLatitude($task99->getCouponRelevanceLocationAddressFiveLatitude());
        $task9->setCouponRelevanceLocationAddressFiveLongitude($task99->getCouponRelevanceLocationAddressFiveLongitude());
        $task9->setCouponRelevanceLocationAddressSixLatitude($task99->getCouponRelevanceLocationAddressSixLatitude());
        $task9->setCouponRelevanceLocationAddressSixLongitude($task99->getCouponRelevanceLocationAddressSixLongitude());
        $task9->setCouponRelevanceLocationAddressSevenLatitude($task99->getCouponRelevanceLocationAddressSevenLatitude());
        $task9->setCouponRelevanceLocationAddressSevenLongitude($task99->getCouponRelevanceLocationAddressSevenLongitude());
        $task9->setCouponRelevanceLocationAddressEightLatitude($task99->getCouponRelevanceLocationAddressEightLatitude());
        $task9->setCouponRelevanceLocationAddressEightLongitude($task99->getCouponRelevanceLocationAddressEightLongitude());
        $task9->setCouponRelevanceLocationAddressNineLatitude($task99->getCouponRelevanceLocationAddressNineLatitude());
        $task9->setCouponRelevanceLocationAddressNineLongitude($task99->getCouponRelevanceLocationAddressNineLongitude());
        $task9->setCouponRelevanceLocationAddressTenLatitude($task99->getCouponRelevanceLocationAddressTenLatitude());
        $task9->setCouponRelevanceLocationAddressTenLongitude($task99->getCouponRelevanceLocationAddressTenLongitude());

        $em->persist($task9);

        $task10->setCouponId($generalid);
        // $task10->setDistributionStatus($task110->getDistributionStatus());
        $task10->setPassLinkType($task110->getPassLinkType());
        $task10->setRestrictMultiple($task110->getRestrictMultiple());
        $task10->setVoidPasses($task110->getVoidPasses());
        $task10->setPassExpirationDate($task110->getPassExpirationDate());
        $task10->setQuantityRestriction($task110->getQuantityRestriction());
        $task10->setLimitValue($task110->getLimitValue());
        $task10->setDateRestriction($task110->getDateRestriction());
        $task10->setRestrictedDate($task110->getRestrictedDate());
        $task10->setPasswordIssueStatus($task110->getPasswordIssueStatus());
        $task10->setFixedIssuePassword($task110->getFixedIssuePassword());
        $task10->setSingleUsePasswords($task110->getSingleUsePasswords());
        $task10->setPasswordUpdateStatus($task110->getPasswordUpdateStatus());
        $task10->setFixedUpdatePassword($task110->getFixedUpdatePassword());
        $task10->setSocialSharing($task110->getSocialSharing());
        $em->persist($task10);

        $em->flush();

        $newIconDir = $task2->getId();
        $src    = __DIR__ . "/../../../../web/upload/".$iconid."/";
        $dst    = __DIR__ . "/../../../../web/upload/".$newIconDir."/";
        if(@mkdir($dst, 0777, true)){
            $this->rcopy($src,$dst);
        }

        $createpass = self::generatePassAction($generalid);

        return $createpass;
        //return $this->redirect($this->generateUrl('apb_appass_manage'));
    }


    public function rcopy($src, $dest){

        if(!is_dir($src)) return false;
        if(!is_dir($dest)) {
            if(!mkdir($dest)) {
                return false;
            }
        }
        $i = new \DirectoryIterator($src);
        foreach($i as $f) {
            if($f->isFile()) {
                copy($f->getRealPath(), "$dest/" . $f->getFilename());
            } else if(!$f->isDot() && $f->isDir()) {
                rcopy($f->getRealPath(), "$dest/$f");
            }
        }
    }


    /**
     * @Route(
     *      "/{id}/get/pass",
     *      name = "crud.api.pass.getJsonListById",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "GET"
     *      })
     * @Rest\View
     */
    public function getPassJsonByIdAction($id)
    {

        $storeArray = Array();
        $storeArray[] = "absolute_url/pkpass/".$id.".pkpass";
        $dir    = $this->get('kernel')->getRootDir() . '/logs/pkpass';//'app/logs/pkpass';
        $files2 = scandir($dir);
        $files1 = array_diff($files2, array('.', '..'));
        $root = $this->get('kernel')->getRootDir();
        $src    = $root.'/logs/pkpass';
        $dst    = '/var/www/html/....set_your_path/Kamran/PassbookBundle/Resources/public/pkpass';
        $dir = opendir($src);
        @mkdir($dst, 0777, true);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);

        $dataArray = $storeArray; // get data, in this case list of users.
        $response = new Response(json_encode($dataArray));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }
    /**
     * @Route(
     *      "/pass/list/get/all",
     *      name = "crud.api.pass.getJsonList",
     *      defaults = {
     *          "_format" = "json"
     *      },
     *      requirements = {
     *          "_method" = "GET"
     *      })
     * @Rest\View
     */
    public function getPassJsonListAction(){

        try {
            $query = $this->getDoctrine()->getEntityManager()
                ->createQuery(
                    "SELECT e.id as ID,e.logoText as Title,e.iconName as Icon,e.couponId as PassID,
                     d.couponPrimaryFieldLabel as Discount,f.organizationDescription as Description,
                     f.passUpgradeDate as Updated ,f.places as CategoryID,f.places as Category,
                     f.organizationName as Company ,e.logoName as CompanyLogo,
                     g.couponRelevanceLocationTotalFields as total,
                      g.couponRelevanceLocationAddressOne as Location1,
                      g.couponRelevanceLocationAddressOneLatitude as Latitude1,
                      g.couponRelevanceLocationAddressOneLongitude as Longitude1,
                      g.couponRelevanceLocationAddressTwo as Location2,
                      g.couponRelevanceLocationAddressTwoLatitude as Latitude2,
                      g.couponRelevanceLocationAddressTwoLongitude as Longitude2,
                      g.couponRelevanceLocationAddressThree as Location3,
                      g.couponRelevanceLocationAddressThreeLatitude as Latitude3,
                      g.couponRelevanceLocationAddressThreeLongitude as Longitude3,
                      g.couponRelevanceLocationAddressFour as Location4,
                      g.couponRelevanceLocationAddressFourLatitude as Latitude4,
                      g.couponRelevanceLocationAddressFourLongitude as Longitude4,
                      g.couponRelevanceLocationAddressFive as Location5,
                      g.couponRelevanceLocationAddressFiveLatitude as Latitude5,
                      g.couponRelevanceLocationAddressFiveLongitude as Longitude5,
                      g.couponRelevanceLocationAddressSix as Location6,
                      g.couponRelevanceLocationAddressSixLatitude as Latitude6,
                      g.couponRelevanceLocationAddressSixLongitude as Longitude6,
                      g.couponRelevanceLocationAddressSeven as Location7,
                      g.couponRelevanceLocationAddressSevenLatitude as Latitude7,
                      g.couponRelevanceLocationAddressSevenLongitude as Longitude7,
                      g.couponRelevanceLocationAddressEight as Location8,
                      g.couponRelevanceLocationAddressEightLatitude as Latitude8,
                      g.couponRelevanceLocationAddressEightLongitude as Longitude8,
                      g.couponRelevanceLocationAddressNine as Location9,
                      g.couponRelevanceLocationAddressNineLatitude as Latitude9,
                      g.couponRelevanceLocationAddressNineLongitude as Longitude9,
                      g.couponRelevanceLocationAddressTen as Location10,
                      g.couponRelevanceLocationAddressTenLatitude as Latitude10,
                      g.couponRelevanceLocationAddressTenLongitude as Longitude10,
                     h.passExpirationDate as Expiration
                     FROM KamranPassbookBundle:mappearance e
                     JOIN KamranPassbookBundle:mprimary d where e.couponId = d.couponId
                     JOIN KamranPassbookBundle:mgeneral f where d.couponId = f.couponId
                     JOIN KamranPassbookBundle:mrelevance g where f.couponId = g.couponId
                     JOIN KamranPassbookBundle:mdistribution h where g.couponId = h.couponId and h.distributionStatus = 1
                        and f.categoryName = 'coupon'"
                )->getResult();
            $result = $query;
            $imagedir = 'absolute_url/upload';

            foreach($result as $key => $value)
            {
                if($result[$key]['Expiration']!="")
                {
                    $today = date("Y-m-d");
                    $expiry = $result[$key]['Expiration'];
                    $expiryDate = $expiry->format('Y-m-d');

                    if ($today>$expiryDate){

                        unset($result[$key]);

                    }
                    else
                    {

                    }
                }
            }
            foreach($result as $key => $value)
            {
                if($result[$key]['Icon']!="")
                {
                    $result[$key]['Icon'] = $imagedir.'/'.$value['ID'].'/'.$value['Icon'];
                }
                if($result[$key]['CompanyLogo']!="")
                {
                    $result[$key]['CompanyLogo'] = $imagedir.'/'.$value['ID'].'/'.$value['CompanyLogo'];
                }

                if($result[$key]['Updated']){

                    $update = $result[$key]['Updated'];
                    $updateDate = $update->format('Y-m-d');
                    $result[$key]['Updated']= $updateDate;
                }

                if($result[$key]['Expiration']){

                    $expiry = $result[$key]['Expiration'];
                    $expiryDate = $expiry->format('Y-m-d');
                    $result[$key]['Expiration']= $expiryDate;
                }
                if($result[$key]['Category']){

                    $ids = $result[$key]['Category'];
                    $query = $this->getDoctrine()->getEntityManager()
                        ->createQuery(
                            'SELECT e.name as categoryname
                             FROM KamranPassbookBundle:category e
                             where e.id = ?1'
                        );
                    $query->setParameter(1, $ids);
                    $results = $query->getResult();
                    foreach($results as $keys => $values){
                        $result[$key]['Category'] = $results[$keys]['categoryname'];
                    }

                }

            }
            foreach($result as $key => $value)
            {
                switch($result[$key]['total'])
                {
                    case 1:
                        $result[$key]['Location2'] = null;
                        $result[$key]['Latitude2'] = null;
                        $result[$key]['Longitude2'] = null;
                        $result[$key]['Location3'] = null;
                        $result[$key]['Latitude3'] = null;
                        $result[$key]['Longitude3'] = null;
                        $result[$key]['Location4'] = null;
                        $result[$key]['Latitude4'] = null;
                        $result[$key]['Longitude4'] = null;
                        $result[$key]['Location5'] = null;
                        $result[$key]['Latitude5'] = null;
                        $result[$key]['Longitude5'] = null;
                        $result[$key]['Location6'] = null;
                        $result[$key]['Latitude6'] = null;
                        $result[$key]['Longitude6'] = null;
                        $result[$key]['Location7'] = null;
                        $result[$key]['Latitude7'] = null;
                        $result[$key]['Longitude7'] = null;
                        $result[$key]['Location8'] = null;
                        $result[$key]['Latitude8'] = null;
                        $result[$key]['Longitude8'] = null;
                        $result[$key]['Location9'] = null;
                        $result[$key]['Latitude9'] = null;
                        $result[$key]['Longitude9'] = null;
                        $result[$key]['Location10'] = null;
                        $result[$key]['Latitude10'] = null;
                        $result[$key]['Longitude10'] = null;
                        break;
                    case 2:
                        $result[$key]['Location3'] = null;
                        $result[$key]['Latitude3'] = null;
                        $result[$key]['Longitude3'] = null;
                        $result[$key]['Location4'] = null;
                        $result[$key]['Latitude4'] = null;
                        $result[$key]['Longitude4'] = null;
                        $result[$key]['Location5'] = null;
                        $result[$key]['Latitude5'] = null;
                        $result[$key]['Longitude5'] = null;
                        $result[$key]['Location6'] = null;
                        $result[$key]['Latitude6'] = null;
                        $result[$key]['Longitude6'] = null;
                        $result[$key]['Location7'] = null;
                        $result[$key]['Latitude7'] = null;
                        $result[$key]['Longitude7'] = null;
                        $result[$key]['Location8'] = null;
                        $result[$key]['Latitude8'] = null;
                        $result[$key]['Longitude8'] = null;
                        $result[$key]['Location9'] = null;
                        $result[$key]['Latitude9'] = null;
                        $result[$key]['Longitude9'] = null;
                        $result[$key]['Location10'] = null;
                        $result[$key]['Latitude10'] = null;
                        $result[$key]['Longitude10'] = null;
                        break;
                    case 3:
                        $result[$key]['Location4'] = null;
                        $result[$key]['Latitude4'] = null;
                        $result[$key]['Longitude4'] = null;
                        $result[$key]['Location5'] = null;
                        $result[$key]['Latitude5'] = null;
                        $result[$key]['Longitude5'] = null;
                        $result[$key]['Location6'] = null;
                        $result[$key]['Latitude6'] = null;
                        $result[$key]['Longitude6'] = null;
                        $result[$key]['Location7'] = null;
                        $result[$key]['Latitude7'] = null;
                        $result[$key]['Longitude7'] = null;
                        $result[$key]['Location8'] = null;
                        $result[$key]['Latitude8'] = null;
                        $result[$key]['Longitude8'] = null;
                        $result[$key]['Location9'] = null;
                        $result[$key]['Latitude9'] = null;
                        $result[$key]['Longitude9'] = null;
                        $result[$key]['Location10'] = null;
                        $result[$key]['Latitude10'] = null;
                        $result[$key]['Longitude10'] = null;
                        break;
                    case 4:
                        $result[$key]['Location5'] = null;
                        $result[$key]['Latitude5'] = null;
                        $result[$key]['Longitude5'] = null;
                        $result[$key]['Location6'] = null;
                        $result[$key]['Latitude6'] = null;
                        $result[$key]['Longitude6'] = null;
                        $result[$key]['Location7'] = null;
                        $result[$key]['Latitude7'] = null;
                        $result[$key]['Longitude7'] = null;
                        $result[$key]['Location8'] = null;
                        $result[$key]['Latitude8'] = null;
                        $result[$key]['Longitude8'] = null;
                        $result[$key]['Location9'] = null;
                        $result[$key]['Latitude9'] = null;
                        $result[$key]['Longitude9'] = null;
                        $result[$key]['Location10'] = null;
                        $result[$key]['Latitude10'] = null;
                        $result[$key]['Longitude10'] = null;
                        break;
                    case 5:
                        $result[$key]['Location6'] = null;
                        $result[$key]['Latitude6'] = null;
                        $result[$key]['Longitude6'] = null;
                        $result[$key]['Location7'] = null;
                        $result[$key]['Latitude7'] = null;
                        $result[$key]['Longitude7'] = null;
                        $result[$key]['Location8'] = null;
                        $result[$key]['Latitude8'] = null;
                        $result[$key]['Longitude8'] = null;
                        $result[$key]['Location9'] = null;
                        $result[$key]['Latitude9'] = null;
                        $result[$key]['Longitude9'] = null;
                        $result[$key]['Location10'] = null;
                        $result[$key]['Latitude10'] = null;
                        $result[$key]['Longitude10'] = null;
                        break;
                    case 6:
                        $result[$key]['Location7'] = null;
                        $result[$key]['Latitude7'] = null;
                        $result[$key]['Longitude7'] = null;
                        $result[$key]['Location8'] = null;
                        $result[$key]['Latitude8'] = null;
                        $result[$key]['Longitude8'] = null;
                        $result[$key]['Location9'] = null;
                        $result[$key]['Latitude9'] = null;
                        $result[$key]['Longitude9'] = null;
                        $result[$key]['Location10'] = null;
                        $result[$key]['Latitude10'] = null;
                        $result[$key]['Longitude10'] = null;
                        break;
                    case 7:
                        $result[$key]['Location8'] = null;
                        $result[$key]['Latitude8'] = null;
                        $result[$key]['Longitude8'] = null;
                        $result[$key]['Location9'] = null;
                        $result[$key]['Latitude9'] = null;
                        $result[$key]['Longitude9'] = null;
                        $result[$key]['Location10'] = null;
                        $result[$key]['Latitude10'] = null;
                        $result[$key]['Longitude10'] = null;
                        break;
                    case 8:
                        $result[$key]['Location9'] = null;
                        $result[$key]['Latitude9'] = null;
                        $result[$key]['Longitude9'] = null;
                        $result[$key]['Location10'] = null;
                        $result[$key]['Latitude10'] = null;
                        $result[$key]['Longitude10'] = null;
                        break;
                    case 9:
                        $result[$key]['Location10'] = null;
                        $result[$key]['Latitude10'] = null;
                        $result[$key]['Longitude10'] = null;
                        break;
                    case 10:
                        break;
                }

                $result[$key]['total'] = null;
            }
            $result = array_values($result);
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        $dataArray = $result; // get data, in this case list of users.
        $response = new Response(json_encode($dataArray));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }



}//@
