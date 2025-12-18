<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'new');
        $members = Member::where('status', $status)->orderBy('created_at', 'desc')->paginate(15);
        
        return view('admin.members.index', compact('members', 'status'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted',
            'admin_note' => 'nullable|string'
        ]);

        $member->update($validated);

        if ($request->wantsJson()) {
             return response()->json(['success' => true, 'message' => 'Kayıt güncellendi.']);
        }

        return back()->with('success', 'Kayıt güncellendi.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Kayıt silindi.']);
        }

        return back()->with('success', 'Kayıt silindi.');
    }
}
