<?php

namespace Modules\ModuleManager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Subscription;

class SubscriptionsController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
	    //exec('php composer.phar require "twf/superadmin"');
	    //exec('php composer.phar dump-autoload');
	    //Artisan::call('module:make Superadmin');
	    //Artisan::call('cache:clear');
        //Artisan::call('view:clear');
        //Artisan::call('config:clear');
        //Artisan::call("migrate", ["--path" => "Modules/ClientLogin/Database/Migrations","--force" => true]);
        //Artisan::call('optimize:clear');
		$models = Subscription::all();
		return view('modulemanager::subscriptions.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('modulemanager::subscriptions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return void
	 * @throws ValidationException
	 */
	public function store(Request $request) {
	    //dd($request->all());
		if (!$request->json()) {
			abort(404);
		}
        $validate_rules = [
            'activate_date' => 'required',
            'validity_period_type' => 'required',
            'validity_period_type_value' => 'required',
            'disk_storage_limit' => 'required',
            'allowed_no_lawyers' => 'required',
        ];

        $request->validate($validate_rules, validationMessage($validate_rules));
        $validity_period_type_value = (int)$request->validity_period_type_value;

		$model = new Subscription();
		$model->activate_date = $request->activate_date;
		$model->validity_period_type = $request->validity_period_type;
		$model->validity_period_type_value = $validity_period_type_value;
		//calculate expiry date
		$expiry_date = 0;
		if($validity_period_type_value > 0){
    		$activate_date = strtotime($request->activate_date);
    		if($request->validity_period_type == 'year'){
    		    $expiry_date = strtotime("+".$validity_period_type_value." year", $activate_date);
    		}else if($request->validity_period_type == 'month'){
    		    $expiry_date = strtotime("+".$validity_period_type_value." month", $activate_date);
    		}else if($request->validity_period_type == 'week'){
    		    $expiry_date = strtotime("+".$validity_period_type_value." week", $activate_date);
    		}else if($request->validity_period_type == 'day'){
    		    $expiry_date = strtotime("+".$validity_period_type_value." day", $activate_date);
    		}
		}
		
		$model->expiry_date = date('Y-m-d', $expiry_date);
		$model->disk_storage_limit = $request->disk_storage_limit;
        $model->allowed_no_lawyers = $request->allowed_no_lawyers;
		
		$activateTimestamp = strtotime($activate_date);
        $expiryTimestamp = strtotime($expiry_date);
        $subscription_status = 'active';
        if($activateTimestamp > $expiryTimestamp){
            $subscription_status = 'expired';
        }
		
		$model->status = $subscription_status;
		$model->save();

		$response = [
			'model' => $model,
			'message' => __('Subscription Added Successfully'),
		];
        return response()->json($response);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function edit($id) {
		$model = Subscription::findOrFail($id);
		return view('modulemanager::subscriptions.edit', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return Response
	 * @throws ValidationException
	 */
	public function update(Request $request, $id) {
		if (!$request->json()) {
			abort(404);
		}

        $validate_rules = [
            'activate_date' => 'required',
            'validity_period_type' => 'required',
            'validity_period_type_value' => 'required',
            'disk_storage_limit' => 'required',
            'allowed_no_lawyers' => 'required',
        ];

        $request->validate($validate_rules, validationMessage($validate_rules));

		$model = Subscription::find($id);
		if (!$model) {
			throw ValidationException::withMessages(['message' => __('Subscription Not Found')]);
		}


        $validity_period_type_value = (int)$request->validity_period_type_value;
		$model->activate_date = $request->activate_date;
		$model->validity_period_type = $request->validity_period_type;
		$model->validity_period_type_value = $validity_period_type_value;
		//calculate expiry date
		$expiry_date = 0;
		if($validity_period_type_value > 0){
    		$activate_date = strtotime($request->activate_date);
    		if($request->validity_period_type == 'year'){
    		    $expiry_date = strtotime("+".$validity_period_type_value." year", $activate_date);
    		}else if($request->validity_period_type == 'month'){
    		    $expiry_date = strtotime("+".$validity_period_type_value." month", $activate_date);
    		}else if($request->validity_period_type == 'week'){
    		    $expiry_date = strtotime("+".$validity_period_type_value." week", $activate_date);
    		}else if($request->validity_period_type == 'day'){
    		    $expiry_date = strtotime("+".$validity_period_type_value." day", $activate_date);
    		}
		}
		
		
		$model->expiry_date = date('Y-m-d', $expiry_date);
		$model->disk_storage_limit = $request->disk_storage_limit;
        $model->allowed_no_lawyers = $request->allowed_no_lawyers;
		
		$activateTimestamp = strtotime($activate_date);
        $expiryTimestamp = strtotime($expiry_date);
        $subscription_status = 'active';
        if($activateTimestamp > $expiryTimestamp){
            $subscription_status = 'expired';
        }
		
		$model->status = $subscription_status;
		$model->save();

		$response = [
			'message' => __('Subscription Updated Successfully'),
			'goto' => route('subscriptions.index'),
		];

		return response()->json($response);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return void
	 * @throws ValidationException
	 */
	public function destroy(Request $request, $id) {
		if (!$request->json()) {
			abort(404);
		}

		$model = Subscription::find($id);
		if (!$model) {
			throw ValidationException::withMessages(['message' => __('Subscription Not Found')]);
		}
		//Check Client

		$model->delete();

		return response()->json(['message' => __('Subscription Deleted Successfully'), 'goto' => route('subscriptions.index')]);
	}
}
