<?php

namespace App\Entity;

use App\Entity\Author;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embedded;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * @ApiResource()
 * @ORM\Entity()
 * @ORM\Table(name="posts")
 */
class Post
{
    /**
     * @Column(type="integer", length=11)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"form:posts"})
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=false)
     * @Assert\Type(type="string", message="El valor '{{ value }}' no es del tipo '{{ type }}'")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = "150",
     *      maxMessage = "El título debe ser como máximo de {{ limit }} caracteres"
     * )
     * @Groups({"form:posts"})
     */
    private string $title;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank()
     * @Groups({"form:posts"})
     */
    private string $content;

    /**
     * @ORM\Column(type="PostCategoryType", nullable=true)
     * @DoctrineAssert\Enum(entity="App\DBAL\Types\PostCategoryType")
     * @Groups({"form:posts"})
     */
    private ?string $category;

    /**
     * @Embedded(class="Author")
     * @Assert\Valid
     * @Groups({"form:posts"})
     */
    private $author;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): self
    {
        $this->author = $author;

        return $this;
    }
}
