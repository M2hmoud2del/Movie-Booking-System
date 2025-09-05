<script>
        // Simple seat selection functionality
        document.addEventListener('DOMContentLoaded', function () {
            const seats = document.querySelectorAll('.seat:not(.occupied)');

            seats.forEach(seat => {
                seat.addEventListener('click', () => {
                    seat.classList.toggle('selected');
                });
            });

            // Set today's date as default for date picker
            const today = new Date();
            const yyyy = today.getFullYear();
            let mm = today.getMonth() + 1;
            let dd = today.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            const formattedToday = `${yyyy}-${mm}-${dd}`;
            document.getElementById('date').value = formattedToday;
        });
        
        
        document.addEventListener('DOMContentLoaded', function () {
            // Date selection functionality
            const dateButtons = document.querySelectorAll('.date-btn');
            dateButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    dateButtons.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                });
                const slides = document.querySelectorAll('.movie-slide');
            const dots = document.querySelectorAll('.dot');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const movieSlides = document.querySelector('.movie-slides');

            let currentSlide = 0;
            const slideCount = slides.length;

            // Function to update slideshow
            function updateSlide() {
                movieSlides.style.transform = `translateX(-${currentSlide * 100}%)`;

                // Update active dot
                dots.forEach((dot, index) => {
                    if (index === currentSlide) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }

            // Next slide
            nextBtn.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % slideCount;
                updateSlide();
            });

            // Previous slide
            prevBtn.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slideCount) % slideCount;
                updateSlide();
            });

            // Dot navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    updateSlide();
                });
            });

            // Auto-play slideshow (optional)
            let slideInterval = setInterval(() => {
                currentSlide = (currentSlide + 1) % slideCount;
                updateSlide();
            }, 5000);

            // Pause auto-play when hovering over slideshow
            const slideshowContainer = document.querySelector('.slideshow-container');
            slideshowContainer.addEventListener('mouseenter', () => {
                clearInterval(slideInterval);
            });

            slideshowContainer.addEventListener('mouseleave', () => {
                slideInterval = setInterval(() => {
                    currentSlide = (currentSlide + 1) % slideCount;
                    updateSlide();
                }, 5000);
            });

            });

            // Filter selection functionality
            const filterButtons = document.querySelectorAll('.filter-btn');
            filterButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    if (!btn.classList.contains('active')) {
                        if (btn.textContent === 'All Movies') {
                            filterButtons.forEach(b => b.classList.remove('active'));
                            btn.classList.add('active');
                        } else {
                            document.querySelector('.filter-btn:first-child').classList.remove(
                                'active');
                            btn.classList.toggle('active');
                        }
                    }
                });
            });

            // Showtime selection functionality
            // const showtimeSlots = document.querySelectorAll('.showtime-slot');
            // showtimeSlots.forEach(slot => {
            //     slot.addEventListener('click', () => {
            //         showtimeSlots.forEach(s => s.classList.remove('selected'));
            //         slot.classList.add('selected');

            //         // In a real app, this would redirect to booking page
            //         setTimeout(() => {
            //         alert('Redirecting to booking page for selected showtime...');
            //         window.location.href = "{{route('user.booking')}}";
            //         }, 300);
            //     });
            // });

            const showtimeButtons = document.querySelectorAll('.showtime-btn');

        showtimeButtons.forEach(button => {
        button.addEventListener('click', () => {
        // Highlight clicked button
        showtimeButtons.forEach(b => b.classList.remove('selected'));
        button.classList.add('selected');

        // Redirect after short delay
        setTimeout(() => {
        window.location.href = "{{route('user.showtimes')}}";
        }, 300);
        });
        });

        

        });
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>