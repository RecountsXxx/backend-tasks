<?php

$subscription_key = '834a0f43d82d425285311e4041dd876b';
$endpoint = 'https://step-pv111.cognitiveservices.azure.com/';

function azure_text_analytics($method, $url, $data = false)
{
    $api_url = $GLOBALS['endpoint'] . $url;

    $headers = [
        'Content-Type: application/json',
        'Ocp-Apim-Subscription-Key: ' . $GLOBALS['subscription_key'],
    ];

    $options = [
        CURLOPT_URL            => $api_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => $headers,
    ];

    if ($data) {
        $options[CURLOPT_POSTFIELDS] = json_encode($data);
    }

    $ch = curl_init();
    curl_setopt_array($ch, $options);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }

    curl_close($ch);

    return json_decode($response, true);
}

$text = "This is an example text that we want to analyze. It contains a variety of words and sentences in English. The goal is to see if the Text Analytics API can accurately detect the language of this text.";

$data = [
    'documents' => [
        ['id' => '1', 'language' => 'en', 'text' => $text],
    ],
];

$result = azure_text_analytics('POST', '/text/analytics/v3.0/languages', $data);

if (isset($result['documents']) && is_array($result['documents'])) {
    foreach ($result['documents'] as $document) {
        if (isset($document['detectedLanguage'])) {
            echo "Language detected: " . $document['detectedLanguage']['name'] . "\n";
            echo "ISO 639-1 Code: " . $document['detectedLanguage']['iso6391Name'] . "\n";
            echo "Confidence Score: " . $document['detectedLanguage']['confidenceScore'] . "\n";
        } else {
            echo "Error: Detected language information not available\n";
        }
    }
} else {
    echo "Error: Unable to process documents\n";
}

