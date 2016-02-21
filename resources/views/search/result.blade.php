<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mobile Search Page</title>
</head>
<body>
    <h1>Search Result</h1>
    <div>

        <form method="get">
            <select name="perPage" id="perPage">
                <option value="5"  {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
            </select>
            <button type="submit">Search</button>
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>Thumbnail</th>
                <th>Brand</th>
                <th>Model Name</th>
                <th>Monitor Size(")</th>
                <th>Weight(g)</th>
                <th>Rom Size(GB)</th>
                <th>Camera Pixel(MP)</th>
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
                <td>{{ $mobile->camera_size }}</td>
                <td>{{ ($mobile->has_memory_slot) ? "Yes" : "No" }}</td>
            </tr>
            @endforeach
        </table>
        {!! $mobiles->appends(['perPage' => $perPage])->links() !!}
    </div>
</body>
</html>