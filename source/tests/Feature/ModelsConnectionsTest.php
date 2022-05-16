<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Tests\TestCase;
use App\Models\Vacation;

class ModelsConnectionsTest extends TestCase
{
    public function test_user()
    {
        foreach (User::all() as $user)
        {
            if(is_null($user->worker))
            {
                continue;
            }
            $this->assertTrue(
                $user->is($user->worker->user),
                "Model worker didn't related with User {$user->nick}."
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
                    "Model blogRecord({$blogRecord->id}) didn't related " .
                    "with project({$project->id})."
                );
            }
        }
    }

    public function test_vacation()
    {
        $numberRecords = 30;
        Vacation::truncate();
        Vacation::factory($numberRecords)->create();
        $records = Vacation::joinRelationship('worker')->get();
        $this->assertEquals(
            $numberRecords,
            count($records),
            "Join Vacation and Worker return uncorrect number records."
        );
    }
}
