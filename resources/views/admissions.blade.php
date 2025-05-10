@extends('layouts.app')

@section('title', 'Admissions - Embeko Secondary School')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Admissions</h1>

    <!-- Admissions Overview -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h2 class="card-title mb-4">Welcome to Embeko</h2>
                    <p class="lead">
                        Thank you for your interest in Embeko Secondary School. We are committed to providing a quality education that prepares students for success in their future endeavors.
                    </p>
                    <p>
                        At Embeko, we believe in nurturing the whole child - intellectually, physically, socially, and morally. Our comprehensive curriculum, experienced teachers, and modern facilities create an ideal learning environment for students to thrive.
                    </p>
                    <p>
                        We welcome applications from students who are eager to learn, willing to work hard, and ready to contribute positively to our school community.
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('apply') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus me-2"></i> Apply Now
                        </a>
                        <a href="{{ route('downloads.index') }}" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-download me-2"></i> Download Forms
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h2 class="card-title mb-4">Admission Requirements</h2>
                    <div class="mb-4">
                        <h5><i class="fas fa-user-graduate text-primary me-2"></i> Form One Admission</h5>
                        <ul>
                            <li>Completed application form</li>
                            <li>Primary School Leaving Examination (PSLE) results</li>
                            <li>Recommendation letter from previous school</li>
                            <li>Birth certificate</li>
                            <li>Passport-sized photographs (4)</li>
                            <li>Interview with the student and parents/guardians</li>
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h5><i class="fas fa-user-graduate text-primary me-2"></i> Form Five Admission</h5>
                        <ul>
                            <li>Completed application form</li>
                            <li>Certificate of Secondary Education Examination (CSEE) results</li>
                            <li>Recommendation letter from previous school</li>
                            <li>Birth certificate</li>
                            <li>Passport-sized photographs (4)</li>
                            <li>Interview with the student and parents/guardians</li>
                        </ul>
                    </div>
                    <div>
                        <h5><i class="fas fa-user-graduate text-primary me-2"></i> Transfer Students</h5>
                        <ul>
                            <li>Completed application form</li>
                            <li>Academic records from previous school</li>
                            <li>Transfer letter from previous school</li>
                            <li>Recommendation letter from previous school</li>
                            <li>Birth certificate</li>
                            <li>Passport-sized photographs (4)</li>
                            <li>Interview with the student and parents/guardians</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Application Process -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <h2 class="card-title mb-4">Application Process</h2>
            <div class="admission-steps">
                <div class="step" data-step="1">
                    <h5>Submit Application</h5>
                    <p>Complete and submit the application form along with all required documents. Application forms can be obtained from our school office or downloaded from our website.</p>
                </div>
                <div class="step" data-step="2">
                    <h5>Application Review</h5>
                    <p>Our admissions committee will review your application and academic records to determine eligibility.</p>
                </div>
                <div class="step" data-step="3">
                    <h5>Entrance Examination</h5>
                    <p>Eligible candidates will be invited to take an entrance examination to assess their academic readiness.</p>
                </div>
                <div class="step" data-step="4">
                    <h5>Interview</h5>
                    <p>Candidates who pass the entrance examination will be invited for an interview with their parents/guardians.</p>
                </div>
                <div class="step" data-step="5">
                    <h5>Admission Decision</h5>
                    <p>Based on the application, examination results, and interview, the admissions committee will make a decision.</p>
                </div>
                <div class="step" data-step="6">
                    <h5>Acceptance and Enrollment</h5>
                    <p>Successful candidates will receive an acceptance letter. To secure a place, parents/guardians must complete the enrollment process, including payment of the required fees.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Important Dates -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Important Dates</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Event</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Application Opens</td>
                                    <td>January 15, 2024</td>
                                </tr>
                                <tr>
                                    <td>Application Deadline</td>
                                    <td>March 31, 2024</td>
                                </tr>
                                <tr>
                                    <td>Entrance Examination</td>
                                    <td>April 15, 2024</td>
                                </tr>
                                <tr>
                                    <td>Interviews</td>
                                    <td>April 25-30, 2024</td>
                                </tr>
                                <tr>
                                    <td>Admission Results</td>
                                    <td>May 15, 2024</td>
                                </tr>
                                <tr>
                                    <td>Enrollment Deadline</td>
                                    <td>June 15, 2024</td>
                                </tr>
                                <tr>
                                    <td>Orientation Day</td>
                                    <td>July 10, 2024</td>
                                </tr>
                                <tr>
                                    <td>First Day of School</td>
                                    <td>July 15, 2024</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Tuition and Fees</h3>
                </div>
                <div class="card-body">
                    <p>Our tuition and fees are structured to provide quality education while remaining affordable. The following are the fees for the 2024/2025 academic year:</p>

                    <div class="mb-4">
                        <h5>Form One to Form Four</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Fee Type</th>
                                        <th>Day Scholar</th>
                                        <th>Boarding</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tuition Fee (per year)</td>
                                        <td>TZS 1,500,000</td>
                                        <td>TZS 2,500,000</td>
                                    </tr>
                                    <tr>
                                        <td>Registration Fee (one-time)</td>
                                        <td>TZS 50,000</td>
                                        <td>TZS 50,000</td>
                                    </tr>
                                    <tr>
                                        <td>Development Fee (per year)</td>
                                        <td>TZS 100,000</td>
                                        <td>TZS 100,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div>
                        <h5>Form Five and Form Six</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Fee Type</th>
                                        <th>Day Scholar</th>
                                        <th>Boarding</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tuition Fee (per year)</td>
                                        <td>TZS 1,800,000</td>
                                        <td>TZS 2,800,000</td>
                                    </tr>
                                    <tr>
                                        <td>Registration Fee (one-time)</td>
                                        <td>TZS 50,000</td>
                                        <td>TZS 50,000</td>
                                    </tr>
                                    <tr>
                                        <td>Development Fee (per year)</td>
                                        <td>TZS 100,000</td>
                                        <td>TZS 100,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('fees') }}" class="btn btn-outline-primary">
                            <i class="fas fa-info-circle me-2"></i> View Detailed Fee Structure
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scholarships -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <h2 class="card-title mb-4">Scholarships and Financial Aid</h2>
            <p>
                Embeko Secondary School is committed to making quality education accessible to deserving students. We offer a limited number of scholarships and financial aid packages to students who demonstrate academic excellence, leadership potential, and financial need.
            </p>
            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-medal fa-3x text-warning"></i>
                            </div>
                            <h4 class="card-title">Academic Excellence Scholarship</h4>
                            <p class="card-text">Awarded to students who have demonstrated exceptional academic performance in their previous studies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-hands-helping fa-3x text-success"></i>
                            </div>
                            <h4 class="card-title">Need-Based Financial Aid</h4>
                            <p class="card-text">Available to students who demonstrate financial need and meet our academic requirements.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-trophy fa-3x text-primary"></i>
                            </div>
                            <h4 class="card-title">Talent Scholarship</h4>
                            <p class="card-text">Awarded to students who demonstrate exceptional talent in sports, arts, or other extracurricular activities.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('downloads.index') }}" class="btn btn-primary">
                    <i class="fas fa-download me-2"></i> Download Scholarship Application Form
                </a>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-4">Frequently Asked Questions</h2>

            <div class="accordion" id="admissionsFAQ">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is the minimum grade requirement for admission?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            <p>For Form One admission, we generally require students to have scored at least 250 marks in their PSLE. For Form Five admission, we require at least Division III in the CSEE. However, admission decisions are made holistically, considering not only academic performance but also character, extracurricular involvement, and potential for growth.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Can I apply for admission in the middle of the academic year?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            <p>Yes, we accept mid-year transfers depending on space availability. Transfer students must meet our academic requirements and provide all necessary documentation from their previous school. Please contact our admissions office for more information about mid-year admissions.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What subjects do you offer?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            <p>We offer a comprehensive curriculum that includes all core subjects prescribed by the Tanzania Ministry of Education. For O-Level (Form 1-4), these include Mathematics, English, Kiswahili, Biology, Chemistry, Physics, History, Geography, Civics, and Book-keeping. For A-Level (Form 5-6), we offer combinations in Science (PCB, PCM, CBG), Arts (HGE, HGL), and Commerce (ECA).</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Do you offer payment plans for tuition fees?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            <p>Yes, we offer flexible payment plans to help families manage the cost of education. Tuition fees can be paid in installments (annually, per term, or monthly). Please contact our finance office for more information about payment options.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            What is the student-teacher ratio?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            <p>We maintain a low student-teacher ratio of approximately 25:1 to ensure that each student receives adequate attention and support. Our small class sizes allow for more interactive and personalized learning experiences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .admission-steps .step {
        position: relative;
        padding-left: 50px;
        margin-bottom: 30px;
    }
    .admission-steps .step:before {
        content: attr(data-step);
        position: absolute;
        left: 0;
        top: 0;
        width: 36px;
        height: 36px;
        background-color: #0d6efd;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    .admission-steps .step:after {
        content: '';
        position: absolute;
        left: 18px;
        top: 36px;
        height: calc(100% - 36px);
        width: 2px;
        background-color: #0d6efd;
    }
    .admission-steps .step:last-child:after {
        display: none;
    }
</style>
@endpush
