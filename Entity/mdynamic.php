<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * mdynamic
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mdynamic
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
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="generation_date", type="datetime", nullable=true)
     */
    private $generationDate;
    /**
     * @var string
     *
     * @ORM\Column(name="manage_status", type="boolean", nullable=true)
     */
    private $manageStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_dynamic_value", type="string", length=255, nullable=true)
     */
    private $couponBarcodeDynamicValue;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_alternate_dynamic_text", type="string", length=255, nullable=true)
     */
    private $couponBarcodeAlternateDynamicText;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_label_dynamic", type="string", length=255, nullable=true)
     */
    private $couponHeaderLabelDynamic;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_text_dynamic", type="string", length=255, nullable=true)
     */
    private $couponHeaderTextDynamic;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_label_dynamic", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldLabelDynamic;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_text_dynamic", type="string", length=255, nullable=true)
     */
    private $couponPrimaryFieldTextDynamic;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_one", type="string", length=255, nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_one", type="string", length=255, nullable=true)
     */
    private $couponSecondaryFieldTextDynamicOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_two", type="string", length=255, nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_two", type="string", length=255, nullable=true)
     */
    private $couponSecondaryFieldTextDynamicTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_three", type="string", length=255, nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_three", type="string", length=255, nullable=true)
     */
    private $couponSecondaryFieldTextDynamicThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_four", type="string", length=255, nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_four", type="string", length=255, nullable=true)
     */
    private $couponSecondaryFieldTextDynamicFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_one", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_two", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_three", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_four", type="string", length=255, nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_one", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_one", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_two", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_two", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_three", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_three", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_four", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_four", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_five", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_five", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_six", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_six", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_seven", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_seven", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_eight", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_eight", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_nine", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_nine", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_ten", type="string", length=255, nullable=true)
     */
    private $couponBackFieldLabelDynamicTen;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_ten", type="string", length=255, nullable=true)
     */
    private $couponBackFieldTextDynamicTen;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_one", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_one", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressOne;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_two", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_two", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_three", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_three", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressThree;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_four", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_four", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressFour;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_five", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_five", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressFive;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_six", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_six", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressSix;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_seven", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_seven", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressSeven;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_eight", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_eight", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressEight;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_nine", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_nine", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressNine;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_text_dynamic_ten", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationTextDynamicTen;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_ten", type="string", length=255, nullable=true)
     */
    private $couponRelevanceLocationAddressTen;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_dynamic_value_status", type="boolean", nullable=true)
     */
    private $couponBarcodeDynamicValueStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_barcode_alternate_dynamic_text_status", type="boolean", nullable=true)
     */
    private $couponBarcodeAlternateDynamicTextStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_label_dynamic_status", type="boolean", nullable=true)
     */
    private $couponHeaderLabelDynamicStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_header_text_dynamic_status", type="boolean", nullable=true)
     */
    private $couponHeaderTextDynamicStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_label_dynamic_status", type="boolean", nullable=true)
     */
    private $couponPrimaryFieldLabelDynamicStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_primary_field_text_dynamic_status", type="boolean", nullable=true)
     */
    private $couponPrimaryFieldTextDynamicStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_one_status", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicOneStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_one_status", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldTextDynamicOneStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_two_status", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicTwoStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_two_status", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldTextDynamicTwoStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_three_status", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicThreeStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_three_status", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldTextDynamicThreeStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_label_dynamic_four_status", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldLabelDynamicFourStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_secondary_field_text_dynamic_four_status", type="boolean", nullable=true)
     */
    private $couponSecondaryFieldTextDynamicFourStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_one_status", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicOneStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_one_status", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicOneStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_two_status", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicTwoStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_two_status", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicTwoStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_three_status", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicThreeStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_three_status", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicThreeStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_label_dynamic_four_status", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldLabelDynamicFourStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_auxiliary_field_text_dynamic_four_status", type="boolean", nullable=true)
     */
    private $couponAuxiliaryFieldTextDynamicFourStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_one_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicOneStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_one_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicOneStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_two_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicTwoStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_two_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicTwoStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_three_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicThreeStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_three_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicThreeStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_four_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicFourStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_four_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicFourStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_five_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicFiveStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_five_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicFiveStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_six_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicSixStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_six_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicSixStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_seven_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicSevenStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_seven_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicSevenStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_eight_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicEightStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_eight_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicEightStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_nine_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicNineStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_nine_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicNineStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_label_dynamic_ten_status", type="boolean", nullable=true)
     */
    private $couponBackFieldLabelDynamicTenStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_back_field_text_dynamic_ten_status", type="boolean", nullable=true)
     */
    private $couponBackFieldTextDynamicTenStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_one_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressOneStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_two_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressTwoStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_three_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressThreeStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_four_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressFourStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_five_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressFiveStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_six_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressSixStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_seven_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressSevenStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_eight_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressEightStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_nine_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressNineStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_relevance_location_address_ten_status", type="boolean", nullable=true)
     */
    private $couponRelevanceLocationAddressTenStatus;


    /**
     * Get id.

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
     * @return mdynamic
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
     * Set generationDate
     *
     * @param \DateTime $generationDate
     *
     * @return mdynamic
     */
    public function setGenerationDate($generationDate)
    {
        $this->generationDate = $generationDate;

        return $this;
    }

    /**
     * Get generationDate
     *
     * @return \DateTime
     */
    public function getGenerationDate()
    {
        return $this->generationDate;
    }

    /**
     * Set manageStatus
     *
     * @param string $manageStatus
     *
     * @return mdynamic
     */
    public function setManageStatus($manageStatus)
    {
        $this->manageStatus = $manageStatus;

        return $this;
    }

    /**
     * Get manageStatus
     *
     * @return string
     */
    public function getManageStatus()
    {
        return $this->manageStatus;
    }

    /**
     * Set couponBarcodeDynamicValue.

     *
     * @param string $couponBarcodeDynamicValue
     *
     * @return mdynamic
     */
    public function setCouponBarcodeDynamicValue($couponBarcodeDynamicValue)
    {
        $this->couponBarcodeDynamicValue = $couponBarcodeDynamicValue;

        return $this;
    }

    /**
     * Get couponBarcodeDynamicValue.

     *
     * @return string
     */
    public function getCouponBarcodeDynamicValue()
    {
        return $this->couponBarcodeDynamicValue;
    }

    /**
     * Set couponBarcodeAlternateDynamicText.

     *
     * @param string $couponBarcodeAlternateDynamicText
     *
     * @return mdynamic
     */
    public function setCouponBarcodeAlternateDynamicText($couponBarcodeAlternateDynamicText)
    {
        $this->couponBarcodeAlternateDynamicText = $couponBarcodeAlternateDynamicText;

        return $this;
    }

    /**
     * Get couponBarcodeAlternateDynamicText.

     *
     * @return string
     */
    public function getCouponBarcodeAlternateDynamicText()
    {
        return $this->couponBarcodeAlternateDynamicText;
    }

    /**
     * Set couponHeaderLabelDynamic.

     *
     * @param string $couponHeaderLabelDynamic
     *
     * @return mdynamic
     */
    public function setCouponHeaderLabelDynamic($couponHeaderLabelDynamic)
    {
        $this->couponHeaderLabelDynamic = $couponHeaderLabelDynamic;

        return $this;
    }

    /**
     * Get couponHeaderLabelDynamic.

     *
     * @return string
     */
    public function getCouponHeaderLabelDynamic()
    {
        return $this->couponHeaderLabelDynamic;
    }

    /**
     * Set couponHeaderTextDynamic.

     *
     * @param string $couponHeaderTextDynamic
     *
     * @return mdynamic
     */
    public function setCouponHeaderTextDynamic($couponHeaderTextDynamic)
    {
        $this->couponHeaderTextDynamic = $couponHeaderTextDynamic;

        return $this;
    }

    /**
     * Get couponHeaderTextDynamic.

     *
     * @return string
     */
    public function getCouponHeaderTextDynamic()
    {
        return $this->couponHeaderTextDynamic;
    }

    /**
     * Set couponPrimaryFieldLabelDynamic.

     *
     * @param string $couponPrimaryFieldLabelDynamic
     *
     * @return mdynamic
     */
    public function setCouponPrimaryFieldLabelDynamic($couponPrimaryFieldLabelDynamic)
    {
        $this->couponPrimaryFieldLabelDynamic = $couponPrimaryFieldLabelDynamic;

        return $this;
    }

    /**
     * Get couponPrimaryFieldLabelDynamic.

     *
     * @return string
     */
    public function getCouponPrimaryFieldLabelDynamic()
    {
        return $this->couponPrimaryFieldLabelDynamic;
    }

    /**
     * Set couponPrimaryFieldTextDynamic.

     *
     * @param string $couponPrimaryFieldTextDynamic
     *
     * @return mdynamic
     */
    public function setCouponPrimaryFieldTextDynamic($couponPrimaryFieldTextDynamic)
    {
        $this->couponPrimaryFieldTextDynamic = $couponPrimaryFieldTextDynamic;

        return $this;
    }

    /**
     * Get couponPrimaryFieldTextDynamic.

     *
     * @return string
     */
    public function getCouponPrimaryFieldTextDynamic()
    {
        return $this->couponPrimaryFieldTextDynamic;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicOne.

     *
     * @param string $couponSecondaryFieldLabelDynamicOne
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldLabelDynamicOne($couponSecondaryFieldLabelDynamicOne)
    {
        $this->couponSecondaryFieldLabelDynamicOne = $couponSecondaryFieldLabelDynamicOne;

        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicOne.

     *
     * @return string
     */
    public function getCouponSecondaryFieldLabelDynamicOne()
    {
        return $this->couponSecondaryFieldLabelDynamicOne;
    }

    /**
     * Set couponSecondaryFieldTextDynamicOne.

     *
     * @param string $couponSecondaryFieldTextDynamicOne
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldTextDynamicOne($couponSecondaryFieldTextDynamicOne)
    {
        $this->couponSecondaryFieldTextDynamicOne = $couponSecondaryFieldTextDynamicOne;

        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicOne.

     *
     * @return string
     */
    public function getCouponSecondaryFieldTextDynamicOne()
    {
        return $this->couponSecondaryFieldTextDynamicOne;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicTwo.

     *
     * @param string $couponSecondaryFieldLabelDynamicTwo
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldLabelDynamicTwo($couponSecondaryFieldLabelDynamicTwo)
    {
        $this->couponSecondaryFieldLabelDynamicTwo = $couponSecondaryFieldLabelDynamicTwo;

        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicTwo.

     *
     * @return string
     */
    public function getCouponSecondaryFieldLabelDynamicTwo()
    {
        return $this->couponSecondaryFieldLabelDynamicTwo;
    }

    /**
     * Set couponSecondaryFieldTextDynamicTwo.

     *
     * @param string $couponSecondaryFieldTextDynamicTwo
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldTextDynamicTwo($couponSecondaryFieldTextDynamicTwo)
    {
        $this->couponSecondaryFieldTextDynamicTwo = $couponSecondaryFieldTextDynamicTwo;

        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicTwo.

     *
     * @return string
     */
    public function getCouponSecondaryFieldTextDynamicTwo()
    {
        return $this->couponSecondaryFieldTextDynamicTwo;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicThree.

     *
     * @param string $couponSecondaryFieldLabelDynamicThree
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldLabelDynamicThree($couponSecondaryFieldLabelDynamicThree)
    {
        $this->couponSecondaryFieldLabelDynamicThree = $couponSecondaryFieldLabelDynamicThree;

        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicThree.

     *
     * @return string
     */
    public function getCouponSecondaryFieldLabelDynamicThree()
    {
        return $this->couponSecondaryFieldLabelDynamicThree;
    }

    /**
     * Set couponSecondaryFieldTextDynamicThree.

     *
     * @param string $couponSecondaryFieldTextDynamicThree
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldTextDynamicThree($couponSecondaryFieldTextDynamicThree)
    {
        $this->couponSecondaryFieldTextDynamicThree = $couponSecondaryFieldTextDynamicThree;

        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicThree.

     *
     * @return string
     */
    public function getCouponSecondaryFieldTextDynamicThree()
    {
        return $this->couponSecondaryFieldTextDynamicThree;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicFour.

     *
     * @param string $couponSecondaryFieldLabelDynamicFour
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldLabelDynamicFour($couponSecondaryFieldLabelDynamicFour)
    {
        $this->couponSecondaryFieldLabelDynamicFour = $couponSecondaryFieldLabelDynamicFour;

        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicFour.

     *
     * @return string
     */
    public function getCouponSecondaryFieldLabelDynamicFour()
    {
        return $this->couponSecondaryFieldLabelDynamicFour;
    }

    /**
     * Set couponSecondaryFieldTextDynamicFour.

     *
     * @param string $couponSecondaryFieldTextDynamicFour
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldTextDynamicFour($couponSecondaryFieldTextDynamicFour)
    {
        $this->couponSecondaryFieldTextDynamicFour = $couponSecondaryFieldTextDynamicFour;

        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicFour.

     *
     * @return string
     */
    public function getCouponSecondaryFieldTextDynamicFour()
    {
        return $this->couponSecondaryFieldTextDynamicFour;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicOne.

     *
     * @param string $couponAuxiliaryFieldLabelDynamicOne
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldLabelDynamicOne($couponAuxiliaryFieldLabelDynamicOne)
    {
        $this->couponAuxiliaryFieldLabelDynamicOne = $couponAuxiliaryFieldLabelDynamicOne;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicOne.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldLabelDynamicOne()
    {
        return $this->couponAuxiliaryFieldLabelDynamicOne;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicOne.

     *
     * @param string $couponAuxiliaryFieldTextDynamicOne
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldTextDynamicOne($couponAuxiliaryFieldTextDynamicOne)
    {
        $this->couponAuxiliaryFieldTextDynamicOne = $couponAuxiliaryFieldTextDynamicOne;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicOne.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldTextDynamicOne()
    {
        return $this->couponAuxiliaryFieldTextDynamicOne;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicTwo.

     *
     * @param string $couponAuxiliaryFieldLabelDynamicTwo
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldLabelDynamicTwo($couponAuxiliaryFieldLabelDynamicTwo)
    {
        $this->couponAuxiliaryFieldLabelDynamicTwo = $couponAuxiliaryFieldLabelDynamicTwo;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicTwo.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldLabelDynamicTwo()
    {
        return $this->couponAuxiliaryFieldLabelDynamicTwo;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicTwo.

     *
     * @param string $couponAuxiliaryFieldTextDynamicTwo
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldTextDynamicTwo($couponAuxiliaryFieldTextDynamicTwo)
    {
        $this->couponAuxiliaryFieldTextDynamicTwo = $couponAuxiliaryFieldTextDynamicTwo;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicTwo.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldTextDynamicTwo()
    {
        return $this->couponAuxiliaryFieldTextDynamicTwo;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicThree.

     *
     * @param string $couponAuxiliaryFieldLabelDynamicThree
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldLabelDynamicThree($couponAuxiliaryFieldLabelDynamicThree)
    {
        $this->couponAuxiliaryFieldLabelDynamicThree = $couponAuxiliaryFieldLabelDynamicThree;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicThree.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldLabelDynamicThree()
    {
        return $this->couponAuxiliaryFieldLabelDynamicThree;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicThree.

     *
     * @param string $couponAuxiliaryFieldTextDynamicThree
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldTextDynamicThree($couponAuxiliaryFieldTextDynamicThree)
    {
        $this->couponAuxiliaryFieldTextDynamicThree = $couponAuxiliaryFieldTextDynamicThree;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicThree.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldTextDynamicThree()
    {
        return $this->couponAuxiliaryFieldTextDynamicThree;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicFour.

     *
     * @param string $couponAuxiliaryFieldLabelDynamicFour
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldLabelDynamicFour($couponAuxiliaryFieldLabelDynamicFour)
    {
        $this->couponAuxiliaryFieldLabelDynamicFour = $couponAuxiliaryFieldLabelDynamicFour;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicFour.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldLabelDynamicFour()
    {
        return $this->couponAuxiliaryFieldLabelDynamicFour;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicFour.

     *
     * @param string $couponAuxiliaryFieldTextDynamicFour
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldTextDynamicFour($couponAuxiliaryFieldTextDynamicFour)
    {
        $this->couponAuxiliaryFieldTextDynamicFour = $couponAuxiliaryFieldTextDynamicFour;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicFour.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldTextDynamicFour()
    {
        return $this->couponAuxiliaryFieldTextDynamicFour;
    }

    /**
     * Set couponBackFieldLabelDynamicOne.

     *
     * @param string $couponBackFieldLabelDynamicOne
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicOne($couponBackFieldLabelDynamicOne)
    {
        $this->couponBackFieldLabelDynamicOne = $couponBackFieldLabelDynamicOne;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicOne.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicOne()
    {
        return $this->couponBackFieldLabelDynamicOne;
    }

    /**
     * Set couponBackFieldTextDynamicOne.

     *
     * @param string $couponBackFieldTextDynamicOne
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicOne($couponBackFieldTextDynamicOne)
    {
        $this->couponBackFieldTextDynamicOne = $couponBackFieldTextDynamicOne;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicOne.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicOne()
    {
        return $this->couponBackFieldTextDynamicOne;
    }

    /**
     * Set couponBackFieldLabelDynamicTwo.

     *
     * @param string $couponBackFieldLabelDynamicTwo
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicTwo($couponBackFieldLabelDynamicTwo)
    {
        $this->couponBackFieldLabelDynamicTwo = $couponBackFieldLabelDynamicTwo;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicTwo.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicTwo()
    {
        return $this->couponBackFieldLabelDynamicTwo;
    }

    /**
     * Set couponBackFieldTextDynamicTwo.

     *
     * @param string $couponBackFieldTextDynamicTwo
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicTwo($couponBackFieldTextDynamicTwo)
    {
        $this->couponBackFieldTextDynamicTwo = $couponBackFieldTextDynamicTwo;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicTwo.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicTwo()
    {
        return $this->couponBackFieldTextDynamicTwo;
    }

    /**
     * Set couponBackFieldLabelDynamicThree.

     *
     * @param string $couponBackFieldLabelDynamicThree
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicThree($couponBackFieldLabelDynamicThree)
    {
        $this->couponBackFieldLabelDynamicThree = $couponBackFieldLabelDynamicThree;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicThree.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicThree()
    {
        return $this->couponBackFieldLabelDynamicThree;
    }

    /**
     * Set couponBackFieldTextDynamicThree.

     *
     * @param string $couponBackFieldTextDynamicThree
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicThree($couponBackFieldTextDynamicThree)
    {
        $this->couponBackFieldTextDynamicThree = $couponBackFieldTextDynamicThree;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicThree.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicThree()
    {
        return $this->couponBackFieldTextDynamicThree;
    }

    /**
     * Set couponBackFieldLabelDynamicFour.

     *
     * @param string $couponBackFieldLabelDynamicFour
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicFour($couponBackFieldLabelDynamicFour)
    {
        $this->couponBackFieldLabelDynamicFour = $couponBackFieldLabelDynamicFour;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicFour.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicFour()
    {
        return $this->couponBackFieldLabelDynamicFour;
    }

    /**
     * Set couponBackFieldTextDynamicFour.

     *
     * @param string $couponBackFieldTextDynamicFour
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicFour($couponBackFieldTextDynamicFour)
    {
        $this->couponBackFieldTextDynamicFour = $couponBackFieldTextDynamicFour;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicFour.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicFour()
    {
        return $this->couponBackFieldTextDynamicFour;
    }

    /**
     * Set couponBackFieldLabelDynamicFive.

     *
     * @param string $couponBackFieldLabelDynamicFive
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicFive($couponBackFieldLabelDynamicFive)
    {
        $this->couponBackFieldLabelDynamicFive = $couponBackFieldLabelDynamicFive;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicFive.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicFive()
    {
        return $this->couponBackFieldLabelDynamicFive;
    }

    /**
     * Set couponBackFieldTextDynamicFive.

     *
     * @param string $couponBackFieldTextDynamicFive
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicFive($couponBackFieldTextDynamicFive)
    {
        $this->couponBackFieldTextDynamicFive = $couponBackFieldTextDynamicFive;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicFive.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicFive()
    {
        return $this->couponBackFieldTextDynamicFive;
    }

    /**
     * Set couponBackFieldLabelDynamicSix.

     *
     * @param string $couponBackFieldLabelDynamicSix
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicSix($couponBackFieldLabelDynamicSix)
    {
        $this->couponBackFieldLabelDynamicSix = $couponBackFieldLabelDynamicSix;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicSix.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicSix()
    {
        return $this->couponBackFieldLabelDynamicSix;
    }

    /**
     * Set couponBackFieldTextDynamicSix.

     *
     * @param string $couponBackFieldTextDynamicSix
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicSix($couponBackFieldTextDynamicSix)
    {
        $this->couponBackFieldTextDynamicSix = $couponBackFieldTextDynamicSix;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicSix.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicSix()
    {
        return $this->couponBackFieldTextDynamicSix;
    }

    /**
     * Set couponBackFieldLabelDynamicSeven.

     *
     * @param string $couponBackFieldLabelDynamicSeven
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicSeven($couponBackFieldLabelDynamicSeven)
    {
        $this->couponBackFieldLabelDynamicSeven = $couponBackFieldLabelDynamicSeven;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicSeven.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicSeven()
    {
        return $this->couponBackFieldLabelDynamicSeven;
    }

    /**
     * Set couponBackFieldTextDynamicSeven.

     *
     * @param string $couponBackFieldTextDynamicSeven
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicSeven($couponBackFieldTextDynamicSeven)
    {
        $this->couponBackFieldTextDynamicSeven = $couponBackFieldTextDynamicSeven;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicSeven.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicSeven()
    {
        return $this->couponBackFieldTextDynamicSeven;
    }

    /**
     * Set couponBackFieldLabelDynamicEight.

     *
     * @param string $couponBackFieldLabelDynamicEight
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicEight($couponBackFieldLabelDynamicEight)
    {
        $this->couponBackFieldLabelDynamicEight = $couponBackFieldLabelDynamicEight;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicEight.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicEight()
    {
        return $this->couponBackFieldLabelDynamicEight;
    }

    /**
     * Set couponBackFieldTextDynamicEight.

     *
     * @param string $couponBackFieldTextDynamicEight
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicEight($couponBackFieldTextDynamicEight)
    {
        $this->couponBackFieldTextDynamicEight = $couponBackFieldTextDynamicEight;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicEight.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicEight()
    {
        return $this->couponBackFieldTextDynamicEight;
    }

    /**
     * Set couponBackFieldLabelDynamicNine.

     *
     * @param string $couponBackFieldLabelDynamicNine
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicNine($couponBackFieldLabelDynamicNine)
    {
        $this->couponBackFieldLabelDynamicNine = $couponBackFieldLabelDynamicNine;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicNine.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicNine()
    {
        return $this->couponBackFieldLabelDynamicNine;
    }

    /**
     * Set couponBackFieldTextDynamicNine.

     *
     * @param string $couponBackFieldTextDynamicNine
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicNine($couponBackFieldTextDynamicNine)
    {
        $this->couponBackFieldTextDynamicNine = $couponBackFieldTextDynamicNine;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicNine.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicNine()
    {
        return $this->couponBackFieldTextDynamicNine;
    }

    /**
     * Set couponBackFieldLabelDynamicTen.

     *
     * @param string $couponBackFieldLabelDynamicTen
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicTen($couponBackFieldLabelDynamicTen)
    {
        $this->couponBackFieldLabelDynamicTen = $couponBackFieldLabelDynamicTen;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicTen.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicTen()
    {
        return $this->couponBackFieldLabelDynamicTen;
    }

    /**
     * Set couponBackFieldTextDynamicTen.

     *
     * @param string $couponBackFieldTextDynamicTen
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicTen($couponBackFieldTextDynamicTen)
    {
        $this->couponBackFieldTextDynamicTen = $couponBackFieldTextDynamicTen;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicTen.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicTen()
    {
        return $this->couponBackFieldTextDynamicTen;
    }

    /**
     * Set couponRelevanceLocationTextDynamicOne.

     *
     * @param string $couponRelevanceLocationTextDynamicOne
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicOne($couponRelevanceLocationTextDynamicOne)
    {
        $this->couponRelevanceLocationTextDynamicOne = $couponRelevanceLocationTextDynamicOne;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicOne.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicOne()
    {
        return $this->couponRelevanceLocationTextDynamicOne;
    }

    /**
     * Set couponRelevanceLocationAddressOne.

     *
     * @param string $couponRelevanceLocationAddressOne
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressOne($couponRelevanceLocationAddressOne)
    {
        $this->couponRelevanceLocationAddressOne = $couponRelevanceLocationAddressOne;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressOne.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressOne()
    {
        return $this->couponRelevanceLocationAddressOne;
    }

    /**
     * Set couponRelevanceLocationTextDynamicTwo.

     *
     * @param string $couponRelevanceLocationTextDynamicTwo
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicTwo($couponRelevanceLocationTextDynamicTwo)
    {
        $this->couponRelevanceLocationTextDynamicTwo = $couponRelevanceLocationTextDynamicTwo;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicTwo.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicTwo()
    {
        return $this->couponRelevanceLocationTextDynamicTwo;
    }

    /**
     * Set couponRelevanceLocationAddressTwo.

     *
     * @param string $couponRelevanceLocationAddressTwo
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressTwo($couponRelevanceLocationAddressTwo)
    {
        $this->couponRelevanceLocationAddressTwo = $couponRelevanceLocationAddressTwo;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTwo.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressTwo()
    {
        return $this->couponRelevanceLocationAddressTwo;
    }

    /**
     * Set couponRelevanceLocationTextDynamicThree.

     *
     * @param string $couponRelevanceLocationTextDynamicThree
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicThree($couponRelevanceLocationTextDynamicThree)
    {
        $this->couponRelevanceLocationTextDynamicThree = $couponRelevanceLocationTextDynamicThree;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicThree.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicThree()
    {
        return $this->couponRelevanceLocationTextDynamicThree;
    }

    /**
     * Set couponRelevanceLocationAddressThree.

     *
     * @param string $couponRelevanceLocationAddressThree
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressThree($couponRelevanceLocationAddressThree)
    {
        $this->couponRelevanceLocationAddressThree = $couponRelevanceLocationAddressThree;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressThree.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressThree()
    {
        return $this->couponRelevanceLocationAddressThree;
    }

    /**
     * Set couponRelevanceLocationTextDynamicFour.

     *
     * @param string $couponRelevanceLocationTextDynamicFour
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicFour($couponRelevanceLocationTextDynamicFour)
    {
        $this->couponRelevanceLocationTextDynamicFour = $couponRelevanceLocationTextDynamicFour;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicFour.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicFour()
    {
        return $this->couponRelevanceLocationTextDynamicFour;
    }

    /**
     * Set couponRelevanceLocationAddressFour.

     *
     * @param string $couponRelevanceLocationAddressFour
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressFour($couponRelevanceLocationAddressFour)
    {
        $this->couponRelevanceLocationAddressFour = $couponRelevanceLocationAddressFour;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFour.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressFour()
    {
        return $this->couponRelevanceLocationAddressFour;
    }

    /**
     * Set couponRelevanceLocationTextDynamicFive.

     *
     * @param string $couponRelevanceLocationTextDynamicFive
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicFive($couponRelevanceLocationTextDynamicFive)
    {
        $this->couponRelevanceLocationTextDynamicFive = $couponRelevanceLocationTextDynamicFive;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicFive.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicFive()
    {
        return $this->couponRelevanceLocationTextDynamicFive;
    }

    /**
     * Set couponRelevanceLocationAddressFive.

     *
     * @param string $couponRelevanceLocationAddressFive
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressFive($couponRelevanceLocationAddressFive)
    {
        $this->couponRelevanceLocationAddressFive = $couponRelevanceLocationAddressFive;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFive.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressFive()
    {
        return $this->couponRelevanceLocationAddressFive;
    }

    /**
     * Set couponRelevanceLocationTextDynamicSix.

     *
     * @param string $couponRelevanceLocationTextDynamicSix
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicSix($couponRelevanceLocationTextDynamicSix)
    {
        $this->couponRelevanceLocationTextDynamicSix = $couponRelevanceLocationTextDynamicSix;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicSix.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicSix()
    {
        return $this->couponRelevanceLocationTextDynamicSix;
    }

    /**
     * Set couponRelevanceLocationAddressSix.

     *
     * @param string $couponRelevanceLocationAddressSix
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressSix($couponRelevanceLocationAddressSix)
    {
        $this->couponRelevanceLocationAddressSix = $couponRelevanceLocationAddressSix;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSix.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressSix()
    {
        return $this->couponRelevanceLocationAddressSix;
    }

    /**
     * Set couponRelevanceLocationTextDynamicSeven.

     *
     * @param string $couponRelevanceLocationTextDynamicSeven
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicSeven($couponRelevanceLocationTextDynamicSeven)
    {
        $this->couponRelevanceLocationTextDynamicSeven = $couponRelevanceLocationTextDynamicSeven;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicSeven.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicSeven()
    {
        return $this->couponRelevanceLocationTextDynamicSeven;
    }

    /**
     * Set couponRelevanceLocationAddressSeven.

     *
     * @param string $couponRelevanceLocationAddressSeven
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressSeven($couponRelevanceLocationAddressSeven)
    {
        $this->couponRelevanceLocationAddressSeven = $couponRelevanceLocationAddressSeven;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSeven.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressSeven()
    {
        return $this->couponRelevanceLocationAddressSeven;
    }

    /**
     * Set couponRelevanceLocationTextDynamicEight.

     *
     * @param string $couponRelevanceLocationTextDynamicEight
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicEight($couponRelevanceLocationTextDynamicEight)
    {
        $this->couponRelevanceLocationTextDynamicEight = $couponRelevanceLocationTextDynamicEight;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicEight.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicEight()
    {
        return $this->couponRelevanceLocationTextDynamicEight;
    }

    /**
     * Set couponRelevanceLocationAddressEight.

     *
     * @param string $couponRelevanceLocationAddressEight
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressEight($couponRelevanceLocationAddressEight)
    {
        $this->couponRelevanceLocationAddressEight = $couponRelevanceLocationAddressEight;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressEight.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressEight()
    {
        return $this->couponRelevanceLocationAddressEight;
    }

    /**
     * Set couponRelevanceLocationTextDynamicNine.

     *
     * @param string $couponRelevanceLocationTextDynamicNine
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicNine($couponRelevanceLocationTextDynamicNine)
    {
        $this->couponRelevanceLocationTextDynamicNine = $couponRelevanceLocationTextDynamicNine;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicNine.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicNine()
    {
        return $this->couponRelevanceLocationTextDynamicNine;
    }

    /**
     * Set couponRelevanceLocationAddressNine.

     *
     * @param string $couponRelevanceLocationAddressNine
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressNine($couponRelevanceLocationAddressNine)
    {
        $this->couponRelevanceLocationAddressNine = $couponRelevanceLocationAddressNine;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressNine.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressNine()
    {
        return $this->couponRelevanceLocationAddressNine;
    }

    /**
     * Set couponRelevanceLocationTextDynamicTen.

     *
     * @param string $couponRelevanceLocationTextDynamicTen
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationTextDynamicTen($couponRelevanceLocationTextDynamicTen)
    {
        $this->couponRelevanceLocationTextDynamicTen = $couponRelevanceLocationTextDynamicTen;

        return $this;
    }

    /**
     * Get couponRelevanceLocationTextDynamicTen.

     *
     * @return string
     */
    public function getCouponRelevanceLocationTextDynamicTen()
    {
        return $this->couponRelevanceLocationTextDynamicTen;
    }

    /**
     * Set couponRelevanceLocationAddressTen.

     *
     * @param string $couponRelevanceLocationAddressTen
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressTen($couponRelevanceLocationAddressTen)
    {
        $this->couponRelevanceLocationAddressTen = $couponRelevanceLocationAddressTen;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTen.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressTen()
    {
        return $this->couponRelevanceLocationAddressTen;
    }

    /**
     * Set couponBarcodeDynamicValueStatus.

     *
     * @param string $couponBarcodeDynamicValueStatus
     *
     * @return mdynamic
     */
    public function setCouponBarcodeDynamicValueStatus($couponBarcodeDynamicValueStatus)
    {
        $this->couponBarcodeDynamicValueStatus = $couponBarcodeDynamicValueStatus;

        return $this;
    }

    /**
     * Get couponBarcodeDynamicValueStatus.

     *
     * @return string
     */
    public function getCouponBarcodeDynamicValueStatus()
    {
        return $this->couponBarcodeDynamicValueStatus;
    }

    /**
     * Set couponBarcodeAlternateDynamicTextStatus.

     *
     * @param string $couponBarcodeAlternateDynamicTextStatus
     *
     * @return mdynamic
     */
    public function setCouponBarcodeAlternateDynamicTextStatus($couponBarcodeAlternateDynamicTextStatus)
    {
        $this->couponBarcodeAlternateDynamicTextStatus = $couponBarcodeAlternateDynamicTextStatus;

        return $this;
    }

    /**
     * Get couponBarcodeAlternateDynamicTextStatus.

     *
     * @return string
     */
    public function getCouponBarcodeAlternateDynamicTextStatus()
    {
        return $this->couponBarcodeAlternateDynamicTextStatus;
    }

    /**
     * Set couponHeaderLabelDynamicStatus.

     *
     * @param string $couponHeaderLabelDynamicStatus
     *
     * @return mdynamic
     */
    public function setCouponHeaderLabelDynamicStatus($couponHeaderLabelDynamicStatus)
    {
        $this->couponHeaderLabelDynamicStatus = $couponHeaderLabelDynamicStatus;

        return $this;
    }

    /**
     * Get couponHeaderLabelDynamicStatus.

     *
     * @return string
     */
    public function getCouponHeaderLabelDynamicStatus()
    {
        return $this->couponHeaderLabelDynamicStatus;
    }

    /**
     * Set couponHeaderTextDynamicStatus.

     *
     * @param string $couponHeaderTextDynamicStatus
     *
     * @return mdynamic
     */
    public function setCouponHeaderTextDynamicStatus($couponHeaderTextDynamicStatus)
    {
        $this->couponHeaderTextDynamicStatus = $couponHeaderTextDynamicStatus;

        return $this;
    }

    /**
     * Get couponHeaderTextDynamicStatus.

     *
     * @return string
     */
    public function getCouponHeaderTextDynamicStatus()
    {
        return $this->couponHeaderTextDynamicStatus;
    }

    /**
     * Set couponPrimaryFieldLabelDynamicStatus.

     *
     * @param string $couponPrimaryFieldLabelDynamicStatus
     *
     * @return mdynamic
     */
    public function setCouponPrimaryFieldLabelDynamicStatus($couponPrimaryFieldLabelDynamicStatus)
    {
        $this->couponPrimaryFieldLabelDynamicStatus = $couponPrimaryFieldLabelDynamicStatus;

        return $this;
    }

    /**
     * Get couponPrimaryFieldLabelDynamicStatus.

     *
     * @return string
     */
    public function getCouponPrimaryFieldLabelDynamicStatus()
    {
        return $this->couponPrimaryFieldLabelDynamicStatus;
    }

    /**
     * Set couponPrimaryFieldTextDynamicStatus.

     *
     * @param string $couponPrimaryFieldTextDynamicStatus
     *
     * @return mdynamic
     */
    public function setCouponPrimaryFieldTextDynamicStatus($couponPrimaryFieldTextDynamicStatus)
    {
        $this->couponPrimaryFieldTextDynamicStatus = $couponPrimaryFieldTextDynamicStatus;

        return $this;
    }

    /**
     * Get couponPrimaryFieldTextDynamicStatus.

     *
     * @return string
     */
    public function getCouponPrimaryFieldTextDynamicStatus()
    {
        return $this->couponPrimaryFieldTextDynamicStatus;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicOneStatus.

     *
     * @param string $couponSecondaryFieldLabelDynamicOneStatus
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldLabelDynamicOneStatus($couponSecondaryFieldLabelDynamicOneStatus)
    {
        $this->couponSecondaryFieldLabelDynamicOneStatus = $couponSecondaryFieldLabelDynamicOneStatus;

        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicOneStatus.

     *
     * @return string
     */
    public function getCouponSecondaryFieldLabelDynamicOneStatus()
    {
        return $this->couponSecondaryFieldLabelDynamicOneStatus;
    }

    /**
     * Set couponSecondaryFieldTextDynamicOneStatus.

     *
     * @param string $couponSecondaryFieldTextDynamicOneStatus
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldTextDynamicOneStatus($couponSecondaryFieldTextDynamicOneStatus)
    {
        $this->couponSecondaryFieldTextDynamicOneStatus = $couponSecondaryFieldTextDynamicOneStatus;

        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicOneStatus.

     *
     * @return string
     */
    public function getCouponSecondaryFieldTextDynamicOneStatus()
    {
        return $this->couponSecondaryFieldTextDynamicOneStatus;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicTwoStatus.

     *
     * @param string $couponSecondaryFieldLabelDynamicTwoStatus
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldLabelDynamicTwoStatus($couponSecondaryFieldLabelDynamicTwoStatus)
    {
        $this->couponSecondaryFieldLabelDynamicTwoStatus = $couponSecondaryFieldLabelDynamicTwoStatus;

        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicTwoStatus.

     *
     * @return string
     */
    public function getCouponSecondaryFieldLabelDynamicTwoStatus()
    {
        return $this->couponSecondaryFieldLabelDynamicTwoStatus;
    }

    /**
     * Set couponSecondaryFieldTextDynamicTwoStatus.

     *
     * @param string $couponSecondaryFieldTextDynamicTwoStatus
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldTextDynamicTwoStatus($couponSecondaryFieldTextDynamicTwoStatus)
    {
        $this->couponSecondaryFieldTextDynamicTwoStatus = $couponSecondaryFieldTextDynamicTwoStatus;

        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicTwoStatus.

     *
     * @return string
     */
    public function getCouponSecondaryFieldTextDynamicTwoStatus()
    {
        return $this->couponSecondaryFieldTextDynamicTwoStatus;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicThreeStatus.

     *
     * @param string $couponSecondaryFieldLabelDynamicThreeStatus
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldLabelDynamicThreeStatus($couponSecondaryFieldLabelDynamicThreeStatus)
    {
        $this->couponSecondaryFieldLabelDynamicThreeStatus = $couponSecondaryFieldLabelDynamicThreeStatus;

        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicThreeStatus.

     *
     * @return string
     */
    public function getCouponSecondaryFieldLabelDynamicThreeStatus()
    {
        return $this->couponSecondaryFieldLabelDynamicThreeStatus;
    }

    /**
     * Set couponSecondaryFieldTextDynamicThreeStatus.

     *
     * @param string $couponSecondaryFieldTextDynamicThreeStatus
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldTextDynamicThreeStatus($couponSecondaryFieldTextDynamicThreeStatus)
    {
        $this->couponSecondaryFieldTextDynamicThreeStatus = $couponSecondaryFieldTextDynamicThreeStatus;

        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicThreeStatus.

     *
     * @return string
     */
    public function getCouponSecondaryFieldTextDynamicThreeStatus()
    {
        return $this->couponSecondaryFieldTextDynamicThreeStatus;
    }

    /**
     * Set couponSecondaryFieldLabelDynamicFourStatus.

     *
     * @param string $couponSecondaryFieldLabelDynamicFourStatus
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldLabelDynamicFourStatus($couponSecondaryFieldLabelDynamicFourStatus)
    {
        $this->couponSecondaryFieldLabelDynamicFourStatus = $couponSecondaryFieldLabelDynamicFourStatus;

        return $this;
    }

    /**
     * Get couponSecondaryFieldLabelDynamicFourStatus.

     *
     * @return string
     */
    public function getCouponSecondaryFieldLabelDynamicFourStatus()
    {
        return $this->couponSecondaryFieldLabelDynamicFourStatus;
    }

    /**
     * Set couponSecondaryFieldTextDynamicFourStatus.

     *
     * @param string $couponSecondaryFieldTextDynamicFourStatus
     *
     * @return mdynamic
     */
    public function setCouponSecondaryFieldTextDynamicFourStatus($couponSecondaryFieldTextDynamicFourStatus)
    {
        $this->couponSecondaryFieldTextDynamicFourStatus = $couponSecondaryFieldTextDynamicFourStatus;

        return $this;
    }

    /**
     * Get couponSecondaryFieldTextDynamicFourStatus.

     *
     * @return string
     */
    public function getCouponSecondaryFieldTextDynamicFourStatus()
    {
        return $this->couponSecondaryFieldTextDynamicFourStatus;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicOneStatus.

     *
     * @param string $couponAuxiliaryFieldLabelDynamicOneStatus
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldLabelDynamicOneStatus($couponAuxiliaryFieldLabelDynamicOneStatus)
    {
        $this->couponAuxiliaryFieldLabelDynamicOneStatus = $couponAuxiliaryFieldLabelDynamicOneStatus;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicOneStatus.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldLabelDynamicOneStatus()
    {
        return $this->couponAuxiliaryFieldLabelDynamicOneStatus;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicOneStatus.

     *
     * @param string $couponAuxiliaryFieldTextDynamicOneStatus
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldTextDynamicOneStatus($couponAuxiliaryFieldTextDynamicOneStatus)
    {
        $this->couponAuxiliaryFieldTextDynamicOneStatus = $couponAuxiliaryFieldTextDynamicOneStatus;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicOneStatus.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldTextDynamicOneStatus()
    {
        return $this->couponAuxiliaryFieldTextDynamicOneStatus;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicTwoStatus.

     *
     * @param string $couponAuxiliaryFieldLabelDynamicTwoStatus
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldLabelDynamicTwoStatus($couponAuxiliaryFieldLabelDynamicTwoStatus)
    {
        $this->couponAuxiliaryFieldLabelDynamicTwoStatus = $couponAuxiliaryFieldLabelDynamicTwoStatus;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicTwoStatus.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldLabelDynamicTwoStatus()
    {
        return $this->couponAuxiliaryFieldLabelDynamicTwoStatus;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicTwoStatus.

     *
     * @param string $couponAuxiliaryFieldTextDynamicTwoStatus
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldTextDynamicTwoStatus($couponAuxiliaryFieldTextDynamicTwoStatus)
    {
        $this->couponAuxiliaryFieldTextDynamicTwoStatus = $couponAuxiliaryFieldTextDynamicTwoStatus;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicTwoStatus.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldTextDynamicTwoStatus()
    {
        return $this->couponAuxiliaryFieldTextDynamicTwoStatus;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicThreeStatus.

     *
     * @param string $couponAuxiliaryFieldLabelDynamicThreeStatus
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldLabelDynamicThreeStatus($couponAuxiliaryFieldLabelDynamicThreeStatus)
    {
        $this->couponAuxiliaryFieldLabelDynamicThreeStatus = $couponAuxiliaryFieldLabelDynamicThreeStatus;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicThreeStatus.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldLabelDynamicThreeStatus()
    {
        return $this->couponAuxiliaryFieldLabelDynamicThreeStatus;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicThreeStatus.

     *
     * @param string $couponAuxiliaryFieldTextDynamicThreeStatus
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldTextDynamicThreeStatus($couponAuxiliaryFieldTextDynamicThreeStatus)
    {
        $this->couponAuxiliaryFieldTextDynamicThreeStatus = $couponAuxiliaryFieldTextDynamicThreeStatus;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicThreeStatus.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldTextDynamicThreeStatus()
    {
        return $this->couponAuxiliaryFieldTextDynamicThreeStatus;
    }

    /**
     * Set couponAuxiliaryFieldLabelDynamicFourStatus.

     *
     * @param string $couponAuxiliaryFieldLabelDynamicFourStatus
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldLabelDynamicFourStatus($couponAuxiliaryFieldLabelDynamicFourStatus)
    {
        $this->couponAuxiliaryFieldLabelDynamicFourStatus = $couponAuxiliaryFieldLabelDynamicFourStatus;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldLabelDynamicFourStatus.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldLabelDynamicFourStatus()
    {
        return $this->couponAuxiliaryFieldLabelDynamicFourStatus;
    }

    /**
     * Set couponAuxiliaryFieldTextDynamicFourStatus.

     *
     * @param string $couponAuxiliaryFieldTextDynamicFourStatus
     *
     * @return mdynamic
     */
    public function setCouponAuxiliaryFieldTextDynamicFourStatus($couponAuxiliaryFieldTextDynamicFourStatus)
    {
        $this->couponAuxiliaryFieldTextDynamicFourStatus = $couponAuxiliaryFieldTextDynamicFourStatus;

        return $this;
    }

    /**
     * Get couponAuxiliaryFieldTextDynamicFourStatus.

     *
     * @return string
     */
    public function getCouponAuxiliaryFieldTextDynamicFourStatus()
    {
        return $this->couponAuxiliaryFieldTextDynamicFourStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicOneStatus.

     *
     * @param string $couponBackFieldLabelDynamicOneStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicOneStatus($couponBackFieldLabelDynamicOneStatus)
    {
        $this->couponBackFieldLabelDynamicOneStatus = $couponBackFieldLabelDynamicOneStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicOneStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicOneStatus()
    {
        return $this->couponBackFieldLabelDynamicOneStatus;
    }

    /**
     * Set couponBackFieldTextDynamicOneStatus.

     *
     * @param string $couponBackFieldTextDynamicOneStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicOneStatus($couponBackFieldTextDynamicOneStatus)
    {
        $this->couponBackFieldTextDynamicOneStatus = $couponBackFieldTextDynamicOneStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicOneStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicOneStatus()
    {
        return $this->couponBackFieldTextDynamicOneStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicTwoStatus.

     *
     * @param string $couponBackFieldLabelDynamicTwoStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicTwoStatus($couponBackFieldLabelDynamicTwoStatus)
    {
        $this->couponBackFieldLabelDynamicTwoStatus = $couponBackFieldLabelDynamicTwoStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicTwoStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicTwoStatus()
    {
        return $this->couponBackFieldLabelDynamicTwoStatus;
    }

    /**
     * Set couponBackFieldTextDynamicTwoStatus.

     *
     * @param string $couponBackFieldTextDynamicTwoStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicTwoStatus($couponBackFieldTextDynamicTwoStatus)
    {
        $this->couponBackFieldTextDynamicTwoStatus = $couponBackFieldTextDynamicTwoStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicTwoStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicTwoStatus()
    {
        return $this->couponBackFieldTextDynamicTwoStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicThreeStatus.

     *
     * @param string $couponBackFieldLabelDynamicThreeStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicThreeStatus($couponBackFieldLabelDynamicThreeStatus)
    {
        $this->couponBackFieldLabelDynamicThreeStatus = $couponBackFieldLabelDynamicThreeStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicThreeStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicThreeStatus()
    {
        return $this->couponBackFieldLabelDynamicThreeStatus;
    }

    /**
     * Set couponBackFieldTextDynamicThreeStatus.

     *
     * @param string $couponBackFieldTextDynamicThreeStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicThreeStatus($couponBackFieldTextDynamicThreeStatus)
    {
        $this->couponBackFieldTextDynamicThreeStatus = $couponBackFieldTextDynamicThreeStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicThreeStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicThreeStatus()
    {
        return $this->couponBackFieldTextDynamicThreeStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicFourStatus.

     *
     * @param string $couponBackFieldLabelDynamicFourStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicFourStatus($couponBackFieldLabelDynamicFourStatus)
    {
        $this->couponBackFieldLabelDynamicFourStatus = $couponBackFieldLabelDynamicFourStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicFourStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicFourStatus()
    {
        return $this->couponBackFieldLabelDynamicFourStatus;
    }

    /**
     * Set couponBackFieldTextDynamicFourStatus.

     *
     * @param string $couponBackFieldTextDynamicFourStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicFourStatus($couponBackFieldTextDynamicFourStatus)
    {
        $this->couponBackFieldTextDynamicFourStatus = $couponBackFieldTextDynamicFourStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicFourStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicFourStatus()
    {
        return $this->couponBackFieldTextDynamicFourStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicFiveStatus.

     *
     * @param string $couponBackFieldLabelDynamicFiveStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicFiveStatus($couponBackFieldLabelDynamicFiveStatus)
    {
        $this->couponBackFieldLabelDynamicFiveStatus = $couponBackFieldLabelDynamicFiveStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicFiveStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicFiveStatus()
    {
        return $this->couponBackFieldLabelDynamicFiveStatus;
    }

    /**
     * Set couponBackFieldTextDynamicFiveStatus.

     *
     * @param string $couponBackFieldTextDynamicFiveStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicFiveStatus($couponBackFieldTextDynamicFiveStatus)
    {
        $this->couponBackFieldTextDynamicFiveStatus = $couponBackFieldTextDynamicFiveStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicFiveStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicFiveStatus()
    {
        return $this->couponBackFieldTextDynamicFiveStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicSixStatus.

     *
     * @param string $couponBackFieldLabelDynamicSixStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicSixStatus($couponBackFieldLabelDynamicSixStatus)
    {
        $this->couponBackFieldLabelDynamicSixStatus = $couponBackFieldLabelDynamicSixStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicSixStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicSixStatus()
    {
        return $this->couponBackFieldLabelDynamicSixStatus;
    }

    /**
     * Set couponBackFieldTextDynamicSixStatus.

     *
     * @param string $couponBackFieldTextDynamicSixStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicSixStatus($couponBackFieldTextDynamicSixStatus)
    {
        $this->couponBackFieldTextDynamicSixStatus = $couponBackFieldTextDynamicSixStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicSixStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicSixStatus()
    {
        return $this->couponBackFieldTextDynamicSixStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicSevenStatus.

     *
     * @param string $couponBackFieldLabelDynamicSevenStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicSevenStatus($couponBackFieldLabelDynamicSevenStatus)
    {
        $this->couponBackFieldLabelDynamicSevenStatus = $couponBackFieldLabelDynamicSevenStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicSevenStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicSevenStatus()
    {
        return $this->couponBackFieldLabelDynamicSevenStatus;
    }

    /**
     * Set couponBackFieldTextDynamicSevenStatus.

     *
     * @param string $couponBackFieldTextDynamicSevenStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicSevenStatus($couponBackFieldTextDynamicSevenStatus)
    {
        $this->couponBackFieldTextDynamicSevenStatus = $couponBackFieldTextDynamicSevenStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicSevenStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicSevenStatus()
    {
        return $this->couponBackFieldTextDynamicSevenStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicEightStatus.

     *
     * @param string $couponBackFieldLabelDynamicEightStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicEightStatus($couponBackFieldLabelDynamicEightStatus)
    {
        $this->couponBackFieldLabelDynamicEightStatus = $couponBackFieldLabelDynamicEightStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicEightStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicEightStatus()
    {
        return $this->couponBackFieldLabelDynamicEightStatus;
    }

    /**
     * Set couponBackFieldTextDynamicEightStatus.

     *
     * @param string $couponBackFieldTextDynamicEightStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicEightStatus($couponBackFieldTextDynamicEightStatus)
    {
        $this->couponBackFieldTextDynamicEightStatus = $couponBackFieldTextDynamicEightStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicEightStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicEightStatus()
    {
        return $this->couponBackFieldTextDynamicEightStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicNineStatus.

     *
     * @param string $couponBackFieldLabelDynamicNineStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicNineStatus($couponBackFieldLabelDynamicNineStatus)
    {
        $this->couponBackFieldLabelDynamicNineStatus = $couponBackFieldLabelDynamicNineStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicNineStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicNineStatus()
    {
        return $this->couponBackFieldLabelDynamicNineStatus;
    }

    /**
     * Set couponBackFieldTextDynamicNineStatus.

     *
     * @param string $couponBackFieldTextDynamicNineStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicNineStatus($couponBackFieldTextDynamicNineStatus)
    {
        $this->couponBackFieldTextDynamicNineStatus = $couponBackFieldTextDynamicNineStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicNineStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicNineStatus()
    {
        return $this->couponBackFieldTextDynamicNineStatus;
    }

    /**
     * Set couponBackFieldLabelDynamicTenStatus.

     *
     * @param string $couponBackFieldLabelDynamicTenStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldLabelDynamicTenStatus($couponBackFieldLabelDynamicTenStatus)
    {
        $this->couponBackFieldLabelDynamicTenStatus = $couponBackFieldLabelDynamicTenStatus;

        return $this;
    }

    /**
     * Get couponBackFieldLabelDynamicTenStatus.

     *
     * @return string
     */
    public function getCouponBackFieldLabelDynamicTenStatus()
    {
        return $this->couponBackFieldLabelDynamicTenStatus;
    }

    /**
     * Set couponBackFieldTextDynamicTenStatus.

     *
     * @param string $couponBackFieldTextDynamicTenStatus
     *
     * @return mdynamic
     */
    public function setCouponBackFieldTextDynamicTenStatus($couponBackFieldTextDynamicTenStatus)
    {
        $this->couponBackFieldTextDynamicTenStatus = $couponBackFieldTextDynamicTenStatus;

        return $this;
    }

    /**
     * Get couponBackFieldTextDynamicTenStatus.

     *
     * @return string
     */
    public function getCouponBackFieldTextDynamicTenStatus()
    {
        return $this->couponBackFieldTextDynamicTenStatus;
    }

    /**
     * Set couponRelevanceLocationAddressOneStatus.

     *
     * @param string $couponRelevanceLocationAddressOneStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressOneStatus($couponRelevanceLocationAddressOneStatus)
    {
        $this->couponRelevanceLocationAddressOneStatus = $couponRelevanceLocationAddressOneStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressOneStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressOneStatus()
    {
        return $this->couponRelevanceLocationAddressOneStatus;
    }

    /**
     * Set couponRelevanceLocationAddressTwoStatus.

     *
     * @param string $couponRelevanceLocationAddressTwoStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressTwoStatus($couponRelevanceLocationAddressTwoStatus)
    {
        $this->couponRelevanceLocationAddressTwoStatus = $couponRelevanceLocationAddressTwoStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTwoStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressTwoStatus()
    {
        return $this->couponRelevanceLocationAddressTwoStatus;
    }

    /**
     * Set couponRelevanceLocationAddressThreeStatus.

     *
     * @param string $couponRelevanceLocationAddressThreeStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressThreeStatus($couponRelevanceLocationAddressThreeStatus)
    {
        $this->couponRelevanceLocationAddressThreeStatus = $couponRelevanceLocationAddressThreeStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressThreeStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressThreeStatus()
    {
        return $this->couponRelevanceLocationAddressThreeStatus;
    }

    /**
     * Set couponRelevanceLocationAddressFourStatus.

     *
     * @param string $couponRelevanceLocationAddressFourStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressFourStatus($couponRelevanceLocationAddressFourStatus)
    {
        $this->couponRelevanceLocationAddressFourStatus = $couponRelevanceLocationAddressFourStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFourStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressFourStatus()
    {
        return $this->couponRelevanceLocationAddressFourStatus;
    }

    /**
     * Set couponRelevanceLocationAddressFiveStatus.

     *
     * @param string $couponRelevanceLocationAddressFiveStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressFiveStatus($couponRelevanceLocationAddressFiveStatus)
    {
        $this->couponRelevanceLocationAddressFiveStatus = $couponRelevanceLocationAddressFiveStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressFiveStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressFiveStatus()
    {
        return $this->couponRelevanceLocationAddressFiveStatus;
    }

    /**
     * Set couponRelevanceLocationAddressSixStatus.

     *
     * @param string $couponRelevanceLocationAddressSixStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressSixStatus($couponRelevanceLocationAddressSixStatus)
    {
        $this->couponRelevanceLocationAddressSixStatus = $couponRelevanceLocationAddressSixStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSixStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressSixStatus()
    {
        return $this->couponRelevanceLocationAddressSixStatus;
    }

    /**
     * Set couponRelevanceLocationAddressSevenStatus.

     *
     * @param string $couponRelevanceLocationAddressSevenStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressSevenStatus($couponRelevanceLocationAddressSevenStatus)
    {
        $this->couponRelevanceLocationAddressSevenStatus = $couponRelevanceLocationAddressSevenStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressSevenStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressSevenStatus()
    {
        return $this->couponRelevanceLocationAddressSevenStatus;
    }

    /**
     * Set couponRelevanceLocationAddressEightStatus.

     *
     * @param string $couponRelevanceLocationAddressEightStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressEightStatus($couponRelevanceLocationAddressEightStatus)
    {
        $this->couponRelevanceLocationAddressEightStatus = $couponRelevanceLocationAddressEightStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressEightStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressEightStatus()
    {
        return $this->couponRelevanceLocationAddressEightStatus;
    }

    /**
     * Set couponRelevanceLocationAddressNineStatus.

     *
     * @param string $couponRelevanceLocationAddressNineStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressNineStatus($couponRelevanceLocationAddressNineStatus)
    {
        $this->couponRelevanceLocationAddressNineStatus = $couponRelevanceLocationAddressNineStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressNineStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressNineStatus()
    {
        return $this->couponRelevanceLocationAddressNineStatus;
    }

    /**
     * Set couponRelevanceLocationAddressTenStatus.

     *
     * @param string $couponRelevanceLocationAddressTenStatus
     *
     * @return mdynamic
     */
    public function setCouponRelevanceLocationAddressTenStatus($couponRelevanceLocationAddressTenStatus)
    {
        $this->couponRelevanceLocationAddressTenStatus = $couponRelevanceLocationAddressTenStatus;

        return $this;
    }

    /**
     * Get couponRelevanceLocationAddressTenStatus.

     *
     * @return string
     */
    public function getCouponRelevanceLocationAddressTenStatus()
    {
        return $this->couponRelevanceLocationAddressTenStatus;
    }
}

