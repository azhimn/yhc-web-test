<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            'title' => 'Belajar Dasar Pemrograman',
            'description' => 'Selamat datang di kursus "Belajar Pemrograman Dasar"! Kursus ini dirancang untuk pemula yang ingin memahami konsep dasar pemrograman dan membangun fondasi yang kuat untuk pengembangan perangkat lunak. Dalam kursus ini, Anda akan mempelajari berbagai bahasa pemrograman populer, seperti Python, Java, atau JavaScript, serta prinsip-prinsip dasar yang berlaku di semua bahasa pemrograman.',
            'duration' => '48'
        ]);

        DB::table('courses')->insert([
            'title' => 'Belajar Dasar Pemrograman Web',
            'description' => 'Selamat datang di kursus "Belajar Pemrograman Dasar Web"! Kursus ini dirancang untuk pemula yang ingin memahami dasar-dasar pengembangan web dan membangun situs web interaktif. Dalam kursus ini, Anda akan mempelajari teknologi dan alat yang diperlukan untuk menciptakan halaman web yang menarik dan fungsional.',
            'duration' => '48'
        ]);
    }
}
