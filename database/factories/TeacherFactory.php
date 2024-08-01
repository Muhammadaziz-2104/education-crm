<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Room;
use App\Models\Skill;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'skill_id' => Skill::factory(), // Adjust range as needed
            'room_id' => Room::factory(), // Adjust range as needed
            'course_id' => Course::factory(), // Adjust range as needed
            'user_id' => User::factory(), // Adjust range as needed
            'phone' => $this->faker->phoneNumber,
            'salary' => $this->faker->numberBetween(20000, 100000), // Adjust range as needed
        ];
    }
}
