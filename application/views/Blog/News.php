<?php include 'Components/Header.php'; ?>

<main class="content">
    <div class="tablecontainer">
        <div class="addnews">
            <h2>News List</h2>
            <div>
                <a href="Blog_website/Home"><button>View Site</button></a>
                <a href="AddNews"><button>Add News</button></a>
            </div>
        </div>
        <table id="newsTable" class="user-table">
        <div class="filter-container">
            <h4>Filter</h4>
            <div class="filter">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate">
                <label for="endDate">End Date:</label>
                <input type="date" id="endDate">
                <button id="filterButton">Filter</button>
            </div>
            </div>

            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Author Name</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</main>

<?php include 'Components/Footer.php'; ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
     $(document).ready(function () {
        const table = $('#newsTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('Welcome/getNewsData') ?>",
            "type": "POST",
                "data": function (d) {
                    d.start_date = $('#startDate').val(); 
                    d.end_date = $('#endDate').val();    
                }
        },
        "columns": [
            { "data": 0 },
            { "data": 1 }, 
            { "data": 2 }, 
            { "data": 3 }, 
            { "data": 4 }, 
            { "data": 5 }, 
            { "data": 6 }, 
            { "data": 7, "orderable": false }, 
            { "data": 8, "orderable": false }  
        ],
        "pageLength": 6,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true
    });
    
    $('#filterButton').on('click', function () {
            table.ajax.reload();
        });
});
   

</script>
<style>
    .dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: right;
}
.filter-container h4{
    margin: 0;
    padding: 0;
    padding-bottom: 10px;
}
.filter{
    display: flex;
    gap: 10px;
}
    .filter-container {
    display: flex;
    flex-direction: column;
    align-items: start;
    justify-content: center;
    background-color: #c3c3c3;
    padding: 20px;
    border-radius: 7px;
    gap: 10px;
    width: 96%;
    margin-bottom: 10px;
}
#newsTable{
    padding-top: 10px;
}

.filter-container label {
    font-size: 16px;
    color: #333;
}

.filter-container input[type="date"] {
    padding: 5px;
    font-size: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    width: auto;
}

.filter-container input[type="date"]:focus {
    border-color: var(--primary-color);
}

.filter-container button {
    padding: 6px 12px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    transition: background-color 0.3s ease;
}

.filter-container button:hover {
    background-color: var(--hover-primary);
}

    :root {
        --primary-color: #5ca1e3;
        --hover-primary: #3681ca;
        --edit-color: #66bb6a;
        --hover-edit: #5caa5b;
        --delete-color: #ef5350;
        --hover-delete: #e53935;
        --table-header-bg: #2d3e50;
        --table-header-text: #fff;
        --table-striped: #f9f9f9;
        --table-hover: #f1f1f1;
    }

    .addnews {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 97%;
        background-color: #dddddd;
        padding: 15px;
        margin-bottom: 20px;
    }

    .addnews h2 {
        margin: 0;
        font-size: 24px;
        padding-left: 10px;
    }

    .addnews button {
        background-color: var(--primary-color);
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-right: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .addnews button:hover {
        background-color: var(--hover-primary);
    }

    .tablecontainer {
        margin: 20px auto;
        width: 90%;
        max-width: 1000px;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 5px;
        overflow: hidden;
        font-family: Arial, sans-serif;
    }

    .user-table th, .user-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .thead-dark th {
        background-color: var(--table-header-bg);
        color: var(--table-header-text);
    }

    .user-table tr:nth-child(even) {
        background-color: var(--table-striped);
    }

    .user-table tr:hover {
        background-color: var(--table-hover);
    }

    .edit-btn, .delete-btn {
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        text-align: center;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .edit-btn {
        background-color: var(--edit-color);
        color: white;
        border: 1px solid var(--edit-color);
    }

    .edit-btn:hover {
        background-color: var(--hover-edit);
        border: 1px solid var(--hover-edit);
    }

    .delete-btn {
        background-color: var(--delete-color);
        color: white;
        border: 1px solid var(--delete-color);
    }

    .delete-btn:hover {
        background-color: var(--hover-delete);
        border: 1px solid var(--hover-delete);
    }

    @media (max-width: 768px) {
        .user-table th, .user-table td {
            padding: 8px;
        }

        .edit-btn, .delete-btn {
            font-size: 12px;
        }
    }
</style>


