<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\formSurat;
use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SuratController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Surat',
        ];

        $page = (object) [
            'title' => 'Mengelola Surat'
        ];

        $activeMenu = 'Surat';

        $surats = Surat::with('warga')->get();

        return view('rw.surat.index', compact('breadcrumb', 'page', 'activeMenu', 'surats'));
    }

    public function list()
    {
        $surat = Surat::with('warga')
            ->select('surat.id_surat', 'surat.jenis_surat', 'surat.tanggal_surat', 'surat.keterangan', 'warga.nama', 'warga.nik')
            ->join('warga', 'surat.nik_warga', '=', 'warga.nik');

        return DataTables::of($surat)
            ->addIndexColumn()
            ->addColumn('aksi', function ($surat) {
                return '<form class="d-inline-block" method="POST" action="' . route('rw.surat.destroy', $surat->id_surat) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function listForm()
    {
        $formSurat = formSurat::select('id', 'judul', 'deskripsi');

        return DataTables::of($formSurat)
            ->addIndexColumn()
            ->addColumn('aksi', function ($formSurat) {
                return '
                <a href="' . route('rw.surat.editForm', $formSurat->id) . '" class="btn btn-warning btn-sm" style="width: 40px; height: 40px; margin-right: 5px;">
                    <i class="fas fa-edit"></i>
                </a>
                <form class="d-inline-block" method="POST" action="' . route('rw.surat.deleteForm', $formSurat->id) . '">
                    ' . csrf_field() . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini?\');">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Pengajuan Surat',
        ];
        $activeMenu = 'pengajuan_surat';
        $wargas = Warga::all();

        return view('rw.surat.create', compact('breadcrumb', 'activeMenu', 'wargas'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'nik_warga' => 'required',
            'keterangan' => 'nullable',
        ]);

        // Buat data surat baru
        $surat = Surat::create([
            'jenis_surat' => $request->jenis_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'nik_warga' => $request->nik_warga,
            'keterangan' => $request->keterangan,
        ]);

        // Cek apakah surat berhasil dibuat
        if ($surat->wasRecentlyCreated) {
            return redirect()->route('rw.surat.index')->with('success', 'Pengajuan surat berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan pengajuan surat.');
        }
    }

    public function createForm()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Form Surat',
        ];
        $activeMenu = 'pengajuan_surat';

        return view('rw.form_surat.create', compact('breadcrumb', 'activeMenu'));
    }

    public function storeForm(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_path' => 'required|file|mimes:pdf,doc,docx',
        ]);

        // Handle the file upload
        $originalFileName = $request->file('file_path')->getClientOriginalName();
        $path = $request->file('file_path')->storeAs('form_surat_files', $originalFileName, 'public');

        formSurat::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $path,
        ]);

        return redirect()->route('rw.surat.index')->with('success', 'Formulir surat berhasil ditambahkan');
    }


    public function editForm($id)
    {
        $formSurat = formSurat::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Edit Form Surat',
        ];
        $activeMenu = 'pengajuan_surat';

        return view('rw.form_surat.edit', compact('formSurat', 'breadcrumb', 'activeMenu'));
    }

    public function updateForm(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $formSurat = formSurat::findOrFail($id);

        // Handle the file upload if there is a new file
        if ($request->hasFile('file_path')) {
            // Delete the old file
            if ($formSurat->file_path) {
                Storage::disk('public')->delete($formSurat->file_path);
            }

            // Store the new file
            $originalFileName = $request->file('file_path')->getClientOriginalName();
            $path = $request->file('file_path')->storeAs('form_surat_files', $originalFileName, 'public');
        } else {
            // Keep the existing file path if no new file is uploaded
            $path = $formSurat->file_path;
        }

        $formSurat->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $path,
        ]);

        return redirect()->route('rw.surat.index')->with('success', 'Formulir surat berhasil diperbarui');
    }


    public function deleteForm($id)
    {
        $formSurat = formSurat::findOrFail($id);

        // Delete the file if exists
        if ($formSurat->file_path) {
            Storage::disk('public')->delete($formSurat->file_path);
        }

        $formSurat->delete();

        return redirect()->back()->with('success', 'Surat berhasil dihapus.');
    }



    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();

        return redirect()->back()->with('success', 'Surat berhasil dihapus.');
    }
}
