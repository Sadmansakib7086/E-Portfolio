<?php
/**
 * Site configuration + content.
 * Edit this file to change text, links, projects, skills, etc.
 */
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

const SITE_NAME   = 'Sadman Sakib';
const SITE_TITLE  = 'Sadman Sakib | CSE Student, Data Science & AI Enthusiast';
const SITE_DESC   = 'Portfolio of Sadman Sakib, a Computer Science & Engineering student at AIUB focused on software, data science and AI.';
const SITE_EMAIL  = 'sadman9205@gmail.com';

// TODO: replace these with your real profile / repository URLs.
const URL_GITHUB   = 'https://github.com/';
const URL_LINKEDIN = 'https://linkedin.com/';

const RESUME_PATH  = 'assets/docs/sadman-sakib-resume.pdf';
const VIDEO_ID     = 'oqDhvmVVuJM'; // YouTube intro video

$nav = ['About', 'Projects', 'Skills', 'Journey', 'Contact'];

$tickerItems = ['Data Science', 'Artificial Intelligence', 'Software Development', 'Visual Storytelling'];

$projects = [
    [
        'number' => '01',
        'class'  => 'project-blue',
        'icon'   => 'code',
        'tags'   => ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL'],
        'title'  => 'ShopEase',
        'text'   => 'A web-based supermarket platform that makes product browsing and everyday online shopping clear and convenient.',
        'url'    => URL_GITHUB, // TODO: link to the ShopEase repo
    ],
    [
        'number' => '02',
        'class'  => 'project-violet',
        'icon'   => 'plus',
        'tags'   => ['Java', 'OOP', 'Logic Design'],
        'title'  => 'Disaster Emergency Guide',
        'text'   => 'An emergency assistance app providing preparedness guidance, first aid instructions, and critical rescue information.',
        'url'    => URL_GITHUB, // TODO: link to the DisasterAid BD repo
    ],
];

$skills = [
    ['Programming',        'Python · C · C++ · Java · C#'],
    ['Data & Databases',   'SQL · MySQL · Power BI · Excel'],
    ['Web Development',    'HTML · CSS · JavaScript · PHP'],
    ['Growing Expertise',  'Machine Learning · AI · Automation'],
];

$timeline = [
    ['Present', 'BSc in Computer Science & Engineering', 'American International University-Bangladesh · CGPA 3.10/4.00', 'Education'],
    ['Active',  'Director & Cinematographer',            'AIUB Film Club · Visual storytelling, camera operations, and creative events', 'Creative'],
    ['Current', 'Executive',                             'Ecorevolution · Sustainability campaigns and environmental awareness initiatives', 'Leadership'],
];

$credentials = [
    [
        'link'  => 'assets/docs/data-structures-certificate.pdf',
        'image' => 'assets/images/data-structures-certificate.png',
        'alt'   => 'Phitron Data Structure and Algorithm certificate',
        'label' => 'Phitron · Recognition',
        'title' => 'Data Structure & Algorithm',
        'text'  => 'Outstanding result',
    ],
    [
        'link'  => 'assets/images/english-olympiad-certificate.jpg',
        'image' => 'assets/images/english-olympiad-certificate.jpg',
        'alt'   => 'National English Olympiad 2018 certificate',
        'label' => 'National · Participation',
        'title' => 'English Olympiad 2018',
        'text'  => 'Trailblazers group',
    ],
];

/** Escape for HTML output. */
function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Slug used for section ids, e.g. "About" -> "about". */
function slug(string $s): string
{
    return strtolower($s);
}

/** Read and clear a one-time flash message. */
function flash(): ?array
{
    $f = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $f;
}

/** CSRF token for the contact form. */
function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}
