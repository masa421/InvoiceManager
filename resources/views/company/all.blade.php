@extends('layouts.admin_master')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Companies List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address1</th>
                        <th>Address2</th>
                        <th>Profile</th>
                        <th>Logo Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->address1 }}</td>
                        <td>{{ $row->address2 }}</td>
                        <td>{{ $row->profile }}</td>
                        <td>
                            <img class="hidden w-48 mr-6 md:block"
                            src="{{$row->logo_img_path ? asset('storage/'.$row->logo_img_path) : asset('images/no-image.png')}}" alt=""/>
                        </td>
                        <td>
                            <a href="{{URL::to('company/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <!-- <a href="{{ 'add-order/'.$row->id }}" class="btn btn-sm btn-info">Order</a> -->
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        
<script>

   $('#dataTable').DataTable({
    columnDefs: [
    {bSortable: false, targets: [5]} 
  ],
                dom: 'lBfrtip',
           buttons: [
               {
                   extend: 'copyHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                       columns: [ 0, ':visible' ]
                       
                   }
               },
               {
                   extend: 'excelHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, ':visible' ]
                   }
               },
               {
                   extend: 'pdfHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                       columns: [ 0, 1, 2, 5 ]
                   }
               },

               'colvis'

           ],
            
           });
       </script>

@endsection
