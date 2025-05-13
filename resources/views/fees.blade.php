@extends('layouts.app')

@section('title', 'Fees Structure - Embeko Secondary School')

@section('content')
    <div class="container py-5">
        <!-- Fees Header -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="mb-3">Fees Structure</h1>
                <p class="lead">
                    Embeko Secondary School offers quality education at competitive and affordable fees.
                </p>
                <p>
                    Our fee structure is designed to ensure that we provide the best educational experience for our students
                    while remaining accessible to families from diverse economic backgrounds. The fees cover tuition,
                    accommodation, meals, learning materials, and extracurricular activities.
                </p>
                <p>
                    We offer various payment plans to accommodate different financial situations. Please contact our
                    administrative office for more information about payment options.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Important Information</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-info-circle text-primary me-3 fa-lg"></i>
                                <span>Fees are payable at the beginning of each term</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-credit-card text-primary me-3 fa-lg"></i>
                                <span>We accept bank transfers, mobile money, and direct deposits</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-calendar-alt text-primary me-3 fa-lg"></i>
                                <span>Installment payment plans are available upon request</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-user-graduate text-primary me-3 fa-lg"></i>
                                <span>Scholarships are available for exceptional students</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-phone-alt text-primary me-3 fa-lg"></i>
                                <span>Contact our finance office for any fee-related inquiries</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fee Structure Tabs -->
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-white">
                <ul class="nav nav-tabs card-header-tabs" id="feeTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="ordinary-tab" data-bs-toggle="tab" data-bs-target="#ordinary"
                            type="button" role="tab" aria-controls="ordinary" aria-selected="true">
                            Ordinary Level (Form 1-4)
                        </button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="advanced-tab" data-bs-toggle="tab" data-bs-target="#advanced" type="button" role="tab" aria-controls="advanced" aria-selected="false">
                            Advanced Level (Form 5-6)
                        </button>
                    </li> -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="additional-tab" data-bs-toggle="tab" data-bs-target="#additional"
                            type="button" role="tab" aria-controls="additional" aria-selected="false">
                            Additional Fees
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="feeTabsContent">
                    <!-- Ordinary Level Fees -->
                    <div class="tab-pane fade show active" id="ordinary" role="tabpanel" aria-labelledby="ordinary-tab">
                        <h4 class="mb-4">Ordinary Level Fees Structure (Form 1-4)</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Fee Name</th>
                                        <th>Fee Category</th>
                                        <th>Day Scholar (TZS)</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (App\Models\Fee::all() as $fee)
                                        <tr>
                                            <td><strong>{{ $fee->name }}</strong></td>
                                            <td>{{ $fee->category }}</td>
                                            <td>{{ $fee->amount }}</td>
                                            <td>{{ $fee->description }}</td>
                                        </tr>
                                    @endforeach

                                    <tr class="table-light">
                                        <td><strong>Total Per Year</strong></td>
                                        <td><strong>1,100,000</strong></td>
                                        <td><strong>2,350,000</strong></td>
                                        <td>Payable in three installments</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Advanced Level Fees
                    <div class="tab-pane fade" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">
                        <h4 class="mb-4">Advanced Level Fees Structure (Form 5-6)</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th>Fee Category</th>
                                        <th>Day Scholar (TZS)</th>
                                        <th>Boarding Scholar (TZS)</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Tuition Fee</strong></td>
                                        <td>1,000,000</td>
                                        <td>1,000,000</td>
                                        <td>Covers teaching and learning activities</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Boarding Fee</strong></td>
                                        <td>N/A</td>
                                        <td>1,400,000</td>
                                        <td>Accommodation and meals</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Development Fee</strong></td>
                                        <td>200,000</td>
                                        <td>200,000</td>
                                        <td>School infrastructure development</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Laboratory Fee</strong></td>
                                        <td>150,000</td>
                                        <td>150,000</td>
                                        <td>Science laboratory materials and equipment</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Examination Fee</strong></td>
                                        <td>120,000</td>
                                        <td>120,000</td>
                                        <td>Internal examinations and assessment</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Medical Fee</strong></td>
                                        <td>50,000</td>
                                        <td>100,000</td>
                                        <td>Basic healthcare services</td>
                                    </tr>
                                    <tr class="table-light">
                                        <td><strong>Total Per Year</strong></td>
                                        <td><strong>1,520,000</strong></td>
                                        <td><strong>2,970,000</strong></td>
                                        <td>Payable in three installments</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->

                    <!-- Additional Fees -->
                    <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                        <h4 class="mb-4">Additional Fees and Charges</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-info">
                                    <tr>
                                        <th>Item</th>
                                        <th>Amount (TZS)</th>
                                        <th>Frequency</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Registration Fee</strong></td>
                                        <td>50,000</td>
                                        <td>One-time</td>
                                        <td>Paid during initial registration</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Uniform Set</strong></td>
                                        <td>150,000</td>
                                        <td>As needed</td>
                                        <td>Complete set of school uniform</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sports Fee</strong></td>
                                        <td>30,000</td>
                                        <td>Annual</td>
                                        <td>Sports equipment and activities</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Computer Lab Fee</strong></td>
                                        <td>50,000</td>
                                        <td>Annual</td>
                                        <td>Access to computer facilities</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Library Fee</strong></td>
                                        <td>30,000</td>
                                        <td>Annual</td>
                                        <td>Library resources and services</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Student ID Card</strong></td>
                                        <td>10,000</td>
                                        <td>One-time</td>
                                        <td>School identification card</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Graduation Fee</strong></td>
                                        <td>50,000</td>
                                        <td>One-time</td>
                                        <td>For graduating students only</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Information -->
        <div class="row mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Payment Methods</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5><i class="fas fa-university me-2 text-primary"></i> Bank Transfer</h5>
                                <p class="mb-0">
                                    Account Name: Embeko Secondary School<br>
                                    Account Number: 01234567890<br>
                                    Bank: CRDB Bank<br>
                                    Branch: Dodoma Main Branch
                                </p>
                            </li>
                            <li class="list-group-item">
                                <h5><i class="fas fa-mobile-alt me-2 text-primary"></i> Mobile Money</h5>
                                <p class="mb-0">
                                    M-Pesa: 0712 345 678<br>
                                    Tigo Pesa: 0652 345 678<br>
                                    Airtel Money: 0782 345 678<br>
                                    <small class="text-muted">Please include student name and ID in the reference</small>
                                </p>
                            </li>
                            <li class="list-group-item">
                                <h5><i class="fas fa-money-bill-wave me-2 text-primary"></i> Direct Payment</h5>
                                <p class="mb-0">
                                    Payments can be made directly at the school's finance office.<br>
                                    Office Hours: Monday to Friday, 8:00 AM to 4:00 PM
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Payment Schedule</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Term</th>
                                        <th>Due Date</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>First Term</td>
                                        <td>January 15th</td>
                                        <td>40%</td>
                                    </tr>
                                    <tr>
                                        <td>Second Term</td>
                                        <td>May 15th</td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>Third Term</td>
                                        <td>September 15th</td>
                                        <td>30%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="alert alert-info mt-3 mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Note:</strong> Late payments may incur a penalty fee of 5% of the outstanding amount.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scholarships and Financial Aid -->
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Scholarships and Financial Aid</h4>
            </div>
            <div class="card-body">
                <p>
                    Embeko Secondary School is committed to making quality education accessible to deserving students.
                    We offer various scholarships and financial aid options based on academic merit, financial need,
                    and special talents.
                </p>
                <div class="row mt-4">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-medal fa-3x text-warning"></i>
                                </div>
                                <h5 class="card-title">Academic Excellence Scholarship</h5>
                                <p class="card-text">
                                    Awarded to students who demonstrate exceptional academic performance.
                                    Covers up to 100% of tuition fees.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-hand-holding-heart fa-3x text-danger"></i>
                                </div>
                                <h5 class="card-title">Financial Need-Based Aid</h5>
                                <p class="card-text">
                                    Available to students from economically disadvantaged backgrounds.
                                    Covers a portion of the total fees.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="fas fa-futbol fa-3x text-success"></i>
                                </div>
                                <h5 class="card-title">Talent Scholarship</h5>
                                <p class="card-text">
                                    For students with exceptional talents in sports, arts, or other extracurricular
                                    activities.
                                    Covers up to 50% of tuition fees.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('page.show', 'contact-us') }}" class="btn btn-outline-primary">
                        <i class="fas fa-info-circle me-2"></i> Inquire About Scholarships
                    </a>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mb-5">
            <h2 class="mb-4">Frequently Asked Questions</h2>
            <div class="accordion" id="feesFAQ">
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Are there any hidden fees that I should be aware of?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#feesFAQ">
                        <div class="accordion-body">
                            No, there are no hidden fees. All required fees are clearly outlined in our fee structure. Any
                            additional costs for special events or activities will be communicated well in advance.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What happens if I cannot pay the fees on time?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#feesFAQ">
                        <div class="accordion-body">
                            We understand that financial circumstances can change. If you anticipate difficulty in meeting
                            the payment deadlines, please contact our finance office as soon as possible to discuss
                            alternative payment arrangements.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Are fees refundable if my child withdraws from the school?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#feesFAQ">
                        <div class="accordion-body">
                            Refunds are considered on a case-by-case basis. Generally, if a student withdraws before the
                            term begins, a partial refund may be provided. Once the term has started, refunds are typically
                            not given. Please refer to our refund policy for more details.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            How do I apply for a scholarship or financial aid?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#feesFAQ">
                        <div class="accordion-body">
                            To apply for a scholarship or financial aid, you need to complete a scholarship application form
                            available from our administrative office. The application should include academic records, a
                            statement of financial need (if applicable), and any supporting documents that demonstrate
                            eligibility for the specific scholarship.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section
        <div class="card bg-primary text-white border-0 shadow">
            <div class="card-body p-5 text-center">
                <h2 class="mb-3">Need More Information?</h2>
                <p class="lead mb-4">
                    Our finance team is ready to assist you with any questions regarding fees, payment options, or financial aid.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('page.show', 'contact-us') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-envelope me-2"></i> Contact Us
                    </a>
                    <a href="tel:+255123456789" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone-alt me-2"></i> Call Us
                    </a>
                </div>
            </div>
        </div> -->
    </div>
@endsection