<div class="map-container">
    <div class="map-header">
        <h5 class="map-title">Our Location</h5>
        <button class="map-toggle-btn" id="toggleMap">
            <i class="fas fa-chevron-down toggle-icon"></i>
            <span class="toggle-text">Expand Map</span>
        </button>
    </div>
    <div class="map-wrapper" id="mapWrapper">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe
                    class="gmap_iframe"
                    frameborder="0"
                    scrolling="no"
                    marginheight="0"
                    marginwidth="0"
                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=embeko secondary school&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                ></iframe>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('toggleMap');
        const mapWrapper = document.getElementById('mapWrapper');
        const toggleIcon = document.querySelector('.toggle-icon');
        const toggleText = document.querySelector('.toggle-text');
        
        if (toggleBtn && mapWrapper) {
            toggleBtn.addEventListener('click', function() {
                mapWrapper.classList.toggle('expanded');
                
                if (mapWrapper.classList.contains('expanded')) {
                    toggleIcon.classList.remove('fa-chevron-down');
                    toggleIcon.classList.add('fa-chevron-up');
                    toggleText.textContent = 'Collapse Map';
                } else {
                    toggleIcon.classList.remove('fa-chevron-up');
                    toggleIcon.classList.add('fa-chevron-down');
                    toggleText.textContent = 'Expand Map';
                }
            });
        }
    });
</script>
@endpush
