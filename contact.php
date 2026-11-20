<?php
/**
 * Contact form handler.
 * - Validates input (CSRF token, honeypot, rate limit, field checks)
 * - Saves every message to storage/messages.log
 * - Also tries to send an email with mail() (needs a configured mail server;
 *   on a default XAMPP the message is still saved to the log file)
 */
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

/** Character length that works even if the mbstring extension is disabled. */
function len(string $s): int
{
    return function_exists('mb_strlen') ? mb_strlen($s) : (preg_match_all('/./su', $s) ?: strlen($s));
}

function back(string $type, string $message, array $old = []): never
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    if ($old) {
        $_SESSION['old'] = $old;
    }
    header('Location: index.php#contact');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact');
    exit;
}

// Honeypot: bots fill hidden fields. Pretend success.
if (!empty($_POST['website'])) {
    back('success', 'Thanks! Your message has been sent.');
}

if (!hash_equals($_SESSION['csrf'] ?? '', (string)($_POST['csrf'] ?? ''))) {
    back('error', 'Your session expired. Please try again.');
}

// Simple rate limit: one message every 30 seconds per session.
if (time() - (int)($_SESSION['last_sent'] ?? 0) < 30) {
    back('error', 'Please wait a moment before sending another message.');
}

$name    = trim((string)($_POST['name'] ?? ''));
$email   = trim((string)($_POST['email'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$old     = ['name' => $name, 'email' => $email, 'message' => $message];

if ($name === '' || len($name) > 100) {
    back('error', 'Please enter your name (max 100 characters).', $old);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || len($email) > 150) {
    back('error', 'Please enter a valid email address.', $old);
}
if (len($message) < 10 || len($message) > 3000) {
    back('error', 'Your message should be between 10 and 3000 characters.', $old);
}

// 1) Save to log (reliable on local XAMPP)
$dir = __DIR__ . '/storage';
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}
$entry = json_encode([
    'time'    => date('c'),
    'name'    => $name,
    'email'   => $email,
    'message' => $message,
    'ip'      => $_SERVER['REMOTE_ADDR'] ?? '',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$saved = file_put_contents($dir . '/messages.log', $entry . PHP_EOL, FILE_APPEND | LOCK_EX) !== false;

// 2) Try to email (header injection safe: newlines stripped from name/email)
$safeName  = preg_replace('/[\r\n]+/', ' ', $name);
$safeEmail = preg_replace('/[\r\n]+/', '', $email);
$subject   = 'Portfolio contact from ' . $safeName;
$body      = "Name: $safeName\nEmail: $safeEmail\n\n$message\n";
$headers   = "From: " . SITE_NAME . " <no-reply@" . ($_SERVER['SERVER_NAME'] ?? 'localhost') . ">\r\n"
           . "Reply-To: $safeEmail\r\n"
           . "Content-Type: text/plain; charset=UTF-8\r\n";
$mailed = @mail(SITE_EMAIL, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers);

if ($saved || $mailed) {
    $_SESSION['last_sent'] = time();
    unset($_SESSION['csrf']);
    back('success', 'Thanks! Your message has been sent.');
}

back('error', 'Sorry, something went wrong. Please email me directly instead.', $old);
