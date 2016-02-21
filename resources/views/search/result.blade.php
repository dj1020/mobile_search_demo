<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mobile Search Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <style>
        form {
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Result</h1>

        <form method="get">
            每頁
            <select name="perPage" id="perPage" onChange="this.form.submit()">
                @foreach ($perPageSelect as $val)
                    <option value="{{ $val }}"  {{ $mobiles->perPage() == $val ? 'selected' : '' }}>{{ $val }}</option>
                @endforeach
            </select>
            筆
            <span class="pull-right">第 {{ $mobiles->currentPage() }} / {{ $mobiles->lastPage() }} 頁，總筆數 {{ $mobiles->total() }} 筆</span>
        </form>



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
                <td>{{ $mobile->name }}</td>
                <td>{{ $mobile->name }}</td>
                <td>{{ $mobile->monitor_size }}</td>
                <td>{{ $mobile->weight }}</td>
                <td>{{ $mobile->rom }}</td>
                <td>{{ $mobile->camera_pixel }} 萬像素</td>
                <td>{{ ($mobile->has_memory_slot) ? "Yes" : "No" }}</td>
            </tr>
            @endforeach
        </table>
        {!! $mobiles->appends(['perPage' => $mobiles->perPage()])->links() !!}
    </div>
</body>
</html>