<!DOCTYPE html>
<html>
<head>
    <title>Reservation Confirmation</title>
</head>
<body>
<h1>Reservation Confirmation</h1>
<p>Dear {{ $reservation->r_reservations_username }},</p>
<p>Thank you for your reservation. Here are the details:</p>
<p><strong>Event:</strong> {{ $event->e_events_name }}</p>
<p><strong>Date:</strong> {{ $event->e_events_date }}</p>
<p><strong>Reserved Seats:</strong> {{ $reservation->r_reservations_seats }}</p>
<p>If you have any questions, please contact us.</p>
<p>Best regards,<br>Your Event Team</p>
</body>
</html>
