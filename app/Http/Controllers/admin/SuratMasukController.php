<?php

namespace App\Http\Controllers\admin;

use App\Models\Laporan;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SuratMasukRequest;
use App\Http\Requests\SuratKeluarRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $suratmasuk = SuratMasuk::when($search, function ($query, $search) {
            $query->where('no_surat', 'like', "%{$search}%")
                ->orWhere('nama_surat', 'like', "%{$search}%");
        })->latest()->paginate(10)->withQueryString();

        return view('pages.admin.suratmasuk.index', compact('suratmasuk'));
    }

    public function create()
    {
        $nosurat = 'SM' . rand(1000, 9999);
        return view('pages.admin.suratmasuk.create', ['nosurat' => $nosurat]);
    }

    public function store(SuratMasukRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('file')) {
                $file      = $request->file('file');
                $fileName  = time() . '-' . $file->getClientOriginalName();
                $filePath  = $file->storeAs('surat-masuk', $fileName, 'public');
            }

            $suratmasuk = SuratMasuk::create([
                'no_surat'     => $validated['no_surat'],
                'nama_surat'     => $validated['nama_surat'],
                'tgl_surat'    => $validated['tgl_surat'],
                'tgl_diterima'  => $validated['tgl_diterima'],
                'asal'       => $validated['asal'],
                'perihal'      => $validated['perihal'],
                'status'       => $validated['status'],
                'file'         => $filePath ?? null,
                'user_id'      => $validated['user_id'] ?? Auth::id(),
            ]);

            Laporan::create([
                'user_id'         => Auth::id(),
                'jenis_surat'     => 'masuk',
                'tgl_surat_masuk' => now(),
                'keterangan'      => 'Surat masuk ditambahkan',
                'file'         => $filePath ?? null,
            ]);

            return redirect()->route('admin.surat-masuk.index')->with('success', 'Surat berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan surat keluar: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan surat.']);
            // dd($e->getMessage());
        }
    }

    public  function edit($no_surat)
    {
        $data = SuratMasuk::where('no_surat', $no_surat)->firstOrFail();

        return view('pages.admin.suratmasuk.edit', compact('data'));
    }

    public function update(SuratMasukRequest $request, $no_surat)
    {
        $suratmasuk = SuratMasuk::where('no_surat', $no_surat)->firstOrFail();

        $validated = $request->validated();

        if ($request->hasFile('file')) {
            if ($suratmasuk->file && Storage::disk('public')->exists($suratmasuk->file)) {
                Storage::disk('public')->delete($suratmasuk->file);
            }

            $file = $request->file('file');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $validated['file'] = $file->storeAs('surat-masuk', $fileName, 'public');
        }

        $suratmasuk->update($validated);

        return redirect()->route('admin.surat-masuk.index')->with('success', 'Data berhasil diperbarui.');
        // dd($suratmasuk);
    }



    public function destroy($no_surat)
    {
        $suratmasuk = SuratMasuk::where('no_surat', $no_surat)->firstOrFail();

        if ($suratmasuk->file && Storage::disk('public')->exists($suratmasuk->file)) {
            Storage::disk('public')->delete($suratmasuk->file);
        }

        $suratmasuk->delete();

        return redirect()->route('admin.surat-masuk.index')->with('success', 'Data berhasil dihapus.');
    }

    public function exportPDF($no_surat)
    {
        $suratmasuk = SuratMasuk::where('no_surat', $no_surat)->firstOrFail();

        $pdf = Pdf::loadView('pages.admin.suratmasuk.export', compact('suratmasuk', 'no_surat'));
        return $pdf->download('data_surat-masuk.pdf');
    }

    public function updateStatus(Request $request, $no_surat)
    {
        $request->validate([
            'status' => 'required|in:diterima,dibatalkan',
        ]);

        $surat = SuratMasuk::where('no_surat', $no_surat)->firstOrFail();
        $surat->status = $request->status;
        $surat->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }
}
