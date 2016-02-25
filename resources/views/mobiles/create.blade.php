@extends('layouts.master', ['pageTitle' => 'Add a Mobile'])

@section('customStyle')
    <style>
        img {
            margin-bottom: 10px;
        }

        .submit-btn-section {
            margin-top: 20px;
        }
    </style>
@endsection

@section('headerJs')
    <script src="/js/previewImg.js"></script>
@endsection

@section('footerJs')
@endsection

@section('body')
    <div class="container">
        <h1>Add a Mobile</h1>
        <hr/>
        <form class="form-horizontal" action="/mobiles" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-sm-9">
                <div class="form-group">
                    <div>
                        <label for="mobileBrand"
                               class="col-sm-3 control-label">Brand</label>
                    </div>
                    <div class="col-sm-3">
                        <select name="brand_id" id="mobileBrand" class="form-control">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileName" class="col-sm-3 control-label">Model
                        Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control"
                               id="mobileName" placeholder="Name here...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileMonitor" class="col-sm-3 control-label">Monitor
                        Size(")</label>
                    <div class="col-sm-9">
                        <input type="text" name="monitor_size" class="form-control"
                               id="mobileMonitor" placeholder="(Inches) here...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileWeight"
                           class="col-sm-3 control-label">Weight(g)</label>
                    <div class="col-sm-9">
                        <input type="text" name="weight" class="form-control"
                               id="mobileWeight" placeholder="(g) here...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileRom" class="col-sm-3 control-label">Rom(GB)</label>
                    <div class="col-sm-9">
                        <input type="text" name="rom" class="form-control"
                               id="mobileRom" placeholder="(GBytes) here...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileCamera" class="col-sm-3 control-label">Camera
                        Pixel</label>
                    <div class="col-sm-9">
                        <input type="text" name="camera_pixel" class="form-control"
                               id="mobileCamera" placeholder="(MP) here...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="has_memory_slot" class="col-sm-3 control-label">Memory
                        Slot</label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                            <label for="">
                                <input id="has_memory_slot" name="has_memory_slot"
                                       type="checkbox" value="1">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="mobileImg text-center">
                    <img id="mobileThumbnail" src="http://placehold.it/200X200" alt=""
                         height="200" class="img-rounded"/>
                </div>
                <input type="file" name="mobile_image" id=""
                       onchange="previewImg(this, '#mobileThumbnail')"/>
            </div>

            <div class="form-group submit-btn-section">
                <div class="col-sm-9">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{--
    "id"
    "name"
    "monitor_size"
    "weight"
    "rom"
    "camera_pixel"
    "has_memory_slot"
    "pic"
    "brand_id"
    "created_at"
    "updated_at"
    --}}
@endsection
