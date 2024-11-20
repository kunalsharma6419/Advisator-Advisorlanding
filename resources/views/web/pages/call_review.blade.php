@extends('web.layouts.app')

@section('maincontent')
    <div class="bg-white">
        @include('web.components.header')
    </div>
    <div class="flex bg-white flex-col w-[90%] mx-auto mt-[24px] p-8 rounded-lg shadow-lg">
        <div class="w-full py-4 font-semibold text-xl flex items-center px-4 gap-4 bg-[#FEFFF6] rounded-md">
            <img class="w-24 h-24"
                src="{{ $advisorProfile->profile_photo_path ? asset('storage/' . $advisorProfile->profile_photo_path) : asset('../src/assets/advisorgeneral.webp') }}"
                alt="{{ $advisorProfile->full_name }}">
            <h5 class="text-[#2A2A2A]">
                Discovery Call with {{ $advisorId }} was Successful!
            </h5>
        </div>

        <p class="font-semibold text-lg mb-8 mt-6">
            Please share your feedback! Your feedback helps us enhance your experience and better meet your needs. Thank you
            for your valuable input!
        </p>

        <form action="{{ route('call.review.store') }}" method="POST" id="feedbackForm">
            <!-- Make sure to set the correct action route -->
            @csrf

            <input type="hidden" name="advisor_id" value="{{ $advisorId }}">
            <div class="flex flex-wrap justify-between mb-8">
                {{-- @foreach (['Overall Experience', 'Reliability', 'Affordability', 'Relevance to Problem'] as $criteria)
                @php
                    $criteriaName = strtolower(str_replace(' ', '_', $criteria));  // Generate unique name for each criterion
                @endphp
                <div class="flex flex-col gap-2 w-full md:w-1/4">
                    <h2 class="font-semibold text-lg">{{ $criteria }}:</h2>
                    <div class="flex items-center">
                        @for ($i = 5; $i >= 1; $i--) <!-- Start from 5 to 1 to reverse the visual order -->
                            <!-- Radio button for each star with unique name and id -->
                            <input type="radio"
                                   name="{{ $criteriaName }}"
                                   value="{{ $i }}"
                                   id="{{ $criteriaName }}_{{ $i }}"
                                   class="hidden peer">

                            <!-- Label for the star with peer-checked styling -->
                            <label for="{{ $criteriaName }}_{{ $i }}"
                                   class="fa fa-star cursor-pointer text-gray-400 peer-checked:text-[#FFD700]"></label>
                        @endfor
                    </div>
                </div>
            @endforeach --}}
                @foreach (['Overall Experience', 'Reliability', 'Affordability', 'Relevance to Problem'] as $criteria)
                    @php
                        $criteriaName = strtolower(str_replace(' ', '_', $criteria)); // Generate unique name for each criterion
                    @endphp
                    <div class="flex flex-col gap-2 w-full md:w-1/4">
                        <h2 class="font-semibold text-lg">{{ $criteria }}:</h2>
                        <div class="flex items-center" data-criteria="{{ $criteriaName }}">
                            <!-- Add data attribute for easy targeting -->
                            @for ($i = 1; $i <= 5; $i++)
                                <!-- Loop from 1 to 5 in natural left-to-right order -->
                                <!-- Radio button for each star with unique name and id -->
                                <input type="radio" name="{{ $criteriaName }}" value="{{ $i }}"
                                    id="{{ $criteriaName }}_{{ $i }}" class="hidden star-radio">

                                <!-- Label for the star with peer-checked styling -->
                                <label for="{{ $criteriaName }}_{{ $i }}"
                                    class="fa fa-star cursor-pointer text-gray-400"
                                    data-value="{{ $i }}"></label>
                            @endfor
                        </div>
                    </div>
                @endforeach



            </div>



            <p class="font-semibold text-lg mt-4">Write your Review:</p>
            <textarea name="review" required class="rounded-md h-40 p-2 border border-[#ABCA74] w-full" placeholder="Write here..."
                spellcheck="false"></textarea>

            <!-- Submit button -->
            <button type="submit"
                class="mt-6 text-lg rounded-lg font-semibold text-white text-center w-full py-3 bg-gradient-to-r from-[#6AA300] to-[#3F5713] hover:bg-[#5B9900] transition duration-200">
                Submit Feedback
            </button>
        </form>
    </div>

    <!-- Bottom Menu Bar -->
    @include('user.components.bottommenu')

    <!-- Footer -->
    @include('user.components.footer')

    <!-- Sidebar -->
    @include('user.components.sidebar')
    <!-- Include SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // JavaScript to handle the star selection and coloring effect
        document.querySelectorAll('[data-criteria]').forEach(container => {
            const stars = container.querySelectorAll('.fa-star');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-value');

                    // Update all stars up to the clicked one
                    stars.forEach(s => {
                        if (s.getAttribute('data-value') <= rating) {
                            s.classList.add('text-[#FFD700]'); // Set star color to gold
                        } else {
                            s.classList.remove('text-[#FFD700]'); // Reset other stars
                        }
                    });
                });
            });
        });

        // SweetAlert for form submission
        document.getElementById('feedbackForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission to show the alert first

            Swal.fire({
                title: 'Thank you!',
                text: 'Your feedback has been submitted successfully.',
                icon: 'success',
                confirmButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit the form after alert is closed
                }
            });
        });
    </script>
@endsection
