<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eatly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/user/css/mainStyle.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/selectize@0.12.6/dist/css/selectize.default.css" rel="stylesheet" />
</head>

<body>
    <svg class="abstract-shape shape-1" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path d="M40.2,-68.6C54.6,-60.4,70.7,-54.3,77.3,-42.5C83.9,-30.6,81,-13,72.9,-1.6C64.8,9.8,51.6,15.5,43.1,24.4C34.6,33.4,30.7,45.7,22.2,51.7C13.7,57.7,0.5,57.3,-11.8,54.7C-24.2,52.1,-35.6,47.3,-43.6,39.3C-51.6,31.3,-56.1,20.2,-61.4,7.2C-66.7,-5.8,-72.9,-20.6,-66.6,-29.3C-60.2,-38.1,-41.3,-40.7,-27.1,-47.6C-12.9,-54.5,-3.4,-65.8,9.2,-76.1C21.9,-86.3,37.6,-95.5,40.2,-68.6Z" transform="translate(100 100)" />
    </svg>
    <svg class="abstract-shape shape-2" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path d="M54.1,-71.4C67.4,-59.4,72.7,-39.7,73.3,-22.2C74,-4.8,69.9,10.3,61.2,23.2C52.5,36.2,39.3,47,24.4,55.3C9.5,63.7,-7.1,69.6,-19.8,64.3C-32.5,59.1,-41.2,42.8,-50.7,27.2C-60.2,11.6,-70.6,-3.3,-68.1,-15.2C-65.6,-27.1,-50.2,-35.9,-37.2,-47.4C-24.3,-58.9,-12.6,-73.2,3.1,-77.3C18.7,-81.3,37.4,-75.2,54.1,-71.4Z" transform="translate(100 100)" />
    </svg>
    <svg class="abstract-shape shape-3" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path d="M50.5,-66.7C64.7,-57.6,75.9,-43.2,77.3,-28C78.7,-12.8,70.3,3.3,62.4,18.6C54.5,33.9,47.1,48.5,35.2,57.2C23.3,66,6.9,68.9,-6.9,65.5C-20.8,62,-31.9,52.2,-42.1,42.3C-52.2,32.3,-61.5,22.3,-67.4,8.6C-73.4,-5.2,-76.1,-22.7,-67.7,-34.5C-59.3,-46.2,-39.8,-52.2,-24.1,-58.7C-8.3,-65.1,3.7,-72.1,17.8,-72.4C32,-72.7,48.2,-66,50.5,-66.7Z" transform="translate(100 100)" fill="#e0f2fe" />
    </svg>
    <svg class="abstract-shape shape-4" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path d="M41.1,-70.7C52.2,-62.6,60.6,-51.2,64.7,-39.2C68.8,-27.1,68.5,-13.5,68.4,0.4C68.3,14.2,68.4,28.4,60.3,37.9C52.2,47.4,36,52.3,20.3,60.1C4.5,67.9,-10.9,78.6,-20.7,73.7C-30.4,68.7,-34.4,48.1,-42.1,35.3C-49.8,22.4,-61.3,17.3,-64.2,9C-67.1,0.6,-61.4,-11.1,-53.7,-21.2C-46,-31.2,-36.2,-39.5,-25.3,-47.1C-14.5,-54.8,-2.7,-61.8,9.2,-66.2C21.2,-70.6,42.3,-71.2,41.1,-70.7Z" transform="translate(100 100)" fill="#fef3c7" />
    </svg>
    <svg class="abstract-shape shape-5" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path d="M37.7,-57.3C49.2,-47.2,60.2,-39.3,66.8,-27.5C73.3,-15.6,75.3,-0,70.8,13.7C66.3,27.4,55.2,39.2,42.8,46.2C30.5,53.1,17,55.3,2.8,52.6C-11.4,49.8,-22.8,42,-35.5,34.3C-48.2,26.7,-62.3,19.2,-65.2,8.1C-68.2,-3,-60.1,-17.8,-49.8,-29.1C-39.6,-40.4,-27.2,-48.2,-14.5,-56.3C-1.7,-64.4,11.1,-72.9,23.8,-71.8C36.6,-70.6,49.2,-59.6,37.7,-57.3Z" transform="translate(100 100)" fill="#dbeafe" />
    </svg>


    <button id="sidebarToggle" aria-label="Toggle sidebar" title="Toggle sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-4a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-4a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11z" />
        </svg>
    </button>

    <div class="app-name-float"><span class="highlight">Eatly</span></div>

    @include('layouts.user.sidebar')

    <main id="content">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/selectize@0.12.6/dist/js/standalone/selectize.min.js"></script>
    <script src="{{ asset('assets/user/js/script.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.rasa-checkbox');
            const errorDiv = document.getElementById('checkbox-error');

            function updateCheckboxState() {
                const checked = Array.from(checkboxes).filter(c => c.checked);
                if (checked.length >= 3) {
                    checkboxes.forEach(c => {
                        if (!c.checked) c.disabled = true;
                    });
                    errorDiv.style.display = 'block';
                } else {
                    checkboxes.forEach(c => c.disabled = false);
                    errorDiv.style.display = 'none';
                }
            }

            checkboxes.forEach(c => {
                c.addEventListener('change', updateCheckboxState);
            });

            updateCheckboxState();
        });
    </script>
</body>

</html>