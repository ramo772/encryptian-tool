@props(['id' => '', 'action' => '', 'method' => '', 'formid' => ''])
<x-modal-form method="{{ $method }}" action="{{ $action }}" formid="{{ $formid }}">
    <div id="{{ $id }}" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
            <div class="modal-content shadow-dark-80">
                <div class="modal-header border-0 pb-0 align-items-start ps-4">
                    <h5 class="modal-title pb-3">
                        {{ $header }}
                    </h5>
                    <button type="button" class="btn btn-icon p-0" data-bs-dismiss="modal" aria-label="Close">
                        <x-svg-close />
                    </button>
                </div>
                <div class="modal-body pt-2 px-4">
                    {{ $body }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light px-2" data-bs-dismiss="modal"><span
                            class="px-1">Cancel</span></button>
                    <button type="submit" class="btn btn-success px-2 ms-2"><span class="px-1">Save</span></button>
                </div>
            </div>
        </div>
    </div>
</x-modal-form>
