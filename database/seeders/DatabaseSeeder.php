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
            "name" => "Marinho FC"
        ]);

        DB::table('clubs')->insert([
            "name" => "Calvos FC"
        ]);

        DB::table('clubs')->insert([
            "name" => "Team Holyfield"
        ]);

        DB::table('clubs')->insert([
            "name" => "Team Todo Duro"
        ]);

        DB::table('clubs')->insert([
            "name" => "Team Todo Duro"
        ]);

        DB::table('signatures')->insert([
            "id_club" => "1",
            "id_user" => "1",
            "status_signature" => "2",
        ]);

        DB::table('signatures')->insert([
            "id_club" => "2",
            "id_user" => "1",
            "status_signature" => "1",
        ]);

        DB::table('signatures')->insert([
            "id_club" => "3",
            "id_user" => "1",
            "status_signature" => "3",
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
