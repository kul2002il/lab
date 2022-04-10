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
     * Тест совпадения суммы коротких отчётов для проверки того,
     * что достаются все записи и всё считается верно.
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
            Сумма часов всех блогов и сумма часов всех отчётов разнится более
            чем на разрешённую погрешность 0.01. Текушая разница равна $delta.
            MSG
        );
    }

    /**
     * Тот же тест, но для отчётов по проектам.
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
            Сумма часов всех блогов и сумма часов всех отчётов разнится более
            чем на разрешённую погрешность. Текушая разница равна $delta.
            MSG
        );
    }

    /**
     * Проверка на корректную фильтрацию по дате.
     *
     * @return void
     */
    public function test_correct_time_filter()
    {
        // Отчистка случайных значений.
        BlogRecord::joinRelationship('dailyBlog')
            ->where(
                'date',
                '>=',
                date_create('10.08.2001')
            )
            ->where(
                'date',
                '<=',
                date_create('10.08.2016')
            )->delete();
        // Генерация известных значений.
        $day = DailyBlog::factory()->make();
        $day->date = date_create('@' .
                rand(
                    997376400, // 10.08.2001
                    1470762000, // 10.08.2016
                )
            );
        $day->save();
        BlogRecord::factory(10)
            ->state([
                'blog_id' => $day->id,
                'time' => 2.1
            ])
            ->create();
        // Собственно тест.
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
            Сумма часов отчётов отличается от расчётной более чем на разрешённую
            погрешность. Текушая сумма равна $totalSum.
            MSG
        );
    }

    /**
     * Тест http запроса на короткий отчёт.
     *
     * @return void
     */
    public function test_short_report_request()
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
            "Приложение вернуло некорректный ответ на запрос. Ошибки:\n"
            . implode("\n", $errors)
        );

        $this->assertEquals(
            $data['data']['count_reports'],
            count($data['data']['reports']),
            'Поле count_reports должно показывать количество отчётов'
        );
    }

    /**
     * Тест http запроса на отчёт с проектами.
     *
     * @return void
     */
    public function test_report_by_project_request()
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
            "Приложение вернуло некорректный ответ на запрос. Ошибки:\n"
            . implode("\n", $errors)
        );

        $this->assertEquals(
            $data['data']['count_reports'],
            count($data['data']['reports']),
            'Поле count_reports должно показывать количество отчётов'
        );
    }
}
