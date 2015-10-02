<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * mprimary
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mprimary
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
     * @ORM\Column(name="coupon_primary_field_label", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_label_dynamic_status", type="boolean", nullable=true)
     */
    private $couponPrimaryFieldLabelDynamicStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_value_type", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldValueType;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_text_value", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldTextValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_text_dynamic_status", type="boolean", nullable=true)
     */
    private $couponPrimaryFieldTextDynamicStatus;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     * @ORM\Column(name="coupon_primary_field_value_date", type="datetime", nullable=true)
     */
    private $couponPrimaryFieldValueDate;

    /**
     * @var string
     * @ORM\Column(name="coupon_primary_field_value_time", type="string", length=100, nullable=true)
     */
    private $couponPrimaryFieldValueTime;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_value_timezone", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldValueTimezone;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_value_date_formate", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldValueDateFormate;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_value_time_formate", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldValueTimeFormate;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_primary_field_number_value", type="integer", nullable=true)
     */
    private $couponPrimaryFieldNumberValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_number_formate", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldNumberFormate;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_primary_field_currency_value", type="integer", nullable=true)
     */
    private $couponPrimaryFieldCurrencyValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_currency_code", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldCurrencyCode;


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
     * @return mprimary
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
     * Set couponPrimaryFieldLabel
     *
     * @param string $couponPrimaryFieldLabel
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldLabel($couponPrimaryFieldLabel)
    {
        $this->couponPrimaryFieldLabel = $couponPrimaryFieldLabel;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldLabel
     *
     * @return string 
     */
    public function getCouponPrimaryFieldLabel()
    {
        return $this->couponPrimaryFieldLabel;
    }

    /**
     * Set couponPrimaryFieldLabelDynamicStatus
     *
     * @param string $couponPrimaryFieldLabelDynamicStatus
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldLabelDynamicStatus($couponPrimaryFieldLabelDynamicStatus)
    {
        $this->couponPrimaryFieldLabelDynamicStatus = $couponPrimaryFieldLabelDynamicStatus;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldLabelDynamicStatus
     *
     * @return string 
     */
    public function getCouponPrimaryFieldLabelDynamicStatus()
    {
        return (bool)$this->couponPrimaryFieldLabelDynamicStatus;
    }

    /**
     * Set couponPrimaryFieldValueType
     *
     * @param string $couponPrimaryFieldValueType
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldValueType($couponPrimaryFieldValueType)
    {
        $this->couponPrimaryFieldValueType = $couponPrimaryFieldValueType;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldValueType
     *
     * @return string 
     */
    public function getCouponPrimaryFieldValueType()
    {
        return $this->couponPrimaryFieldValueType;
    }

    /**
     * Set couponPrimaryFieldTextValue
     *
     * @param string $couponPrimaryFieldTextValue
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldTextValue($couponPrimaryFieldTextValue)
    {
        $this->couponPrimaryFieldTextValue = $couponPrimaryFieldTextValue;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldTextValue
     *
     * @return string 
     */
    public function getCouponPrimaryFieldTextValue()
    {
        return $this->couponPrimaryFieldTextValue;
    }

    /**
     * Set couponPrimaryFieldTextDynamicStatus
     *
     * @param string $couponPrimaryFieldTextDynamicStatus
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldTextDynamicStatus($couponPrimaryFieldTextDynamicStatus)
    {
        $this->couponPrimaryFieldTextDynamicStatus = $couponPrimaryFieldTextDynamicStatus;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldTextDynamicStatus
     *
     * @return string 
     */
    public function getCouponPrimaryFieldTextDynamicStatus()
    {
        return (bool)$this->couponPrimaryFieldTextDynamicStatus;
    }

    /**
     * Set couponPrimaryFieldValueDate
     *
     * @param \Date $couponPrimaryFieldValueDate
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldValueDate($couponPrimaryFieldValueDate)
    {
        $this->couponPrimaryFieldValueDate = $couponPrimaryFieldValueDate;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldValueDate
     *
     * @return \Date
     */
    public function getCouponPrimaryFieldValueDate()
    {
        return $this->couponPrimaryFieldValueDate;
    }

    /**
     * Set couponPrimaryFieldValueTime
     *
     * @param string $couponPrimaryFieldValueTime
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldValueTime($couponPrimaryFieldValueTime)
    {
        $this->couponPrimaryFieldValueTime = $couponPrimaryFieldValueTime;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldValueTime
     *
     * @return string 
     */
    public function getCouponPrimaryFieldValueTime()
    {
        return $this->couponPrimaryFieldValueTime;
    }

    /**
     * Set couponPrimaryFieldValueTimezone
     *
     * @param string $couponPrimaryFieldValueTimezone
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldValueTimezone($couponPrimaryFieldValueTimezone)
    {
        $this->couponPrimaryFieldValueTimezone = $couponPrimaryFieldValueTimezone;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldValueTimezone
     *
     * @return string 
     */
    public function getCouponPrimaryFieldValueTimezone()
    {
        return $this->couponPrimaryFieldValueTimezone;
    }

    /**
     * Set couponPrimaryFieldValueDateFormate
     *
     * @param string $couponPrimaryFieldValueDateFormate
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldValueDateFormate($couponPrimaryFieldValueDateFormate)
    {
        $this->couponPrimaryFieldValueDateFormate = $couponPrimaryFieldValueDateFormate;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldValueDateFormate
     *
     * @return string 
     */
    public function getCouponPrimaryFieldValueDateFormate()
    {
        return $this->couponPrimaryFieldValueDateFormate;
    }

    /**
     * Set couponPrimaryFieldValueTimeFormate
     *
     * @param string $couponPrimaryFieldValueTimeFormate
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldValueTimeFormate($couponPrimaryFieldValueTimeFormate)
    {
        $this->couponPrimaryFieldValueTimeFormate = $couponPrimaryFieldValueTimeFormate;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldValueTimeFormate
     *
     * @return string 
     */
    public function getCouponPrimaryFieldValueTimeFormate()
    {
        return $this->couponPrimaryFieldValueTimeFormate;
    }

    /**
     * Set couponPrimaryFieldNumberValue
     *
     * @param integer $couponPrimaryFieldNumberValue
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldNumberValue($couponPrimaryFieldNumberValue)
    {
        $this->couponPrimaryFieldNumberValue = $couponPrimaryFieldNumberValue;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldNumberValue
     *
     * @return integer
     */
    public function getCouponPrimaryFieldNumberValue()
    {
        return $this->couponPrimaryFieldNumberValue;
    }

    /**
     * Set couponPrimaryFieldNumberFormate
     *
     * @param string $couponPrimaryFieldNumberFormate
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldNumberFormate($couponPrimaryFieldNumberFormate)
    {
        $this->couponPrimaryFieldNumberFormate = $couponPrimaryFieldNumberFormate;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldNumberFormate
     *
     * @return string 
     */
    public function getCouponPrimaryFieldNumberFormate()
    {
        return $this->couponPrimaryFieldNumberFormate;
    }

    /**
     * Set couponPrimaryFieldCurrencyValue
     *
     * @param integer $couponPrimaryFieldCurrencyValue
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldCurrencyValue($couponPrimaryFieldCurrencyValue)
    {
        $this->couponPrimaryFieldCurrencyValue = $couponPrimaryFieldCurrencyValue;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldCurrencyValue
     *
     * @return integer
     */
    public function getCouponPrimaryFieldCurrencyValue()
    {
        return $this->couponPrimaryFieldCurrencyValue;
    }

    /**
     * Set couponPrimaryFieldCurrencyCode
     *
     * @param string $couponPrimaryFieldCurrencyCode
     *
     * @return mprimary
     */
    public function setCouponPrimaryFieldCurrencyCode($couponPrimaryFieldCurrencyCode)
    {
        $this->couponPrimaryFieldCurrencyCode = $couponPrimaryFieldCurrencyCode;
    
        return $this;
    }

    /**
     * Get couponPrimaryFieldCurrencyCode
     *
     * @return string 
     */
    public function getCouponPrimaryFieldCurrencyCode()
    {
        return $this->couponPrimaryFieldCurrencyCode;
    }
}

