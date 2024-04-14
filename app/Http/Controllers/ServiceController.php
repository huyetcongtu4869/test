<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function create(Product $product)
    {
        return view('product.service.create', ['product' => $product]);
    }

    public function store(Request $request, Product $product)
    {
        DB::beginTransaction();
        try {
            Service::create([
                'product_id'    => $product->id,
                'price'         => $request['price'],
                'status'        => 1,
                'start_date'    => $request['start_date'],
                'end_date'      => $request['end_date'],
                'start_point'   => $request['start_point'],
                'end_point'     => $request['end_point'],
                'distance'      => $request['distance'],
                'description'   => $request['description'],
            ]);
            Session::flash('success', 'Thêm mới thành công');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Thêm mới thất bại');
        }
        DB::commit();

        return redirect()->route('index');
    }

    public function edit(Request $request, Product $product, Service $service)
    {
        return view('product.service.edit', compact('product', 'service'));
    }

    function update(Request $request, Product $product, Service $service)
    {
        $service->update($request->all());
        Session::flash('success', 'Sửa dịch vụ thành công');

        return redirect()->route('index');
    }

    function updateStatus(Product $product, Service $service)
    {
        $service->update(['status' => 0]);
        Session::flash('success', 'Cập nhật trạng thái thành công');

        return redirect()->route('index');
    }
    
    function destroy(Product $product, Service $service)
    {
        $service->delete();
        Session::flash('success', 'Xóa dịch vụ thành công');

        return redirect()->route('index');
    }
}
