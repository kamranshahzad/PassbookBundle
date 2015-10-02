<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * mheader
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mheader
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
     */
    private $couponId;

    /**
     * @var string
     *
     * @ORM\Column(name="c_header_label", type="string", length=255, nullable=true)
     */
    private $couponHeaderLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="c_header_label_dynamic_status", type="boolean", nullable=true)
     */
    private $couponHeaderLabelDynamicStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_value_type", type="string", length=255, nullable=true)
     */
    private $couponHeaderValueType;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_text_value", type="string", length=255, nullable=true)
     */
    private $couponHeaderTextValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_text_dynamic_status", type="boolean", nullable=true)
     */
    private $couponHeaderTextDynamicStatus;

    /**
     * @var \DateTime
     * @ORM\Column(name="coupon_header_value_date", type="datetime", nullable=true)
     */
    private $couponHeaderValueDate;

    /**
     * @var string
     * @ORM\Column(name="coupon_header_value_time", type="string", length=100, nullable=true)
     */
    private $couponHeaderValueTime;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_value_timezone", type="string", length=255, nullable=true)
     */
    private $couponHeaderValueTimezone;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_value_date_formate", type="string", length=255, nullable=true)
     */
    private $couponHeaderValueDateFormate;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_value_time_formate", type="string", length=255, nullable=true)
     */
    private $couponHeaderValueTimeFormate;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_header_number_value", type="integer", nullable=true)
     */
    private $couponHeaderNumberValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_number_formate", type="string", length=255, nullable=true)
     */
    private $couponHeaderNumberFormate;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_header_currency_value", type="integer", nullable=true)
     */
    private $couponHeaderCurrencyValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_currency_code", type="string", length=255, nullable=true)
     */
    private $couponHeaderCurrencyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_alignmnet", type="string", length=255, nullable=true)
     */
    private $couponHeaderAlignmnet;


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
     * @return mheader
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
     * Set couponHeaderLabel
     *
     * @param string $couponHeaderLabel
     *
     * @return mheader
     */
    public function setCouponHeaderLabel($couponHeaderLabel)
    {
        $this->couponHeaderLabel = $couponHeaderLabel;
    
        return $this;
    }

    /**
     * Get couponHeaderLabel
     *
     * @return string 
     */
    public function getCouponHeaderLabel()
    {
        return $this->couponHeaderLabel;
    }

    /**
     * Set couponHeaderLabelDynamicStatus
     *
     * @param string $couponHeaderLabelDynamicStatus
     *
     * @return mheader
     */
    public function setCouponHeaderLabelDynamicStatus($couponHeaderLabelDynamicStatus)
    {
        $this->couponHeaderLabelDynamicStatus = $couponHeaderLabelDynamicStatus;
    
        return $this;
    }

    /**
     * Get couponHeaderLabelDynamicStatus
     *
     * @return string 
     */
    public function getCouponHeaderLabelDynamicStatus()
    {
        return (bool)$this->couponHeaderLabelDynamicStatus;
    }

    /**
     * Set couponHeaderValueType
     *
     * @param string $couponHeaderValueType
     *
     * @return mheader
     */
    public function setCouponHeaderValueType($couponHeaderValueType)
    {
        $this->couponHeaderValueType = $couponHeaderValueType;
    
        return $this;
    }

    /**
     * Get couponHeaderValueType
     *
     * @return string 
     */
    public function getCouponHeaderValueType()
    {
        return $this->couponHeaderValueType;
    }

    /**
     * Set couponHeaderTextValue
     *
     * @param string $couponHeaderTextValue
     *
     * @return mheader
     */
    public function setCouponHeaderTextValue($couponHeaderTextValue)
    {
        $this->couponHeaderTextValue = $couponHeaderTextValue;
    
        return $this;
    }

    /**
     * Get couponHeaderTextValue
     *
     * @return string 
     */
    public function getCouponHeaderTextValue()
    {
        return $this->couponHeaderTextValue;
    }

    /**
     * Set couponHeaderTextDynamicStatus
     *
     * @param string $couponHeaderTextDynamicStatus
     *
     * @return mheader
     */
    public function setCouponHeaderTextDynamicStatus($couponHeaderTextDynamicStatus)
    {
        $this->couponHeaderTextDynamicStatus = $couponHeaderTextDynamicStatus;
    
        return $this;
    }

    /**
     * Get couponHeaderTextDynamicStatus
     *
     * @return string 
     */
    public function getCouponHeaderTextDynamicStatus()
    {
        return (bool)$this->couponHeaderTextDynamicStatus;
    }

    /**
     * Set couponHeaderValueDate
     *
     * @param \Date|null $couponHeaderValueDate
     *
     * @return mheader
     */
    public function setCouponHeaderValueDate($couponHeaderValueDate )
    {
        $this->couponHeaderValueDate = $couponHeaderValueDate;
    
        return $this;
    }

    /**
     * Get couponHeaderValueDate
     *
     * @return \Date
     */
    public function getCouponHeaderValueDate()
    {
        return $this->couponHeaderValueDate;
    }

    /**
     * Set couponHeaderValueTime
     *
     * @param \Time|null $couponHeaderValueTime
     *
     * @return mheader
     */
    public function setCouponHeaderValueTime($couponHeaderValueTime)
    {
        $this->couponHeaderValueTime = $couponHeaderValueTime;
    
        return $this;
    }

    /**
     * Get couponHeaderValueTime
     *
     * @return \Time
     */
    public function getCouponHeaderValueTime()
    {
        return $this->couponHeaderValueTime;
    }

    /**
     * Set couponHeaderValueTimezone
     *
     * @param string $couponHeaderValueTimezone
     *
     * @return mheader
     */
    public function setCouponHeaderValueTimezone($couponHeaderValueTimezone)
    {
        $this->couponHeaderValueTimezone = $couponHeaderValueTimezone;
    
        return $this;
    }

    /**
     * Get couponHeaderValueTimezone
     *
     * @return string
     */
    public function getCouponHeaderValueTimezone()
    {
        return $this->couponHeaderValueTimezone;
    }

    /**
     * Set couponHeaderValueDateFormate
     *
     * @param string $couponHeaderValueDateFormate
     *
     * @return mheader
     */
    public function setCouponHeaderValueDateFormate($couponHeaderValueDateFormate)
    {
        $this->couponHeaderValueDateFormate = $couponHeaderValueDateFormate;
    
        return $this;
    }

    /**
     * Get couponHeaderValueDateFormate
     *
     * @return string 
     */
    public function getCouponHeaderValueDateFormate()
    {
        return $this->couponHeaderValueDateFormate;
    }

    /**
     * Set couponHeaderValueTimeFormate
     *
     * @param string $couponHeaderValueTimeFormate
     *
     * @return mheader
     */
    public function setCouponHeaderValueTimeFormate($couponHeaderValueTimeFormate)
    {
        $this->couponHeaderValueTimeFormate = $couponHeaderValueTimeFormate;
    
        return $this;
    }

    /**
     * Get couponHeaderValueTimeFormate
     *
     * @return string 
     */
    public function getCouponHeaderValueTimeFormate()
    {
        return $this->couponHeaderValueTimeFormate;
    }

    /**
     * Set couponHeaderNumberValue
     *
     * @param integer $couponHeaderNumberValue
     *
     * @return mheader
     */
    public function setCouponHeaderNumberValue($couponHeaderNumberValue)
    {
        $this->couponHeaderNumberValue = $couponHeaderNumberValue;
    
        return $this;
    }

    /**
     * Get couponHeaderNumberValue
     *
     * @return integer
     */
    public function getCouponHeaderNumberValue()
    {
        return $this->couponHeaderNumberValue;
    }

    /**
     * Set couponHeaderNumberFormate
     *
     * @param string $couponHeaderNumberFormate
     *
     * @return mheader
     */
    public function setCouponHeaderNumberFormate($couponHeaderNumberFormate)
    {
        $this->couponHeaderNumberFormate = $couponHeaderNumberFormate;
    
        return $this;
    }

    /**
     * Get couponHeaderNumberFormate
     *
     * @return string 
     */
    public function getCouponHeaderNumberFormate()
    {
        return $this->couponHeaderNumberFormate;
    }

    /**
     * Set couponHeaderCurrencyValue
     *
     * @param integer $couponHeaderCurrencyValue
     *
     * @return mheader
     */
    public function setCouponHeaderCurrencyValue($couponHeaderCurrencyValue)
    {
        $this->couponHeaderCurrencyValue = $couponHeaderCurrencyValue;
    
        return $this;
    }

    /**
     * Get couponHeaderCurrencyValue
     *
     * @return integer
     */
    public function getCouponHeaderCurrencyValue()
    {
        return $this->couponHeaderCurrencyValue;
    }

    /**
     * Set couponHeaderCurrencyCode
     *
     * @param string $couponHeaderCurrencyCode
     *
     * @return mheader
     */
    public function setCouponHeaderCurrencyCode($couponHeaderCurrencyCode)
    {
        $this->couponHeaderCurrencyCode = $couponHeaderCurrencyCode;
    
        return $this;
    }

    /**
     * Get couponHeaderCurrencyCode
     *
     * @return string 
     */
    public function getCouponHeaderCurrencyCode()
    {
        return $this->couponHeaderCurrencyCode;
    }

    /**
     * Set couponHeaderAlignmnet
     *
     * @param string $couponHeaderAlignmnet
     *
     * @return mheader
     */
    public function setCouponHeaderAlignmnet($couponHeaderAlignmnet)
    {
        $this->couponHeaderAlignmnet = $couponHeaderAlignmnet;
    
        return $this;
    }

    /**
     * Get couponHeaderAlignmnet
     *
     * @return string 
     */
    public function getCouponHeaderAlignmnet()
    {
        return $this->couponHeaderAlignmnet;
    }
}

