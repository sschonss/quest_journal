<?php

namespace App\Services;

class FakeNumber
{
    public function generate(string $title): int
    {
        return strlen($title);
    }

}
