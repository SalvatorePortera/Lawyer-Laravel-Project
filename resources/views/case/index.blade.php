@extends('layouts.master', ['title' => __('case.Case')])

@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('case.'.$page_title.' Case') }}</h1>
      </div>
      <div class="col-sm-6">
        @if(permissionCheck('case.store'))
        <ul class="breadcrumb float-sm-right">
            <li>
                <a class="btn btn-primary" href="{{ route('case.create') }}">
                    <i class="fa fa-plus"></i> {{ __('case.New Case') }}
                </a>
            </li>
        </ul>    
        @endif
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    
                        <div class="card ">
                            <!-- table-responsive -->
                            <div class="card-body">
                                <table class="table table-striped table-hover dt">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th scope="col">{{ __('case.Case') }}</th>
                                        <th scope="col">{{ __('case.Client') }}</th>
                                        <th scope="col">{{ __('case.Details') }}</th>
                                        <th scope="col">{{ __('common.Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <b>{{ __('case.Case No.') }}: </b>
                                                {{$model->case_category? $model->case_category->name : '' }}
                                                /{{$model->case_no}} <br>
                                                @if($model->case_category_id)
                                                    <a href="{{route('category.case.show', $model->case_category_id)}}"><b>{{ __('case.Category') }}
                                                            :
                                                        </b> {{$model->case_category? $model->case_category->name : '' }}
                                                    </a>
                                                @else
                                                    <b>{{ __('case.Category') }}: </b>
                                                    {{$model->case_category? $model->case_category->name : '' }}
                                                @endif<br>
                                                <a href="{{ route('case.show', $model->id) }}"><b>{{ __('case.Title') }}
                                                        : </b>{{ $model->title }}
                                                </a>
                                                <br>
                                                <b>{{ __('case.Next Hearing Date') }}
                                                    : </b> {{ date('d, F Y',strtotime($model->hearing_date)) }} <br>
                                                <b>{{ __('case.Filing Date') }}
                                                    : </b> {{date('d, F Y',strtotime($model->filling_date))}}
                                            </td>
                                            <td>
                                                @if($model->client == 'Plaintiff' and $model->plaintiff_client)
                                                    <a href="{{route('client.show', $model->plaintiff_client->id)}}"><b>{{ __('case.Name') }}</b>:
                                                        {{ $model->plaintiff_client->name }}</a> <br>
                                                    <b>{{ __('case.Mobile') }}
                                                        : </b> {{ $model->plaintiff_client->mobile }} <br>
                                                    <b>{{ __('case.Email') }}
                                                        : </b> {{ $model->plaintiff_client->email }} <br>
                                                    <b>{{ __('case.Address') }}
                                                        : </b> {{ $model->plaintiff_client->address }}
                                                    {{ $model->plaintiff_client->city ? ', '. $model->plaintiff_client->city->name : '' }}
                                                    {{ $model->plaintiff_client->state ? ', '. $model->plaintiff_client->state->name : '' }}
                                                @elseif($model->client == 'Opposite' and $model->opposite_client)
                                                    <a href="{{route('client.show', $model->opposite_client->id)}}"><b>{{ __('case.Name') }}</b>:
                                                        {{ $model->opposite_client->name }}</a> <br>
                                                    <b>{{ __('case.Mobile') }}
                                                        : </b> {{ $model->opposite_client->mobile }} <br>
                                                    <b>{{ __('case.Email') }}: </b> {{ $model->opposite_client->email }}
                                                    <br>
                                                    <b>{{ __('case.Address') }}
                                                        : </b> {{ $model->opposite_client->address }}
                                                    {{ $model->opposite_client->city ? ', '. $model->opposite_client->city->name : '' }}
                                                    {{ $model->opposite_client->state ? ', '. $model->opposite_client->state->name : '' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($model->court)
                                                    <a href="{{route('master.court.show', $model->court_id)}}"><b>{{ __('case.Court') }}</b>:
                                                        {{ $model->court->name}} </a><br>
                                                    <a href="{{route('category.court.show', $model->court_category_id)}}">
                                                        <b>{{ __('case.Category') }}</b>:
                                                        {{ $model->court->court_category ? $model->court->court_category->name : '' }}
                                                    </a><br>
                                                    <b>{{ __('case.Room No') }}: </b> {{ $model->court->room_number }}
                                                    <br>
                                                    <b>{{ __('case.Address') }}: </b> {{ $model->court->location }}
                                                    {{ $model->court->city ? ', '. $model->court->city->name : '' }}
                                                    {{ $model->court->state ? ', '. $model->court->state->name : '' }}
                                                @endif
                                            </td>


                                            <td>


                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-primary bg-hover-yellow dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">
                                                        <a href="{{ route('case.show', $model->id) }}"
                                                           class="dropdown-item"><i
                                                                class="icon-file-eye"></i> {{ __
                                                            ('common.View') }}</a>
                                                        @if(!$model->judgement)
                                                            @if(permissionCheck('case.edit'))
                                                                <a href="{{route('case.edit', $model->id)}}"
                                                                   class="dropdown-item"><i
                                                                        class="icon-pencil mr-2"></i>{{ __('common.Edit') }}
                                                                </a>
                                                            @endif
                                                            @if(permissionCheck('date.store'))
                                                                <a href="{{route('date.create', ['case' => $model->id])}}"
                                                                   class="dropdown-item"><i
                                                                        class="icon-calendar3 mr-2"></i>{{ __('case.New Date') }}
                                                                </a>
                                                            @endif
                                                            @if(permissionCheck('putlist.store'))
                                                                <a href="{{route('putlist.create', ['case' => $model->id])}}"
                                                                   class="dropdown-item"><i
                                                                        class="icon-calendar3 mr-2"></i>{{ __('case.New Put Up Date') }}
                                                                </a>
                                                            @endif
                                                            @if(permissionCheck('lobbying.store'))
                                                                <a href="{{route('lobbying.create', ['case' => $model->id])}}"
                                                                   class="dropdown-item"><i
                                                                        class="icon-calendar3 mr-2"></i>{{ __('case.New Lobbying Date') }}
                                                                </a>
                                                            @endif
                                                            @if(permissionCheck('judgement.store'))
                                                                <a href="{{route('judgement.create', ['case' => $model->id])}}"
                                                                   class="dropdown-item"><i
                                                                        class="icon-calendar3 mr-2"></i>{{ __('case.New Judgement Date') }}
                                                                </a>
                                                            @endif
                                                        @endif
                                                        @if(permissionCheck('case.destroy'))
                                                            <a href="#" data-id="{{ $model->id }}" data-url="{{ route
                                                                ('case.destroy', $model->id)
                                                            }}" class="dropdown-item delete_item"><i
                                                                        class="icon-trash mr-2"></i>{{ __('common.Delete') }}
                                                                </a>
                                                            
                                                        @endif

                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </section>

@stop
@push('admin.scripts')
    <script>
        $(document).ready(function () {

        });

    </script>
@endpush
