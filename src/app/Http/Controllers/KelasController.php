<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\isiKelas;
use App\Models\isiKelasGuru;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KelasController extends Controller
{
    public function viewClass()
    {
        $data = Kelas::get();
        //return $data;
        return view('class-list', compact('data'));
    }

    public function viewTheClass($kelasID)
    {
        $class = Kelas::where('kelasID', $kelasID)->get();
        $cname = Student::get();
        $murid = isiKelas::get();
        $guru = isiKelasGuru::get();
        $teacher = Teacher::get();
        return view('class-view', compact('class', 'cname', 'murid', 'guru', 'teacher'));
    }

    public function saveAddMurid(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'murid' => 'required'
        ]);

        $kelas_id = $request->kelas_id;
        $murid = $request->murid;

        $addMurid = new isiKelas();
        $addMurid->kelas_id = $kelas_id;
        $addMurid->murid = $murid;
        $addMurid->save();

        //dd($request->all());
        return redirect('/admin/kelas/{kelasID}')->with('success', 'Berhasil menambahkan data');
    }

    public function saveAddGuru(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'guru_toClass' => 'required'
        ]);

        $kelas_id = $request->kelas_id;
        $guru = $request->guru_toClass;

        $addGuru = new isiKelasGuru();
        $addGuru->kelas_id = $kelas_id;
        $addGuru->guru = $guru;
        $addGuru->save();

        return redirect('/admin/kelas/{kelasID}')->with('success', 'Berhasil menambahkan data');
    }

    public function addClass()
    {
        return view('class-add');
    }

    public function saveClass(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'jumlah_murid' => 'required',
            'jumlah_pengajar' => 'required'
        ]);

        $kelasID = IdGenerator::generate(['table' => 'kelas', 'field' => 'kelasID', 'length' => 10, 'prefix' => 'KLS']);
        $nama_kelas = $request->nama_kelas;
        $jumlah_murid = $request->jumlah_murid;
        $jumlah_pengajar = $request->jumlah_pengajar;

        $cls = new kelas();
        $cls->kelasID = $kelasID;
        $cls->nama_kelas = $nama_kelas;
        $cls->jumlah_murid = $jumlah_murid;
        $cls->jumlah_pengajar = $jumlah_pengajar;
        $cls->save();

        return redirect('/admin/daftar-kelas')->with('success', 'Berhasil menambahkan kelas');
    }

    public function editClass($kelasID)
    {
        $data = Kelas::where('kelasID', $kelasID)->first();
        return view('class-edit', compact('data'));
    }

    public function updateClass(Request $request)
    {
        $request->validate([
            'kelasID' => 'required',
            'nama_kelas' => 'required',
            'jumlah_murid' => 'required',
            'jumlah_pengajar' => 'required'
        ]);

        $kelasID = $request->kelasID;
        $nama_kelas = $request->nama_kelas;
        $jumlah_murid = $request->jumlah_murid;
        $jumlah_pengajar = $request->jumlah_pengajar;

        Kelas::where('kelasID', $kelasID)->update([
            'kelasID' => $kelasID,
            'nama_kelas' => $nama_kelas,
            'jumlah_murid' => $jumlah_murid,
            'jumlah_pengajar' => $jumlah_pengajar
        ]);

        return redirect('/admin/daftar-kelas')->with('success', 'Berhasil mengubah data kelas');
    }

    public function deleteClass($kelasID)
    {
        Kelas::where('kelasID', '=', $kelasID)->delete();
        return redirect('/admin/daftar-kelas')->with('success', 'Berhasil menghapus kelas');
    }
}
