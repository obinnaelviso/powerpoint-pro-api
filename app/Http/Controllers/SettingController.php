<?php

namespace App\Http\Controllers;

use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        return apiSuccess($this->settingService->getAll());
    }

    public function updateAll(Request $request)
    {
        $this->settingService->updateAll($request->all());
        return apiSuccess(null, 'Changes updated successfully!');
    }

    public function update($key, Request $request)
    {
        $this->settingService->update($key, $request->all());
        return apiSuccess(null, 'Changes updated successfully!');
    }
}
