<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Company::orderByDesc('id')->get();
        return view('companies.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'email'=>'required',
            'website'=>'required',
            'file' => 'required|mimes:jpg,png,jpeg,gif,jfif|max:2048'
        ]);
        $data=new Company;
        $data->title=$request->title;
        $data->email=$request->email;
        $data->website=$request->website;
        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $data->name = time().'_'.$request->file->getClientOriginalExtension();
            $data->file_path = '/storage/' . $filePath;
            
        }
        $data->save();
        return redirect('company/create')->with('msg','Data has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Company::find($id);
        return view('companies.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Company::find($id);
        return view('companies.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            'email'=>'required',
            'website'=>'required',
            // 'file' => 'required|mimes:jpg,png,jpeg,gif,jfif|max:2048'
        ]);
        $data=Company::find($id);
        $data->title=$request->title;
        $data->email=$request->email;
        $data->website=$request->website;
        // if($request->file()) {
        //     $fileName = time().'_'.$request->file->getClientOriginalName();
        //     $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        //     $data->name = time().'_'.$request->file->getClientOriginalExtension();
        //     $data->file_path = '/storage/' . $filePath;
            
        // }
        $data->save();
        return redirect('company/'.$id.'/edit')->with('msg','Data has been updated');
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
        Company::where('id',$id)->delete();
        return redirect('company');
    }

//     public function fileUpload(Request $req){
//         $req->validate([
//         'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
//         ]);

//         $fileModel = new C;

//         if($req->file()) {
//             $fileName = time().'_'.$req->file->getClientOriginalName();
//             $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

//             $fileModel->name = time().'_'.$req->file->getClientOriginalName();
//             $fileModel->file_path = '/storage/' . $filePath;
//             $fileModel->save();

//             return back()
//             ->with('success','File has been uploaded.')
//             ->with('file', $fileName);
//         }
//    }
}
