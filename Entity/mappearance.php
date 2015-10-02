<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;


/**
 * mappearance
 *
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class mappearance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="coupon_id", type="string",length=255, nullable=true)
     */
    private $couponId;

    /**
     * @var string $icon_name
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="icon_name", type="string", length=255, nullable=true)
     */
    private $iconName;

    /**
     * @var string $logo_name
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="logo_name", type="string", length=255, nullable=true)
     */
    private $logoName;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_text", type="string", length=255, nullable=true)
     */
    private $logoText;

    /**
     *
     * @var string $generic_thumbnail
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="generic_thumbnail", type="string", length=255, nullable=true)
     */
    private $genericThumbnail;

    /**
     *
     * @var string $boarding_pass_footer
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="boarding_pass_footer", type="string", length=255, nullable=true)
     */
    private $boardingPassFooter;

    /**
     *
     * @var string $coupon_strip
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="coupon_strip", type="string", length=255, nullable=true)
     */
    private $couponStrip;

    /**
     * @var string $store_card_strip
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="store_card_strip", type="string", length=255, nullable=true)
     */
    private $storeCardStrip;

    /**
     * @var string $event_ticket_status
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="event_ticket_status", type="string", length=255, nullable=true)
     */
    private $eventTicketStatus;

    /**
     * @var string $event_ticket_strip
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="event_ticket_strip", type="string", length=255, nullable=true)
     */
    private $eventTicketStrip;

    /**
     * @var string $event_ticket_thumbnail
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="event_ticket_thumbnail", type="string", length=255, nullable=true)
     */
    private $eventTicketThumbnail;

    /**
     * @var string $event_ticket_background
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="event_ticket_background", type="string", length=255, nullable=true)
     */
    private $eventTicketBackground;

    /**
     * @var string
     *
     * @ORM\Column(name="background_color_code", type="string", length=255, nullable=true)
     */
    private $backgroundColorCode;

    /**
     * @var string
     *
     * @ORM\Column(name="field_label_color_code", type="string", length=255, nullable=true)
     */
    private $fieldLabelColorCode;

    /**
     * @var string
     *
     * @ORM\Column(name="field_value_color_code", type="string", length=255, nullable=true)
     */
    private $fieldValueColorCode;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set couponId
     *
     * @param string $couponId
     *
     * @return mappearance
     */
    public function setCouponId($couponId)
    {
        $this->couponId = $couponId;
    
        return $this;
    }
    /**
     * Get couponId
     *
     * @return string
     */
    public function getCouponId()
    {
        return $this->couponId;
    }

    public function __toString()
    {
        return ''.$this->couponId;
    }


    /**
     * Set iconName
     *
     * @param string $iconName
     *
     * @return mappearance
     */
    public function setIconName($iconName)
    {
        $this->iconName = $iconName;
        return $this;
    }

    /**
     * Get iconName
     *
     * @return string 
     */
    public function getIconName()
    {
        return $this->iconName;
    }

    /**
     * Set logoName
     *
     * @param string $logoName
     *
     * @return mappearance
     */
    public function setLogoName($logoName)
    {
        $this->logoName = $logoName;
    
        return $this;
    }

    /**
     * Get logoName
     *
     * @return string 
     */
    public function getLogoName()
    {
        return $this->logoName;
    }

    /**
     * Set logoText
     *
     * @param string $logoText
     *
     * @return mappearance
     */
    public function setLogoText($logoText)
    {
        $this->logoText = $logoText;
    
        return $this;
    }

    /**
     * Get logoText
     *
     * @return string 
     */
    public function getLogoText()
    {
        return $this->logoText;
    }

    /**
     * Set genericThumbnail
     *
     * @param string $genericThumbnail
     *
     * @return mappearance
     */
    public function setGenericThumbnail($genericThumbnail)
    {
        $this->genericThumbnail = $genericThumbnail;
    
        return $this;
    }

    /**
     * Get genericThumbnail
     *
     * @return string 
     */
    public function getGenericThumbnail()
    {
        return $this->genericThumbnail;
    }


    /**
     * Set boardingPassFooter
     *
     * @param string $boardingPassFooter
     *
     * @return mappearance
     */
    public function setBoardingPassFooter($boardingPassFooter)
    {
        $this->boardingPassFooter = $boardingPassFooter;
    
        return $this;
    }

    /**
     * Get boardingPassFooter
     *
     * @return string 
     */
    public function getBoardingPassFooter()
    {
        return $this->boardingPassFooter;
    }


    /**
     * Set couponStrip
     *
     * @param string $couponStrip
     *
     * @return mappearance
     */
    public function setCouponStrip($couponStrip)
    {
        $this->couponStrip = $couponStrip;
    
        return $this;
    }

    /**
     * Get couponStrip
     *
     * @return string 
     */
    public function getCouponStrip()
    {
        return $this->couponStrip;
    }


    /**
     * Set storeCardStrip
     *
     * @param string $storeCardStrip
     *
     * @return mappearance
     */
    public function setStoreCardStrip($storeCardStrip)
    {
        $this->storeCardStrip = $storeCardStrip;
    
        return $this;
    }

    /**
     * Get storeCardStrip
     *
     * @return string 
     */
    public function getStoreCardStrip()
    {
        return $this->storeCardStrip;
    }

    /**
     * Set eventTicketStatus
     *
     * @param string $eventTicketStatus
     *
     * @return mappearance
     */
    public function setEventTicketStatus($eventTicketStatus)
    {
        $this->eventTicketStatus = $eventTicketStatus;
    
        return $this;
    }

    /**
     * Get eventTicketStatus
     *
     * @return string 
     */
    public function getEventTicketStatus()
    {
        return $this->eventTicketStatus;
    }


    /**
     * Set eventTicketStrip
     *
     * @param string $eventTicketStrip
     *
     * @return mappearance
     */
    public function setEventTicketStrip($eventTicketStrip)
    {
        $this->eventTicketStrip = $eventTicketStrip;
    
        return $this;
    }

    /**
     * Get eventTicketStrip
     *
     * @return string 
     */
    public function getEventTicketStrip()
    {
        return $this->eventTicketStrip;
    }


    /**
     * Set eventTicketThumbnail
     *
     * @param string $eventTicketThumbnail
     *
     * @return mappearance
     */
    public function setEventTicketThumbnail($eventTicketThumbnail)
    {
        $this->eventTicketThumbnail = $eventTicketThumbnail;
        return $this;
    }

    /**
     * Get eventTicketThumbnail
     *
     * @return string 
     */
    public function getEventTicketThumbnail()
    {
        return $this->eventTicketThumbnail;
    }




    /**
     * Set eventTicketBackground
     *
     * @param string $eventTicketBackground
     *
     * @return mappearance
     */
    public function setEventTicketBackground($eventTicketBackground)
    {
        $this->eventTicketBackground = $eventTicketBackground;
    
        return $this;
    }

    /**
     * Get eventTicketBackground
     *
     * @return string 
     */
    public function getEventTicketBackground()
    {
        return $this->eventTicketBackground;
    }

    /**
     * Set backgroundColorCode
     *
     * @param string $backgroundColorCode
     *
     * @return mappearance
     */
    public function setBackgroundColorCode($backgroundColorCode)
    {
        $this->backgroundColorCode = $backgroundColorCode;
    
        return $this;
    }

    /**
     * Get backgroundColorCode
     *
     * @return string 
     */
    public function getBackgroundColorCode()
    {
        return $this->backgroundColorCode;
    }

    /**
     * Set fieldLabelColorCode
     *
     * @param string $fieldLabelColorCode
     *
     * @return mappearance
     */
    public function setFieldLabelColorCode($fieldLabelColorCode)
    {
        $this->fieldLabelColorCode = $fieldLabelColorCode;
    
        return $this;
    }

    /**
     * Get fieldLabelColorCode
     *
     * @return string 
     */
    public function getFieldLabelColorCode()
    {
        return $this->fieldLabelColorCode;
    }

    /**
     * Set fieldValueColorCode
     *
     * @param string $fieldValueColorCode
     *
     * @return mappearance
     */
    public function setFieldValueColorCode($fieldValueColorCode)
    {
        $this->fieldValueColorCode = $fieldValueColorCode;
    
        return $this;
    }

    /**
     * Get fieldValueColorCode
     *
     * @return string 
     */
    public function getFieldValueColorCode()
    {
        return $this->fieldValueColorCode;
    }


    /*  _file paths */
    public function getImageDirById(){
        return $this->getId();
    }

    protected function getWebDir(){
        return __DIR__.'/../../../../web/';
    }


    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir(){
        return 'upload/'.$this->getImageDirById();
    }

} //@

