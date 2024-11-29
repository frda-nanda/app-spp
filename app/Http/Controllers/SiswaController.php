<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::paginate(5);
        return view('siswa.index', compact('siswa'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelass = Kelas::all();
        $spps = Spp::all();
        return view('siswa.create', compact('kelass','spps'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            $siswa = Siswa::create([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'nama' => $request->nama,
                'id_kelas' => $request->id_kelas,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'id_spp' => $request->id_spp,
                
            ]);
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
    
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelasList = Kelas::all();
        $sppList = Spp::all();
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa', 'sppList', 'kelasList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $siswa = Siswa::find($id);
            $siswa->nisn = $request->nisn;
            $siswa->nis = $request->nis;
            $siswa->nama = $request->nama;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->alamat = $request->alamat;
            $siswa->no_telp = $request->no_telp;
            $siswa->id_spp = $request->id_spp;
        
            $siswa->save();
        
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
        
        return redirect('siswa')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();
            return redirect()->route('siswa.index')->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}