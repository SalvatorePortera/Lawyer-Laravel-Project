<div class="col-xl-12 mt-3 attach-file-row">
    <table class="table table-striped file-table">
        <thead>
            <tr>
                <th width="20%">{{ __('case.CLIENT TO VIEW') }}</th>
                <th class="text-center">{{ __('case.Select File') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="attach-file-tbody">
            <tr class="attach-row">
                <td>
                    <div class="icheck-primary">
                    <input type="checkbox" checked id="check_view_to0" name="checkViewTo0" value="1">
                    <label for="check_view_to0"></label>
                  </div>
                </td>
                <td>
                    <input type="file" name="file[]" id="attach_file">
                </td>
                <td>
                    <span style="cursor:pointer;" class="primary-btn small fix-gr-bg icon-only" type="button" id="file_add"> <i class="ti-plus"></i> </span>
                </td>
            </tr>            
        </tbody>
    </table>
    

</div>
