@extends('templates.adminmitra')
@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Data Makanan Meting</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                        data-mdl-for="panel-button2">
                        <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                        </li>
                        <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                        </li>
                        <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                            here</li>
                    </ul>
                </div>
                <div class="card-body" id="bar-parent2">
                    <form action="{{ route('makanan.update', $data->id)}}" id="form_sample_2" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('patch') }}
                        <div class="form-body">
                            <div class="form-group row  margin-top-20">
                                <label class="control-label col-md-3">Nama Makanan
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input class="form-control {{$errors->has('nama')?'is-invalid':''}}"
                                               name="nama" type="text" value="{{$data->nama}}" />
                                        @if ($errors->has('nama'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('nama') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Harga
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input class="form-control {{$errors->has('harga')?'is-invalid':''}}"
                                               name="harga" type="text" value="{{$data->harga}}" />
                                        @if ($errors->has('harga'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('harga') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Deskripsi
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input class="form-control {{$errors->has('deskrpsi')?'is-invalid':''}}"
                                               name="deskripsi" type="text" value="{{$data->deskripsi}}" />
                                        @if ($errors->has('deskripsi'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('deskripsi') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Foto
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="hidden" name="old_foto" value="{{$data->foto}}"/>
                                        <input type="file" class="form-control {{$errors->has('foto')?'is-invalid':''}}"
                                               name="foto" onchange="loadfile(event)" />
                                        <img id="output" class="img-fluid" height="100" width="100" src="{{asset('uploads/makanan/'.$data->foto)}}">
                                        @if ($errors->has('foto'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('foto') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="offset-md-3 col-md-9">
                                <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                <a href="{{route('makanan.index')}}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    var loadfile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

