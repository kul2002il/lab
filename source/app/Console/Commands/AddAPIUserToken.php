<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class AddAPIUserToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add_token {nick} {token_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add API token for user';

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
    public function handle()
    {
        $user = User::where('nick', $this->argument('nick'))->first();
        $newToken = $user->createToken($this->argument('token_name'));
        print $newToken->plainTextToken . PHP_EOL;
        return 0;
    }
}
