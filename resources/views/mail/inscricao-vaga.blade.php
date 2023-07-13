<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de Inscrição na Vaga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333333;
        }
        h2 {
            color: #007bff;
        }
        ol {
            padding-left: 20px;
        }
    </style>
</head>
<body>
<div style="max-width: 600px; margin: 0 auto;">
    <h2>Confirmação de Inscrição na Vaga</h2>
    <p>Olá {{ $data['nome'] }},</p>
    <p>Parabéns! Você confirmou a sua inscrição. </p>
    <p>A seguir, estão os detalhes da vaga na qual você se candidatou:</p>
    <ul>
        <li><strong>Vaga:</strong>{{ $data['nome_vaga'] }} </li>
        <li><strong>Local:</strong> {{ $data['local_vaga'] }}</li>

    </ul>
    <p>Continue acompanhando o nosso sistema para receber atualizações sobre o processo seletivo. Desejamos muito sucesso em sua jornada profissional!</p>
    <p>Em caso de dúvidas ou necessidade de mais informações, entre em contato conosco através do email <a href="mailto:[Inserir endereço de contato]">[Inserir endereço de contato]</a>.</p>
    <p>Atenciosamente,</p>
    <p>Atenciosamente,<br>Equipe JVCJobs</p>
</div>
</body>
</html>
