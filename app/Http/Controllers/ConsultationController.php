<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Swift_Mailer;
use Swift_SmtpTransport;

class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        $request->merge(['created_at' => now('UTC')]);

        $save = Consultation::create($request->all());

        $data = [
            'message' => $request->message
        ];

        try {
            Mail::send('email.consultation', $data, function ($message) {
                $message->subject('Website Contact Form');
                $message->from('webnoreply@perfectcompanion.com', 'no-reply');
                $message->to('webnoreply@perfectcompanion.com');
            });
        } catch (\Throwable $e) {
            DB::table('log_email')->insert([
                'message' => json_encode(['message1' => $e->getMessage(), 'message2' => $e->getTraceAsString()]),
                'from' => 'contact',
                'created_at' => now('UTC')
            ]);
        }

        if ($save) {
            return redirect()->to(url('/contact'));
        } else {
            return redirect()->to(url('/contact'));
        }
    }

    public function subscribe(Request $request)
    {
        $request->merge(['created_at' => now('UTC')]);

        Subscribe::create($request->all());

        $data = [
            'email' => $request->email
        ];

        try {
            Mail::send('email.subscribe', $data, function ($message) {
                $message->subject('Subscribe Email');
                $message->from('webnoreply@perfectcompanion.com', 'no-reply');
                $message->to('webnoreply@perfectcompanion.com');
            });
        } catch (\Throwable $e) {
            DB::table('log_email')->insert([
                'message' => json_encode(['message1' => $e->getMessage(), 'message2' => $e->getTraceAsString()]),
                'from' => 'subscribe',
                'created_at' => now('UTC')
            ]);
        }

        return redirect()->to(url('/'));
    }
}
