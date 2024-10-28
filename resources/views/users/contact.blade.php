@extends('users.layouts.app')
@section('content')


  <!-- contact section -->
  
    <style>
        body {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

<div class="container">
    <form action="https://api.web3forms.com/submit" method="POST" class="bg-white p-4 rounded shadow">
        <h2 class="text-center mb-4">Contact Us</h2>
        <input type="hidden" name="access_key" value="ca6ed480-61e3-441e-91d1-c226ae5d93ae">
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" required class="form-control" placeholder="Enter your name">
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required class="form-control" placeholder="Enter your email">
        </div>
        
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" required class="form-control" rows="4" placeholder="Your message"></textarea>
        </div>
        
        <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
        
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </form>

    </div>
        </div>
        <div class="col-md-5">
          <div class="img-box">
            <img src="images/contact-img.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


        

  <!-- info section -->
 @endsection