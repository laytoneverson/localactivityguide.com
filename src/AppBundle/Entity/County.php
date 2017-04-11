<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class County
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $mapUrl;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $geoNamesId;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\City", mappedBy="county")
     */
    private $cities;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostalCode", mappedBy="county")
     */
    private $postalCodes;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\State", inversedBy="counties")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=false)
     */
    private $state;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ActivityRegion", mappedBy="counties")
     */
    private $activityRegions;
}