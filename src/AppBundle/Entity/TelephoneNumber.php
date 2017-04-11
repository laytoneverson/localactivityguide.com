<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class TelephoneNumber
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $phoneNumberType;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private $countryCode;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isTollFree;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country", inversedBy="telephoneNumber")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ContactCard", inversedBy="telephoneNumbers")
     * @ORM\JoinColumn(name="contact_card_id", referencedColumnName="id")
     */
    private $contactCard;
}