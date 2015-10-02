<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * mdatasetting
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mdatasetting
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
     *
     * @ORM\Column(name="coupon_id", type="string",length=255, nullable=true)
     **/
    private $couponId;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_status", type="string", length=255, nullable=true)
     */
    private $couponBarcodeStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_type", type="string", length=255, nullable=true)
     */
    private $couponBarcodeType;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_value_option", type="string", length=255, nullable=true)
     */
    private $couponBarcodeValueOption;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_fixed_value", type="string", length=255, nullable=true)
     */
    private $couponBarcodeFixedValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_value_source", type="string", length=255, nullable=true)
     */
    private $couponBarcodeValueSource;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auto_generate_value_type", type="string", length=255, nullable=true)
     */
    private $couponAutoGenerateValueType;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auto_generate_value_length", type="string", length=255, nullable=true)
     */
    private $couponAutoGenerateValueLength;
    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auto_generate_value", type="string", length=255, nullable=true)
     */
    private $couponAutoGenerateValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_dynamic_value", type="string", length=255, nullable=true)
     */
    private $couponBarcodeDynamicValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_encoding", type="string", length=255, nullable=true)
     */
    private $couponBarcodeEncoding;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode_alternate_text", type="string", length=255, nullable=true)
     */
    private $barcodeAlternateText;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode_alternate_fixed_text", type="string", length=255, nullable=true)
     */
    private $barcodeAlternateFixedText;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode_alternate_dynamic_text", type="string", length=255, nullable=true)
     */
    private $barcodeAlternateDynamicText;
    /**
     * @var string
     *
     * @ORM\Column(name="barcode_alternate_text_value", type="string", length=255, nullable=true)
     */
    private $barcodeAlternateTextValue;

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
     * @return mdatasetting
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

    /**
     * Set couponBarcodeStatus
     *
     * @param string $couponBarcodeStatus
     *
     * @return mdatasetting
     */
    public function setCouponBarcodeStatus($couponBarcodeStatus)
    {
        $this->couponBarcodeStatus = $couponBarcodeStatus;
    
        return $this;
    }

    /**
     * Get couponBarcodeStatus
     *
     * @return string 
     */
    public function getCouponBarcodeStatus()
    {
        return $this->couponBarcodeStatus;
    }

    /**
     * Set couponBarcodeType
     *
     * @param string $couponBarcodeType
     *
     * @return mdatasetting
     */
    public function setCouponBarcodeType($couponBarcodeType)
    {
        $this->couponBarcodeType = $couponBarcodeType;
    
        return $this;
    }

    /**
     * Get couponBarcodeType
     *
     * @return string 
     */
    public function getCouponBarcodeType()
    {
        return $this->couponBarcodeType;
    }

    /**
     * Set couponBarcodeValueOption
     *
     * @param string $couponBarcodeValueOption
     *
     * @return mdatasetting
     */
    public function setCouponBarcodeValueOption($couponBarcodeValueOption)
    {
        $this->couponBarcodeValueOption = $couponBarcodeValueOption;
    
        return $this;
    }

    /**
     * Get couponBarcodeValueOption
     *
     * @return string 
     */
    public function getCouponBarcodeValueOption()
    {
        return $this->couponBarcodeValueOption;
    }

    /**
     * Set couponBarcodeFixedValue
     *
     * @param string $couponBarcodeFixedValue
     *
     * @return mdatasetting
     */
    public function setCouponBarcodeFixedValue($couponBarcodeFixedValue)
    {
        $this->couponBarcodeFixedValue = $couponBarcodeFixedValue;
    
        return $this;
    }

    /**
     * Get couponBarcodeFixedValue
     *
     * @return string 
     */
    public function getCouponBarcodeFixedValue()
    {
        return $this->couponBarcodeFixedValue;
    }

    /**
     * Set couponBarcodeValueSource
     *
     * @param string $couponBarcodeValueSource
     *
     * @return mdatasetting
     */
    public function setCouponBarcodeValueSource($couponBarcodeValueSource)
    {
        $this->couponBarcodeValueSource = $couponBarcodeValueSource;
    
        return $this;
    }

    /**
     * Get couponBarcodeValueSource
     *
     * @return string 
     */
    public function getCouponBarcodeValueSource()
    {
        return $this->couponBarcodeValueSource;
    }

    /**
     * Set couponAutoGenerateValueType
     *
     * @param string $couponAutoGenerateValueType
     *
     * @return mdatasetting
     */
    public function setCouponAutoGenerateValueType($couponAutoGenerateValueType)
    {
        $this->couponAutoGenerateValueType = $couponAutoGenerateValueType;
    
        return $this;
    }

    /**
     * Get couponAutoGenerateValueType
     *
     * @return string 
     */
    public function getCouponAutoGenerateValueType()
    {
        return $this->couponAutoGenerateValueType;
    }

    /**
     * Set couponAutoGenerateValueLength
     *
     * @param string $couponAutoGenerateValueLength
     *
     * @return mdatasetting
     */
    public function setCouponAutoGenerateValueLength($couponAutoGenerateValueLength)
    {
        $this->couponAutoGenerateValueLength = $couponAutoGenerateValueLength;
    
        return $this;
    }

    /**
     * Get couponAutoGenerateValueLength
     *
     * @return string 
     */
    public function getCouponAutoGenerateValueLength()
    {
        return $this->couponAutoGenerateValueLength;
    }
    /**
     * Set couponAutoGenerateValue
     *
     * @param string $couponAutoGenerateValue
     *
     * @return mdatasetting
     */
    public function setCouponAutoGenerateValue($couponAutoGenerateValue)
    {
        $this->couponAutoGenerateValue = $couponAutoGenerateValue;

        return $this;
    }

    /**
     * Get couponAutoGenerateValue
     *
     * @return string
     */
    public function getCouponAutoGenerateValue()
    {
        return $this->couponAutoGenerateValue;
    }


    /**
     * Set couponBarcodeDynamicValue
     *
     * @param string $couponBarcodeDynamicValue
     *
     * @return mdatasetting
     */
    public function setCouponBarcodeDynamicValue($couponBarcodeDynamicValue)
    {
        $this->couponBarcodeDynamicValue = $couponBarcodeDynamicValue;
    
        return $this;
    }

    /**
     * Get couponBarcodeDynamicValue
     *
     * @return string 
     */
    public function getCouponBarcodeDynamicValue()
    {
        return $this->couponBarcodeDynamicValue;
    }

    /**
     * Set couponBarcodeEncoding
     *
     * @param string $couponBarcodeEncoding
     *
     * @return mdatasetting
     */
    public function setCouponBarcodeEncoding($couponBarcodeEncoding)
    {
        $this->couponBarcodeEncoding = $couponBarcodeEncoding;
    
        return $this;
    }

    /**
     * Get couponBarcodeEncoding
     *
     * @return string 
     */
    public function getCouponBarcodeEncoding()
    {
        return $this->couponBarcodeEncoding;
    }

    /**
     * Set barcodeAlternateText
     *
     * @param string $barcodeAlternateText
     *
     * @return mdatasetting
     */
    public function setBarcodeAlternateText($barcodeAlternateText)
    {
        $this->barcodeAlternateText = $barcodeAlternateText;
    
        return $this;
    }

    /**
     * Get barcodeAlternateText
     *
     * @return string 
     */
    public function getBarcodeAlternateText()
    {
        return $this->barcodeAlternateText;
    }

    /**
     * Set barcodeAlternateFixedText
     *
     * @param string $barcodeAlternateFixedText
     *
     * @return mdatasetting
     */
    public function setBarcodeAlternateFixedText($barcodeAlternateFixedText)
    {
        $this->barcodeAlternateFixedText = $barcodeAlternateFixedText;
    
        return $this;
    }

    /**
     * Get barcodeAlternateFixedText
     *
     * @return string 
     */
    public function getBarcodeAlternateFixedText()
    {
        return $this->barcodeAlternateFixedText;
    }

    /**
     * Set barcodeAlternateDynamicText
     *
     * @param string $barcodeAlternateDynamicText
     *
     * @return mdatasetting
     */
    public function setBarcodeAlternateDynamicText($barcodeAlternateDynamicText)
    {
        $this->barcodeAlternateDynamicText = $barcodeAlternateDynamicText;
    
        return $this;
    }

    /**
     * Get barcodeAlternateDynamicText
     *
     * @return string 
     */
    public function getBarcodeAlternateDynamicText()
    {
        return $this->barcodeAlternateDynamicText;
    }
    /**
     * Set barcodeAlternateTextValue
     *
     * @param string $barcodeAlternateTextValue
     *
     * @return mdatasetting
     */
    public function setBarcodeAlternateTextValue($barcodeAlternateTextValue)
    {
        $this->barcodeAlternateTextValue = $barcodeAlternateTextValue;

        return $this;
    }

    /**
     * Get barcodeAlternateTextValue
     *
     * @return string
     */
    public function getBarcodeAlternateTextValue()
    {
        return $this->barcodeAlternateTextValue;
    }
}

