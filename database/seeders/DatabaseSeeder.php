<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Polo;
use App\Models\CoursePolo;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Course::create([
            'title' => 'Enfermagem',
            'description' =>'Curso de Enfergem, Melhor da região teste testeteste teste',
            'mini_description' =>'atendimento, apredizagem, estagios',
            'image' => 'courses/images/default.jpg',
            'slug'=> 'curso-enfermagem'
        ]);

        Course::create([
            'title' => 'Informatica',
            'description' =>'Curso de Informatica, Melhor da região teste teste
            teste teste',
            'mini_description' => 'atendimento, apredizagem, estagios',
            'image' =>'courses/images/default.jpg',
            'slug' =>'curso-informatica'
        ]);


        Polo::create([
            'name' => 'Cururupu',
            'address' => 'Rua 3 quadra 2',
            'image' => 'polos/images/default.jpg',
            'contact' => '989898',
            'slug'=> 'polo_cpu',
            'acronym' => 'CPU'
        ]);

         Polo::create([
            'name' => 'Pinheiro',
            'address' => 'Rua 10 quadra 2',
            'image' => 'polos/images/default.jpg',
            'contact' => '9898',
            'slug'=> 'polo_pinheiro',
            'acronym' => 'PINH'
        ]);


         CoursePolo::create([
            'course_id' => 1,
            'polo_id' => 1,
            'registration_price' => 49.99,
            'workload' => 60,
            'available' => 1
         ]);

         CoursePolo::create([
            'course_id' => 1,
            'polo_id' => 2,
            'registration_price' => 49.99,
            'workload' => 60,
            'available' => 1
         ]);

         CoursePolo::create([
            'course_id' => 2,
            'polo_id' => 1,
            'registration_price' => 49.99,
            'workload' => 60,
            'available' => 1
         ]);

         CoursePolo::create([
            'course_id' => 2,
            'polo_id' => 2,
            'registration_price' => 49.99,
            'workload' => 60,
            'available' => 1
         ]);
        
    }
}
