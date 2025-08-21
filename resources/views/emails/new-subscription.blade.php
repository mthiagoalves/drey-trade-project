<!DOCTYPE html>
<html>

<head>
    <title>Nova Inscrição Recebida</title>
</head>

<body style="font-family: Arial, sans-serif; color: #333;">
    <h1 style="color: #0B1D26;">Nova Inscrição Recebida</h1>
    <p>Você recebeu uma nova inscrição através do site Drey Trade.</p>
    <hr>
    <p><strong>Nome:</strong> {{ $subscription->name }}</p>
    <p><strong>E-mail:</strong> {{ $subscription->email }}</p>
    <p><strong>Telefone:</strong> {{ $subscription->phone ?? 'Não informado' }}</p>
    <hr>
    <p>Este e-mail foi enviado em {{ $subscription->created_at->format('d/m/Y \à\s H:i') }}.</p>
</body>

</html>
