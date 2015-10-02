<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * mauxiliary
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mauxiliary
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
     * @ORM\Column(name="coupon_auxiliary_field_total_fields", type="integer", nullable=true)
     */
    private $couponAuxiliaryFieldTotalFields;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldLabelOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_status_one", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicStatusOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_type_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTypeOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_value_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldTextValueOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_status_one", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicStatusOne;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_date_one", type="datetime", nullable=true)
     */
    private $couponAuxiliaryFieldValueDateOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_time_one", type="string", length=100, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimeOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_timezone_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimezoneOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_date_formate_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueDateFormateOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_time_formate_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimeFormateOne;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_auxiliary_field_number_value_one", type="integer", nullable=true)
     */
    private $couponAuxiliaryFieldNumberValueOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_number_formate_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldNumberFormateOne;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_auxiliary_field_currency_value_one", type="integer", nullable=true)
     */
    private $couponAuxiliaryFieldCurrencyValueOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_currency_code_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldCurrencyCodeOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_alignmnet_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldAlignmnetOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldLabelTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_status_two", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicStatusTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_type_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTypeTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_value_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldTextValueTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_status_two", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicStatusTwo;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_date_two", type="datetime", nullable=true)
     */
    private $couponAuxiliaryFieldValueDateTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_time_two", type="string", length=100, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimeTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_timezone_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimezoneTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_date_formate_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueDateFormateTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_time_formate_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimeFormateTwo;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_auxiliary_field_number_value_two", type="integer", nullable=true)
     */
    private $couponAuxiliaryFieldNumberValueTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_number_formate_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldNumberFormateTwo;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_auxiliary_field_currency_value_two", type="integer", nullable=true)
     */
    private $couponAuxiliaryFieldCurrencyValueTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_currency_code_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldCurrencyCodeTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_alignmnet_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldAlignmnetTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldLabelThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_status_three", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicStatusThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_type_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTypeThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_value_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldTextValueThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_status_three", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicStatusThree;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_date_three", type="datetime", nullable=true)
     */
    private $couponAuxiliaryFieldValueDateThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_time_three", type="string", length=100, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimeThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_timezone_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimezoneThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_date_formate_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueDateFormateThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_time_formate_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimeFormateThree;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_auxiliary_field_number_value_three", type="integer", nullable=true)
     */
    private $couponAuxiliaryFieldNumberValueThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_number_formate_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldNumberFormateThree;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_auxiliary_field_currency_value_three", type="integer", nullable=true)
     */
    private $couponAuxiliaryFieldCurrencyValueThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_currency_code_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldCurrencyCodeThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_alignmnet_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldAlignmnetThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldLabelFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_status_four", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicStatusFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_type_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTypeFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_value_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldTextValueFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_status_four", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicStatusFour;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_date_four", type="datetime", nullable=true)
     */
    private $couponAuxiliaryFieldValueDateFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_time_four", type="string", length=100, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimeFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_timezone_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimezoneFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_date_formate_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueDateFormateFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_value_time_formate_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldValueTimeFormateFour;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_auxiliary_field_number_value_four", type="integer", nullable=true)
     */
    private $couponAuxiliaryFieldNumberValueFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_number_formate_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldNumberFormateFour;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_auxiliary_field_currency_value_four", type="integer", nullable=true)
     */
    private $couponAuxiliaryFieldCurrencyValueFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_currency_code_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldCurrencyCodeFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_alignmnet_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldAlignmnetFour;


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
     * @return mauxiliary
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
     * Set couponAuxiliaryFieldTotalFields
     *
     * @param integer $couponAuxiliaryFieldTotalFields
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldTotalFields($couponAuxiliaryFieldTotalFields)
    {
        $this->couponAuxiliaryFieldTotalFields = $couponAuxiliaryFieldTotalFields;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTotalFields
     *
     * @return integer 
     */
    public function getCouponAuxiliaryFieldTotalFields()
    {
        return $this->couponAuxiliaryFieldTotalFields;
    }

    /**
     * Set couponAuxiliaryFieldLabelOne
     *
     * @param string $couponAuxiliaryFieldLabelOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldLabelOne($couponAuxiliaryFieldLabelOne)
    {
        $this->couponAuxiliaryFieldLabelOne = $couponAuxiliaryFieldLabelOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldLabelOne()
    {
        return $this->couponAuxiliaryFieldLabelOne;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicStatusOne
     *
     * @param string $couponAuxiliaryFieldLabelDynamicStatusOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldLabelDynamicStatusOne($couponAuxiliaryFieldLabelDynamicStatusOne)
    {
        $this->couponAuxiliaryFieldLabelDynamicStatusOne = $couponAuxiliaryFieldLabelDynamicStatusOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicStatusOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldLabelDynamicStatusOne()
    {
        return (bool)$this->couponAuxiliaryFieldLabelDynamicStatusOne;
    }

    /**
     * Set couponAuxiliaryFieldValueTypeOne
     *
     * @param string $couponAuxiliaryFieldValueTypeOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTypeOne($couponAuxiliaryFieldValueTypeOne)
    {
        $this->couponAuxiliaryFieldValueTypeOne = $couponAuxiliaryFieldValueTypeOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTypeOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTypeOne()
    {
        return $this->couponAuxiliaryFieldValueTypeOne;
    }

    /**
     * Set couponAuxiliaryFieldTextValueOne
     *
     * @param string $couponAuxiliaryFieldTextValueOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldTextValueOne($couponAuxiliaryFieldTextValueOne)
    {
        $this->couponAuxiliaryFieldTextValueOne = $couponAuxiliaryFieldTextValueOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextValueOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldTextValueOne()
    {
        return $this->couponAuxiliaryFieldTextValueOne;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicStatusOne
     *
     * @param string $couponAuxiliaryFieldTextDynamicStatusOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldTextDynamicStatusOne($couponAuxiliaryFieldTextDynamicStatusOne)
    {
        $this->couponAuxiliaryFieldTextDynamicStatusOne = $couponAuxiliaryFieldTextDynamicStatusOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicStatusOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldTextDynamicStatusOne()
    {
        return (bool)$this->couponAuxiliaryFieldTextDynamicStatusOne;
    }

    /**
     * Set couponAuxiliaryFieldValueDateOne
     *
     * @param \Date $couponAuxiliaryFieldValueDateOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueDateOne($couponAuxiliaryFieldValueDateOne)
    {
        $this->couponAuxiliaryFieldValueDateOne = $couponAuxiliaryFieldValueDateOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueDateOne
     *
     * @return \Date
     */
    public function getCouponAuxiliaryFieldValueDateOne()
    {
        return $this->couponAuxiliaryFieldValueDateOne;
    }

    /**
     * Set couponAuxiliaryFieldValueTimeOne
     *
     * @param \Time $couponAuxiliaryFieldValueTimeOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimeOne($couponAuxiliaryFieldValueTimeOne)
    {
        $this->couponAuxiliaryFieldValueTimeOne = $couponAuxiliaryFieldValueTimeOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimeOne
     *
     * @return \Time
     */
    public function getCouponAuxiliaryFieldValueTimeOne()
    {
        return $this->couponAuxiliaryFieldValueTimeOne;
    }

    /**
     * Set couponAuxiliaryFieldValueTimezoneOne
     *
     * @param string $couponAuxiliaryFieldValueTimezoneOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimezoneOne($couponAuxiliaryFieldValueTimezoneOne)
    {
        $this->couponAuxiliaryFieldValueTimezoneOne = $couponAuxiliaryFieldValueTimezoneOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimezoneOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTimezoneOne()
    {
        return $this->couponAuxiliaryFieldValueTimezoneOne;
    }

    /**
     * Set couponAuxiliaryFieldValueDateFormateOne
     *
     * @param string $couponAuxiliaryFieldValueDateFormateOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueDateFormateOne($couponAuxiliaryFieldValueDateFormateOne)
    {
        $this->couponAuxiliaryFieldValueDateFormateOne = $couponAuxiliaryFieldValueDateFormateOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueDateFormateOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueDateFormateOne()
    {
        return $this->couponAuxiliaryFieldValueDateFormateOne;
    }

    /**
     * Set couponAuxiliaryFieldValueTimeFormateOne
     *
     * @param string $couponAuxiliaryFieldValueTimeFormateOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimeFormateOne($couponAuxiliaryFieldValueTimeFormateOne)
    {
        $this->couponAuxiliaryFieldValueTimeFormateOne = $couponAuxiliaryFieldValueTimeFormateOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimeFormateOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTimeFormateOne()
    {
        return $this->couponAuxiliaryFieldValueTimeFormateOne;
    }

    /**
     * Set couponAuxiliaryFieldNumberValueOne
     *
     * @param integer $couponAuxiliaryFieldNumberValueOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldNumberValueOne($couponAuxiliaryFieldNumberValueOne)
    {
        $this->couponAuxiliaryFieldNumberValueOne = $couponAuxiliaryFieldNumberValueOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldNumberValueOne
     *
     * @return integer
     */
    public function getCouponAuxiliaryFieldNumberValueOne()
    {
        return $this->couponAuxiliaryFieldNumberValueOne;
    }

    /**
     * Set couponAuxiliaryFieldNumberFormateOne
     *
     * @param string $couponAuxiliaryFieldNumberFormateOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldNumberFormateOne($couponAuxiliaryFieldNumberFormateOne)
    {
        $this->couponAuxiliaryFieldNumberFormateOne = $couponAuxiliaryFieldNumberFormateOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldNumberFormateOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldNumberFormateOne()
    {
        return $this->couponAuxiliaryFieldNumberFormateOne;
    }

    /**
     * Set couponAuxiliaryFieldCurrencyValueOne
     *
     * @param integer $couponAuxiliaryFieldCurrencyValueOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldCurrencyValueOne($couponAuxiliaryFieldCurrencyValueOne)
    {
        $this->couponAuxiliaryFieldCurrencyValueOne = $couponAuxiliaryFieldCurrencyValueOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldCurrencyValueOne
     *
     * @return integer
     */
    public function getCouponAuxiliaryFieldCurrencyValueOne()
    {
        return $this->couponAuxiliaryFieldCurrencyValueOne;
    }

    /**
     * Set couponAuxiliaryFieldCurrencyCodeOne
     *
     * @param string $couponAuxiliaryFieldCurrencyCodeOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldCurrencyCodeOne($couponAuxiliaryFieldCurrencyCodeOne)
    {
        $this->couponAuxiliaryFieldCurrencyCodeOne = $couponAuxiliaryFieldCurrencyCodeOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldCurrencyCodeOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldCurrencyCodeOne()
    {
        return $this->couponAuxiliaryFieldCurrencyCodeOne;
    }

    /**
     * Set couponAuxiliaryFieldAlignmnetOne
     *
     * @param string $couponAuxiliaryFieldAlignmnetOne
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldAlignmnetOne($couponAuxiliaryFieldAlignmnetOne)
    {
        $this->couponAuxiliaryFieldAlignmnetOne = $couponAuxiliaryFieldAlignmnetOne;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldAlignmnetOne
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldAlignmnetOne()
    {
        return $this->couponAuxiliaryFieldAlignmnetOne;
    }

    /**
     * Set couponAuxiliaryFieldLabelTwo
     *
     * @param string $couponAuxiliaryFieldLabelTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldLabelTwo($couponAuxiliaryFieldLabelTwo)
    {
        $this->couponAuxiliaryFieldLabelTwo = $couponAuxiliaryFieldLabelTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldLabelTwo()
    {
        return $this->couponAuxiliaryFieldLabelTwo;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicStatusTwo
     *
     * @param string $couponAuxiliaryFieldLabelDynamicStatusTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldLabelDynamicStatusTwo($couponAuxiliaryFieldLabelDynamicStatusTwo)
    {
        $this->couponAuxiliaryFieldLabelDynamicStatusTwo = $couponAuxiliaryFieldLabelDynamicStatusTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicStatusTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldLabelDynamicStatusTwo()
    {
        return (bool)$this->couponAuxiliaryFieldLabelDynamicStatusTwo;
    }

    /**
     * Set couponAuxiliaryFieldValueTypeTwo
     *
     * @param string $couponAuxiliaryFieldValueTypeTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTypeTwo($couponAuxiliaryFieldValueTypeTwo)
    {
        $this->couponAuxiliaryFieldValueTypeTwo = $couponAuxiliaryFieldValueTypeTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTypeTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTypeTwo()
    {
        return $this->couponAuxiliaryFieldValueTypeTwo;
    }

    /**
     * Set couponAuxiliaryFieldTextValueTwo
     *
     * @param string $couponAuxiliaryFieldTextValueTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldTextValueTwo($couponAuxiliaryFieldTextValueTwo)
    {
        $this->couponAuxiliaryFieldTextValueTwo = $couponAuxiliaryFieldTextValueTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextValueTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldTextValueTwo()
    {
        return $this->couponAuxiliaryFieldTextValueTwo;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicStatusTwo
     *
     * @param string $couponAuxiliaryFieldTextDynamicStatusTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldTextDynamicStatusTwo($couponAuxiliaryFieldTextDynamicStatusTwo)
    {
        $this->couponAuxiliaryFieldTextDynamicStatusTwo = $couponAuxiliaryFieldTextDynamicStatusTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicStatusTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldTextDynamicStatusTwo()
    {
        return (bool)$this->couponAuxiliaryFieldTextDynamicStatusTwo;
    }

    /**
     * Set couponAuxiliaryFieldValueDateTwo
     *
     * @param \Date $couponAuxiliaryFieldValueDateTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueDateTwo($couponAuxiliaryFieldValueDateTwo)
    {
        $this->couponAuxiliaryFieldValueDateTwo = $couponAuxiliaryFieldValueDateTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueDateTwo
     *
     * @return \Date
     */
    public function getCouponAuxiliaryFieldValueDateTwo()
    {
        return $this->couponAuxiliaryFieldValueDateTwo;
    }

    /**
     * Set couponAuxiliaryFieldValueTimeTwo
     *
     * @param \Time $couponAuxiliaryFieldValueTimeTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimeTwo($couponAuxiliaryFieldValueTimeTwo)
    {
        $this->couponAuxiliaryFieldValueTimeTwo = $couponAuxiliaryFieldValueTimeTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimeTwo
     *
     * @return \Time
     */
    public function getCouponAuxiliaryFieldValueTimeTwo()
    {
        return $this->couponAuxiliaryFieldValueTimeTwo;
    }

    /**
     * Set couponAuxiliaryFieldValueTimezoneTwo
     *
     * @param string $couponAuxiliaryFieldValueTimezoneTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimezoneTwo($couponAuxiliaryFieldValueTimezoneTwo)
    {
        $this->couponAuxiliaryFieldValueTimezoneTwo = $couponAuxiliaryFieldValueTimezoneTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimezoneTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTimezoneTwo()
    {
        return $this->couponAuxiliaryFieldValueTimezoneTwo;
    }

    /**
     * Set couponAuxiliaryFieldValueDateFormateTwo
     *
     * @param string $couponAuxiliaryFieldValueDateFormateTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueDateFormateTwo($couponAuxiliaryFieldValueDateFormateTwo)
    {
        $this->couponAuxiliaryFieldValueDateFormateTwo = $couponAuxiliaryFieldValueDateFormateTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueDateFormateTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueDateFormateTwo()
    {
        return $this->couponAuxiliaryFieldValueDateFormateTwo;
    }

    /**
     * Set couponAuxiliaryFieldValueTimeFormateTwo
     *
     * @param string $couponAuxiliaryFieldValueTimeFormateTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimeFormateTwo($couponAuxiliaryFieldValueTimeFormateTwo)
    {
        $this->couponAuxiliaryFieldValueTimeFormateTwo = $couponAuxiliaryFieldValueTimeFormateTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimeFormateTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTimeFormateTwo()
    {
        return $this->couponAuxiliaryFieldValueTimeFormateTwo;
    }

    /**
     * Set couponAuxiliaryFieldNumberValueTwo
     *
     * @param integer $couponAuxiliaryFieldNumberValueTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldNumberValueTwo($couponAuxiliaryFieldNumberValueTwo)
    {
        $this->couponAuxiliaryFieldNumberValueTwo = $couponAuxiliaryFieldNumberValueTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldNumberValueTwo
     *
     * @return integer
     */
    public function getCouponAuxiliaryFieldNumberValueTwo()
    {
        return $this->couponAuxiliaryFieldNumberValueTwo;
    }

    /**
     * Set couponAuxiliaryFieldNumberFormateTwo
     *
     * @param string $couponAuxiliaryFieldNumberFormateTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldNumberFormateTwo($couponAuxiliaryFieldNumberFormateTwo)
    {
        $this->couponAuxiliaryFieldNumberFormateTwo = $couponAuxiliaryFieldNumberFormateTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldNumberFormateTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldNumberFormateTwo()
    {
        return $this->couponAuxiliaryFieldNumberFormateTwo;
    }

    /**
     * Set couponAuxiliaryFieldCurrencyValueTwo
     *
     * @param integer $couponAuxiliaryFieldCurrencyValueTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldCurrencyValueTwo($couponAuxiliaryFieldCurrencyValueTwo)
    {
        $this->couponAuxiliaryFieldCurrencyValueTwo = $couponAuxiliaryFieldCurrencyValueTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldCurrencyValueTwo
     *
     * @return integer
     */
    public function getCouponAuxiliaryFieldCurrencyValueTwo()
    {
        return $this->couponAuxiliaryFieldCurrencyValueTwo;
    }

    /**
     * Set couponAuxiliaryFieldCurrencyCodeTwo
     *
     * @param string $couponAuxiliaryFieldCurrencyCodeTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldCurrencyCodeTwo($couponAuxiliaryFieldCurrencyCodeTwo)
    {
        $this->couponAuxiliaryFieldCurrencyCodeTwo = $couponAuxiliaryFieldCurrencyCodeTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldCurrencyCodeTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldCurrencyCodeTwo()
    {
        return $this->couponAuxiliaryFieldCurrencyCodeTwo;
    }

    /**
     * Set couponAuxiliaryFieldAlignmnetTwo
     *
     * @param string $couponAuxiliaryFieldAlignmnetTwo
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldAlignmnetTwo($couponAuxiliaryFieldAlignmnetTwo)
    {
        $this->couponAuxiliaryFieldAlignmnetTwo = $couponAuxiliaryFieldAlignmnetTwo;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldAlignmnetTwo
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldAlignmnetTwo()
    {
        return $this->couponAuxiliaryFieldAlignmnetTwo;
    }

    /**
     * Set couponAuxiliaryFieldLabelThree
     *
     * @param string $couponAuxiliaryFieldLabelThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldLabelThree($couponAuxiliaryFieldLabelThree)
    {
        $this->couponAuxiliaryFieldLabelThree = $couponAuxiliaryFieldLabelThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldLabelThree()
    {
        return $this->couponAuxiliaryFieldLabelThree;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicStatusThree
     *
     * @param string $couponAuxiliaryFieldLabelDynamicStatusThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldLabelDynamicStatusThree($couponAuxiliaryFieldLabelDynamicStatusThree)
    {
        $this->couponAuxiliaryFieldLabelDynamicStatusThree = $couponAuxiliaryFieldLabelDynamicStatusThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicStatusThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldLabelDynamicStatusThree()
    {
        return (bool)$this->couponAuxiliaryFieldLabelDynamicStatusThree;
    }

    /**
     * Set couponAuxiliaryFieldValueTypeThree
     *
     * @param string $couponAuxiliaryFieldValueTypeThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTypeThree($couponAuxiliaryFieldValueTypeThree)
    {
        $this->couponAuxiliaryFieldValueTypeThree = $couponAuxiliaryFieldValueTypeThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTypeThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTypeThree()
    {
        return $this->couponAuxiliaryFieldValueTypeThree;
    }

    /**
     * Set couponAuxiliaryFieldTextValueThree
     *
     * @param string $couponAuxiliaryFieldTextValueThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldTextValueThree($couponAuxiliaryFieldTextValueThree)
    {
        $this->couponAuxiliaryFieldTextValueThree = $couponAuxiliaryFieldTextValueThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextValueThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldTextValueThree()
    {
        return $this->couponAuxiliaryFieldTextValueThree;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicStatusThree
     *
     * @param string $couponAuxiliaryFieldTextDynamicStatusThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldTextDynamicStatusThree($couponAuxiliaryFieldTextDynamicStatusThree)
    {
        $this->couponAuxiliaryFieldTextDynamicStatusThree = $couponAuxiliaryFieldTextDynamicStatusThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicStatusThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldTextDynamicStatusThree()
    {
        return (bool)$this->couponAuxiliaryFieldTextDynamicStatusThree;
    }

    /**
     * Set couponAuxiliaryFieldValueDateThree
     *
     * @param \Date $couponAuxiliaryFieldValueDateThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueDateThree($couponAuxiliaryFieldValueDateThree)
    {
        $this->couponAuxiliaryFieldValueDateThree = $couponAuxiliaryFieldValueDateThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueDateThree
     *
     * @return \Date
     */
    public function getCouponAuxiliaryFieldValueDateThree()
    {
        return $this->couponAuxiliaryFieldValueDateThree;
    }

    /**
     * Set couponAuxiliaryFieldValueTimeThree
     *
     * @param \Time $couponAuxiliaryFieldValueTimeThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimeThree($couponAuxiliaryFieldValueTimeThree)
    {
        $this->couponAuxiliaryFieldValueTimeThree = $couponAuxiliaryFieldValueTimeThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimeThree
     *
     * @return \Time
     */
    public function getCouponAuxiliaryFieldValueTimeThree()
    {
        return $this->couponAuxiliaryFieldValueTimeThree;
    }

    /**
     * Set couponAuxiliaryFieldValueTimezoneThree
     *
     * @param string $couponAuxiliaryFieldValueTimezoneThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimezoneThree($couponAuxiliaryFieldValueTimezoneThree)
    {
        $this->couponAuxiliaryFieldValueTimezoneThree = $couponAuxiliaryFieldValueTimezoneThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimezoneThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTimezoneThree()
    {
        return $this->couponAuxiliaryFieldValueTimezoneThree;
    }

    /**
     * Set couponAuxiliaryFieldValueDateFormateThree
     *
     * @param string $couponAuxiliaryFieldValueDateFormateThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueDateFormateThree($couponAuxiliaryFieldValueDateFormateThree)
    {
        $this->couponAuxiliaryFieldValueDateFormateThree = $couponAuxiliaryFieldValueDateFormateThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueDateFormateThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueDateFormateThree()
    {
        return $this->couponAuxiliaryFieldValueDateFormateThree;
    }

    /**
     * Set couponAuxiliaryFieldValueTimeFormateThree
     *
     * @param string $couponAuxiliaryFieldValueTimeFormateThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimeFormateThree($couponAuxiliaryFieldValueTimeFormateThree)
    {
        $this->couponAuxiliaryFieldValueTimeFormateThree = $couponAuxiliaryFieldValueTimeFormateThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimeFormateThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTimeFormateThree()
    {
        return $this->couponAuxiliaryFieldValueTimeFormateThree;
    }

    /**
     * Set couponAuxiliaryFieldNumberValueThree
     *
     * @param integer $couponAuxiliaryFieldNumberValueThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldNumberValueThree($couponAuxiliaryFieldNumberValueThree)
    {
        $this->couponAuxiliaryFieldNumberValueThree = $couponAuxiliaryFieldNumberValueThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldNumberValueThree
     *
     * @return integer
     */
    public function getCouponAuxiliaryFieldNumberValueThree()
    {
        return $this->couponAuxiliaryFieldNumberValueThree;
    }

    /**
     * Set couponAuxiliaryFieldNumberFormateThree
     *
     * @param string $couponAuxiliaryFieldNumberFormateThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldNumberFormateThree($couponAuxiliaryFieldNumberFormateThree)
    {
        $this->couponAuxiliaryFieldNumberFormateThree = $couponAuxiliaryFieldNumberFormateThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldNumberFormateThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldNumberFormateThree()
    {
        return $this->couponAuxiliaryFieldNumberFormateThree;
    }

    /**
     * Set couponAuxiliaryFieldCurrencyValueThree
     *
     * @param integer $couponAuxiliaryFieldCurrencyValueThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldCurrencyValueThree($couponAuxiliaryFieldCurrencyValueThree)
    {
        $this->couponAuxiliaryFieldCurrencyValueThree = $couponAuxiliaryFieldCurrencyValueThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldCurrencyValueThree
     *
     * @return integer
     */
    public function getCouponAuxiliaryFieldCurrencyValueThree()
    {
        return $this->couponAuxiliaryFieldCurrencyValueThree;
    }

    /**
     * Set couponAuxiliaryFieldCurrencyCodeThree
     *
     * @param string $couponAuxiliaryFieldCurrencyCodeThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldCurrencyCodeThree($couponAuxiliaryFieldCurrencyCodeThree)
    {
        $this->couponAuxiliaryFieldCurrencyCodeThree = $couponAuxiliaryFieldCurrencyCodeThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldCurrencyCodeThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldCurrencyCodeThree()
    {
        return $this->couponAuxiliaryFieldCurrencyCodeThree;
    }

    /**
     * Set couponAuxiliaryFieldAlignmnetThree
     *
     * @param string $couponAuxiliaryFieldAlignmnetThree
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldAlignmnetThree($couponAuxiliaryFieldAlignmnetThree)
    {
        $this->couponAuxiliaryFieldAlignmnetThree = $couponAuxiliaryFieldAlignmnetThree;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldAlignmnetThree
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldAlignmnetThree()
    {
        return $this->couponAuxiliaryFieldAlignmnetThree;
    }

    /**
     * Set couponAuxiliaryFieldLabelFour
     *
     * @param string $couponAuxiliaryFieldLabelFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldLabelFour($couponAuxiliaryFieldLabelFour)
    {
        $this->couponAuxiliaryFieldLabelFour = $couponAuxiliaryFieldLabelFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldLabelFour()
    {
        return $this->couponAuxiliaryFieldLabelFour;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicStatusFour
     *
     * @param string $couponAuxiliaryFieldLabelDynamicStatusFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldLabelDynamicStatusFour($couponAuxiliaryFieldLabelDynamicStatusFour)
    {
        $this->couponAuxiliaryFieldLabelDynamicStatusFour = $couponAuxiliaryFieldLabelDynamicStatusFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicStatusFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldLabelDynamicStatusFour()
    {
        return (bool)$this->couponAuxiliaryFieldLabelDynamicStatusFour;
    }

    /**
     * Set couponAuxiliaryFieldValueTypeFour
     *
     * @param string $couponAuxiliaryFieldValueTypeFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTypeFour($couponAuxiliaryFieldValueTypeFour)
    {
        $this->couponAuxiliaryFieldValueTypeFour = $couponAuxiliaryFieldValueTypeFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTypeFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTypeFour()
    {
        return $this->couponAuxiliaryFieldValueTypeFour;
    }

    /**
     * Set couponAuxiliaryFieldTextValueFour
     *
     * @param string $couponAuxiliaryFieldTextValueFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldTextValueFour($couponAuxiliaryFieldTextValueFour)
    {
        $this->couponAuxiliaryFieldTextValueFour = $couponAuxiliaryFieldTextValueFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextValueFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldTextValueFour()
    {
        return $this->couponAuxiliaryFieldTextValueFour;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicStatusFour
     *
     * @param string $couponAuxiliaryFieldTextDynamicStatusFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldTextDynamicStatusFour($couponAuxiliaryFieldTextDynamicStatusFour)
    {
        $this->couponAuxiliaryFieldTextDynamicStatusFour = $couponAuxiliaryFieldTextDynamicStatusFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicStatusFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldTextDynamicStatusFour()
    {
        return (bool)$this->couponAuxiliaryFieldTextDynamicStatusFour;
    }

    /**
     * Set couponAuxiliaryFieldValueDateFour
     *
     * @param \Date $couponAuxiliaryFieldValueDateFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueDateFour($couponAuxiliaryFieldValueDateFour)
    {
        $this->couponAuxiliaryFieldValueDateFour = $couponAuxiliaryFieldValueDateFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueDateFour
     *
     * @return \Date
     */
    public function getCouponAuxiliaryFieldValueDateFour()
    {
        return $this->couponAuxiliaryFieldValueDateFour;
    }

    /**
     * Set couponAuxiliaryFieldValueTimeFour
     *
     * @param \Time $couponAuxiliaryFieldValueTimeFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimeFour($couponAuxiliaryFieldValueTimeFour)
    {
        $this->couponAuxiliaryFieldValueTimeFour = $couponAuxiliaryFieldValueTimeFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimeFour
     *
     * @return \Time
     */
    public function getCouponAuxiliaryFieldValueTimeFour()
    {
        return $this->couponAuxiliaryFieldValueTimeFour;
    }

    /**
     * Set couponAuxiliaryFieldValueTimezoneFour
     *
     * @param string $couponAuxiliaryFieldValueTimezoneFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimezoneFour($couponAuxiliaryFieldValueTimezoneFour)
    {
        $this->couponAuxiliaryFieldValueTimezoneFour = $couponAuxiliaryFieldValueTimezoneFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimezoneFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTimezoneFour()
    {
        return $this->couponAuxiliaryFieldValueTimezoneFour;
    }

    /**
     * Set couponAuxiliaryFieldValueDateFormateFour
     *
     * @param string $couponAuxiliaryFieldValueDateFormateFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueDateFormateFour($couponAuxiliaryFieldValueDateFormateFour)
    {
        $this->couponAuxiliaryFieldValueDateFormateFour = $couponAuxiliaryFieldValueDateFormateFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueDateFormateFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueDateFormateFour()
    {
        return $this->couponAuxiliaryFieldValueDateFormateFour;
    }

    /**
     * Set couponAuxiliaryFieldValueTimeFormateFour
     *
     * @param string $couponAuxiliaryFieldValueTimeFormateFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldValueTimeFormateFour($couponAuxiliaryFieldValueTimeFormateFour)
    {
        $this->couponAuxiliaryFieldValueTimeFormateFour = $couponAuxiliaryFieldValueTimeFormateFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldValueTimeFormateFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldValueTimeFormateFour()
    {
        return $this->couponAuxiliaryFieldValueTimeFormateFour;
    }

    /**
     * Set couponAuxiliaryFieldNumberValueFour
     *
     * @param integer $couponAuxiliaryFieldNumberValueFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldNumberValueFour($couponAuxiliaryFieldNumberValueFour)
    {
        $this->couponAuxiliaryFieldNumberValueFour = $couponAuxiliaryFieldNumberValueFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldNumberValueFour
     *
     * @return integer
     */
    public function getCouponAuxiliaryFieldNumberValueFour()
    {
        return $this->couponAuxiliaryFieldNumberValueFour;
    }

    /**
     * Set couponAuxiliaryFieldNumberFormateFour
     *
     * @param string $couponAuxiliaryFieldNumberFormateFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldNumberFormateFour($couponAuxiliaryFieldNumberFormateFour)
    {
        $this->couponAuxiliaryFieldNumberFormateFour = $couponAuxiliaryFieldNumberFormateFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldNumberFormateFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldNumberFormateFour()
    {
        return $this->couponAuxiliaryFieldNumberFormateFour;
    }

    /**
     * Set couponAuxiliaryFieldCurrencyValueFour
     *
     * @param integer $couponAuxiliaryFieldCurrencyValueFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldCurrencyValueFour($couponAuxiliaryFieldCurrencyValueFour)
    {
        $this->couponAuxiliaryFieldCurrencyValueFour = $couponAuxiliaryFieldCurrencyValueFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldCurrencyValueFour
     *
     * @return integer
     */
    public function getCouponAuxiliaryFieldCurrencyValueFour()
    {
        return $this->couponAuxiliaryFieldCurrencyValueFour;
    }

    /**
     * Set couponAuxiliaryFieldCurrencyCodeFour
     *
     * @param string $couponAuxiliaryFieldCurrencyCodeFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldCurrencyCodeFour($couponAuxiliaryFieldCurrencyCodeFour)
    {
        $this->couponAuxiliaryFieldCurrencyCodeFour = $couponAuxiliaryFieldCurrencyCodeFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldCurrencyCodeFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldCurrencyCodeFour()
    {
        return $this->couponAuxiliaryFieldCurrencyCodeFour;
    }

    /**
     * Set couponAuxiliaryFieldAlignmnetFour
     *
     * @param string $couponAuxiliaryFieldAlignmnetFour
     *
     * @return mauxiliary
     */
    public function setCouponAuxiliaryFieldAlignmnetFour($couponAuxiliaryFieldAlignmnetFour)
    {
        $this->couponAuxiliaryFieldAlignmnetFour = $couponAuxiliaryFieldAlignmnetFour;
    
        return $this;
    }

    /**
     * Get couponAuxiliaryFieldAlignmnetFour
     *
     * @return string 
     */
    public function getCouponAuxiliaryFieldAlignmnetFour()
    {
        return $this->couponAuxiliaryFieldAlignmnetFour;
    }
}

