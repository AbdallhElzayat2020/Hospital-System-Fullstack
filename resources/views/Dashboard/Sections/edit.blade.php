<!-- Modal -->
<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">
                    {{ trans('Dashboard/sections_trans.edit_sections') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sections.update', 'test') }}" method="post">
                @method('put')
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $section->id }}">
                    <label for="name">{{ trans('Dashboard/sections_trans.section_title') }}</label>
                    <input type="text" name="name" value="{{ $section->name }}" class="form-control">

                    <label for="description">{{ trans('Dashboard/sections_trans.section_description') }}</label>
                    <input type="text" name="description" value="{{ $section->description }}" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Dashboard/sections_trans.Close') }}</button>
                    <button type="submit"
                        class="btn btn-primary">{{ trans('Dashboard/sections_trans.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
