<div class="card mt-3">
    <div class="card-body p-0">
        <div class="welcome-message">
            @if(isset($welcomeMessage))
                <!-- Head of School image with text wrap -->
                <div class="welcome-header">
                    @if($welcomeMessage->image)
                        <img src="{{ asset('storage/' . $welcomeMessage->image) }}" class="welcome-image" alt="{{ $welcomeMessage->title }}" />
                    @endif
                    <h5 class="card-title mb-3">{{ $welcomeMessage->title }}</h5>
                    {!! $welcomeMessage->content !!}
                </div>

                @if($welcomeMessage->author_name)
                    <footer class="blockquote-footer mt-3">
                        <strong>{{ $welcomeMessage->author_name }}</strong><br />
                        {{ $welcomeMessage->author_title }}
                    </footer>
                @endif
            @else
                <!-- Default welcome message if none is set in the database -->
                <div class="welcome-header">
                    <img src="{{ asset('images/manager.jpg') }}" class="welcome-image" alt="Head of School" />
                    <h5 class="card-title mb-3">Welcome to Embeko Secondary School!</h5>
                    <p class="card-text">
                        On behalf of the entire Embeko Secondary School community, I am delighted to welcome you to our website. Whether you are a prospective student, a parent, an alumnus, or a visitor, we are thrilled to have you explore our vibrant and dynamic learning environment.
                    </p>
                    <p class="card-text">
                        At Embeko Secondary, we are committed to fostering excellence in both academics and character development. Our dedicated staff and vibrant student body work together to create a nurturing, inclusive, and innovative atmosphere where every student has the opportunity to succeed and grow.
                    </p>
                </div>

                <p class="card-text">
                    We invite you to explore all that our school has to offer, from our rigorous academic programs to our extracurricular activities that help shape well-rounded individuals. Your visit here is a testament to the interest and support for our school's mission and values, and we thank you for your time.
                </p>
                <p class="card-text">
                    Thank you once again for visiting, and we look forward to welcoming you to Embeko Secondary School.
                </p>
                <footer class="blockquote-footer mt-3">
                    <strong>Siara E.C</strong><br />
                    Head of School, Embeko Secondary School
                </footer>
            @endif
        </div>
    </div>
</div>

<style>
.welcome-message {
    padding: 1.25rem;
}

.welcome-header {
    position: relative;
    margin-bottom: 1rem;
}

.welcome-image {
    float: left;
    max-width: 200px;
    margin-right: 1.5rem;
    margin-bottom: 0.5rem;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

@media (max-width: 576px) {
    .welcome-image {
        float: none;
        display: block;
        margin: 0 auto 1rem;
        max-width: 100%;
        height: auto;
    }
}
</style>
