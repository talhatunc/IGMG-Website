<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'nullable|string|max:20',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            Member::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->tel,
                'message' => $request->message ?: $request->v_message, // Handle both potential inputs
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Başvurunuz başarıyla alındı. En kısa sürede sizinle iletişime geçeceğiz.'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz.'
            ], 500);
        }
    }
}
