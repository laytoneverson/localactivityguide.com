<?php
namespace AppBundle\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ApiResource()
 * @ORM\Entity
 */
class County extends Place
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
    private $countyName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\City", mappedBy="county")
     */
    private $cities;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\State", inversedBy="counties")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    private $state;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set countyName
     *
     * @param string $countyName
     *
     * @return County
     */
    public function setCountyName($countyName)
    {
        $this->countyName = $countyName;

        return $this;
    }

    /**
     * Get countyName
     *
     * @return string
     */
    public function getCountyName()
    {
        return $this->countyName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return County
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
     * Add city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return County
     */
    public function addCity(\AppBundle\Entity\City $city)
    {
        $this->cities[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \AppBundle\Entity\City $city
     */
    public function removeCity(\AppBundle\Entity\City $city)
    {
        $this->cities->removeElement($city);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * Set state
     *
     * @param \AppBundle\Entity\State $state
     *
     * @return County
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
