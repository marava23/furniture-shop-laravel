<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "email" => $this->faker->email,
            "name" => $this->faker->name,
            "title" => $this->faker->word,
            "message" => $this->faker->text(300),
            "read" => 1,
            "created_at" => now()
        ];
    }
}
