
@extends('layouts.app')
@section('title', trans('general.news'))
@section('content')


<div class="container-fluid">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Latest Gaming News
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="col-12">
                    <div class="row">
                        @foreach($feed->get_items() as $item)
                            <div class="col-md-3 py-2">
                                <div class="card">
                                    <img src="{{ preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $item->get_description(), $image) ? $image['src'] : '/img/no-image.png' }}" class="card-img-top" alt="..." max-height="200px" style="object-fit: cover; height: 200px;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $item->get_title() }}</h5>
                                        <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ strip_tags($item->get_description()) }}</p>
                                        <a href="{{$item->get_permalink()}}" class="btn btn-primary">Read More</a>
                                        <hr />
                                        <source>Source: {{ preg_replace('/^www\./', '', parse_url($item->get_permalink())['host']) }}</source>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<h1></h1>
<ul>
    
</ul>
@endsection