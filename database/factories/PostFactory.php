<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /* return [
            'tytul' => fake()->sentence(fake()->numberBetween(2,7)),
            'autor' => fake()->name(),
            'email' => fake()->freeEmail(),
            'tresc' => fake()->text(),
            'created_at' => fake()->dateTime()
        ]; */
        $user_id = User::get('id')->toArray(); //pobranie istniejacych id z tabeli users
        $id_user = array(); //utworzenie pustej tablicy
        foreach ($user_id as $klucz) array_push($id_user, $klucz['id']); //uzupełnienie tablicy wartościami Int dla klucza id
        $los_id_user = Arr::random($id_user); // wylosowanie id_usera z tablicy $id_user
        return [
            'tytul' => fake()->sentence(fake()->numberBetween(2,7)),
            'tresc' => fake()->text(),
            'created_at' => fake()->dateTime(),
            'user_id' => $los_id_user, // przypisanie losowego id z istniejących w tabeli users
        ];
        // pełna lista metod fake() https://fakerphp.github.io/
    }
}
