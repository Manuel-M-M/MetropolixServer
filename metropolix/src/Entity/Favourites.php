<?php

namespace App\Entity;

use App\Repository\FavouritesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavouritesRepository::class)
 */
class Favourites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Movies::class, inversedBy="favoritas")
     */
    private $movie_id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="favourites")
     */
    private $user_id;

    public function __construct()
    {
        $this->movie_id = new ArrayCollection();
        $this->user_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Movies[]
     */
    public function getMovieId(): Collection
    {
        return $this->movie_id;
    }

    public function addMovieId(Movies $movieId): self
    {
        if (!$this->movie_id->contains($movieId)) {
            $this->movie_id[] = $movieId;
        }

        return $this;
    }

    public function removeMovieId(Movies $movieId): self
    {
        $this->movie_id->removeElement($movieId);

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(User $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id[] = $userId;
        }

        return $this;
    }

    public function removeUserId(User $userId): self
    {
        $this->user_id->removeElement($userId);

        return $this;
    }
}
