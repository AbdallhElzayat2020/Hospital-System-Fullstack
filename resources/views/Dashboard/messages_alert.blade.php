@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>خطا</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if (session('add'))
            notif({
                msg: "{{ session('add') }}",
                type: "success"
            });
        @endif
        @if (session('edit'))
            notif({
                msg: "{{ session('edit') }}",
                type: "success"
            });
        @endif
        @if (session('delete'))
            notif({
                msg: "{{ session('delete') }}",
                type: "success"
            });
        @endif
    });
</script>
