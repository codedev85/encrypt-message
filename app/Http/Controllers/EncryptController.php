<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encrypt;
use Pikirasa;

class EncryptController extends Controller
{
    //

    public function store(Request $request){

        $rsa = new Pikirasa\RSA('path/to/public.pem', 'path/to/private.pem');
        $encrypted = $rsa->encrypt($this->validateRequest());
        $decrypted = $rsa->decrypt($encrypted);
        var_dump($decrypted);
        Encrypt::create($this->validateRequest());
        return back();

    }


    private function validateRequest(){

        return  request()->validate([
             'encrypt'=> 'required|min:3',
         ]);

     }
}
