<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">
                    {{ trans('Dashboard/sections_trans.add_sections') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sections.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="name">{{ trans('Dashboard/sections_trans.section_title') }}</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    {{-- description --}}
                    <label for="description">{{ trans('Dashboard/sections_trans.section_description') }}</label>
                    <input type="text" name="description" value="{{ old('description') }}" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Dashboard/sections_trans.Close') }}
                    </button>
                    <button type="submit" class="btn btn-primary">{{ trans('Dashboard/sections_trans.submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
