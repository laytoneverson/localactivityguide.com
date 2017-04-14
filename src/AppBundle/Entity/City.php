<?php
namespace AppBundle\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class City extends Place
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
    private $cityName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $websiteUrl;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostalCode", mappedBy="city")
     */
    private $postalCodes;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ActivityRegion", inversedBy="regionCities")
     * @ORM\JoinColumn(name="activity_region_id", referencedColumnName="id", nullable=false)
     */
    private $activityRegion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\County", inversedBy="cities")
     * @ORM\JoinColumn(name="county_id", referencedColumnName="id")
     * 
     */
    private $county;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postalCodes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cityName
     *
     * @param string $cityName
     *
     * @return City
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * Get cityName
     *
     * @return string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Set websiteUrl
     *
     * @param string $websiteUrl
     *
     * @return City
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    /**
     * Get websiteUrl
     *
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * Add postalCode
     *
     * @param \AppBundle\Entity\PostalCode $postalCode
     *
     * @return City
     */
    public function addPostalCode(\AppBundle\Entity\PostalCode $postalCode)
    {
        $this->postalCodes[] = $postalCode;

        return $this;
    }

    /**
     * Remove postalCode
     *
     * @param \AppBundle\Entity\PostalCode $postalCode
     */
    public function removePostalCode(\AppBundle\Entity\PostalCode $postalCode)
    {
        $this->postalCodes->removeElement($postalCode);
    }

    /**
     * Get postalCodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostalCodes()
    {
        return $this->postalCodes;
    }

    /**
     * Set activityRegion
     *
     * @param \AppBundle\Entity\ActivityRegion $activityRegion
     *
     * @return City
     */
    public function setActivityRegion(\AppBundle\Entity\ActivityRegion $activityRegion)
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
     * Set county
     *
     * @param \AppBundle\Entity\County $county
     *
     * @return City
     */
    public function setCounty(\AppBundle\Entity\County $county = null)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get county
     *
     * @return \AppBundle\Entity\County
     */
    public function getCounty()
    {
        return $this->county;
    }
}
