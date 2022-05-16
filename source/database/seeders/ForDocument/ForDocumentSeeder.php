<?php

namespace Database\Seeders\ForDocument;

use App\Models\BlogRecord;
use App\Models\DailyBlog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ForDocumentSeeder extends Seeder
{
    public function run()
    {
        $this->createUser();
        $this->createBlogs();
    }

    private function createUser()
    {
        $nick = env('SCRIBE_USER_NICK', 'scribe');
        User::where('nick', $nick)->delete();
        $user = User::factory()->create([
            'nick' => $nick,
            'password' => Hash::make(env('SCRIBE_USER_PASSWORD', 'password')),
        ]);
        $token = $user->createToken('report-service')->plainTextToken;
        $this->setenv('SCRIBE_AUTH_KEY', $token);
    }

    private function setenv($key, $value)
    {
        $path = app()->environmentFilePath();
        file_put_contents(
            $path,
            preg_replace(
                '/' . $key . '=.*$/m',
                $key . '=' . $value,
                file_get_contents($path)
            )
        );
    }

    private function createBlogs()
    {
        $dailyBlog = DailyBlog::factory()->create(['date' => '2010-10-08']);
        BlogRecord::factory(2)->create(['blog_id' => $dailyBlog]);
    }
}
