<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Academics Page
        $academicsPage = Page::create([
            'title' => 'Academics',
            'slug' => 'academics',
            'description' => 'Explore our academic programs, curriculum, and educational approach at Embeko Secondary School.',
            'is_published' => true,
            'layout' => 'academics',
            'meta_title' => 'Academics - Embeko Secondary School',
            'meta_description' => 'Discover our comprehensive academic programs, curriculum, and educational philosophy at Embeko Secondary School.',
            'meta_keywords' => 'academics, curriculum, subjects, programs, education, learning, teaching',
        ]);

        // Introduction Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Academic Excellence',
            'identifier' => 'introduction',
            'content' => '<p class="lead">
                At Embeko Secondary School, we are committed to providing a rigorous and comprehensive academic program that prepares students for success in higher education and beyond.
            </p>
            <p>
                Our curriculum is designed to challenge students intellectually while fostering critical thinking, creativity, and a love for learning. 
                We believe in a holistic approach to education that develops not only academic knowledge but also character, leadership, and social responsibility.
            </p>
            <p>
                Our dedicated faculty members are experts in their fields and are committed to helping each student reach their full potential. 
                With small class sizes and personalized attention, we ensure that every student receives the support they need to excel academically.
            </p>',
            'order' => 1,
            'type' => 'html',
        ]);

        // Curriculum Overview Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Curriculum Overview',
            'identifier' => 'curriculum_overview',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Embeko Secondary School follows the Tanzania National Curriculum, which is designed to provide students with a well-rounded education. 
                        Our curriculum is enhanced with additional resources and teaching methodologies to ensure our students receive an education that meets international standards.
                    </p>
                    <p>
                        We offer both Ordinary Level (O-Level) for Form 1-4 and Advanced Level (A-Level) for Form 5-6. Our curriculum is designed to:
                    </p>
                    <ul>
                        <li>Develop strong foundational knowledge across all subject areas</li>
                        <li>Foster critical thinking and problem-solving skills</li>
                        <li>Encourage creativity and innovation</li>
                        <li>Promote effective communication skills</li>
                        <li>Build character and leadership qualities</li>
                        <li>Prepare students for national examinations and higher education</li>
                    </ul>
                </div>
            </div>',
            'order' => 2,
            'type' => 'html',
        ]);

        // O-Level Program Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Ordinary Level (O-Level) Program',
            'identifier' => 'o_level',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Our O-Level program (Form 1-4) provides students with a strong foundation in core subjects while allowing them to explore their interests and talents.
                    </p>
                    <h5 class="mt-4">Core Subjects</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li>Mathematics</li>
                                <li>English Language</li>
                                <li>Kiswahili</li>
                                <li>Biology</li>
                                <li>Chemistry</li>
                                <li>Physics</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>History</li>
                                <li>Geography</li>
                                <li>Civics</li>
                                <li>Book-keeping</li>
                                <li>Commerce</li>
                                <li>Computer Studies</li>
                            </ul>
                        </div>
                    </div>
                    <h5 class="mt-4">Subject Combinations</h5>
                    <p>
                        Students are required to take all core subjects in Form 1 and 2. In Form 3 and 4, they select subject combinations based on their interests and career aspirations:
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>Combination</th>
                                    <th>Subjects</th>
                                    <th>Career Pathways</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PCM</td>
                                    <td>Physics, Chemistry, Mathematics</td>
                                    <td>Engineering, Medicine, Architecture</td>
                                </tr>
                                <tr>
                                    <td>PCB</td>
                                    <td>Physics, Chemistry, Biology</td>
                                    <td>Medicine, Pharmacy, Veterinary Science</td>
                                </tr>
                                <tr>
                                    <td>CBG</td>
                                    <td>Chemistry, Biology, Geography</td>
                                    <td>Environmental Science, Agriculture</td>
                                </tr>
                                <tr>
                                    <td>HGK</td>
                                    <td>History, Geography, Kiswahili</td>
                                    <td>Law, International Relations, Journalism</td>
                                </tr>
                                <tr>
                                    <td>ECA</td>
                                    <td>Economics, Commerce, Accounting</td>
                                    <td>Business, Finance, Accounting</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>',
            'order' => 3,
            'type' => 'html',
        ]);

        // A-Level Program Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Advanced Level (A-Level) Program',
            'identifier' => 'a_level',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Our A-Level program (Form 5-6) offers specialized subject combinations that prepare students for university education and future careers. 
                        Students select three principal subjects based on their career goals and academic strengths.
                    </p>
                    <h5 class="mt-4">Available Subject Combinations</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Combination</th>
                                    <th>Subjects</th>
                                    <th>Career Pathways</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PCM</td>
                                    <td>Physics, Chemistry, Mathematics</td>
                                    <td>Engineering, Computer Science, Mathematics</td>
                                </tr>
                                <tr>
                                    <td>PCB</td>
                                    <td>Physics, Chemistry, Biology</td>
                                    <td>Medicine, Dentistry, Pharmacy</td>
                                </tr>
                                <tr>
                                    <td>CBG</td>
                                    <td>Chemistry, Biology, Geography</td>
                                    <td>Environmental Science, Agriculture, Forestry</td>
                                </tr>
                                <tr>
                                    <td>HGE</td>
                                    <td>History, Geography, Economics</td>
                                    <td>Law, International Relations, Political Science</td>
                                </tr>
                                <tr>
                                    <td>ECA</td>
                                    <td>Economics, Commerce, Accounting</td>
                                    <td>Business Administration, Finance, Banking</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="mt-4">
                        In addition to the three principal subjects, all A-Level students take General Studies and Basic Applied Mathematics as subsidiary subjects.
                    </p>
                </div>
            </div>',
            'order' => 4,
            'type' => 'html',
        ]);

        // Teaching Approach Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Our Teaching Approach',
            'identifier' => 'teaching_approach',
            'content' => '<div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-chalkboard-teacher text-primary me-2"></i> Student-Centered Learning</h5>
                            <p class="card-text">
                                We believe in placing students at the center of the learning process. Our teachers act as facilitators, guiding students to discover knowledge rather than simply receiving it. This approach encourages active participation, critical thinking, and a deeper understanding of concepts.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-laptop text-primary me-2"></i> Technology Integration</h5>
                            <p class="card-text">
                                We integrate modern technology into our teaching to enhance learning experiences. Our classrooms are equipped with digital resources, and students have access to computer labs and online learning platforms that supplement traditional teaching methods.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users text-primary me-2"></i> Collaborative Learning</h5>
                            <p class="card-text">
                                We encourage collaboration among students through group projects, discussions, and peer teaching. This approach helps develop teamwork, communication skills, and the ability to work effectively with others—essential skills for future success.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-book-reader text-primary me-2"></i> Personalized Attention</h5>
                            <p class="card-text">
                                With our small class sizes, teachers can provide personalized attention to each student. We recognize that every student has unique learning styles, strengths, and areas for improvement, and we tailor our approach accordingly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 5,
            'type' => 'html',
        ]);

        // Academic Support Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Academic Support',
            'identifier' => 'academic_support',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        We are committed to helping every student succeed academically. We offer various support services to ensure that all students can reach their full potential:
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-user-graduate text-success me-2"></i> Tutoring Program</h5>
                            <p>
                                Our tutoring program provides additional support for students who need help in specific subjects. Tutoring sessions are conducted by teachers and high-performing senior students.
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-book-open text-success me-2"></i> Study Groups</h5>
                            <p>
                                We facilitate study groups where students can work together on assignments, prepare for exams, and help each other understand difficult concepts.
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-clock text-success me-2"></i> Extended Study Hours</h5>
                            <p>
                                Our library and study halls remain open after regular school hours, providing a quiet and conducive environment for students to study and complete assignments.
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-chalkboard text-success me-2"></i> Remedial Classes</h5>
                            <p>
                                We offer remedial classes for students who need additional instruction to master challenging topics or catch up on missed lessons.
                            </p>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 6,
            'type' => 'html',
        ]);

        // Assessment and Evaluation Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Assessment and Evaluation',
            'identifier' => 'assessment',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        We employ a comprehensive assessment system to monitor student progress and provide timely feedback. Our assessment approach includes:
                    </p>
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item">
                            <h5><i class="fas fa-tasks text-primary me-2"></i> Continuous Assessment</h5>
                            <p class="mb-0">
                                Regular quizzes, assignments, and class participation are used to assess student understanding throughout the term. This ongoing assessment accounts for 30% of the final grade.
                            </p>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="fas fa-file-alt text-primary me-2"></i> Mid-Term Examinations</h5>
                            <p class="mb-0">
                                Mid-term exams are conducted halfway through each term to evaluate student progress and identify areas that need additional attention.
                            </p>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="fas fa-graduation-cap text-primary me-2"></i> End-of-Term Examinations</h5>
                            <p class="mb-0">
                                Comprehensive examinations are administered at the end of each term, accounting for 70% of the final grade.
                            </p>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="fas fa-chart-line text-primary me-2"></i> Progress Reports</h5>
                            <p class="mb-0">
                                Detailed progress reports are issued to parents at the end of each term, providing information on academic performance, behavior, and areas for improvement.
                            </p>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="fas fa-comments text-primary me-2"></i> Parent-Teacher Conferences</h5>
                            <p class="mb-0">
                                Regular parent-teacher conferences are held to discuss student progress and collaborate on strategies for improvement.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>',
            'order' => 7,
            'type' => 'html',
        ]);

        // Academic Facilities Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Academic Facilities',
            'identifier' => 'facilities',
            'content' => '<div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/images/library.jpg" class="card-img-top" alt="Library">
                        <div class="card-body">
                            <h5 class="card-title">Library</h5>
                            <p class="card-text">
                                Our well-stocked library contains over 10,000 books, journals, and digital resources. It provides a quiet space for reading, research, and study.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/images/science-lab.jpg" class="card-img-top" alt="Science Laboratories">
                        <div class="card-body">
                            <h5 class="card-title">Science Laboratories</h5>
                            <p class="card-text">
                                We have fully equipped physics, chemistry, and biology laboratories where students conduct experiments and apply theoretical knowledge.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/images/computer-lab.jpg" class="card-img-top" alt="Computer Laboratory">
                        <div class="card-body">
                            <h5 class="card-title">Computer Laboratory</h5>
                            <p class="card-text">
                                Our computer lab is equipped with modern computers and internet access, allowing students to develop digital literacy and research skills.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/images/smart-classroom.jpg" class="card-img-top" alt="Smart Classrooms">
                        <div class="card-body">
                            <h5 class="card-title">Smart Classrooms</h5>
                            <p class="card-text">
                                Our classrooms are equipped with digital projectors, interactive whiteboards, and audio systems to enhance the learning experience.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/images/language-lab.jpg" class="card-img-top" alt="Language Laboratory">
                        <div class="card-body">
                            <h5 class="card-title">Language Laboratory</h5>
                            <p class="card-text">
                                Our language lab helps students improve their listening and speaking skills in English and Kiswahili through interactive audio-visual resources.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/images/study-hall.jpg" class="card-img-top" alt="Study Halls">
                        <div class="card-body">
                            <h5 class="card-title">Study Halls</h5>
                            <p class="card-text">
                                Dedicated study halls provide quiet spaces for individual study and group discussions outside of regular class hours.
                            </p>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 8,
            'type' => 'html',
        ]);

        // Academic Calendar Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Academic Calendar',
            'identifier' => 'calendar',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Our academic year is divided into three terms. Here is the general schedule for the current academic year:
                    </p>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead class="table-info">
                                <tr>
                                    <th>Term</th>
                                    <th>Duration</th>
                                    <th>Key Events</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>First Term</strong></td>
                                    <td>January - March</td>
                                    <td>
                                        <ul>
                                            <li>Opening Day: January 9</li>
                                            <li>Mid-Term Exams: February 13-17</li>
                                            <li>Parent-Teacher Conference: February 25</li>
                                            <li>End-of-Term Exams: March 20-24</li>
                                            <li>Term Break: March 25 - April 9</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Second Term</strong></td>
                                    <td>April - June</td>
                                    <td>
                                        <ul>
                                            <li>Opening Day: April 10</li>
                                            <li>Mid-Term Exams: May 15-19</li>
                                            <li>Parent-Teacher Conference: May 27</li>
                                            <li>End-of-Term Exams: June 19-23</li>
                                            <li>Term Break: June 24 - July 9</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Third Term</strong></td>
                                    <td>July - September</td>
                                    <td>
                                        <ul>
                                            <li>Opening Day: July 10</li>
                                            <li>Mid-Term Exams: August 14-18</li>
                                            <li>Parent-Teacher Conference: August 26</li>
                                            <li>End-of-Term Exams: September 18-22</li>
                                            <li>Annual Prize Giving Day: September 29</li>
                                            <li>Long Holiday: September 30 - January 8</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note:</strong> This calendar is subject to change. Any modifications will be communicated to parents and students in advance.
                    </div>
                </div>
            </div>',
            'order' => 9,
            'type' => 'html',
        ]);

        // FAQ Section
        PageSection::create([
            'page_id' => $academicsPage->id,
            'title' => 'Frequently Asked Questions',
            'identifier' => 'faq',
            'content' => '<div class="accordion" id="academicsFAQ">
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is the average class size at Embeko Secondary School?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#academicsFAQ">
                        <div class="accordion-body">
                            Our average class size is 30 students. We maintain this relatively small class size to ensure that each student receives adequate attention and support from teachers.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How does the school prepare students for national examinations?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#academicsFAQ">
                        <div class="accordion-body">
                            We prepare students for national examinations through comprehensive coverage of the curriculum, regular practice with past examination papers, intensive revision sessions, and mock examinations. Our teachers are experienced in examination techniques and provide targeted guidance to help students perform at their best.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Can students change their subject combinations after selection?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#academicsFAQ">
                        <div class="accordion-body">
                            Yes, students can request to change their subject combinations within the first two weeks of the academic year. Such requests are considered on a case-by-case basis, taking into account the student\'s academic performance, available space in the desired combination, and the feasibility of catching up with any missed lessons.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            How does the school accommodate students with different learning abilities?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#academicsFAQ">
                        <div class="accordion-body">
                            We recognize that students have different learning abilities and styles. Our teachers employ differentiated instruction techniques to accommodate various learning needs. We offer additional support through our tutoring program, remedial classes, and personalized learning plans for students who need extra help or enrichment.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            What extracurricular activities complement the academic program?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#academicsFAQ">
                        <div class="accordion-body">
                            We offer a wide range of extracurricular activities that complement our academic program, including sports (soccer, basketball, volleyball, athletics), clubs (debate, science, mathematics, drama, music), community service projects, and leadership development programs. These activities help students develop important skills and discover their talents outside the classroom.
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 10,
            'type' => 'accordion',
        ]);
    }
}
