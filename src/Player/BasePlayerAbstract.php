<?php

namespace App\Player;

abstract class BasePlayerAbstract
{
    /**
     * Player's name
     * @var string $name
     */
    private $name;
    /**
     * Card the player has won
     * @var array $cardsWon
     */
    private $cardsWon = [];
    /**
     * Has the player won the game?
     * @var bool $winner
     */
    private $winner = false;

    /**
     * BasePlayerAbstract constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getCardsWon(): array
    {
        return $this->cardsWon;
    }

    /**
     * @param array $cardsWon
     * @return $this
     */
    public function setCardsWon(array $cardsWon): self
    {
        $this->cardsWon = $cardsWon;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWinner(): bool
    {
        return $this->winner;
    }

    /**
     * @param bool $winner
     * @return $this
     */
    public function setWinner(bool $winner): self
    {
        $this->winner = $winner;
        return $this;
    }


}