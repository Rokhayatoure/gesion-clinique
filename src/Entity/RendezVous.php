<?php

namespace App\Entity;

use App\Enum\Specialite;
use App\Enum\Status;
use App\Repository\RendezVousRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'rendezVouses')]
    private ?Patient $patient = null;

    #[ORM\Column(length: 255)]
    private ?string $Motif = null;

    #[ORM\Column(enumType: Status::class)]
    private ?Status $Status = null;

    #[ORM\Column(enumType: Specialite::class)]
    private ?Specialite $Specialite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->Motif;
    }

    public function setMotif(string $Motif): static
    {
        $this->Motif = $Motif;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->Status;
    }

    public function setStatus(Status $Status): static
    {
        $this->Status = $Status;

        return $this;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->Specialite;
    }

    public function setSpecialite(Specialite $Specialite): static
    {
        $this->Specialite = $Specialite;

        return $this;
    }
}
