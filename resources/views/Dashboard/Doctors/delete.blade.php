<!-- Modal -->
<div class="modal fade" id="delete{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">
                    {{ trans('Dashboard/doctors.delete_doctor') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctors.destroy', 'test') }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <h5>{{ trans('Dashboard/sections_trans.Warning') }}</h5>
                    {{-- for delete one doctor  --}}
                    <input type="hidden" value="1" name="page_id">
                    {{-- check if doctor has image --}}
                    @if ($doctor->image)
                        {{-- get image name --}}
                        <input type="hidden" name="filename" value="{{ $doctor->image->filename }}">
                    @endif
                    {{-- delete doctor with out Image --}}
                    <input type="hidden" name="id" value="{{ $doctor->id }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Dashboard/sections_trans.Close') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        {{ trans('Dashboard/sections_trans.submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
