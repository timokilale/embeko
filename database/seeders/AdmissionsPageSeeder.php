<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admissions Page
        $admissionsPage = Page::create([
            'title' => 'Admissions',
            'slug' => 'admissions',
            'description' => 'Learn about the admissions process, requirements, and how to apply to Embeko Secondary School.',
            'is_published' => true,
            'layout' => 'admissions',
            'meta_title' => 'Admissions - Embeko Secondary School',
            'meta_description' => 'Discover the admissions process, entry requirements, and application procedures for Embeko Secondary School.',
            'meta_keywords' => 'admissions, apply, enrollment, registration, entry requirements, school application',
        ]);

        // Introduction Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'Welcome to Embeko Admissions',
            'identifier' => 'introduction',
            'content' => '<p class="lead">
                Thank you for your interest in Embeko Secondary School. We are committed to providing quality education and nurturing well-rounded individuals.
            </p>
            <p>
                Our admissions process is designed to identify students who will thrive in our academic environment and contribute positively to our school community. 
                We seek students who demonstrate academic potential, good character, and a willingness to participate in the diverse activities that our school offers.
            </p>
            <p>
                We welcome applications from students of all backgrounds and abilities. Our goal is to create a diverse and inclusive learning environment where every student can succeed.
            </p>',
            'order' => 1,
            'type' => 'html',
        ]);

        // Admission Cycles Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'Admission Cycles',
            'identifier' => 'admission_cycles',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Embeko Secondary School admits students at two main entry points:
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Form 1 (O-Level Entry)</h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                        This is the main entry point for students who have completed their primary education (Standard 7) and passed the Primary School Leaving Examination (PSLE).
                                    </p>
                                    <ul>
                                        <li><strong>Application Period:</strong> September - November</li>
                                        <li><strong>Entrance Examination:</strong> December</li>
                                        <li><strong>Interviews:</strong> December</li>
                                        <li><strong>Admission Offers:</strong> January</li>
                                        <li><strong>Academic Year Begins:</strong> January</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0">Form 5 (A-Level Entry)</h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                        This entry point is for students who have completed their O-Level education (Form 4) and passed the Certificate of Secondary Education Examination (CSEE).
                                    </p>
                                    <ul>
                                        <li><strong>Application Period:</strong> February - April</li>
                                        <li><strong>Entrance Examination:</strong> May</li>
                                        <li><strong>Interviews:</strong> May</li>
                                        <li><strong>Admission Offers:</strong> June</li>
                                        <li><strong>Academic Year Begins:</strong> July</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info mt-3 mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note:</strong> We also accept transfer students to other forms (Form 2, 3, and 6) subject to availability of places and meeting our academic requirements.
                    </div>
                </div>
            </div>',
            'order' => 2,
            'type' => 'html',
        ]);

        // Entry Requirements Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'Entry Requirements',
            'identifier' => 'entry_requirements',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-user-graduate text-primary me-2"></i> Form 1 (O-Level) Requirements</h5>
                            <ul>
                                <li>Successful completion of primary education (Standard 7)</li>
                                <li>Passing grade in the Primary School Leaving Examination (PSLE)</li>
                                <li>Minimum grade of B in Mathematics and English</li>
                                <li>Satisfactory performance in our entrance examination</li>
                                <li>Successful interview</li>
                                <li>Good conduct report from previous school</li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-user-tie text-success me-2"></i> Form 5 (A-Level) Requirements</h5>
                            <ul>
                                <li>Successful completion of O-Level education (Form 4)</li>
                                <li>Minimum of Division II in the Certificate of Secondary Education Examination (CSEE)</li>
                                <li>Minimum grade of C in subjects relevant to chosen A-Level combination</li>
                                <li>Satisfactory performance in our entrance examination</li>
                                <li>Successful interview</li>
                                <li>Good conduct report from previous school</li>
                            </ul>
                        </div>
                    </div>
                    <h5 class="mt-3"><i class="fas fa-file-alt text-info me-2"></i> Required Documents</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li>Completed application form</li>
                                <li>Copy of birth certificate</li>
                                <li>Copy of examination results (PSLE for Form 1, CSEE for Form 5)</li>
                                <li>Academic transcripts from previous school</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>Conduct report from previous school</li>
                                <li>Two passport-sized photographs</li>
                                <li>Medical report</li>
                                <li>Letter of recommendation from previous school</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 3,
            'type' => 'html',
        ]);

        // Application Process Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'Application Process',
            'identifier' => 'application_process',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        The application process at Embeko Secondary School involves several steps:
                    </p>
                    <div class="timeline mt-4">
                        <div class="timeline-item">
                            <div class="timeline-step">
                                <i class="fas fa-file-download fa-2x text-primary"></i>
                                <div class="timeline-step-number">1</div>
                            </div>
                            <div class="timeline-content">
                                <h5>Obtain Application Form</h5>
                                <p>
                                    Download the application form from our website or collect it from our admissions office. 
                                    <a href="#" class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="fas fa-download me-2"></i>Download Application Form
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-step">
                                <i class="fas fa-file-alt fa-2x text-primary"></i>
                                <div class="timeline-step-number">2</div>
                            </div>
                            <div class="timeline-content">
                                <h5>Complete and Submit Application</h5>
                                <p>
                                    Fill out the application form completely and submit it along with all required documents and the application fee of TZS 50,000.
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-step">
                                <i class="fas fa-pencil-alt fa-2x text-primary"></i>
                                <div class="timeline-step-number">3</div>
                            </div>
                            <div class="timeline-content">
                                <h5>Entrance Examination</h5>
                                <p>
                                    Eligible candidates will be invited to sit for an entrance examination that tests knowledge in Mathematics, English, and Science.
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-step">
                                <i class="fas fa-comments fa-2x text-primary"></i>
                                <div class="timeline-step-number">4</div>
                            </div>
                            <div class="timeline-content">
                                <h5>Interview</h5>
                                <p>
                                    Candidates who perform well in the entrance examination will be invited for an interview with our admissions committee.
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-step">
                                <i class="fas fa-envelope-open-text fa-2x text-primary"></i>
                                <div class="timeline-step-number">5</div>
                            </div>
                            <div class="timeline-content">
                                <h5>Admission Decision</h5>
                                <p>
                                    Admission decisions are based on the candidate\'s academic performance, entrance examination results, interview, and available spaces.
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-step">
                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                <div class="timeline-step-number">6</div>
                            </div>
                            <div class="timeline-content">
                                <h5>Acceptance and Enrollment</h5>
                                <p>
                                    Successful candidates will receive an offer letter. To secure a place, parents/guardians must pay the required fees and complete the enrollment process by the specified deadline.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 4,
            'type' => 'html',
        ]);

        // Fees and Financial Aid Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'Fees and Financial Aid',
            'identifier' => 'fees_financial_aid',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Embeko Secondary School strives to provide quality education at competitive and affordable fees. We also offer various financial aid options to deserving students.
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-money-bill-wave text-success me-2"></i> Fee Structure</h5>
                            <p>
                                Our comprehensive fee structure covers tuition, accommodation (for boarding students), meals, learning materials, and extracurricular activities.
                            </p>
                            <p>
                                For detailed information about our fees, please visit our <a href="/fees">Fees Structure</a> page.
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-hand-holding-usd text-success me-2"></i> Financial Aid</h5>
                            <p>
                                We are committed to making quality education accessible to deserving students. We offer various scholarships and financial aid options based on:
                            </p>
                            <ul>
                                <li>Academic merit</li>
                                <li>Financial need</li>
                                <li>Special talents (sports, arts, etc.)</li>
                            </ul>
                            <p>
                                To apply for financial aid, please complete the Financial Aid Application Form and submit it along with your admissions application.
                            </p>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 5,
            'type' => 'html',
        ]);

        // International Students Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'International Students',
            'identifier' => 'international_students',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Embeko Secondary School welcomes applications from international students. We value the diversity and global perspective that international students bring to our school community.
                    </p>
                    <h5 class="mt-4">Additional Requirements for International Students</h5>
                    <ul>
                        <li>Copy of passport</li>
                        <li>Student visa or residence permit</li>
                        <li>Translated and certified copies of academic records</li>
                        <li>English language proficiency test results (if English is not the first language)</li>
                        <li>Guardian information (for students under 18 years)</li>
                    </ul>
                    <h5 class="mt-4">Support Services for International Students</h5>
                    <ul>
                        <li>Orientation program</li>
                        <li>English language support</li>
                        <li>Cultural integration activities</li>
                        <li>Assistance with visa and immigration matters</li>
                        <li>Accommodation arrangements</li>
                    </ul>
                    <div class="alert alert-info mt-3 mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note:</strong> International students are advised to apply at least 3-6 months before the start of the academic year to allow sufficient time for visa processing and other arrangements.
                    </div>
                </div>
            </div>',
            'order' => 6,
            'type' => 'html',
        ]);

        // Campus Visit Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'Visit Our Campus',
            'identifier' => 'campus_visit',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        We encourage prospective students and their families to visit our campus to experience firsthand what Embeko Secondary School has to offer.
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-calendar-alt text-primary me-2"></i> Campus Tours</h5>
                            <p>
                                We offer guided tours of our campus on weekdays between 9:00 AM and 3:00 PM, and on Saturdays by appointment.
                            </p>
                            <p>
                                During the tour, you will visit our classrooms, laboratories, library, dormitories, sports facilities, and other amenities. You will also have the opportunity to meet with teachers and current students.
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-users text-primary me-2"></i> Open Days</h5>
                            <p>
                                We host Open Days twice a year (April and October) where prospective students and their families can:
                            </p>
                            <ul>
                                <li>Tour the campus</li>
                                <li>Attend information sessions</li>
                                <li>Meet with teachers and administrators</li>
                                <li>Interact with current students</li>
                                <li>Learn about our academic programs and extracurricular activities</li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="/contact-us" class="btn btn-primary">
                            <i class="fas fa-calendar-check me-2"></i> Schedule a Visit
                        </a>
                    </div>
                </div>
            </div>',
            'order' => 7,
            'type' => 'html',
        ]);

        // Contact Admissions Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'Contact Admissions Office',
            'identifier' => 'contact_admissions',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Our admissions team is here to assist you throughout the application process. Please feel free to contact us with any questions or concerns.
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-map-marker-alt text-danger me-2"></i> Address</h5>
                            <p>
                                Admissions Office<br>
                                Embeko Secondary School<br>
                                P.O. Box 1234<br>
                                Dodoma, Tanzania
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-phone-alt text-success me-2"></i> Phone</h5>
                            <p>
                                Main Office: +255 123 456 789<br>
                                Admissions: +255 123 456 790
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-envelope text-primary me-2"></i> Email</h5>
                            <p>
                                <a href="mailto:admissions@embeko.ac.tz">admissions@embeko.ac.tz</a>
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-clock text-warning me-2"></i> Office Hours</h5>
                            <p>
                                Monday to Friday: 8:00 AM - 4:30 PM<br>
                                Saturday: 9:00 AM - 12:00 PM<br>
                                Sunday & Public Holidays: Closed
                            </p>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="/contact-us" class="btn btn-outline-primary">
                            <i class="fas fa-paper-plane me-2"></i> Send a Message
                        </a>
                    </div>
                </div>
            </div>',
            'order' => 8,
            'type' => 'html',
        ]);

        // FAQ Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'Frequently Asked Questions',
            'identifier' => 'faq',
            'content' => '<div class="accordion" id="admissionsFAQ">
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is the application deadline?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            For Form 1 (O-Level) admissions, the application deadline is November 30th. For Form 5 (A-Level) admissions, the deadline is April 30th. However, we encourage early applications as spaces fill up quickly.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Is there an application fee?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            Yes, there is a non-refundable application fee of TZS 50,000. This fee covers the cost of processing your application, the entrance examination, and the interview.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            How competitive is the admissions process?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            Admission to Embeko Secondary School is competitive. We receive many more applications than we have available spaces. However, we consider each application holistically, taking into account academic performance, entrance examination results, interview, character, and potential contribution to our school community.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Can I apply for both boarding and day options?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            Yes, you can indicate your preference for boarding or day scholar status on the application form. However, boarding spaces are limited and are allocated based on availability and distance from the school.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            What if I miss the application deadline?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#admissionsFAQ">
                        <div class="accordion-body">
                            Late applications may be considered if spaces are still available after the regular admission cycle. However, we strongly encourage applying by the deadline to maximize your chances of admission.
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 9,
            'type' => 'accordion',
        ]);

        // Apply Now Section
        PageSection::create([
            'page_id' => $admissionsPage->id,
            'title' => 'Apply Now',
            'identifier' => 'apply_now',
            'content' => '<div class="card bg-primary text-white border-0 shadow">
                <div class="card-body p-5 text-center">
                    <h2 class="mb-3">Ready to Join Embeko Secondary School?</h2>
                    <p class="lead mb-4">
                        Take the first step towards a quality education and a bright future. Apply now to Embeko Secondary School.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="btn btn-light btn-lg">
                            <i class="fas fa-download me-2"></i> Download Application Form
                        </a>
                        <a href="/contact-us" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-question-circle me-2"></i> Have Questions?
                        </a>
                    </div>
                </div>
            </div>',
            'order' => 10,
            'type' => 'html',
        ]);
    }
}
