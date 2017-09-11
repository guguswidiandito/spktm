<?php
namespace App\Http\Controllers;

use App\Mahasiswa;
use Auth;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(Request $request)
    {
        if (Auth::guest()) {
            $q         = $request->nim;
            $mahasiswa = Mahasiswa::where('nim', array($q))->get();
            return view('welcome', compact('mahasiswa'));
        } else {
            $jml1  = collect([' 0.00-2.3375', ' 2.3375-2.845', ' 2.845-3.3525', ' 3.3525-4.00']);
            $jml2  = collect([' 0.00-2.3735', ' 2.3725-2.855', ' 2.855-3.3375', ' 3.3375-4.00']);
            $jml3  = collect([' 0.00-2.6175', ' 2.6175-3.025', ' 3.025-3.4325', ' 3.4325-4.00']);
            $jml4  = collect([' 0.00-2.7125', ' 2.7125-3.13', ' 3.13-3.48', ' 3.48-4.00']);
            $int1  = Mahasiswa::whereBetween('ipk_smt_1', array(0.00, 2.3375))->count();
            $int2  = Mahasiswa::whereBetween('ipk_smt_1', array(2.3376, 2.845))->count();
            $int3  = Mahasiswa::whereBetween('ipk_smt_1', array(2.846, 3.3525))->count();
            $int4  = Mahasiswa::whereBetween('ipk_smt_1', array(3.3525, 4.00))->count();
            $int12 = Mahasiswa::whereBetween('ipk_smt_2', array(0.00, 2.3725))->count();
            $int22 = Mahasiswa::whereBetween('ipk_smt_2', array(2.3726, 2.855))->count();
            $int32 = Mahasiswa::whereBetween('ipk_smt_2', array(2.856, 3.3375))->count();
            $int42 = Mahasiswa::whereBetween('ipk_smt_2', array(3.3375, 4.00))->count();
            $int13 = Mahasiswa::whereBetween('ipk_smt_3', array(0.00, 2.6175))->count();
            $int23 = Mahasiswa::whereBetween('ipk_smt_3', array(2.6176, 3.025))->count();
            $int33 = Mahasiswa::whereBetween('ipk_smt_3', array(3.026, 3.4325))->count();
            $int43 = Mahasiswa::whereBetween('ipk_smt_3', array(3.4326, 4.00))->count();
            $int14 = Mahasiswa::whereBetween('ipk_smt_4', array(0.00, 2.7125))->count();
            $int24 = Mahasiswa::whereBetween('ipk_smt_4', array(2.7126, 3.13))->count();
            $int34 = Mahasiswa::whereBetween('ipk_smt_4', array(3.14, 3.48))->count();
            $int44 = Mahasiswa::whereBetween('ipk_smt_4', array(3.49, 4.00))->count();
            $com   = collect([$int1, $int2, $int3, $int4]);
            $com2  = collect([$int12, $int22, $int32, $int42]);
            $com3  = collect([$int13, $int23, $int33, $int43]);
            $com4  = collect([$int14, $int24, $int34, $int44]);
            return view('home', compact('jml1', 'jml2', 'jml3', 'jml4', 'com', 'com2', 'com3', 'com4'));
        }
    }

    public function lihat($id)
    {
        if (Auth::guest()) {
            $mahasiswa = Mahasiswa::find($id);
            return view('mahasiswa.lihat', compact('mahasiswa'));
        } else {
            $jml1  = collect([' 0.00-2.3375', ' 2.3375-2.845', ' 2.845-3.3525', ' 3.3525-4.00']);
            $jml2  = collect([' 0.00-2.3735', ' 2.3725-2.855', ' 2.855-3.3375', ' 3.3375-4.00']);
            $jml3  = collect([' 0.00-2.6175', ' 2.6175-3.025', ' 3.025-3.4325', ' 3.4325-4.00']);
            $jml4  = collect([' 0.00-2.7125', ' 2.7125-3.13', ' 3.13-3.48', ' 3.48-4.00']);
            $int1  = Mahasiswa::whereBetween('ipk_smt_1', array(0.00, 2.3375))->count();
            $int2  = Mahasiswa::whereBetween('ipk_smt_1', array(2.3376, 2.845))->count();
            $int3  = Mahasiswa::whereBetween('ipk_smt_1', array(2.846, 3.3525))->count();
            $int4  = Mahasiswa::whereBetween('ipk_smt_1', array(3.3525, 4.00))->count();
            $int12 = Mahasiswa::whereBetween('ipk_smt_2', array(0.00, 2.3725))->count();
            $int22 = Mahasiswa::whereBetween('ipk_smt_2', array(2.3726, 2.855))->count();
            $int32 = Mahasiswa::whereBetween('ipk_smt_2', array(2.856, 3.3375))->count();
            $int42 = Mahasiswa::whereBetween('ipk_smt_2', array(3.3375, 4.00))->count();
            $int13 = Mahasiswa::whereBetween('ipk_smt_3', array(0.00, 2.6175))->count();
            $int23 = Mahasiswa::whereBetween('ipk_smt_3', array(2.6176, 3.025))->count();
            $int33 = Mahasiswa::whereBetween('ipk_smt_3', array(3.026, 3.4325))->count();
            $int43 = Mahasiswa::whereBetween('ipk_smt_3', array(3.4326, 4.00))->count();
            $int14 = Mahasiswa::whereBetween('ipk_smt_4', array(0.00, 2.7125))->count();
            $int24 = Mahasiswa::whereBetween('ipk_smt_4', array(2.7126, 3.13))->count();
            $int34 = Mahasiswa::whereBetween('ipk_smt_4', array(3.14, 3.48))->count();
            $int44 = Mahasiswa::whereBetween('ipk_smt_4', array(3.49, 4.00))->count();
            $com   = collect([$int1, $int2, $int3, $int4]);
            $com2  = collect([$int12, $int22, $int32, $int42]);
            $com3  = collect([$int13, $int23, $int33, $int43]);
            $com4  = collect([$int14, $int24, $int34, $int44]);
            return view('home', compact('jml1', 'jml2', 'jml3', 'jml4', 'com', 'com2', 'com3', 'com4'));
        }
    }
}
