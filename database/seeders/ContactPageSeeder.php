<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Contact Page
        $contactPage = Page::create([
            'title' => 'Contact Us',
            'slug' => 'contact-us',
            'description' => 'Get in touch with Embeko Secondary School. We\'re here to answer your questions and provide information.',
            'is_published' => true,
            'layout' => 'contact',
            'meta_title' => 'Contact Us - Embeko Secondary School',
            'meta_description' => 'Contact Embeko Secondary School for inquiries about admissions, academics, or general information. We\'re here to help!',
            'meta_keywords' => 'contact, email, phone, address, location, map, inquiry',
        ]);

        // Introduction Section
        PageSection::create([
            'page_id' => $contactPage->id,
            'title' => 'Get in Touch',
            'identifier' => 'introduction',
            'content' => '<p class="lead">
                We\'re here to answer your questions and provide information about our school and programs.
            </p>
            <p>
                Whether you\'re a prospective student, parent, alumnus, or community member, we welcome your inquiries. 
                Our dedicated staff is committed to providing timely and helpful responses to all communications.
            </p>
            <p>
                Please feel free to reach out to us using any of the contact methods below, or visit our campus during office hours.
            </p>',
            'order' => 1,
            'type' => 'html',
        ]);

        // Contact Information Section
        PageSection::create([
            'page_id' => $contactPage->id,
            'title' => 'Contact Information',
            'identifier' => 'contact_info',
            'content' => '<div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-map-marker-alt fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title">Our Location</h5>
                            <p class="card-text">
                                Embeko Secondary School<br>
                                P.O. Box 1234<br>
                                Dodoma, Tanzania
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-phone-alt fa-3x text-success"></i>
                            </div>
                            <h5 class="card-title">Phone Numbers</h5>
                            <p class="card-text">
                                Main Office: +255 123 456 789<br>
                                Admissions: +255 123 456 790<br>
                                Principal\'s Office: +255 123 456 791
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-envelope fa-3x text-info"></i>
                            </div>
                            <h5 class="card-title">Email Addresses</h5>
                            <p class="card-text">
                                General Inquiries: info@embeko.ac.tz<br>
                                Admissions: admissions@embeko.ac.tz<br>
                                Principal: principal@embeko.ac.tz
                            </p>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 2,
            'type' => 'html',
        ]);

        // Office Hours Section
        PageSection::create([
            'page_id' => $contactPage->id,
            'title' => 'Office Hours',
            'identifier' => 'office_hours',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fas fa-clock text-primary me-2"></i> Administrative Office</h5>
                            <ul class="list-unstyled">
                                <li><strong>Monday to Friday:</strong> 8:00 AM - 4:30 PM</li>
                                <li><strong>Saturday:</strong> 9:00 AM - 12:00 PM</li>
                                <li><strong>Sunday & Public Holidays:</strong> Closed</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-user-graduate text-primary me-2"></i> Admissions Office</h5>
                            <ul class="list-unstyled">
                                <li><strong>Monday to Friday:</strong> 8:30 AM - 4:00 PM</li>
                                <li><strong>Saturday:</strong> 9:00 AM - 12:00 PM (By appointment)</li>
                                <li><strong>Sunday & Public Holidays:</strong> Closed</li>
                            </ul>
                        </div>
                    </div>
                    <div class="alert alert-info mt-3 mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note:</strong> During school holidays, office hours may vary. Please call ahead to confirm.
                    </div>
                </div>
            </div>',
            'order' => 3,
            'type' => 'html',
        ]);

        // Contact Form Section
        PageSection::create([
            'page_id' => $contactPage->id,
            'title' => 'Send Us a Message',
            'identifier' => 'contact_form',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="#" method="POST" id="contactForm">
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="Admissions">Admissions Inquiry</option>
                                    <option value="Academics">Academic Information</option>
                                    <option value="Fees">Fees and Payments</option>
                                    <option value="General">General Inquiry</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="alert alert-warning mt-3">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Note:</strong> This contact form is currently for demonstration purposes only. To send an actual message, please use the email addresses or phone numbers provided above.
            </div>',
            'order' => 4,
            'type' => 'html',
        ]);

        // Map Section
        PageSection::create([
            'page_id' => $contactPage->id,
            'title' => 'Find Us',
            'identifier' => 'map',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126303.63167312498!2d35.69081624759726!3d-6.173863754057902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x184de5a8a5f7f3a7%3A0x5cf147a80ed5b159!2sDodoma!5e0!3m2!1sen!2stz!4v1621345678901!5m2!1sen!2stz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="mt-3">
                        <h5><i class="fas fa-directions text-primary me-2"></i> Directions</h5>
                        <p>
                            Embeko Secondary School is located in the eastern part of Dodoma, approximately 5 kilometers from the city center. 
                            The school is easily accessible via public transportation or private vehicle.
                        </p>
                        <ul>
                            <li><strong>From Dodoma Bus Terminal:</strong> Take a daladala (minibus) heading to Kisasa area. The journey takes approximately 15-20 minutes.</li>
                            <li><strong>From Dodoma Airport:</strong> The school is about 10 kilometers from the airport. Taxis are available at the airport for direct transportation.</li>
                        </ul>
                    </div>
                </div>
            </div>',
            'order' => 5,
            'type' => 'html',
        ]);

        // FAQ Section
        PageSection::create([
            'page_id' => $contactPage->id,
            'title' => 'Frequently Asked Questions',
            'identifier' => 'faq',
            'content' => '<div class="accordion" id="contactFAQ">
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            How can I schedule a visit to the school?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#contactFAQ">
                        <div class="accordion-body">
                            You can schedule a visit by calling our admissions office at +255 123 456 790 or by sending an email to admissions@embeko.ac.tz. We offer guided tours of our campus on weekdays between 9:00 AM and 3:00 PM, and on Saturdays by appointment.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How long does it typically take to receive a response to an inquiry?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#contactFAQ">
                        <div class="accordion-body">
                            We strive to respond to all inquiries within 24-48 hours during regular business days. For more complex inquiries that require consultation with specific departments, it may take up to 3-5 business days.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Who should I contact for specific departments or issues?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#contactFAQ">
                        <div class="accordion-body">
                            <ul>
                                <li><strong>Admissions and Enrollment:</strong> admissions@embeko.ac.tz</li>
                                <li><strong>Academic Affairs:</strong> academics@embeko.ac.tz</li>
                                <li><strong>Finance and Fees:</strong> finance@embeko.ac.tz</li>
                                <li><strong>Student Affairs:</strong> studentaffairs@embeko.ac.tz</li>
                                <li><strong>IT Support:</strong> itsupport@embeko.ac.tz</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Is there parking available for visitors?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#contactFAQ">
                        <div class="accordion-body">
                            Yes, we have a designated visitor parking area located near the main entrance of the school. The parking is free for all visitors. Please check in with the security at the gate upon arrival.
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 6,
            'type' => 'accordion',
        ]);
    }
}
