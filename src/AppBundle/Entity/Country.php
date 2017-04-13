<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Country extends Place
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->telephoneNumber = new \Doctrine\Common\Collections\ArrayCollection();
        $this->states = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postalCodes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set telephoneCallingCode
     *
     * @param string $telephoneCallingCode
     *
     * @return Country
     */
    public function setTelephoneCallingCode($telephoneCallingCode)
    {
        $this->telephoneCallingCode = $telephoneCallingCode;

        return $this;
    }

    /**
     * Get telephoneCallingCode
     *
     * @return string
     */
    public function getTelephoneCallingCode()
    {
        return $this->telephoneCallingCode;
    }

    /**
     * Add telephoneNumber
     *
     * @param \AppBundle\Entity\TelephoneNumber $telephoneNumber
     *
     * @return Country
     */
    public function addTelephoneNumber(\AppBundle\Entity\TelephoneNumber $telephoneNumber)
    {
        $this->telephoneNumber[] = $telephoneNumber;

        return $this;
    }

    /**
     * Remove telephoneNumber
     *
     * @param \AppBundle\Entity\TelephoneNumber $telephoneNumber
     */
    public function removeTelephoneNumber(\AppBundle\Entity\TelephoneNumber $telephoneNumber)
    {
        $this->telephoneNumber->removeElement($telephoneNumber);
    }

    /**
     * Get telephoneNumber
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * Add state
     *
     * @param \AppBundle\Entity\State $state
     *
     * @return Country
     */
    public function addState(\AppBundle\Entity\State $state)
    {
        $this->states[] = $state;

        return $this;
    }

    /**
     * Remove state
     *
     * @param \AppBundle\Entity\State $state
     */
    public function removeState(\AppBundle\Entity\State $state)
    {
        $this->states->removeElement($state);
    }

    /**
     * Get states
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * Add postalCode
     *
     * @param \AppBundle\Entity\PostalCode $postalCode
     *
     * @return Country
     */
    public function addPostalCode(\AppBundle\Entity\PostalCode $postalCode)
    {
        $this->postalCodes[] = $postalCode;

        return $this;
    }

    /**
     * Remove postalCode
     *
     * @param \AppBundle\Entity\PostalCode $postalCode
     */
    public function removePostalCode(\AppBundle\Entity\PostalCode $postalCode)
    {
        $this->postalCodes->removeElement($postalCode);
    }

    /**
     * Get postalCodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostalCodes()
    {
        return $this->postalCodes;
    }
}
