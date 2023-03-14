<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $cek = Auth::attempt([
            'username' => $username, 
            'password' => $password
        ]);
        
        if ($cek) {
            return redirect('/dashboard');
        }else{
            $msg = 'Username atau Password Salah!';
            return redirect('/')->with('msg', $msg);
        }
    }

    public function registrasi(Request $request)
    {
        $register = array(
                        'nik'       => $request->nik,
                        'nama'      => $request->nama,
                        'telp'      => $request->telp,
                    );

        if ($register['nik'] == '') {
            $level = 'admin';
        }else{
            $level = 'masyarakat';
        }

        $user = User::create([
                'name' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'level' => $level,
                'no_telp' => $request->telp
            ]);
        if($user['level'] == 'masyarakat'){
            Masyarakat::create($register);
        }

        if($user){
            $msg = 'Registrasi Akun Berhasil! Silahkan Masuk Halaman Login.';
            return redirect('/register')->with('msg', $msg);
        }else{
            $msg = 'Registrasi Akun Gagal! Silahkan Coba Lagi.';
            return redirect('/register')->with('msg', $msg);
        }
    }

    public function dashboard()
    {
        $masyarakat = Masyarakat::paginate(5);
        $datapengaduan = Pengaduan::join('masyarakat','masyarakat.nik', '=', 'pengaduan.nik')->orderBy('pengaduan.tgl_pengaduan','ASC')->where('pengaduan.data_state',0)->paginate(5);

        $nonvalid = Pengaduan::where('status',null)->where('data_state',0)->count();
        $valid    = Pengaduan::where('status','0')->where('data_state',0)->count();
        $proses   = Pengaduan::where('status','proses')->where('data_state',0)->count();
        $selesai  = Pengaduan::where('status','selesai')->where('data_state',0)->count();

        return view('content.dashboard', compact('nonvalid','valid','proses','selesai','masyarakat','datapengaduan'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
