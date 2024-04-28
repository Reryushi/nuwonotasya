@extends('layouts.admin')
@section('style')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <div class="toolbar">
                                <a href="{{url('admin/room_type/'.$room_type->id.'/image/create')}}" rel="tooltip" title="Add New Image"
                                   class="btn btn-danger" style="margin-right: 20px">
                                    <i class="ti-plus"></i>
                                </a>
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <div class="table-responsive">
                                <table class="table-bordered table-striped table-hover datatable">
                                <thead>
                                <th>S.N.</th>
                                <th>Image</th>
                                <th>Caption</th>
                                <th>Is Primary</th>
                                <th>Status</th>
                                <th>Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($room_type->images->count())
                                    @else
                                        @foreach($room_type->images as $index => $image)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td><img height="60px" width="60px" rel="tooltip"  alt="{{ $image->caption }}" title="{{ $image->caption }}"
                                                         src="{{'/front/images/room/'.$image->name}}"/></td>
                                                <td>{{ $image->caption }}</td>

                                                <td>@if($image->is_primary == 1)
                                                        <button class="btn btn-danger btn-xs btn-fill">Yes</button>
                                                    @else
                                                        <button class="btn btn-default btn-xs btn-fill">No
                                                        </button>
                                                    @endif</td>
                                                <td>
                                                    @if($image->status == 1)
                                                        <button class="btn btn-success btn-xs btn-fill">Active</button>
                                                    @else
                                                        <button class="btn btn-default btn-xs btn-fill">Inactive
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="table-icons">

                                                        <a rel="tooltip" title="Edit"
                                                           class="btn btn-simple btn-warning btn-icon table-action edit"
                                                           href="{{url('admin/room_type/'.$room_type->id.'/image/'.$image->id.'/edit')}}">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <form action="{{ url('/admin/room_type/'.$room_type->id.'/image/hapus/'.$image->id ) }}" method="POST" style="display: inline">
                                                                {{ csrf_field() }}
                                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endunless
                                </tbody>
                            </table>
</div>
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('backend/js/sweetalert2.js') }}"></script>

    <!--  Bootstrap Table Plugin    -->
    <script src="{{ asset('backend/js/bootstrap-table.js') }}"></script>
    <script>
       $(function () {
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
      

        $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        })
    </script>
   
@endsection

