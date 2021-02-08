<a href="{{ route('seller.orders.show', $id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>

@if($notes)
<a href="javascript:void(0)" title="Notes" data-notes="{{ $notes }}" class="btn btn-success show-notes"><i class="fa fa-sticky-note"></i></a>
@endif