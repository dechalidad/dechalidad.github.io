@extends('template/base')
@section('title','Banner')
@section('container')
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Banner</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form - Banner </h6>
    </div>
    <div class="card-body row">
        <div class="col-xl-8 col-lg-7">
            <form method="POST" class="user" accept-charset="utf-8" enctype="multipart/form-data" action="<?= ($action == 'create') ? url('master-banner') : url('master-banner/' . $data['id']) ?>">
                @if ($action == 'edit')
                @method('patch')
                @endif
                @csrf
                @foreach ($form as $key => $value)
                @if ($action == 'create')
                <div class="form-group">
                    <label for="">{{ $value['label'] }}</label>
                    @if($value['type'] == 'textarea')
                    <textarea id="wysiwyg" class="wysiwyg" name="{{ $value['field'] }}" id="{{ $value['field'] }}" class="form-control @error($value['field']) is-invalid @enderror ">
                    {{ old($value['field']) }}
                    </textarea>
                    @elseif($value['type'] == 'dropdown')
                    <select name="{{ $value['field'] }}" class="form-control @error($value['field']) is-invalid @enderror ">
                        @foreach ($value['source'] as $key => $source)
                        <option value="{{ $key }}">{{ $source }}</option>
                        @endforeach
                    </select>
                    @else
                    <input name="{{ $value['field'] }}" type="{{ $value['type'] }}" class="form-control @error($value['field']) is-invalid @enderror " id="{{ $value['field'] }}" value="{{ old($value['field']) }}" placeholder="{{ $value['placeholder'] }}" autocomplete="off">
                    @endif
                    @error($value['field'])
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                @else
                <div class="form-group">
                    <label for="">{{ $value['label'] }}</label>
                    @if($value['type'] == 'textarea')
                    <textarea id="wysiwyg" class="wysiwyg" name="{{ $value['field'] }}" id="{{ $value['field'] }}" class="form-control @error($value['field']) is-invalid @enderror ">
                    {{ $data[$value['field']] }}
                    </textarea>
                    @elseif($value['type'] == 'file')
                    <div>
                        <div class="img-wp">
                            <img style="width: 200px" name="{{ $value['field'] }}" id="{{ $value['field'] }}" class="@error($value['field']) is-invalid @enderror " src="<?= url('assets/lampiran/' . $value['field']) ?>/{{ $data[$value['field']] }}">
                        </div>
                    </div>
                    <div style="padding-top:15px" class="form-group">
                        <input name="{{ $value['field'] }}" type="file" class="form-control" id="{{ $value['field'] }}" value="{{ $data[$value['field']] }}" placeholder="{{ $data[$value['field']] }}" autocomplete="off">
                        <input type="hidden" name="{{ $value['field'].'_hidden' }}" value="{{ $data[$value['field']] }}">
                    </div>
                    @elseif($value['type'] == 'dropdown')
                    <select name="{{ $value['field'] }}" class="form-control @error($value['field']) is-invalid @enderror ">
                        @foreach ($value['source'] as $key => $source)
                        <option value="{{ $key }}" {{ ($data[$value['field']] == $key) ? 'selected' : ''  }}>{{ $source }}</option>
                        @endforeach
                    </select>
                    @elseif($value['type'] == 'datetime-local')
                    <div>
                        Tanggal Sebelumnya : {{ $data[$value['field']] }}
                        <input type="hidden" name="{{ $value['field'].'_hidden' }}" value="{{ $data[$value['field']] }}">
                    </div>
                    <input name="{{ $value['field'] }}" type="datetime-local" class="form-control @error($value['field']) is-invalid @enderror" id="{{ $value['field'] }}" placeholder="{{ $value['placeholder'] }}" autocomplete="off">
                    @else
                    <input name="{{ $value['field'] }}" type="{{ $value['type'] }}" class="form-control @error($value['field']) is-invalid @enderror" id="{{ $value['field'] }}" value="{{ $data[$value['field']] }}" placeholder="{{ $value['placeholder'] }}" autocomplete="off">
                    @endif
                    @error($value['field'])
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                @endif
                @endforeach
                <hr>
                <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Save</span>
                </button>
                <a href="<?php echo url('/master-banner') ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea',
    });
</script>
<!-- custom script and style -->
@endsection