<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batch = [
            [
                'name' => 'Salam Navigasi',
                'type' => Str::slug('Navigation', '-'),
                'format' => 'text',
                'content' => Str::upper('Hello, There!'),
                'created_at' => (new datetime()),
                'updated_at' => (new datetime())
            ], [
                'name' => 'Keahlian',
                'type' => Str::slug('Masthead Subheading', '-'),
                'format' => 'text',
                'content' => 'Web Developer',
                'created_at' => (new datetime()),
                'updated_at' => (new datetime())
            ], [
                'name' => 'Tentang Saya',
                'type' => Str::slug('About Section', '-'),
                'format' => 'textarea',
                'content' => 'Saya seorang Back-End Developer yang familiar dengan Framework Laravel. Pembuatan fitur
                lebih mudah dengan menggunakan Scope, Accessor & Mutator, Middleware dan Relationships.
                Saat ini saya tertarik dan belajar Dev Ops. Saya menikmati anime dan membaca artikel
                di waktu luang saya.',
                'created_at' => (new datetime()),
                'updated_at' => (new datetime())
            ], [
                'name' => 'Lokasi',
                'type' => Str::slug('Footer Location', '-'),
                'format' => 'text',
                'content' => 'Sidoarjo, Jawa Timur',
                'created_at' => (new datetime()),
                'updated_at' => (new datetime())
            ], [
                'name' => 'Kata Motivasi',
                'type' => Str::slug('Footer Motivation', '-'),
                'format' => 'text',
                'content' => '<strong>It’s not a bug. </strong> It’s an undocumented feature!',
                'created_at' => (new datetime()),
                'updated_at' => (new datetime())
            ],
        ];

        DB::table('options')->insert($batch);
    }
}
