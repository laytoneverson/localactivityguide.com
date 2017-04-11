<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, length=3, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", unique=true, length=4, nullable=true)
     */
    private $telephoneCallingCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $countryName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $mapUrl;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $geoNamesId;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TelephoneNumber", mappedBy="country")
     */
    private $telephoneNumber;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\State", mappedBy="country")
     */
    private $states;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostalCode", mappedBy="country")
     */
    private $postalCodes;
}