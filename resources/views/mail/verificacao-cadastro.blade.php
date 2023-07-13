<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de Cadastro - JVCJobs</title>
    <style>
        /* Estilos para o corpo do email */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333333;
        }

        /* Estilos para a área do conteúdo */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 20px;
            color: #333333;
        }

        p {
            margin-bottom: 20px;
        }

        .code-container {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
            font-size: 18px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #337ab7;
            color: #ffffff;
            text-decoration: none;
            border-radius: 3px;
        }
    </style>
</head>
<body>
<div class="container">
    <p>Olá {{ $data['nome'] }},</p>
    <p>Obrigado por se cadastrar no JVCJobs Estamos muito felizes em tê-lo(a) como membro de nossa plataforma.</p>
    <p>Para finalizar o processo de cadastro e garantir a segurança de sua conta, solicitamos que insira o código de acesso abaixo no site do JVCJobs:</p>
    <div class="code-container">
        <strong>Código de acesso: {{ Str::substr($data['codigo_verificacao'], 0, 3) . '-' . Str::substr($data['codigo_verificacao'], 3, 3) }}</strong>
    </div>
    <p>Por favor, siga as instruções abaixo para validar seu cadastro:</p>
    <ol>
        <li>Acesse o site do JVCJobs em <a href="http://www.jvcjobs.com.br">http://www.jvcjobs.com.br</a>.</li>
        <li> Faça login utilizando suas credenciais.</li>
        <li>Insira o código de acesso fornecido acima no campo correspondente.</li>
        <li>Clique no botão "Validar Cadastro".</li>
    </ol>
    <p>Lembre-se de que o código de segurança é válido por 30 minutos. Caso você não valide seu cadastro dentro desse prazo, será necessário solicitar um novo código de segurança.</p>
    <p>Agradecemos por escolher o JVCJobs como seu parceiro na busca por oportunidades de emprego. Se tiver alguma dúvida ou precisar de assistência, nossa equipe de suporte estará pronta para ajudá-lo(a).</p>
    <p>Atenciosamente,<br>Equipe JVCJobs</p>
</div>
</body>
</html>
