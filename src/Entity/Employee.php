<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Employee
{

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     */
    private $kids_count = 0;

    /**
     * @ORM\Column(type="smallint")
     */
    private $uses_car = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $gross = 0;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="smallint")
     */
    private $status = self::STATUS_PUBLISHED;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getKidsCount(): ?int
    {
        return $this->kids_count;
    }

    public function setKidsCount(int $kids_count): self
    {
        $this->kids_count = $kids_count;

        return $this;
    }

    public function getUsesCar(): ?int
    {
        return $this->uses_car;
    }

    public function setUsesCar(int $uses_car): self
    {
        $this->uses_car = $uses_car;

        return $this;
    }

    public function getGross(): ?int
    {
        return $this->gross;
    }

    public function setGross(int $gross): self
    {
        $this->gross = $gross;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTime());
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime());
        }
    }


    private $salary = null;

    private $tax = 0;

    private $coef = 1;

    private $fee = 0;

    public function getSalary(): ?int
    {
        if ($this->salary !== null) {
            return $this->salary;
        }

        $salary = $this->getGross();

        $rules = [
            function() { $this->tax  += 0.2; },
            function() { $this->coef += $this->age > 50       ?  0.07 : 0; },
            function() { $this->tax  += $this->kids_count > 2 ? -0.02 : 0; },
            function() { $this->fee  += $this->uses_car       ?  500  : 0; },
            // etc...
        ];

        foreach($rules as $rule) {
            $rule();
        }

        $this->coef = max(0, $this->coef);
        $this->tax  = min(1, $this->tax);

        return max(0, ($salary * $this->coef - $this->fee) * (1 - $this->tax));
    }
}
