<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\jenisPenilaian;
use App\Models\Kelas;
use App\Models\penilaian;
use App\Models\penilaianBulanan;
use App\Models\tingkatPenilaian;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TeacherController extends Controller
{
    public function viewTeacher()
    {
        $dataT = Teacher::get();
        //return $dataT;
        return view('teacher-list', compact('dataT'));
    }

    public function addTeacher()
    {
        $dataK = Kelas::get();
        return view('teacher-add', compact('dataK'));
    }

    public function saveTeacher(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'alamat_guru' => 'required',
            'email_guru' => 'required',
            'noTelp_guru' => 'required',
            'kelas' => 'required',
        ]);

        $teacherID = IdGenerator::generate(['table' => 'teachers', 'field' => 'teacherID', 'length' => 10, 'prefix' => 'TCR']);
        $nama_guru = $request->nama_guru;
        $alamat_guru = $request->alamat_guru;
        $email_guru = $request->email_guru;
        $noTelp_guru = $request->noTelp_guru;
        $kelas = $request->kelas;

        $tch = new Teacher();
        $tch->teacherID = $teacherID;
        $tch->nama_guru = $nama_guru;
        $tch->alamat_guru = $alamat_guru;
        $tch->email_guru = $email_guru;
        $tch->noTelp_guru = $noTelp_guru;
        $tch->kelas = $kelas;
        $tch->save();

        return redirect('/admin/daftar-guru')->with('success', 'Berhasil menambahkan guru');
    }

    public function editTeacher($teacherID)
    {
        $dataT = Teacher::where('teacherID', $teacherID)->first();
        return view('teacher-edit', compact('dataT'));
    }

    public function updateTeacher(Request $request)
    {
        $request->validate([
            'teacherID' => 'required',
            'nama_guru' => 'required',
            'alamat_guru' => 'required',
            'email_guru' => 'required',
            'noTelp_guru' => 'required',
        ]);

        $teacherID = $request->teacherID;
        $nama_guru = $request->nama_guru;
        $alamat_guru = $request->alamat_guru;
        $email_guru = $request->email_guru;
        $noTelp_guru = $request->noTelp_guru;

        Teacher::where('teacherID', $teacherID)->update([
            'teacherID' => $teacherID,
            'nama_guru' => $nama_guru,
            'alamat_guru' => $alamat_guru,
            'email_guru' => $email_guru,
            'noTelp_guru' => $noTelp_guru
        ]);

        return redirect('/admin/daftar-guru')->with('success', 'Berhasil mengubah data guru');
    }

    public function deleteTeacher($teacherID)
    {
        Teacher::where('teacherID', '=', $teacherID)->delete();
        return redirect('/admin/daftar-guru')->with('success', 'Berhasil menghapus guru');
    }

    public function reportHome()
    {
        $dataM = Student::get();
        return view('student-reportlist', compact('dataM'));
    }

    public function createReport($studentID)
    {
        $dataM = Student::where('studentID', $studentID)->get();
        $data_nilai = jenisPenilaian::all();
        $tingkat_nilai = tingkatPenilaian::all();

        return view('create-report', compact('dataM', 'data_nilai', 'tingkat_nilai'));
    }

    public function saveReport(Request $request)
    {
        // dd($request->all());
        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->nama_murid . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $newName);
        }
        $request['foto'] = $newName;

        penilaian::create($request->all());

        return redirect('/teacher/buat-laporan-harian')->with('success', 'Berhasil menyimpan penilaian');
    }

    public function monthlyReportHome()
    {
        $dataM = Student::get();
        return view('student-reportlist-month', compact('dataM'));
    }

    public function createMonthlyReport($studentID)
    {
        $dataM = Student::where('studentID', $studentID)->get();
        $nilai = jenisPenilaian::all();
        $date = Carbon::now()->isoFormat('MMMM Y');
        return view('create-report-month', compact('dataM', 'date', 'nilai'));
    }

    public function saveMonthlyReport(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_murid' => 'required',
            'kelompok_belajar' => 'required',
            'bulan_penilaian' => 'required',
            'kategori_penilaian1' => 'required',
            'tingkat_penilaian1' => 'required',
            'kategori_penilaian2' => 'required',
            'tingkat_penilaian2' => 'required',
            'kategori_penilaian3' => 'required',
            'tingkat_penilaian3' => 'required',
            // 'kategori_penilaian4' => 'required',
            // 'tingkat_penilaian4' => 'required',
            // 'kategori_penilaian5' => 'required',
            // 'tingkat_penilaian5' => 'required',
            'catatan' => 'required'
        ]);

        $penilaianBulanan_id = IdGenerator::generate(['table' => 'penilaian_bulanan', 'field' => 'penilaianBulanan_id', 'length' => 10, 'prefix' => 'PB']);
        $nama_murid = $request->nama_murid;
        $kelompok_belajar = $request->kelompok_belajar;
        $bulan_penilaian = $request->bulan_penilaian;
        $kategori_penilaian1 = $request->kategori_penilaian1;
        $tingkat_penilaian1 = $request->tingkat_penilaian1;
        $kategori_penilaian2 = $request->kategori_penilaian2;
        $tingkat_penilaian2 = $request->tingkat_penilaian2;
        $kategori_penilaian3 = $request->kategori_penilaian3;
        $tingkat_penilaian3 = $request->tingkat_penilaian3;
        $catatan = $request->catatan;

        $pb = new penilaianBulanan();
        $pb->penilaianBulanan_id = $penilaianBulanan_id;
        $pb->nama_murid = $nama_murid;
        $pb->kelompok_belajar = $kelompok_belajar;
        $pb->bulan_penilaian = $bulan_penilaian;
        $pb->kategori_penilaian1 = $kategori_penilaian1;
        $pb->tingkat_penilaian1 = $tingkat_penilaian1;
        $pb->kategori_penilaian2 = $kategori_penilaian2;
        $pb->tingkat_penilaian2 = $tingkat_penilaian2;
        $pb->kategori_penilaian3 = $kategori_penilaian3;
        $pb->tingkat_penilaian3 = $tingkat_penilaian3;
        $pb->catatan = $catatan;

        $pb->save();

        return redirect('/teacher/buat-laporan-bulanan')->with('success', 'Berhasil menyimpan penilaian');

        // if (count($request->kategori_penilaian1) && count($request->tingkat_penilaian1)== 0) {
        //     foreach($request->kategori_penilaian1 as $kategori_nilai){
        //         $request->
        //     }
        // }


    }
}
