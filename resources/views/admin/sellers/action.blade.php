<a href="{{ route('admin.sellers.show', $id) }}" class="btn btn-primary"><i class="fa fa-exchange-alt"></i></a>
@if($is_active)
    <a href="javascript:void(0)" class="btn btn-info" title="Block" onclick="this.children[1].submit()">
        <i class="feather icon-alert-triangle"></i>
        <form action="{{ route('admin.sellers.activate', $id) }}" method="POST">@csrf</form>
    </a>
    @else
    <a href="javascript:void(0)" class="btn btn-success" title="Activate" onclick="this.children[1].submit()">
        <i class="feather icon-check"></i>
        <form action="{{ route('admin.sellers.activate', $id) }}" method="POST">@csrf</form>
    </a>
@endif
<a href="{{ route('admin.sellers.edit', $id) }}" class="btn btn-warning"><i class="feather icon-edit"></i></a>
<a href="javascript:void(0)" onclick="if(confirm('Are you sure')) this,children[1].submit()" class="btn btn-danger">
    <i class="feather icon-trash"></i>
    <form action="{{ route('admin.sellers.destroy', $id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</a>