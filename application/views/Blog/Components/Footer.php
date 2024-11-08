</div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownBtn = document.querySelector(".dropdown-btn");
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

            var menuToggle = document.querySelector('.menu-toggle');
            var sidebar = document.querySelector('.sidebar');
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        });
    </script>
</body>
</html>