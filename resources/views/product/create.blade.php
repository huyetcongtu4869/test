@extends('layouts.master')
@section('content')
<form action="{{route('store')}}" method="POST" class="row justify-content-center" id="container">
    @csrf
    <div class="row justify-content-center pb-10">
        <input type="text" name="type" value="{{$type}}" hidden>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                        <input type="input" name="name_product" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tên dịch vụ</label>

                        <input type="input" value="{{$type==" restaurant"?'Nhà hàng':'Thuê xe du lịch'}}"class="form-control" disabled>
                    </div>
                </div>
            </div>

            <div class="card" id="modal-body">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title">Dịch vụ</h5>
                </div>
                <div class="card-body">
                    {{-- <h6 class="text-uppercase">Dịch vụ</h6> --}}
                    <div class="row">
                        @if ($type=='car_rental')
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Điểm đầu</label>
                                <input type="input" name="start_point[]" class="form-control" id=""
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Điểm cuối</label>
                                <input type="input " name="end_point[]" class="form-control" id=""
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Quãng đường</label>
                                <input type="input" name="distance[]" class="form-control" id=""
                                    aria-describedby="emailHelp">
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
                        <input type="input" name="price[]" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Mô tả</label>
                        <textarea name="description[]" class="form-control"></textarea>
                    </div>



                    <div class="row c">
                        <h6 class="pt-3">Áp dụng</h6>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_date" class="mr-3">Từ</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="start_date" name="start_date[]">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end_date" class="mr-3">Từ</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="end_date" name="end_date[]">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-md-8 hstack gap-2 justify-content-between mt-3">
            <div>
                <div>
                    <button type="button" class="btn btn-primary" id="addButton">Thêm dịch vụ</button>
                </div>
            </div>
            <div>
                <a class="btn btn-soft-secondary" href="{{ route('index') }}">Thoát</a>
                <button id="js_btn_submit" class="btn btn-success" type="submit">Tạo mới</button>
            </div>
        </div>
    </div>
</form>
<script>
    document.getElementById('addButton').addEventListener('click', function() {
            var newDiv = document.createElement('div');
            newDiv.innerHTML =`@include('product.service.add_form_service')`;
            document.getElementById('modal-body').appendChild(newDiv);
        });
        deleteService   =   function (obj){
            $(obj).parents('.card-body').remove();
        }
     
</script>
@endsection