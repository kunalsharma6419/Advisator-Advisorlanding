@extends('landing.layouts.app')

@section('landingcontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- Header -->
        @include('landing.components.header')

        <!-- main -->
        <div
            class="flex flex-col font-sans text-gray-800 w-11/12 md:w-10/12 lg:w-9/12 mx-auto mt-6 pt-2 lg:pt-8 rounded-lg shadow-lg bg-white p-6">
            <h1 class="text-3xl font-bold mb-6">Website Terms and Conditions of Use</h1>

            <h2 class="text-2xl font-semibold mb-4">1. Terms</h2>
            <p class="mb-6">By accessing this Website, accessible from advisator.com, you are agreeing to be bound by these
                Website Terms
                and Conditions of Use and agree that you are responsible for the agreement with any applicable local laws.
                If you disagree with any of these terms, you are prohibited from accessing this site. The materials
                contained in this Website are protected by copyright and trade mark law.</p>

            <h2 class="text-2xl font-semibold mb-4">2. Use License</h2>
            <p class="mb-4">Permission is granted to temporarily download one copy of the materials on SHIFT 180 BUSINESS
                ADVISORY AND
                SERVICES PRIVATE LIMITED's Website for personal, non-commercial transitory viewing only. This is the grant
                of a license, not a transfer of title, and under this license you may not:</p>
            <ul class="list-disc list-inside mb-6">
                <li>modify or copy the materials;</li>
                <li>use the materials for any commercial purpose or for any public display;</li>
                <li>attempt to reverse engineer any software contained on SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE
                    LIMITED's Website;</li>
                <li>remove any copyright or other proprietary notations from the materials; or</li>
                <li>transferring the materials to another person or "mirror" the materials on any other server.</li>
            </ul>
            <p class="mb-6">This will let SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED to terminate upon
                violations of any of
                these restrictions. Upon termination, your viewing right will also be terminated and you should destroy any
                downloaded materials in your possession whether it is printed or electronic format. These Terms of Service
                has been created with the help of the <a href="https://www.termsofservicegenerator.net"
                    class="text-blue-500 hover:underline">Terms Of Service
                    Generator</a>.</p>

            <h2 class="text-2xl font-semibold mb-4">3. Disclaimer</h2>
            <p class="mb-6">All the materials on SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED's Website are
                provided "as is".
                SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED makes no warranties, may it be expressed or
                implied, therefore negates all other warranties. Furthermore, SHIFT 180 BUSINESS ADVISORY AND SERVICES
                PRIVATE LIMITED does not make any representations concerning the accuracy or reliability of the use of the
                materials on its Website or otherwise relating to such materials or any sites linked to this Website.</p>

            <h2 class="text-2xl font-semibold mb-4">4. Limitations</h2>
            <p class="mb-6">SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED or its suppliers will not be held
                accountable for
                any damages that will arise with the use or inability to use the materials on SHIFT 180 BUSINESS ADVISORY
                AND SERVICES PRIVATE LIMITED's Website, even if SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED or
                an authorized representative of this Website has been notified, orally or written, of the possibility of
                such
                damage. Some jurisdiction does not allow limitations on implied warranties or limitations of liability for
                incidental damages, these limitations may not apply to you.</p>

            <h2 class="text-2xl font-semibold mb-4">5. Revisions and Errata</h2>
            <p class="mb-6">The materials appearing on SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED's Website
                may include
                technical, typographical, or photographic errors. SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED
                will not promise that any of the materials in this Website are accurate, complete, or current. SHIFT 180
                BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED may change the materials contained on its Website at any time
                without notice. SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED does not make any commitment to
                update the materials.</p>

            <h2 class="text-2xl font-semibold mb-4">6. Links</h2>
            <p class="mb-6">SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED has not reviewed all of the sites
                linked to its
                Website and is not responsible for the contents of any such linked site. The presence of any link does not
                imply endorsement by SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED of the site. The use of any
                linked website is at the user's own risk.</p>

            <h2 class="text-2xl font-semibold mb-4">7. Site Terms of Use Modifications</h2>
            <p class="mb-6">SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED may revise these Terms of Use for its
                Website at any
                time without prior notice. By using this Website, you are agreeing to be bound by the current version of
                these Terms and Conditions of Use.</p>

            <h2 class="text-2xl font-semibold mb-4">8. Your Privacy</h2>
            <p class="mb-6">Please read our Privacy Policy.</p>

            <h2 class="text-2xl font-semibold mb-4">9. Governing Law</h2>
            <p class="mb-6">Any claim related to SHIFT 180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED's Website shall
                be governed by
                the laws of in without regards to its conflict of law provisions.</p>

            <!-- Sidebar -->
            @include('landing.components.bottommenu')

            @include('landing.components.sidebar')

        </div>
        @include('landing.components.footer')

    </div>
@endsection
