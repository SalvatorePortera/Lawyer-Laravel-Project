@if($files)
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="text-center" width="50px">#</th>
          <th>Invoice No</th>
          <th>Case No</th>
          <th>Case File No</th>
          <th>File Name</th>
          <th width="150px"></th>
        </tr>
      </thead>
      <tbody>
    @foreach($files as $file)
        <tr>
            <td class="text-center">{{ $loop->index + 1}}.</td>
            <td>@if($file->invoice)
                {{ $file->invoice->invoice_no}}
                @endif</td>
            <td>
                @if($file->case)
                {{$file->case->case_category? $file->case->case_category->name : '' }}
                                        - {{$file->case->case_no}}
                @endif
            </td>
            <td>
                @if($file->case)
                {{ $file->case->file_no}}
                @endif
            </td>
            <td> 
                {{ $file->user_filename}}
            </td>
            <td>
                @if(permissionCheck($type.'.edit'))
                        <span  class="primary-btn small fix-gr-bg icon-only  btn-modal" data-container="file_modal" data-href="{{ route('file.edit', $file->uuid) }}" style="cursor: pointer;"><i class="ti-pencil"></i></span>
                    @endif
                    @if(permissionCheck($type.'.destroy'))
                        <span style="cursor: pointer;"
                              data-url="{{route('file.destroy', $file->uuid)}}" id="delete_item" class="primary-btn small fix-gr-bg icon-only"><i class="ti-trash"></i></span>
                    @endif
                    <a href="{{ route('file.download', ['id' => $file->uuid]) }}" class="primary-btn small fix-gr-bg icon-only">
                                                            <i class="ti-download"></i>
                                                        </a>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
@endif
