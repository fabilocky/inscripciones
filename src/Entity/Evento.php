<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventoRepository")
 */
class Evento
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Inscripcion", mappedBy="evento")
     */
    private $inscripciones;

    public function __construct()
    {
        $this->inscripciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * @return Collection|Inscripcion[]
     */
    public function getInscripciones(): Collection
    {
        return $this->inscripciones;
    }

    public function addInscripcione(Inscripcion $inscripcione): self
    {
        if (!$this->inscripciones->contains($inscripcione)) {
            $this->inscripciones[] = $inscripcione;
            $inscripcione->setEvento($this);
        }

        return $this;
    }

    public function removeInscripcione(Inscripcion $inscripcione): self
    {
        if ($this->inscripciones->contains($inscripcione)) {
            $this->inscripciones->removeElement($inscripcione);
            // set the owning side to null (unless already changed)
            if ($inscripcione->getEvento() === $this) {
                $inscripcione->setEvento(null);
            }
        }

        return $this;
    }
}
