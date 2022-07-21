<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'      => 'LightoKun',
                'nama'          => 'Light Yagami',
                'alamat'        => 'Kanto',
                'tempat_lahir'  => 'Tokyo',
                'tanggal_lahir' => '1990-04-06',
                'jenis_kelamin' => 'laki-laki',
                'telepon'       => '0873248932',
                'email'         => 'Yagami@gmail.com',
                'password'      => 'password',
                'avatar'        => '2.jpg',
                'created_at'    => time::now(),
                'updated_at'    => time::now()
            ],
            [
                'username'      => 'Tetsu',
                'nama'          => 'Kuroko Tetsuya',
                'alamat'        => 'Seirin',
                'tempat_lahir'  => 'Tokyo',
                'tanggal_lahir' => '2010-10-10',
                'jenis_kelamin' => 'laki-laki',
                'telepon'       => '08972784',
                'email'         => 'Kuroko@gmail.com',
                'password'      => 'password',
                'avatar'        => 'kuroko.png',
                'created_at'    => time::now(),
                'updated_at'    => time::now()
            ],
            [
                'username'      => 'Minechin',
                'nama'          => 'Aomine Daiki',
                'alamat'        => 'Touou',
                'tempat_lahir'  => 'Tokyo',
                'tanggal_lahir' => '2010-8-10',
                'jenis_kelamin' => 'laki-laki',
                'telepon'       => '0843242344',
                'email'         => 'Daiki@gmail.com',
                'password'      => 'password',
                'avatar'        => 'AomineDaiki.jpg',
                'created_at'    => time::now(),
                'updated_at'    => time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query(
        //                     "INSERT INTO users (username, nama, alamat, tempat_lahir, tanggal_lahir, jenis_kelamin, 
        //                     telepon, email, password, avatar, created_at, updated_at) 
        //                     VALUES(:username:, :nama:, :alamat:, :tempat_lahir:, :tanggal_lahir:, :jenis_kelamin:, 
        //                     :telepon:, :email:, :password:, :avatar:, :created_at:, :updated_at:)", $data
        //                 );

        // Using Query Builder
        // $this->db->table('Users')->insert($data);
        $this->db->table('Users')->insertBatch($data);
    }
}