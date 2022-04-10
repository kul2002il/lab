<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Console\Command;

class AddAPIUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add {nick} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new user for API access';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(User $user)
    {
        //$user = new \App\User();
        $user->nick     = $this->argument('nick');
        $user->password = Hash::make($this->argument('password'));

        $user->save();
    }
}
