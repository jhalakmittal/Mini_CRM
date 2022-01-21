@extends('layout')
@section('title','Update Employee')
@section('content')
<div class="card mb-4 mt-5">
<div class="card-header">
    <i class="fas fa-table me-1"></i>
    Update Employee
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
                <select name="select_company" class="form-control">
                    <option value="">--Select Company--</option>
                    @foreach($companies as $select_company)
                        <option @if($select_company->id == $data->company_id) selected @endif value="{{$select_company->id}}">{{$select_company->title}}</option>
                    @endforeach
                </select>
                
            </td>
        </tr>
        <tr>
            <th>First Name</th>
            
            <td>
                <input type="text" class="form-control" name="first_name" value="{{$data->first_name}}"/>
                
            </td>
        </tr>
        <tr>
            <th>Last Name</th>
            
            <td>
                <input type="text" class="form-control" name="last_name" value="{{$data->last_name}}"/>
                
            </td>
        </tr>
            <tr>
            <th>Email</th>
            <td>
            <input type="text" class="form-control" name="email" value="{{$data->email}}"/>
            <td>
    </tr>   
<tr>
        <th>Phone No.</th>
        <td>
        <input type="text" class="form-control" name="phone_no" value="{{$data->phone_no}}"/>
        <td>
</tr> 
<!-- <tr>
        <th>Photo</th>
        <td>
        <input type="file" class="form-control" name="photo"/>
        <td>
</tr>  -->
<tr>
        <th>Status</th>
        <td>
        <input @if($data->status ==1) checked @endif type="radio" name="status" value="1"/> Activate 
        <br/>
        <input @if($data->status ==0) checked @endif type="radio" name="status" value="0"/> Dectivate
        <td>
</tr> 
        <tr>
            <td colspan="2">
                <input type="submit" class="btn btn-primary" value="Update"/>
            </td>
        </tr>
    </table>
</form>
                            </div>
                        </div>

      
@endsection