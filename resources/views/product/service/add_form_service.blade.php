<div class="card-body">
    <hr>
    <div class="row">
        @if ($type=='car_rental')
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="form-label">Điểm đầu</label>
                <input type="input" name="start_point[]" class="form-control" id="" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="form-label">Điểm cuối</label>
                <input type="input " name="end_point[]" class="form-control" id="" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="form-label">Quãng đường</label>
                <input type="input" name="distance[]" class="form-control" id="" aria-describedby="emailHelp">
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

    <button type="button" class="btn btn-danger mt-3" onclick="deleteService(this)">Xóa</button>
</div>
