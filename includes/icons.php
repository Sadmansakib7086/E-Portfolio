<?php
/** Inline SVG icons. Usage: echo icon('arrow', 18); */
function icon(string $name, int $size = 18): string
{
    $s = $size;
    $paths = [
        'arrow'    => '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'download' => '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v12m0 0 4-4m-4 4-4-4M5 21h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'code'     => '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m8 9-3 3 3 3m8-6 3 3-3 3m-2-9-4 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'plus'     => '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v18M3 12h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
        'github'   => '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-3.16 19.49c.5.09.68-.22.68-.48v-1.87c-2.78.6-3.37-1.18-3.37-1.18-.45-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.9 1.53 2.35 1.09 2.92.83.09-.65.35-1.09.64-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.64 0 0 .84-.27 2.75 1.02A9.6 9.6 0 0 1 12 6.82a9.6 9.6 0 0 1 2.5.34c1.91-1.29 2.75-1.02 2.75-1.02.55 1.37.2 2.39.1 2.64.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.86v2.76c0 .27.18.58.69.48A10 10 0 0 0 12 2Z"/></svg>',
        'linkedin' => '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.5 8.25H3.25V20H6.5V8.25ZM4.88 3A1.88 1.88 0 1 0 4.9 6.75 1.88 1.88 0 0 0 4.88 3ZM20.75 13.26c0-3.54-1.89-5.19-4.41-5.19-2.03 0-2.94 1.12-3.45 1.9V8.25H9.64V20h3.25v-5.82c0-1.54.29-3.03 2.2-3.03 1.88 0 1.9 1.76 1.9 3.13V20h3.25l.51-6.74Z"/></svg>',
        'mail'     => '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16v12H4V6Zm0 1 8 6 8-6" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>',
    ];
    return isset($paths[$name]) ? sprintf($paths[$name], $s) : '';
}
