@extends('layouts.master', ['pageTitle' => 'Release a Mobile'])

@section('customStyle')
    <style>
        img {
            margin-bottom: 10px;
        }

        .submit-btn-section {
            margin-top: 20px;
        }

        .submit-btn-section form, .submit-btn-section a {
            margin-right: 5px;
        }

        .uploader img {
            height: 200px;
        }

    </style>
@endsection

@section('headerJs')
    <script src="/js/previewImg.js"></script>
@endsection

@section('footerJs')
    <script src="/js/drogdrop.js"></script>
@endsection

@section('body')
    <div class="container">
        <h1>Release a Mobile (Status: {{ $mobile->hasReleased() ? 'Released' : 'Not released' }})</h1>
        <hr/>
        <div class="form-horizontal">
            <div class="col-sm-9">
                <div class="form-group">
                    <div>
                        <label for="mobileId" class="col-sm-3 control-label">ID</label>
                    </div>
                    <div class="col-sm-3">
                        <p class="form-control-static">{{ $mobile->id }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="mobileBrand" class="col-sm-3 control-label">Brand</label>
                    </div>
                    <div class="col-sm-3">
                        <p class="form-control-static">{{ $mobile->brand->name }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileName" class="col-sm-3 control-label">Model
                        Name</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{ $mobile->name }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileMonitor" class="col-sm-3 control-label">Monitor
                        Size(")</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{ $mobile->monitor_size }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileWeight"
                           class="col-sm-3 control-label">Weight(g)</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{ $mobile->weight }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileRom" class="col-sm-3 control-label">Rom(GB)</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{ $mobile->rom }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileCamera" class="col-sm-3 control-label">Camera
                        Pixel</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{ $mobile->camera_pixel }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="has_memory_slot" class="col-sm-3 control-label">Memory
                        Slot</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{ $mobile->has_memory_slot ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 uploader">
                <div class="mobileImg text-center">
                    <img id="mobileThumbnail" src="{{ $mobile->pic }}"
                         class="img-rounded"/>
                </div>
            </div>

            <div class="form-group submit-btn-section">
                <div class="col-sm-9">
                    <div class="col-sm-offset-3 col-sm-9">

                        @if (! $mobile->hasReleased())
                        <form action="/mobiles/release/{{ $mobile->id }}" method="post"
                              class="pull-left">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <button type="submit" class="btn btn-danger">Release</button>
                        </form>

                        @else
                        <form action="/mobiles/unrelease/{{ $mobile->id }}" method="post"
                              class="pull-left">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <button type="submit" class="btn btn-primary">Unrelease
                            </button>
                        </form>

                        @endif
                        <a href="{{ url('mobiles') }}" class="btn btn-default pull-left">Cancel</a>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
