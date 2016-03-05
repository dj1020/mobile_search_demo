<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mobile Search Page</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <style>
        table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Search Result</h1>

    <form method="get" class="form-inline">
        <div class="form-group">
            品牌：
            <select name="brandId" id="brandSelector" onChange="this.form.submit()">
                <option value="0">-- ALL --</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}"
                            {{ $brandId == $brand->id ? 'selected' : '' }}
                    >{{ $brand->name }}</option>
                @endforeach
            </select>
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
</body>
</html>