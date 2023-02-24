<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            0 => [
                'id' => 1,
                'city' => 'Adana',
            ],
            1 => [
                
                'id' => 2,
                'city' => 'Adıyaman',
            ],
            2 => [
                
                'id' => 3,
                'city' => 'Afyonkarahisar',
            ],
            3 => [
                
                'id' => 4,
                'city' => 'Ağrı',
            ],
            4 => [
                
                'id' => 5,
                'city' => 'Amasya',
            ],
            5 => [
                
                'id' => 6,
                'city' => 'Ankara',
            ],
            6 => [
                
                'id' => 7,
                'city' => 'Antalya',
            ],
            7 => [
                
                'id' => 8,
                'city' => 'Artvin',
            ],
            8 => [
                
                'id' => 9,
                'city' => 'Aydın',
            ],
            9 => [
                
                'id' => 10,
                'city' => 'Balıkesir',
            ],
            10 => [
                
                'id' => 11,
                'city' => 'Bilecik',
            ],
            11 => [
                
                'id' => 12,
                'city' => 'Bingöl',
            ],
            12 => [
                
                'id' => 13,
                'city' => 'Bitlis',
            ],
            13 => [
                
                'id' => 14,
                'city' => 'Bolu',
            ],
            14 => [
                
                'id' => 15,
                'city' => 'Burdur',
            ],
            15 => [
                
                'id' => 16,
                'city' => 'Bursa',
            ],
            16 => [
                
                'id' => 17,
                'city' => 'Çanakkale',
            ],
            17 => [
                
                'id' => 18,
                'city' => 'Çankırı',
            ],
            18 => [
                
                'id' => 19,
                'city' => 'Çorum',
            ],
            19 => [
                
                'id' => 20,
                'city' => 'Denizli',
            ],
            20 => [
                
                'id' => 21,
                'city' => 'Diyarbakır',
            ],
            21 => [
                
                'id' => 22,
                'city' => 'Edirne',
            ],
            22 => [
                
                'id' => 23,
                'city' => 'Elazığ',
            ],
            23 => [
                
                'id' => 24,
                'city' => 'Erzincan',
            ],
            24 => [
                
                'id' => 25,
                'city' => 'Erzurum',
            ],
            25 => [
                
                'id' => 26,
                'city' => 'Eskişehir',
            ],
            26 => [
                
                'id' => 27,
                'city' => 'Gaziantep',
            ],
            27 => [
                
                'id' => 28,
                'city' => 'Giresun',
            ],
            28 => [
                
                'id' => 29,
                'city' => 'Gümüşhane',
            ],
            29 => [
                
                'id' => 30,
                'city' => 'Hakkari',
            ],
            30 => [
                
                'id' => 31,
                'city' => 'Hatay',
            ],
            31 => [
                
                'id' => 32,
                'city' => 'Isparta',
            ],
            32 => [
                
                'id' => 33,
                'city' => 'Mersin',
            ],
            33 => [
                
                'id' => 34,
                'city' => 'İstanbul',
            ],
            34 => [
                
                'id' => 35,
                'city' => 'İzmir',
            ],
            35 => [
                
                'id' => 36,
                'city' => 'Kars',
            ],
            36 => [
                
                'id' => 37,
                'city' => 'Kastamonu',
            ],
            37 => [
                
                'id' => 38,
                'city' => 'Kayseri',
            ],
            38 => [
                
                'id' => 39,
                'city' => 'Kırklareli',
            ],
            39 => [
                
                'id' => 40,
                'city' => 'Kırşehir',
            ],
            40 => [
                
                'id' => 41,
                'city' => 'Kocaeli',
            ],
            41 => [
                
                'id' => 42,
                'city' => 'Konya',
            ],
            42 => [
                
                'id' => 43,
                'city' => 'Kütahya',
            ],
            43 => [
                
                'id' => 44,
                'city' => 'Malatya',
            ],
            44 => [
                
                'id' => 45,
                'city' => 'Manisa',
            ],
            45 => [
                
                'id' => 46,
                'city' => 'Kahramanmaraş',
            ],
            46 => [
                
                'id' => 47,
                'city' => 'Mardin',
            ],
            47 => [
                
                'id' => 48,
                'city' => 'Muğla',
            ],
            48 => [
                
                'id' => 49,
                'city' => 'Muş',
            ],
            49 => [
                
                'id' => 50,
                'city' => 'Nevşehir',
            ],
            50 => [
                
                'id' => 51,
                'city' => 'Niğde',
            ],
            51 => [
                
                'id' => 52,
                'city' => 'Ordu',
            ],
            52 => [
                
                'id' => 53,
                'city' => 'Rize',
            ],
            53 => [
                
                'id' => 54,
                'city' => 'Sakarya',
            ],
            54 => [
                
                'id' => 55,
                'city' => 'Samsun',
            ],
            55 => [
                
                'id' => 56,
                'city' => 'Siirt',
            ],
            56 => [
                
                'id' => 57,
                'city' => 'Sinop',
            ],
            57 => [
                
                'id' => 58,
                'city' => 'Sivas',
            ],
            58 => [
                
                'id' => 59,
                'city' => 'Tekirdağ',
            ],
            59 => [
                
                'id' => 60,
                'city' => 'Tokat',
            ],
            60 => [
                
                'id' => 61,
                'city' => 'Trabzon',
            ],
            61 => [
                
                'id' => 62,
                'city' => 'Tunceli',
            ],
            62 => [
                
                'id' => 63,
                'city' => 'Şanlıurfa',
            ],
            63 => [
                
                'id' => 64,
                'city' => 'Uşak',
            ],
            64 => [
                
                'id' => 65,
                'city' => 'Van',
            ],
            65 => [
                
                'id' => 66,
                'city' => 'Yozgat',
            ],
            66 => [
                
                'id' => 67,
                'city' => 'Zonguldak',
            ],
            67 => [
                
                'id' => 68,
                'city' => 'Aksaray',
            ],
            68 => [
                
                'id' => 69,
                'city' => 'Bayburt',
            ],
            69 => [
                
                'id' => 70,
                'city' => 'Karaman',
            ],
            70 => [
                
                'id' => 71,
                'city' => 'Kırıkkale',
            ],
            71 => [
                
                'id' => 72,
                'city' => 'Batman',
            ],
            72 => [
                
                'id' => 73,
                'city' => 'Şırnak',
            ],
            73 => [
                
                'id' => 74,
                'city' => 'Bartın',
            ],
            74 => [
                
                'id' => 75,
                'city' => 'Ardahan',
            ],
            75 => [
                
                'id' => 76,
                'city' => 'Iğdır',
            ],
            76 => [
                
                'id' => 77,
                'city' => 'Yalova',
            ],
            77 => [
                
                'id' => 78,
                'city' => 'Karabük',
            ],
            78 => [
                
                'id' => 79,
                'city' => 'Kilis',
            ],
            79 => [
                
                'id' => 80,
                'city' => 'Osmaniye',
            ],
            80 => [
                
                'id' => 81,
                'city' => 'Düzce',
            ],
        ]);
    }
}
