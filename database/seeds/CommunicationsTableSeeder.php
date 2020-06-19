<?php

use Illuminate\Database\Seeder;
use App\Communication;
use Faker\Generator as Faker;

class CommunicationsTableSeeder extends Seeder
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
            //Istanza
            $newCommunication = new Communication();
            $newCommunication->title = $faker->sentence(6, true);
            $newCommunication->author = $faker->name();
            $newCommunication->article = $faker->paragraph(3, true);
            $newCommunication->save();
        }

        //Metodo senza usare faker:
        //Creo array di array con i dati con cui voglio riempire la tabella (importante inserire use Students in alto)
        // $communications = [
        //     [
        //         'title' => 'La Juve campione d\'Italia!',
        //         'author' => 'Mino Taveri',
        //         'article' => "La Juve è nella leggenda. Mai nessuno nella storia era riuscito a conquistare in Italia otto scudetti consecutivi, non c’è mai stata una squadra in grado di segnare un’epoca come hanno fatto i bianconeri dal 2012 in poi. Quest’anno non c’è mai stata discussione, la Juve ha dominato dall’inizio alla fine ed è riuscita a trionfare con cinque giornate di anticipo, un record come l’Inter del 2007. Merito di una campagna acquisti sontuosa che ad una squadra già fortissima ha aggiunto campione come Bonucci, Cancelo, Emre Can e soprattutto Cristiano Ronaldo."
        //     ],
        //     [
        //         'title' => 'La Roma acquista Mancini!',
        //         'author' => 'Nando Martellotti',
        //         'article' => "Ora è ufficiale, Gianluca Mancini è un nuovo giocatore della Roma. Dopo aver sostenuto le visite mediche a Villa Stuart il difensore ex Atalanta ha firmato il contratto quinquennale a Trigoria insieme al direttore sportivo Petrachi. Questo il comunicato del club giallorosso."
        //     ],
        //     [
        //         'title' => 'Il Napoli vince la Coppa Italia!',
        //         'author' => 'Pierpiero Gallinetta',
        //         'article' => "Il primo trofeo che è riuscito ad andare oltre la pandemia ha superato anche i 90' di gioco, fino ad arrivare all'appendice dei rigori. L'ha vinto il Napoli, che più della Juve aveva meritato, grazie all'infallibilità dei propri giocatori dal dischetto, ma anche alla parata di Meret sulla prima conclusione di Dybala. Un riscatto per il portierino del Napoli, reduce da una stagione tribolata. La maledizione di Sarri continua e si materializza una volta di più nella serata in cui Gattuso trionfa per la prima volta in carriera da allenatore, dopo avere vinto tutto da incontrista. Peccato che si sia trattato di una vittoria senza festa e senza boati di folla, senza il capo dello Stato e con l'inno steccato da Sergio Sylvestre, in un Olimpico vuoto e colorato solo virtualmente"
        //     ],
        //     [
        //         'title' => 'Lorem Lorem Lorem!',
        //         'author' => 'Sigmund Chiappaventi',
        //         'article' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis magnam sit illo reiciendis omnis in commodi, libero aspernatur unde soluta provident sunt, veritatis possimus eum tenetur expedita sequi quasi! Totam."
        //     ]
        // ];

        // foreach($communications as $communication) {
        //     $newCommunication = new Communication();
        //     $newCommunication->fill($communication); //non serve il fillable perché il run lo disabilita e semplicemente prende i dati dall'array
        //     $newCommunication->save();
        // }
    }
}
