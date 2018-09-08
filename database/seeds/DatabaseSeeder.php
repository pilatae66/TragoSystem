<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 1)->create();
        factory(App\Student::class, 1)->create();
        factory(App\Question::class, 10)->create();
        factory(App\Answer::class, 10)->create();
        factory(App\Exam::class, 1)->create();
        factory(App\Score::class, 10)->create();
        factory(App\Questionnaire::class, 10)->create();
    }
}
