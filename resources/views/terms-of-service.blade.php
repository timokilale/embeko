@extends('layouts.app') {{-- Adjust to your layout --}}

@section('title', 'Terms of Service')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Terms of Service</h1>

        <p class="mb-6">Effective Date: {{ now()->format('F d, Y') }}</p>

        <p class="mb-6">These Terms of Service govern your access to and use of the {{ config('app.name') }} website and related services. By using our site, you agree to these terms in full. If you do not agree with any part, please discontinue use of our website immediately.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">1. Use of the Website</h2>
        <p class="mb-4">You agree to use this website for lawful and educational purposes only. You must not use it to:</p>
        <ul class="list-disc list-inside mb-6">
            <li>Transmit harmful, abusive, or offensive content</li>
            <li>Attempt to gain unauthorized access to school systems</li>
            <li>Violate the rights of students, staff, or third parties</li>
        </ul>

        <h2 class="text-xl font-semibold mt-6 mb-2">2. Student and Parent Accounts</h2>
        <p class="mb-6">Some features may require account access. You are responsible for maintaining the confidentiality of your login credentials. You must notify the school immediately if you suspect any unauthorized use of your account.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">3. Intellectual Property</h2>
        <p class="mb-6">All content on this website, including text, images, logos, and downloadable materials, is the property of {{ config('app.name') }} unless otherwise stated. Unauthorized reproduction or distribution is prohibited.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">4. Privacy</h2>
        <p class="mb-6">Your use of this website is also governed by our <a href="{{ route('privacy.policy') }}" class="text-blue-600 underline">Privacy Policy</a>. Please review it to understand how we collect, use, and protect your data.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">5. Limitation of Liability</h2>
        <p class="mb-6">We strive to keep the website updated and accurate, but we make no warranties of any kind. {{ config('app.name') }} will not be held liable for any damages resulting from your use of the site.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">6. External Links</h2>
        <p class="mb-6">Our website may contain links to third-party websites. We are not responsible for the content or practices of those sites.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">7. Modifications</h2>
        <p class="mb-6">We reserve the right to update these Terms of Service at any time. Continued use of the website after changes are made implies your acceptance of the revised terms.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">8. Contact Us</h2>
        <p class="mb-6">If you have questions about these terms, please contact us at <a href="mailto:embeko.org" class="text-blue-600 underline">Email</a>.</p>
    </div>
@endsection
