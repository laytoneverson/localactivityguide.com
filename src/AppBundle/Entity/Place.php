<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="placeDiscriminator", length=255, type="string")
 * @ORM\DiscriminatorMap({
 *     "place"="AppBundle\Entity\Place",
 *     "country"="AppBundle\Entity\Country",
 *     "state"="AppBundle\Entity\State",
 *     "city"="AppBundle\Entity\City",
 *     "county"="AppBundle\Entity\County"
 * })
 */
abstract class Place
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mapUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $geoNamesId;

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
     * Set name
     *
     * @param string $name
     *
     * @return Place
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mapUrl
     *
     * @param string $mapUrl
     *
     * @return Place
     */
    public function setMapUrl($mapUrl)
    {
        $this->mapUrl = $mapUrl;

        return $this;
    }

    /**
     * Get mapUrl
     *
     * @return string
     */
    public function getMapUrl()
    {
        return $this->mapUrl;
    }

    /**
     * Set geoNamesId
     *
     * @param string $geoNamesId
     *
     * @return Place
     */
    public function setGeoNamesId($geoNamesId)
    {
        $this->geoNamesId = $geoNamesId;

        return $this;
    }

    /**
     * Get geoNamesId
     *
     * @return string
     */
    public function getGeoNamesId()
    {
        return $this->geoNamesId;
    }
}
