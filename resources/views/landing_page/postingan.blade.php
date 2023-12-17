@extends('landing_page.templates.main')

@section('title')
Open Recruitment
@endsection

@section('content')
<div class="row pt-4">
    <p>Home / Postingan /{{$postingan->judul}}</p>
</div>
<div class="row pt-3">
    <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25" style="height: 130px;">
        <span class="text-bold" style="font-size: 20px">{{$postingan->judul}}</span>
    </div>
    <div class="col-12 d-flex justify-content-center mt-3">
        <div class="col-md-6">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block; object-fit: cover;" src="{{Storage::url('public/img/data/'.$postingan->gambar)}}" data-holder-rendered="true">
            </div>
        </div>
    </div>
    <div class="col-12 mt-3 d-flex px-5">
        {!! $postingan->content !!}
    </div>
</div>
<div class="col-12 d-flex justify-content-center mt-3 flex-wrap">
    @foreach ($postingan_list as $postingan)
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;object-fit: cover;"
                    src="{{Storage::url('public/img/data/'.$postingan->gambar)}}" data-holder-rendered="true">
                <div class="card-body">
                    <p class="card-text">{{$postingan->judul}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <span>{{\Carbon\Carbon::parse($postingan->tgl_post)->format('j F Y')}}</span>
                        </div>
                        <a href="{{ route('landing_page.read_postingan', ['id'=>$postingan->id]) }}"
                            class="btn btn-primary">></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection