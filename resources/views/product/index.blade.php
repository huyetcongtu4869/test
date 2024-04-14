@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header border-0 align-items-center d-flex">
        <h5 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm dịch vụ</h5>
        <div class="flex-shrink-0">
            <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Thêm sản phẩm
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('create',['type' => 'car_rental']) }}" class="dropdown-item">Thuê xe du lịch</a>
                    <a href="{{ route('create',['type' => 'restaurant']) }}" class="dropdown-item">Nhà hàng</a>
                </div>
            </div><!-- /btn-group -->
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive table-card">
            <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th style="width: 15%">Tên sản phẩm</th>
                        <th style="width: 25%">Tên dịch vụ</th>
                        <th style="width: 10%">Phân loại</th>
                        <th style="width: 10%">Đơn giá</th>
                        <th style="width: 20%">Mô tả</th>
                        <th style="width: 10%">Trạng thái</th>
                        <th style="width: 10%" class="text-end">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->isNotEmpty())
                    @foreach($products as $product)
                    @php $hasService = false; @endphp
                    @foreach($product->services as $key=>$productService)
                    @php $hasService = true; @endphp
                    <tr>
                        @if($key === 0)
                        <td rowspan="{{ $product->services->count() }}"><a href="{{route('show',['product' => $product])}}">{{ $product->name_product }}</a></td>
                        @endif
                        @if ($product->type == 'car_rental')
                        <td>{{ $productService->start_point }} - {{ $productService->end_point}} {{
                            $productService->distance }}<br>
                            Áp dụng {{ $productService->getDate() }}</td>
                        @else
                        <td>Áp dụng {{ $productService->object }}<br>
                            Áp dụng {{ $productService->getDate() }}</td>
                        @endif
                        <td>{{ $product->getType() }}</td>
                        <td class="text-danger">{{ $productService->price }}</td>
                        <td>{{ $productService->description }}</td>
                        <td>{{ $productService->getStatus() }}</td>
                        <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item"
                                            href="{{ route('service.edit',['product' => $product,'service' => $productService]) }}"><i
                                                class="fas fa-pencil align-bottom me-2 text-muted"></i> Sửa thông
                                            tin</a></li>
                                    <li>
                                        <button class="dropdown-item" data-remote="" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-backdrop="static">
                                            <i class="fas fa-trash-alt align-bottom me-2 text-muted"></i>
                                            <a
                                                href="{{ route('service.destroy',['product' => $product,'service' => $productService]) }}">Xóa
                                                bỏ</a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if (!$hasService)
                    <tr>
                        <td><a href="{{route('show',['product' => $product])}}">{{ $product->name_product }}</a></td>

                        <td colspan="6" class="text-center">Không có dịch vụ</td>
                    </tr>
                    @endif
                    @endforeach
                    @else
                    {{-- <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr> --}}
                    @endif
                </tbody>

            </table>
        </div>
        @if(!empty($products))
        <div class="mt-3">
            <div class="row">
                <div class="col-7">
                    <div class="float-start">
                        Tổng {!! $products->total() !!} sản phẩm
                    </div>
                </div>
                <!--col-->
                <div class="col-5">
                    <div class="float-end">
                        {{ $products->links('pagination::bootstrap-4')}}
                    </div>
                </div>
                <!--col-->
            </div>
            <!--row-->
        </div>
        @endif
    </div>
    <!--card-body-->
</div>
<!--card-->
@endsection