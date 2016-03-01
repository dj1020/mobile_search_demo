@extends('layouts.master', ['pageTitle' => 'Mobile Search Result'])

@section('customStyle')
    <style>
        table {
            margin-top: 10px;
        }
        input[name=smallest_size], input[name=biggest_size] {
            max-width: 10%;
            display: inline-block;
        }
        button {
            display: inline-block;
        }
    </style>
@endsection

@section('headerJs')
@endsection

@section('footerJs')
@endsection

@section('body')
    <div class="container">
        <h1>
            Search
            <a href="/mobiles/create" class="btn btn-primary pull-right">新增</a>
        </h1>

        <hr/>

{{--        {{ var_dump($request->all()) }}--}}

        {!! Form::open(['method' => 'get', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <label for="brandSelector" class="control-label col-sm-2">Brand: </label>
                <div class="col-sm-3">
                    {{ Form::select('brandId', $brandList, $brandId, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="monitorFilter" class="control-label col-sm-2">Monitor
                    Size("): </label>
                <div class="col-sm-10">
                    {{ Form::text('smallest_size', old('smallest_size'), ['class' => 'form-control']) }}
                    -
                    {{ Form::text('biggest_size', old('biggest_size'), ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="memorySlotFilter" class="control-label col-sm-2">
                    Has Memory Slot?
                </label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        {{ Form::radio('has_memory_slot', '', true) }} All
                    </label>
                    <label class="radio-inline">
                        {{ Form::radio('has_memory_slot', '1') }} Yes
                    </label>
                    <label class="radio-inline">
                        {{ Form::radio('has_memory_slot', '0') }} No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="memorySlotFilter" class="control-label col-sm-2">
                    Rom Size(GB)
                </label>
                <div class="col-sm-10">
                    <label class="checkbox-inline">
                        {{ Form::checkbox('rom[]', '4') }} 4
                    </label>
                    <label class="checkbox-inline">
                        {{ Form::checkbox('rom[]', '8') }} 8
                    </label>
                    <label class="checkbox-inline">
                        {{ Form::checkbox('rom[]', '16') }} 16
                    </label>
                    <label class="checkbox-inline">
                        {{ Form::checkbox('rom[]', '32') }} 32
                    </label>
                    <label class="checkbox-inline">
                        {{ Form::checkbox('rom[]', '64') }} 64
                    </label>
                    <label class="checkbox-inline">
                        {{ Form::checkbox('rom[]', '128') }} 128
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button class="btn btn-info" type="submit">送出查詢</button>
                    <a class="btn btn-default" href="/mobiles">重設條件</a>
                </div>
            </div>

            <div class="row">
                <div class="container">
                每頁
                {{ Form::select('perPage', $perPageList, null, ['onChange' => 'this.form.submit()']) }}
                筆
                <span class="pull-right">第 {{ $mobiles->currentPage() }}
                    / {{ $mobiles->lastPage() }} 頁，總筆數 {{ $mobiles->total() }} 筆</span>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Brand</th>
                    <th>Model Name</th>
                    <th>Monitor Size(")</th>
                    <th>Weight(g)</th>
                    <th>Rom Size(GB)</th>
                    <th>Camera Pixel</th>
                    <th>Memory Slot</th>
                </tr>
                @foreach ($mobiles as $mobile)
                    <tr>
                        <td>{{ $mobile->id }}</td>
                        <td><img src="{{ $mobile->pic }}" alt="" height="60"/></td>
                        <td>{{ $mobile->brand->name }}</td>
                        <td>{{ $mobile->name }}</td>
                        <td>{{ $mobile->monitor_size }}</td>
                        <td>{{ $mobile->weight }}</td>
                        <td>{{ $mobile->rom }}</td>
                        <td>{{ $mobile->camera_pixel }} 萬像素</td>
                        <td>{{ ($mobile->has_memory_slot) ? "Yes" : "No" }}</td>
                    </tr>
                @endforeach
            </table>
        {!! Form::close() !!}

        {!! $mobiles->appends( request()->except('page') )->links() !!}
    </div>
@endsection
