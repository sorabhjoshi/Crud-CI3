<?php include 'Components\Header.php'; ?>

<main class="content">
    <div class="about-page">
        <section class="about">
            <h1>About Us</h1>
            <p>Welcome to our website! We are dedicated to providing a seamless platform where users can easily manage their personal accounts, create and manage blogs, share news, and get in touch with the site owner directly through email. Our goal is to create a user-friendly experience, making it easy for you to interact with our platform.</p>
            
            <h2>Key Features</h2>
            <ul>
                <li><strong>User Registration and Login:</strong> Easily sign up to create an account and log in to access exclusive features.</li>
                <li><strong>Manage Users:</strong> Admin users have the ability to add, edit, and delete users for better control and management.</li>
                <li><strong>Blog Management:</strong> Create, edit, and delete blog posts to share your thoughts with the world.</li>
                <li><strong>News Section:</strong> Stay up to date with the latest updates and news on the website.</li>
                <li><strong>Contact Us:</strong> Reach out to the owner of the site directly through our contact form, with the option to send an email for inquiries or feedback.</li>
            </ul>
            
            <h2>Our Vision</h2>
            <p>We aim to foster a community where information is easily shared, and everyone has the tools to create and engage with content. Whether you're an admin or a regular user, this platform is designed to meet your needs and make your experience smooth and efficient.</p>
            
            <h2>Get in Touch</h2>
            <p>If you have any questions, suggestions, or concerns, feel free to reach out to us through our <a href="contact.php">Contact Us</a> page. We're always happy to hear from you!</p>
        </section>
    </div>
</main>

<?php include 'Components\Footer.php'; ?>

<style>
/* Scoped styles for the About Page */
.about-page {
    display: flex;
    justify-content: center;
    padding: 20px;
    background-color: #f9f9f9;
}

.about-page .about {
    background-color: #ffffff;
    max-width: 800px;
    border-left: 5px solid #5a6c7b;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
}

.about-page .about h1, .about-page .about h2 {
    color: #333;
    margin-bottom: 15px;
}

.about-page .about p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

.about-page .about ul {
    list-style-type: disc;
    padding-left: 20px;
    margin-bottom: 20px;
}

.about-page .about li {
    margin-bottom: 10px;
    color: #444;
}

.about-page .about a {
    color: #007bff;
    text-decoration: none;
}

.about-page .about a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .about-page .about {
        padding: 20px;
    }
    .about-page .about h1 {
        font-size: 24px;
    }
    .about-page .about h2 {
        font-size: 20px;
    }
}
</style>
