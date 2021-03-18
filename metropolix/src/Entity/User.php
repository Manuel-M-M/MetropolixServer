<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $token_expiration;

    /**
     * @ORM\ManyToMany(targetEntity=Movies::class, inversedBy="users")
     * @ORM\JoinTable(name="favourites")
     */
    private $favourites;

    /**
     * @ORM\ManyToMany(targetEntity=Movies::class, inversedBy="seensUsers")
     * @ORM\JoinTable(name="seens")
     */
    private $seens;

    /**
     * @ORM\ManyToMany(targetEntity=Movies::class, inversedBy="pendingsUser")
     * @ORM\JoinTable(name="pendings")
     */
    private $pendings;

    public function __construct()
    {
        $this->favourites = new ArrayCollection();
        $this->seens = new ArrayCollection();
        $this->pendings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getTokenExpiration(): ?\DateTimeInterface
    {
        return $this->token_expiration;
    }

    public function setTokenExpiration(\DateTimeInterface $token_expiration): self
    {
        $this->token_expiration = $token_expiration;

        return $this;
    }

    /**
     * @return Collection|Movies[]
     */
    public function getFavourites(): Collection
    {
        return $this->favourites;
    }

    public function addFavourite(Movies $favourite): self
    {
        if (!$this->favourites->contains($favourite)) {
            $this->favourites[] = $favourite;
        }

        return $this;
    }

    public function removeFavourite(Movies $favourite): self
    {
        $this->favourites->removeElement($favourite);

        return $this;
    }

    /**
     * @return Collection|Movies[]
     */
    public function getSeens(): Collection
    {
        return $this->seens;
    }

    public function addSeen(Movies $seen): self
    {
        if (!$this->seens->contains($seen)) {
            $this->seens[] = $seen;
        }

        return $this;
    }

    public function removeSeen(Movies $seen): self
    {
        $this->seens->removeElement($seen);

        return $this;
    }

    /**
     * @return Collection|Movies[]
     */
    public function getPendings(): Collection
    {
        return $this->pendings;
    }

    public function addPending(Movies $pending): self
    {
        if (!$this->pendings->contains($pending)) {
            $this->pendings[] = $pending;
        }

        return $this;
    }

    public function removePending(Movies $pending): self
    {
        $this->pendings->removeElement($pending);

        return $this;
    }

    
}
