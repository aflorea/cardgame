<?php

namespace App\Card;

use App\Exception\InvalidCardColourException;
use App\Exception\InvalidCardShapeException;

abstract class CardAbstract
{
    /**
     * @var string $shape
     */
    private $shape;
    /**
     * @var string $colour
     */
    private $colour;
    /**
     * @var array
     */
    private $availableShapes = ['square', 'circle', 'triangle', 'oval'];
    /**
     * @var array
     */
    private $availableColours = ['red', 'blue', 'green', 'yellow'];

    /**
     * CardAbstract constructor.
     * @param string $shape
     * @param string $colour
     * @throws InvalidCardColourException
     * @throws InvalidCardShapeException
     */
    public function __construct($shape = '', $colour = '')
    {
        $this->setShape($shape);
        $this->setColour($colour);
    }

    /**
     * @return string
     */
    public function getShape(): string
    {
        return $this->shape;
    }

    /**
     * @param string $shape
     * @return $this
     * @throws InvalidCardShapeException
     */
    public function setShape(string $shape): self
    {
        if (!in_array($shape, $this->availableShapes)) {
            throw new InvalidCardShapeException();
        }
        $this->shape = $shape;
        return $this;
    }

    /**
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @param string $colour
     * @return $this
     * @throws InvalidCardColourException
     */
    public function setColour(string $colour): self
    {
        if (!in_array($colour, $this->availableColours)) {
            throw new InvalidCardColourException();
        }
        $this->colour = $colour;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvailableShapes(): array
    {
        return $this->availableShapes;
    }

    /**
     * @return array
     */
    public function getAvailableColours(): array
    {
        return $this->availableColours;
    }

}