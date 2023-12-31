@foreach($product->activeSKU->chunk('4') as $chunkedSkus)
    <div class="d-flex flex-wrap" id="product-options">
        @foreach($chunkedSkus as $sku)
            <div class="text-center sku-item mr-2" style="width: 240px;text-align: center">
                <img src="{{ asset($sku->image) }}" style="max-width: 100px"
                     class="img-responsive img-radio mx-auto img-fluid">
                <div class="middle">
                    <div class="text text-success"><i class="fa fa-check fa-4x"></i></div>
                </div>
                <div>
                    {!! !$sku->options->isEmpty() ? $sku->presenter()['options']:'' !!}
                </div>
                @if($sku->stock_status == "in_stock")
                    <button type="button"
                            class="btn-radio button dark spaced">
                        <b>{!! $sku->discount?'<del class="text-muted">'.\Payments::currency($sku->regular_price).'</del>':''  !!} {!! \Payments::currency($sku->price) !!}</b>
                    </button>
                @else
                    <button type="button"
                            class="btn btn-block btn-sm m-t-5 btn-danger">
                        <b> @lang('corals-marketplace-dragon::labels.partial.out_stock')</b>
                    </button>
                @endif
                <input type="checkbox" id="left-item" name="sku_hash"
                       value="{{ $sku->hashed_id }}"
                       class="hidden d-none disable-icheck"/>
            </div>
        @endforeach
    </div>
@endforeach

<div class="form-group">
    <span data-name="sku_hash"></span>
</div>