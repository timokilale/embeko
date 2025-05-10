<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create About Us Page
        $aboutPage = Page::create([
            'title' => 'About Us',
            'slug' => 'about-us',
            'description' => 'Learn more about Embeko Secondary School, our history, mission, vision, and values.',
            'is_published' => true,
            'layout' => 'about',
            'meta_title' => 'About Us - Embeko Secondary School',
            'meta_description' => 'Embeko Secondary School is committed to providing quality education and nurturing well-rounded individuals.',
            'meta_keywords' => 'about, history, mission, vision, values, school, education',
        ]);

        // Introduction Section
        PageSection::create([
            'page_id' => $aboutPage->id,
            'title' => 'Welcome to Embeko Secondary School',
            'identifier' => 'introduction',
            'content' => '<p class="lead">
                Embeko Secondary School is a premier educational institution dedicated to academic excellence and character development.
            </p>
            <p>
                Founded in 2005, Embeko Secondary School has established itself as a center of academic excellence and holistic education. 
                Our school provides a nurturing environment where students can develop their intellectual, physical, social, and moral capabilities.
            </p>
            <p>
                At Embeko, we believe that education goes beyond the classroom. We are committed to developing well-rounded individuals who are 
                not only academically proficient but also socially responsible and morally upright. Our comprehensive curriculum and diverse 
                extracurricular activities ensure that students receive a balanced education that prepares them for future challenges.
            </p>',
            'order' => 1,
            'type' => 'html',
        ]);

        // Mission Section
        PageSection::create([
            'page_id' => $aboutPage->id,
            'title' => 'Our Mission',
            'identifier' => 'mission',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-bullseye fa-2x text-primary me-3"></i>
                        <h4 class="mb-0">Mission Statement</h4>
                    </div>
                    <p class="mb-0">
                        To provide quality education that nurtures intellectual curiosity, critical thinking, and moral values, 
                        empowering students to become responsible global citizens who contribute positively to society.
                    </p>
                </div>
            </div>',
            'order' => 2,
            'type' => 'html',
        ]);

        // Vision Section
        PageSection::create([
            'page_id' => $aboutPage->id,
            'title' => 'Our Vision',
            'identifier' => 'vision',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-eye fa-2x text-success me-3"></i>
                        <h4 class="mb-0">Vision Statement</h4>
                    </div>
                    <p class="mb-0">
                        To be a leading educational institution that inspires excellence, fosters innovation, and cultivates 
                        ethical leadership, preparing students to thrive in a rapidly changing global environment.
                    </p>
                </div>
            </div>',
            'order' => 3,
            'type' => 'html',
        ]);

        // Core Values Section
        PageSection::create([
            'page_id' => $aboutPage->id,
            'title' => 'Our Core Values',
            'identifier' => 'values',
            'content' => '<div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-brain fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title">Excellence</h5>
                            <p class="card-text">
                                We strive for excellence in all aspects of education, encouraging students to reach their full potential.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-balance-scale fa-3x text-success"></i>
                            </div>
                            <h5 class="card-title">Integrity</h5>
                            <p class="card-text">
                                We uphold the highest standards of honesty, ethics, and transparency in all our actions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-users fa-3x text-info"></i>
                            </div>
                            <h5 class="card-title">Respect</h5>
                            <p class="card-text">
                                We foster a culture of mutual respect, embracing diversity and valuing each individual\'s unique contributions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-lightbulb fa-3x text-warning"></i>
                            </div>
                            <h5 class="card-title">Innovation</h5>
                            <p class="card-text">
                                We encourage creative thinking and innovative approaches to learning and problem-solving.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-hands-helping fa-3x text-danger"></i>
                            </div>
                            <h5 class="card-title">Responsibility</h5>
                            <p class="card-text">
                                We instill a sense of personal and social responsibility, preparing students to be active citizens.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-heart fa-3x text-danger"></i>
                            </div>
                            <h5 class="card-title">Compassion</h5>
                            <p class="card-text">
                                We nurture empathy and compassion, encouraging students to care for others and their community.
                            </p>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 4,
            'type' => 'html',
        ]);

        // History Section
        PageSection::create([
            'page_id' => $aboutPage->id,
            'title' => 'Our History',
            'identifier' => 'history',
            'content' => '<div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p>
                        Embeko Secondary School was founded in 2005 by a group of dedicated educators and community leaders who recognized 
                        the need for a quality educational institution in the region. Starting with just 120 students and 8 teachers, 
                        the school has grown significantly over the years.
                    </p>
                    <div class="timeline mt-4">
                        <div class="timeline-item">
                            <div class="timeline-year">2005</div>
                            <div class="timeline-content">
                                <h5>Foundation</h5>
                                <p>Embeko Secondary School was established with a vision to provide quality education to the community.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2008</div>
                            <div class="timeline-content">
                                <h5>First Graduating Class</h5>
                                <p>Our first batch of students graduated with excellent results, setting a high standard for future classes.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2010</div>
                            <div class="timeline-content">
                                <h5>Expansion</h5>
                                <p>The school expanded its facilities to include new classrooms, laboratories, and a library.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2015</div>
                            <div class="timeline-content">
                                <h5>Advanced Level Introduction</h5>
                                <p>Embeko introduced Advanced Level education, offering a wider range of subjects and opportunities.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2020</div>
                            <div class="timeline-content">
                                <h5>Modern Campus</h5>
                                <p>Completion of our modern campus with state-of-the-art facilities to enhance the learning experience.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">Today</div>
                            <div class="timeline-content">
                                <h5>Continuing Excellence</h5>
                                <p>Embeko continues to be a center of academic excellence, producing well-rounded graduates who excel in various fields.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 5,
            'type' => 'html',
        ]);

        // Leadership Section
        PageSection::create([
            'page_id' => $aboutPage->id,
            'title' => 'School Leadership',
            'identifier' => 'leadership',
            'content' => '<div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="/images/principal.jpg" alt="Principal" class="rounded-circle img-fluid mx-auto d-block" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <h5 class="card-title">Dr. James Mwangi</h5>
                            <p class="text-muted">Principal</p>
                            <p class="card-text">
                                Dr. Mwangi has over 20 years of experience in education and holds a Ph.D. in Educational Leadership.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="/images/deputy.jpg" alt="Deputy Principal" class="rounded-circle img-fluid mx-auto d-block" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <h5 class="card-title">Mrs. Sarah Ochieng</h5>
                            <p class="text-muted">Deputy Principal, Academics</p>
                            <p class="card-text">
                                Mrs. Ochieng oversees the academic programs and curriculum development at Embeko.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="/images/admin.jpg" alt="Administrator" class="rounded-circle img-fluid mx-auto d-block" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <h5 class="card-title">Mr. David Kamau</h5>
                            <p class="text-muted">Deputy Principal, Administration</p>
                            <p class="card-text">
                                Mr. Kamau manages the administrative functions and student affairs at the school.
                            </p>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 6,
            'type' => 'html',
        ]);

        // Achievements Section
        PageSection::create([
            'page_id' => $aboutPage->id,
            'title' => 'Our Achievements',
            'identifier' => 'achievements',
            'content' => '<div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Academic Excellence</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-trophy text-warning me-3"></i>
                                    <span>Consistently ranked among the top 10 schools in national examinations</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-medal text-warning me-3"></i>
                                    <span>Over 90% of our graduates proceed to higher education</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-award text-warning me-3"></i>
                                    <span>National Science Competition winners for three consecutive years</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-star text-warning me-3"></i>
                                    <span>Regional Mathematics Olympiad champions</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Co-curricular Achievements</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-futbol text-success me-3"></i>
                                    <span>National Soccer Tournament finalists 2022</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-music text-success me-3"></i>
                                    <span>National Music Festival winners in choral and instrumental categories</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-theater-masks text-success me-3"></i>
                                    <span>Drama Festival regional champions</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-paint-brush text-success me-3"></i>
                                    <span>National Art Exhibition gold medalists</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>',
            'order' => 7,
            'type' => 'html',
        ]);
    }
}
