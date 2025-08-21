<?php

namespace App\Http\Controllers;

use App\Mail\NewSubscriptionMail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
        ]);

        $subscription = Subscription::create($validatedData);

        Mail::to('comercial@dreytrade.com')->send(new NewSubscriptionMail($subscription));

        Log::info('Nova inscrição recebida:', $validatedData);

        return Redirect::back();
    }
}
