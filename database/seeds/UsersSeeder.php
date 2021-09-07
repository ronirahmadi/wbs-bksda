<?php 
use Illuminate\Database\Seeder; 
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder { 
    /** 
    * Run the database seeds. 
    * 
    * @return void */

 
   public function run() { 
           User::truncate(); 
           $users = [ 
            [ 
              'name' => 'Kementerian Lingkungan Hidup dan Kehutanan',
              'email' => 'admin-klhk@wbsbksda.go.id',
              'password' => 'indonesiajaya',
              'is_admin' => 'true',
            ],
          ];

          foreach($users as $user)
          {
              User::create([
               'name' => $user['name'],
               'email' => $user['email'],
               'password' => Hash::make($user['password']),
               'is_admin' => $user['is_admin']
             ]);
           }

    }
}