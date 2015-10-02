<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * mrelevance
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mrelevance
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
     * @ORM\Column(name="coupon_relevance_location_total_fields", type="integer", nullable=true)
     */
    private $couponRelevanceLocationTotalFields;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_one", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_one_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressOneLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_one_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressOneLongitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_one", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_one", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_two", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_two_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressTwoLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_two_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressTwoLongitude;


    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_two", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_two", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_three", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_three_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressThreeLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_three_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressThreeLongitude;


    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_three", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_three", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_four", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_four_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressFourLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_four_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressFourLongitude;


    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_four", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_four", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_five", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_five_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressFiveLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_five_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressFiveLongitude;


    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_five", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_five", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_six", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_six_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressSixLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_six_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressSixLongitude;


    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_six", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_six", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_seven", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_seven_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressSevenLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_seven_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressSevenLongitude;


    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_seven", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_seven", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_eight", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_eight_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressEightLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_eight_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressEightLongitude;


    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_eight", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_eight", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_nine", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_nine_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressNineLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_nine_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressNineLongitude;


    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_nine", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_nine", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_ten", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressTen;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_ten_latitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressTenLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_ten_longitude", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressTenLongitude;


    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_ten", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextTen;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_status_ten", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationTextDynamicStatusTen;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="coupon_relevance_location_date", type="datetime", nullable=true)
     */
    private $couponRelevanceLocationDate;

    /**
     * @var string
     * @ORM\Column(name="coupon_relevance_location_time", type="string", length=100, nullable=true)
     */
    private $couponRelevanceLocationTime;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_timezone", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTimezone;


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
     * @return mrelevance
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
     * Set couponRelevanceLocationTotalFields
     *
     * @param integer $couponRelevanceLocationTotalFields
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTotalFields($couponRelevanceLocationTotalFields)
    {
        $this->couponRelevanceLocationTotalFields = $couponRelevanceLocationTotalFields;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTotalFields
     *
     * @return integer 
     */
    public function getCouponRelevanceLocationTotalFields()
    {
        return $this->couponRelevanceLocationTotalFields;
    }

    /**
     * Set couponRelevanceLocationAddressOne
     *
     * @param string $couponRelevanceLocationAddressOne
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressOne($couponRelevanceLocationAddressOne)
    {
        $this->couponRelevanceLocationAddressOne = $couponRelevanceLocationAddressOne;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressOne
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressOne()
    {
        return $this->couponRelevanceLocationAddressOne;
    }


    /**
     * Set couponRelevanceLocationAddressOneLatitude
     *
     * @param string $couponRelevanceLocationAddressOneLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressOneLatitude($couponRelevanceLocationAddressOneLatitude)
    {
        $this->couponRelevanceLocationAddressOneLatitude = $couponRelevanceLocationAddressOneLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressOneLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressOneLatitude()
    {
        return $this->couponRelevanceLocationAddressOneLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressOneLongitude
     *
     * @param string $couponRelevanceLocationAddressOneLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressOneLongitude($couponRelevanceLocationAddressOneLongitude)
    {
        $this->couponRelevanceLocationAddressOneLongitude = $couponRelevanceLocationAddressOneLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressOneLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressOneLongitude()
    {
        return $this->couponRelevanceLocationAddressOneLongitude;
    }


    /**
     * Set couponRelevanceLocationTextOne
     *
     * @param string $couponRelevanceLocationTextOne
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextOne($couponRelevanceLocationTextOne)
    {
        $this->couponRelevanceLocationTextOne = $couponRelevanceLocationTextOne;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextOne
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextOne()
    {
        return $this->couponRelevanceLocationTextOne;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusOne
     *
     * @param string $couponRelevanceLocationTextDynamicStatusOne
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusOne($couponRelevanceLocationTextDynamicStatusOne)
    {
        $this->couponRelevanceLocationTextDynamicStatusOne = $couponRelevanceLocationTextDynamicStatusOne;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusOne
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusOne()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusOne;
    }

    /**
     * Set couponRelevanceLocationAddressTwo
     *
     * @param string $couponRelevanceLocationAddressTwo
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressTwo($couponRelevanceLocationAddressTwo)
    {
        $this->couponRelevanceLocationAddressTwo = $couponRelevanceLocationAddressTwo;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTwo
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressTwo()
    {
        return $this->couponRelevanceLocationAddressTwo;
    }

    /**
     * Set couponRelevanceLocationAddressTwoLatitude
     *
     * @param string $couponRelevanceLocationAddressTwoLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressTwoLatitude($couponRelevanceLocationAddressTwoLatitude)
    {
        $this->couponRelevanceLocationAddressTwoLatitude = $couponRelevanceLocationAddressTwoLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTwoLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressTwoLatitude()
    {
        return $this->couponRelevanceLocationAddressTwoLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressTwoLongitude
     *
     * @param string $couponRelevanceLocationAddressTwoLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressTwoLongitude($couponRelevanceLocationAddressTwoLongitude)
    {
        $this->couponRelevanceLocationAddressTwoLongitude = $couponRelevanceLocationAddressTwoLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTwoLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressTwoLongitude()
    {
        return $this->couponRelevanceLocationAddressTwoLongitude;
    }

    /**
     * Set couponRelevanceLocationTextTwo
     *
     * @param string $couponRelevanceLocationTextTwo
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextTwo($couponRelevanceLocationTextTwo)
    {
        $this->couponRelevanceLocationTextTwo = $couponRelevanceLocationTextTwo;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextTwo
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextTwo()
    {
        return $this->couponRelevanceLocationTextTwo;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusTwo
     *
     * @param string $couponRelevanceLocationTextDynamicStatusTwo
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusTwo($couponRelevanceLocationTextDynamicStatusTwo)
    {
        $this->couponRelevanceLocationTextDynamicStatusTwo = $couponRelevanceLocationTextDynamicStatusTwo;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusTwo
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusTwo()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusTwo;
    }

    /**
     * Set couponRelevanceLocationAddressThree
     *
     * @param string $couponRelevanceLocationAddressThree
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressThree($couponRelevanceLocationAddressThree)
    {
        $this->couponRelevanceLocationAddressThree = $couponRelevanceLocationAddressThree;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressThree
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressThree()
    {
        return $this->couponRelevanceLocationAddressThree;
    }

    /**
     * Set couponRelevanceLocationAddressThreeLatitude
     *
     * @param string $couponRelevanceLocationAddressThreeLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressThreeLatitude($couponRelevanceLocationAddressThreeLatitude)
    {
        $this->couponRelevanceLocationAddressThreeLatitude = $couponRelevanceLocationAddressThreeLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressThreeLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressThreeLatitude()
    {
        return $this->couponRelevanceLocationAddressThreeLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressThreeLongitude
     *
     * @param string $couponRelevanceLocationAddressThreeLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressThreeLongitude($couponRelevanceLocationAddressThreeLongitude)
    {
        $this->couponRelevanceLocationAddressThreeLongitude = $couponRelevanceLocationAddressThreeLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressThreeLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressThreeLongitude()
    {
        return $this->couponRelevanceLocationAddressThreeLongitude;
    }

    /**
     * Set couponRelevanceLocationTextThree
     *
     * @param string $couponRelevanceLocationTextThree
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextThree($couponRelevanceLocationTextThree)
    {
        $this->couponRelevanceLocationTextThree = $couponRelevanceLocationTextThree;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextThree
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextThree()
    {
        return $this->couponRelevanceLocationTextThree;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusThree
     *
     * @param string $couponRelevanceLocationTextDynamicStatusThree
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusThree($couponRelevanceLocationTextDynamicStatusThree)
    {
        $this->couponRelevanceLocationTextDynamicStatusThree = $couponRelevanceLocationTextDynamicStatusThree;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusThree
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusThree()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusThree;
    }

    /**
     * Set couponRelevanceLocationAddressFour
     *
     * @param string $couponRelevanceLocationAddressFour
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressFour($couponRelevanceLocationAddressFour)
    {
        $this->couponRelevanceLocationAddressFour = $couponRelevanceLocationAddressFour;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFour
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressFour()
    {
        return $this->couponRelevanceLocationAddressFour;
    }

    /**
     * Set couponRelevanceLocationAddressFourLatitude
     *
     * @param string $couponRelevanceLocationAddressFourLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressFourLatitude($couponRelevanceLocationAddressFourLatitude)
    {
        $this->couponRelevanceLocationAddressFourLatitude = $couponRelevanceLocationAddressFourLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFourLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressFourLatitude()
    {
        return $this->couponRelevanceLocationAddressFourLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressFourLongitude
     *
     * @param string $couponRelevanceLocationAddressFourLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressFourLongitude($couponRelevanceLocationAddressFourLongitude)
    {
        $this->couponRelevanceLocationAddressFourLongitude = $couponRelevanceLocationAddressFourLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFourLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressFourLongitude()
    {
        return $this->couponRelevanceLocationAddressFourLongitude;
    }


    /**
     * Set couponRelevanceLocationTextFour
     *
     * @param string $couponRelevanceLocationTextFour
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextFour($couponRelevanceLocationTextFour)
    {
        $this->couponRelevanceLocationTextFour = $couponRelevanceLocationTextFour;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextFour
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextFour()
    {
        return $this->couponRelevanceLocationTextFour;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusFour
     *
     * @param string $couponRelevanceLocationTextDynamicStatusFour
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusFour($couponRelevanceLocationTextDynamicStatusFour)
    {
        $this->couponRelevanceLocationTextDynamicStatusFour = $couponRelevanceLocationTextDynamicStatusFour;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusFour
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusFour()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusFour;
    }

    /**
     * Set couponRelevanceLocationAddressFive
     *
     * @param string $couponRelevanceLocationAddressFive
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressFive($couponRelevanceLocationAddressFive)
    {
        $this->couponRelevanceLocationAddressFive = $couponRelevanceLocationAddressFive;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFive
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressFive()
    {
        return $this->couponRelevanceLocationAddressFive;
    }

    /**
     * Set couponRelevanceLocationAddressFiveLatitude
     *
     * @param string $couponRelevanceLocationAddressFiveLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressFiveLatitude($couponRelevanceLocationAddressFiveLatitude)
    {
        $this->couponRelevanceLocationAddressFiveLatitude = $couponRelevanceLocationAddressFiveLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFiveLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressFiveLatitude()
    {
        return $this->couponRelevanceLocationAddressFiveLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressFiveLongitude
     *
     * @param string $couponRelevanceLocationAddressFiveLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressFiveLongitude($couponRelevanceLocationAddressFiveLongitude)
    {
        $this->couponRelevanceLocationAddressFiveLongitude = $couponRelevanceLocationAddressFiveLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFiveLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressFiveLongitude()
    {
        return $this->couponRelevanceLocationAddressFiveLongitude;
    }


    /**
     * Set couponRelevanceLocationTextFive
     *
     * @param string $couponRelevanceLocationTextFive
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextFive($couponRelevanceLocationTextFive)
    {
        $this->couponRelevanceLocationTextFive = $couponRelevanceLocationTextFive;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextFive
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextFive()
    {
        return $this->couponRelevanceLocationTextFive;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusFive
     *
     * @param string $couponRelevanceLocationTextDynamicStatusFive
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusFive($couponRelevanceLocationTextDynamicStatusFive)
    {
        $this->couponRelevanceLocationTextDynamicStatusFive = $couponRelevanceLocationTextDynamicStatusFive;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusFive
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusFive()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusFive;
    }

    /**
     * Set couponRelevanceLocationAddressSix
     *
     * @param string $couponRelevanceLocationAddressSix
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressSix($couponRelevanceLocationAddressSix)
    {
        $this->couponRelevanceLocationAddressSix = $couponRelevanceLocationAddressSix;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSix
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressSix()
    {
        return $this->couponRelevanceLocationAddressSix;
    }

    /**
     * Set couponRelevanceLocationAddressSixLatitude
     *
     * @param string $couponRelevanceLocationAddressSixLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressSixLatitude($couponRelevanceLocationAddressSixLatitude)
    {
        $this->couponRelevanceLocationAddressSixLatitude = $couponRelevanceLocationAddressSixLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSixLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressSixLatitude()
    {
        return $this->couponRelevanceLocationAddressSixLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressSixLongitude
     *
     * @param string $couponRelevanceLocationAddressSixLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressSixLongitude($couponRelevanceLocationAddressSixLongitude)
    {
        $this->couponRelevanceLocationAddressSixLongitude = $couponRelevanceLocationAddressSixLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSixLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressSixLongitude()
    {
        return $this->couponRelevanceLocationAddressSixLongitude;
    }


    /**
     * Set couponRelevanceLocationTextSix
     *
     * @param string $couponRelevanceLocationTextSix
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextSix($couponRelevanceLocationTextSix)
    {
        $this->couponRelevanceLocationTextSix = $couponRelevanceLocationTextSix;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextSix
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextSix()
    {
        return $this->couponRelevanceLocationTextSix;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusSix
     *
     * @param string $couponRelevanceLocationTextDynamicStatusSix
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusSix($couponRelevanceLocationTextDynamicStatusSix)
    {
        $this->couponRelevanceLocationTextDynamicStatusSix = $couponRelevanceLocationTextDynamicStatusSix;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusSix
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusSix()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusSix;
    }

    /**
     * Set couponRelevanceLocationAddressSeven
     *
     * @param string $couponRelevanceLocationAddressSeven
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressSeven($couponRelevanceLocationAddressSeven)
    {
        $this->couponRelevanceLocationAddressSeven = $couponRelevanceLocationAddressSeven;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSeven
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressSeven()
    {
        return $this->couponRelevanceLocationAddressSeven;
    }

    /**
     * Set couponRelevanceLocationAddressSevenLatitude
     *
     * @param string $couponRelevanceLocationAddressSevenLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressSevenLatitude($couponRelevanceLocationAddressSevenLatitude)
    {
        $this->couponRelevanceLocationAddressSevenLatitude = $couponRelevanceLocationAddressSevenLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSevenLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressSevenLatitude()
    {
        return $this->couponRelevanceLocationAddressSevenLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressSevenLongitude
     *
     * @param string $couponRelevanceLocationAddressSevenLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressSevenLongitude($couponRelevanceLocationAddressSevenLongitude)
    {
        $this->couponRelevanceLocationAddressSevenLongitude = $couponRelevanceLocationAddressSevenLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSevenLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressSevenLongitude()
    {
        return $this->couponRelevanceLocationAddressSevenLongitude;
    }


    /**
     * Set couponRelevanceLocationTextSeven
     *
     * @param string $couponRelevanceLocationTextSeven
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextSeven($couponRelevanceLocationTextSeven)
    {
        $this->couponRelevanceLocationTextSeven = $couponRelevanceLocationTextSeven;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextSeven
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextSeven()
    {
        return $this->couponRelevanceLocationTextSeven;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusSeven
     *
     * @param string $couponRelevanceLocationTextDynamicStatusSeven
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusSeven($couponRelevanceLocationTextDynamicStatusSeven)
    {
        $this->couponRelevanceLocationTextDynamicStatusSeven = $couponRelevanceLocationTextDynamicStatusSeven;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusSeven
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusSeven()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusSeven;
    }

    /**
     * Set couponRelevanceLocationAddressEight
     *
     * @param string $couponRelevanceLocationAddressEight
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressEight($couponRelevanceLocationAddressEight)
    {
        $this->couponRelevanceLocationAddressEight = $couponRelevanceLocationAddressEight;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressEight
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressEight()
    {
        return $this->couponRelevanceLocationAddressEight;
    }

    /**
     * Set couponRelevanceLocationAddressEightLatitude
     *
     * @param string $couponRelevanceLocationAddressEightLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressEightLatitude($couponRelevanceLocationAddressEightLatitude)
    {
        $this->couponRelevanceLocationAddressEightLatitude = $couponRelevanceLocationAddressEightLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressEightLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressEightLatitude()
    {
        return $this->couponRelevanceLocationAddressEightLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressEightLongitude
     *
     * @param string $couponRelevanceLocationAddressEightLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressEightLongitude($couponRelevanceLocationAddressEightLongitude)
    {
        $this->couponRelevanceLocationAddressEightLongitude = $couponRelevanceLocationAddressEightLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressEightLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressEightLongitude()
    {
        return $this->couponRelevanceLocationAddressEightLongitude;
    }


    /**
     * Set couponRelevanceLocationTextEight
     *
     * @param string $couponRelevanceLocationTextEight
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextEight($couponRelevanceLocationTextEight)
    {
        $this->couponRelevanceLocationTextEight = $couponRelevanceLocationTextEight;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextEight
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextEight()
    {
        return $this->couponRelevanceLocationTextEight;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusEight
     *
     * @param string $couponRelevanceLocationTextDynamicStatusEight
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusEight($couponRelevanceLocationTextDynamicStatusEight)
    {
        $this->couponRelevanceLocationTextDynamicStatusEight = $couponRelevanceLocationTextDynamicStatusEight;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusEight
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusEight()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusEight;
    }

    /**
     * Set couponRelevanceLocationAddressNine
     *
     * @param string $couponRelevanceLocationAddressNine
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressNine($couponRelevanceLocationAddressNine)
    {
        $this->couponRelevanceLocationAddressNine = $couponRelevanceLocationAddressNine;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressNine
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressNine()
    {
        return $this->couponRelevanceLocationAddressNine;
    }

    /**
     * Set couponRelevanceLocationAddressNineLatitude
     *
     * @param string $couponRelevanceLocationAddressNineLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressNineLatitude($couponRelevanceLocationAddressNineLatitude)
    {
        $this->couponRelevanceLocationAddressNineLatitude = $couponRelevanceLocationAddressNineLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressNineLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressNineLatitude()
    {
        return $this->couponRelevanceLocationAddressNineLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressNineLongitude
     *
     * @param string $couponRelevanceLocationAddressNineLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressNineLongitude($couponRelevanceLocationAddressNineLongitude)
    {
        $this->couponRelevanceLocationAddressNineLongitude = $couponRelevanceLocationAddressNineLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressNineLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressNineLongitude()
    {
        return $this->couponRelevanceLocationAddressNineLongitude;
    }


    /**
     * Set couponRelevanceLocationTextNine
     *
     * @param string $couponRelevanceLocationTextNine
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextNine($couponRelevanceLocationTextNine)
    {
        $this->couponRelevanceLocationTextNine = $couponRelevanceLocationTextNine;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextNine
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextNine()
    {
        return $this->couponRelevanceLocationTextNine;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusNine
     *
     * @param string $couponRelevanceLocationTextDynamicStatusNine
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusNine($couponRelevanceLocationTextDynamicStatusNine)
    {
        $this->couponRelevanceLocationTextDynamicStatusNine = $couponRelevanceLocationTextDynamicStatusNine;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusNine
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusNine()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusNine;
    }

    /**
     * Set couponRelevanceLocationAddressTen
     *
     * @param string $couponRelevanceLocationAddressTen
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressTen($couponRelevanceLocationAddressTen)
    {
        $this->couponRelevanceLocationAddressTen = $couponRelevanceLocationAddressTen;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTen
     *
     * @return string 
     */
    public function getCouponRelevanceLocationAddressTen()
    {
        return $this->couponRelevanceLocationAddressTen;
    }

    /**
     * Set couponRelevanceLocationAddressTenLatitude
     *
     * @param string $couponRelevanceLocationAddressTenLatitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressTenLatitude($couponRelevanceLocationAddressTenLatitude)
    {
        $this->couponRelevanceLocationAddressTenLatitude = $couponRelevanceLocationAddressTenLatitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTenLatitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressTenLatitude()
    {
        return $this->couponRelevanceLocationAddressTenLatitude;
    }

    /**
     * Set couponRelevanceLocationAddressTenLongitude
     *
     * @param string $couponRelevanceLocationAddressTenLongitude
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationAddressTenLongitude($couponRelevanceLocationAddressTenLongitude)
    {
        $this->couponRelevanceLocationAddressTenLongitude = $couponRelevanceLocationAddressTenLongitude;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTenLongitude
     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressTenLongitude()
    {
        return $this->couponRelevanceLocationAddressTenLongitude;
    }


    /**
     * Set couponRelevanceLocationTextTen
     *
     * @param string $couponRelevanceLocationTextTen
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextTen($couponRelevanceLocationTextTen)
    {
        $this->couponRelevanceLocationTextTen = $couponRelevanceLocationTextTen;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextTen
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextTen()
    {
        return $this->couponRelevanceLocationTextTen;
    }

    /**
     * Set couponRelevanceLocationTextDynamicStatusTen
     *
     * @param string $couponRelevanceLocationTextDynamicStatusTen
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTextDynamicStatusTen($couponRelevanceLocationTextDynamicStatusTen)
    {
        $this->couponRelevanceLocationTextDynamicStatusTen = $couponRelevanceLocationTextDynamicStatusTen;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicStatusTen
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTextDynamicStatusTen()
    {
        return (bool)$this->couponRelevanceLocationTextDynamicStatusTen;
    }

    /**
     * Set couponRelevanceLocationDate
     *
     * @param \Date $couponRelevanceLocationDate
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationDate($couponRelevanceLocationDate)
    {
        $this->couponRelevanceLocationDate = $couponRelevanceLocationDate;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationDate
     *
     * @return \Date
     */
    public function getCouponRelevanceLocationDate()
    {
        return $this->couponRelevanceLocationDate;
    }

    /**
     * Set couponRelevanceLocationTime
     *
     * @param \Time $couponRelevanceLocationTime
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTime($couponRelevanceLocationTime)
    {
        $this->couponRelevanceLocationTime = $couponRelevanceLocationTime;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTime
     *
     * @return \Time
     */
    public function getCouponRelevanceLocationTime()
    {
        return $this->couponRelevanceLocationTime;
    }

    /**
     * Set couponRelevanceLocationTimezFive
     *
     * @param string $couponRelevanceLocationTimezone
     *
     * @return mrelevance
     */
    public function setCouponRelevanceLocationTimezone($couponRelevanceLocationTimezone)
    {
        $this->couponRelevanceLocationTimezone = $couponRelevanceLocationTimezone;
    
        return $this;
    }

    /**
     * Get couponRelevanceLocationTimezone
     *
     * @return string 
     */
    public function getCouponRelevanceLocationTimezone()
    {
        return $this->couponRelevanceLocationTimezone;
    }
}

