<?php

namespace App\Http\Controllers\sekte;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = SuratMasuk::query();

       // Filter No Surat
    if ($request->filled('no_surat')) {
        $query->where('no_surat', 'like', '%' . $request->no_surat . '%');
    }

    // Filter tgl_surat antara tgl_awal dan tgl_akhir
    if ($request->filled('tgl_awal') && $request->filled('tgl_akhir')) {
        $query->whereBetween('tgl_surat', [$request->tgl_awal, $request->tgl_akhir]);
    }

    $data = $query->latest()->paginate(10);

        return view('pages.sekretaris.suratmasuk.laporan', compact('data'));
    }

    public function laporan(Request $request)
    {
        $query = SuratKeluar::query();

        // Filter No Surat
    if ($request->filled('no_surat')) {
        $query->where('no_surat', 'like', '%' . $request->no_surat . '%');
    }

    // Filter tgl_surat antara tgl_awal dan tgl_akhir
    if ($request->filled('tgl_awal') && $request->filled('tgl_akhir')) {
        $query->whereBetween('tgl_surat', [$request->tgl_awal, $request->tgl_akhir]);
    }

    $data = $query->latest()->paginate(10);

        return view('pages.sekretaris.suratkeluar.laporan', compact('data'));
    }

    public function exportPDF()
    {
        $laporan = SuratMasuk::all();

        $pdf = Pdf::loadView('pages.sekretaris.suratmasuk.export_all', compact('laporan'));
        return $pdf->download('data_laporan_Masuk.pdf');
    }
    public function exportPDFOut()
    {
        $laporan = SuratKeluar::all();

        $pdf = Pdf::loadView('pages.sekretaris.suratkeluar.export_all', compact('laporan'));
        return $pdf->download('data_laporan_Keluar.pdf');
    }


    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        return redirect()->route('sekretaris.laporan')->with('success', 'Data laporan berhasil dihapus');
    }
}
