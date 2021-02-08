@extends('layouts.seller.master')

@section('title', 'Profile')

@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/datatables.css') }}">
@endsection

@section('content')
<div class="container">

    {{-- Start Alerts --}}
    @include('layouts.seller._alerts')
    {{-- End Alerts --}}

    {{-- Start Orders --}}
    <div class="card" id="orders">
        <div class="card-header">Orders</div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('seller.orders.print') }}" method="POST" id="orders-form">
                    @csrf
                    {{ $dataTable->table([
                        'class' => 'table table-striped table-bordered nowrap dataTable'
                    ]) }}
                </form>
            </div>
        </div>
    </div>
    {{-- End Orders --}}
</div>


<div class="modal fade" id="show_notes_modal" tabindex="-1" aria-labelledby="show_notes_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show_notes_modal">Order Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="notes"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.4/datatables.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script>
    // check all checkbox
    function checkAll(){
        $('input[class="item-checkbox"]:checkbox').each(function(){
            if($('input[class="check-all"]:checkbox:checked').length){
                $(this).prop('checked', true);
            } else {
                $(this).prop('checked', false);
            }
        })
    }

    // print selected button
    $(document).on('click', '.printBtn', function(){
        $('#orders-form').submit();
    });
    
    // load notes if exists to notes modal
    document.querySelector("table").addEventListener("click", function(e) {
        let el = e.target;

        if (el.classList.contains("show-notes")) {
            $('#notes').text(el.getAttribute('data-notes'));
            $('#show_notes_modal').modal("show");
        } else if (
            el.tagName === "I" &&
            el.parentElement.classList.contains("show-notes")
        ) {
            $('#notes').text(el.parentElement.getAttribute('data-notes'));
            $('#show_notes_modal').modal("show");
        }
    });
</script>
@endsection

