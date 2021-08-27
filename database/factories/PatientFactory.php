<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'national_id' => '123456789123123123',
            'birthday' => '25-02-2000',
            'age' => 21,
            'state_of_residence' => 'Alger',
            'city_of_residence' => 'Alger',
            'address' => 'Alger city ...',
            'phone' => '0655446633',
            'first_injection_date' => '25-02-2021',
            'next_appointment' => '25-04-2021',
        ];
    }
}
