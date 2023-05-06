<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Student;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StudentController extends Controller
{
    public function viewStudent()
    {
        $dataM = Student::get();
        return view('student-list', compact('dataM'));
    }

    public function addStudent()
    {
        $dataS = Kelas::get();
        return view('student-add', compact('dataS'));
    }

    public function saveStudent(Request $request)
    {
        $request->validate([
            'nama_murid' => 'required',
            'kelompok_belajar' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nama_orangtua' => 'required',
            'kebutuhan_khusus' => 'required',
        ]);

        $studentID = IdGenerator::generate(['table' => 'students', 'field' => 'studentID', 'length' => 10, 'prefix' => 'STD']);
        $nama_murid = $request->nama_murid;
        $kelompok_belajar = $request->kelompok_belajar;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $alamat = $request->alamat;
        $nama_orangtua = $request->nama_orangtua;
        $kebutuhan_khusus = $request->kebutuhan_khusus;

        $mrd = new Student();
        $mrd->studentID = $studentID;
        $mrd->nama_murid = $nama_murid;
        $mrd->kelompok_belajar = $kelompok_belajar;
        $mrd->tempat_lahir = $tempat_lahir;
        $mrd->tanggal_lahir = $tanggal_lahir;
        $mrd->alamat = $alamat;
        $mrd->nama_orangtua = $nama_orangtua;
        $mrd->kebutuhan_khusus = $kebutuhan_khusus;
        $mrd->save();

        return redirect('/admin/daftar-murid')->with('success', 'Berhasil menambahkan Murid');
    }

    public function editStudent($studentID)
    {
        $dataM = Student::where('studentID', $studentID)->first();
        return view('student-edit', compact('dataM'));
    }

    public function updateStudent(Request $request)
    {
        $request->validate([
            'studentID' => 'required',
            'nama_murid' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nama_orangtua' => 'required',
            'kebutuhan_khusus' => 'required',
        ]);

        $studentID = $request->studentID;
        $nama_murid = $request->nama_murid;
        $tanggal_lahir = $request->tanggal_lahir;
        $alamat = $request->alamat;
        $nama_orangtua = $request->nama_orangtua;
        $kebutuhan_khusus = $request->kebutuhan_khusus;

        Student::where('studentID', $studentID)->update([
            'studentID' => $studentID,
            'nama_murid' => $nama_murid,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'nama_orangtua' => $nama_orangtua,
            'kebutuhan_khusus' => $kebutuhan_khusus,
        ]);

        return redirect('/admin/daftar-murid')->with('success', 'Berhasil mengubah');
    }

    public function deleteStudent($studentID)
    {
        $dataM = Student::where('studentID', '=', $studentID)->delete();
        return redirect('/admin/daftar-murid')->with('success', 'Berhasil menghapus murid');
    }
}
