<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Multi-Stage Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light d-flex align-items-center min-vh-100 py-4">

    <div class="container d-flex justify-content-center">
        <div class="card shadow-sm w-100" style="max-width: 650px;">
            <div class="card-body p-4 p-md-5">

                <h3 class="text-center mb-4">Registration Form</h3>

                <form id="user_form">

                    <div id="stage1" class="basic_info d-block">
                        <h5 class="text-primary border-bottom pb-2 mb-3">1. Basic Information</h5>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="fName" class="form-label fw-semibold text-secondary">First Name</label>
                                <input type="text" name="fName" id="fName" class="form-control bg-light">
                                <p id="mark" class="error_container" name="fName"></p>

                            </div>
                            <div class="col-md-12">
                                <label for="Mname" class="form-label fw-semibold text-secondary">Middle Name</label>
                                <input type="text" name="Mname" id="Mname" class="form-control bg-light">
                                <p class="error_container" name="Mname"></p>
                            </div>
                            <div class="col-md-12">
                                <label for="lname" class="form-label fw-semibold text-secondary">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control mark bg-light">
                                <p class="error_container" name="lname"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="Bdate" class="form-label fw-semibold text-secondary">Birth Date</label>
                                <input type="date" name="Bdate" id="Bdate" class="form-control mark bg-light">
                                <p class="error_container" name="Bdate"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label fw-semibold text-secondary">Gender</label>
                                <select name="gender" id="gender" class="form-select bg-light">
                                    <option value="" disabled selected>Select one..</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <p class="error_container" name="gender"></p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" id="next1" class="btn btn-primary px-4">Next</button>
                        </div>
                    </div>

                    <div id="stage2" class="contact_Info d-none">
                        <h5 class="text-primary border-bottom pb-2 mb-3">2. Contact Information</h5>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="email" class="form-label fw-semibold text-secondary">Email Address</label>
                                <input type="text" id="email" name="email" class="form-control bg-light">
                                <p class="error_container" name="email"></p>
                            </div>
                            <div class="col-md-12">
                                <label for="phone" class="form-label fw-semibold text-secondary">Telephone
                                    Number</label>
                                <input type="text" id="phone" name="phone" class="form-control bg-light">
                                <p class="error_container" name="phone"></p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" id="back1" class="btn btn-outline-secondary px-4">Back</button>
                            <button type="button" id="next2" class="btn btn-primary px-4">Next</button>
                        </div>
                    </div>

                    <div id="stage3" class="other_info d-none">
                        <h5 class="text-primary border-bottom pb-2 mb-3">3. Address Information</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="street" class="form-label fw-semibold text-secondary">Street Address</label>
                                <input type="text" name="street" id="street" class="form-control bg-light">
                                <p class="error_container" name="street"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="barangay" class="form-label fw-semibold text-secondary">Barangay</label>
                                <input type="text" name="barangay" id="barangay" class="form-control bg-light">
                                <p class="error_container" name="barangay"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label fw-semibold text-secondary">City /
                                    Municipality</label>
                                <input type="text" name="city" id="city" class="form-control bg-light">
                                <p class="error_container" name="city"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="province" class="form-label fw-semibold text-secondary">Province</label>
                                <input type="text" name="province" id="province" class="form-control bg-light">
                                <p class="error_container" name="province"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="zipCode" class="form-label fw-semibold text-secondary">Zip Code</label>
                                <input type="num" name="zipCode" id="zipCode" class="form-control bg-light"
                                    maxlength="4">
                                <p class="error_container" name="zipCode"></p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                            <button type="button" id="back2" class="btn btn-outline-secondary px-4">Back</button>
                            <div class="action_buttons">
                                <button type="reset" class="btn btn-light border me-2">Reset</button>
                                <button type="buttton" id="submit_bttn" name="submit_bttn"
                                    class="btn btn-success px-4 fw-bold">Submit
                                    Form</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="script.js"></script>
    <script src="page.js"></script> -->
    <script src="switchingpages.js"></script>
</body>

</html>