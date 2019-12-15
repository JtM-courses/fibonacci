<?php

/**
 * Class Timer
 */
class Timer
{
    /**
     * @var
     */
    private $start;
    /**
     * @var
     */
    private $stop;

    /**
     *
     */
    public function start(): void
    {
        $this->start = microtime(true);
    }

    /**
     * @return $this
     */
    public function stop(): self
    {
        $this->stop = microtime(true);
        return $this;
    }

    /**
     * @return float
     */
    public function diff(): float
    {
        return $this->stop - $this->start;
    }
}
