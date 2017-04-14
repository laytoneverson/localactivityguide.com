<?php
namespace AppBundle\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class PostalCode
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $countryCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $placeName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $adminStateName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $adminStateCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $adminCountyCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $adminCountName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $communitySubdivisionCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $commuinitySubdivisionName;

    /**
     * 
     */
    private $communitySubdivisionName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $county_id;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostalAddress", mappedBy="postalCode")
     */
    private $postalAddress;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ActivityRegion", inversedBy="postalCodes")
     * @ORM\JoinColumn(name="activity_region_id", referencedColumnName="id")
     */
    private $activityRegion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country", inversedBy="postalCodes")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\City", inversedBy="postalCodes")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\State", inversedBy="postalCodes")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    private $state;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postalAddress = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set countryCode
     *
     * @param string $countryCode
     *
     * @return PostalCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return PostalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set placeName
     *
     * @param string $placeName
     *
     * @return PostalCode
     */
    public function setPlaceName($placeName)
    {
        $this->placeName = $placeName;

        return $this;
    }

    /**
     * Get placeName
     *
     * @return string
     */
    public function getPlaceName()
    {
        return $this->placeName;
    }

    /**
     * Set adminStateName
     *
     * @param string $adminStateName
     *
     * @return PostalCode
     */
    public function setAdminStateName($adminStateName)
    {
        $this->adminStateName = $adminStateName;

        return $this;
    }

    /**
     * Get adminStateName
     *
     * @return string
     */
    public function getAdminStateName()
    {
        return $this->adminStateName;
    }

    /**
     * Set adminStateCode
     *
     * @param string $adminStateCode
     *
     * @return PostalCode
     */
    public function setAdminStateCode($adminStateCode)
    {
        $this->adminStateCode = $adminStateCode;

        return $this;
    }

    /**
     * Get adminStateCode
     *
     * @return string
     */
    public function getAdminStateCode()
    {
        return $this->adminStateCode;
    }

    /**
     * Set adminCountyCode
     *
     * @param string $adminCountyCode
     *
     * @return PostalCode
     */
    public function setAdminCountyCode($adminCountyCode)
    {
        $this->adminCountyCode = $adminCountyCode;

        return $this;
    }

    /**
     * Get adminCountyCode
     *
     * @return string
     */
    public function getAdminCountyCode()
    {
        return $this->adminCountyCode;
    }

    /**
     * Set adminCountName
     *
     * @param string $adminCountName
     *
     * @return PostalCode
     */
    public function setAdminCountName($adminCountName)
    {
        $this->adminCountName = $adminCountName;

        return $this;
    }

    /**
     * Get adminCountName
     *
     * @return string
     */
    public function getAdminCountName()
    {
        return $this->adminCountName;
    }

    /**
     * Set communitySubdivisionCode
     *
     * @param string $communitySubdivisionCode
     *
     * @return PostalCode
     */
    public function setCommunitySubdivisionCode($communitySubdivisionCode)
    {
        $this->communitySubdivisionCode = $communitySubdivisionCode;

        return $this;
    }

    /**
     * Get communitySubdivisionCode
     *
     * @return string
     */
    public function getCommunitySubdivisionCode()
    {
        return $this->communitySubdivisionCode;
    }

    /**
     * Set commuinitySubdivisionName
     *
     * @param string $commuinitySubdivisionName
     *
     * @return PostalCode
     */
    public function setCommuinitySubdivisionName($commuinitySubdivisionName)
    {
        $this->commuinitySubdivisionName = $commuinitySubdivisionName;

        return $this;
    }

    /**
     * Get commuinitySubdivisionName
     *
     * @return string
     */
    public function getCommuinitySubdivisionName()
    {
        return $this->commuinitySubdivisionName;
    }

    /**
     * Set countyId
     *
     * @param integer $countyId
     *
     * @return PostalCode
     */
    public function setCountyId($countyId)
    {
        $this->county_id = $countyId;

        return $this;
    }

    /**
     * Get countyId
     *
     * @return integer
     */
    public function getCountyId()
    {
        return $this->county_id;
    }

    /**
     * Add postalAddress
     *
     * @param \AppBundle\Entity\PostalAddress $postalAddress
     *
     * @return PostalCode
     */
    public function addPostalAddress(\AppBundle\Entity\PostalAddress $postalAddress)
    {
        $this->postalAddress[] = $postalAddress;

        return $this;
    }

    /**
     * Remove postalAddress
     *
     * @param \AppBundle\Entity\PostalAddress $postalAddress
     */
    public function removePostalAddress(\AppBundle\Entity\PostalAddress $postalAddress)
    {
        $this->postalAddress->removeElement($postalAddress);
    }

    /**
     * Get postalAddress
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * Set activityRegion
     *
     * @param \AppBundle\Entity\ActivityRegion $activityRegion
     *
     * @return PostalCode
     */
    public function setActivityRegion(\AppBundle\Entity\ActivityRegion $activityRegion = null)
    {
        $this->activityRegion = $activityRegion;

        return $this;
    }

    /**
     * Get activityRegion
     *
     * @return \AppBundle\Entity\ActivityRegion
     */
    public function getActivityRegion()
    {
        return $this->activityRegion;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return PostalCode
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return PostalCode
     */
    public function setCity(\AppBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param \AppBundle\Entity\State $state
     *
     * @return PostalCode
     */
    public function setState(\AppBundle\Entity\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \AppBundle\Entity\State
     */
    public function getState()
    {
        return $this->state;
    }
}
