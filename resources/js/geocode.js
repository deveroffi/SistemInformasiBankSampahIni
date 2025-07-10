// geocode.js

fetch('/admin.geocode', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ address: 'Alamat yang ingin Anda geocode' })
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));