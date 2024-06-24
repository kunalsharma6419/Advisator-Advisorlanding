@extends('landing.layouts.app')

@section('landingcontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- Header -->
        @include('landing.components.header')

        <!-- Main Content -->
        <div
            class="flex flex-col font-sans text-[#2A2A2A] w-[90%] md:w-[95%] lg:w-[90%] mx-auto mt-[24px] pt-2 lg:pt-8 rounded">
            <div>
                <h3 class="text-2xl font-bold">Onboarding Policy</h3>
                <p class="mt-2">Last Updated: Jun 23 2024</p>

                <p class="mt-4">Thank you for visiting the Privacy Policy of SHIFT 180 BUSINESS ADVISORY AND SERVICES
                    PRIVATE LIMITED. This Privacy Policy explains how SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE
                    LIMITED (collectively, “SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED”, “we”, “us”, or “our”)
                    collects, uses, and shares information about you (“you”, “yours” or “user”) when you access or use our
                    websites (“Services”).</p>
                <p class="mt-2">Users are responsible for any third-party data they provide or share through the Services
                    and confirm that they have the third-party's consent to provide such data to us.</p>

                <h3 class="text-xl font-semibold mt-6">Information We Collect</h3>
                <p class="mt-2">We may collect and combine information about you when you access or use the Services,
                    including:</p>
                <p class="mt-2"><strong>Contact Information:</strong></p>
                <ul class="list-disc list-inside mt-2">
                    <li>address (street address, city, state, zip code)</li>
                </ul>
                <p class="mt-2"><strong>Account Information:</strong> if you create an account on the Services, we collect
                    the information you provide to us related to the account, such as first and last name, username,
                    password, and email address.</p>
                <p class="mt-2"><strong>Transactional Information:</strong> such as items placed in your cart, products
                    purchased, product details, shipping information, purchase price, purchased date and payment
                    information.</p>

                <h3 class="text-xl font-semibold mt-6">How We Use Your Information</h3>
                <p class="mt-2">We use information we collect about you to provide, maintain, and improve our Services and
                    other interactions we have with you. For example, we use the information collected to:</p>
                <ul class="list-disc list-inside mt-2">
                    <li>Facilitate and improve our online experience;</li>
                    <li>Provide and deliver products and services, perform authentication, process transactions and returns,
                        and send you related information, including confirmations, receipts, invoices, customer experience
                        surveys, and product or Services-related notices;</li>
                    <li>Process and deliver promotions;</li>
                    <li>Respond to your comments and questions and provide customer service;</li>
                    <li>If you have indicated to us that you wish to receive notifications or promotional messages;</li>
                    <li>Detect, investigate and prevent fraudulent transactions and other illegal activities and protect our
                        rights and property and others;</li>
                    <li>Comply with our legal and financial obligations;</li>
                    <li>Monitor and analyze trends, usage, and activities;</li>
                    <li>Provide and allow our partners to provide advertising and marketing targeted toward your interests.
                    </li>
                </ul>

                <h3 class="text-xl font-semibold mt-6">How We May Share Information</h3>
                <p class="mt-2">We may share your Personal Information in the following situations:</p>
                <ul class="list-disc list-inside mt-2">
                    <li><strong>Third Party Services Providers:</strong> We may share data with service providers, vendors,
                        contractors, or agents who complete transactions or perform services on our behalf, such as those
                        that assist us with our business and internal operations like shipping and delivery, payment
                        processing, fraud prevention, customer service, gift cards, experiences, personalization, marketing,
                        and advertising;</li>
                    <li><strong>Change in Business:</strong> We may share data in connection with a corporate business
                        transaction, such as a merger or acquisition of all or a portion of our business to another company,
                        joint venture, corporate reorganization, insolvency or bankruptcy, financing or sale of company
                        assets;</li>
                    <li><strong>To Comply with Law:</strong> We may share data to facilitate legal process from lawful
                        requests by public authorities, including to meet national security or law enforcement demands as
                        permitted by law.</li>
                    <li><strong>With Your Consent:</strong> We may share data with third parties when we have your consent.
                    </li>
                    <li><strong>With Advertising and Analytics Partners:</strong> See the section entitled “Advertising and
                        Analytics” below.</li>
                </ul>

                <h3 class="text-xl font-semibold mt-6">Advertising and Analytics</h3>
                <p class="mt-2">We use advertising and analytics technologies to better understand your online activity on
                    our Services to provide personalized products and services that may interest you.</p>
                <p class="mt-2">We may allow third-party companies, including ad networks, to serve advertisements,
                    provide other advertising services and/or collect certain information when you visit our website.
                    Third-party companies may use pseudonymized personal data (e.g., click stream information, browser type,
                    time and date, subject of advertisements clicked or scrolled over) during your visit to this website in
                    order to provide advertisements about goods and services likely to be of interest to you, on this
                    website and others. To learn more about Interest-Based Advertising or to opt-out of this type of
                    advertising, you can visit <a href="http://optout.aboutads.info/?c=2&lang=EN"
                        class="text-blue-500 underline">AboutAds.info/choices</a> or <a
                        href="http://optout.networkadvertising.org/?c=1"
                        class="text-blue-500 underline">www.networkadvertising.org/choices</a>.</p>
                <p class="mt-2">Some third-party companies may also use non-cookie technologies, such as statistical IDs.
                    Please keep in mind that your web browser may not permit you to block the use of these non-cookie
                    technologies, and those browser settings that block cookies may have no effect on such techniques. If
                    the third-party company uses the non-cookie technologies for interest-based advertising, you can opt out
                    at <a href="http://optout.networkadvertising.org/?c=1"
                        class="text-blue-500 underline">www.networkadvertising.org/choices</a>. Please note the industry opt
                    out only applies to use for interest-based advertising and may not apply to use for analytics or
                    attribution.</p>
                <p class="mt-2">Some websites have “do not track” features that allow you to tell a website not to track
                    you. These features are not all uniform. We do not currently respond to those signals.</p>

                <h3 class="text-xl font-semibold mt-6">Google Analytics</h3>
                <p class="mt-2">We use Google Analytics, an analytics service provided by Google LLC. We use this service
                    to help analyze how users use the Service, with a view to analyzing usage across devices and offering
                    improvements for all users. To learn more about Google Analytics, please visit their <a
                        href="https://support.google.com/analytics/answer/6004245#zippy=%2Cour-privacy-policy"
                        class="text-blue-500 underline">Privacy Policy</a>. To opt-out of this feature by installing the
                    Google Analytics Opt-out Browser Add-on, please click <a
                        href="https://tools.google.com/dlpage/gaoptout?hl=en" class="text-blue-500 underline">here</a>.</p>

                <h3 class="text-xl font-semibold mt-6">Data Security</h3>
                <p class="mt-2">We implement commercially reasonable security measures designed to protect your
                    information. Despite our best efforts, however, no security measures are completely impenetrable.</p>

                <h3 class="text-xl font-semibold mt-6">Data Retention</h3>
                <p class="mt-2">We store the information we collect about you for as long as necessary for the purpose(s)
                    for which we collected it or for other legitimate business purposes, including to meet our legal,
                    regulatory, or other compliance obligations.</p>

                <h3 class="text-xl font-semibold mt-6">EU Privacy Rights</h3>
                <p class="mt-2">Individuals located in certain countries, including the European Economic Area (EEA) and
                    the United Kingdom, have certain statutory rights under the General Data Protection Regulation (GDPR) in
                    relation to their personal data.</p>
                <p class="mt-2">To the extent information we collect is associated with an identified or identifiable
                    natural person and is protected as personal data under GDPR, it is referred to in this Privacy Policy as
                    “Personal Data”.</p>
                <p class="mt-2"><strong>Data Subject Access Requests:</strong></p>
                <p class="mt-2">Subject to any exemptions provided by law, you may have the right to request:</p>
                <ul class="list-disc list-inside mt-2">
                    <li>a copy of the Personal Data we hold about you;</li>
                    <li>to correct the Personal Data we hold about you;</li>
                    <li>to delete your Account or Personal Data;</li>
                    <li>to object to processing of your Personal Data for certain purposes;</li>
                </ul>
                <p class="mt-2">To access your privacy rights, send us an email at <a href="mailto:advisory@shift180.in"
                        class="text-blue-500 underline">advisory@shift180.in</a>.</p>
                <p class="mt-2">We will generally process requests within one month. We may need to request specific
                    information from you to help us confirm your identity and/or the jurisdiction in which you reside. If
                    your request is complicated or if you have made a large number of requests, it may take us longer. We
                    will let you know if we need longer than one month to respond.</p>
                <p class="mt-2"><strong>Legal Bases For Processing Personal Data:</strong></p>
                <p class="mt-2">We may process your Personal Data under applicable data protection law on the following
                    legal grounds:</p>
                <ul class="list-disc list-inside mt-2">
                    <li><strong>Contractual Necessity:</strong> we may process your Personal Data to enter into or perform a
                        contract with you.</li>
                    <li><strong>Consent:</strong> where you have provided consent to process your Personal Data. You may
                        withdraw your consent at any time.</li>
                    <li><strong>Legitimate interest:</strong> we process your Personal Data to provide our Services to you
                        such as to provide our online user experience, communicate with you, provide customer service,
                        market, analyze and improve our business, and to protect our Services.</li>
                </ul>

                <h3 class="text-xl font-semibold mt-6">Age Limitations</h3>
                <p class="mt-2">Our Service is intended for adults ages 18 years and above. We do not knowingly collect
                    personally identifiable information from children. If you are a parent or legal guardian and think your
                    child under 13 has given us information, please email or write to us at the address listed at the end of
                    this Privacy Policy. Please mark your inquiries “COPPA Information Request.”</p>

                <h3 class="text-xl font-semibold mt-6">Changes to this Privacy Policy</h3>
                <p class="mt-2">SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED may change this Privacy Policy
                    from time to time. We encourage you to visit this page to stay informed. If the changes are material, we
                    may provide you additional notice to your email address or through our Services. Your continued use of
                    the Services indicates your acceptance of the modified Privacy Policy.</p>

                <h3 class="text-xl font-semibold mt-6">Storage of Information in the United States</h3>
                <p class="mt-2">Information we maintain may be stored both within and outside of the United States. If you
                    live outside of the United States, you understand and agree that we may transfer your information to the
                    United States, and that U.S. laws may not afford the same level of protection as those in your country.
                </p>

                <h3 class="text-xl font-semibold mt-6">Contact Us</h3>
                <p class="mt-2">If you have questions, comments, or concerns about this Privacy Policy, you may contact us
                    at:</p>
                <ul class="list-disc list-inside mt-2">
                    <li>advisator.com</li>
                    <li><a href="mailto:advisory@shift180.in" class="text-blue-500 underline">advisory@shift180.in</a></li>
                    <li>9810440780</li>
                </ul>
            </div>
            @include('landing.components.sidebar')
        </div>
        @include('landing.components.footer')
    </div>
@endsection
