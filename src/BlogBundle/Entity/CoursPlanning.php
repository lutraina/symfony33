<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoursPlanning
 *
 * @ORM\Table(name="cours_planning")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\CoursPlanningRepository")
 */
class CoursPlanning
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_cours", type="datetime")
     */
    private $dateCours;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_cours", type="text", nullable=true)
     */
    private $descCours;

    /**
     * @var int
     *
     * @ORM\Column(name="id_eleve", type="integer", unique=true)
     */
    private $idEleve;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateCours
     *
     * @param \DateTime $dateCours
     *
     * @return CoursPlanning
     */
    public function setDateCours($dateCours)
    {
        $this->dateCours = $dateCours;

        return $this;
    }

    /**
     * Get dateCours
     *
     * @return \DateTime
     */
    public function getDateCours()
    {
        return $this->dateCours;
    }

    /**
     * Set descCours
     *
     * @param string $descCours
     *
     * @return CoursPlanning
     */
    public function setDescCours($descCours)
    {
        $this->descCours = $descCours;

        return $this;
    }

    /**
     * Get descCours
     *
     * @return string
     */
    public function getDescCours()
    {
        return $this->descCours;
    }

    /**
     * Set idEleve
     *
     * @param integer $idEleve
     *
     * @return CoursPlanning
     */
    public function setIdEleve($idEleve)
    {
        $this->idEleve = $idEleve;

        return $this;
    }

    /**
     * Get idEleve
     *
     * @return int
     */
    public function getIdEleve()
    {
        return $this->idEleve;
    }
}

