<?php

use Illuminate\Database\Seeder;
use App\Referee;
use Faker\Generator as Faker;

class RefereesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        //Metodo usando Faker
        //Possiamo eliminare i fake data creati in precedenza così: Student::truncate();
        //Stabilisco numero di risultati da generare
        $records = 10;
        //Ciclo per aggiungere i dati alla tabella
        for($i = 0; $i < $records; $i++) {
            //random gender
            $gender = $faker->randomElement(['male', 'female']); //randomElement decide il genere in modo random
            $genderShort = ($gender == 'male') ? 'm' : 'f';
            //Istanza
            $newReferee = new Referee();
            $newReferee->name = $faker->name($gender);
            $newReferee->city = 'Bologna';
            $newReferee->gender = $genderShort;
            $newReferee->date_of_birth = $faker->date($format = 'Y-m-d', $max = '1985-12-31');
            $newReferee->description = $faker->paragraph(1, true);
            $newReferee->save();
        }


        //Metodo senza usare faker (bisogna togliere il parametro Faker $faker):
        //Creo array di array con i dati con cui voglio riempire la tabella (importante inserire use Students in alto)
        // $referees = [
        //     [
        //         'name' => 'Gennaro Pierpaoli',
        //         'city' => 'Bologna',
        //         'gender' => 'm',
        //         'date_of_birth' => '1978-03-12 10:37:05',
        //         'description' => 'i pinguini sono animali molto carini'
        //     ],
        //     [
        //         'name' => 'Tommaso Fasolo',
        //         'city' => 'Milano',
        //         'gender' => 'm',
        //         'date_of_birth' => '1975-06-1 11:40:25',
        //         'description' => 'i pinguini sono animali molto carini'
        //     ],
        //     [
        //         'name' => 'Giovanna Loconsole',
        //         'city' => 'Bari',
        //         'gender' => 'f',
        //         'date_of_birth' => '1980-12-1 20:37:05',
        //         'description' => 'il re delle foreste illegali maialino uccisamente sapete selvatici in un a del!'
        //     ],
        //     [
        //         'name' => 'Paolo Ferrante',
        //         'city' => 'Ferrara',
        //         'gender' => 'm',
        //         'date_of_birth' => '1982-10-5 21:00:05',
        //         'description' => 'sostiene che pippo baudo sia un grande statista'
        //     ]
        // ];

        // foreach($referees as $referee) {
        //     $newReferee = new Referee();
        //     $newReferee->fill($referee); //non serve il fillable perché il run lo disabilita e semplicemente prende i dati dall'array
        //     $newReferee->save();
        // }
    }
}
