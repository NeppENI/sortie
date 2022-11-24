<?php

namespace App\Entity;

use App\Repository\SortieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortieRepository::class)]
class Sortie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 75)]
    private $nom_de_la_sortie;

    #[ORM\Column(type: 'date')]
    private $date_sortie;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_limite_inscription;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nombre_places;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $duree;

    #[ORM\Column(type: 'text', length: 255)]
    private $description_info;

    #[ORM\Column(type: 'string', length: 50)]
    private $campus;

    #[ORM\Column(type: 'string', length: 50)]
    private $ville;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $lieu;

    #[ORM\Column(type: 'string', length: 255)]
    private $rue;

    #[ORM\Column(type: 'string', length: 10)]
    private $code_postal;

    #[ORM\Column(type: 'string', length: 15, nullable: true)]
    private $latitude;

    #[ORM\Column(type: 'string', length: 15, nullable: true)]
    private $longitude;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDeLaSortie(): ?string
    {
        return $this->nom_de_la_sortie;
    }

    public function setNomDeLaSortie(string $nom_de_la_sortie): self
    {
        $this->nom_de_la_sortie = $nom_de_la_sortie;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(\DateTimeInterface $date_sortie): self
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    public function getDateLimiteInscription(): ?\DateTimeInterface
    {
        return $this->date_limite_inscription;
    }

    public function setDateLimiteInscription(?\DateTimeInterface $date_limite_inscription): self
    {
        $this->date_limite_inscription = $date_limite_inscription;

        return $this;
    }

    public function getNombrePlaces(): ?int
    {
        return $this->nombre_places;
    }

    public function setNombrePlaces(?int $nombre_places): self
    {
        $this->nombre_places = $nombre_places;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDescriptionInfo(): ?string
    {
        return $this->description_info;
    }

    public function setDescriptionInfo(string $description_info): self
    {
        $this->description_info = $description_info;

        return $this;
    }

    public function getCampus(): ?string
    {
        return $this->campus;
    }

    public function setCampus(string $campus): self
    {
        $this->campus = $campus;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }
}
