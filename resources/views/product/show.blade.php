@extends('layouts.master')
@section('content')
<div class="row justify-content-center pb-10">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                    <input type="input" name="name_product" value="{{$product->name_product}}" class="form-control"
                        disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tên dịch vụ</label>

                    <input type="input" value="{{$product->type==" restaurant"?'Nhà hàng':'Thuê xe du lịch'}}"class="form-control" disabled>
                </div>
                <button class="dropdown-item" data-remote="" data-bs-toggle="modal" data-bs-target="#deleteModal"
                    data-backdrop="static">

                    <a href="{{ route('destroy',['product' => $product]) }}"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa sản phẩm</a>
                </button>
            </div>
        </div>

        <div class="card" id="modal-body">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title">Dịch vụ</h5>
            </div>
            @foreach($product->services as $service)
            <div class="card-body">
                <div class="row">
                    @if ($product->type=='car_rental')
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Điểm đầu</label>
                            <input type="input" name="start_point[]" value="{{$service->start_point}}"
                                class="form-control" id="" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Điểm cuối</label>
                            <input type="input " name="end_point[]" value="{{$service->end_point}}" class="form-control"
                                id="" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Quãng đường</label>
                            <input type="input" name="distance[]" value="{{$service->distance}}" class="form-control"
                                id="" aria-describedby="emailHelp">
                        </div>
                    </div>
                    @else

                    <div class="col-md-4">
                        <label for="form-label">Đối tượng</label>
                        <select class="form-control" name="object[]" id="" hi>
                            <option selected>Vui lòng chọn</option>
                            <option value="1">Người lớn</option>
                            <option value="2">Trẻ em</option>
                        </select>
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Đơn giá</label>
                    <input type="input" name="price[]" value="{{$service->price}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="" class="form-label">Mô tả</label>
                    <textarea name="description[]" value="{{$service->description}}" class="form-control"></textarea>
                </div>



                <div class="row c">
                    <h6 class="pt-3">Áp dụng</h6>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="start_date" class="mr-3">Từ</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="start_date" name="start_date[]"
                                    value="{{$service->start_date}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="end_date" class="mr-3">Từ</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="end_date" name="end_date[]"
                                    value="{{$service->end_date}}">
                            </div>
                        </div>
                    </div>
                    {{-- <div><button type="button" class="btn btn-danger mt-3" >
                        <a href="{{ route('service.destroy',['product' => $product,'service' => $service]) }}" style="color: white">Xóa dịch vụ</a>
                    </button> --}}
                    </div>
                </div>
                <hr>
            </div>
            @endforeach

        </div>
    </div>
    <div class="col-md-8 hstack gap-2 justify-content-between mt-3">
        <div>
            <div>
                {{-- <button type="button" class="btn btn-primary" id="addButton">Thêm dịch vụ</button> --}}
            </div>
        </div>
        <div>
            <a class="btn btn-soft-secondary" href="{{ route('index') }}">Thoát</a>
            <button id="js_btn_submit" class="btn btn-success" type="submit">
                <a href="{{route('service.create',['product'=>$product])}}" style="color: white">Thêm dịch vụ</a>
            </button>
        </div>
    </div>
</div>

@endsection