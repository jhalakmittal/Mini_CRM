<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
  
    public function index()
    {
        //
        $data=Employee::orderByDesc('id')->get();
        return view('employee.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Company::orderByDesc('id')->get();
        return view('employee.create',['companies'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
            'status'=>'required'

        ]);
        // $photo=$request->file('photo');
        // $renamePhoto=time().$photo->getClientOriginalExtension();
        // $dest=public_path('/images');
        // $photo->move($dest,$renamePhoto);

        

        $data=new Employee;
        //  if($request->hasfile('photo')){
        //     // $img=$request->file('photo');
        //     // $photoName=time().$img->getClientOriginalExtension();
        //     // // $dest=public_path('/images');
        //     // $img->move('/images',$photoName);

        //     $fileName = time().'_'.$req->file->getClientOriginalName();
        //     $filePath = $req->file('photo')->storeAs('uploads', $fileName, 'public');

        //     $fileModel->name = time().'_'.$req->file->getClientOriginalName();
        //     $fileModel->file_path = '/storage/' . $filePath;
        // }
        $data->company_id=$request->select_company;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $data->phone_no=$request->phone_no;

       
        // $data->photo=$renamePhoto;
        $data->status=$request->status;
        $data->save();
        return redirect('employee/create')->with('msg','Data has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Employee::find($id);
        return view('employee.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies=Company::orderByDesc('id')->get();
        $data=Employee::find($id);
        return view('employee.edit',['companies'=>$companies,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
            'status'=>'required'

        ]);
        $data=Employee::find($id);
        
        $data->company_id=$request->select_company;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $data->phone_no=$request->phone_no;

       
        // $data->photo=$renamePhoto;
        $data->status=$request->status;
        $data->save();
        return redirect('employee/'.$id.'/edit')->with('msg','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Employee::where('id',$id)->delete();
        return redirect('employee');
    }
}
