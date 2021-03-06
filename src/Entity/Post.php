<?php

namespace App\Entity;

use App\Repository\PostRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository", repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @var int $id
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $id;
    /**
     * @var string $slug
     * @ORM\Column(type="string", unique=true)
     */
    private string $slug;
    /**
     * @var string $title
     * @ORM\Column(type="string")
     */
    private string $title;
    /**
     * @var DateTimeImmutable $title
     * @ORM\Column(type="datetime_immutable")
     */
    private DateTimeImmutable $publishedAt;
    /**
     * @var string $content
     * @ORM\Column(type="text")
     */
    private string $content;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="post")
     */
    private $comments;

    /**
     *
     */
    public function __construct()
    {
        $this->publishedAt = new DateTimeImmutable();
        $this->comments = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getPublishedAt(): DateTimeImmutable
    {
        return $this->publishedAt;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection|array
    {
        return $this->comments;
    }
}
