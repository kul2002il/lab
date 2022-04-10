<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ReportHours
{
    private $request;

    public function __construct(
        private $startDate = null,
        private $endDate = null
    ){
        $this->request = BlogRecord::joinRelationship('dailyBlog')
        ->select([
            DB::raw('SUM(`time`) as `total_hours`')
        ]);
        if ($this->startDate)
        {
            $this->request->where(
                'date',
                '>=',
                date_create($this->startDate)
            );
        }
        if ($this->endDate)
        {
            $this->request->where(
                'date',
                '<=',
                date_create($this->endDate)
            );
        }
    }

    private function withWorker() {
        $this->request
            ->joinRelationship('dailyBlog.weeklyBlog.worker')
            ->addSelect([
                'worker.nick',
                'worker.name',
                'worker.company',
            ])
            ->groupBy('nick');
        return $this;
    }

    private function withProject() {
        $this->request
            ->joinRelationship('project.customer')
            ->addSelect([
                'project_id',
                'project.name as project_name',
                'customer_id',
                'customer.name as customer_name',
            ])
            ->groupBy('project.id');
        return $this;
    }

    public function reportShort()
    {
        return $this->withWorker()->request->get();
    }

    public function reportByProject()
    {
        return $this
            ->withWorker()
            ->withProject()
            ->request
            ->get();
    }
}
