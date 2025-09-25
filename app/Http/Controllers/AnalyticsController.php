<?php

namespace App\Http\Controllers;

use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\RunRealtimeReportRequest;
use Google\Analytics\Data\V1beta\RunReportRequest;

class AnalyticsController extends Controller
{
    private $client;
    private $propertyId;

    public function __construct()
    {
        $this->propertyId = env('ANALYTICS_PROPERTY_ID');
        $credentialsPath = storage_path('app/analytics/drey-trade-api-analytics-ee867ac994c8.json');

        $this->client = new BetaAnalyticsDataClient(['credentials' => $credentialsPath]);
    }
    public function getDashboardData()
    {

        try {
            $activeUsers = $this->fetchActiveUsers();
            $mainStats = $this->fetchMainStats();
            $countryData = $this->fetchCountryData();
            $dailyAccess = $this->fetchDailyAccess();

            return response()->json([
                'activeUsers' => $activeUsers,
                'newUsers' => $mainStats['newUsers'] ?? 0,
                'avgEngagementTime' => $mainStats['avgEngagementTime'] ?? '00:00',
                'countryData' => $countryData,
                'dailyAccess' => $dailyAccess,

                'weeklyAccess' => array_sum(array_slice($dailyAccess['sessions'], -7)),
                'annualAccess' => $this->fetchTotalSessions('365daysAgo')['sessions'] ?? 0,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Não foi possível buscar os dados do Analytics: ' . $e->getMessage()], 500);
        }
    }
    private function fetchActiveUsers(): int
    {
        $request = new RunRealtimeReportRequest([
            'property' => 'properties/' . $this->propertyId,
            'metrics' => [new Metric(['name' => 'activeUsers'])],
        ]);
        $response = $this->client->runRealtimeReport($request);
        return $response->getRows()->count() > 0 ? (int)$response->getRows()[0]->getMetricValues()[0]->getValue() : 0;
    }

    private function fetchMainStats(): array
    {
        $request = new RunReportRequest([
            'property' => 'properties/' . $this->propertyId,
            'date_ranges' => [new DateRange(['start_date' => '28daysAgo', 'end_date' => 'today'])],
            'metrics' => [
                new Metric(['name' => 'newUsers']),
                new Metric(['name' => 'averageSessionDuration']),
            ]
        ]);
        $response = $this->client->runReport($request);

        $newUsers = 0;
        $avgSessionDuration = 0; // em segundos

        if ($response->getRows()->count() > 0) {
            $newUsers = (int)$response->getRows()[0]->getMetricValues()[0]->getValue();
            $avgSessionDuration = (float)$response->getRows()[0]->getMetricValues()[1]->getValue();
        }

        return [
            'newUsers' => $newUsers,
            'avgEngagementTime' => gmdate("i:s", (int)$avgSessionDuration) // Formata segundos para MM:SS
        ];
    }

    private function fetchCountryData(): array
    {
        $request = new RunReportRequest([
            'property' => 'properties/' . $this->propertyId,
           'date_ranges' => [new DateRange(['start_date' => '28daysAgo', 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'country'])],
            'metrics' => [new Metric(['name' => 'sessions'])],
            'limit' => 5 // Pega os 5 países com mais acessos
        ]);
        $response = $this->client->runReport($request);

        $data = [];
        foreach ($response->getRows() as $row) {
            $data[] = [
                'country' => $row->getDimensionValues()[0]->getValue(),
                'sessions' => (int)$row->getMetricValues()[0]->getValue()
            ];
        }
        return $data;
    }

    private function fetchDailyAccess(): array
    {
        $request = new RunReportRequest([
            'property' => 'properties/' . $this->propertyId,
            'date_ranges' => [new DateRange(['start_date' => '29daysAgo', 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'date'])],
            'metrics' => [new Metric(['name' => 'sessions'])],
        ]);
        $response = $this->client->runReport($request);

        $labels = [];
        $sessions = [];
        foreach ($response->getRows() as $row) {
            $date = \DateTime::createFromFormat('Ymd', $row->getDimensionValues()[0]->getValue());
            $labels[] = $date->format('d/m');
            $sessions[] = (int)$row->getMetricValues()[0]->getValue();
        }
        return ['labels' => $labels, 'sessions' => $sessions];
    }

    private function fetchTotalSessions(string $startDate): array
    {
        $request = new RunReportRequest([
            'property' => 'properties/' . $this->propertyId,
            'date_ranges' => [new DateRange(['start_date' => $startDate, 'end_date' => 'today'])],
            'metrics' => [new Metric(['name' => 'sessions'])]
        ]);
        $response = $this->client->runReport($request);
        $sessions = 0;
        if ($response->getRows()->count() > 0) {
            $sessions = (int)$response->getRows()[0]->getMetricValues()[0]->getValue();
        }
        return ['sessions' => $sessions];
    }
}
