@extends('layouts.pages.pos')
@section('content')

<div class="row" style="margin:0px;padding:0px;">
    <div class="col-md-12 text-center" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px;">
        <div class="col-md-12" style="background-color:#E51937;height:3vh;color:#FFF;border: 1px solid black">
            {{$cashierName . ' - ' . $name . ' - ' . $phone_number}}
        </div>
        <div class="col-md-7" style="min-height:49vh;overflow:hidden;margin:0px;padding:0px">
            @if($invoices)
                @foreach($invoices as $invoice)
                    <div class="col-md-3" style="{{Carbon\Carbon::create($invoice->getCreatedAt())->addWeeks(1)->lessThan(Carbon\Carbon::create()) ? 'background:#c41d1d;color:#FFF !important;' : 'color:#000 !important;'}}margin:0px !important;padding:0px !important;border: 1px solid black">
                    <a id="{{$invoice->getId()}}" class="btn btn-lg" style="min-height:12vh;max-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;overflow:hidden;border-radius:0px;">
                            <b><li style="{{Carbon\Carbon::create($invoice->getCreatedAt())->addWeeks(1)->lessThan(Carbon\Carbon::create()) ? 'background:#c41d1d;color:#FFF !important;' : 'color:#000 !important;'}}margin-top:1vh;list-style-type: none;overflow:hidden;padding:2px;border-radius: 5px;opacity: 0.85;">{{$invoice->getPrimaryRecipient()->getGivenName()}}<br />  {{$invoice->getPrimaryRecipient()->getFamilyName()}}</li></b>
                            <b><span style="{{Carbon\Carbon::create($invoice->getCreatedAt())->addWeeks(1)->lessThan(Carbon\Carbon::create()) ? 'background:#c41d1d;color:#FFF !important;' : 'color:#000 !important;'}}border-radius: 5px;opacity: 0.85;">{{$invoice->getPaymentRequests()[0]->getComputedAmountMoney()->getAmount() ? substr($invoice->getPaymentRequests()[0]->getComputedAmountMoney()->getAmount(), 0, -2) .',' . substr($invoice->getPaymentRequests()[0]->getComputedAmountMoney()->getAmount(), -2) . '$' : 'variable'}}</span></b>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div id="shoppingCart" class="col-md-5" style="min-height:42vh;max-height:42vh;background:#F8F8F8;padding:0px;overflow:hidden !important;">
            <input id="nextQuantity" type="hidden" value="">
        </div>
        <div class="col-md-5 text-left" style="min-height:3vh;">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h4><b>Total</b></h4>
                </div>
                <div class="col-md-6 text-right">
                    <h4 class="text-danger"><b id="totalPrice">0,00$</b></h4>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px">
        <div id="items" class="col-md-7 text-center" style="overflow:hidden;margin:0px;padding:0px;">
            <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                <a class="btn btn-lg" href="/pos/{{$slug}}" style="min-height:12vh;max-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;overflow:hidden;border-radius:0px;">
                    <li style="margin-top:3vh;list-style-type: none;overflow:hidden;padding-top:0px !important;padding:2px;color: #000;border-radius: 5px;opacity: 0.85;">Fermer<br />session</li>
                </a>
            </div>                                      
            @foreach($catalog as $item)
                @if(isset($item->getItemData()->getImageIds()[0]))
                    @foreach($catalogImages as $catalogImage)
                        @if($catalogImage->getId() == $item->getItemData()->getImageIds()[0])
                            <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                                <a id="{{$item->getId()}}" class="btn btn-lg" data-toggle="modal" data-target="#{{$item->getItemData()->getName()}}Modal" style="background-image:url('{{$catalogImage->getImageData()->getUrl()}}');background-size: cover;background-position: center center;min-height:12vh;max-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;overflow:hidden;border-radius:0px;">
                                </a>
                            </div>
                            @if(count($item->getItemData()->getVariations()) > 1)
                                <div id="{{$item->getItemData()->getName()}}Modal" class="modal fade" tabindex="-1" role="dialog"><!--Modal start-->
                                    <div class="modal-dialog-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{$item->getItemData()->getName()}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @foreach($item->getItemData()->getVariations() as $variation)
                                                    <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                                                        @if(isset($variation->getItemVariationData()->getImageIds()[0]))
                                                            @foreach($catalogImages as $catalogVariationImage)
                                                                @if($catalogVariationImage->getId() == $variation->getItemVariationData()->getImageIds()[0])
                                                                    <a id="{{$variation->getItemVariationData()->getItemId()}}" data-dismiss="modal" name="{{$variation->getItemVariationData()->getName()}}" price="{{$variation->getItemVariationData()->getPriceMoney() ? substr($variation->getItemVariationData()->getPriceMoney()->getAmount(), 0, -2) .'.' . substr($variation->getItemVariationData()->getPriceMoney()->getAmount(), -2) : null}}" class="btn btn-lg items" style="background-image:url('{{$catalogVariationImage->getImageData()->getUrl()}}');background-size: cover;background-position: center center;min-height:20vh;max-height:20vh;height:100%;width:100%; margin:0px !important;padding:0px !important;overflow:hidden;border-radius:0px;">
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <a id="{{$item->getId()}}" class="items btn btn-lg" data-dismiss="modal" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;min-height:20vh;max-height:20vh;">
                                                            <li style="margin:8vh;margin-bottom:2px;list-style-type: none;background-color: #000;color: #FFF;border-radius: 5px;opacity: 0.85;">{{$variation->getitemVariationData()->getName()}}</li>
                                                            <span style="margin-top:2px;padding:2px;background-color: #000;color: #FFF;border-radius: 5px;opacity: 0.85;">{{$variation->getItemVariationData()->getPriceMoney() ? substr($variation->getItemVariationData()->getPriceMoney()->getAmount(), 0, -2) .',' . substr($variation->getItemVariationData()->getPriceMoney()->getAmount(), -2) . '$' : 'variable'}}</span>
                                                        @endif
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                </div><!-- Modal end-->
                            @endif
                        @endif
                    @endforeach
                @else
                    <div class="col-md-2" style="margin:0px !important;padding:0px !important;border: 1px solid black;">
                        <a id="{{$item->getId()}}" class="btn btn-lg" style="min-height:12vh;height:100%;width:100%; margin:0px !important;padding:0px !important;min-height:12vh;max-height:12vh;">
                            <li style="padding-top:50px;list-style-type:none;overflow:hidden;padding:4vh;height:12vh;">{{$item->getItemData()->getName()}}</li>
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
                <div class="row" style="margin:0px;padding:0px">
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
        </div>
        <div id="total">
            <div class="col-md-2 text-center" style="min-height:49vh;max-height:49vh;overflow:hidden;margin:0px;padding:0px">
                <div class="col-md-12" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                        <a class="btn btn-lg disabled" style="min-height:25vh;max-height:25vh;height:100%;width:100%; margin:0px !important;padding:9vh;height:12vh;">
                            Total
                        </a>
                    </div>
                    <div class="col-md-12" style="margin:0px !important;padding:0px !important;border: 1px solid black">
                        <a class="btn btn-lg disabled" style="min-height:25vh;max-height:25vh;height:100%;width:100%; margin:0px !important;padding:9vh;height:12vh;">
                            Enter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center" style="background-color:#E51937;height:3vh;color:#FFF;border:1px solid black;">
        Créé et maintenu par Service Technologique J.Bédard - 819-852-8705
    </div>
</div>
<script>
$(document).ready(function() {
    $('.items').on('click', function(){
        var total = 0;
        var html = $('#shoppingCart').html();
        html += '<a class="cart-item btn btn-lg" style="width:100%;border:1px solid #CCC; min-height:3vh;max-height:5vh;border-radius:5px;padding:0px;color:#000;">'+
                '<div class="col-md-6 text-left">'+
                    '<h4><b>1 x ' + $(this).attr('name') + '</b></h4>'+
                '</div>'+
                '<div class="col-md-6 text-right">'+
                    '<h4><b class="item-price" value="' + $(this).attr('price') + '">' + Number($(this).attr('price')).toLocaleString('fr-CA', { style: 'currency', currency: 'CAD'}) + '</b></h4>'+
                '</div>'+
            '</a>';
        $('#shoppingCart').html(html);
        $('.item-price').each(function(key, item) {
            total += Number(item.getAttribute('value'));
        });
        $('#totalPrice').html(total.toLocaleString('fr-CA', { style: 'currency', currency: 'CAD'}));

        $('.cart-item').on('click', function() {
        var total = 0;
        $(this).remove();
        $('.item-price').each(function(key, item) {
            total += Number(item.getAttribute('value'));
        });
        $('#totalPrice').html(total.toLocaleString('fr-CA', { style: 'currency', currency: 'CAD'}));
    }); 
    }); 
})
</script>
@endsection