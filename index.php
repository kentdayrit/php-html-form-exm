<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">User Information Form</h2>
    <div id="resultMessage" class="mt-3"></div>

    <form id="userForm">
        <div class="form-group">
            <label for="fullName">Full Name:</label>
            <input type="text" class="form-control" name="fullName" id="fullName" pattern="[A-Za-z ,.]*" title="Only text, commas, and periods allowed">
            <div id="fullNameError"></div>
        </div>

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" class="form-control" name="email" id="email">
            <div id="emailError"></div>
        </div>

        <div class="form-group">
            <label for="mobileNumber">Mobile Number:</label>
            <input type="tel" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="e.g., 09171234567">
            <div id="mobileNumberError"></div>

        </div>

        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" name="dob" id="dob">
            <div id="dobError"></div>
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" class="form-control" name="age" id="age" readonly>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/script/form.js"></script>
</body>
</html>
