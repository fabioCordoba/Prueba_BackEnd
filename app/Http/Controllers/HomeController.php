<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
use Carbon\Carbon;
use Session;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posters=DB::table('post')
        ->join('users','post.id_user','users.id')
        ->select('post.id','post.id_user','post.comentario','post.fecha','post.foto','users.id as idUser','users.name as nomUser')
        ->get();
        $reversed = $posters->reverse();
        return view('home',compact('reversed'));
    }

    public function Publicar(Request $request){
        Validator::make($request->all(), [
            'comentario' => 'required',
        ], [
            'comentario.required' => 'Debes postear un comentario',
        ])->validate();
        DB::beginTransaction();
        $now = Carbon::now();
        try {
            if($request->idPost==''){
                if($request->file('Foto')){
                    $path = Storage::disk('public')->put('images',$request->file('Foto'));
                    //$post->fill(['foto' => asset($path)])->save();
                }else{
                    $path = NULL;
                }
                $id= DB::table('post')->insertGetId([
                    'id_user'=>$request->iduser,
                    'comentario'=>$request->comentario,
                    'foto'=>$path,
                    'fecha'=>$now
                    ]);
                $res = ['ope'=>'0', 'msg'=>'Post Publicado con exito', 'estado'=>true , 'id'=>$id];
            }else{
                DB::table('post')->where('id',$request->idPost)->update([
                    'id_user'=>$request->iduser,
                    'comentario'=>$request->comentario,
                    'foto'=>$request->Foto,
                    'fecha'=>$now
                    ]);
                $res = ['ope'=>'1', 'msg'=>'Post Publicado con exito', 'estado'=>true]; 

            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $res = ['msg'=>$e->getMessage(), 'estado'=>false];
        }
        return $res;
    }
}
