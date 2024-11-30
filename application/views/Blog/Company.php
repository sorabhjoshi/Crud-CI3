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
            <h3>Address Details</h3>
            <div class="form-fields">
                <form id="address-form">
                    <input type="hidden" id="company_id" name="company_id">
                    <div class="form-row">
                        <input type="hidden" id="company_id" name="company_id">
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
        var companyid = $(this).data('company-id');
        $('#save-address').data('company-id', companyid);
        $('#address-overlay').fadeIn();

        $.ajax({
            url: '<?= base_url("Welcome/getAddressData") ?>', 
            type: 'POST',
            data: { company_id: companyid },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    const addressData = response.data;
                    $('#address-form').empty();

                    addressData.forEach(function (address, index) {
                        const newRow = `
                            <div class="form-row" data-id="${address.id}">
                                <input type="hidden" name="id[]" value="${address.id}">
                                <label for="Address">Address:</label>
                                <input type="text" name="Address[]" value="${address.address}" required>
                                <label for="Latitude">Latitude:</label>
                                <input type="text" name="Latitude[]" value="${address.lat}">
                                <label for="Longitude">Longitude:</label>
                                <input type="text" name="Longitude[]" value="${address.long}" required>
                                <label for="Mobile">Mobile:</label>
                                <input type="text" name="Mobile[]" value="${address.mobile}" required>
                                <button type="button" class="delete-address-btn">Delete</button>
                            </div>`;
                        $('#address-form').append(newRow);
                    });
                } else {
                    alert('Address field is empty');
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
                <input type="text" name="Address[]" required>
                <label for="Latitude">Latitude:</label>
                <input type="text" name="Latitude[]">
                <label for="Longitude">Longitude:</label>
                <input type="text" name="Longitude[]" required>
                <label for="Mobile">Mobile:</label>
                <input type="text" name="Mobile[]" required>
                <button type="button" class="delete-address-btn">Delete</button>
            </div>`;
        $('#address-form').append(newRow);
    });

    // Save Address
    $('#save-address').on('click', function () {
        var companyid = $(this).data('company-id');
        var formData = $('#address-form').serializeArray();  

        var data = {};
        formData.forEach(function (item) {
            if (!data[item.name]) {
                data[item.name] = [];
            }
            data[item.name].push(item.value);
        });

        data.company_id = companyid;

        $.ajax({
            url: '<?= base_url("Welcome/saveCompanyAddress") ?>',
            type: 'POST',
            data: data,
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

    // Delete Address
    $(document).on('click', '.delete-address-btn', function () {
        const row = $(this).closest('.form-row');
        const addressId = row.find('input[name="id[]"]').val();

        $.ajax({
            url: '<?= base_url("Welcome/deleteCompanyAddress") ?>',
            type: 'POST',
            data: { address_id: addressId },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert('Address deleted successfully!');
                    row.remove();
                } else {
                    alert(response.message || 'Failed to delete address');
                }
            },
            error: function () {
                alert('An error occurred while deleting the address');
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
/* Delete Address Button */
.delete-address-btn {
    padding: 10px;
    font-size: 16px;
    color: white;
    background-color: #dc3545; /* Red color for danger */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Hover effect for delete button */
.delete-address-btn:hover {
    background-color: #c82333; /* Darker red for hover */
    transform: scale(1.05); /* Slightly enlarge on hover */
}

/* Focus effect to highlight the button */
.delete-address-btn:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(220, 53, 69, 0.5); /* Subtle red glow */
}

/* Active state effect */
.delete-address-btn:active {
    background-color: #bd2130; /* Even darker red on click */
    transform: scale(0.98); /* Slight shrink when clicked */
}

/* Disabled state */
.delete-address-btn:disabled {
    background-color: #6c757d; /* Grey background when disabled */
    cursor: not-allowed;
    box-shadow: none;
}

/* Style the "View Address" button */
.view-address-btn {
    background-color: #007bff; /* Button background color */
    color: white; /* Text color */
    padding: 5px; /* Padding inside the button */
    border: 2px solid #007bff; /* Border color */
    border-radius: 5px; /* Rounded corners */
    font-size: 14px; /* Font size */
    cursor: pointer; /* Pointer cursor on hover */
    transition: all 0.3s ease; /* Smooth transition for hover effects */
    text-align: center; /* Center align text */
    display: inline-block; /* Align with other elements */
}

/* Hover state */
.view-address-btn:hover {
    background-color: #0056b3; /* Darker shade on hover */
    border-color: #0056b3; /* Darker border on hover */
    transform: scale(1.05); /* Slightly enlarge the button */
}

/* Focus state */
.view-address-btn:focus {
    outline: none; /* Remove default outline */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a subtle shadow */
}

/* Active state */
.view-address-btn:active {
    background-color: #004085; /* Even darker shade when clicked */
    border-color: #004085; /* Darker border when clicked */
}

/* Styling for DataTable cells containing the button */
#blogTable td {
    text-align: center; /* Center-align the text in the table */
}

/* Optional: Add a margin between the table and button */
.addnews a button {
    margin-right: 8px; /* Space between the buttons */
}
/* General overlay styles */
.overlay {
    position: fixed; /* Fixed position on the screen */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Dark semi-transparent background */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Ensure it's above other content */
    visibility: hidden; /* Hide the overlay by default */
    opacity: 0;
    transition: opacity 0.3s ease, visibility 0s 0.3s; /* Smooth transition for visibility */
}

/* When the overlay is active, show it */
.overlay.active {
    visibility: visible;
    opacity: 1;
    transition: opacity 0.3s ease;
}

/* Overlay content box */
.overlay-content {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    width: 400px;
    max-width: 100%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* Button styles inside the overlay */
.overlay button {
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    margin: 10px;
    width: 120px; /* Fixed width for uniformity */
}

/* Save button - Primary style */
.overlay .save-btn {
    background-color: #28a745; /* Green for success */
    color: white;
}

.overlay .save-btn:hover {
    background-color: #218838; /* Darker green on hover */
}

.overlay .save-btn:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
}

/* Cancel button - Secondary style */
.overlay .cancel-btn {
    background-color: #dc3545; /* Red for danger */
    color: white;
}

.overlay .cancel-btn:hover {
    background-color: #c82333; /* Darker red on hover */
}

.overlay .cancel-btn:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
}

/* Delete button - Destructive style */
.overlay .delete-btn {
    background-color: #ffc107; /* Yellow for warning */
    color: black;
}

.overlay .delete-btn:hover {
    background-color: #e0a800; /* Darker yellow on hover */
}

.overlay .delete-btn:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
}

/* Align buttons in the center of the overlay */
.overlay .button-container {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

/* Button spacing in the button container */
.overlay .button-container button {
    width: 120px; /* Ensure all buttons are the same width */
    margin: 0 10px;
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
    gap:20px;
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