<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\NotNull
     */
    private $nomPrenom;

    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\NotNull
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Length(
     *      min = 8,
     *      max = 20,
     *      minMessage = "Mot de passe au moins {{ limit }} charactères",
     *      maxMessage = "Votre mot de passe ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Assert\EqualTo(propertyPath="confirm_password",
     *     message="Vous n'avez pas tapé le même mot de passe")
     */
    private $password;

    /**
     *  @Assert\EqualTo(propertyPath="confirm_password",
     *     message="Vous n'avez pas tapé le même mot de passe")
    */
    public $confirm_password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrenom(): ?string
    {
        return $this->nomPrenom;
    }

    public function setNomPrenom(string $nomPrenom): self
    {
        $this->nomPrenom = $nomPrenom;

        return $this;
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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
