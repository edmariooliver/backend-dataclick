<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "marrios",
            'email' => "marrios@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => date("Y-m-d H:m:s"),
            'created_at' => date("Y-m-d H:m:s")
        ]);

        DB::table('status_signatures')->insert([
            "description" => "ATIVO"
        ]);

        DB::table('status_signatures')->insert([
            "description" => "INADIMPLENTE"
        ]);

        DB::table('status_signatures')->insert([
            "description" => "INATIVO"
        ]);

        DB::table('clubs')->insert([
            "name" => "Marinho FC",
            'created_at' => date("Y-m-d H:m:s")
        ]);

        DB::table('clubs')->insert([
            "name" => "Calvos FC",
            'created_at' => date("Y-m-d H:m:s")
        ]);

        DB::table('clubs')->insert([
            "name" => "Team Holyfield",
            'created_at' => date("Y-m-d H:m:s")
        ]);

        DB::table('clubs')->insert([
            "name" => "Team Todo Duro",
            'created_at' => date("Y-m-d H:m:s")
        ]);

        DB::table('clubs')->insert([
            "name" => "Team Todo Mole",
            'created_at' => date("Y-m-d H:m:s")
        ]);
        
        DB::table('status_invoices')->insert([
            "description" => "PENDENTE"
        ]);

        DB::table('status_invoices')->insert([
            "description" => "PAGO"
        ]);

        DB::table('status_invoices')->insert([
            "description" => "VENCIDO"
        ]);
    }
}
