<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        Storage::makeDirectory('project_images');

        $title = fake()->text(20);
        $slug =  Str::slug($title);

        $programmingLanguages = fake()->randomElements(['HTML', 'CSS', 'JavaScript', 'PHP'], rand(1, 4));
        $programmingLanguagesString = implode(',', $programmingLanguages);

        $img = fake()->image(null, 250, 250);
        $img_url = Storage::putFileAs('project_images', $img, "$slug.png");

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => fake()->paragraph(10, true),
            'image' => $img_url,
            'programming_languages' => $programmingLanguagesString,
        ];
    }
}
