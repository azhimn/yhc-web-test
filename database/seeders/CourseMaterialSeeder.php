<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_materials')->insert([
            'title' => 'Pengenalan Pemrograman dengan Python',
            'description' => 'Materi ini akan memperkenalkan peserta pada dasar-dasar pemrograman menggunakan bahasa Python. Anda akan belajar tentang sintaks dasar, tipe data, variabel, dan struktur kontrol seperti percabangan dan perulangan. Melalui latihan praktis, peserta akan dapat menulis program sederhana dan memahami logika pemrograman yang mendasarinya.',
            'embed_link' => '<iframe width="256" height="144" src="https://www.youtube.com/embed/jNQXAC9IVRw?si=-wQfr6HXHNZJcNX0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            'course_id' => '1',
        ]);

        DB::table('course_materials')->insert([
            'title' => 'Struktur Data dan Algoritma Dasar',
            'description' => 'Dalam materi ini, peserta akan mempelajari konsep dasar struktur data dan algoritma yang penting dalam pemrograman. Anda akan mengenal berbagai jenis struktur data seperti array, list, dan dictionary, serta algoritma dasar seperti pencarian dan pengurutan. Materi ini bertujuan untuk memberikan pemahaman yang kuat tentang bagaimana data diorganisir dan diproses dalam program, yang merupakan keterampilan penting bagi setiap programmer.',
            'embed_link' => '<iframe width="256" height="144" src="https://www.youtube.com/embed/et28frk-kAY?si=gY1AhzfyaYyNAa4y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            'course_id' => '1',
        ]);
    }
}
