<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch
{
    /**
     * @var int|null
     * @Assert\Range(min=100000, max=500000)
     */
    private $maxPrice;
    /**
     * @var int|null
     * @Assert\Range(min=10, max=400)
     */
    private $minSurcace;

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice(int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurcace(): ?int
    {
        return $this->minSurcace;
    }

    /**
     * @param int|null $minSurcace
     * @return PropertySearch
     */
    public function setMinSurcace(int $minSurcace): PropertySearch
    {
        $this->minSurcace = $minSurcace;
        return $this;
    }
}
