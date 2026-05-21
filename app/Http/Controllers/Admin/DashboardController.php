<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\DashboardService;

class DashboardController extends Controller
{
    protected DashboardService $dashboardService;
    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }
    public function index()
{
    $data = $this->dashboardService->getDashboardData();

    return view('admin.dashboard.dashboard', $data);
}
}
