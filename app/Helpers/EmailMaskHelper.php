<?php

function maskEmail($email) {
    $parts = explode('@', $email);
    $localPart = $parts[0];
    $domain = $parts[1];
    $localLength = strlen($localPart);
    $maskedLocal = substr($localPart, 0, 3) . str_repeat('*', $localLength - 1) . substr($localPart, -1);
    $domainParts = explode('.', $domain);
    $maskedDomain = '';
    foreach ($domainParts as $i => $part) {
        if ($i === 0) {
            $maskedDomain .= str_repeat('*', strlen($part));
        } else {
            $maskedDomain .= '.' . $part;
        }
    }
    return $maskedLocal . '@' . $maskedDomain;
}
