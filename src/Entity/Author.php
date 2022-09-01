<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Embeddable;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Embeddable
 */
class Author
{
    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\Type(type="string", message="El valor '{{ value }}' no es del tipo '{{ type }}'")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = "100",
     *      maxMessage = "El nombre debe ser como máximo de {{ limit }} caracteres"
     * )
     * @Groups({"form:posts"})
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Type(type="string", message="El valor '{{ value }}' no es del tipo '{{ type }}'")
     * @Assert\Length(
     *      max = "100",
     *      maxMessage = "El nombre debe ser como máximo de {{ limit }} caracteres"
     * )
     * @Groups({"form:posts"})
     */
    private ?string $surname;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Type(type="string", message="El valor '{{ value }}' no es del tipo '{{ type }}'")
     * @Assert\Length(
     *      max = "100",
     *      maxMessage = "El email debe ser como máximo de {{ limit }} caracteres"
     * )
     * @Groups({"form:posts"})
     */
    private ?string $emailContact;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(?string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }
}
