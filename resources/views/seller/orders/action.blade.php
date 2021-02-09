<a href="{{ route('seller.orders.show', $id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
@if($status_id === 1)
<a href="{{ route('seller.orders.edit', $id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
@endif
@if($notes)
<a href="javascript:void(0)" title="Notes" data-notes="{{ $notes }}" class="btn btn-success show-notes"><i class="fa fa-sticky-note"></i></a>
@endif