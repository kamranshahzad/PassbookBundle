<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * mbackfields
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mbackfields
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
     * @ORM\Column(name="coupon_back_field_total_fields", type="integer", nullable=true)
     */
    private $couponBackFieldTotalFields;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_one", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_one", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_one", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_one", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_two", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_two", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_two", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_two", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_three", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_three", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_three", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_three", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_four", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_four", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_four", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_four", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_five", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_five", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_five", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_five", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_six", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_six", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_six", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_six", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_seven", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_seven", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_seven", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_seven", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_eight", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_eight", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_eight", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_eight", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_nine", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_nine", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_nine", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_nine", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_ten", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelTen;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_status_ten", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicStatusTen;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_value_ten", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextValueTen;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_status_ten", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicStatusTen;


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
     * @return mbackfields
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
     * Set couponBackFieldTotalFields
     *
     * @param integer $couponBackFieldTotalFields
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTotalFields($couponBackFieldTotalFields)
    {
        $this->couponBackFieldTotalFields = $couponBackFieldTotalFields;
    
        return $this;
    }

    /**
     * Get couponBackFieldTotalFields
     *
     * @return integer
     */
    public function getCouponBackFieldTotalFields()
    {
        return $this->couponBackFieldTotalFields;
    }

    /**
     * Set couponBackFieldLabelOne
     *
     * @param string $couponBackFieldLabelOne
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelOne($couponBackFieldLabelOne)
    {
        $this->couponBackFieldLabelOne = $couponBackFieldLabelOne;
    
        return $this;
    }

    /**
     * Get couponBackFieldLabelOne
     *
     * @return string 
     */
    public function getCouponBackFieldLabelOne()
    {
        return $this->couponBackFieldLabelOne;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusOne
     *
     * @param string $couponBackFieldLabelDynamicStatusOne
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusOne($couponBackFieldLabelDynamicStatusOne)
    {
        $this->couponBackFieldLabelDynamicStatusOne = $couponBackFieldLabelDynamicStatusOne;
    
        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusOne
     *
     * @return string 
     */
    public function getCouponBackFieldLabelDynamicStatusOne()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusOne;
    }

    /**
     * Set couponBackFieldTextValueOne
     *
     * @param string $couponBackFieldTextValueOne
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueOne($couponBackFieldTextValueOne)
    {
        $this->couponBackFieldTextValueOne = $couponBackFieldTextValueOne;
    
        return $this;
    }

    /**
     * Get couponBackFieldTextValueOne
     *
     * @return string 
     */
    public function getCouponBackFieldTextValueOne()
    {
        return $this->couponBackFieldTextValueOne;
    }

    /**
     * Set couponBackFieldTextDynamicStatusOne
     *
     * @param string $couponBackFieldTextDynamicStatusOne
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusOne($couponBackFieldTextDynamicStatusOne)
    {
        $this->couponBackFieldTextDynamicStatusOne = $couponBackFieldTextDynamicStatusOne;
    
        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusOne
     *
     * @return string 
     */
    public function getCouponBackFieldTextDynamicStatusOne()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusOne;
    }

    /**
     * Set couponBackFieldLabelTwo
     *
     * @param string $couponBackFieldLabelTwo
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelTwo($couponBackFieldLabelTwo)
    {
        $this->couponBackFieldLabelTwo = $couponBackFieldLabelTwo;
    
        return $this;
    }

    /**
     * Get couponBackFieldLabelTwo
     *
     * @return string 
     */
    public function getCouponBackFieldLabelTwo()
    {
        return $this->couponBackFieldLabelTwo;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusTwo
     *
     * @param string $couponBackFieldLabelDynamicStatusTwo
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusTwo($couponBackFieldLabelDynamicStatusTwo)
    {
        $this->couponBackFieldLabelDynamicStatusTwo = $couponBackFieldLabelDynamicStatusTwo;
    
        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusTwo
     *
     * @return string 
     */
    public function getCouponBackFieldLabelDynamicStatusTwo()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusTwo;
    }

    /**
     * Set couponBackFieldTextValueTwo
     *
     * @param string $couponBackFieldTextValueTwo
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueTwo($couponBackFieldTextValueTwo)
    {
        $this->couponBackFieldTextValueTwo = $couponBackFieldTextValueTwo;
    
        return $this;
    }

    /**
     * Get couponBackFieldTextValueTwo
     *
     * @return string 
     */
    public function getCouponBackFieldTextValueTwo()
    {
        return $this->couponBackFieldTextValueTwo;
    }

    /**
     * Set couponBackFieldTextDynamicStatusTwo
     *
     * @param string $couponBackFieldTextDynamicStatusTwo
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusTwo($couponBackFieldTextDynamicStatusTwo)
    {
        $this->couponBackFieldTextDynamicStatusTwo = $couponBackFieldTextDynamicStatusTwo;
    
        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusTwo
     *
     * @return string 
     */
    public function getCouponBackFieldTextDynamicStatusTwo()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusTwo;
    }

    /**
     * Set couponBackFieldLabelThree
     *
     * @param string $couponBackFieldLabelThree
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelThree($couponBackFieldLabelThree)
    {
        $this->couponBackFieldLabelThree = $couponBackFieldLabelThree;
    
        return $this;
    }

    /**
     * Get couponBackFieldLabelThree
     *
     * @return string 
     */
    public function getCouponBackFieldLabelThree()
    {
        return $this->couponBackFieldLabelThree;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusThree
     *
     * @param string $couponBackFieldLabelDynamicStatusThree
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusThree($couponBackFieldLabelDynamicStatusThree)
    {
        $this->couponBackFieldLabelDynamicStatusThree = $couponBackFieldLabelDynamicStatusThree;
    
        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusThree
     *
     * @return string 
     */
    public function getCouponBackFieldLabelDynamicStatusThree()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusThree;
    }

    /**
     * Set couponBackFieldTextValueThree
     *
     * @param string $couponBackFieldTextValueThree
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueThree($couponBackFieldTextValueThree)
    {
        $this->couponBackFieldTextValueThree = $couponBackFieldTextValueThree;
    
        return $this;
    }

    /**
     * Get couponBackFieldTextValueThree
     *
     * @return string 
     */
    public function getCouponBackFieldTextValueThree()
    {
        return $this->couponBackFieldTextValueThree;
    }

    /**
     * Set couponBackFieldTextDynamicStatusThree
     *
     * @param string $couponBackFieldTextDynamicStatusThree
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusThree($couponBackFieldTextDynamicStatusThree)
    {
        $this->couponBackFieldTextDynamicStatusThree = $couponBackFieldTextDynamicStatusThree;
    
        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusThree
     *
     * @return string 
     */
    public function getCouponBackFieldTextDynamicStatusThree()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusThree;
    }

    /**
     * Set couponBackFieldLabelFour
     *
     * @param string $couponBackFieldLabelFour
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelFour($couponBackFieldLabelFour)
    {
        $this->couponBackFieldLabelFour = $couponBackFieldLabelFour;
    
        return $this;
    }

    /**
     * Get couponBackFieldLabelFour
     *
     * @return string 
     */
    public function getCouponBackFieldLabelFour()
    {
        return $this->couponBackFieldLabelFour;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusFour
     *
     * @param string $couponBackFieldLabelDynamicStatusFour
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusFour($couponBackFieldLabelDynamicStatusFour)
    {
        $this->couponBackFieldLabelDynamicStatusFour = $couponBackFieldLabelDynamicStatusFour;
    
        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusFour
     *
     * @return string 
     */
    public function getCouponBackFieldLabelDynamicStatusFour()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusFour;
    }

    /**
     * Set couponBackFieldTextValueFour
     *
     * @param string $couponBackFieldTextValueFour
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueFour($couponBackFieldTextValueFour)
    {
        $this->couponBackFieldTextValueFour = $couponBackFieldTextValueFour;
    
        return $this;
    }

    /**
     * Get couponBackFieldTextValueFour
     *
     * @return string 
     */
    public function getCouponBackFieldTextValueFour()
    {
        return $this->couponBackFieldTextValueFour;
    }

    /**
     * Set couponBackFieldTextDynamicStatusFour
     *
     * @param string $couponBackFieldTextDynamicStatusFour
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusFour($couponBackFieldTextDynamicStatusFour)
    {
        $this->couponBackFieldTextDynamicStatusFour = $couponBackFieldTextDynamicStatusFour;
    
        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusFour
     *
     * @return string 
     */
    public function getCouponBackFieldTextDynamicStatusFour()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusFour;
    }

    /**
     * Set couponBackFieldLabelFive
     *
     * @param string $couponBackFieldLabelFive
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelFive($couponBackFieldLabelFive)
    {
        $this->couponBackFieldLabelFive = $couponBackFieldLabelFive;

        return $this;
    }

    /**
     * Get couponBackFieldLabelFive
     *
     * @return string
     */
    public function getCouponBackFieldLabelFive()
    {
        return $this->couponBackFieldLabelFive;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusFive
     *
     * @param string $couponBackFieldLabelDynamicStatusFive
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusFive($couponBackFieldLabelDynamicStatusFive)
    {
        $this->couponBackFieldLabelDynamicStatusFive = $couponBackFieldLabelDynamicStatusFive;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusFive
     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicStatusFive()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusFive;
    }

    /**
     * Set couponBackFieldTextValueFive
     *
     * @param string $couponBackFieldTextValueFive
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueFive($couponBackFieldTextValueFive)
    {
        $this->couponBackFieldTextValueFive = $couponBackFieldTextValueFive;

        return $this;
    }

    /**
     * Get couponBackFieldTextValueFive
     *
     * @return string
     */
    public function getCouponBackFieldTextValueFive()
    {
        return $this->couponBackFieldTextValueFive;
    }

    /**
     * Set couponBackFieldTextDynamicStatusFive
     *
     * @param string $couponBackFieldTextDynamicStatusFive
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusFive($couponBackFieldTextDynamicStatusFive)
    {
        $this->couponBackFieldTextDynamicStatusFive = $couponBackFieldTextDynamicStatusFive;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusFive
     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicStatusFive()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusFive;
    }

    /**
     * Set couponBackFieldLabelSix
     *
     * @param string $couponBackFieldLabelSix
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelSix($couponBackFieldLabelSix)
    {
        $this->couponBackFieldLabelSix = $couponBackFieldLabelSix;

        return $this;
    }

    /**
     * Get couponBackFieldLabelSix
     *
     * @return string
     */
    public function getCouponBackFieldLabelSix()
    {
        return $this->couponBackFieldLabelSix;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusSix
     *
     * @param string $couponBackFieldLabelDynamicStatusSix
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusSix($couponBackFieldLabelDynamicStatusSix)
    {
        $this->couponBackFieldLabelDynamicStatusSix = $couponBackFieldLabelDynamicStatusSix;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusSix
     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicStatusSix()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusSix;
    }

    /**
     * Set couponBackFieldTextValueSix
     *
     * @param string $couponBackFieldTextValueSix
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueSix($couponBackFieldTextValueSix)
    {
        $this->couponBackFieldTextValueSix = $couponBackFieldTextValueSix;

        return $this;
    }

    /**
     * Get couponBackFieldTextValueSix
     *
     * @return string
     */
    public function getCouponBackFieldTextValueSix()
    {
        return $this->couponBackFieldTextValueSix;
    }

    /**
     * Set couponBackFieldTextDynamicStatusSix
     *
     * @param string $couponBackFieldTextDynamicStatusSix
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusSix($couponBackFieldTextDynamicStatusSix)
    {
        $this->couponBackFieldTextDynamicStatusSix = $couponBackFieldTextDynamicStatusSix;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusSix
     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicStatusSix()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusSix;
    }

    /**
     * Set couponBackFieldLabelSeven
     *
     * @param string $couponBackFieldLabelSeven
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelSeven($couponBackFieldLabelSeven)
    {
        $this->couponBackFieldLabelSeven = $couponBackFieldLabelSeven;

        return $this;
    }

    /**
     * Get couponBackFieldLabelSeven
     *
     * @return string
     */
    public function getCouponBackFieldLabelSeven()
    {
        return $this->couponBackFieldLabelSeven;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusSeven
     *
     * @param string $couponBackFieldLabelDynamicStatusSeven
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusSeven($couponBackFieldLabelDynamicStatusSeven)
    {
        $this->couponBackFieldLabelDynamicStatusSeven = $couponBackFieldLabelDynamicStatusSeven;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusSeven
     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicStatusSeven()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusSeven;
    }

    /**
     * Set couponBackFieldTextValueSeven
     *
     * @param string $couponBackFieldTextValueSeven
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueSeven($couponBackFieldTextValueSeven)
    {
        $this->couponBackFieldTextValueSeven = $couponBackFieldTextValueSeven;

        return $this;
    }

    /**
     * Get couponBackFieldTextValueSeven
     *
     * @return string
     */
    public function getCouponBackFieldTextValueSeven()
    {
        return $this->couponBackFieldTextValueSeven;
    }

    /**
     * Set couponBackFieldTextDynamicStatusSeven
     *
     * @param string $couponBackFieldTextDynamicStatusSeven
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusSeven($couponBackFieldTextDynamicStatusSeven)
    {
        $this->couponBackFieldTextDynamicStatusSeven = $couponBackFieldTextDynamicStatusSeven;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusSeven
     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicStatusSeven()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusSeven;
    }

    /**
     * Set couponBackFieldLabelEight
     *
     * @param string $couponBackFieldLabelEight
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelEight($couponBackFieldLabelEight)
    {
        $this->couponBackFieldLabelEight = $couponBackFieldLabelEight;

        return $this;
    }

    /**
     * Get couponBackFieldLabelEight
     *
     * @return string
     */
    public function getCouponBackFieldLabelEight()
    {
        return $this->couponBackFieldLabelEight;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusEight
     *
     * @param string $couponBackFieldLabelDynamicStatusEight
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusEight($couponBackFieldLabelDynamicStatusEight)
    {
        $this->couponBackFieldLabelDynamicStatusEight = $couponBackFieldLabelDynamicStatusEight;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusEight
     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicStatusEight()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusEight;
    }

    /**
     * Set couponBackFieldTextValueEight
     *
     * @param string $couponBackFieldTextValueEight
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueEight($couponBackFieldTextValueEight)
    {
        $this->couponBackFieldTextValueEight = $couponBackFieldTextValueEight;

        return $this;
    }

    /**
     * Get couponBackFieldTextValueEight
     *
     * @return string
     */
    public function getCouponBackFieldTextValueEight()
    {
        return $this->couponBackFieldTextValueEight;
    }

    /**
     * Set couponBackFieldTextDynamicStatusEight
     *
     * @param string $couponBackFieldTextDynamicStatusEight
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusEight($couponBackFieldTextDynamicStatusEight)
    {
        $this->couponBackFieldTextDynamicStatusEight = $couponBackFieldTextDynamicStatusEight;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusEight
     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicStatusEight()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusEight;
    }

    /**
     * Set couponBackFieldLabelNine
     *
     * @param string $couponBackFieldLabelNine
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelNine($couponBackFieldLabelNine)
    {
        $this->couponBackFieldLabelNine = $couponBackFieldLabelNine;

        return $this;
    }

    /**
     * Get couponBackFieldLabelNine
     *
     * @return string
     */
    public function getCouponBackFieldLabelNine()
    {
        return $this->couponBackFieldLabelNine;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusNine
     *
     * @param string $couponBackFieldLabelDynamicStatusNine
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusNine($couponBackFieldLabelDynamicStatusNine)
    {
        $this->couponBackFieldLabelDynamicStatusNine = $couponBackFieldLabelDynamicStatusNine;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusNine
     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicStatusNine()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusNine;
    }

    /**
     * Set couponBackFieldTextValueNine
     *
     * @param string $couponBackFieldTextValueNine
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueNine($couponBackFieldTextValueNine)
    {
        $this->couponBackFieldTextValueNine = $couponBackFieldTextValueNine;

        return $this;
    }

    /**
     * Get couponBackFieldTextValueNine
     *
     * @return string
     */
    public function getCouponBackFieldTextValueNine()
    {
        return $this->couponBackFieldTextValueNine;
    }

    /**
     * Set couponBackFieldTextDynamicStatusNine
     *
     * @param string $couponBackFieldTextDynamicStatusNine
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusNine($couponBackFieldTextDynamicStatusNine)
    {
        $this->couponBackFieldTextDynamicStatusNine = $couponBackFieldTextDynamicStatusNine;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusNine
     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicStatusNine()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusNine;
    }

    /**
     * Set couponBackFieldLabelTen
     *
     * @param string $couponBackFieldLabelTen
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelTen($couponBackFieldLabelTen)
    {
        $this->couponBackFieldLabelTen = $couponBackFieldLabelTen;

        return $this;
    }

    /**
     * Get couponBackFieldLabelTen
     *
     * @return string
     */
    public function getCouponBackFieldLabelTen()
    {
        return $this->couponBackFieldLabelTen;
    }

    /**
     * Set couponBackFieldLabelDynamicStatusTen
     *
     * @param string $couponBackFieldLabelDynamicStatusTen
     *
     * @return mbackfields
     */
    public function setCouponBackFieldLabelDynamicStatusTen($couponBackFieldLabelDynamicStatusTen)
    {
        $this->couponBackFieldLabelDynamicStatusTen = $couponBackFieldLabelDynamicStatusTen;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicStatusTen
     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicStatusTen()
    {
        return (bool)$this->couponBackFieldLabelDynamicStatusTen;
    }

    /**
     * Set couponBackFieldTextValueTen
     *
     * @param string $couponBackFieldTextValueTen
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextValueTen($couponBackFieldTextValueTen)
    {
        $this->couponBackFieldTextValueTen = $couponBackFieldTextValueTen;

        return $this;
    }

    /**
     * Get couponBackFieldTextValueTen
     *
     * @return string
     */
    public function getCouponBackFieldTextValueTen()
    {
        return $this->couponBackFieldTextValueTen;
    }

    /**
     * Set couponBackFieldTextDynamicStatusTen
     *
     * @param string $couponBackFieldTextDynamicStatusTen
     *
     * @return mbackfields
     */
    public function setCouponBackFieldTextDynamicStatusTen($couponBackFieldTextDynamicStatusTen)
    {
        $this->couponBackFieldTextDynamicStatusTen = $couponBackFieldTextDynamicStatusTen;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicStatusTen
     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicStatusTen()
    {
        return (bool)$this->couponBackFieldTextDynamicStatusTen;
    }
}

