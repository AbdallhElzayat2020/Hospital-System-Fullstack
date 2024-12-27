<!-- Modal -->
<div class="modal fade" id="delete{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">
                    {{ trans('Dashboard/doctors.delete_doctor') }} {{ $doctor->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sections.destroy', 'test') }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                    <h5>{{ trans('Dashboard/doctors.Warning') }}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ trans('Dashboard/doctors.Close') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        {{ trans('Dashboard/doctors.submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
