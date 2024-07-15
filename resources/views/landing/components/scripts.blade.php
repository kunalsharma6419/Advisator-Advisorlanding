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
<!--Start of Tawk.to Script-->
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
