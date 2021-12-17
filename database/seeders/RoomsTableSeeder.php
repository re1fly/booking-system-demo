<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $rooms = array(
            0 =>
            array(
                'id' => 1,
                'name' => '601',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 3,
                'created_at' => '2021-08-05 19:08:55',
                'updated_at' => '2021-08-05 19:11:17',
                'deleted_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'name' => '604',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 4,
                'created_at' => '2021-08-05 19:19:45',
                'updated_at' => '2021-08-05 19:19:45',
                'deleted_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'name' => '606',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 5,
                'created_at' => '2021-08-05 19:32:33',
                'updated_at' => '2021-08-05 19:32:33',
                'deleted_at' => NULL,
            ),
            3 =>
            array(
                'id' => 4,
                'name' => '608',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 6,
                'created_at' => '2021-08-05 19:32:45',
                'updated_at' => '2021-08-05 19:32:45',
                'deleted_at' => NULL,
            ),
            4 =>
            array(
                'id' => 5,
                'name' => '704',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 7,
                'created_at' => '2021-08-05 19:32:57',
                'updated_at' => '2021-08-05 19:32:57',
                'deleted_at' => NULL,
            ),
            5 =>
            array(
                'id' => 6,
                'name' => '706',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 8,
                'created_at' => '2021-08-05 19:33:09',
                'updated_at' => '2021-08-05 19:33:09',
                'deleted_at' => NULL,
            ),
            6 =>
            array(
                'id' => 7,
                'name' => '805',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 9,
                'created_at' => '2021-08-05 19:33:30',
                'updated_at' => '2021-08-05 19:33:30',
                'deleted_at' => NULL,
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'RTF.V.1',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 10,
                'created_at' => '2021-08-05 19:33:45',
                'updated_at' => '2021-08-05 19:33:45',
                'deleted_at' => NULL,
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'RTF.IV.2',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 11,
                'created_at' => '2021-08-05 19:34:02',
                'updated_at' => '2021-08-05 19:34:02',
                'deleted_at' => NULL,
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'RTF.V.2',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 12,
                'created_at' => '2021-08-05 19:34:25',
                'updated_at' => '2021-08-05 19:34:25',
                'deleted_at' => NULL,
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'RTF.V.1',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 13,
                'created_at' => '2021-08-05 19:34:49',
                'updated_at' => '2021-08-05 19:34:49',
                'deleted_at' => NULL,
            ),
            11 =>
            array(
                'id' => 12,
                'name' => 'RTF.V.4',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 14,
                'created_at' => '2021-08-05 19:35:12',
                'updated_at' => '2021-08-05 19:35:12',
                'deleted_at' => NULL,
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'TA.10.4',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 15,
                'created_at' => '2021-08-05 19:35:34',
                'updated_at' => '2021-08-05 19:35:34',
                'deleted_at' => NULL,
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'TA.11.4',
                'max_people' => 20,
                'status' => 0,
                'notes' => NULL,
                'room_type_id' => 16,
                'created_at' => '2021-08-05 19:35:51',
                'updated_at' => '2021-08-05 19:35:51',
                'deleted_at' => NULL,
            ),
        );

        // Checking if the table already have a query
        if (is_null(\DB::table('rooms')->first()))
            \DB::table('rooms')->insert($rooms);
        else
            echo "\e[31mTable is not empty, therefore NOT ";
    }
}
