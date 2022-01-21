@extends('layout')
@section('title','Add Companies')
@section('content')
<div class="card mb-4 mt-5">
<div class="card-header">
    <i class="fas fa-table me-1"></i>
    Create Company
    <a href="{{url('company')}}" class="float-end btn-sm btn-success">View All</a>
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
    <form method="post" action="{{url('company')}}" enctype="multipart/form-data">
        @csrf
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            
            <td>
                <input type="text" class="form-control" name="title"/>
                
            </td>
        </tr>
        <tr>
        <th>Email</th>
        <td>
        <input type="text" class="form-control" name="email"/>
        <td>
</tr>   
<tr>
        <th>Website</th>
        <td>
        <input type="text" class="form-control" name="website"/>
        <td>
</tr> 
<tr>
<th>Choose Logo</th>
<td>
<input type="file" name="file" class="form-control" id="chooseFile">
                <!-- <label class="custom-file-label" for="chooseFile">Select file</label> -->
</td>
</tr>  
        <tr>
            <td colspan="2">
                <input type="submit" class="btn btn-primary" value="Submit"/>
            </td>
        </tr>
    </table>
</form>
                            </div>
                        </div>

      
@endsection