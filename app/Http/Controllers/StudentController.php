<?php

namespace App\Http\Controllers;

 // Pastikan model ini dieja dengan benar, huruf kapital untuk nama class
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::all(); // Model harus menggunakan huruf kapital
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'kelas' => 'required',
    ]);

    // Simpan data siswa
    Student::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'kelas' => $request->kelas,
    ]);

    return redirect()->route('index')->with('success', 'Siswa berhasil ditambahkan.');
}
    

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Cari data siswa berdasarkan id
    $student = Student::findOrFail($id);
    return view('edit', compact('student'));
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'kelas' => 'required',
    ]);

    // Cari data siswa dan update
    $student = Student::findOrFail($id);
    $student->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'kelas' => $request->kelas,
    ]);

    return redirect()->route('index')->with('success', 'Data siswa berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('index')->with('success', 'Siswa berhasil dihapus.');
}

}
