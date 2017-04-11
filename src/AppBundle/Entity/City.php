<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class City
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $mapUrl;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $geoNamesId;

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
     * @ORM\JoinColumn(name="county_id", referencedColumnName="id", nullable=false)
     */
    private $county;
}