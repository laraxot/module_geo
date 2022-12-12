<?php

declare(strict_types=1);

namespace Modules\Geo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Geo\Models\Place as Model;

/**
 * Class ArticleFactory.
 */
class PlaceFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var string
=======
     * @var class-string<\Illuminate\Database\Eloquent\Model>
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
<<<<<<< HEAD
            //'title' => $this->faker->sentence,
            //'description' => $this->faker->paragraph,
            //'user_id' => factory(User::class)->create()->id,

            //'latitude' => $this->faker->latitude(),
=======
            // 'title' => $this->faker->sentence,
            // 'description' => $this->faker->paragraph,
            // 'user_id' => factory(User::class)->create()->id,

            // 'latitude' => $this->faker->latitude(),
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
            /*
            'latitude' => $this->faker->Address->latitude,
            'longitude' => $this->faker->longitude(),
            'route' => $this->faker->streetName(),
            'country' => $this->faker->country(),
            'street_number' => $this->faker->buildingNumber(),
            'postal_code' => $this->faker->postcode(),
            'locality' => $this->faker->city(),
            'formatted_address' => $this->faker->streetAddress(),
            */
        ];
    }
}
