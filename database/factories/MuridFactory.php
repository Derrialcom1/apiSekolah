<?php

namespace Database\Factories;

use App\Models\Murid;
use Illuminate\Database\Eloquent\Factories\Factory;

class MuridFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Murid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nisn' => $this->faker->unique()->randomNumber(7),
            'name_murid' => $this->faker->name(),
            'email_murid' => $this->faker->unique()->email(),
            'number_phone_murid' => $this->faker->randomNumber(8),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(["Pria","Wanita"]),
            'kelas_id' => $this->faker->numberBetween($min = 1, $max = 4),
        ];
    }
}
