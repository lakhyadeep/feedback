<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wards = [
            array('title' => 'Ward No 1', 'ward_no' => '1', 'lgd_Code' => '66090'),
            array('title' => 'Ward No 2', 'ward_no' => '2', 'lgd_Code' => '66091'),
            array('title' => 'Ward No 3', 'ward_no' => '3', 'lgd_Code' => '66092'),
            array('title' => 'Ward No 4', 'ward_no' => '4', 'lgd_Code' => '66093'),
            array('title' => 'Ward No 5', 'ward_no' => '5', 'lgd_Code' => '66094'),

            array('title' => 'Ward No 6', 'ward_no' => '6', 'lgd_Code' => '66095'),
            array('title' => 'Ward No 7', 'ward_no' => '7', 'lgd_Code' => '66096'),
            array('title' => 'Ward No 8', 'ward_no' => '8', 'lgd_Code' => '66097'),
            array('title' => 'Ward No 9', 'ward_no' => '9', 'lgd_Code' => '66098'),
            array('title' => 'Ward No 10', 'ward_no' => '10', 'lgd_Code' => '66099'),

            array('title' => 'Ward No 11', 'ward_no' => '11', 'lgd_Code' => '66100'),
            array('title' => 'Ward No 12', 'ward_no' => '12', 'lgd_Code' => '66101'),
            array('title' => 'Ward No 13', 'ward_no' => '13', 'lgd_Code' => '66102'),
            array('title' => 'Ward No 14', 'ward_no' => '14', 'lgd_Code' => '66103'),
            array('title' => 'Ward No 15', 'ward_no' => '15', 'lgd_Code' => '66104'),

            array('title' => 'Ward No 16', 'ward_no' => '16', 'lgd_Code' => '66280'),
            array('title' => 'Ward No 17', 'ward_no' => '17', 'lgd_Code' => '66281'),
            array('title' => 'Ward No 18', 'ward_no' => '18', 'lgd_Code' => '66282'),
            array('title' => 'Ward No 19', 'ward_no' => '19', 'lgd_Code' => '66283'),
            array('title' => 'Ward No 20', 'ward_no' => '20', 'lgd_Code' => '66284'),

            array('title' => 'Ward No 21', 'ward_no' => '21', 'lgd_Code' => '66285'),
            array('title' => 'Ward No 22', 'ward_no' => '22', 'lgd_Code' => '66286'),
            array('title' => 'Ward No 23', 'ward_no' => '23', 'lgd_Code' => '66088'),
            array('title' => 'Ward No 24', 'ward_no' => '24', 'lgd_Code' => '66287'),
            array('title' => 'Ward No 25', 'ward_no' => '25', 'lgd_Code' => '66089'),
        ];
        DB::table('wards')->insert($wards);
    }
}
