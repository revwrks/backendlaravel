<?php

namespace App\Http\Controllers;
use App\Models\jurumodel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class jurucon extends Controller
{
    public function summon()
    {
        $result = jurumodel::all();
        return response()->json($result);
    }
    public function sculpt(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'jenis_buku' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson());
        }
        $create = jurumodel::create([
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'jenis_buku' => $request->jenis_buku,
        ]);
        if ($create) {
            return response()->json(['status' => true, 'message' => 'Sukses menambah data buku.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambah data buku.']);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'judul_buku' => 'required',
            'jenis_buku' => 'required',
            'pengarang' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson());
        }
        $update = jurumodel::where('id_buku', $id)->update([
            'judul_buku' => $request->get('judul_buku'),
            'jenis_buku' => $request->get('jenis_buku'),
            'pengarang' => $request->get('pengarang')
        ]);
        if ($update) {
            return response()->json(['status' => true, 'message' => 'Sukses mengubah data buku.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mengubah data buku.']);
        }
    }

    public function destroy($id)
    {
        $delete = jurumodel::where('id_buku', $id)->delete();
        if ($delete) {
            return response()->json(['status' => true, 'message' => 'Sukses menghapus data buku.']);
        }
        return response()->json(['status' => true, 'message' => 'Gagal menghapus data buku.']);
    }

    public function search($id)
    {
        $result = jurumodel::where('id_buku', '=', $id)->get();
        return response()->json($result);
    }
}
