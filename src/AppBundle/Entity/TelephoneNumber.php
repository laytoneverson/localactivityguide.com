<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 *
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $country_id;

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
     * 
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ContactCard", inversedBy="telephoneNumbers")
     * @ORM\JoinColumn(name="contact_card_id", referencedColumnName="id")
     */
    private $contactCard;

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
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return TelephoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set phoneNumberType
     *
     * @param string $phoneNumberType
     *
     * @return TelephoneNumber
     */
    public function setPhoneNumberType($phoneNumberType)
    {
        $this->phoneNumberType = $phoneNumberType;

        return $this;
    }

    /**
     * Get phoneNumberType
     *
     * @return string
     */
    public function getPhoneNumberType()
    {
        return $this->phoneNumberType;
    }

    /**
     * Set countryId
     *
     * @param integer $countryId
     *
     * @return TelephoneNumber
     */
    public function setCountryId($countryId)
    {
        $this->country_id = $countryId;

        return $this;
    }

    /**
     * Get countryId
     *
     * @return integer
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     *
     * @return TelephoneNumber
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set isTollFree
     *
     * @param boolean $isTollFree
     *
     * @return TelephoneNumber
     */
    public function setIsTollFree($isTollFree)
    {
        $this->isTollFree = $isTollFree;

        return $this;
    }

    /**
     * Get isTollFree
     *
     * @return boolean
     */
    public function getIsTollFree()
    {
        return $this->isTollFree;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return TelephoneNumber
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set contactCard
     *
     * @param \AppBundle\Entity\ContactCard $contactCard
     *
     * @return TelephoneNumber
     */
    public function setContactCard(\AppBundle\Entity\ContactCard $contactCard = null)
    {
        $this->contactCard = $contactCard;

        return $this;
    }

    /**
     * Get contactCard
     *
     * @return \AppBundle\Entity\ContactCard
     */
    public function getContactCard()
    {
        return $this->contactCard;
    }
}
