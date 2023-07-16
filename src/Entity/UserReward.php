<?php

namespace App\Entity;

use App\Repository\UserRewardRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;
/**
 * @ORM\Entity(repositoryClass=UserRewardRepository::class)
 */
class UserReward
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=125)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reward;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $UserReward;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getReward(): ?string
    {
        return $this->reward;
    }

    public function setReward(string $reward): self
    {
        $this->reward = $reward;

        return $this;
    }

    public function getUserReward(): ?string
    {
        return $this->UserReward;
    }

    public function setUserReward(string $UserReward): self
    {
        $this->UserReward = $UserReward;

        return $this;
    }

    public function hasClaimedToday(): bool
    {
        $today = new \DateTime('today');
        return $this->claimedAt !== null && $this->claimedAt >= $today;
    }
}
