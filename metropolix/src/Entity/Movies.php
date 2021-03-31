<?php

namespace App\Entity;

use App\Repository\MoviesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MoviesRepository::class)
 */
class Movies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $backdrop_path;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poster_path;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $original_language;

    /**
     * @ORM\Column(type="text")
     */
    private $overview;

    /**
     * @ORM\Column(type="integer")
     */
    private $popularity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $release_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video_path;

    /**
     * @ORM\Column(type="integer")
     */
    private $vote_average;

    /**
     * @ORM\Column(type="integer")
     */
    private $vote_count;

    /**
     * @ORM\Column(type="integer")
     */
    private $runtime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $origin_country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $director;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $writer;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cast;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="favourites")
     */
    private $favouritesUsers;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="seens")
     */
    private $seensUsers;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="pendings")
     */
    private $pendingsUser;

    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="movie", orphanRemoval=true)
     */
    private $comments;

    

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->seensUsers = new ArrayCollection();
        $this->pendingsUser = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBackdropPath(): ?string
    {
        return $this->backdrop_path;
    }

    public function setBackdropPath(string $backdrop_path): self
    {
        $this->backdrop_path = $backdrop_path;

        return $this;
    }

    public function getPosterPath(): ?string
    {
        return $this->poster_path;
    }

    public function setPosterPath(string $poster_path): self
    {
        $this->poster_path = $poster_path;

        return $this;
    }

    public function getOriginalLanguage(): ?string
    {
        return $this->original_language;
    }

    public function setOriginalLanguage(string $original_language): self
    {
        $this->original_language = $original_language;

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getPopularity(): ?int
    {
        return $this->popularity;
    }

    public function setPopularity(int $popularity): self
    {
        $this->popularity = $popularity;

        return $this;
    }

    public function getReleaseDate(): ?string
    {
        return $this->release_date;
    }

    public function setReleaseDate(string $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getVideoPath(): ?string
    {
        return $this->video_path;
    }

    public function setVideoPath(string $video_path): self
    {
        $this->video_path = $video_path;

        return $this;
    }

    public function getVoteAverage(): ?int
    {
        return $this->vote_average;
    }

    public function setVoteAverage(int $vote_average): self
    {
        $this->vote_average = $vote_average;

        return $this;
    }

    public function getVoteCount(): ?int
    {
        return $this->vote_count;
    }

    public function setVoteCount(int $vote_count): self
    {
        $this->vote_count = $vote_count;

        return $this;
    }

    public function getRuntime(): ?int
    {
        return $this->runtime;
    }

    public function setRuntime(int $runtime): self
    {
        $this->runtime = $runtime;

        return $this;
    }

    public function getOriginCountry(): ?string
    {
        return $this->origin_country;
    }

    public function setOriginCountry(string $origin_country): self
    {
        $this->origin_country = $origin_country;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getWriter(): ?string
    {
        return $this->writer;
    }

    public function setWriter(string $writer): self
    {
        $this->writer = $writer;

        return $this;
    }

    public function getCast(): ?string
    {
        return $this->cast;
    }

    public function setCast(string $cast): self
    {
        $this->cast = $cast;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getFavouritesUsers(): Collection
    {
        return $this->favouritesUsers;
    }

    public function addFavouritesUser(User $user): self
    {
        if (!$this->favouritesUsers->contains($user)) {
            $this->favouritesUsers[] = $user;
            $user->addFavourite($this);
        }

        return $this;
    }

    public function removeFavouritesUser(User $user): self
    {
        if ($this->favouritesUsers->removeElement($user)) {
            $user->removeFavourite($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getSeensUsers(): Collection
    {
        return $this->seensUsers;
    }

    public function addSeensUser(User $seensUser): self
    {
        if (!$this->seensUsers->contains($seensUser)) {
            $this->seensUsers[] = $seensUser;
            $seensUser->addSeen($this);
        }

        return $this;
    }

    public function removeSeensUser(User $seensUser): self
    {
        if ($this->seensUsers->removeElement($seensUser)) {
            $seensUser->removeSeen($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getPendingsUser(): Collection
    {
        return $this->pendingsUser;
    }

    public function addPendingsUser(User $pendingsUser): self
    {
        if (!$this->pendingsUser->contains($pendingsUser)) {
            $this->pendingsUser[] = $pendingsUser;
            $pendingsUser->addPending($this);
        }

        return $this;
    }

    public function removePendingsUser(User $pendingsUser): self
    {
        if ($this->pendingsUser->removeElement($pendingsUser)) {
            $pendingsUser->removePending($this);
        }

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setMovie($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            
            if ($comment->getMovie() === $this) {
                $comment->setMovie(null);
            }
        }

        return $this;
    }

    
}
