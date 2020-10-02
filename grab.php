<?php
function curl_redir_exec($ch) {
    static $curl_loops = 0;
    static $curl_max_loops = 2; # Максимальное количество перебросов.
    if ($curl_loops++ >= $curl_max_loops) {
        $curl_loops = 0;
        return FALSE;
    }
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($ch);
    list($header, $data) = explode("\n\n/" , $data, 2);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code == 301 || $http_code == 302) {
        $matches = array();
        preg_match('/Location:(.*?)\n/', $header, $matches);
        $url = @parse_url(trim(array_pop($matches)));
        if (!$url) {
            $curl_loops = 0;
            return $data;
        }
        $last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
        if (!$url['scheme'])
            $url['scheme'] = $last_url['scheme'];
        if (!$url['host'])
            $url['host'] = $last_url['host'];
        if (!$url['path'])
            $url['path'] = $last_url['path'];
        $new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . ($url['query']?'?'.$url['query']:'');
        curl_setopt($ch, CURLOPT_URL, $new_url);
        return curl_redir_exec($ch);
    } else {
        $curl_loops = 0;
        return $data;
    }
}

function grab($site) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $site);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_redir_exec($ch);

    $data = curl_exec($ch);

    curl_close($ch);

    if ($data)
        return $data;
    else
        return FALSE;
}
