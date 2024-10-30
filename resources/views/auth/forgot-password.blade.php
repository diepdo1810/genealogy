@section('title')
    &vert; {{ __('auth.forgot_password') }}
@endsection

<x-app-layout>
    <x-slot name="heading">
        {{ __('auth.forgot_password') }}
    </x-slot>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {!! __('auth.forgot_password_message') !!}
        </div>



    @if (session('status'))
            <div class="mb-4 text-sm font-medium text-emerald-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('auth.email') }} :" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-ts-button type="submit" color="primary">
                    {{ __('auth.email_password_reset_link') }}
                </x-ts-button>
            </div>
        </form>

        {{-- FAQ --}}
        <section class="py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mb-16">
                    <h6 class="text-lg text-indigo-600 font-medium text-center mb-2">
                        FAQs
                    </h6>
                    <h1
                        class="text-4xl font-manrope text-center font-bold text-gray-900 leading-[3.25rem]"
                    >
                        {{ __('auth.faq_label') }}
                    </h1>
                </div>

                <div class="accordion-group" data-accordion="default-accordion">
                    <div
                        class="accordion py-8 px-6 border-b border-solid border-gray-200 transition-all duration-500 rounded-2xl hover:bg-indigo-50 accordion-active:bg-indigo-50 active"
                        id="basic-heading-one-with-arrow"
                    >
                        <button
                            class="accordion-toggle group inline-flex items-center justify-between leading-8 text-gray-900 w-full transition duration-500 text-left hover:text-indigo-600 accordion-active:font-medium accordion-active:text-indigo-600"
                            aria-controls="basic-collapse-one-with-arrow"
                        >
                            <h5>{{ __('auth.faq_question_1') }}</h5>
                            <svg
                                class="text-gray-500 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>
                        </button>
                        <div
                            id="basic-collapse-one-with-arrow"
                            class="accordion-content w-full px-0 overflow-hidden"
                            aria-labelledby="basic-heading-one-with-arrow"
                            style="max-height: 250px;"
                        >
                            <p class="text-base text-gray-900 font-extrabold leading-6">
                                {{ __('auth.faq_answer_1') }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="accordion py-8 px-6 border-b border-solid border-gray-200 transition-all duration-500 rounded-2xl hover:bg-indigo-50 accordion-active:bg-indigo-50"
                        id="basic-heading-two-with-arrow"
                    >
                        <button
                            class="accordion-toggle group inline-flex items-center justify-between leading-8 text-gray-900 w-full transition duration-500 text-left hover:text-indigo-600 accordion-active:text-indigo-600"
                            aria-controls="basic-collapse-two-with-arrow"
                        >
                            <h5>{{ __('auth.faq_question_2') }}</h5>
                            <svg
                                class="text-gray-500 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180"
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>
                        </button>
                        <div
                            id="basic-collapse-two-with-arrow"
                            class="accordion-content w-full px-0 overflow-hidden"
                            aria-labelledby="basic-heading-two-with-arrow"
                        >
                            <p class="text-base text-gray-900 font-extrabold leading-6">
                                {{ __('auth.faq_answer_2') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-authentication-card>

</x-app-layout>
