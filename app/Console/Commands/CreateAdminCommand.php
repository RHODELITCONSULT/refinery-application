<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {first_name} {last_name} {email} {phone_number} {role}';
    // php artisan create:admin Super Admin super.admin@gmail.com 0500085941 admin

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Super Admin Account';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try{
            $first_name         = $this->argument("first_name");
            $last_name          = $this->argument("last_name");
            $email              = $this->argument("email");
            $phone_number       = $this->argument("phone_number");
            $email_verified_at  = Carbon::now();
            $password           = Hash::make("password");
            $role               = $this->argument("role");

            //Todo => create a new user
            $user = User::query()->create([
                "first_name"        =>$first_name,
                "last_name"         =>$last_name,
                "email"             =>$email,
                "password"          =>$password,
                "email_verified_at" =>$email_verified_at,
                "phone_number"      =>$phone_number,
                "role"              =>$role
            ]);

                $this->info("Created a New User Information");
        }catch(\Exception $e){
            $this->info($e->getMessage());
        }
    }
}
