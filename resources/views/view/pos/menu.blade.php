@extends('layouts.pages.pos')
@section('content')

<div class="row" style="margin:0px;padding:0px;">
    <div class="col-md-12 text-center" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px">
        <div class="col-md-12" style="background-color:red;height:2vh">
        </div>
    </div>
    <div class="col-md-12" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px">
        <div id="items" class="col-md-7 text-center">
            @foreach($catalog as $item)
                @if(isset($item->getItemData()->getImageIds()[0]))
                    @foreach($catalogImages as $catalogImage)
                        @if($catalogImage->getId() == $item->getItemData()->getImageIds()[0])
                            <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                                <a id="{{$item->getId()}}" class="btn btn-lg" style="background-image:url('{{$catalogImage->getImageData()->getUrl()}}');background-size: cover;background-position: center center;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                                    <li style="padding-top:50px;list-style-type: none;overflow:hidden;">{{$item->getItemData()->getName()}}</li>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                        <a id="{{$item->getId()}}" class="btn btn-lg" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                            <li style="padding-top:50px;list-style-type: none;overflow:hidden;">{{$item->getItemData()->getName()}}</li>
                        </a>
                    </div>
                @endif
            @endforeach
            @for($i = 0; $i < 24; $i++)
                <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        
                    </a>
                </div>
            @endfor
        </div>
        <div id="numpad">
            <div class="col-md-3 text-center" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px">
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        7
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        8
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        9
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        4
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        5
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        6
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        1
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        2
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        3
                    </a>
                </div>
                <div class="col-md-8" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        0
                    </a>
                </div>
                <div class="col-md-4" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        DEL
                    </a>
                </div>
            </div>
        </div>
        <div id="total">
            <div class="col-md-2 text-center" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px">
            <div class="col-md-12" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:25vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        Total
                    </a>
                </div>
                <div class="col-md-12" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a class="btn btn-lg disabled" style="background-color:#EEE;min-height:25vh;height:100%;width:100%; margin:0px !important;padding:0px !important;">
                        Enter
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="background-color:red;height:2vh">
        <br />
    </div>
</div>

@endsection