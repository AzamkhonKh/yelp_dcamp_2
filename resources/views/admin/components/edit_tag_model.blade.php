<!-- Normal Modal -->
<div class="modal" id="modal-normal-{{ $tag->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
<div class="modal-dialog" role="document">

<form action="{{ route('web.tag.update', ['tag' => $tag->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-content">
    <div class="block block-rounded shadow-none mb-0">
        <div class="block-header block-header-default">
        <h3 class="block-title">Edit {{ $tag->name }}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa fa-times"></i>
            </button>
        </div>
        </div>
        <div class="block-content fs-sm">
                <div class="row">
                    <div class="mb-4">
                      <label class="form-label" for="example-text-input">
                        name
                    </label>
                      <input 
                        type="text" 
                        class="form-control" 
                        id="example-text-input" 
                        value="{{ $tag->name }}" 
                        name="name" 
                        placeholder="Text Input">
                    </div>
                    <div class="mb-4" style="display:flex; justify-content:end;">
                    </div>
                </div>

        </div>
        <div class="block-content block-content-full block-content-sm text-end border-top">
        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
            Done
        </button>
        </div>
    </div>
    </div>
    </form>
</div>
</div>
<!-- END Normal Modal -->