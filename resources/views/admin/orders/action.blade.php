<a href="{{ route('admin.orders.show', $id) }}" class="btn btn-success"><i class="fa fa-print"></i></a>
<button type="button" class="btn btn-info show-history" data-order="{{ $id }}">
    <i class="fa fa-truck"></i>
</button>
<a href="{{ route('admin.orders.edit', $id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
<a href="javascript:void(0)" class="btn btn-danger" onclick="this.children[1].submit()">
    <i class="fa fa-trash"></i>
    <form action="{{ route('admin.orders.destroy', $id) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
</a>