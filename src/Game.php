<?php


namespace App;


use App\Player\BasePlayerAbstract;
use Ramsey\Uuid\Uuid;

class Game
{
    /**
     * Game session id
     *
     * @var string $gameId
     */
    private $gameId;
    /**
     * List of players
     *
     * @var array $players
     */
    private $players = [];
    /**
     * Is the game still active?
     *
     * @var bool $status
     */
    private $status = false;

    /**
     * Game constructor.
     * @param BasePlayerAbstract $player1
     * @param BasePlayerAbstract $player2
     */
    public function __construct(BasePlayerAbstract $player1, BasePlayerAbstract $player2)
    {
        $this->gameId = Uuid::uuid4();
        $this->status = true;
        $this->setPlayers([$player1, $player2]);
    }

    /**
     * @return string
     */
    public function getGameId(): string
    {
        return $this->gameId;
    }

    /**
     * @return array
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param array $players
     * @return $this
     */
    public function setPlayers(array $players): self
    {
        $this->players = $players;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlayerOne(): BasePlayerAbstract
    {
        return reset($this->players);
    }

    /**
     * @return BasePlayerAbstract
     */
    public function getPlayerTwo(): BasePlayerAbstract
    {
        return end($this->players);
    }

    /**
     * @return BasePlayerAbstract
     */
    public function getWinner(): BasePlayerAbstract
    {
        return $this->getPlayerOne()->isWinner() ? $this->getPlayerOne() : $this->getPlayerTwo();
    }

    /**
     * @return $this
     */
    public function setWinner(): self
    {
        //mark all players as they've lost the game
        array_map(function($player){
            $player->setWinner(false);
        }, $this->players);
        $player = $this->getPlayerOne()->getCardsWon() > $this->getPlayerTwo()->getCardsWon() ? $this->getPlayerOne() : $this->getPlayerTwo();
        //the actual winner
        $player->setWinner(true);
        return $this;
    }
}