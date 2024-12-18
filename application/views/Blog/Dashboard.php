<?php include 'Components/Header.php'; ?>
<main class="content">
    <section class="overview-section">
        <div class="chart-container">
            <h3>Blog Categories Overview</h3>
            <canvas id="blogCategoryChart"></canvas>
        </div>
        <div class="data-overview">
            <div class="data-card">
                <h3>Users</h3>
                <p><?php echo $users; ?></p>
                <small>Total users registered</small>
            </div>
            <div class="data-card">
                <h3>News</h3>
                <p><?php echo $news; ?></p>
                <small>Total news articles published</small>
            </div>
            <div class="data-card">
                <h3>Blogs</h3>
                <p><?php echo $blogs; ?></p>
                <small>Total blog posts available</small>
            </div>
        </div>
    </section>
</main>

<?php include 'Components/Footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
const categories = <?php echo json_encode($category); ?>;
const uniqueCategories = categories.filter((value, index, self) => 
    index === self.findIndex((t) => (
        t.category === value.category
    ))
);


const labels = uniqueCategories.map(item => item.category);
const data = uniqueCategories.map(item => item.count);

const ctx = document.getElementById('blogCategoryChart').getContext('2d');
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: data,
            backgroundColor: ['#6A8EAE', '#FFC75F', '#FF6F61', '#AA96DA', '#AF9F61'], // Adjust as needed
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true, position: 'bottom' }
        }
    }
});

</script>

<style>
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    .banner {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
    }

    .content {
        padding: 20px;
        background-color: #f1f1f1;
    }

    .overview-section {
        display: flex;
        gap: 30px;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .chart-container {
        flex: 1;
        max-width: 450px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .chart-container h3 {
        text-align: center;
        margin-bottom: 15px;
        font-size: 18px;
        color: #333;
    }

    canvas {
        width: 100%;
        height: auto;
    }

    .data-overview {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .data-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .data-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .data-card h3 {
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
    }

    .data-card p {
        font-size: 24px;
        font-weight: 600;
        color: #444;
    }

    .data-card small {
        font-size: 12px;
        color: #888;
    }
</style>
