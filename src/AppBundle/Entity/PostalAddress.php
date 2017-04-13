<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class PostalAddress
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
    private $streetAddress;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $poBoxNumber;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $state;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PostalCode", inversedBy="postalAddress")
     * @ORM\JoinColumn(name="postal_code_id", referencedColumnName="id")
     */
    private $postalCode;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ContactCard", mappedBy="postalAddress")
     */
    private $contactCard;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contactCard = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set streetAddress
     *
     * @param string $streetAddress
     *
     * @return PostalAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * Get streetAddress
     *
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set poBoxNumber
     *
     * @param string $poBoxNumber
     *
     * @return PostalAddress
     */
    public function setPoBoxNumber($poBoxNumber)
    {
        $this->poBoxNumber = $poBoxNumber;

        return $this;
    }

    /**
     * Get poBoxNumber
     *
     * @return string
     */
    public function getPoBoxNumber()
    {
        return $this->poBoxNumber;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return PostalAddress
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return PostalAddress
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return PostalAddress
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return PostalAddress
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postalCode
     *
     * @param \AppBundle\Entity\PostalCode $postalCode
     *
     * @return PostalAddress
     */
    public function setPostalCode(\AppBundle\Entity\PostalCode $postalCode = null)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return \AppBundle\Entity\PostalCode
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Add contactCard
     *
     * @param \AppBundle\Entity\ContactCard $contactCard
     *
     * @return PostalAddress
     */
    public function addContactCard(\AppBundle\Entity\ContactCard $contactCard)
    {
        $this->contactCard[] = $contactCard;

        return $this;
    }

    /**
     * Remove contactCard
     *
     * @param \AppBundle\Entity\ContactCard $contactCard
     */
    public function removeContactCard(\AppBundle\Entity\ContactCard $contactCard)
    {
        $this->contactCard->removeElement($contactCard);
    }

    /**
     * Get contactCard
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContactCard()
    {
        return $this->contactCard;
    }
}
