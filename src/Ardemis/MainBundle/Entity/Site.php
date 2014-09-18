<?php

namespace Ardemis\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity
 */
class Site
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="contactEmail", type="string", length=255)
     */
    private $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterLink", type="string", length=255)
     */
    private $twitterLink;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookLink", type="string", length=255)
     */
    private $facebookLink;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinLink", type="string", length=255)
     */
    private $linkedinLink;

    /**
     * @var integer
     *
     * @ORM\Column(name="clientCount", type="integer")
     */
    private $clientCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="jobCount", type="integer")
     */
    private $jobCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="profilCount", type="integer")
     */
    private $profilCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="talkCount", type="integer")
     */
    private $talkCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="collaboratorCount", type="integer")
     */
    private $collaboratorCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="agencyCount", type="integer")
     */
    private $agencyCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="hourstalkCount", type="integer")
     */
    private $hourstalkCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="hoursphoneCount", type="integer")
     */
    private $hoursphoneCount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="yearFounded", type="datetime")
     */
    private $yearFounded;


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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Site
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     *
     * @return Site
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    /**
     * Get twitterLink
     *
     * @return string
     */
    public function getTwitterLink()
    {
        return $this->twitterLink;
    }

    /**
     * Set twitterLink
     *
     * @param string $twitterLink
     *
     * @return Site
     */
    public function setTwitterLink($twitterLink)
    {
        $this->twitterLink = $twitterLink;

        return $this;
    }

    /**
     * Get facebookLink
     *
     * @return string
     */
    public function getFacebookLink()
    {
        return $this->facebookLink;
    }

    /**
     * Set facebookLink
     *
     * @param string $facebookLink
     *
     * @return Site
     */
    public function setFacebookLink($facebookLink)
    {
        $this->facebookLink = $facebookLink;

        return $this;
    }

    /**
     * Get linkedinLink
     *
     * @return string
     */
    public function getLinkedinLink()
    {
        return $this->linkedinLink;
    }

    /**
     * Set linkedinLink
     *
     * @param string $linkedinLink
     *
     * @return Site
     */
    public function setLinkedinLink($linkedinLink)
    {
        $this->linkedinLink = $linkedinLink;

        return $this;
    }

    /**
     * Get clientCount
     *
     * @return integer
     */
    public function getClientCount()
    {
        return $this->clientCount;
    }

    /**
     * Set clientCount
     *
     * @param integer $clientCount
     *
     * @return Site
     */
    public function setClientCount($clientCount)
    {
        $this->clientCount = $clientCount;

        return $this;
    }

    /**
     * Get jobCount
     *
     * @return integer
     */
    public function getJobCount()
    {
        return $this->jobCount;
    }

    /**
     * Set jobCount
     *
     * @param integer $jobCount
     *
     * @return Site
     */
    public function setJobCount($jobCount)
    {
        $this->jobCount = $jobCount;

        return $this;
    }

    /**
     * Get profilCount
     *
     * @return integer
     */
    public function getProfilCount()
    {
        return $this->profilCount;
    }

    /**
     * Set profilCount
     *
     * @param integer $profilCount
     *
     * @return Site
     */
    public function setProfilCount($profilCount)
    {
        $this->profilCount = $profilCount;

        return $this;
    }

    /**
     * Get talkCount
     *
     * @return integer
     */
    public function getTalkCount()
    {
        return $this->talkCount;
    }

    /**
     * Set talkCount
     *
     * @param integer $talkCount
     *
     * @return Site
     */
    public function setTalkCount($talkCount)
    {
        $this->talkCount = $talkCount;

        return $this;
    }

    /**
     * Get collaboratorCount
     *
     * @return integer
     */
    public function getCollaboratorCount()
    {
        return $this->collaboratorCount;
    }

    /**
     * Set collaboratorCount
     *
     * @param integer $collaboratorCount
     *
     * @return Site
     */
    public function setCollaboratorCount($collaboratorCount)
    {
        $this->collaboratorCount = $collaboratorCount;

        return $this;
    }

    /**
     * Get agencyCount
     *
     * @return integer
     */
    public function getAgencyCount()
    {
        return $this->agencyCount;
    }

    /**
     * Set agencyCount
     *
     * @param integer $agencyCount
     *
     * @return Site
     */
    public function setAgencyCount($agencyCount)
    {
        $this->agencyCount = $agencyCount;

        return $this;
    }

    /**
     * Get hourstalkCount
     *
     * @return integer
     */
    public function getHourstalkCount()
    {
        return $this->hourstalkCount;
    }

    /**
     * Set hourstalkCount
     *
     * @param integer $hourstalkCount
     *
     * @return Site
     */
    public function setHourstalkCount($hourstalkCount)
    {
        $this->hourstalkCount = $hourstalkCount;

        return $this;
    }

    /**
     * Get hoursphoneCount
     *
     * @return integer
     */
    public function getHoursphoneCount()
    {
        return $this->hoursphoneCount;
    }

    /**
     * Set hoursphoneCount
     *
     * @param integer $hoursphoneCount
     *
     * @return Site
     */
    public function setHoursphoneCount($hoursphoneCount)
    {
        $this->hoursphoneCount = $hoursphoneCount;

        return $this;
    }

    /**
     * Get yearFounded
     *
     * @return \DateTime
     */
    public function getYearFounded()
    {
        return $this->yearFounded;
    }

    /**
     * Set yearFounded
     *
     * @param \DateTime $yearFounded
     *
     * @return Site
     */
    public function setYearFounded($yearFounded)
    {
        $this->yearFounded = $yearFounded;

        return $this;
    }
}
