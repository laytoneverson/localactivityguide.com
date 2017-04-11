<?php
namespace AppBundle\Entity;
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $stateName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ActivityRegion", mappedBy="state")
     */
    private $activityRegion;

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
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=false)
     */
    private $country;
}