<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use App\Models\User;
use App\Models\Customer;

class ModelsConnectionsTest extends TestCase
{
    public function test_user()
    {
        foreach (User::all() as $user)
        {
            // Пользователь не обязан быть зарегистрированным работником.
            if(is_null($user->worker))
            {
                continue;
            }
            $this->assertTrue(
                $user->is($user->worker->user),
                "Модель worker не связана с User. Ник {$user->nick}"
            );
        }
    }

    public function test_project()
    {
        foreach (Project::all() as $project)
        {
            foreach ($project->blogRecords as $blogRecord)
            {
                $this->assertTrue(
                    $project->is($blogRecord->project),
                    "Модель blogRecord({$blogRecord->id}) не связана с project({$project->id})."
                );
            }
        }
    }
}
