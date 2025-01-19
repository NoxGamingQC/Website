@extends('layouts.pages.pos')
@section('content')

<div class="row" style="margin:0px;padding:0px;">
    <div class="col-md-12 text-center" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px;">
        <div class="col-md-12" style="background-color:#E51937;height:3vh;color:#FFF;border: 1px solid black">
            {{$name}}
        </div>
        <div class="col-md-7" style="min-height:49vh;">
            <br />
        </div>
        <div class="col-md-5" style="min-height:43vh;background:#F8F8F8;">
            <br />
        </div>
        <div class="col-md-5 text-left" style="min-height:2vh;">
            <div class="row">
                <div class="col-md-4 text-left">
                    Total
                </div>
                <div class="col-md-4 text-center">
                    
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="min-height:48vh;max-height:48vh;overflow:hidden;margin:0px;padding:0px">
        <div id="items" class="col-md-7 text-center" style="overflow:hidden;margin:0px;padding:0px">
            @foreach($catalog as $item)
                @if(isset($item->getItemData()->getImageIds()[0]))
                    @foreach($catalogImages as $catalogImage)
                        @if($catalogImage->getId() == $item->getItemData()->getImageIds()[0])
                            <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                                <a id="{{$item->getId()}}" class="btn btn-lg" style="background-image:url('{{$catalogImage->getImageData()->getUrl()}}');background-size: cover;background-position: center center;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                                    <li style="padding:4vh;height:12vh;list-style-type: none;overflow:hidden;">{{$item->getItemData()->getName()}}</li>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                        <a id="{{$item->getId()}}" class="btn btn-lg" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                            <li style="padding-top:50px;list-style-type: none;overflow:hidden;padding:4vh;height:12vh;">{{$item->getItemData()->getName()}}</li>
                        </a>
                    </div>
                @endif
            @endforeach
            @for($i = 0; $i < 24; $i++)
                <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        
                    </a>
                </div>
            @endfor
        </div>
        <div id="numpad">
            <div class="col-md-3 text-center" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px">
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black;">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        7
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        8
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        9
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        4
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        5
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        6
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        1
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        2
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        3
                    </a>
                </div>
                <div class="col-md-8" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        0
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:4vh;height:12vh;">
                        DEL
                    </a>
                </div>
            </div>
        </div>
        <div id="total">
            <div class="col-md-2 text-center" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px">
            <div class="col-md-12" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:25vh;height:100%;width:100%; margin:0px !important;padding:9vh;height:12vh;">
                        Total
                    </a>
                </div>
                <div class="col-md-12" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="min-height:25vh;height:100%;width:100%; margin:0px !important;padding:9vh;height:12vh;">
                        Enter
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center" style="background-color:#E51937;height:3vh;color:#FFF;border:1px solid black;">
        Crée par Jimmy Béland-Bédard. Made by Jimmy Béland-Bédard
    </div>
</div>

@endsection