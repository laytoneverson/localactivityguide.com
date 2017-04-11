<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\City", mappedBy="activityRegion")
     */
    private $regionCities;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostalCode", mappedBy="activityRegion")
     */
    private $postalCodes;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\State", inversedBy="activityRegion")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=false)
     */
    private $state;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\County", inversedBy="activityRegions")
     * @ORM\JoinTable(
     *     name="County2ActivityRegion",
     *     joinColumns={@ORM\JoinColumn(name="activity_region_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="county_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $counties;
}