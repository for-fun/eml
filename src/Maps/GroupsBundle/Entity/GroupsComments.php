<?php

namespace Maps\GroupsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * GroupsComments
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GroupsComments
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
     * @ManyToOne(targetEntity="Maps\GroupsBundle\Entity\Groups\Groups", inversedBy="comments")
     * @JoinColumn(name="groups_id", referencedColumnName="id")
     */
    private $groupsId;

    /**
     * @var text
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;


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
     * @return \Maps\GroupsBundle\Entity\text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param \Maps\GroupsBundle\Entity\text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}
