@extends('layout')
@section('title','All Companies')
@section('content')
<div class="card mb-4 mt-5">
<div class="card-header">
<i class="fas fa-table me-1"></i>
All Companies
<a href="{{url('company/create')}}" class="float-end btn-sm btn-info">Add New</a>
</div>
<div class="card-body">
<table id="datatablesSimple">
<thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Email</th>
        <th>Website</th>
        <th>Company Logo</th>
        <th class="col-lg-3 col-lg-offset-2 col-md-10 col-md-offset-1">Action</th>
    </tr>
</thead>

<tbody>
    @if($data)
        @foreach($data as $d)
    <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->title}}</td>
        <td>{{$d->email}}</td>
        <td>{{$d->website}}</td>
        <td><img src="{{url('storage/app/public/uploads/1642765613_company_logo.png')}}" width="100" height="100" alt="image_logo"/></td>
        <td>
        <a href="{{url('company/'.$d->id)}}" class="btn-sm btn-warning m-3" ><i class="fas fa-eye"></i></a>
        <a href="{{url('company/'.$d->id.'/edit')}}" class="btn-sm btn-info m-3"  ><i class="fas fa-edit"></i></a>
            <a onclick="return confirm('Are you sure to delete this data?')" href="{{url('company/'.$d->id.'/delete')}}" class="btn-sm btn-danger m-3 mt-3 "><i class="fas fa-trash"></i></a>
            
        </td>
    </tr>
        @endforeach
    @endif
    
</tbody>
</table>
</div>
</div>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('public')}}/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('public')}}/js/datatables-simple-demo.js"></script>
@endsection