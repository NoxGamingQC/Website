@extends('layouts.ngst.app')
@section('title', trans('store.store'))
@section('slogan', trans('store.slogan'))
@section('content')
@include('modal.store')


<div class="row">
    <div class="col-md-12 content-item bg-dark">
        <div class="container-fluid">
            <div class="col-md-2">
                @foreach($categories as $key => $category)
                    <div>
                        <h4 class="raleway-font">
                            <label>
                                <input class="sorting-checkboxes" type="checkbox" value="{{strtolower(str_replace('.', '-', str_replace(' ', '-', $category['name'])))}}" checked/>&nbsp{{trans($category['name'])}}
                            </label>
                        </h4>
                    </div>
                @endforeach
            </div>
            <div class="col-md-10">
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-md-4 panel panel-primary-dark {{$item['category'] ? strtolower(str_replace('.', '-', str_replace(' ', '-', $item['category']))) : ''}}" style="max-height:400px; height:400px;padding-left:0;padding-right:0;border:0 solid transparant;margin:-1px;border-radius:10px;margin-bottom:5%;">
                            <div class="panel-body text-center" style="max-height:400px; height:400px; border: 1px solid black;border-radius:10px;margin:-1px;">
                                @if($item['imageURL'])
                                    <img id="image-{{$item['id']}}" src="{{$item['imageURL']}}" class="img-rounded"  style="max-width:250px; max-height:250px; height:250px;" />
                                @else
                                    <img id="image-{{$item['id']}}" src="/img/no-image.png"  style="width:250px" />
                                @endif
                                <div class="col-md-12">
                                    <br />
                                    <div class="col-md-6">
                                        <h4 class="raleway-font" id="name-{{$item['id']}}" value="{{$item['name']}}">{{trans($item['name'])}}</h4>
                                    </div>
                                    <div class="col-md-6">
                                        @if(($item['variationsCount'] > 1) && $item['isSamePrice'])
                                            <br />
                                            <p class="{{$item['price'] === 'variable' ? 'text-danger' : ''}}" value="{{$item['price']}}">{{$item['price'] === 'variable' ? trans('store.price_not_available') : 'C' . number_format(($item['price'] / 100), 2, ',', ' ') . '$' . $item['priceUnit']}}</p>
                                        @elseif(($item['variationsCount'] > 1) && !$item['isSamePrice'])
                                            <br />
                                            <p id="variationCount-{{$item['id']}}" value="{{$item['variationsCount']}}">{{trans('store.variable_price')}}</p>
                                        @else
                                            <br />
                                            <p class="{{$item['price'] === 'variable' ? 'text-danger' : ''}}" value="{{$item['price']}}">{{$item['price'] === 'variable' ? trans('store.price_not_available') : 'C' . number_format(($item['price'] / 100), 2, ',', ' ') . '$' . $item['priceUnit']}}</p>
                                        @endif
                                        <button id="{{$item['id']}}" class="text-center store-modal-button btn btn-sm btn-{{$item['isAvailable'] ? 'success' : 'danger disabled'}}" type="button" data-toggle="modal" data-target="#storeModal" {{$item['isAvailable'] ? '' : 'disabled'}}>{{$item['isAvailable'] ? trans('general.available') : trans('store.out_of_stock')}}</button>
                                    </div>
                                    <input id="description-{{$item['id']}}" type="hidden" value="{{$item['description']}}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div id="noItemDisplay" class="col-md-12 text-center hidden" hidden>
                        <h3 class="raleway-font">{{trans('store.no_displayed_item')}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $('.sorting-checkboxes').change(function() {
        var isAllUnchecked = true;
        $('#noItemDisplay').attr('hidden', false);
        $('#noItemDisplay').removeClass('hidden');
        if($(this).is(':checked')) {
            $('.' + $(this).val()).attr('hidden', false);
            $('.' + $(this).val()).removeClass('hidden');
        } else {
            $('.' + $(this).val()).attr('hidden', true);
            $('.' + $(this).val()).addClass('hidden');
        }
        $('.sorting-checkboxes').each(function() {
            if($(this).is(':checked')) {
                isAllUnchecked = false;
                $('#noItemDisplay').attr('hidden', true);
                $('#noItemDisplay').addClass('hidden');
            }
        });
    });

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
    });
});
</script>
@endsection