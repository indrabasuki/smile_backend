<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\CustomerStoreRequest;
use App\Http\Requests\Customer\CustomerUpdateRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return new CustomerResource($customer, "GET", Response::HTTP_OK, 'get all customer');
    }


    public function store(CustomerStoreRequest $request)
    {

        $customer = Customer::create($request->all());
        return new CustomerResource($customer, "POST", Response::HTTP_CREATED, 'customer created');
    }

    public function show(int $id)
    {
        $customer = Customer::find($id);
        return new CustomerResource($customer, "GET", Response::HTTP_OK, 'get customer by id');
    }

    public function update(CustomerUpdateRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());
        return new CustomerResource($customer, "PUT", Response::HTTP_OK, 'customer updated');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return new CustomerResource($customer, "DELETE", Response::HTTP_OK, 'customer deleted');
    }
}
