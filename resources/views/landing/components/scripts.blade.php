<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('submit-contact-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Gather form data
        var formData = new FormData(this);

        // Send form data to server using fetch API
        fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle response data
                if (data.success) {
                    // Show success message with SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Message sent successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Optionally, reset the form
                    this.reset();
                } else {
                    // Show error message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                }
            })
            .catch(error => {
                console.error('There was an error!', error);
                // Show error message with SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            });
    });
</script>
<script>
    // JavaScript to toggle sidebar
    // const toggleBtn = document.querySelector('.toggleBtn');
    const hideSideMenu = document.getElementById("hideSideMenu");
    const showSideMenu = document.getElementById("showSideMenu");

    // console.log(toggleBtn)
    // console.log(hideSideMenu, showSideMenu);
    const sidebar = document.querySelector(".sidebar");

    hideSideMenu.addEventListener("click", () => {
        sidebar.classList.add("left-full");
    });
    showSideMenu.addEventListener("click", () => {
        sidebar.classList.remove("left-full");
    });
</script>
<!-- Place this script at the end of your HTML body or load it after the button element -->
<script>
    // Get the button element
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    // Add click event listener to scroll to top functionality
    scrollToTopBtn.addEventListener('click', function() {
        // Scroll to top smoothly
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
<!--Start of Tawk.to Script-
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6688f9aee1e4f70f24ee10f9/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!-- WhatsApp Floating Button -->
<a href="https://wa.me/+919810440780" target="_blank" class="fixed bottom-16 right-4 md:hidden z-50" style="margin-bottom: 20px;">
    <svg class="w-16 h-16 text-green-500 bg-white rounded-full p-2 shadow-lg" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2C6.48 2 2 6.48 2 12c0 1.85.5 3.58 1.36 5.1L2 22l4.9-1.36C8.42 21.5 10.15 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm0 18c-1.63 0-3.16-.49-4.45-1.34l-.32-.2-2.92.82.82-2.92-.2-.32C4.49 15.16 4 13.63 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8zm3.6-5.27c-.2-.1-1.18-.58-1.36-.65s-.32-.1-.45.1-.52.65-.64.78-.23.15-.43.05c-.2-.1-.83-.31-1.58-.98-.58-.52-.97-1.16-1.08-1.36-.1-.2-.01-.31.08-.4.08-.08.2-.23.3-.34.1-.12.13-.2.2-.33.06-.12.03-.25-.02-.35-.05-.1-.45-1.09-.62-1.49-.16-.38-.33-.33-.45-.34h-.39c-.12 0-.3.04-.45.25s-.6.59-.6 1.45.61 1.68.7 1.8c.09.12 1.21 1.85 2.94 2.6.41.18.73.28.98.36.41.13.78.11 1.07.07.33-.05 1.18-.48 1.35-.95s.17-.87.12-.95c-.05-.08-.18-.12-.38-.21z"/>
    </svg>
</a>

