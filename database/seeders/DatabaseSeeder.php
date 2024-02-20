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
            'description' =>'O curso de Enfermagem forma profissionais capazes de cuidar de pacientes para promover a recuperação da saúde ou qualidade de vida, coletar informações que possam ajudar no diagnóstico médico, administrar medicamentos e aplicar curativos, entre outras atividades.',
            'mini_description' =>'Atendimento, Apredizagem, Estagios',
            'image' => 'tec_enfermagem.jpg',
            'slug'=> 'curso-enfermagem'
        ]);

        Course::create([
            'title' => 'Informatica',
            'description' =>'O curso de Informática capacita profissionais para o desenvolvimento, implementação e gestão de sistemas de informação e soluções computacionais. O programa prepara os estudantes para lidar com as tecnologias da informação (TI), abrangendo desde a programação de computadores até a análise de sistemas, passando pela gestão de redes de dados e a segurança da informação.',
            'mini_description' => 'Internet, TI, Pacote Office, Edição',
            'image' =>'curso_informatica.jpg',
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
