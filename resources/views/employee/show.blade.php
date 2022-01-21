@extends('layout')
@section('title','View Employee')
@section('content')
<div class="card mb-4 mt-5">
<div class="card-header">
    <i class="fas fa-table me-1"></i>
    View Employee
    <a href="{{url('employee')}}" class="float-end btn-sm btn-success">View All</a>
</div>
<div class="card-body">
    @if($errors->any())
        @foreach($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
        @endforeach
    @endif
    @if(Session::has('msg'))
    <p class="text-success">{{session('msg')}}</p>
    @endif
    <form method="post" action="{{url('employee/'.$data->id)}}">
    @method('put')
        @csrf
    <table class="table table-bordered">
    <tr>
            <th>Company</th>
            
            <td>
                {{$data->company->title}}
                
            </td>
        </tr>
        <tr>
            <th>First Name</th>
            
            <td>
            {{$data->first_name}}
                
            </td>
        </tr>
        <tr>
            <th>Last Name</th>
            
            <td>
            {{$data->last_name}}
                
            </td>
        </tr>
            <tr>
            <th>Email</th>
            <td>
            {{$data->first_name}}
            <td>
    </tr>   
<tr>
        <th>Phone No.</th>
        <td>
        {{$data->phone_no}}
        <td>
</tr> 
<tr>
        <th>Status</th>
        <td>
         @if($data->status ==1) Activated @else Deactivated @endif 
        
        <td>
</tr> 
        
    </table>
</form>
                            </div>
                        </div>

      
@endsection