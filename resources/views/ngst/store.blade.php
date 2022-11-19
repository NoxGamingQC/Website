@extends('layouts.ngst')
@section('title', 'Store')
@section('content')
@include('modal.store')


<div class="row">
    <div class="col-md-12 content-item">
        @foreach ($categories as $category)
            <div class="col-md-12">
                <h3>{{$category['name']}}</h3>
                <hr />
                @foreach($items as $item)
                    @if($item['category'] === $category['name'])
                        <div class=" col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-body text-center">
                                    @if($item['imageURL'])
                                        <img id="image-{{$item['id']}}" src="{{$item['imageURL']}}" class="img-rounded" style="width:20%" />
                                    @endif
                                    <h4 id="name-{{$item['id']}}" value="{{$item['name']}}">{{$item['name']}}</h4>
                                    <p id="variationCount-{{$item['id']}}" value="{{$item['variationsCount']}}">{{$item['variationsCount'] > 1 ? $item['variationsCount'] . ' variations' : ''}}</p>
                                    <input id="description-{{$item['id']}}" type="hidden" value="{{$item['description']}}">
                                    <button id="{{$item['id']}}" class="store-modal-button btn btn-info" type="button" data-toggle="modal" data-target="#storeModal">{{trans('generic.see_more')}}</button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
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
@stop