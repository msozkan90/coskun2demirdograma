<?php

namespace App\Http\Controllers;

use App\Http\Requests\mailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class mailController extends Controller
{
    public function send(){
        Mail::send('mail.contact', array('key' => 'value'), function($message)
        {
            $message->to('coskun2demirdograma@gmail.com', 'Coskun2')->subject('Welcome!');
        });
    }
    public function MailPost(mailRequest $request){
        $body = $request['message'];
        $details = [
            'name' =>  $request['name'],
            'email' =>  $request['email'],
            'message' =>  $request['message'],
            'surname' =>  $request['surname'],
            'body' => $body,
        ];
        $all = $request->except('_token','terms');
        $insert = \App\Models\mail::create($all);
        $c=\Mail::to('coskun2demirdograma@gmail.com')->send(new \App\Mail\MyTestMail($details));
        if($insert){
            return redirect()->back()->with('status-success','Mesajınız Başarılı Bir Şekilde Gönderildi.');
        }
        else{
            return redirect()->back()->with('status-danger','Bir Hata Oluştu');

        }
    }
}
