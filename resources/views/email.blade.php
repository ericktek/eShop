<!-- resources/views/emails/contact.blade.php -->

<p>You received a new contact message from {{ $data['email'] }}:</p>

<p><strong>Subject:</strong> {{ $data['subject'] }}</p>

<p><strong>Message:</strong></p>
<p>{{ $data['message'] }}</p>
