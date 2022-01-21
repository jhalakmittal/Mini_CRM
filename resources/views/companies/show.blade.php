@extends('layout')
@section('title','View Company')
@section('content')
<div class="card mb-4 mt-5">
<div class="card-header">
    <i class="fas fa-table me-1"></i>
    View Company
    <a href="{{url('company')}}" class="float-end btn-sm btn-success">View All</a>
</div>
<div class="card-body">
    
   
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <td>
                {{$data->title}}
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td>
                {{$data->email}}
            </td>
        </tr>
        <tr>
            <th>Website</th>
            <td>
                {{$data->website}}
            </td>
        </tr>
        
    </table>

                            </div>
                        </div>

      
@endsection