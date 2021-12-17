<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $room_types = array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Activation',
                'is_active' => 1,
                'created_at' => '2021-08-04 22:52:24',
                'updated_at' => '2021-08-04 22:52:24',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Activation + LAN',
                'is_active' => 1,
                'created_at' => '2021-08-04 22:52:24',
                'updated_at' => '2021-08-04 22:52:24',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Can’t Access Internet',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:09:56',
                'updated_at' => '2021-08-05 19:09:56',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Slow Access Internet',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:20:58',
                'updated_at' => '2021-08-05 19:20:58',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Connection ON-OFF',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:21:08',
                'updated_at' => '2021-08-05 19:21:08',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Dismantle',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:21:22',
                'updated_at' => '2021-08-05 19:21:22',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'LAN',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:21:29',
                'updated_at' => '2021-08-05 19:21:29',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Local Connection Problem',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:21:43',
                'updated_at' => '2021-08-05 19:21:43',
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'Power-Off',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:23:16',
                'updated_at' => '2021-08-05 19:23:16',
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'Power Repair',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:23:25',
                'updated_at' => '2021-08-05 19:23:25',
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'Replace ONU',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:23:32',
                'updated_at' => '2021-08-05 19:23:32',
            ),
            11 =>
            array(
                'id' => 12,
                'name' => 'Survey Location',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:23:39',
                'updated_at' => '2021-08-05 19:23:39',
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'Tool Retrieval',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:23:46',
                'updated_at' => '2021-08-05 19:23:46',
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'Transvision ',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:23:54',
                'updated_at' => '2021-08-05 19:23:54',
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'Other',
                'is_active' => 1,
                'created_at' => '2021-08-05 19:24:02',
                'updated_at' => '2021-08-05 19:24:02',
            ),
//            15 =>
//            array(
//                'id' => 16,
//                'name' => 'Workspace Animation Production',
//                'is_active' => 1,
//                'created_at' => '2021-08-05 19:24:09',
//                'updated_at' => '2021-08-05 19:24:09',
//            ),
//            16 =>
//            array(
//                'id' => 17,
//                'name' => 'Workspace Creative Art Studio',
//                'is_active' => 1,
//                'created_at' => '2021-08-05 19:24:15',
//                'updated_at' => '2021-08-05 19:24:15',
//            ),
//            17 =>
//            array(
//                'id' => 18,
//                'name' => 'Studio Fotografi',
//                'is_active' => 1,
//                'created_at' => '2021-08-05 19:24:22',
//                'updated_at' => '2021-08-05 19:24:22',
//            ),
//            18 =>
//            array(
//                'id' => 19,
//                'name' => 'Studio Broadcasting',
//                'is_active' => 1,
//                'created_at' => '2021-08-05 19:24:34',
//                'updated_at' => '2021-08-05 19:24:34',
//            ),
//            19 =>
//            array(
//                'id' => 20,
//                'name' => 'Studio Audio',
//                'is_active' => 1,
//                'created_at' => '2021-08-05 19:24:43',
//                'updated_at' => '2021-08-05 19:24:43',
//            ),
//            20 =>
//            array(
//                'id' => 21,
//                'name' => 'Workspace Clay Modelling',
//                'is_active' => 1,
//                'created_at' => '2021-08-05 19:24:50',
//                'updated_at' => '2021-08-05 19:24:50',
//            ),
//            21 =>
//            array(
//                'id' => 22,
//                'name' => 'Workspace Terrestrial Survey',
//                'is_active' => 1,
//                'created_at' => '2021-08-05 19:25:01',
//                'updated_at' => '2021-08-05 19:25:01',
//            ),
//            22 =>
//            array(
//                'id' => 23,
//                'name' => 'Workspace Hydrographic Survey',
//                'is_active' => 1,
//                'created_at' => '2021-08-05 19:25:10',
//                'updated_at' => '2021-08-05 19:25:10',
//            ),
        );

        // Checking if the table already have a query
        if (is_null(\DB::table('room_types')->first()))
            \DB::table('room_types')->insert($room_types);
        else
            echo "\e[31mTable is not empty, therefore NOT ";
    }
}
