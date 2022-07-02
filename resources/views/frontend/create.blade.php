@extends('layouts.master')
@section('content')
    <div class="main-content">
        <div class="card">
            <form class="needs-validation" novalidate="" action="{{route('dolil-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>Dolil Details</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required="">
                        <div class="invalid-feedback">
                            Enter Name
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Daag Number</label>
                        <input type="text" class="form-control" name="daag_number" required="">
                        <div class="invalid-feedback">
                            Enter Daag Number
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mouja</label>
                        <input type="text" class="form-control" name="mouja" required="">
                        <div class="invalid-feedback">
                            Enter Mouja
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Khotian</label>
                        <input type="text" class="form-control" name="khotian" required="">
                        <div class="invalid-feedback">
                            Enter Khotian
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Buyer</label>
                        <input type="text" class="form-control" name="buyer" required="">
                        <div class="invalid-feedback">
                            Enter Buyer
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Seller</label>
                        <input type="text" class="form-control" name="seller" required="">
                        <div class="invalid-feedback">
                            Enter Seller
                        </div>
                    </div>
                    <div class="section-title">Upload Excel</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
