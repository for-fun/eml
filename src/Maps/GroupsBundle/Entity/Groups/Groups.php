<?php

namespace Maps\GroupsBundle\Entity\Groups;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\PrePersist;
use Maps\GroupsBundle\Entity\GroupsComments;
use Symfony\Component\HttpFoundation\Request;

/**
 * Groups
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Maps\GroupsBundle\Entity\Groups\GroupsRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Groups
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @OneToMany(targetEntity="Maps\GroupsBundle\Entity\GroupsComments", mappedBy="groupsId", cascade={"ALL"})
     */
    private $comments;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(name="author_name", type="string", length=255)
     */
    private $author_name;

    /**
     * @ORM\Column(name="author_contact", type="string", length=255)
     */
    private $author_contact;

    /**
     * @ORM\Column(name="author_info", type="text", nullable=true)
     */
    private $author_info;

    /**
     * @ORM\Column(name="allowed", type="boolean", nullable=true)
     */
    private $allowed = false;

    /**
     * @ORM\Column(name="ip",  type="string", length=255, nullable=true)
     */
    private $ip;

    /**
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    public function __construct()
    {
        $this->features = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getAuthorName()
    {
        return $this->author_name;
    }

    /**
     * @param string $author_name
     */
    public function setAuthorName($author_name)
    {
        $this->author_name = $author_name;
    }

    /**
     * @return string
     */
    public function getAuthorContact()
    {
        return $this->author_contact;
    }

    /**
     * @param string $author_contact
     */
    public function setAuthorContact($author_contact)
    {
        $this->author_contact = $author_contact;
    }

    /**
     * @return string
     */
    public function getAuthorInfo()
    {
        return $this->author_info;
    }

    /**
     * @param string $author_info
     */
    public function setAuthorInfo($author_info)
    {
        $this->author_info = $author_info;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
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
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }


    public function addComment(GroupsComments $comment)
    {
        $comment->setGroupsId($comment);
        $this->comments->add($comment);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getName();
    }

    /**
     * @return mixed
     */
    public function getAllowed()
    {
        return $this->allowed;
    }

    /**
     * @param mixed $allowed
     */
    public function setAllowed($allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'text' => $this->getText(),
//            'author_name' => $this->getAuthorName(),
//            'author_info' => $this->getAuthorInfo(),
//            'author_contact' => $this->getAuthorContact(),
        ];
    }
}
