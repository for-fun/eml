<?php

namespace Maps\GroupsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\PrePersist;
use Symfony\Component\HttpFoundation\Request;

/**
 * GroupsComments
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class GroupsComments
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Maps\GroupsBundle\Entity\Groups\Groups", inversedBy="comments")
     * @JoinColumn(name="groups_id", referencedColumnName="id")
     */
    private $groupsId;

    /**
     * @ORM\Column(name="authorName", type="string", length=255)
     */
    private $authorName;

    /**
     * @ORM\Column(name="authorContact", type="string", length=255)
     */
    private $authorContact;

    /**
     * @ORM\Column(name="authorText", type="text", nullable=true)
     */
    private $authorText;

    /**
     * @ORM\Column(name="ip",  type="string", length=255, nullable=true)
     */
    private $ip;

    /**
     * @ORM\Column(name="allowed", type="boolean", nullable=true)
     */
    private $allowed = false;

    /**
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @PrePersist
     */
    public function doStuffOnPrePersist()
    {
        if ($this->getCreated() === null) {
            $this->setCreated(new \DateTime(date('Y-m-d H:i:s')));
        }
        if ($this->getIp() === null) {
            $request = Request::createFromGlobals();
            $this->setIp($request->getClientIp());
        }
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
     * Set groupsId
     *
     * @param integer $groupsId
     * @return GroupsComments
     */
    public function setGroupsId($groupsId)
    {
        $this->groupsId = $groupsId;

        return $this;
    }

    /**
     * Get groupsId
     *
     * @return integer
     */
    public function getGroupsId()
    {
        return $this->groupsId;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return bool
     */
    public function getAllowed()
    {
        return $this->allowed;
    }


    /**
     * @param $allowed
     */
    public function setAllowed($allowed)
    {
        $this->allowed = $allowed;
    }


    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @param mixed $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * @return mixed
     */
    public function getAuthorContact()
    {
        return $this->authorContact;
    }

    /**
     * @param mixed $authorContact
     */
    public function setAuthorContact($authorContact)
    {
        $this->authorContact = $authorContact;
    }

    /**
     * @return mixed
     */
    public function getAuthorText()
    {
        return $this->authorText;
    }

    /**
     * @param mixed $authorText
     */
    public function setAuthorText($authorText)
    {
        $this->authorText = $authorText;
    }
}
