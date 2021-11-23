<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use Illuminate\Support\Str;

class DataSuratController extends Controller
{
    public function beranda()
    {
       $arsip = DB::table('data')->get();
       return view('home', compact('arsip'));
    }

    public function about()
    {
        return view('about');
    }

    public function arsipkan()
    {
        return view('arsipkan');
    }

    public function storeArsip(Request $request)
    {
        $file = $request->file('berkas');
        $original = $file->getClientOriginalName();
        $original2 = pathinfo($original, PATHINFO_FILENAME);
        $file_name = Str::slug($original2, "-");

        $namaBerkas = $file_name . '-' . time() . '.' . $file->extension();
        $file->storeAs('public/arsip', $namaBerkas);

        $store = Data::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'nama_berkas' => $namaBerkas,
        ]);

        return redirect()->route('beranda')->with('success', 'Tambah Produk Berhasil');
    }  


    public function hapus(Request $request)
    {
        Data::destroy($request->id);
        return redirect()->back()->with(['success' => 'Data Terkirim']);
    }

    public function lihatArsip($id)
    {
        $arsip = Data::find($id);
        return view('lihat',compact('arsip','id'));
    }

    public function arsipkanUpdate($id)
    {
        $arsip = Data::find($id);
        return view('arsipkan_update',compact('arsip','id'));
    }

    public function storeArsipUpdate(Request $request, $id)
    {
        if($request->hasFile('berkas')){
            $file = $request->file('berkas');
            $original = $file->getClientOriginalName();
            $original2 = pathinfo($original, PATHINFO_FILENAME);
            $file_name = Str::slug($original2, "-");
    
            $namaBerkas = $file_name . '-' . time() . '.' . $file->extension();
            $file->storeAs('public/arsip', $namaBerkas);

            Data::where('id', $id)->update(['nama_berkas' => $namaBerkas]);
        }

        Data::where('id',$id)->update([
            'nomor_surat' => $request->nomor_surat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
        ]);
        return redirect()->route('beranda')->with('success', 'Tambah Produk Berhasil');
    }
}
