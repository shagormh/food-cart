<?php

namespace App\Http\Controllers;

use App\Models\EmailVerification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VerificationController extends Controller
{
    // Modified register method
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Store user data in session
        session([
            'registration_data' => [
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
            ]
        ]);

        // Generate OTP
        $otp = $this->generateOTP();

        // Store OTP in database
        EmailVerification::updateOrCreate(
            ['email' => $request->email],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(10), // OTP expires in 10 minutes
            ]
        );

        // Send OTP email
        $this->sendOTPEmail($request->email, $otp);

        return redirect()->route('verification.show');
    }

    // Generate 6-digit OTP
    private function generateOTP()
    {
        return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    // Send OTP email
    private function sendOTPEmail($email, $otp)
    {
        $data = [
            'otp' => $otp,
        ];

        Mail::send('emails.otp', $data, function($message) use ($email) {
            $message->to($email)
                    ->subject('Your Email Verification Code');
        });
    }

    // Show verification form
    public function showVerificationForm()
    {
        if (!session('registration_data')) {
            return redirect()->route('register');
        }

        return view('auth.verify');
    }

    // Verify OTP
    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|min:6|max:6',
        ]);

        $registrationData = session('registration_data');

        if (!$registrationData) {
            return redirect()->route('register')
                ->with('error', 'Registration session expired. Please register again.');
        }

        $verification = EmailVerification::where('email', $registrationData['email'])
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$verification) {
            return back()->with('error', 'Invalid or expired verification code.');
        }

        // Create user
        $user = User::create([
            'name' => $registrationData['name'],
            'email' => $registrationData['email'],
            'mobile' => $registrationData['mobile'],
            'password' => $registrationData['password'],
            'email_verified' => true,
        ]);

        // Delete verification record
        $verification->delete();

        // Clear session
        session()->forget('registration_data');

        // Login user
        auth()->login($user);

        return redirect()->route('home')
            ->with('success', 'Registration successful! Your email has been verified.');
    }

    // Resend OTP
    public function resendOTP(Request $request)
    {
        $registrationData = session('registration_data');

        if (!$registrationData) {
            return redirect()->route('register')
                ->with('error', 'Registration session expired. Please register again.');
        }

        // Generate new OTP
        $otp = $this->generateOTP();

        // Update or create verification record
        EmailVerification::updateOrCreate(
            ['email' => $registrationData['email']],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(10),
            ]
        );

        // Send OTP email
        $this->sendOTPEmail($registrationData['email'], $otp);

        return back()->with('success', 'Verification code has been resent to your email.');
    }
}
