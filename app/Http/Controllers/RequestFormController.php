<?php

namespace App\Http\Controllers;

use App\Services\PackageService;
use App\Services\RequestFormService;
use Illuminate\Http\Request;

class RequestFormController extends Controller
{
    protected $requestFormService;

    public function __construct(RequestFormService $requestFormService, PackageService $packageService)
    {
        $this->requestFormService = $requestFormService;
        $this->packageService = $packageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return apiSuccess($this->requestFormService->getAllUser($request->q));
    }

    public function all(Request $request) {
        return apiSuccess($this->requestFormService->getAllAdmin($request->q));
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
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'sub_category' => 'nullable|string|max:255',
            'topic' => 'required|string|max:255',
            'slides' => 'required',
            'duration' => 'required',
            'phone' => 'required',
            'email' => 'required|string|email|max:255',
            'location' => 'nullable|string|max:255',
            'need' => 'nullable|string|max:255',
            'amount' => 'required',
        ]);

        $requestForm = $this->requestFormService->create($request->all());
        return apiSuccess($requestForm, "Request form submitted successfully. You need to make payment before we can start processing your request.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requestForm = $this->requestFormService->get($id);
        return apiSuccess($requestForm);
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
            'name' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'sub_category' => 'nullable|string|max:255',
            'topic' => 'nullable|string|max:255',
            'slides' => 'nullable',
            'duration' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|string|email|max:255',
            'location' => 'nullable|string|max:255',
            'need' => 'nullable|string|max:255',
        ]);

        $requestForm = $this->requestFormService->update($id, $request->all());
        return apiSuccess($requestForm, "Request form submitted successfully. You need to make payment before we can start processing your request.");
    }

    public function uploadPaymentReceipt(Request $request, $id) {
        $request->validate([
            'file' => 'required|file|mimes:jpg,webp,jpeg,png,pdf|max:2048'
        ]);
        $requestForm = $this->requestFormService->uploadPaymentReceipt($id, $request->file('file'));
        return apiSuccess($requestForm, "Payment receipt uploaded successfully! Please wait while your request is been processed. You will get a notification when your request is approved.");
    }

    public function approve($id) {
        $requestForm = $this->requestFormService->approve($id);
        return apiSuccess($requestForm, "Request form approved successfully!");
    }

    public function cancel($id) {
        $requestForm = $this->requestFormService->cancel($id);
        return apiSuccess($requestForm, "Request form cancelled successfully!");
    }

    public function complete($id) {
        $requestForm = $this->requestFormService->complete($id);
        return apiSuccess($requestForm, "Request form completed successfully!");
    }

    public function pending($id) {
        $requestForm = $this->requestFormService->pending($id);
        return apiSuccess($requestForm, "Request form status reverted successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return apiSuccess($this->requestFormService->delete($id), 'Request form deleted successfully!');
    }
}
