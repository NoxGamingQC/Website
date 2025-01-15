@extends('layouts.pages.pos')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center" style="margin-top:10px;">
            <img src="{{$image}}" width="200px">
        </div>
        <div class="col-md-3" style="background-color:#EEE;min-height:500px !important; border:1px solid black; margin-left: 10px">
        </div>
        <div class="col-md-9 text-center" style="margin-right:-10px;">
            @foreach($catalog as $item)
                @if(isset($item->getItemData()->getImageIds()[0]))
                    @foreach($catalogImages as $catalogImage)
                        @if($catalogImage->getId() == $item->getItemData()->getImageIds()[0])
                            <div class="col-md-2" style="margin-top:100px;">
                                <a id="{{$item->getId()}}" class="btn btn-lg" style="background-image:url('{{$catalogImage->getImageData()->getUrl()}}');background-size: cover;background-position: center center;border: 1px solid black;min-width:150px;min-height:150px;max-width:150px;max-height:150px;">
                                    <li style="padding-top:50px;list-style-type: none;overflow:hidden;">{{$item->getItemData()->getName()}}</li>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-md-2" style="margin-top:100px;">
                        <a id="{{$item->getId()}}" class="btn btn-lg" style="background-color:#EEE;border: 1px solid black;min-width:150px;min-height:150px;max-width:150px;max-height:150px;">
                            <li style="padding-top:50px;list-style-type: none;overflow:hidden;">{{$item->getItemData()->getName()}}</li>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection