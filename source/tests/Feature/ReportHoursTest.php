<?php

namespace Tests\Feature;

use App\Models\BlogRecord;
use App\Models\DailyBlog;
use App\Models\ReportHours;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ReportHoursTest extends TestCase
{
    /**
     * Short report sum matching test to check that all records are retrieved
     * and everything is considered correct.
     *
     * @return void
     */
    public function test_short_report_by_simple_sum()
    {
        $report = new ReportHours();
        $totalSum = 0;
        foreach ($report->reportShort() as $reportData)
        {
            $totalSum += $reportData['total_hours'];
        }
        $blogSum = BlogRecord::sum('time');
        $delta = abs($blogSum - $totalSum);
        $this->assertEqualsWithDelta(
            $blogSum,
            $totalSum,
            0.00001,
            <<<MSG
            The sum of hours of all blogs and the sum of hours of all reports
            differ by more than the allowed error. The current difference is $delta.
            MSG
        );
    }

    /**
     * Report sum matching test to check that all records are retrieved
     * and everything is considered correct.
     *
     * @return void
     */
    public function test_report_by_project_by_simple_sum()
    {
        $report = new ReportHours();
        $totalSum = 0;
        foreach ($report->reportByProject() as $reportData)
        {
            $totalSum += $reportData['total_hours'];
        }
        $blogSum = BlogRecord::sum('time');
        $delta = abs($blogSum - $totalSum);
        $this->assertEqualsWithDelta(
            $blogSum,
            $totalSum,
            0.00001,
            <<<MSG
            The sum of hours of all blogs and the sum of hours of all reports
            differ by more than the allowed error. The current difference is $delta.
            MSG
        );
    }

    /**
     * Check for correct filtering by date.
     *
     * @return void
     */
    public function test_correct_time_filter()
    {
        // Delete random values.
        BlogRecord::joinRelationship('dailyBlog')
            ->where(
                'date',
                '>=',
                date_create('2001-08-10')
            )
            ->where(
                'date',
                '<=',
                date_create('2016-08-10')
            )->delete();
            // Generation of known values.
        $day = DailyBlog::factory()->make();
        $day->date = date_create('@' .
                rand(
                    997376400, // 2001-08-10
                    1470762000, // 2016-08-10
                )
            );
        $day->save();
        BlogRecord::factory(10)
            ->state([
                'blog_id' => $day->id,
                'time' => 2.1
            ])
            ->create();

        $report = new ReportHours('10.08.2001', '10.08.2016');
        $totalSum = 0;
        foreach ($report->reportShort() as $reportData)
        {
            $totalSum += $reportData['total_hours'];
        }
        $this->assertEqualsWithDelta(
            21,
            $totalSum,
            0.00001,
            <<<MSG
            The sum of hours of all blogs and the sum of hours of all reports
            differ by more than the allowed error. The current sum is $totalSum.
            MSG
        );
    }

    public function test_short_report_http_request()
    {
        $this->authorization();
        $response = $this->get('api/report/hours/short');
        $response->assertStatus(200);
        $data = $response->json();

        $validator = Validator::make($data, [
            'data.count_reports' => ['required', 'integer'],
            'data.reports' => ['array'],
            'data.reports.*.nick' => ['required', 'string'],
            'data.reports.*.name' => ['required', 'string'],
            'data.reports.*.company' => ['required', 'string'],
            'data.reports.*.total_hours' => ['required', 'numeric'],
        ]);

        $errors = $validator->errors()->all();
        $this->assertEmpty(
            $errors,
            "The application returned an incorrect response to the request. " .
            "Errors:\n" . implode("\n", $errors)
        );

        $this->assertEquals(
            $data['data']['count_reports'],
            count($data['data']['reports']),
            'The count_reports field should show the correct number of reports.'
        );
    }

    public function test_report_by_project_http_request()
    {
        $this->authorization();
        $response = $this->get('api/report/hours/project');
        $response->assertStatus(200);
        $data = $response->json();

        $validator = Validator::make($data, [
            'data.count_reports' => ['required', 'integer'],
            'data.reports' => ['array'],
            'data.reports.*.nick' => ['required', 'string'],
            'data.reports.*.name' => ['required', 'string'],
            'data.reports.*.company' => ['required', 'string'],
            'data.reports.*.customer_id' => ['required', 'integer'],
            'data.reports.*.customer_name' => ['required', 'string'],
            'data.reports.*.project_id' => ['required', 'integer'],
            'data.reports.*.project_name' => ['required', 'string'],
            'data.reports.*.total_hours' => ['required', 'numeric'],
        ]);

        $errors = $validator->errors()->all();
        $this->assertEmpty(
            $errors,
            "The application returned an incorrect response to the request. " .
            "Errors:\n" . implode("\n", $errors)
        );

        $this->assertEquals(
            $data['data']['count_reports'],
            count($data['data']['reports']),
            'The count_reports field should show the correct number of reports.'
        );
    }
}
