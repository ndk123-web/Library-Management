<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LMS</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="./assets/css/style.css">

  <style>
    /* Default styling for larger screens */
    .card {
      width: 500px;
      /* Desktop width */
      background-color: white;
    }

    /* Media query for mobile screens */
    @media (max-width: 576px) {
      .card {
        width: 400px;
        /* Full width on mobile devices */
      }
    }

    /* Media query for very small screens (e.g. small mobile phones) */
    @media (max-width: 425px) {
      .card {
        width: 280px;
        /* Smaller width on very small screens */
      }
    }
  </style>

</head>

<body>

  <div
    class="container d-flex align-items-center justify-content-center vh-100">
    <div class="row">
      <div class="col-md-12 login-form">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title fw-bold text-uppercase text-center">
              <div
                class="text-center">
              </div>
            </h2>
            <form action="dashboard.php">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email
                  address</label>
                <input type="email" class="form-control"
                  id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1"
                  class="form-label">Password</label>
                <input type="password" class="form-control"
                  id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary">Log In</button>
            </form>
            <hr>
            <a href="./forgot-pass.php" class="Forgot"
              style="font-size:15px;">Forgot the
              Password?</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./assets/css/bootstrap.bundle.min.js"></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>