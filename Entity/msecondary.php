<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * msecondary
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class msecondary
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
     * @var integer
     *
     * @ORM\Column(name="coupon_secondary_field_total_fields", type="integer", nullable=true)
     */
    private $couponSecondaryFieldTotalFields;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_one", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldLabelOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_status_one", type="boolean" , nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicStatusOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_type_one", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTypeOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_value_one", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldTextValueOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_status_one", type="boolean" , nullable=true)
     */
    private $couponSecondaryFieldTextDynamicStatusOne;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="coupon_secondary_field_value_date_one", type="datetime" , nullable=true)
     */
    private $couponSecondaryFieldValueDateOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_time_one", type="string", length=100 , nullable=true)
     */
    private $couponSecondaryFieldValueTimeOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_timezone_one", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTimezoneOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_date_formate_one", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueDateFormateOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_time_formate_one", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTimeFormateOne;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_secondary_field_number_value_one",  type="integer", nullable=true)
     */
    private $couponSecondaryFieldNumberValueOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_number_formate_one", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldNumberFormateOne;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_secondary_field_currency_value_one", type="integer" , nullable=true)
     */
    private $couponSecondaryFieldCurrencyValueOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_currency_code_one", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldCurrencyCodeOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_alignmnet_one", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldAlignmnetOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldLabelTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_status_two", type="boolean" , nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicStatusTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_type_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTypeTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_value_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldTextValueTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_status_two", type="boolean" , nullable=true)
     */
    private $couponSecondaryFieldTextDynamicStatusTwo;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="coupon_secondary_field_value_date_two", type="datetime", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueDateTwo;

    /**
     * @var string
     * @ORM\Column(name="coupon_secondary_field_value_time_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTimeTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_timezone_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTimezoneTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_date_formate_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueDateFormateTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_time_formate_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTimeFormateTwo;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_secondary_field_number_value_two",  type="integer", nullable=true)
     */
    private $couponSecondaryFieldNumberValueTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_number_formate_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldNumberFormateTwo;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_secondary_field_currency_value_two", type="integer" , nullable=true)
     */
    private $couponSecondaryFieldCurrencyValueTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_currency_code_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldCurrencyCodeTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_alignmnet_two", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldAlignmnetTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_three", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldLabelThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_status_three", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicStatusThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_type_three", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTypeThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_value_three", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldTextValueThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_status_three", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldTextDynamicStatusThree;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="coupon_secondary_field_value_date_three", type="datetime", nullable=true)
     */
    private $couponSecondaryFieldValueDateThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_time_three", type="string", length=100 , nullable=true)
     */
    private $couponSecondaryFieldValueTimeThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_timezone_three", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTimezoneThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_date_formate_three", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueDateFormateThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_time_formate_three", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTimeFormateThree;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_secondary_field_number_value_three",  type="integer", nullable=true)
     */
    private $couponSecondaryFieldNumberValueThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_number_formate_three", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldNumberFormateThree;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_secondary_field_currency_value_three", type="integer" , nullable=true)
     */
    private $couponSecondaryFieldCurrencyValueThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_currency_code_three", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldCurrencyCodeThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_alignmnet_three", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldAlignmnetThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_four", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldLabelFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_status_four", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicStatusFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_type_four", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTypeFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_value_four", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldTextValueFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_status_four", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldTextDynamicStatusFour;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="coupon_secondary_field_value_date_four", type="datetime" , nullable=true)
     */
    private $couponSecondaryFieldValueDateFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_time_four", type="string", length=100 , nullable=true)
     */
    private $couponSecondaryFieldValueTimeFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_timezone_four", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTimezoneFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_date_formate_four", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueDateFormateFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_value_time_formate_four", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldValueTimeFormateFour;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_secondary_field_number_value_four",  type="integer", nullable=true)
     */
    private $couponSecondaryFieldNumberValueFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_number_formate_four", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldNumberFormateFour;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_secondary_field_currency_value_four", type="integer" , nullable=true)
     */
    private $couponSecondaryFieldCurrencyValueFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_currency_code_four", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldCurrencyCodeFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_alignmnet_four", type="string", length=255 , nullable=true)
     */
    private $couponSecondaryFieldAlignmnetFour;


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
     * @return msecondary
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
     * Set couponSecondaryFieldTotalFields
     *
     * @param integer $couponSecondaryFieldTotalFields
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldTotalFields($couponSecondaryFieldTotalFields)
    {
        $this->couponSecondaryFieldTotalFields = $couponSecondaryFieldTotalFields;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldTotalFields
     *
     * @return integer 
     */
    public function getCouponSecondaryFieldTotalFields()
    {
        return $this->couponSecondaryFieldTotalFields;
    }

    /**
     * Set couponSecondaryFieldLabelOne
     *
     * @param string $couponSecondaryFieldLabelOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldLabelOne($couponSecondaryFieldLabelOne)
    {
        $this->couponSecondaryFieldLabelOne = $couponSecondaryFieldLabelOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldLabelOne()
    {
        return $this->couponSecondaryFieldLabelOne;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicStatusOne
     *
     * @param string $couponSecondaryFieldLabelDynamicStatusOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldLabelDynamicStatusOne($couponSecondaryFieldLabelDynamicStatusOne)
    {
        $this->couponSecondaryFieldLabelDynamicStatusOne = $couponSecondaryFieldLabelDynamicStatusOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicStatusOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldLabelDynamicStatusOne()
    {
        return (bool)$this->couponSecondaryFieldLabelDynamicStatusOne;
    }

    /**
     * Set couponSecondaryFieldValueTypeOne
     *
     * @param string $couponSecondaryFieldValueTypeOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTypeOne($couponSecondaryFieldValueTypeOne)
    {
        $this->couponSecondaryFieldValueTypeOne = $couponSecondaryFieldValueTypeOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTypeOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTypeOne()
    {
        return $this->couponSecondaryFieldValueTypeOne;
    }

    /**
     * Set couponSecondaryFieldTextValueOne
     *
     * @param string $couponSecondaryFieldTextValueOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldTextValueOne($couponSecondaryFieldTextValueOne)
    {
        $this->couponSecondaryFieldTextValueOne = $couponSecondaryFieldTextValueOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldTextValueOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldTextValueOne()
    {
        return $this->couponSecondaryFieldTextValueOne;
    }

    /**
     * Set couponSecondaryFieldTextDynamicStatusOne
     *
     * @param string $couponSecondaryFieldTextDynamicStatusOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldTextDynamicStatusOne($couponSecondaryFieldTextDynamicStatusOne)
    {
        $this->couponSecondaryFieldTextDynamicStatusOne = $couponSecondaryFieldTextDynamicStatusOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicStatusOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldTextDynamicStatusOne()
    {
        return (bool)$this->couponSecondaryFieldTextDynamicStatusOne;
    }

    /**
     * Set couponSecondaryFieldValueDateOne
     *
     * @param \Date $couponSecondaryFieldValueDateOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueDateOne($couponSecondaryFieldValueDateOne)
    {
        $this->couponSecondaryFieldValueDateOne = $couponSecondaryFieldValueDateOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueDateOne
     *
     * @return \Date
     */
    public function getCouponSecondaryFieldValueDateOne()
    {
        return $this->couponSecondaryFieldValueDateOne;
    }

    /**
     * Set couponSecondaryFieldValueTimeOne
     *
     * @param \Time $couponSecondaryFieldValueTimeOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimeOne($couponSecondaryFieldValueTimeOne)
    {
        $this->couponSecondaryFieldValueTimeOne = $couponSecondaryFieldValueTimeOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimeOne
     *
     * @return \Time
     */
    public function getCouponSecondaryFieldValueTimeOne()
    {
        return $this->couponSecondaryFieldValueTimeOne;
    }

    /**
     * Set couponSecondaryFieldValueTimezoneOne
     *
     * @param string $couponSecondaryFieldValueTimezoneOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimezoneOne($couponSecondaryFieldValueTimezoneOne)
    {
        $this->couponSecondaryFieldValueTimezoneOne = $couponSecondaryFieldValueTimezoneOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimezoneOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTimezoneOne()
    {
        return $this->couponSecondaryFieldValueTimezoneOne;
    }

    /**
     * Set couponSecondaryFieldValueDateFormateOne
     *
     * @param string $couponSecondaryFieldValueDateFormateOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueDateFormateOne($couponSecondaryFieldValueDateFormateOne)
    {
        $this->couponSecondaryFieldValueDateFormateOne = $couponSecondaryFieldValueDateFormateOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueDateFormateOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueDateFormateOne()
    {
        return $this->couponSecondaryFieldValueDateFormateOne;
    }

    /**
     * Set couponSecondaryFieldValueTimeFormateOne
     *
     * @param string $couponSecondaryFieldValueTimeFormateOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimeFormateOne($couponSecondaryFieldValueTimeFormateOne)
    {
        $this->couponSecondaryFieldValueTimeFormateOne = $couponSecondaryFieldValueTimeFormateOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimeFormateOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTimeFormateOne()
    {
        return $this->couponSecondaryFieldValueTimeFormateOne;
    }

    /**
     * Set couponSecondaryFieldNumberValueOne
     *
     * @param integer $couponSecondaryFieldNumberValueOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldNumberValueOne($couponSecondaryFieldNumberValueOne)
    {
        $this->couponSecondaryFieldNumberValueOne = $couponSecondaryFieldNumberValueOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldNumberValueOne
     *
     * @return integer
     */
    public function getCouponSecondaryFieldNumberValueOne()
    {
        return $this->couponSecondaryFieldNumberValueOne;
    }

    /**
     * Set couponSecondaryFieldNumberFormateOne
     *
     * @param string $couponSecondaryFieldNumberFormateOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldNumberFormateOne($couponSecondaryFieldNumberFormateOne)
    {
        $this->couponSecondaryFieldNumberFormateOne = $couponSecondaryFieldNumberFormateOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldNumberFormateOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldNumberFormateOne()
    {
        return $this->couponSecondaryFieldNumberFormateOne;
    }

    /**
     * Set couponSecondaryFieldCurrencyValueOne
     *
     * @param integer $couponSecondaryFieldCurrencyValueOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldCurrencyValueOne($couponSecondaryFieldCurrencyValueOne)
    {
        $this->couponSecondaryFieldCurrencyValueOne = $couponSecondaryFieldCurrencyValueOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldCurrencyValueOne
     *
     * @return integer
     */
    public function getCouponSecondaryFieldCurrencyValueOne()
    {
        return $this->couponSecondaryFieldCurrencyValueOne;
    }

    /**
     * Set couponSecondaryFieldCurrencyCodeOne
     *
     * @param string $couponSecondaryFieldCurrencyCodeOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldCurrencyCodeOne($couponSecondaryFieldCurrencyCodeOne)
    {
        $this->couponSecondaryFieldCurrencyCodeOne = $couponSecondaryFieldCurrencyCodeOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldCurrencyCodeOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldCurrencyCodeOne()
    {
        return $this->couponSecondaryFieldCurrencyCodeOne;
    }

    /**
     * Set couponSecondaryFieldAlignmnetOne
     *
     * @param string $couponSecondaryFieldAlignmnetOne
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldAlignmnetOne($couponSecondaryFieldAlignmnetOne)
    {
        $this->couponSecondaryFieldAlignmnetOne = $couponSecondaryFieldAlignmnetOne;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldAlignmnetOne
     *
     * @return string 
     */
    public function getCouponSecondaryFieldAlignmnetOne()
    {
        return $this->couponSecondaryFieldAlignmnetOne;
    }

    /**
     * Set couponSecondaryFieldLabelTwo
     *
     * @param string $couponSecondaryFieldLabelTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldLabelTwo($couponSecondaryFieldLabelTwo)
    {
        $this->couponSecondaryFieldLabelTwo = $couponSecondaryFieldLabelTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldLabelTwo()
    {
        return $this->couponSecondaryFieldLabelTwo;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicStatusTwo
     *
     * @param string $couponSecondaryFieldLabelDynamicStatusTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldLabelDynamicStatusTwo($couponSecondaryFieldLabelDynamicStatusTwo)
    {
        $this->couponSecondaryFieldLabelDynamicStatusTwo = $couponSecondaryFieldLabelDynamicStatusTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicStatusTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldLabelDynamicStatusTwo()
    {
        return (bool)$this->couponSecondaryFieldLabelDynamicStatusTwo;
    }

    /**
     * Set couponSecondaryFieldValueTypeTwo
     *
     * @param string $couponSecondaryFieldValueTypeTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTypeTwo($couponSecondaryFieldValueTypeTwo)
    {
        $this->couponSecondaryFieldValueTypeTwo = $couponSecondaryFieldValueTypeTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTypeTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTypeTwo()
    {
        return $this->couponSecondaryFieldValueTypeTwo;
    }

    /**
     * Set couponSecondaryFieldTextValueTwo
     *
     * @param string $couponSecondaryFieldTextValueTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldTextValueTwo($couponSecondaryFieldTextValueTwo)
    {
        $this->couponSecondaryFieldTextValueTwo = $couponSecondaryFieldTextValueTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldTextValueTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldTextValueTwo()
    {
        return $this->couponSecondaryFieldTextValueTwo;
    }

    /**
     * Set couponSecondaryFieldTextDynamicStatusTwo
     *
     * @param string $couponSecondaryFieldTextDynamicStatusTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldTextDynamicStatusTwo($couponSecondaryFieldTextDynamicStatusTwo)
    {
        $this->couponSecondaryFieldTextDynamicStatusTwo = $couponSecondaryFieldTextDynamicStatusTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicStatusTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldTextDynamicStatusTwo()
    {
        return (bool)$this->couponSecondaryFieldTextDynamicStatusTwo;
    }

    /**
     * Set couponSecondaryFieldValueDateTwo
     *
     * @param \Date $couponSecondaryFieldValueDateTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueDateTwo($couponSecondaryFieldValueDateTwo)
    {
        $this->couponSecondaryFieldValueDateTwo = $couponSecondaryFieldValueDateTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueDateTwo
     *
     * @return \Date
     */
    public function getCouponSecondaryFieldValueDateTwo()
    {
        return $this->couponSecondaryFieldValueDateTwo;
    }

    /**
     * Set couponSecondaryFieldValueTimeTwo
     *
     * @param \Time $couponSecondaryFieldValueTimeTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimeTwo($couponSecondaryFieldValueTimeTwo)
    {
        $this->couponSecondaryFieldValueTimeTwo = $couponSecondaryFieldValueTimeTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimeTwo
     *
     * @return \Time
     */
    public function getCouponSecondaryFieldValueTimeTwo()
    {
        return $this->couponSecondaryFieldValueTimeTwo;
    }

    /**
     * Set couponSecondaryFieldValueTimezoneTwo
     *
     * @param string $couponSecondaryFieldValueTimezoneTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimezoneTwo($couponSecondaryFieldValueTimezoneTwo)
    {
        $this->couponSecondaryFieldValueTimezoneTwo = $couponSecondaryFieldValueTimezoneTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimezoneTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTimezoneTwo()
    {
        return $this->couponSecondaryFieldValueTimezoneTwo;
    }

    /**
     * Set couponSecondaryFieldValueDateFormateTwo
     *
     * @param string $couponSecondaryFieldValueDateFormateTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueDateFormateTwo($couponSecondaryFieldValueDateFormateTwo)
    {
        $this->couponSecondaryFieldValueDateFormateTwo = $couponSecondaryFieldValueDateFormateTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueDateFormateTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueDateFormateTwo()
    {
        return $this->couponSecondaryFieldValueDateFormateTwo;
    }

    /**
     * Set couponSecondaryFieldValueTimeFormateTwo
     *
     * @param string $couponSecondaryFieldValueTimeFormateTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimeFormateTwo($couponSecondaryFieldValueTimeFormateTwo)
    {
        $this->couponSecondaryFieldValueTimeFormateTwo = $couponSecondaryFieldValueTimeFormateTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimeFormateTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTimeFormateTwo()
    {
        return $this->couponSecondaryFieldValueTimeFormateTwo;
    }

    /**
     * Set couponSecondaryFieldNumberValueTwo
     *
     * @param integer $couponSecondaryFieldNumberValueTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldNumberValueTwo($couponSecondaryFieldNumberValueTwo)
    {
        $this->couponSecondaryFieldNumberValueTwo = $couponSecondaryFieldNumberValueTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldNumberValueTwo
     *
     * @return integer
     */
    public function getCouponSecondaryFieldNumberValueTwo()
    {
        return $this->couponSecondaryFieldNumberValueTwo;
    }

    /**
     * Set couponSecondaryFieldNumberFormateTwo
     *
     * @param string $couponSecondaryFieldNumberFormateTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldNumberFormateTwo($couponSecondaryFieldNumberFormateTwo)
    {
        $this->couponSecondaryFieldNumberFormateTwo = $couponSecondaryFieldNumberFormateTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldNumberFormateTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldNumberFormateTwo()
    {
        return $this->couponSecondaryFieldNumberFormateTwo;
    }

    /**
     * Set couponSecondaryFieldCurrencyValueTwo
     *
     * @param integer $couponSecondaryFieldCurrencyValueTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldCurrencyValueTwo($couponSecondaryFieldCurrencyValueTwo)
    {
        $this->couponSecondaryFieldCurrencyValueTwo = $couponSecondaryFieldCurrencyValueTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldCurrencyValueTwo
     *
     * @return integer
     */
    public function getCouponSecondaryFieldCurrencyValueTwo()
    {
        return $this->couponSecondaryFieldCurrencyValueTwo;
    }

    /**
     * Set couponSecondaryFieldCurrencyCodeTwo
     *
     * @param string $couponSecondaryFieldCurrencyCodeTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldCurrencyCodeTwo($couponSecondaryFieldCurrencyCodeTwo)
    {
        $this->couponSecondaryFieldCurrencyCodeTwo = $couponSecondaryFieldCurrencyCodeTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldCurrencyCodeTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldCurrencyCodeTwo()
    {
        return $this->couponSecondaryFieldCurrencyCodeTwo;
    }

    /**
     * Set couponSecondaryFieldAlignmnetTwo
     *
     * @param string $couponSecondaryFieldAlignmnetTwo
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldAlignmnetTwo($couponSecondaryFieldAlignmnetTwo)
    {
        $this->couponSecondaryFieldAlignmnetTwo = $couponSecondaryFieldAlignmnetTwo;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldAlignmnetTwo
     *
     * @return string 
     */
    public function getCouponSecondaryFieldAlignmnetTwo()
    {
        return $this->couponSecondaryFieldAlignmnetTwo;
    }

    /**
     * Set couponSecondaryFieldLabelThree
     *
     * @param string $couponSecondaryFieldLabelThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldLabelThree($couponSecondaryFieldLabelThree)
    {
        $this->couponSecondaryFieldLabelThree = $couponSecondaryFieldLabelThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldLabelThree()
    {
        return $this->couponSecondaryFieldLabelThree;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicStatusThree
     *
     * @param string $couponSecondaryFieldLabelDynamicStatusThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldLabelDynamicStatusThree($couponSecondaryFieldLabelDynamicStatusThree)
    {
        $this->couponSecondaryFieldLabelDynamicStatusThree = $couponSecondaryFieldLabelDynamicStatusThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicStatusThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldLabelDynamicStatusThree()
    {
        return (bool)$this->couponSecondaryFieldLabelDynamicStatusThree;
    }

    /**
     * Set couponSecondaryFieldValueTypeThree
     *
     * @param string $couponSecondaryFieldValueTypeThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTypeThree($couponSecondaryFieldValueTypeThree)
    {
        $this->couponSecondaryFieldValueTypeThree = $couponSecondaryFieldValueTypeThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTypeThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTypeThree()
    {
        return $this->couponSecondaryFieldValueTypeThree;
    }

    /**
     * Set couponSecondaryFieldTextValueThree
     *
     * @param string $couponSecondaryFieldTextValueThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldTextValueThree($couponSecondaryFieldTextValueThree)
    {
        $this->couponSecondaryFieldTextValueThree = $couponSecondaryFieldTextValueThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldTextValueThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldTextValueThree()
    {
        return $this->couponSecondaryFieldTextValueThree;
    }

    /**
     * Set couponSecondaryFieldTextDynamicStatusThree
     *
     * @param string $couponSecondaryFieldTextDynamicStatusThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldTextDynamicStatusThree($couponSecondaryFieldTextDynamicStatusThree)
    {
        $this->couponSecondaryFieldTextDynamicStatusThree = $couponSecondaryFieldTextDynamicStatusThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicStatusThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldTextDynamicStatusThree()
    {
        return (bool)$this->couponSecondaryFieldTextDynamicStatusThree;
    }

    /**
     * Set couponSecondaryFieldValueDateThree
     *
     * @param \Date $couponSecondaryFieldValueDateThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueDateThree($couponSecondaryFieldValueDateThree)
    {
        $this->couponSecondaryFieldValueDateThree = $couponSecondaryFieldValueDateThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueDateThree
     *
     * @return \Date
     */
    public function getCouponSecondaryFieldValueDateThree()
    {
        return $this->couponSecondaryFieldValueDateThree;
    }

    /**
     * Set couponSecondaryFieldValueTimeThree
     *
     * @param \Time $couponSecondaryFieldValueTimeThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimeThree($couponSecondaryFieldValueTimeThree)
    {
        $this->couponSecondaryFieldValueTimeThree = $couponSecondaryFieldValueTimeThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimeThree
     *
     * @return \Time
     */
    public function getCouponSecondaryFieldValueTimeThree()
    {
        return $this->couponSecondaryFieldValueTimeThree;
    }

    /**
     * Set couponSecondaryFieldValueTimezoneThree
     *
     * @param string $couponSecondaryFieldValueTimezoneThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimezoneThree($couponSecondaryFieldValueTimezoneThree)
    {
        $this->couponSecondaryFieldValueTimezoneThree = $couponSecondaryFieldValueTimezoneThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimezoneThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTimezoneThree()
    {
        return $this->couponSecondaryFieldValueTimezoneThree;
    }

    /**
     * Set couponSecondaryFieldValueDateFormateThree
     *
     * @param string $couponSecondaryFieldValueDateFormateThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueDateFormateThree($couponSecondaryFieldValueDateFormateThree)
    {
        $this->couponSecondaryFieldValueDateFormateThree = $couponSecondaryFieldValueDateFormateThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueDateFormateThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueDateFormateThree()
    {
        return $this->couponSecondaryFieldValueDateFormateThree;
    }

    /**
     * Set couponSecondaryFieldValueTimeFormateThree
     *
     * @param string $couponSecondaryFieldValueTimeFormateThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimeFormateThree($couponSecondaryFieldValueTimeFormateThree)
    {
        $this->couponSecondaryFieldValueTimeFormateThree = $couponSecondaryFieldValueTimeFormateThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimeFormateThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTimeFormateThree()
    {
        return $this->couponSecondaryFieldValueTimeFormateThree;
    }

    /**
     * Set couponSecondaryFieldNumberValueThree
     *
     * @param integer $couponSecondaryFieldNumberValueThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldNumberValueThree($couponSecondaryFieldNumberValueThree)
    {
        $this->couponSecondaryFieldNumberValueThree = $couponSecondaryFieldNumberValueThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldNumberValueThree
     *
     * @return integer
     */
    public function getCouponSecondaryFieldNumberValueThree()
    {
        return $this->couponSecondaryFieldNumberValueThree;
    }

    /**
     * Set couponSecondaryFieldNumberFormateThree
     *
     * @param string $couponSecondaryFieldNumberFormateThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldNumberFormateThree($couponSecondaryFieldNumberFormateThree)
    {
        $this->couponSecondaryFieldNumberFormateThree = $couponSecondaryFieldNumberFormateThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldNumberFormateThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldNumberFormateThree()
    {
        return $this->couponSecondaryFieldNumberFormateThree;
    }

    /**
     * Set couponSecondaryFieldCurrencyValueThree
     *
     * @param integer $couponSecondaryFieldCurrencyValueThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldCurrencyValueThree($couponSecondaryFieldCurrencyValueThree)
    {
        $this->couponSecondaryFieldCurrencyValueThree = $couponSecondaryFieldCurrencyValueThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldCurrencyValueThree
     *
     * @return integer
     */
    public function getCouponSecondaryFieldCurrencyValueThree()
    {
        return $this->couponSecondaryFieldCurrencyValueThree;
    }

    /**
     * Set couponSecondaryFieldCurrencyCodeThree
     *
     * @param string $couponSecondaryFieldCurrencyCodeThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldCurrencyCodeThree($couponSecondaryFieldCurrencyCodeThree)
    {
        $this->couponSecondaryFieldCurrencyCodeThree = $couponSecondaryFieldCurrencyCodeThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldCurrencyCodeThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldCurrencyCodeThree()
    {
        return $this->couponSecondaryFieldCurrencyCodeThree;
    }

    /**
     * Set couponSecondaryFieldAlignmnetThree
     *
     * @param string $couponSecondaryFieldAlignmnetThree
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldAlignmnetThree($couponSecondaryFieldAlignmnetThree)
    {
        $this->couponSecondaryFieldAlignmnetThree = $couponSecondaryFieldAlignmnetThree;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldAlignmnetThree
     *
     * @return string 
     */
    public function getCouponSecondaryFieldAlignmnetThree()
    {
        return $this->couponSecondaryFieldAlignmnetThree;
    }

    /**
     * Set couponSecondaryFieldLabelFour
     *
     * @param string $couponSecondaryFieldLabelFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldLabelFour($couponSecondaryFieldLabelFour)
    {
        $this->couponSecondaryFieldLabelFour = $couponSecondaryFieldLabelFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldLabelFour()
    {
        return $this->couponSecondaryFieldLabelFour;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicStatusFour
     *
     * @param string $couponSecondaryFieldLabelDynamicStatusFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldLabelDynamicStatusFour($couponSecondaryFieldLabelDynamicStatusFour)
    {
        $this->couponSecondaryFieldLabelDynamicStatusFour = $couponSecondaryFieldLabelDynamicStatusFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicStatusFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldLabelDynamicStatusFour()
    {
        return (bool)$this->couponSecondaryFieldLabelDynamicStatusFour;
    }

    /**
     * Set couponSecondaryFieldValueTypeFour
     *
     * @param string $couponSecondaryFieldValueTypeFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTypeFour($couponSecondaryFieldValueTypeFour)
    {
        $this->couponSecondaryFieldValueTypeFour = $couponSecondaryFieldValueTypeFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTypeFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTypeFour()
    {
        return $this->couponSecondaryFieldValueTypeFour;
    }

    /**
     * Set couponSecondaryFieldTextValueFour
     *
     * @param string $couponSecondaryFieldTextValueFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldTextValueFour($couponSecondaryFieldTextValueFour)
    {
        $this->couponSecondaryFieldTextValueFour = $couponSecondaryFieldTextValueFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldTextValueFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldTextValueFour()
    {
        return $this->couponSecondaryFieldTextValueFour;
    }

    /**
     * Set couponSecondaryFieldTextDynamicStatusFour
     *
     * @param string $couponSecondaryFieldTextDynamicStatusFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldTextDynamicStatusFour($couponSecondaryFieldTextDynamicStatusFour)
    {
        $this->couponSecondaryFieldTextDynamicStatusFour = $couponSecondaryFieldTextDynamicStatusFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicStatusFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldTextDynamicStatusFour()
    {
        return (bool)$this->couponSecondaryFieldTextDynamicStatusFour;
    }

    /**
     * Set couponSecondaryFieldValueDateFour
     *
     * @param \Date $couponSecondaryFieldValueDateFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueDateFour($couponSecondaryFieldValueDateFour)
    {
        $this->couponSecondaryFieldValueDateFour = $couponSecondaryFieldValueDateFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueDateFour
     *
     * @return \Date
     */
    public function getCouponSecondaryFieldValueDateFour()
    {
        return $this->couponSecondaryFieldValueDateFour;
    }

    /**
     * Set couponSecondaryFieldValueTimeFour
     *
     * @param \Time $couponSecondaryFieldValueTimeFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimeFour($couponSecondaryFieldValueTimeFour)
    {
        $this->couponSecondaryFieldValueTimeFour = $couponSecondaryFieldValueTimeFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimeFour
     *
     * @return \Time
     */
    public function getCouponSecondaryFieldValueTimeFour()
    {
        return $this->couponSecondaryFieldValueTimeFour;
    }

    /**
     * Set couponSecondaryFieldValueTimezoneFour
     *
     * @param string $couponSecondaryFieldValueTimezoneFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimezoneFour($couponSecondaryFieldValueTimezoneFour)
    {
        $this->couponSecondaryFieldValueTimezoneFour = $couponSecondaryFieldValueTimezoneFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimezoneFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTimezoneFour()
    {
        return $this->couponSecondaryFieldValueTimezoneFour;
    }

    /**
     * Set couponSecondaryFieldValueDateFormateFour
     *
     * @param string $couponSecondaryFieldValueDateFormateFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueDateFormateFour($couponSecondaryFieldValueDateFormateFour)
    {
        $this->couponSecondaryFieldValueDateFormateFour = $couponSecondaryFieldValueDateFormateFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueDateFormateFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueDateFormateFour()
    {
        return $this->couponSecondaryFieldValueDateFormateFour;
    }

    /**
     * Set couponSecondaryFieldValueTimeFormateFour
     *
     * @param string $couponSecondaryFieldValueTimeFormateFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldValueTimeFormateFour($couponSecondaryFieldValueTimeFormateFour)
    {
        $this->couponSecondaryFieldValueTimeFormateFour = $couponSecondaryFieldValueTimeFormateFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldValueTimeFormateFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldValueTimeFormateFour()
    {
        return $this->couponSecondaryFieldValueTimeFormateFour;
    }

    /**
     * Set couponSecondaryFieldNumberValueFour
     *
     * @param integer $couponSecondaryFieldNumberValueFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldNumberValueFour($couponSecondaryFieldNumberValueFour)
    {
        $this->couponSecondaryFieldNumberValueFour = $couponSecondaryFieldNumberValueFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldNumberValueFour
     *
     * @return integer
     */
    public function getCouponSecondaryFieldNumberValueFour()
    {
        return $this->couponSecondaryFieldNumberValueFour;
    }

    /**
     * Set couponSecondaryFieldNumberFormateFour
     *
     * @param string $couponSecondaryFieldNumberFormateFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldNumberFormateFour($couponSecondaryFieldNumberFormateFour)
    {
        $this->couponSecondaryFieldNumberFormateFour = $couponSecondaryFieldNumberFormateFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldNumberFormateFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldNumberFormateFour()
    {
        return $this->couponSecondaryFieldNumberFormateFour;
    }

    /**
     * Set couponSecondaryFieldCurrencyValueFour
     *
     * @param integer $couponSecondaryFieldCurrencyValueFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldCurrencyValueFour($couponSecondaryFieldCurrencyValueFour)
    {
        $this->couponSecondaryFieldCurrencyValueFour = $couponSecondaryFieldCurrencyValueFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldCurrencyValueFour
     *
     * @return integer
     */
    public function getCouponSecondaryFieldCurrencyValueFour()
    {
        return $this->couponSecondaryFieldCurrencyValueFour;
    }

    /**
     * Set couponSecondaryFieldCurrencyCodeFour
     *
     * @param string $couponSecondaryFieldCurrencyCodeFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldCurrencyCodeFour($couponSecondaryFieldCurrencyCodeFour)
    {
        $this->couponSecondaryFieldCurrencyCodeFour = $couponSecondaryFieldCurrencyCodeFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldCurrencyCodeFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldCurrencyCodeFour()
    {
        return $this->couponSecondaryFieldCurrencyCodeFour;
    }

    /**
     * Set couponSecondaryFieldAlignmnetFour
     *
     * @param string $couponSecondaryFieldAlignmnetFour
     *
     * @return msecondary
     */
    public function setCouponSecondaryFieldAlignmnetFour($couponSecondaryFieldAlignmnetFour)
    {
        $this->couponSecondaryFieldAlignmnetFour = $couponSecondaryFieldAlignmnetFour;
    
        return $this;
    }

    /**
     * Get couponSecondaryFieldAlignmnetFour
     *
     * @return string 
     */
    public function getCouponSecondaryFieldAlignmnetFour()
    {
        return $this->couponSecondaryFieldAlignmnetFour;
    }
}

