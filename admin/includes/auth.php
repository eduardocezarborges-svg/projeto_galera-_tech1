<?php

// Abre tag PHP | todo código PHP deve iniciar com <?php

declare(strict_types=1);

// Ativa tipagem estrita no PHP.
// Faz o PHP respeitar exatamente os tipos declarados.
// Exemplo:
// function soma(int $a) {}
// soma("5") → gera erro em vez de converter automaticamente.



if (session_status() === PHP_SESSION_NONE) {

    // session_status() verifica estado atual da sessão.
    //
    // PHP_SESSION_NONE:
    // significa que nenhuma sessão foi iniciada ainda.
    //
    // === faz comparação estrita:
    // compara valor + tipo.

    session_start();

    // Inicia sessão PHP.
    //
    // Sessões permitem armazenar dados do usuário no servidor.
    //
    // Exemplo:
    // $_SESSION['admin_id']
    //
    // Muito usado em:
    // - login
    // - autenticação
    // - carrinho
    // - permissões
}



// ======================================
// VERIFICA SE ADMIN ESTÁ LOGADO
// ======================================

function admin_logged_in(): bool
{

    // function cria função reutilizável.
    //
    // : bool
    // define que a função obrigatoriamente retorna boolean:
    // true ou false.

    return !empty($_SESSION['admin_id']);

    // $_SESSION['admin_id']
    // verifica se existe ID salvo na sessão.
    //
    // empty()
    // verifica se valor está vazio.
    //
    // !empty()
    // significa:
    // "não está vazio".
    //
    // Retorna:
    // true → admin logado
    // false → não logado
}



// ======================================
// EXIGE LOGIN ADMIN
// ======================================

function require_admin(): void
{

    // : void
    // significa que função NÃO retorna valor.

    if (!admin_logged_in()) {

        // Chama função criada anteriormente.
        //
        // ! inverte resultado.
        //
        // Se NÃO estiver logado:

        header('Location: login.php');

        // header()
        // envia cabeçalho HTTP.
        //
        // Location:
        // faz redirecionamento automático.
        //
        // Usuário será enviado para login.php

        exit;

        // Interrompe execução imediatamente.
        //
        // Muito importante após header().
        //
        // Evita execução do restante da página.
    }
}



// ======================================
// GERA TOKEN CSRF
// ======================================

function csrf_token(): string
{

    // Retorna token CSRF como string.

    if (empty($_SESSION['csrf_token'])) {

        // Verifica se token ainda não existe.

        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // random_bytes(32)
        // gera 32 bytes criptograficamente seguros.
        //
        // bin2hex()
        // converte bytes binários em hexadecimal.
        //
        // Resultado:
        // token aleatório seguro.
        //
        // Exemplo:
        // a8f91b2c7d...
    }

    return $_SESSION['csrf_token'];

    // Retorna token armazenado na sessão.
}



// ======================================
// VALIDA TOKEN CSRF
// ======================================

function csrf_check(): void
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // $_SERVER
        // array superglobal com dados da requisição.
        //
        // REQUEST_METHOD:
        // método HTTP usado.
        //
        // POST:
        // formulário enviado.

        $token = $_POST['csrf_token'] ?? '';

        // $_POST:
        // dados enviados via formulário POST.
        //
        // ?? é operador null coalescing.
        //
        // Significa:
        // se csrf_token existir → usa valor
        // senão → usa string vazia

        if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {

            // hash_equals()
            // compara strings de forma segura.
            //
            // Protege contra timing attacks.
            //
            // Muito mais seguro que:
            // ==
            // ===
            //
            // Compara:
            // token da sessão
            // VS
            // token enviado formulário

            exit('Token de segurança inválido.');

            // Interrompe execução mostrando mensagem.
            //
            // Se token estiver errado:
            // requisição é bloqueada.
        }
    }
}