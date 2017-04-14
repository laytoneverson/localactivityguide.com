<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class State
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $websiteUrl;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ActivityRegion", mappedBy="state")
     */
    private $activityRegions;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\County", mappedBy="state")
     */
    private $counties;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostalCode", mappedBy="state")
     */
    private $postalCodes;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country", inversedBy="states")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * 
     */
    private $country;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activityRegions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->counties = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set code
     *
     * @param string $code
     *
     * @return State
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return State
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set websiteUrl
     *
     * @param string $websiteUrl
     *
     * @return State
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
     * Add activityRegion
     *
     * @param \AppBundle\Entity\ActivityRegion $activityRegion
     *
     * @return State
     */
    public function addActivityRegion(\AppBundle\Entity\ActivityRegion $activityRegion)
    {
        $this->activityRegions[] = $activityRegion;

        return $this;
    }

    /**
     * Remove activityRegion
     *
     * @param \AppBundle\Entity\ActivityRegion $activityRegion
     */
    public function removeActivityRegion(\AppBundle\Entity\ActivityRegion $activityRegion)
    {
        $this->activityRegions->removeElement($activityRegion);
    }

    /**
     * Get activityRegions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivityRegions()
    {
        return $this->activityRegions;
    }

    /**
     * Add county
     *
     * @param \AppBundle\Entity\County $county
     *
     * @return State
     */
    public function addCounty(\AppBundle\Entity\County $county)
    {
        $this->counties[] = $county;

        return $this;
    }

    /**
     * Remove county
     *
     * @param \AppBundle\Entity\County $county
     */
    public function removeCounty(\AppBundle\Entity\County $county)
    {
        $this->counties->removeElement($county);
    }

    /**
     * Get counties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCounties()
    {
        return $this->counties;
    }

    /**
     * Add postalCode
     *
     * @param \AppBundle\Entity\PostalCode $postalCode
     *
     * @return State
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
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return State
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
}
