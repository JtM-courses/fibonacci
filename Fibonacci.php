<?php

/**
 * Class Fibonacci
 */
class Fibonacci
{
    /**
     * @param int $position
     * @return float
     * @throws Exception
     */
    public function methodFor(int $position): float
    {
        $this->validate($position);
        $one = 1;
        $two = 1;

        if ($position <= 2) {
            return $one;
        }

        for ($i = 3; $i <= $position; $i++) {
            list($one, $two) = [$two, $one + $two];
        }

        return $two;
    }

    /**
     * @param int $position
     * @return float
     * @throws Exception
     */
    public function methodArray(int $position): float
    {
        $this->validate($position);
        $data = [0, 1];

        if (isset($data[$position])) {
            return $data[$position];
        }

        for ($i = 2; $i <= $position; $i++) {
            $data[] = array_sum($data);
            array_shift($data);
        }

        return end($data);
    }

    public function methodRecursive(int $position): float
    {
        $this->validate($position);

        if ($position === 1 || $position === 2) {
            return 1;
        }

        return $this->methodRecursive($position - 1) + $this->methodRecursive($position - 2);
    }

    private $safe = [0, 1, 1];

    public function methodRecursiveSafe(int $position): float
    {
        $this->validate($position);

        if (!isset($this->safe[$position])) {
            $this->safe[$position] = $this->methodRecursiveSafe($position - 1) + $this->methodRecursiveSafe($position - 2);
        }

        return $this->safe[$position];
    }

    public function methodMath(int $position): float
    {
        $f = (1 + sqrt(5)) / 2;
        return ($f ** $position) / sqrt(5);
    }

    /**
     * @param int $position
     * @throws Exception
     */
    private function validate(int $position): void
    {
        if ($position < 1) {
            throw new Exception('bad format', 400);
        }
    }
}