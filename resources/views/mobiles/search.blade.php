@extends('layouts.master', ['pageTitle' => 'Mobile Search Result'])

@section('customStyle')
    <style>
        table {
            margin-top: 20px;
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

        <form method="get" class="form-horizontal">
            <div class="form-group">
                <label for="brandSelector" class="control-label col-sm-2">Brand: </label>
                <div class="col-sm-3">
                    <select name="brandId" id="brandSelector" class="form-control">
                        <option value="0">-- ALL --</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}"
                                    {{ $brandId == $brand->id ? 'selected' : '' }}
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
                           style="max-width: 25%; display: inline-block;"/>
                    -
                    <input type="text" name="biggest_size" class="form-control"
                           style="max-width: 25%; display: inline-block;"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-2">
                    <button class="btn btn-info" type="submit">送出查詢</button>
                </div>
            </div>

            <span class="pull-right">第 {{ $mobiles->currentPage() }}
                / {{ $mobiles->lastPage() }} 頁，總筆數 {{ $mobiles->total() }} 筆</span>

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
            <div class="form-group">每頁
                <select name="perPage" id="perPage" onChange="this.form.submit()">
                    @foreach ($perPageSelect as $perPageCount)
                        <option value="{{ $perPageCount }}"
                                {{ $mobiles->perPage() == $perPageCount ? 'selected' : '' }}
                        >{{ $perPageCount }}</option>
                    @endforeach
                </select>
                筆
            </div>
        </form>

        {!! $mobiles->appends(['perPage' => $mobiles->perPage(), 'brandId' => $brandId])->links() !!}
    </div>
@endsection
