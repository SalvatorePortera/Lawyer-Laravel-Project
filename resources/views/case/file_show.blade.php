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
       @if (auth()->user()->role_id == 0 && $file->client2view==0)
          @continue
       @endif
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
                {{$file->user->role}}
                @if(permissionCheck($type.'.edit') && (isset($file->user) && $file->user->role!=0))
                  
                        <span class="btn @if($file->client2view==1) btn-primary @else btn-warning @endif btn-sm btn-client-view" data-url="{{route('file.client2view', $file->uuid)}}" data-file-id="{{$file->uuid}}" title="Client To View" style="cursor: pointer;">
                          @if($file->client2view==1)
                          <i class="fa fa-eye"></i>
                          @else
                          <i class="fa fa-eye-slash"></i>
                          @endif
                        </span>
                @endif
                    @if(permissionCheck($type.'.destroy') && $file->user->role!=0)
                        <a style="cursor: pointer;"
                              data-url="{{route('file.destroy', $file->uuid)}}" class="btn btn-primary btn-sm delete_item"><i class="fa fa-trash"></i></a>
                    @endif
                    <a href="{{ route('file.download', ['id' => $file->uuid]) }}" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-download"></i>
                                                        </a>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
@endif
