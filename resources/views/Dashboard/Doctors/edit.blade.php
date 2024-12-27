<!-- Modal -->
<div class="modal fade" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">
                    {{ trans('Dashboard/doctors.edit_doctor') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctors.update', 'test') }}" method="post">
                @method('put')
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{ trans('Dashboard/doctors.doctor_name') }}</label>
                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Dashboard/doctors.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('Dashboard/doctors.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
