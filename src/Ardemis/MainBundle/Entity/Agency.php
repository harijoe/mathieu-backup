<?php

namespace Ardemis\MainBundle\Entity;

use Ardemis\MainBundle\Entity\Job;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;
use JMS\Serializer\Annotation as JMSS;

/**
 * Agency
 *
 * @ORM\Table(name="agency")
 * @ORM\Entity(repositoryClass="Ardemis\MainBundle\Entity\Repository\AgencyRepository")
 *
 * @Hateoas\Relation("_self", href = "expr('/agencies/' ~ object.getId())")
 * @Hateoas\Relation(
 *          "jobs",
 *          href = "expr('/agencies/' ~ object.getId() ~ '/jobs')")
 */
class Agency
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
     * @var integer
     *
     * @ORM\Column(name="twitterCount", type="integer")
     */
    private $twitterCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="facebookCount", type="integer")
     */
    private $facebookCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="linkedinCount", type="integer")
     */
    private $linkedinCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="viadeoCount", type="integer")
     */
    private $viadeoCount;

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
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Ardemis\MainBundle\Entity\Job", mappedBy="agency")
     * @JMSS\Exclude()
     */
    private $jobs;

    /** Constructor */
    public function __construct()
    {
        $this->jobs = new ArrayCollection();
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
     * @return Agency
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get twitterCount
     *
     * @return string
     */
    public function getTwitterCount()
    {
        return $this->twitterCount;
    }

    /**
     * Set twitterCount
     *
     * @param string $twitterLink
     *
     * @return Agency
     */
    public function setTwitterCount($twitterLink)
    {
        $this->twitterCount = $twitterLink;

        return $this;
    }

    /**
     * Get facebookCount
     *
     * @return string
     */
    public function getFacebookCount()
    {
        return $this->facebookCount;
    }

    /**
     * Set facebookCount
     *
     * @param string $facebookLink
     *
     * @return Agency
     */
    public function setFacebookCount($facebookLink)
    {
        $this->facebookCount = $facebookLink;

        return $this;
    }

    /**
     * Get linkedinCount
     *
     * @return string
     */
    public function getLinkedinCount()
    {
        return $this->linkedinCount;
    }

    /**
     * Set linkedinCount
     *
     * @param string $linkedinLink
     *
     * @return Agency
     */
    public function setLinkedinCount($linkedinLink)
    {
        $this->linkedinCount = $linkedinLink;

        return $this;
    }

    /**
     * @return int
     */
    public function getViadeoCount()
    {
        return $this->viadeoCount;
    }

    /**
     * @param int $viadeoCount
     */
    public function setViadeoCount($viadeoCount)
    {
        $this->viadeoCount = $viadeoCount;
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
     * @return Agency
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
     * @return Agency
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
     * @return Agency
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
     * @return Agency
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
     * @return Agency
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
     * @return Agency
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
     * @return Agency
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
     * @return Agency
     */
    public function setHoursphoneCount($hoursphoneCount)
    {
        $this->hoursphoneCount = $hoursphoneCount;

        return $this;
    }

    /**
     * Add jobs
     *
     * @param Job $jobs
     *
     * @return Agency
     */
    public function addJob(Job $jobs)
    {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param Job $jobs
     */
    public function removeJob(Job $jobs)
    {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->name;
    }
}
