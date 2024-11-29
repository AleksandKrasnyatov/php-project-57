<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{

    /**
     * @var string
     */
    protected $model = Status::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
