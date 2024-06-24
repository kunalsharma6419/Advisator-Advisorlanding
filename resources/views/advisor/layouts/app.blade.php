<!DOCTYPE html>
<html lang="en">

<head>
    @include('advisor.components.styles')
</head>

<body>
    @yield('advisorcontent')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const trigger = document.getElementById('dropdown-trigger');
            const dropdown = document.getElementById('dropdown-content');
            const container = document.getElementById('dropdown-container');

            trigger.addEventListener('click', function() {
                dropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                const isClickInside = container.contains(event.target);
                if (!isClickInside) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
