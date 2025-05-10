@extends('layouts.app')

@section('title', 'Apply Now - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Apply for Admission</h1>

    <!-- Application Form Introduction -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <h2 class="card-title mb-4">Application Form</h2>
            <p class="lead">
                Thank you for your interest in Embeko Secondary School. Please complete the application form below to begin the admission process.
            </p>
            <p>
                All fields marked with an asterisk (*) are required. After submitting your application, our admissions team will review your information and contact you regarding the next steps in the process.
            </p>
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> If you prefer to download the application form and submit it in person, please <a href="{{ route('downloads.index') }}" class="alert-link">visit our downloads page</a>.
            </div>
        </div>
    </div>

    <!-- Application Form -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <form id="applicationForm" class="needs-validation" novalidate>
                <!-- Student Information -->
                <h3 class="mb-4"><i class="fas fa-user text-primary me-2"></i> Student Information</h3>
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <label for="firstName" class="form-label">First Name *</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                        <div class="invalid-feedback">Please provide a first name.</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="middleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middleName" name="middleName">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName" class="form-label">Last Name *</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                        <div class="invalid-feedback">Please provide a last name.</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <label for="dateOfBirth" class="form-label">Date of Birth *</label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
                        <div class="invalid-feedback">Please provide a date of birth.</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="gender" class="form-label">Gender *</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="" selected disabled>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <div class="invalid-feedback">Please select a gender.</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nationality" class="form-label">Nationality *</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" required>
                        <div class="invalid-feedback">Please provide nationality.</div>
                    </div>
                </div>

                <!-- Academic Information -->
                <h3 class="mb-4 mt-5"><i class="fas fa-graduation-cap text-primary me-2"></i> Academic Information</h3>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="applyingFor" class="form-label">Applying For *</label>
                        <select class="form-select" id="applyingFor" name="applyingFor" required>
                            <option value="" selected disabled>Select Class</option>
                            <option value="form1">Form One</option>
                            <option value="form2">Form Two</option>
                            <option value="form3">Form Three</option>
                            <option value="form4">Form Four</option>
                            <option value="form5">Form Five</option>
                            <option value="form6">Form Six</option>
                        </select>
                        <div class="invalid-feedback">Please select a class.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="academicYear" class="form-label">Academic Year *</label>
                        <select class="form-select" id="academicYear" name="academicYear" required>
                            <option value="" selected disabled>Select Academic Year</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                        </select>
                        <div class="invalid-feedback">Please select an academic year.</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="previousSchool" class="form-label">Previous School *</label>
                        <input type="text" class="form-control" id="previousSchool" name="previousSchool" required>
                        <div class="invalid-feedback">Please provide previous school name.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="previousClass" class="form-label">Previous Class Completed *</label>
                        <input type="text" class="form-control" id="previousClass" name="previousClass" required>
                        <div class="invalid-feedback">Please provide previous class completed.</div>
                    </div>
                </div>

                <!-- Parent/Guardian Information -->
                <h3 class="mb-4 mt-5"><i class="fas fa-users text-primary me-2"></i> Parent/Guardian Information</h3>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="parentName" class="form-label">Parent/Guardian Name *</label>
                        <input type="text" class="form-control" id="parentName" name="parentName" required>
                        <div class="invalid-feedback">Please provide parent/guardian name.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="relationship" class="form-label">Relationship to Student *</label>
                        <select class="form-select" id="relationship" name="relationship" required>
                            <option value="" selected disabled>Select Relationship</option>
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="guardian">Guardian</option>
                            <option value="other">Other</option>
                        </select>
                        <div class="invalid-feedback">Please select a relationship.</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="parentPhone" class="form-label">Phone Number *</label>
                        <input type="tel" class="form-control" id="parentPhone" name="parentPhone" required>
                        <div class="invalid-feedback">Please provide a phone number.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="parentEmail" class="form-label">Email Address *</label>
                        <input type="email" class="form-control" id="parentEmail" name="parentEmail" required>
                        <div class="invalid-feedback">Please provide a valid email address.</div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="address" class="form-label">Physical Address *</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    <div class="invalid-feedback">Please provide an address.</div>
                </div>

                <!-- Additional Information -->
                <h3 class="mb-4 mt-5"><i class="fas fa-info-circle text-primary me-2"></i> Additional Information</h3>
                <div class="mb-4">
                    <label for="specialNeeds" class="form-label">Does the student have any special needs or requirements?</label>
                    <textarea class="form-control" id="specialNeeds" name="specialNeeds" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label for="howDidYouHear" class="form-label">How did you hear about Embeko Secondary School? *</label>
                    <select class="form-select" id="howDidYouHear" name="howDidYouHear" required>
                        <option value="" selected disabled>Select an option</option>
                        <option value="website">School Website</option>
                        <option value="socialMedia">Social Media</option>
                        <option value="friend">Friend/Family</option>
                        <option value="newspaper">Newspaper</option>
                        <option value="radio">Radio</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="invalid-feedback">Please select an option.</div>
                </div>

                <!-- Terms and Conditions -->
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="termsCheck" name="termsCheck" required>
                    <label class="form-check-label" for="termsCheck">
                        I confirm that all information provided is accurate and complete. I understand that providing false information may result in the cancellation of the application or admission. *
                    </label>
                    <div class="invalid-feedback">You must agree before submitting.</div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-paper-plane me-2"></i> Submit Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Form validation
    (function() {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    // Here you would normally submit the form via AJAX
                    alert('Thank you for your application! Our admissions team will contact you soon.');
                    form.reset();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
@endpush
