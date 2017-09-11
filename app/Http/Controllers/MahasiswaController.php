<?php
namespace App\Http\Controllers;

use App\Mahasiswa;
use Auth;
use Excel;
use Illuminate\Http\Request;
use Session;
use Validator;
use View;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $angkatan  = $request->angkatan;
        $mahasiswa = Mahasiswa::where('angkatan', 'LIKE', '%' . $angkatan . '%')->orderBy('nim', 'DESC')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nim'           => 'required|integer|unique:mahasiswas',
            'asal_sekolah'  => 'required',
            'jenis_kelamin' => 'required',
            'ipk_smt_1'     => 'required|regex:/^\d*(\.\d{2})?$/',
            'ipk_smt_2'     => 'required|regex:/^\d*(\.\d{2})?$/',
            'ipk_smt_3'     => 'regex:/^\d*(\.\d{2})?$/',
            'ipk_smt_4'     => 'regex:/^\d*(\.\d{2})?$/',
            'ipk_smt_5'     => 'regex:/^\d*(\.\d{2})?$/',
            'ipk_smt_6'     => 'regex:/^\d*(\.\d{2})?$/',
            'angkatan'      => 'required',
        ]);
        $data            = $request->all();
        $data['user_id'] = Auth::user()->id;
        $mahasiswa       = Mahasiswa::create($data);
        Session::flash("flash_notification", [
            "level"   => "info",
            "message" => "Berhasil menambahkan <strong>$mahasiswa->nim</strong>",
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit')->with(compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($data);
        Session::flash("flash_notification", [
            "level"   => "info",
            "message" => "Berhasil menambahkan <strong>$mahasiswa->nim</strong>",
        ]);
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa->delete($request->all())) {
            return redirect()->back();
        }

        // handle hapus mahasiswa via ajax
        if ($request->ajax()) {
            return response()->json(['id' => $id]);
        }

        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Mahasiswa berhasil dihapus",
        ]);

        return redirect()->route('mahasiswa.index');
    }

    public function transaksi()
    {
        $mahasiswa = Mahasiswa::where('angkatan', '<', 2013)->get();
        foreach ($mahasiswa->chunk(1000) as $chunk) {
            foreach ($chunk as $value) {
                $total = $value->total;
                $laki  = $value->laki;
                $per   = $value->per;
            }

        }
        return view('mahasiswa.transaksi', compact('mahasiswa', 'total', 'laki', 'per'));
    }

    public function importExcel(Request $request)
    {
        // validasi untuk memastikan file yang diupload adalah excel
        $this->validate($request, ['excel' => 'required|mimes:xls,xlsx']);
        // ambil file yang baru diupload
        $excel = $request->file('excel');
        // baca sheet pertama
        $excels = Excel::selectSheetsByIndex(0)->load($excel, function ($reader) {
            // options, jika ada
        })->get();
        // rule untuk validasi setiap row pada file excel
        $rowRules = [
            'nim'           => 'required|unique:mahasiswas',
            'asal_sekolah'  => 'required',
            'jenis_kelamin' => 'required',
            'ipk_smt_1'     => 'required',
            'ipk_smt_2'     => 'required',
            'ipk_smt_3'     => 'required',
            'ipk_smt_4'     => 'required',
            'ipk_smt_5'     => 'required',
            'ipk_smt_6'     => 'required',
            'angkatan'      => 'required',
        ];
        // Catat semua id mahasiswa baru
        // ID ini kita butuhkan untuk menghitung total mahasiswa yang berhasil diimport
        $mahasiswa_id = [];
        // looping setiap baris, mulai dari baris ke 2 (karena baris ke 1 adalah nama kolom)
        foreach ($excels as $row) {
            // Membuat validasi untuk row di excel
            // Disini kita ubah baris yang sedang di proses menjadi array
            $validator = Validator::make($row->toArray(), $rowRules);
            // Skip baris ini jika tidak valid, langsung ke baris selanjutnya
            if ($validator->fails()) {
                continue;
            }
            // Syntax dibawah dieksekusi jika baris excel ini valid
            $mahasiswa = Mahasiswa::create([
                'user_id'       => Auth::user()->id,
                'nim'           => $row['nim'],
                'asal_sekolah'  => $row['asal_sekolah'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'ipk_smt_1'     => $row['ipk_smt_1'],
                'ipk_smt_2'     => $row['ipk_smt_2'],
                'ipk_smt_3'     => $row['ipk_smt_3'],
                'ipk_smt_4'     => $row['ipk_smt_4'],
                'ipk_smt_5'     => $row['ipk_smt_5'],
                'ipk_smt_6'     => $row['ipk_smt_6'],
                'angkatan'      => $row['angkatan'],
                'tgl_kelulusan' => $row['tgl_kelulusan'],
            ]);
            // catat id dari mahasiswa yang baru dibuat
            array_push($mahasiswa_id, $mahasiswa->id);
        }
        // Ambil semua mahasiswa yang baru dibuat
        $mahasiswa = Mahasiswa::whereIn('id', $mahasiswa_id)->get();
        // redirect ke form jika tidak ada mahasiswa yang berhasil diimport
        if ($mahasiswa->count() == 0) {
            Session::flash("flash_notification", [
                "level"   => "danger",
                "message" => "Tidak ada mahasiswa yang berhasil diimport.",
            ]);
            return redirect()->back();
        }
        // set feedback
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil mengimport <strong>" . $mahasiswa->count() . "</strong> mahasiswa.",
        ]);
        // Tampilkan index buku
        return view('mahasiswa.import-review')->with(compact('mahasiswa'));
    }

    public function hapusSemua(Request $request)
    {
        $ids       = $request->ids;
        $mahasiswa = Mahasiswa::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Mahasiswa berhasil dihapus"]);
    }

    public function training()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.training', compact('mahasiswa'));
    }

    public function prediksi12(Request $request)
    {
        $angkatan  = $request->angkatan;
        $mahasiswa = Mahasiswa::where('angkatan', array($angkatan))
            ->orderBy('nim')
            ->get();
        return view('mahasiswa.prediksi12', compact('mahasiswa', 'angkatan'));
    }

    public function prediksi123(Request $request)
    {
        $angkatan  = $request->angkatan;
        $mahasiswa = Mahasiswa::where('angkatan', array($angkatan))
            ->where('ipk_smt_3', '>', 0)
            ->orderBy('nim')
            ->get();
        return view('mahasiswa.prediksi123', compact('mahasiswa', 'angkatan'));
    }

    public function prediksi1234(Request $request)
    {
        $angkatan  = $request->angkatan;
        $mahasiswa = Mahasiswa::where('angkatan', array($angkatan))
            ->where('ipk_smt_3', '>', 0)
            ->where('ipk_smt_4', '>', 0)
            ->orderBy('nim')
            ->get();
        return view('mahasiswa.prediksi1234', compact('mahasiswa', 'angkatan'));
    }

    public function prediksi123456(Request $request)
    {
        $angkatan  = $request->angkatan;
        $mahasiswa = Mahasiswa::where('angkatan', array($angkatan))
            ->where('ipk_smt_3', '>', 0)
            ->where('ipk_smt_4', '>', 0)
            ->where('ipk_smt_5', '>', 0)
            ->where('ipk_smt_6', '>', 0)
            ->orderBy('nim')->toSql();
        return $mahasiswa;
        // ->get();
        return view('mahasiswa.prediksi123456', compact('mahasiswa', 'angkatan'));
    }

    public function export12(Request $request)
    {
        $mahasiswa = Mahasiswa::orderBy('nim')->get();
        Excel::create('Hasil Prediksi', function ($excel) use ($mahasiswa) {
            // Set property
            $excel->setTitle('Hasil Prediksi')
                ->setCreator(Auth::user()->name);
            $excel->sheet('Hasil Prediksi', function ($sheet) use ($mahasiswa) {
                $row = 1;
                $sheet->row($row, [
                    'Nim',
                    'Asal Sekolah',
                    'Jenis Kelamin',
                    'IPK Semester 1',
                    'IPK Semester 2',
                    'Hasil Uji',
                ]);
                foreach ($mahasiswa as $m) {
                    $sheet->row(++$row, [
                        $m->nim,
                        $m->asal_sekolah,
                        $m->jenis_kelamin,
                        $m->ipk_smt_1,
                        $m->ipk_smt_2,
                        $m->prediksi12,
                    ]);
                }
            });
        })->export('xls');
    }

    public function export13(Request $request)
    {
        $mahasiswa = Mahasiswa::orderBy('nim')->get();
        Excel::create('Hasil Prediksi', function ($excel) use ($mahasiswa) {
            // Set property
            $excel->setTitle('Hasil Prediksi')
                ->setCreator(Auth::user()->name);
            $excel->sheet('Hasil Prediksi', function ($sheet) use ($mahasiswa) {
                $row = 1;
                $sheet->row($row, [
                    'Nim',
                    'Asal Sekolah',
                    'Jenis Kelamin',
                    'IPK Semester 1',
                    'IPK Semester 2',
                    'IPK Semester 3',
                    'Hasil Uji',
                ]);
                foreach ($mahasiswa as $m) {
                    $sheet->row(++$row, [
                        $m->nim,
                        $m->asal_sekolah,
                        $m->jenis_kelamin,
                        $m->ipk_smt_1,
                        $m->ipk_smt_2,
                        $m->ipk_smt_3,
                        $m->prediksi13,
                    ]);
                }
            });
        })->export('xls');
    }

    public function export14(Request $request)
    {
        $mahasiswa = Mahasiswa::orderBy('nim')->get();
        Excel::create('Hasil Prediksi', function ($excel) use ($mahasiswa) {
            // Set property
            $excel->setTitle('Hasil Prediksi')
                ->setCreator(Auth::user()->name);
            $excel->sheet('Hasil Prediksi', function ($sheet) use ($mahasiswa) {
                $row = 1;
                $sheet->row($row, [
                    'Nim',
                    'Asal Sekolah',
                    'Jenis Kelamin',
                    'IPK Semester 1',
                    'IPK Semester 2',
                    'IPK Semester 3',
                    'IPK Semester 4',
                    'Hasil Uji',
                ]);
                foreach ($mahasiswa as $m) {
                    $sheet->row(++$row, [
                        $m->nim,
                        $m->asal_sekolah,
                        $m->jenis_kelamin,
                        $m->ipk_smt_1,
                        $m->ipk_smt_2,
                        $m->ipk_smt_3,
                        $m->ipk_smt_4,
                        $m->prediksi14,
                    ]);
                }
            });
        })->export('xls');
    }
}
