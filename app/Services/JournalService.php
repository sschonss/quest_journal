<?php

namespace App\Services;

use Faker\Factory as Faker;

class JournalService
{
    public function generate(): string
    {
        return Faker::create()->company();
    }

}
