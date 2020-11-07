<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Company;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>User::all()->random()->id,
            'company_id' =>Company::all()->random()->id,
            'category_id' =>Category::all()->random()->id,
            'title' =>$title = $this->faker->text,
            'slug' =>Str::slug($title),
            'roles' => $this->faker->text,
            'description' => $this->faker->paragraph(rand(2,10)),
            'address' => $this->faker->city,
            'position' => $this->faker->jobTitle,
            'type' => 'Full Time',
            'last_date' => $this->faker->dateTime,
            'status' => rand(0,1),
        
        ];
    }
}
