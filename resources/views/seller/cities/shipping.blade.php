@if($prices)
  @money($prices[0]['pivot']['shipping_price'])
@else
  @money($shipping_price)
@endif
