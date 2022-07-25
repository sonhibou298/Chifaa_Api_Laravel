<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'genre' => $request->input('genre'),
            'telephone' => $request->input('telephone'),
            'dateNaissance' => $request->input('dateNaissance'),
            'email' => $request->input('email'),
            'password' =>Hash::make($request->input('email')),
            'status' => $request->input('status'),
            'profil' => $request->input('profil'),
            'role_id' => $request->input('role_id'),
        ]);


        $response = [
            'user'=>$user,
        ];
        return response($response, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json([
            'success'=> 'Utilisateur modifié avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'message' => 'Utilisateur supprimé'
        ]);
    }

    public function search($prenom)
    {
        return User::where('prenom', 'like' , '%'.$prenom.'%')->get();
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return response([
                'message'=>'Login ou mot de passe incorrect'
            ], \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();
        return response()->json([
            'message' => 'Connexion reussie'
        ]);
    }

//    public function login(Request $request)
//    {
//        $fields = $request->validate([
//           'email' => 'required|string',
//            'password' => 'required|string'
//        ]);
//
//        $user = User::where('email', $fields['email'])->first();
//
//        if (!$user || !Hash::check($fields['password'], $user->password))
//        {
//            return response([
//                'message' => 'Connected'
//            ], 401);
//        }
//
//        $token = $user->createToken('myapptoken')->plainTextToken;
//        $response = [
//            'user'=>$user,
//            'token' => $token
//        ];
//        return response($response, 201);
//    }

//    public function login(Request $request)
//    {
//        try {
//            $validateUser = Validator::make($request->all(),
//                [
//                    'email' => 'required|email',
//                    'password' => 'required'
//                ]);
//
//            if($validateUser->fails()){
//                return response()->json([
//                    'status' => false,
//                    'message' => 'validation error',
//                    'errors' => $validateUser->errors()
//                ], 401);
//            }
//
//            if(!Auth::attempt($request->only(['email', 'password']))){
//                return response()->json([
//                    'status' => false,
//                    'message' => 'Email & Password does not match with our record.',
//                ], 401);
//            }
//
//            $user = User::where('email', $request->email)->first();
//
//            return response()->json([
//                'status' => true,
//                'message' => 'User Logged In Successfully',
//                'token' => $user->createToken("API TOKEN")->plainTextToken
//            ], 200);
//
//        } catch (\Throwable $th) {
//            return response()->json([
//                'status' => false,
//                'message' => $th->getMessage()
//            ], 500);
//        }
//    }
}
