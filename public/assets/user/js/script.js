
const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');
const toggleBtn = document.getElementById('sidebarToggle');

toggleBtn.addEventListener('click', () => {
  sidebar.classList.toggle('collapsed');
  content.classList.toggle('expanded');
});

const ctx = document.getElementById('calorieChart').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
    datasets: [{
      label: 'Kalori (kkal)',
      data: [500, 400, 350, 420, 390],
      backgroundColor: '#fcd34d',
      borderColor: '#93c5fd',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false
      }
    },
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

document.querySelectorAll('#sidebar nav a').forEach(link => {
  const currentPage = window.location.pathname.split('/').pop();
  const linkPage = link.getAttribute('href');

  if (linkPage === currentPage) {
    link.classList.add('active');
  } else {
    link.classList.remove('active');
  }
});

function previewGambar(input) {
  const file = input.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('preview-gambar').src = e.target.result;
    }
    reader.readAsDataURL(file);
  }
}

document.addEventListener('DOMContentLoaded', function () {
  new TomSelect('#preferensi_rasa', {
    plugins: ['remove_button'],
    maxItems: null,
    create: false,
    persist: false,
    placeholder: "Pilih preferensi rasa",
  });
});
