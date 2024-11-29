<?php include 'Components/Header.php'; ?>
<main class="content">
    <div class="tablecontainer">
        <div class="addnews">
            <h2>Companies List</h2>
            <div>
                <a href="Blog_website/Home"><button>View Site</button></a>
                <a href="AddCompany"><button>Add Company</button></a>
            </div>
        </div>

        <table id="blogTable" class="user-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Author Name</th>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be dynamically populated here by DataTable -->
            </tbody>
        </table>
    </div>

   
    <div id="address-overlay" style="display: none;">
        <div class="form-container">
            <h3>Enter Address Details</h3>
            <div class="form-fields">
                <form id="address-form">
                    <input type="hidden" id="company_id" name="company_id">
                    <div class="form-row">
                        <label for="Address">Address:</label>
                        <input type="text" id="Address" name="Address[]" required>
                        <label for="Latitude">Latitude:</label>
                        <input type="text" id="Latitude" name="Latitude[]">
                        <label for="Longitude">Longitude:</label>
                        <input type="text" id="Longitude" name="Longitude[]" required>
                        <label for="Mobile">Mobile:</label>
                        <input type="text" id="Mobile" name="Mobile[]" required>
                    </div>
                </form>
            </div>
            <div class="form-buttons">
                <button type="button" id="add-row-btn" class="add-btn">Add Row</button>
                <button type="button" id="save-address" class="add-btn">Save</button>
                <button type="button" id="close-overlay" class="close-btn">Close</button>
            </div>
        </div>
    </div>
</main>

<?php include 'Components/Footer.php'; ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
   $(document).ready(function () {
    // DataTable Initialization
    const table = $('#blogTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= base_url("Welcome/getComData") ?>',
            type: 'POST'
        },
        columns: [
            { data: 0 },
            { data: 1 },
            { data: 2 },
            { data: 3 },
            { data: 4, orderable: false },
            { data: 5, orderable: false },
            { data: 6, orderable: false }
        ],
        pageLength: 6,
        lengthChange: false
    });

    // Open Address Overlay
    $(document).on('click', '.view-address-btn', function () {
        const companyId = $(this).data('id');
        $('#company_id').val(companyId);

        // Show the address overlay
        $('#address-overlay').fadeIn();

        // Fetch existing address data and populate the form fields
        $.ajax({
            url: '<?= base_url("Welcome/getAddressData") ?>',  // Change this URL to your backend endpoint for fetching address data
            type: 'POST',
            data: { company_id: companyId },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    const addressData = response.data;
                    // Clear the existing form fields
                    $('#address-form').empty();

                    // Loop through the existing address data and add it to the form
                    addressData.forEach(function (address, index) {
                        const newRow = `
                            <div class="form-row">
                                <label for="Address">Address:</label>
                                <input type="text" id="Address" name="Address[]" value="${address.address}" required>
                                <label for="Latitude">Latitude:</label>
                                <input type="text" id="Latitude" name="Latitude[]" value="${address.lat}">
                                <label for="Longitude">Longitude:</label>
                                <input type="text" id="Longitude" name="Longitude[]" value="${address.long}" required>
                                <label for="Mobile">Mobile:</label>
                                <input type="text" id="Mobile" name="Mobile[]" value="${address.mobile}" required>
                            </div>`;
                        $('#address-form').append(newRow);
                    });
                } else {
                    alert('Failed to fetch address data');
                }
            },
            error: function () {
                alert('An error occurred while fetching the address data');
            }
        });
    });

    // Close Overlay
    $('#close-overlay').on('click', function () {
        $('#address-overlay').fadeOut();
    });

    // Add Row
    $('#add-row-btn').on('click', function () {
        const newRow = ` 
            <div class="form-row">
                <label for="Address">Address:</label>
                <input type="text" id="Address" name="Address[]" required>
                <label for="Latitude">Latitude:</label>
                <input type="text" id="Latitude" name="Latitude[]">
                <label for="Longitude">Longitude:</label>
                <input type="text" id="Longitude" name="Longitude[]" required>
                <label for="Mobile">Mobile:</label>
                <input type="text" id="Mobile" name="Mobile[]" required>
            </div>`;
        $('#address-form').append(newRow);
    });

    // Save Address
    $('#save-address').on('click', function () {
        const formData = $('#address-form').serialize();

        $.ajax({
            url: '<?= base_url("Welcome/saveCompanyAddress") ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert('Data saved successfully!');
                    $('#address-overlay').fadeOut();
                    table.ajax.reload();
                } else {
                    alert(response.message || 'Failed to save data');
                }
            },
            error: function () {
                alert('An error occurred while saving the data');
            }
        });
    });
});

</script>
<style>
   #address-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); 
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    overflow: hidden;
}

.form-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 90%;
    max-width: 600px;
    max-height: 90%;
    display: flex;
    flex-direction: column;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

.form-container h3 {
    margin-bottom: 10px;
    text-align: center;
    color: #333;
    font-size: 20px;
}

.form-fields {
    flex: 1;
    overflow-y: auto;
    margin-bottom: 10px;
   
    border: 1px solid #ccc;
    border-radius: 5px;
   
}

.form-row {
    padding: 20px;
    border-bottom: 1px solid black;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 15px;
}

.form-row label {
    flex: 1 1 100%;
    font-size: 14px;
    color: #333;
    font-weight: bold;
}

.form-row input {
    flex: 1 1 calc(50% - 20px);
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    box-sizing: border-box;
}

.form-row input:focus {
    border-color: #5ca1e3;
    box-shadow: 0 0 4px rgba(92, 161, 227, 0.5);
}

.form-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
}

button.add-btn,
button.close-btn {
    padding: 8px 16px;
    font-size: 14px;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
}

button.add-btn {
    background-color: #4CAF50;
}

button.add-btn:hover {
    background-color: #45a049;
}

button.close-btn {
    background-color: #f44336;
}

button.close-btn:hover {
    background-color: #e53935;
}

#overlayDiv {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    display: none; /* Initially hidden */
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
}

/* Hidden class to toggle visibility */
.hidden {
    display: none;
}

#showDivBtn {
    padding: 10px;
    font-size: 16px;
}

    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
}
#blogTable{
    padding-top: 5px;
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
    align-items: start !important;
    justify-content: center;
    background-color: #c3c3c3;
    padding: 20px;
    border-radius: 7px;
    width: 98%;
    gap: 10px;
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
    .addnews {
        display: flex;
        margin-bottom: 20px;
        justify-content: space-between;
        align-items: center;
        width: 98%;
        background-color: #dddddd;
        padding: 15px;
    }
    .filter-container {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 97%;
    margin-bottom: 10px;
    font-family: Arial, sans-serif;
}

.filter-container label {
    font-size: 16px;
    color: #333;
}

.filter-container input {
    padding: 5px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.filter-container button {
    padding: 6px 10px;
    font-size: 14px;
    background-color: #5ca1e3;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filter-container button:hover {
    background-color: #3681ca;
}


.dataTables_filter {
    float: right;
    margin-bottom: 10px;
    margin-top: 0;
}

.dataTables_wrapper .filter-container {
    float: left;
    margin-top: 10px;
}

    .addnews h2 {
        margin: 0;
        font-size: 24px;
    }

    .addnews button {
        background-color: #5ca1e3;
        padding: 10px;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        margin: 0 10px;
        transition: all 0.3s ease;
    }

    .addnews button:hover {
        background-color: #3681ca;
    }

    .tablecontainer {
        margin: 20px auto;
        width: 90%;
        max-width: 1000px;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .user-table th,
    .user-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .thead-dark th {
        background-color: #2d3e50;
        color: #fff;
    }

    .user-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .user-table tr:hover {
        background-color: #f1f1f1;
    }

    .user-table td {
        color: #555;
    }

    .user-table th {
        font-weight: bold;
    }
    .add-btn,
    .edit-btn,
    .delete-btn {
        padding: 8px 16px;
        margin: 10px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 4px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .add-btn {
        background-color:#20b9d8;
        color: white;
        border: 1px solid #20b9d8;
    }
    .edit-btn {
        background-color: #4CAF50;
        color: white;
        border: 1px solid #4CAF50;
    }

    .edit-btn:hover {
        background-color: #45a049;
        border: 1px solid #45a049;
    }

    .delete-btn {
        background-color: #f44336;
        color: white;
        border: 1px solid #f44336;
    }

    .delete-btn:hover {
        background-color: #e53935;
        border: 1px solid #e53935;
    }

    @media (max-width: 768px) {

        .user-table th,
        .user-table td {
            padding: 8px;
        }

        .edit-btn,
        .delete-btn {
            font-size: 12px;
        }
    }
</style>