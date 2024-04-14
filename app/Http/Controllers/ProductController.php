<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('product.index', ['products' => $products]);
    }

    public function create(Request $request)
    {
        return view('product.create', ['type' => $request->type]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::create([
                'name_product'  => $request->name_product,
                'type'          => $request->type
            ]);
            $product_id = $product->id;
            if ($request->type == 'car_rental') {
                foreach ($request->price as $key => $name) {
                    Service::create([
                        'product_id'    => $product_id,
                        'name_service'  => $name,
                        'price'         => $request['price'][$key],
                        'status'        => 1,
                        'start_date'    => $request['start_date'][$key],
                        'end_date'      => $request['end_date'][$key],
                        'start_point'   => $request['start_point'][$key],
                        'end_point'     => $request['end_point'][$key],
                        'distance'      => $request['distance'][$key],
                        'description'   => $request['description'][$key],
                    ]);
                }
            } else {
                foreach ($request->name_service as $key => $name) {
                    Service::create([
                        'product_id'    => $product_id,
                        'price'         => $request['price'][$key],
                        'status'        => 1,
                        'start_date'    => $request['start_date'][$key],
                        'end_date'      => $request['end_date'][$key],
                        'object'        => $request['object'][$key],
                        'description'   => $request['description'][$key],
                    ]);
                }
            }
            Session::flash('success', 'thêm mới thành công');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', 'thêm mới thất bại');
        }

        DB::commit();

        return redirect()->route('index');
    }

    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }

    public function destroy(Product $product)
    {
        $product->services()->delete();
        $product->delete();
        
        return redirect()->route('index');
    }
}
