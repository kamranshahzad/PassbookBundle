<?php

namespace Kamran\PassbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * mdistribution
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mdistribution
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
     * @var integer
     *
     * @ORM\Column(name="coupon_id", type="string",length=255, nullable=true)
     */
    private $couponId;

    /**
     * @var string
     *
     * @ORM\Column(name="distribution_status", type="boolean" , nullable=true)
     */
    private $distributionStatus;
    /**
     * @var string
     *
     * @ORM\Column(name="pass_link_type", type="string", length=255 , nullable=true)
     */
    private $passLinkType;

    /**
     * @var string
     *
     * @ORM\Column(name="restrict_multiple", type="boolean" , nullable=true)
     */
    private $restrictMultiple;

    /**
     * @var string
     *
     * @ORM\Column(name="void_passes", type="boolean", nullable=true)
     */
    private $voidPasses;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \Date
     *
     * @ORM\Column(name="pass_expiration_date", type="date" , nullable=true)
     */
    private $passExpirationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity_restriction", type="string", length=255 , nullable=true)
     */
    private $quantityRestriction;

    /**
     * @var string
     *
     * @ORM\Column(name="limit_value", type="string", length=255 , nullable=true)
     */
    private $limitValue;

    /**
     * @var string
     *
     * @ORM\Column(name="date_restriction", type="string", length=255 , nullable=true)
     */
    private $dateRestriction;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \Date
     *
     * @ORM\Column(name="restricted_date", type="date" , nullable=true)
     */
    private $restrictedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="password_issue_status", type="string", length=255 , nullable=true)
     */
    private $passwordIssueStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="fixed_issue_password", type="string", length=255 , nullable=true)
     */
    private $fixedIssuePassword;

    /**
     * @var string
     *
     * @ORM\Column(name="single_use_passwords", type="string", length=255 , nullable=true)
     */
    private $singleUsePasswords;

    /**
     * @var string
     *
     * @ORM\Column(name="password_update_status", type="string", length=255 , nullable=true)
     */
    private $passwordUpdateStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="fixed_update_password", type="string", length=255 , nullable=true)
     */
    private $fixedUpdatePassword;


    /**
     * @var string
     *
     * @ORM\Column(name="short_url", type="string", length=255 , nullable=true)
     */
    private $shortUrl;


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
     * @param integer $couponId
     *
     * @return mdistribution
     */
    public function setCouponId($couponId)
    {
        $this->couponId = $couponId;

        return $this;
    }

    /**
     * Get couponId
     *
     * @return integer
     */
    public function getCouponId()
    {
        return $this->couponId;
    }
    /**
     * Set distributionStatus
     *
     * @param string $distributionStatus
     *
     * @return mdistribution
     */
    public function setDistributionStatus($distributionStatus)
    {
        $this->distributionStatus = $distributionStatus;

        return $this;
    }

    /**
     * Get distributionStatus
     *
     * @return string
     */
    public function getDistributionStatus()
    {
        return (bool)$this->distributionStatus;
    }
    /**
     * Set passLinkType
     *
     * @param string $passLinkType
     *
     * @return mdistribution
     */
    public function setPassLinkType($passLinkType)
    {
        $this->passLinkType = $passLinkType;

        return $this;
    }

    /**
     * Get passLinkType
     *
     * @return string
     */
    public function getPassLinkType()
    {
        return $this->passLinkType;
    }

    /**
     * Set restrictMultiple
     *
     * @param string $restrictMultiple
     *
     * @return mdistribution
     */
    public function setRestrictMultiple($restrictMultiple)
    {
        $this->restrictMultiple = $restrictMultiple;

        return $this;
    }

    /**
     * Get restrictMultiple
     *
     * @return string
     */
    public function getRestrictMultiple()
    {
        return (bool)$this->restrictMultiple;
    }

    /**
     * Set voidPasses
     *
     * @param string $voidPasses
     *
     * @return mdistribution
     */
    public function setVoidPasses($voidPasses)
    {
        $this->voidPasses = $voidPasses;

        return $this;
    }

    /**
     * Get voidPasses
     *
     * @return string
     */
    public function getVoidPasses()
    {
        return (bool)$this->voidPasses;
    }

    /**
     * Set passExpirationDate
     *
     * @param \Date $passExpirationDate
     *
     * @return mdistribution
     */
    public function setPassExpirationDate($passExpirationDate)
    {
        $this->passExpirationDate = $passExpirationDate;

        return $this;
    }

    /**
     * Get passExpirationDate
     *
     * @return \Date
     */
    public function getPassExpirationDate()
    {
        return $this->passExpirationDate;
    }

    /**
     * Set quantityRestriction
     *
     * @param string $quantityRestriction
     *
     * @return mdistribution
     */
    public function setQuantityRestriction($quantityRestriction)
    {
        $this->quantityRestriction = $quantityRestriction;

        return $this;
    }

    /**
     * Get quantityRestriction
     *
     * @return string
     */
    public function getQuantityRestriction()
    {
        return $this->quantityRestriction;
    }

    /**
     * Set limitValue
     *
     * @param string $limitValue
     *
     * @return mdistribution
     */
    public function setLimitValue($limitValue)
    {
        $this->limitValue = $limitValue;

        return $this;
    }

    /**
     * Get limitValue
     *
     * @return string
     */
    public function getLimitValue()
    {
        return $this->limitValue;
    }

    /**
     * Set dateRestriction
     *
     * @param string $dateRestriction
     *
     * @return mdistribution
     */
    public function setDateRestriction($dateRestriction)
    {
        $this->dateRestriction = $dateRestriction;

        return $this;
    }

    /**
     * Get dateRestriction
     *
     * @return string
     */
    public function getDateRestriction()
    {
        return $this->dateRestriction;
    }

    /**
     * Set restrictedDate
     *
     * @param \Date $restrictedDate
     *
     * @return mdistribution
     */
    public function setRestrictedDate($restrictedDate)
    {
        $this->restrictedDate = $restrictedDate;

        return $this;
    }

    /**
     * Get restrictedDate
     *
     * @return \Date
     */
    public function getRestrictedDate()
    {
        return $this->restrictedDate;
    }

    /**
     * Set passwordIssueStatus
     *
     * @param string $passwordIssueStatus
     *
     * @return mdistribution
     */
    public function setPasswordIssueStatus($passwordIssueStatus)
    {
        $this->passwordIssueStatus = $passwordIssueStatus;

        return $this;
    }

    /**
     * Get passwordIssueStatus
     *
     * @return string
     */
    public function getPasswordIssueStatus()
    {
        return $this->passwordIssueStatus;
    }

    /**
     * Set fixedIssuePassword
     *
     * @param string $fixedIssuePassword
     *
     * @return mdistribution
     */
    public function setFixedIssuePassword($fixedIssuePassword)
    {
        $this->fixedIssuePassword = $fixedIssuePassword;

        return $this;
    }

    /**
     * Get fixedIssuePassword
     *
     * @return string
     */
    public function getFixedIssuePassword()
    {
        return $this->fixedIssuePassword;
    }

    /**
     * Set singleUsePasswords
     *
     * @param string $singleUsePasswords
     *
     * @return mdistribution
     */
    public function setSingleUsePasswords($singleUsePasswords)
    {
        $this->singleUsePasswords = $singleUsePasswords;

        return $this;
    }

    /**
     * Get singleUsePasswords
     *
     * @return string
     */
    public function getSingleUsePasswords()
    {
        return $this->singleUsePasswords;
    }

    /**
     * Set passwordUpdateStatus
     *
     * @param string $passwordUpdateStatus
     *
     * @return mdistribution
     */
    public function setPasswordUpdateStatus($passwordUpdateStatus)
    {
        $this->passwordUpdateStatus = $passwordUpdateStatus;

        return $this;
    }

    /**
     * Get passwordUpdateStatus
     *
     * @return string
     */
    public function getPasswordUpdateStatus()
    {
        return $this->passwordUpdateStatus;
    }

    /**
     * Set fixedUpdatePassword
     *
     * @param string $fixedUpdatePassword
     *
     * @return mdistribution
     */
    public function setFixedUpdatePassword($fixedUpdatePassword)
    {
        $this->fixedUpdatePassword = $fixedUpdatePassword;

        return $this;
    }

    /**
     * Get fixedUpdatePassword
     *
     * @return string
     */
    public function getFixedUpdatePassword()
    {
        return $this->fixedUpdatePassword;
    }


    /**
     * Set shortUrl
     *
     * @param string $shortUrl
     *
     * @return mdistribution
     */
    public function setShortUrl($shortUrl){
        $this->shortUrl = $shortUrl;
        return $this;
    }

    /**
     * Get shortUrl
     *
     * @return string
     */
    public function getShortUrl(){
        return $this->shortUrl;
    }



}

