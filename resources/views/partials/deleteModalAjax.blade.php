<div class="modal fade" id="deleteAdvocateItemModal" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('common.Delete') </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h4>@lang('common.Are you sure to delete ?')</h4>
                    <p>@lang('common.Once deleted, it will deleted all related Data!')</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('common.Cancel')</button>
                <form id="item_delete_form" action="">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger submit" type="submit" >@lang('common.Delete')</button>
                    <button class="btn btn-danger submitting" disabled type="button" style="display: none;" >@lang('common.Deleting')</button>
                </form>
            </div>
        </div>
    </div>
</div>
