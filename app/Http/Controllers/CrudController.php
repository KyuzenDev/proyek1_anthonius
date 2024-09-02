<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function addUsers(Request $request)
    {
        // Validasi input
        $validated = $request->validate([   
            'nama_siswa' => 'required|string|max:50',
            'jurusan' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required|string',
        ]);

        // Buat user baru
        $user = new User();
        $user->nama_siswa = $validated['nama_siswa'];
        $user->jurusan = $validated['jurusan'];
        $user->jk = $validated['jk'];
        $user->agama = $validated['agama'];
        $user->alamat = $validated['alamat'];
        $user->save();

        return redirect('admin/pages')->with('success', 'Data Siswa baru berhasil ditambahkan...');
    }

    public function listUsers(Request $request){
        $data['getRecord'] = User::getRecord();
        return view('pages.crud', $data);
    }
    public function deleteUser($id)
    {
        // Temukan user berdasarkan ID
        $user = User::find($id);

        // Cek apakah user ditemukan dan bukan admin
        if ($user) {
            // Hapus user
            $user->delete();
            // Redirect kembali dengan pesan sukses
            return redirect()->back()->with('success', 'Data Siswa berhasil dihapus.');
        }

        // Jika user adalah admin atau tidak ditemukan, berikan pesan error
        return redirect()->back()->with('error', 'Data Siswa tidak ditemukan.');
    }
}

