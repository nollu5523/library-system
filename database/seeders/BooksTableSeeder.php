<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
        	'id' => 1,
        	'isbn' => '978-83-900210-1-0',
        	'title' => 'Pan Tadeusz',
        	'description' => 'Akcja Pana Tadeusza rozgrywa się na Litwie w dworku w Soplicowie oraz w Dobrzynie.',
            'quantity' => 5,
        	'category_id' => 1,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 2,
        	'isbn' => '978-3-456-34240-5',
        	'title' => 'Terapeutka',
        	'description' => 'Budząca dreszcz grozy opowieść o wymarzonym domu, który skrywa mroczną tajemnicę…',
            'quantity' => 5,
        	'category_id' => 5,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 3,
        	'isbn' => '978-3-445-64542-5',
        	'title' => 'Niewidzialne życie Addie LaRue',
        	'description' => 'Nigdy nie módl się do bogów, którzy odpowiadają po zmroku.',
            'quantity' => 5,
        	'category_id' => 2,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 4,
        	'isbn' => '978-1-4456-4542-1',
        	'title' => 'Bajki robotów',
        	'description' => 'Dawno, dawno temu, gdzieś za Cieśniną Andromedzką żyli sobie Palibaba-intelektryk, Królewna Elektrina i robot Automateusz...',
            'quantity' => 5,
        	'category_id' => 3,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 5,
        	'isbn' => '978-2-13-412400-5',
        	'title' => 'To',
        	'description' => 'Najbardziej przerażająca powieść króla grozy. Doceniona przez miliony czytelników na całym świecie. Otoczona kultowym uwielbieniem.',
            'quantity' => 5,
        	'category_id' => 4,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 6,
        	'isbn' => '978-1-134-12400-8',
        	'title' => 'Lalka',
        	'description' => 'Historia zamożnego warszawskiego kupca, Stanisława Wokulskiego i jego miłości do pięknej, choć zubożałej arystokratki, Izabeli Łęckiej.',
            'quantity' => 5,
        	'category_id' => 6,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 7,
        	'isbn' => '978-83-13-41240-6',
        	'title' => 'Konstytucja Rzeczypospolitej Polskiej',
        	'description' => 'Ta edycja zawiera pełny tekst Ustawy Zasadniczej wraz ze wskazówkami dla użytkowników. Objaśnienia w przystępny sposób pomagają użytkownikowi w zrozumieniu istoty oraz konsekwencji zapisanych w tej ustawie postanowień.',
            'quantity' => 5,
        	'category_id' => 7,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 8,
        	'isbn' => '978-83-11-54120-7',
        	'title' => 'Jadalne kwiaty',
        	'description' => 'Słodkie pierwiosnki, kwaśne begonie, goryczkowe aksamitki, pikantne nasturcje – kwiaty mogą nie tylko przepięknie wyglądać, lecz także doskonale… smakować!',
            'quantity' => 5,
        	'category_id' => 8,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 9,
        	'isbn' => '978-4-311-54120-9',
        	'title' => 'Bogaty ojciec, biedny ojciec',
        	'description' => 'Chcesz wiedzieć, jak dysponować budżetem? Chciałbyś dzielić się tą cenną umiejętnością ze swoimi pociechami? Dzięki poradnikowi „Bogaty ojciec, biedny ojciec” zdobędziesz wiedzę o pieniądzach, której prawdopodobnie nikt wcześniej Ci nie przekazał.',
            'quantity' => 5,
        	'category_id' => 9,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 10,
        	'isbn' => '978-83-981512-3-8',
        	'title' => 'Bywalec zieleni',
        	'description' => '"Bywalec zieleni" to ciekawie napisana książka o życiu jednego z największych polskich poetów. Autor przedstawia korzenie rodzinne, w tym nieznane fakty, oparte o najnowszy stan wiedzy, przytacza wiele nowych informacji, prostuje błędy.',
            'quantity' => 5,
        	'category_id' => 10,
        	'publishing_id' => 1,
        ]);
        DB::table('books')->insert([
        	'id' => 11,
        	'isbn' => '978-1-235-12310-10',
        	'title' => 'Dziady',
        	'description' => 'cykl dramatów romantycznych Adama Mickiewicza publikowany w latach 1823–1860.',
            'quantity' => 5,
        	'category_id' => 1,
        	'publishing_id' => 1,
        ]);
        

    }
}
