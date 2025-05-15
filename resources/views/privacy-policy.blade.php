@extends('layouts.app') {{-- Replace with your layout --}}

@section('title', 'Privacy Policy')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Privacy Policy</h1>

        <p class="mb-4">Effective Date: {{ now()->format('F d, Y') }}</p>

        <p class="mb-6">At {{ config('app.name') }}, we value your privacy and are committed to protecting the personal information of students, parents, and staff members. This Privacy Policy outlines how we collect, use, and safeguard your information when you visit our website or interact with our services.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">1. Information We Collect</h2>
        <ul class="list-disc list-inside mb-6">
            <li>Personal details (e.g., name, email address, phone number)</li>
            <li>Student academic records and enrollment information</li>
            <li>Messages or inquiries submitted through contact forms</li>
            <li>IP address, browser type, and other usage data</li>
        </ul>

        <h2 class="text-xl font-semibold mt-6 mb-2">2. How We Use Your Information</h2>
        <ul class="list-disc list-inside mb-6">
            <li>To manage student admissions and academic records</li>
            <li>To respond to inquiries or requests</li>
            <li>To improve our website and communication</li>
            <li>To send school-related updates, announcements, and newsletters</li>
        </ul>

        <h2 class="text-xl font-semibold mt-6 mb-2">3. Information Sharing</h2>
        <p class="mb-4">We do not sell or share your personal data with third parties for marketing purposes. We may share information:</p>
        <ul class="list-disc list-inside mb-6">
            <li>With regulatory bodies as required by law</li>
            <li>With educational partners or government entities for academic reporting</li>
            <li>With trusted service providers who support our operations under confidentiality agreements</li>
        </ul>

        <h2 class="text-xl font-semibold mt-6 mb-2">4. Security</h2>
        <p class="mb-6">We implement security measures to protect your information from unauthorized access, alteration, disclosure, or destruction. However, no online transmission is completely secure, so we cannot guarantee absolute protection.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">5. Children's Privacy</h2>
        <p class="mb-6">We are committed to protecting the privacy of children. Student data is collected and used only for educational and administrative purposes and is handled in accordance with applicable laws and regulations.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">6. Your Rights</h2>
        <p class="mb-6">You have the right to access, update, or request deletion of your personal information. To do so, please contact us at <a href="mailto:info@embeko.org" class="text-blue-600 underline">Email</a>.</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">7. Updates to This Policy</h2>
        <p class="mb-6">We may update this Privacy Policy from time to time. All changes will be posted on this page with the updated effective date.</p>
        <p>If you have any questions about this Privacy Policy, please contact us.</p>
    </div>
@endsection
