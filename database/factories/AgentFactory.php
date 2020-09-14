<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AgentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(5),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'voting_station' => $this->faker->city
        ];
    }
}
