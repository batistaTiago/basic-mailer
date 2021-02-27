<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {

        $mail_data = $request->only([
            'name',
            'email',
            'phoneNumber',
            'subject',
            'messageBody',
        ]);
        
        $mailable = new ContactMail($mail_data);

        try {
            $res = Mail::to('ekyidag@gmail.com')->send($mailable);
            return  response()->json([
                'success' => true,
                'message' => 'Email enviado com sucesso!'
            ]);
        } catch (\Throwable $e) {
            return  response()->json([
                'success' => false,
                'message' => 'Houve um erro ao enviar o email, por favor tente novamente mais tarde!'
            ]);
        }


    }
}
