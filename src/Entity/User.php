<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Expr\List_;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password
        ]);
    }

    public function unserialize($serisalised)
    {
        list(
            $this->id,
            $this->username,
            $this->password
        )  = unserialize($serisalised, ['allowed_classes' => false]);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getRoles()
    {
        return ['ROLE_ADMIN'];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function eraseCredentials()
    { }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Undocumented function
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Undocumented function
     *
     * @param string $username
     * @return self
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Undocumented function
     *
     * @param string $password
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
