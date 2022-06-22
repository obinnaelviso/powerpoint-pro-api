<?php

namespace App\Http\Controllers;

use App\Services\PackageService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return apiSuccess($this->packageService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'min_duration' => 'required|numeric',
            'max_duration' => 'required|numeric',
            'min_slides' => 'required|numeric',
            'max_slides' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        return apiSuccess($this->packageService->create($request->all()), 'Package created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function search(Request $request) {
        $request->validate([
            'duration' => 'required|numeric',
            'slides' => 'required|numeric'
        ]);

        return apiSuccess($this->packageService->search($request->duration, $request->slides));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'min_duration' => 'nullable|numeric',
            'max_duration' => 'nullable|numeric',
            'min_slides' => 'nullable|numeric',
            'max_slides' => 'nullable|numeric',
            'amount' => 'nullable|numeric',
        ]);

        return apiSuccess($this->packageService->update($id, $request->all()), 'Package updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return apiSuccess($this->packageService->delete($id), 'Package deleted successfully!');
    }
}
