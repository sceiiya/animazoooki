<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>Animazooki Dashboard</title>

</head>

<body>
<section class="admlogin-body">
    <div class="admlogin-container">
        <div class="admlogin-wrapper">
            <h3>LOGIN</h3>

            <form class="position-relative">
                <!-- Email input -->
                <div class="form-outline mb-3">
                    <input type="email" id="admLoginUsername" class="form-control" />
                    <label class="form-label mt-2 ms-1" for="form2Example1">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" id="admLoginPassword" class="form-control" />
                    <label class="form-label mt-2 ms-1" for="form2Example2">Password</label>
                </div>

            </form>
            <!-- Submit button -->
            <div class="d-flex justify-content-center">
            <button type="button" id="loginClient" class="btn btn-info btn-block mb-4">Log In</button>
            </div>
            <div class="text-center">
                <p>No account? <a href="/admin/login/register.php">Register here</a></p>
            </div>
        </div>

    </div>
</section>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="/assets/js/jquery-3.6.3.min.js"></script>
<script src="/assets/js/adminscripts.js"></script>