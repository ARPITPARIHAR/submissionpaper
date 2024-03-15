<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class TwilioController extends Controller
{
    public function receiveWhatsAppMessage(Request $request)
    {
        // Extract the incoming WhatsApp message content
        $incomingMessage = $request->input('Body');
        $fromNumber = $request->input('From');

        // Process the incoming message and generate an auto-reply
        $responseMessage = $this->generateAutoReply($incomingMessage);

        // Send the auto-reply message
        $this->sendWhatsAppMessage($fromNumber, $responseMessage);

        // Respond to Twilio to acknowledge the message
        return response('Message sent', 200);
    }

    protected function generateAutoReply($incomingMessage)
    {
        // Add your logic to generate an auto-reply based on the incoming message
        // For example, you can create switch cases or conditional statements to determine the response.

        switch (strtolower($incomingMessage)) {
            case 'hello':
                return 'Hello! This is an automated reply.';
            case 'help':
                return 'Here is some help information...';
            default:
                return 'I did not understand your message.';
        }
    }

    protected function sendWhatsAppMessage($toNumber, $message)
    {
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');

        $twilio = new Client($sid, $token);

        $message = $twilio->messages->create(
            "whatsapp:$toNumber",
            [
                'from' => 'whatsapp:YOUR_TWILIO_PHONE_NUMBER',
                'body' => $message,
            ]
        );

        return $message->sid;
    }
}