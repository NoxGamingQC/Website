<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\UserProfileService;

class UserProfileController extends Controller
{
    protected UserProfileService $profileService;

    public function __construct(UserProfileService $profileService)
    {
        $this->profileService = $profileService;
        // Middleware pour sécuriser les actions sensibles
        $this->middleware('auth')->only(['edit', 'save', 'updateState', 'link', 'newLink']);
    }

    /**
     * Display user profile
     */
    public function index($locale, $id)
    {
        $user = $this->profileService->findUserByIdOrName($id);

        if (!$user || !$this->profileService->canView($user, Auth::user())) {
            abort(404);
        }

        $profileData = $this->profileService->getProfileData($user);

        return view('user.profile', $profileData);
    }

    /**
     * Show edit form for the authenticated user
     */
    public function edit($locale)
    {
        return view('user.edit-profile', [
            'user' => Auth::user(),
            'header' => false,
        ]);
    }

    /**
     * Save changes for authenticated user
     */
    public function save(Request $request)
    {
        $user = Auth::user();
        if (!$user) abort(403);

        $this->profileService->updateProfile($user, $request->all());

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Update the user's online/offline state
     */
    public function updateState(Request $request)
    {
        return $this->profileService->updateState(Auth::user(), $request->state);
    }

    /**
     * Link Discord account
     */
    public function link(Request $request)
    {
        $success = $this->profileService->linkDiscord(Auth::user(), $request->link_token);

        if (!$success) abort(403);

        return response()->json(['status' => 'linked'], 200);
    }

    /**
     * Generate API linking token
     */
    public function newLink(Request $request)
    {
        $key = $this->profileService->generateLinkToken(
            $request->platform,
            $request->website_token,
            $request->discord_id ?? null
        );

        return response()->json(['token' => $key], 200);
    }
}