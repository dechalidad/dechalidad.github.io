@extends('template/base')
@section('title','User Consultation')
@section('container')
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Consultation</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail - User Consultation </h6>
    </div>
    <div class="card-body row">
        <div class="col-xl-8 col-lg-7">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Sender Name</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" value="{{ $detail->name }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Email</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" value="{{ $detail->email }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Phone Number</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" value="{{ $detail->phone }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Query</label>
                <div class="col-sm-10">
                    <div style="padding: 8px 12px;font-size: 16px;border: 1px solid #ddd;border-radius: 8px;color: #7a7c8a;line-height: 1.35;background-color: #eaecf4;"><?= $detail->message; ?></div>
                </div>
            </div>
            <hr>
            <a href="<?php echo url('/master-consultation') ?>" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
<!-- custom script and style -->
@endsection