window.onload = function() {
    fetch('get_flights.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('flight-list');
            const flightSelect = document.getElementById('flight-number');
            
            data.forEach(flight => {
                // Add to table
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${flight.flight_no}</td>
                    <td>${flight.arrival}</td>
                    <td>${flight.departure_time}</td>
                    <td>30</td> <!-- Static seat number -->
                    <td><button onclick="bookFlight('${flight.flight_no}')">Book</button></td>
                `;
                tableBody.appendChild(row);

                // Add to dropdown
                const option = document.createElement('option');
                option.value = flight.flight_no;
                option.text = `${flight.flight_no} - ${flight.arrival}`;
                flightSelect.appendChild(option);
            });
        })
        .catch(err => console.error("Failed to load flights:", err));
};