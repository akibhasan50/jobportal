<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;
class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>User::all()->random()->id,
            'cname' =>$title = $this->faker->company,
            'slug' =>Str::slug($title),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->domainName,
            'description' => $this->faker->paragraph(rand(2,10)),
            'slogun' => $this->faker->sentence(rand(3,6),true),
            'logo' => 'ui\fontend\images\logo.png',
            'cover_photo' => 'ui\fontend\images\banner-01.jpg',
        ];
    }
}
