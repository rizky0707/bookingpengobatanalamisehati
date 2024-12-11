@extends('layouts.app')
@section('bookingMenu')
<ul class="nav flex-column sub-menu">
    <li class="nav-item"> 
      <a class="nav-link" href="{{route('booking.index')}}">Booking 
        @if($bookings_countApp > 0)
        <span class="badge badge-pill badge-danger" id="bookingCount">{{$bookings_countApp}}</span>
        @else
        <span class="badge badge-pill badge-danger" id="bookingCount"></span></span>
        @endif  
      </a>
    </li>
  </ul>
  <ul class="nav flex-column sub-menu">
    <li class="nav-item"> <a class="nav-link" href="{{route('komfirmasiPembayaran.index')}}">Pembayaran
      @if($pembayarans_countApp > 0)
      <span class="badge badge-pill badge-danger" id="pembayaransCount">{{$pembayarans_countApp}}</span>
      @else
      <span class="badge badge-pill badge-danger" id="pembayaransCount"></span></span>
      @endif  
    </a></li>
  </ul>
  @endsection
  @section('script')
  <script>
    // Update booking count every 5 seconds
    setInterval(function() {
      // Example of making an Ajax request to get the updated count from the server
      fetch('/path-to-get-booking-count')  // Replace with the correct endpoint for getting updated booking count
        .then(response => response.json())  // Assuming the response is in JSON format
        .then(data => {
          // Assuming the response returns a field `bookings_countApp`
          document.getElementById('bookingCount').textContent = data.bookings_countApp;
        })
        .catch(error => {
          console.error('Error fetching booking count:', error);
        });
    }, 5000);  // 5000 milliseconds = 5 seconds
  </script>
  <script>
    // Update booking count every 5 seconds
    setInterval(function() {
      // Example of making an Ajax request to get the updated count from the server
      fetch('/path-to-get-pembayaran-count')  // Replace with the correct endpoint for getting updated booking count
        .then(response => response.json())  // Assuming the response is in JSON format
        .then(data => {
          // Assuming the response returns a field `bookings_countApp`
          document.getElementById('pembayaransCount').textContent = data.pembayarans_countApp;
        })
        .catch(error => {
          console.error('Error fetching booking count:', error);
        });
    }, 5000);  // 5000 milliseconds = 5 seconds
  </script>
  <script>
    // Function to play notification sound
function playSound() {
var audio = new Audio('{{ asset("assets/admin/assets/sounds/payment-notification.mp3") }}'); // Adjust the path if necessary
audio.play().catch(function(error) {
  console.error('Error playing sound:', error);  // Handle any issues with playing the sound
});
}

// Flag to track if the sound has been played
let soundPlayed = false;

// Flag to track if the user has interacted with the page
let isUserInteracted = false;

// Detect user interaction (click anywhere on the page)
document.body.addEventListener('click', function() {
isUserInteracted = true;
});

// Update payment count every 5 seconds
setInterval(function() {
// Example of making an Ajax request to get the updated count from the server
fetch('/path-to-get-pembayaran-count')  // Replace with the correct endpoint for getting updated payment count
  .then(response => response.json())  // Assuming the response is in JSON format
  .then(data => {
    // Assuming the response returns a field `pembayarans_countApp`
    const paymentCount = data.pembayarans_countApp;

    // Update the payment count display
    document.getElementById('pembayaransCount').textContent = paymentCount;

    // If the user has interacted and there is a payment count greater than 0, and sound hasn't been played yet
    if (isUserInteracted && paymentCount > 0 && !soundPlayed) {
      playSound();
      soundPlayed = true;  // Set the flag to true so the sound doesn't play again
    } else if (paymentCount === 0) {
      soundPlayed = false;  // Reset flag if no payments
    }
  })
  .catch(error => {
    console.error('Error fetching payment count:', error);
  });
}, 5000);  // 5000 milliseconds = 5 seconds

  </script>
  @endsection