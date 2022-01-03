<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $networking = Major::create(['major' => 'Networking']);
        $ct = Major::create(['major' => 'CT']);
        $cs = Major::create(['major'=>'CS']);
        $web = Major::create(['major' => 'Web Development']);
        $android = Major::create(['major' => 'Android']);
    }
}
