<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 */
class Team
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
     * @var int
     *
     * @ORM\Column(name="annee_de_creation", type="integer")
     */
    private $anneeDeCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="entraineur", type="string", length=255)
     */
    private $entraineur;

    /**
     * @var string
     *
     * @ORM\Column(name="couleurs", type="string", length=255)
     */
    private $couleurs;


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
     * @return Team
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
     * Set anneeDeCreation
     *
     * @param integer $anneeDeCreation
     *
     * @return Team
     */
    public function setAnneeDeCreation($anneeDeCreation)
    {
        $this->anneeDeCreation = $anneeDeCreation;

        return $this;
    }

    /**
     * Get anneeDeCreation
     *
     * @return int
     */
    public function getAnneeDeCreation()
    {
        return $this->anneeDeCreation;
    }

    /**
     * Set entraineur
     *
     * @param string $entraineur
     *
     * @return Team
     */
    public function setEntraineur($entraineur)
    {
        $this->entraineur = $entraineur;

        return $this;
    }

    /**
     * Get entraineur
     *
     * @return string
     */
    public function getEntraineur()
    {
        return $this->entraineur;
    }

    /**
     * Set couleurs
     *
     * @param string $couleurs
     *
     * @return Team
     */
    public function setCouleurs($couleurs)
    {
        $this->couleurs = $couleurs;

        return $this;
    }

    /**
     * Get couleurs
     *
     * @return string
     */
    public function getCouleurs()
    {
        return $this->couleurs;
    }
}

