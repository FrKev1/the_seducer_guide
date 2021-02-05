<?php

namespace App\DataClass;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Class for ContactType
 */
class Contact
{
    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private string $fullName;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Email(message="Veuillez entrer une adresse email valide")
     */
    private string $email;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private string $subject;

    /**
     * @Assert\Length(max=2000, maxMessage="Ce champ doit faire maximum {{ limit }} caractères")
     */
    private ?string $message;

    /**
     * @Assert\Date()
     */
    private DateTime $submitDate;

    private string $type;

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

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

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSubmitDate(): ?DateTime
    {
        return $this->submitDate;
    }

    public function setsubmitDate(DateTime $submitDate): self
    {
        $this->submitDate = $submitDate;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
