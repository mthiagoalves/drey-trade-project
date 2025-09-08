<?php

namespace App\Http\Controllers;

use App\Mail\NewSubscriptionMail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    /**
     * Exporta os dados de inscrição para um arquivo CSV.
     */
    public function export(): StreamedResponse
    {
        $fileName = 'inscricoes-dreytrade.csv';

        $subscriptions = Subscription::all();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        return response()->stream(function () use ($subscriptions) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['ID', 'Nome', 'Email', 'Telefone', 'Data de Inscrição']);

            foreach ($subscriptions as $subscription) {
                fputcsv($file, [
                    $subscription->id,
                    $subscription->name,
                    $subscription->email,
                    $subscription->phone,
                    $subscription->created_at->format('d/m/Y H:i:s')
                ]);
            }
            fclose($file);
        }, 200, $headers);
    }
}
