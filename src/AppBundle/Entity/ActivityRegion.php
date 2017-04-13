<?php
namespace AppBundle\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ApiResource()
 * @ORM\Entity
 */
class ActivityRegion
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $regionLabel;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\City", mappedBy="activityRegion")
     */
    private $regionCities;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostalCode", mappedBy="activityRegion")
     */
    private $postalCodes;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\State", inversedBy="activityRegions")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    private $state;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->regionCities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postalCodes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set regionLabel
     *
     * @param string $regionLabel
     *
     * @return ActivityRegion
     */
    public function setRegionLabel($regionLabel)
    {
        $this->regionLabel = $regionLabel;

        return $this;
    }

    /**
     * Get regionLabel
     *
     * @return string
     */
    public function getRegionLabel()
    {
        return $this->regionLabel;
    }

    /**
     * Add regionCity
     *
     * @param \AppBundle\Entity\City $regionCity
     *
     * @return ActivityRegion
     */
    public function addRegionCity(\AppBundle\Entity\City $regionCity)
    {
        $this->regionCities[] = $regionCity;

        return $this;
    }

    /**
     * Remove regionCity
     *
     * @param \AppBundle\Entity\City $regionCity
     */
    public function removeRegionCity(\AppBundle\Entity\City $regionCity)
    {
        $this->regionCities->removeElement($regionCity);
    }

    /**
     * Get regionCities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRegionCities()
    {
        return $this->regionCities;
    }

    /**
     * Add postalCode
     *
     * @param \AppBundle\Entity\PostalCode $postalCode
     *
     * @return ActivityRegion
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
     * Set state
     *
     * @param \AppBundle\Entity\State $state
     *
     * @return ActivityRegion
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
