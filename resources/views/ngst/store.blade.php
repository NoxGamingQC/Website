@extends('layouts.ngst.app')
@section('title', 'Store')
@section('content')
@include('modal.store')


<div class="row">
    <div class="col-md-12 content-item bg-dark">
        <div class="container">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-md-4 panel panel-primary-dark" style="max-height:400px; height:400px;padding-left:0;padding-right:0;border:0 solid transparant;margin:-1px;border-radius:10px;margin-bottom:5%;">
                            <div class="panel-body text-center" style="max-height:400px; height:400px; border: 1px solid black;border-radius:10px;margin:-1px;">
                                @if($item['imageURL'])
                                    <img id="image-{{$item['id']}}" src="{{$item['imageURL']}}" class="img-rounded"  style="max-width:250px; max-height:250px; height:250px;" />
                                @else
                                    <img id="image-{{$item['id']}}" src="/img/no-image.png"  style="width:250px" />
                                @endif
                                <div class="col-md-12">
                                    <br />
                                    <div class="col-md-6">
                                        <h4 class="raleway-font" id="name-{{$item['id']}}" value="{{$item['name']}}">{{$item['name']}}</h4>
                                    </div>
                                    <div class="col-md-6">
                                        @if($item['variationsCount'] > 1)
                                            <br />
                                            <p id="variationCount-{{$item['id']}}" value="{{$item['variationsCount']}}">{{$item['variationsCount'] > 1 ? $item['variationsCount'] . ' variations' : ''}}</p>
                                        @else
                                            <br />
                                            <p class="{{$item['price'] === 'variable' ? 'text-warning' : ''}}" value="{{$item['price']}}">{{$item['price'] === 'variable' ? trans('general.variable') : 'C' . number_format(($item['price'] / 100), 2, ',', ' ') . '$' . $item['priceUnit']}}</p>
                                        @endif
                                        <button id="{{$item['id']}}" class="store-modal-button btn btn-{{$item['isAvailable'] ? 'success' : 'danger disabled'}}" type="button" data-toggle="modal" data-target="#storeModal" {{$item['isAvailable'] ? '' : 'disabled'}}>{{$item['isAvailable'] ? trans('general.available') : trans('general.not_available')}}</button>
                                    </div>
                                    <input id="description-{{$item['id']}}" type="hidden" value="{{$item['description']}}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $('.store-modal-button').on('click', function() {
        var id = $(this).attr('id');
        $('#storeModalTitle').html($('#name-'+ id).attr('value'));
        $('#storeModalDescription').html($('#description-' + id).attr('value'));
        $('#storeModalVariationCount').html($('#variationCount-' + id).attr('value'));
        if($('#image-'+ id).attr('src') == null) {
            $('#storeModalImage').attr('src', '');
        }else {
            $('#storeModalImage').attr('src', $('#image-'+ id).attr('src'));
        }
    })
});
</script>
@endsection