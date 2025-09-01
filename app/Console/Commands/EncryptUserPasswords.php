<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EncryptUserPasswords extends Command
{
    protected $signature = 'users:encrypt-passwords';
    protected $description = 'Encrypt all user passwords using Bcrypt if not already hashed';

    public function handle()
    {
        $users = User::all();
        $count = 0;

        foreach ($users as $user) {
            // تحقق لو الباسورد مش مشفر بـ Bcrypt
            if (!Hash::needsRehash($user->password)) {
                continue;
            }

            $user->password = Hash::make($user->password);
            $user->save();
            $count++;
        }

        $this->info("Done! {$count} passwords encrypted.");
    }
}
