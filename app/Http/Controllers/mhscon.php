<?php

namespace App\Http\Controllers;

use App\Models\mhsmodel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class mhscon extends Controller
{
    public function summon()
    {
        $dt_mahasiswa=mhsmodel::get();
        return response()->json($dt_mahasiswa);
    }

    public function search($id)
    {
        $dt_mahasiswa=mhsmodel::where('id','=',$id)->get();
        return response()->json($dt_mahasiswa);
    }

    public function sculpt(Request $req){
        $validate = Validator::make($req->all(),[
            'nama'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = mhsmodel::create([
            'nama'=>$req->nama,
            'alamat'=>$req->alamat,
            'jenis_kelamin'=>$req->jenis_kelamin,
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data mahasiswa.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal menambah data mahasiswa.']);
        }
}

public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson());
        }
        $update = mhsmodel::where('id', $id)->update([
            'nama' => $request->get('nama'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'alamat' => $request->get('alamat')
        ]);
        if ($update) {
            return response()->json(['status' => true, 'message' => 'Sukses mengubah data mahasiswa.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mengubah data mahasiswa.']);
        }
    }

    public function destroy($id)
    {
        $delete = mhsmodel::where('id', $id)->delete();
        if ($delete) {
            return response()->json(['status' => true, 'message' => 'Sukses menghapus data mahasiswa.']);
        }
        return response()->json(['status' => true, 'message' => 'Gagal menghapus data mahasiswa.']);
    }
}