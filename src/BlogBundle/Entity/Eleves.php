<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleves
 *
 * @ORM\Table(name="eleves")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\ElevesRepository")
 */
class Eleves
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=50)
     */
    private $age;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut_cours", type="datetime")
     */
    private $debutCours;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Eleves
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return Eleves
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set debutCours
     *
     * @param \DateTime $debutCours
     *
     * @return Eleves
     */
    public function setDebutCours($debutCours)
    {
        $this->debutCours = $debutCours;

        return $this;
    }

    /**
     * Get debutCours
     *
     * @return \DateTime
     */
    public function getDebutCours()
    {
        return $this->debutCours;
    }
}

