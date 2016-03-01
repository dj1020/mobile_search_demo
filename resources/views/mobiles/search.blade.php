@extends('layouts.master', ['pageTitle' => 'Mobile Search Result'])

@section('customStyle')
    <style>
        table {
            margin-top: 10px;
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

        {{ var_dump($request->all()) }}

        <form method="get" class="form-horizontal">
            <div class="form-group">
                <label for="brandSelector" class="control-label col-sm-2">Brand: </label>
                <div class="col-sm-3">
                    <select name="brandId" id="brandSelector" class="form-control">
                        <option value="0">-- ALL --</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}"
                                    {{ old('brandId') == $brand->id ? 'selected' : '' }}
                            >{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="monitorFilter" class="control-label col-sm-2">Monitor
                    Size("): </label>
                <div class="col-sm-10">
                    <input type="text" name="smallest_size" class="form-control"
                           style="max-width: 10%; display: inline-block;"
                           value="{{ old('smallest_size') }}"
                    />
                    -
                    <input type="text" name="biggest_size" class="form-control"
                           style="max-width: 10%; display: inline-block;"
                           value="{{ old('biggest_size') }}"
                    />
                </div>
            </div>
            <div class="form-group">
                <label for="memorySlotFilter" class="control-label col-sm-2">
                    Has Memory Slot?
                </label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" id="has_memory_slot_all"> All
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="has_memory_slot" id="has_memory_slot_yes" value="1"> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="has_memory_slot" id="has_memory_slot_no" value="0"> No
                    </label>
                </div>
            </div>
            {{--<div class="form-group">--}}
                {{--<label for="memorySlotFilter" class="control-label col-sm-2">--}}
                    {{--Rom Size(GB)--}}
                {{--</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--<label class="checkbox-inline">--}}
                        {{--<input type="checkbox" id="RomSize_4" name="rom[]" value="4"> 4--}}
                    {{--</label>--}}
                    {{--<label class="checkbox-inline">--}}
                        {{--<input type="checkbox" id="RomSize_8" name="rom[]" value="8"> 8--}}
                    {{--</label>--}}
                    {{--<label class="checkbox-inline">--}}
                        {{--<input type="checkbox" id="RomSize_16" name="rom[]" value="16"> 16--}}
                    {{--</label>--}}
                    {{--<label class="checkbox-inline">--}}
                        {{--<input type="checkbox" id="RomSize_32" name="rom[]" value="32"> 32--}}
                    {{--</label>--}}
                    {{--<label class="checkbox-inline">--}}
                        {{--<input type="checkbox" id="RomSize_64" name="rom[]" value="64"> 64--}}
                    {{--</label>--}}
                    {{--<label class="checkbox-inline">--}}
                        {{--<input type="checkbox" id="RomSize_128" name="rom[]" value="128"> 128--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-2">
                    <button class="btn btn-info" type="submit">送出查詢</button>
                </div>
            </div>

            <div class="row">
                <div class="container">
                每頁
                <select name="perPage" id="perPage" onChange="this.form.submit()">
                    @foreach ($perPageSelect as $perPageCount)
                        <option value="{{ $perPageCount }}"
                                {{ $mobiles->perPage() == $perPageCount ? 'selected' : '' }}
                        >{{ $perPageCount }}</option>
                    @endforeach
                </select>
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
        </form>

        {!! $mobiles->appends( request()->except('page') )->links() !!}
    </div>
@endsection
