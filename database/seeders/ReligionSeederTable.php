<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Religion;
use Illuminate\Support\Facades\DB;
class ReligionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('religions')->delete();

        $religions =[
        [
            'en'=> 'Muslim',
            'ar'=> 'مسلم'
        ],
        [
            'en'=> 'Christian',
            'ar'=> 'مسيحي'
        ],
        [
            'en'=> 'Other',
            'ar'=> 'غيرذلك'
        ],

    ];


        foreach($religions as $religion){
            Religion::create(['Name' =>$religion]);
        }
    }
}
