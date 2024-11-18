</div>
    </div>

    <script>
       document.addEventListener('DOMContentLoaded', function() {
    // Select all dropdown buttons and loop through them
    var dropdownBtns = document.querySelectorAll(".dropdown-btn");
    dropdownBtns.forEach(function(dropdownBtn) {
        dropdownBtn.addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
                this.setAttribute('aria-expanded', 'false');
            } else {
                dropdownContent.style.display = "block";
                this.setAttribute('aria-expanded', 'true');
            }
        });
    });

    // Sidebar toggle functionality
    var menuToggle = document.querySelector('.menu-toggle');
    var sidebar = document.querySelector('.sidebar');
    menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
    });
});

    </script>
      <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>