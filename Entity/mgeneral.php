<?php

namespace Kamran\PassbookBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * mgeneral
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mgeneral
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
     * @ORM\Column(name="landing_page", type="boolean", nullable=true)
     */
    private $landingPage;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string",length=255, nullable=true)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string",length=255, nullable=true)
     */
    private $userEmail;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var \DateTime
     *
     * @ORM\Column(name="pass_generation_date", type="datetime", nullable=true)
     */
    private $passGenerationDate;

    /**
     *
     * @Gedmo\Timestampable(on="update")
     * @var \DateTime
     *
     * @ORM\Column(name="pass_upgrade_date", type="datetime", nullable=true)
     */
    private $passUpgradeDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="client_id", type="integer", nullable=true)
    */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="template_name", type="string", length=255, nullable=true)
     */
    private $templateName;

    /**
     * @ORM\Column(name="pass_key", type="string", length=255, nullable=true)
     * @var string
     *
     */
   private $passKey;

    /**
     * @var string
     *
     * @ORM\Column(name="category_name", type="string", length=255, nullable=true)
     */
    private $categoryName;

    /**
     * @var string
     *
     * @ORM\Column(name="places", type="string", length=255, nullable=true)
     */
    private $places;

    /**
    * @var string
     *
     * @ORM\Column(name="boarding_pass_transit", type="string", length=255, nullable=true)
     */
    private $boardingPassTransit;

    /**
     * @var string
     *
     * @ORM\Column(name="organization_name", type="string", length=255, nullable=true)
     */
    private $organizationName;

    /**
     * @var string
     *
     * @ORM\Column(name="organization_description", type="string", length=255, nullable=true)
     */
    private $organizationDescription;

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
     * @return mgeneral
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
     * Set landingPage
     *
     * @param string $landingPage
     *
     * @return mgeneral
     */
    public function setLandingPage($landingPage)
    {
        $this->landingPage = $landingPage;

        return $this;
    }

    /**
     * Get landingPage
     *
     * @return string
     */
    public function getLandingPage()
    {
        return $this->landingPage;
    }
    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return mgeneral
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }
    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return mgeneral
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }
    /**
     * Set userEmail
     *
     * @param string $userEmail
     *
     * @return mgeneral
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set passGenerationDate
     *
     * @param \DateTime $passGenerationDate
     *
     * @return mgeneral
     */
    public function setPassGenerationDate($passGenerationDate)
    {
        $this->passGenerationDate = $passGenerationDate;
        return $this;
    }

    /**
     * Get passGenerationDate
     *
     * @return \DateTime
     */
    public function getPassGenerationDate()
    {
        return $this->passGenerationDate;
    }

    /**
     * Set passUpgradeDate
     *
     * @param \DateTime $passUpgradeDate
     *
     * @return mgeneral
     */
    public function setPassUpgradeDate($passUpgradeDate)
    {
        $this->passUpgradeDate = $passUpgradeDate;

        return $this;
    }

    /**
     * Get passUpgradeDate
     *
     * @return \DateTime
     */
    public function getPassUpgradeDate()
    {
        return $this->passUpgradeDate;
    }

    /**
     * Set clientId
     *
     * @param integer $clientId
     *
     * @return mgeneral
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return integer
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set templateName
     *
     * @param string $templateName
     *
     * @return mgeneral
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;

        return $this;
    }

    /**
     * Get templateName
     *
     * @return string
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * Set passKey
     *
     * @param string $passKey
     *
     * @return mgeneral
     */
    public function setPassKey($passKey)
    {
        $this->passKey = $passKey;

        return $this;
    }

    /**
     * Get passKey
     *
     * @return string
     */
    public function getPassKey()
    {
        return $this->passKey;
    }

    /**
     * Set categoryName
     *
     * @param string $categoryName
     *
     * @return mgeneral
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }


    /**
     * Set places
     *
     * @param string $places
     *
     * @return mgeneral
     */
    public function setPlaces($places)
    {
        $this->places = $places;

        return $this;
    }

    /**
     * Get places
     *
     * @return string
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * Set boardingPassTransit
     *
     * @param string $boardingPassTransit
     *
     * @return mgeneral
     */
    public function setBoardingPassTransit($boardingPassTransit)
    {
        $this->boardingPassTransit = $boardingPassTransit;

        return $this;
    }

    /**
     * Get boardingPassTransit
     *
     * @return string
     */
    public function getBoardingPassTransit()
    {
        return $this->boardingPassTransit;
    }

    /**
     * Set organizationName
     *
     * @param string $organizationName
     *
     * @return mgeneral
     */
    public function setOrganizationName($organizationName)
    {
        $this->organizationName = $organizationName;

        return $this;
    }

    /**
     * Get organizationName
     *
     * @return string
     */
    public function getOrganizationName()
    {
        return $this->organizationName;
    }

    /**
     * Set organizationDescription
     *
     * @param string $organizationDescription
     *
     * @return mgeneral
     */
    public function setOrganizationDescription($organizationDescription)
    {
        $this->organizationDescription = $organizationDescription;

        return $this;
    }

    /**
     * Get organizationDescription
     *
     * @return string
     */
    public function getOrganizationDescription()
    {
        return $this->organizationDescription;
    }
}

