<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Level;
use App\Models\Course;
use App\Models\Unit;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class TestCourseSeeder extends Seeder
{

    public function run()
    {
      $cat1 = Category::create(['name' => 'CyberScam']);
      $cat2 = Category::create(['name' => 'Development']);
      $cat3 = Category::create(['name' => 'Design']);
      $cat4 = Category::create(['name' => 'Investments']);
      $cat5 = Category::create(['name' => 'Gaming']);
      $cat6 = Category::create(['name' => 'Marketing']);
      $cat7 = Category::create(['name' => 'SocialSkills']);
      $cat8 = Category::create(['name' => 'Legal']);
      $cat9 = Category::create(['name' => 'Politics']);
      $cat10 = Category::create(['name' => 'Entertainment']);
      $cat11 = Category::create(['name' => 'News']);

      $lvl1 = Level::create(['name'=>'Basic']);
      $lvl2 = Level::create(['name'=>'Intermediate']);
      $lvl3 = Level::create(['name'=>'Advanced']);

      $course1 = Course::create([
        'user_id' => 1,
        'category_id' => $cat1->id,
        'level_id' => $lvl2->id,
        'title' => 'La seguridad en la Blockchain',
        'subtitle' => 'Lo que tienes que saber para no caer en manos de los estafadores',
        'description' => 'En este curso podrás aprender los pilares fundamentalas de la seguridad dentro del mundo blockchain y de las criptodivisas de las manos de uno de nuestros grandes profesionales y experto en el ámbito de los ciberdelitos. En este también se aborda la seguridad fuera de la blockchain y como esta repercute tan positivamente en la seguridad dentro de ella.',
        'tags' => ['Blockchain', 'Security', 'Prevention'],
      ]);

      $unit1 = Unit::create([
        'course_id' => $course1->id,
        'title' => '¿Que es la Academy Scan DeFi?',
        'subtitle' => 'Aquí iría un subtítulo (falta pero no es obligatorio)',
        'description' => 'Descripción de esta unidad (falta pero no es obligatorio)',
      ]);

      $lesson1 = Lesson::create([
        'unit_id' => $unit1->id,
        'type' => 'video', // audio, video, text
        'title' => '¿Que es la Academy Scan DeFi?',
        'subtitle' => 'Aquí iría un subtítulo (falta pero no es obligatorio)',
        'description' => 'Aquí iría la descripción (falta pero no es obligatorio)',
        'content' => 'Pegar aquí el HTML correspondiente del archivo word',
        'opened' => 1, // 1, 0
        'preview' => 'ID_YOUTUBE', // video -> ID_YOUTUBE, audio -> '/storage/lessons/'.$lesson1->id.'/audio/nombre-del-audio.mp3'
        'duration' => 90, // este campo se define en minutos
      ]);


      Course::create([
        'user_id' => 1,
        'category_id' => 1,
        'level_id' => 1,
        'title' => 'The security inside the Blockchain',
        'subtitle' => 'The fundamentals you must know to avoid scammers',
        'description' => 'On this course you will learn the fundamentals of the security inside the Blockchain world and inside the cryptocurrencies with the help of our best professionals and experts in the scope of the cybercrime. Furthermore, is also given the basics of the security outside the blockchain and how this affects so positively in the security inside it.',
        'tags' => [
            'Blockchain',
            'Security',
            'Prevention'
        ],
        'requirements' => []
      ]);

      Course::create([
        'user_id' => 1,
        'category_id' => 1,
        'level_id' => 1,
        'title' => 'Creando tu propia criptodivisa con Solidity',
        'subtitle' => 'Como debes crear tu propio token ERC20 desde cero',
        'description' => 'Dentro de este curso podrás encontrar todos los pasos necesarios para crear tu propio token ERC20, desde cero, y sin necesidad de tener conocimientos previos, usando como base el lenguaje de programación Solidity.',
        'tags' => [
            'Blockchain',
            'Cryptocurrency',
            'Programming'
        ],
        'requirements' => []
      ]);

      $u = Unit::create([
        'course_id' => $c->id,
        'title' => '¿Que es la Academy Scan DeFi?',
        'subtitle' => 'Aquí iría un subtítulo (falta pero no es obligatorio)',
        'description' => 'Descripción de esta unidad (falta pero no es obligatorio)',
      ]);

      Lesson::create([
        'unit_id' => $u->id,
        'title' => '¿Que es la Academy Scan DeFi?',
        'subtitle' => 'Aquí iría un subtítulo (falta pero no es obligatorio)',
        'description' => 'Aquí iría la descripción (falta pero no es obligatorio)',
        'content' => 'Pegar aquí el HTML correspondiente del archivo word',
        'duration' => 90, // este campo se define en minutos
      ]);

      Lesson::create([
        'unit_id' => $u->id,
        'title' => '¿Porque creamos la ACADEMY SCAN? ',
        'subtitle' => 'Aquí iría un subtítulo (falta pero no es obligatorio)',
        'description' => 'Aquí iría la descripción (falta pero no es obligatorio)',
        'content' => 'Pegar aquí el HTML correspondiente del archivo word',
        'duration' => 90, // este campo se define en minutos
      ]);

      Lesson::create([
        'unit_id' => $u->id,
        'title' => 'Orden sugerido de temas',
        'subtitle' => 'Aquí iría un subtítulo (falta pero no es obligatorio)',
        'description' => 'Aquí iría la descripción (falta pero no es obligatorio)',
        'content' => 'Pegar aquí el HTML correspondiente del archivo word',
        'duration' => 90, // este campo se define en minutos
      ]);

      Lesson::create([
        'unit_id' => $u->id,
        'title' => 'El listado',
        'subtitle' => 'Aquí iría un subtítulo (falta pero no es obligatorio)',
        'description' => 'Aquí iría la descripción (falta pero no es obligatorio)',
        'content' => 'Pegar aquí el HTML correspondiente del archivo word',
        'duration' => 90, // este campo se define en minutos
      ]);
    }
}