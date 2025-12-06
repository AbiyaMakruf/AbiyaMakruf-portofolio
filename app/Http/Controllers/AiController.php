<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function ask(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:500',
        ]);

        $question = $request->input('question');

        // Read CV Context from file
        $cvPath = base_path('readme/cv.txt');
        $cvContent = file_exists($cvPath) ? file_get_contents($cvPath) : '';

        $apiKey = config('services.gemini.api_key');

        if (!$apiKey) {
            return response()->json(['error' => 'AI Service Unavailable'], 503);
        }

        $systemInstruction = <<<PROMPT
You are an AI assistant for Abiya Makruf's portfolio website.

INSTRUCTIONS:
- Answer the user's question based ONLY on the CV context provided.
- If the answer is not in the CV, politely say you don't have that information.
- Answer in the first person as "Abiya's AI Assistant".
- Keep answers concise and professional.
- Format the response in clear markdown with short paragraphs and bullet lists where helpful.
PROMPT;

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-goog-api-key' => $apiKey,
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent", [
                'system_instruction' => [
                    'role' => 'system',
                    'parts' => [
                        ['text' => $systemInstruction]
                    ],
                ],
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => "CV CONTEXT:\n{$cvContent}"],
                            ['text' => "USER QUESTION:\n{$question}"],
                        ]
                    ]
                ]
            ]);

            $data = $response->json();

            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                return response()->json($data);
            } else {
                return response()->json(['error' => 'No response from AI'], 500);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function beautifyProjectDescription(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:8000',
        ]);

        $text = $request->input('text');
        $apiKey = config('services.gemini.api_key');

        if (!$apiKey) {
            return response()->json(['error' => 'AI Service Unavailable'], 503);
        }

        $systemInstruction = <<<PROMPT
You are an assistant that rewrites project descriptions into clean, well-structured Markdown.
Rules:
- Keep all factual content; do not invent details.
- Organize into short paragraphs, bullets, and subheadings where helpful.
- Use concise wording; prefer active voice.
- Always add sprinkle fitting emojis sparingly when they add clarity or tone.
- Return MARKDOWN ONLY (no extra explanations).
PROMPT;

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-goog-api-key' => $apiKey,
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent", [
                'system_instruction' => [
                    'role' => 'system',
                    'parts' => [
                        ['text' => $systemInstruction],
                    ],
                ],
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => "Rewrite the following project description into markdown:\n\n{$text}"],
                        ],
                    ],
                ],
            ]);

            $data = $response->json();
            $markdown = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if ($markdown) {
                return response()->json(['markdown' => $markdown]);
            }

            return response()->json(['error' => 'No response from AI'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
