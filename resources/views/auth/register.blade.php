<x-app-layout title="Register" >
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        {{--Displaying any validation errors if have--}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                         autofocus autocomplete="name" />
            </div>
            {{--email validation --}}
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                         required autocomplete="username" />
            </div>

            {{--Additional Fields displaying for the conditions based on the user input --}}
            {{-- If any user with a common mail identifying them as Alumni and ask for the NIC validation--}}
            <div class="mt-4" id="nicField" style="display: none;">
                <x-label for="nic" value="{{ __('NIC Number') }}" />
                <x-input id="nic" class="block mt-1 w-full" type="text" name="nic" :value="old('nic')" autocomplete="nic" />
            </div>
            {{--Students who entering their student mail identifying them as
             students and requesting fields like School and the academic year --}}
            <div class="mt-4" id="schoolField" style="display: none;">
                <x-label for="school" value="{{ __('School') }}" />
                <select id="school_id" name="school_id" class="block mt-1 w-full">
                    <option value="">Select School</option>
                    <option value="1">Law School</option>
                    <option value="2">Business School</option>
                    <option value="3">Computing School</option>
                </select>
            </div>

            <div class="mt-4" id="yearField" style="display: none;">
                <x-label for="year" value="{{ __('Year Level') }}" />
                <select id="year_id" name="year_id" class="block mt-1 w-full">
                    <option value="">Select Year Level</option>
                    <option value="1">Level 4</option>
                    <option value="2">Level 5</option>
                    <option value="3">Level 6</option>
                </select>
            </div>
            {{--Identifying the staff and lecturers with apiit mail address--}}
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                         autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                         name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>

<!-- JavaScript to toggle fields based on email input -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    // Use jQuery's document ready event
    $(document).ready(function() {
        // Select elements using jQuery instead of getElementById
        const emailInput = $('#email');
        const nicField = $('#nicField');
        const schoolField = $('#schoolField');
        const yearField = $('#yearField');

        // Function to toggle field visibility based on email value
        function toggleFieldsVisibility(emailValue) {
            // Check if the email ends with students.apiit.lk
            const pattern = /^[^\s@]+@students\.apiit\.lk$/;
            const excludePattern = /@apiit\.lk$/;

            if (!pattern.test(emailValue) && !excludePattern.test(emailValue)) {
                nicField.css('display', 'block');
                schoolField.css('display', 'none');
                yearField.css('display', 'none');
            } else {
                nicField.css('display', 'none');
                if (pattern.test(emailValue)) {
                    schoolField.css('display', 'block');
                    yearField.css('display', 'block');
                } else {
                    schoolField.css('display', 'none');
                    yearField.css('display', 'none');
                }
            }
        }

        // Check email input value when the page loads
        toggleFieldsVisibility(emailInput.val().toLowerCase());

        // Attach event listener to the email input using jQuery
        emailInput.on('input', function(event) {
            const emailValue = emailInput.val().toLowerCase();
            toggleFieldsVisibility(emailValue);
        });
    });
</script>
