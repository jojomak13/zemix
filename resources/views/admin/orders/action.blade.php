<a href="{{ route('admin.orders.show', $id) }}" target="_blank" class="btn btn-success" title="Print">
    <i class="fa fa-print"></i>
</a>
<button type="button" class="btn btn-info show-history" data-order="{{ $id }}" title="History">
    <i class="fa fa-truck"></i>
</button>
<a href="{{ route('admin.orders.edit', $id) }}" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
<a href="javascript:void(0)" class="btn btn-danger" onclick="this.children[1].submit()" title="Delete">
    <i class="fa fa-trash"></i>
    <form action="{{ route('admin.orders.destroy', $id) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
</a>